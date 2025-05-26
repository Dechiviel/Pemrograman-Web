require('dotenv').config();
const express = require('express');
const session = require('express-session');
const bodyParser = require('body-parser');
const path = require('path');

const { pool, db } = require('./db.js');

const app = express();
const port = 3000;
db();

const requireAuthAdmin = (req, res, next) => {
  if (req.session.admin === true) {
    next();
  } else {
    res.send('Unauthorized access');
  }
}

const requireAuthUser = (req, res, next) => {
  if (req.session.user) {
    next();
  } else {
    res.redirect('/login');
  }
}

app.use(session({
  secret: process.env.SESSION_SECRET,
  resave: false,
  saveUninitialized: false,
  rolling: true,
  cookie: {
    maxAge: 600000
  }
}));

app.use(bodyParser.json());
app.use(express.urlencoded({ extended: true }));

app.get('/', (req, res) => {
  if (req.session.admin === true) {
    res.redirect('/admin');
  }
  else if (req.session.user) {
    res.redirect('/user');
  }
  else {
    res.redirect('/login');
  }
});

app.use(express.static(path.join(__dirname, 'public')));

app.get('/register', (req, res) => {
  if (req.session.admin === true) {
    res.redirect('/admin');
  }
  else if (req.session.user) {
    res.redirect('/user');
  }
  else {
    res.sendFile(path.join(__dirname, 'public', 'register', 'register.html'));
  }
});

app.get('/login', (req, res) => {
  if (req.session.admin === true) {
    res.redirect('/admin');
  }
  else if (req.session.user) {
    res.redirect('/user');
  }
  else {
    res.sendFile(path.join(__dirname, 'public', 'login', 'login.html'));
  }
});

app.post('/login', (req, res) => {
  const { username, nrp } = req.body;
  pool.query('SELECT * FROM user_info WHERE username = $1 AND nrp = $2', [username, nrp], (err, result) => {
    if (err) {
      res.status(500).send(JSON.stringify({ error: 'Internal error: Error reading file' }));
    } else {
      if (result.rows.length > 0) {
        req.session.user = result.rows[0].username;
        req.session.admin = result.rows[0].is_admin;
        res.send(JSON.stringify({ success: true }));
      } else {
        res.status(401).send(JSON.stringify({ error: 'Invalid username or nrp' }));
      }
    }
  });
});

app.get('/admin', requireAuthAdmin, (req, res) => {
  res.sendFile(path.join(__dirname, 'private', 'admin', 'admin.html'));
});

app.get('/admin.css', requireAuthAdmin, (req, res) => {
  res.sendFile(path.join(__dirname, 'private', 'admin', 'admin.css'));
});

app.get('/admin.js', requireAuthAdmin, (req, res) => {
  res.sendFile(path.join(__dirname, 'private', 'admin', 'admin.js'));
});

app.get('/admin/books', requireAuthAdmin, async (req, res) => {
  try {
    const result = await pool.query('SELECT * FROM book_base ORDER BY id_book ASC');
    res.send(JSON.stringify(result.rows));
  } catch (err) {
    console.error('Error fetching books:', err);
    res.status(500).send(JSON.stringify({ error: 'Internal error: Error reading file' }));
  }
});

app.post('/admin', requireAuthAdmin, async (req, res) => {
  const { id, title, author, year } = req.body;
  try {
    await pool.query('INSERT INTO book_base (id_book, title, author, publication_year) VALUES ($1, $2, $3, $4)', [id, title, author, year]);
    res.send(JSON.stringify({ success: true }));
  } catch (err) {
    console.error('Error inserting book:', err);
    res.status(500).send(JSON.stringify({ error: 'Internal error: Error reading file' }));
  }
});

app.put('/admin', requireAuthAdmin, async (req, res) => {
  const { origin_id, id_book, title, author, year } = req.body;
  try {
    await pool.query('UPDATE book_base SET id_book = $1, title = $2, author = $3, publication_year = $4 WHERE id_book = $5', [id_book, title, author, year, origin_id ]);
    res.send(JSON.stringify({ success: true }));
  } catch (err) {
    console.error('Error updating book:', err);
    res.status(500).send(JSON.stringify({ error: 'Internal error: Error reading file' }));
  }
});

app.delete('/admin/:id', requireAuthAdmin, async (req, res) => {
  const id = req.params.id;
  try {
    await pool.query('DELETE FROM book_base WHERE id_book = $1', [id]);
    res.send(JSON.stringify({ success: true }));
  } catch (err) {
    console.error('Error deleting book:', err);
    res.status(500).send(JSON.stringify({ error: 'Internal error: Error reading file' }));
  }
});

app.get('/user', requireAuthUser, (req, res) => {
  res.sendFile(path.join(__dirname, 'private', 'user', 'user.html'));
});

app.get('/user.css', requireAuthUser, (req, res) => {
  res.sendFile(path.join(__dirname, 'private', 'user', 'user.css'), (err, data) => {
    if (err) {
      res.status(500).send('Internal error: Error reading file');
    } else {
      res.set('Content-Type', 'text/css');
      res.send(data);
    }
  });
});

app.get('/profile', requireAuthUser, (req, res) => {
  res.sendFile(path.join(__dirname, 'private', 'profile', 'profile.html'));
});

app.get('/profile.css', requireAuthUser, (req, res) => {
  res.sendFile(path.join(__dirname, 'private', 'profile', 'profile.css'));
});

app.get('/profile.js', requireAuthUser, (req, res) => {
  res.sendFile(path.join(__dirname, 'private', 'profile', 'profile.js'));
});

app.get('/profile/:username', requireAuthAdmin, async (req, res) => {
  const username = req.params.username;
  try {
    const result = await pool.query('SELECT * FROM biodata WHERE username = $1', [username]);
    if (result.rows.length > 0) {
      res.send(JSON.stringify(result.rows[0]));
    } else {
      res.send(JSON.stringify({ initialized: false }));
    }
  } catch (err) {
    console.error('Error fetching user profile:', err);
    res.status(500).send(JSON.stringify({ error: 'Internal error: Error reading file' }));
  }
});

app.post('/logout', (req, res) => {
  req.session.destroy((err) => {
    if (err) {
      console.error('Error destroying session:', err);
      res.status(500).send('Internal error: Error destroying session');
    } else {
      res.redirect('/login');
    }
  });
});

app.listen(port, () => {
  console.log(`server: http://localhost:${port}`);
});