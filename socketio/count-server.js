// Importamos socket.io y asignamos el puerto por donde recibimos la conexion
var io = require("socket.io").listen(9090);
var nicks = [];
var conectados=0;

//Cuando alguien se conecte
io.sockets.on("connection", function(socket) {

  conectados++;
  io.sockets.emit("user",conectados);

  console.log("Usuarios:"+conectados);
  socket.on('disconnect', function() { 
           conectados--; 
           io.sockets.emit("user",conectados);
           console.log("Usuarios:"+conectados); 
  });
 
});


