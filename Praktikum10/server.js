const http = require('http');
const fs = require('fs');
const path = require('path');
const formidable = require('formidable'); // Menggunakan formidable untuk parsing form

const PORT = 8080;

const server = http.createServer((req, res) => {
  if (req.method === 'GET') {
    const filePath = path.join(__dirname, 'index.html');
    fs.readFile(filePath, (err, data) => {
      if (err) {
        res.writeHead(500, { 'Content-Type': 'text/plain' });
        return res.end('Internal Server Error');
      }
      res.writeHead(200, { 'Content-Type': 'text/html' });
      res.end(data);
    });
  } else if (req.method === 'POST') {
    const form = new formidable.IncomingForm();
    form.parse(req, (err, fields, files) => {
      if (err) {
        res.writeHead(500, { 'Content-Type': 'application/json' });
        return res.end(JSON.stringify({ message: 'Failed to process form data' }));
      }

      // Data yang diterima dalam bentuk fields
      const data = {
        nama: fields.nama,
        nrp: fields.nrp,
        kelas: fields.kelas,
        kelamin: fields.kelamin,
        agama: fields.agama,
        tempatLahir: fields.tempatLahir,
        tanggalLahir: fields.tanggalLahir,
        alamat: fields.alamat,
        sd: fields.sd,
        smp: fields.smp,
        sma: fields.sma,
        email: fields.email,
        homepage: fields.homepage,
        hobi: fields.hobi,
        interest: fields['interest[]'] // Menangani array dari checkbox interest
      };

      // Menyimpan data ke data.json
      fs.writeFile(path.join(__dirname, 'data.json'), JSON.stringify(data, null, 2), (err) => {
        if (err) {
          res.writeHead(500, { 'Content-Type': 'application/json' });
          return res.end(JSON.stringify({ message: 'Failed to save data' }));
        }

        res.writeHead(200, { 'Content-Type': 'application/json' });
        res.end(JSON.stringify({ message: 'Data saved successfully', data: data }));
      });
    });
  } else {
    res.writeHead(405, { 'Content-Type': 'text/plain' });
    res.end('Method Not Allowed');
  }
});

server.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});