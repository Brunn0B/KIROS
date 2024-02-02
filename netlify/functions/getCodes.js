// functions/getCodes.js

exports.handler = async function (event, context) {
    try {
    
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
  