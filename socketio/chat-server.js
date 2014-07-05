// Importamos socket.io y asignamos el puerto por donde recibimos la conexion
var io = require("socket.io").listen(9090);
var nicks = [];
var conectados=0;

//Cuando alguien se conecte
io.sockets.on("connection", function(socket) {

  conectados++; 
  console.log("Usuarios:"+conectados);
  
  socket.on('disconnect', function() { conectados--; console.log("Usuarios:"+conectados); });
  
  //Cuando el cliente emita el mensaje nick
  socket.on("nick", function(nick) {
      nicks.push(nick); // Guardamos el nick
      io.sockets.emit("nicks", nicks); // Emitimos al cliente todos los nicks

      //Cuando el cliente ya haya enviando su nick
      //y emita un mensaje
      socket.on("msg", function(msg) {
          //Emitimos el nick y el mensaje a todos los sockets conectados (clientes).
          //Podemos usar la variable nick gracias a que sucede un closure :)
          io.sockets.emit("msg", nick, msg);
      });

      //Cuando alguien se desconecte
      //eliminamos el nick del arreglo
      //y emitimos de nuevo todos los nicks
      socket.on("disconnect", function() {
          nicks.splice(nicks.indexOf(nick), 1);
          io.sockets.emit("nicks", nicks);
      });
  });
});

