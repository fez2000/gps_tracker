var express = require('express');

var favicon = require('serve-favicon');


const fs = require('fs');



var app = express()



app.use((req, res, next) => {
    // Website you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', '*')
    // Request methods you wish to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE')
    // Request headers you wish to allow
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type')
    // Set to true if you need the website to include cookies in the requests sent
    // to the API (e.g. in case you use sessions)
    res.setHeader('Access-Control-Allow-Credentials', true)
    // Pass to next layer of middleware

    next()
  })
 .use(express.static(__dirname + '/public'))

.use(favicon(__dirname + '/public/favicon.ico'))
.use(function(req,res){
  res.status(404).sendFile( __dirname+'/public/404.html');
})







app.listen(3000);
console.log('Listening on port 3000...');


  