 var socket = io('wss://socket.donationalerts.ru:443', {
				reconnection: true,
				reconnectionDelayMax: 5000,
				reconnectionDelay: 1000,
			});
token='b38JkGkpawUZSAUgmlDn';
//token='MQzB22rSfvimkCMN0M08';				
socket.on('connect', function(msg){
			console.log('WS: connected');
			socket.emit('add-user', {token: token, type: "alert_widget"});
		});
		socket.on('connect_error', function(msg){
			console.log('WS: connection_error');
		});

		socket.on('connect_timeout', function(msg){
			console.log('WS: connection_timeout');
		});

		socket.on('reconnect', function(msg){
			console.log('WS: reconnected');
		});
//MQzB22rSfvimkCMN0M08
//b38JkGkpawUZSAUgmlDn
socket.on('donation', function(msg){
  //console.log($.parseJSON(msg));
 // localStorage["myKey"] = JSON.stringify($.parseJSON(msg)) ;//установка значения
 //localStorage["myKey"]="rerere";
 //localStorage["myKey"];
 /*
localStorage["myKey"]=msg;// установка значения в форме строки JSON
 console.log("localStorage:");
 //console.log(JSON.stringify(localStorage["myKey"]));// Получение значения
 localMsg=$.parseJSON(localStorage["myKey"]);
 console.log( localMsg );// Получение значения и преобразование в объекты из строки JSON
 console.log("1:");
 localMsg["amount"]=localMsg["amount"]+100;
 localStorage["myKey"]=JSON.stringify(localMsg);
 
  console.log(localMsg["amount"]);// доступ к конкретным данным в объекте
*/
//console.log(JSON.stringify(localStorage["myKey"]));// Получение значения
/* 
// Запись и изменение данных в localStorage
read=localStorage["myKey"];// читаем из localStorage
console.log(read);//выводим на экран
read=$.parseJSON(read);// преобразуем из строки в объект
amount=read["amount"];//выделяем amount переменную
console.log(amount);// выводим эту переменную
amount=amount+100;
read["amount"]=amount;// переписываем значение в объекте
console.log(amount);// выводим эту переменную
readString=JSON.stringify(read);// Преобразуем обратно в строку
localStorage["myKey"]=readString;// записываем в localStorage
*/
console.log($.parseJSON(msg));
console.log('This');
});
console.log('This 1 Console.log');
//localStorage["myKey"] = "myValue" ;//установка значения
//console.log(localStorage["myKey"]);// Получение значения

/*
amount=read["amount"];//выделяем amount переменную
console.log(amount);// выводим эту переменную
amount=amount+100;
console.log(amount);// выводим эту переменную
*/