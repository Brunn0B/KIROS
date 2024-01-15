const express = require('express');
const bodyParser = require('body-parser');
const sqlite3 = require('sqlite3').verbose();

const app = express();
const port = 3000;

// Configurar o middleware para analisar solicitações JSON
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

// Configurar o banco de dados SQLite
const db = new sqlite3.Database('codes.db');

// Criar a tabela se ela não existir
db.run(`
  CREATE TABLE IF NOT EXISTS codes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    date TEXT,
    code TEXT
  )
`);

// Rota para obter todos os códigos
app.get('/codes', (req, res) => {
  db.all('SELECT * FROM codes', (err, rows) => {
    if (err) {
      res.status(500).json({ error: err.message });
      return;
    }
    res.json(rows);
  });
});

// Rota para adicionar um código
app.post('/codes', (req, res) => {
  const { code } = req.body;
  const date = new Date().toLocaleDateString('pt-BR');

  db.run('INSERT INTO codes (date, code) VALUES (?, ?)', [date, code], function (err) {
    if (err) {
      res.status(500).json({ error: err.message });
      return;
    }

    res.json({ id: this.lastID, date, code });
  });
});

// Iniciar o servidor
app.listen(port, () => {
  console.log(`Servidor rodando em http://localhost:${port}`);
});
