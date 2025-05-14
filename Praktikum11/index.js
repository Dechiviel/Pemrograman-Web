const http = require('http');
const fs = require('fs');
const path = require('path');
const url = require('url');
const { pool, db } = require('./db');

const PORT = 8080;

function serveIndex(res) {
  const file = path.join(__dirname, 'html/index.html');
  fs.readFile(file, (err, data) => {
    if (err) {
      res.writeHead(500, { 'Content-Type': 'text/plain' });
      return res.end('Error loading index.html');
    }
    res.writeHead(200, { 'Content-Type': 'text/html' });
    res.end(data);
  });
}

function parseBody(req) {
  return new Promise((resolve, reject) => {
    let body = '';
    req.on('data', chunk => body += chunk);
    req.on('end', () => {
      try { resolve(JSON.parse(body)); }
      catch (e) { reject(e); }
    });
  });
}

const server = http.createServer(async (req, res) => {
  const parsedURL = url.parse(req.url, true);
  const pathname = parsedURL.pathname;
  const id = parsedURL.query.id;

  if (req.method === 'GET' && pathname === '/') {
    return serveIndex(res);
  }

  if (pathname === '/data') {
    try {
      // GET all or by id
      if (req.method === 'GET') {
        if (id) {
          const result = await pool.query(
            'SELECT id, data_json FROM biodata WHERE id = $1', [id]
          );
          if (result.rows.length === 0) {
            res.writeHead(404, { 'Content-Type': 'text/plain' });
            return res.end('Not Found');
          }
          res.writeHead(200, { 'Content-Type': 'application/json' });
          return res.end(JSON.stringify(result.rows[0]));
        } else {
          const result = await pool.query(
            'SELECT id, data_json FROM biodata ORDER BY id'
          );
          res.writeHead(200, { 'Content-Type': 'application/json' });
          return res.end(JSON.stringify(result.rows));
        }
      }

      // POST create
      if (req.method === 'POST') {
        const data = await parseBody(req);
        const result = await pool.query(
          'INSERT INTO biodata(data_json) VALUES($1) RETURNING id, data_json',
          [data]
        );
        res.writeHead(201, { 'Content-Type': 'application/json' });
        return res.end(JSON.stringify(result.rows[0]));
      }

      // PUT update
      if (req.method === 'PUT' && id) {
        const data = await parseBody(req);
        const result = await pool.query(
          'UPDATE biodata SET data_json = $1 WHERE id = $2 RETURNING id, data_json',
          [data, id]
        );
        if (result.rows.length === 0) {
          res.writeHead(404).end('Not Found');
        } else {
          res.writeHead(200, { 'Content-Type': 'application/json' });
          res.end(JSON.stringify(result.rows[0]));
        }
        return;
      }

      // DELETE
      if (req.method === 'DELETE' && id) {
        const result = await pool.query(
          'DELETE FROM biodata WHERE id = $1 RETURNING id, data_json', [id]
        );
        if (result.rows.length === 0) {
          res.writeHead(404).end('Not Found');
        } else {
          res.writeHead(200, { 'Content-Type': 'application/json' });
          res.end(JSON.stringify(result.rows[0]));
        }
        return;
      }
    } catch (err) {
      console.error(err);
      res.writeHead(500, { 'Content-Type': 'text/plain' });
      return res.end('Server Error: ' + err.message);
    }
  }

  res.writeHead(404, { 'Content-Type': 'text/plain' });
  res.end('Not Found');
});

db().then(() => {
  server.listen(PORT, () => console.log(`Server running at http://localhost:${PORT}`));
});
