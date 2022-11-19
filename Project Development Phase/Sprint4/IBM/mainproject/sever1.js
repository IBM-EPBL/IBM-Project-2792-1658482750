var http = require('http');
var mysql=require('mysql2');
const axios = require('axios');

var con = mysql.createConnection({
  host: "localhost",
  user: 'root',
  password: '',
  database: "data_protection"
});

con.connect(function(err) {
  if (err) {
  throw err;}
  else{
  console.log("Connected!");}
});
http.createServer(function (req, res) {
  let data = '';
  if(req.method=="POST"){
    
    console.log(req.method);
    req.on('data', chunk => {
      data += chunk;
      res.end("sucess");
      str=String(data);
      str=str.replaceAll("%40","@");
      str=str.replaceAll("%3D","=");
  
      e=str.slice(str.indexOf("email="),str.indexOf("&password="));
      e=e.replace("email=","");
      s2=str.slice(str.indexOf("&password="),str.indexOf("&key"));
      s2=s2.replace("&password=","");
      s1=str.slice(str.indexOf("&key="));
      s1=s1.replace("&key=","");
      console.log(str);
      con.connect(function(err) {
        if (err) throw err;
        var sql = "UPDATE data SET password1 = '"+s2+"',"+"key1='" +s1+"'WHERE emailid = '"+e+"'";
        con.query(sql, function (err, result) {
          if (err) throw err;
          console.log(result.affectedRows + " record(s) updated");
        });
      });
   
   
    })
  }
  else if(req.method=="GET"){
   req.on('data',chunk=>{
    data += chunk;
    
    str=String(data);
    console.log(str);
  
con.connect(function(err) {
  if (err) throw err;
  con.query("SELECT password1, key1 FROM data WHERE emailid='"+str+"'", function (err, result, fields) {
    if (err) throw err;
    if(result.length!=0){
    res.end(String(result[0].password1)+" "+String(result[0].key1));}
    else{
      res.end("fail");
    }
  });
});
  
  })
  }
  
}).listen(8080)