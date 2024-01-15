// functions/codes.js

const sqlite3 = require('sqlite3').verbose();

exports.handler = async function (event, context) {
  const db = new sqlite3.Database('/tmp/codes.db');  // Utilizando /tmp para armazenar o banco de dados temporariamente

  // Código da sua função aqui

  // Fechar o banco de dados
  db.close();

  return {
    statusCode: 200,
    body: JSON.stringify({ message: 'Função executada com sucesso' }),
  };
};
