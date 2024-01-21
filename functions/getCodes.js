// functions/getCodes.js

exports.handler = async function (event, context) {
    try {
      // Aqui você deve obter os códigos salvos (por exemplo, de um banco de dados)
      // Neste exemplo, usaremos um array para simplificar.
      const savedCodes = JSON.parse(localStorage.getItem('codes')) || [];
  
      return {
        statusCode: 200,
        body: JSON.stringify(savedCodes),
      };
    } catch (error) {
      return {
        statusCode: 500,
        body: JSON.stringify({ error: 'Internal Server Error' }),
      };
    }
  };
  