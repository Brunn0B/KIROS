// functions/saveCode.js

exports.handler = async function (event, context) {
    try {
      const { code } = JSON.parse(event.body);
  
      // Aqui você pode salvar o código em um banco de dados, por exemplo.
      // Neste exemplo, usaremos um array para simplificar.
      let savedCodes = JSON.parse(localStorage.getItem('codes')) || [];
      savedCodes.push({ date: new Date().toLocaleDateString('pt-BR'), code });
      localStorage.setItem('codes', JSON.stringify(savedCodes));
  
      return {
        statusCode: 200,
        body: JSON.stringify({ success: true }),
      };
    } catch (error) {
      return {
        statusCode: 500,
        body: JSON.stringify({ error: 'Internal Server Error' }),
      };
    }
  };

  