const http = require('http');
const fs = require('fs');
const path = require('path');
const url = require('url');
const qs = require('querystring');
const { db, pool } = require('./db');
const { Pool } = require('pg');

http.createServer(async (req, res) => {
  db();
  const parsedURL = url.parse(req.url, true);
  const id = parsedURL.query.id;

  if (req.method === 'GET' && parsedURL.pathname === '/') {
    res.writeHead(200, { 'Content-Type': 'text/html' });
    fs.readFile(path.join(__dirname, '/html/index.html'), (err, data) => {
      if (err) {
        res.writeHead(500);
        return res.end('Error loading index.html');
      }
      res.end(data);
    });
  }
  else if (req.method === 'GET' && parsedURL.pathname === '/data') {
    console.log('GET /data');
    if (id) {
      try {
        const result = await pool.query(`SELECT * FROM biodata WHERE id = ${id}`);
        if (result.rows.length > 0) {
          res.writeHead(200, { 'Content-Type': 'application/json' });
          res.end(JSON.stringify(result.rows[0]));
        } else {
          res.writeHead(404);
          res.end('Data not found');
        }
      } catch (err) {
        res.writeHead(500);
        res.end('Error fetching data: ', err);
      }
    }
    else {
      try {
        const result = await pool.query(`SELECT * FROM biodata WHERE id = ${id}`);
          res.writeHead(200, { 'Content-Type': 'application/json' });
          res.end(JSON.stringify(result));
      } catch (err) {
        res.writeHead(500);
        res.end('Error fetching data: ', err);
      }
    }
  }
}).listen(8080, () => {
  console.log('Server is running on port 8080');
});