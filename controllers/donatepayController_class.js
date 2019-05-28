// donatepayController_class
'use strict'
/*
var DonatepayRequest = function (url) {// создаем класс- экземпляр класса
 this.url = url;
};
DonatepayRequest.prototype.request = function() {// создание методов в классе
  console.log("Hello, I'm " + this.url);
};
// создаем обект из класса и передаем ему параметр в метод
var donatepay1 = new DonatepayRequest("https://donatepay.ru/api/v1/transactions?access_token=ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c&limit=100");
donatepay1.request(); // выводим ответ от метода "Hello, I'm Alice"
*/
/* Метод «arr.filter(callback[, thisArg])» используется для фильтрации массива через функцию
var arr = [1, -1, 2, -2, 3];

var positiveArr = arr.filter(function(number) {
  return number > 0;
});

alert( positiveArr ); // 1,2,3
*/
//let date1=new Date()
//console.log('toISOString'+date1.toISOString())

function myconsolelog(message) {
	console.log('\"'+message+'\" :'+Date())
}
console.log('Test2'+Date.now());
console.log('Test3_Date.now()'+Date.now()+'---Date.parse()='+Date.parse(Date()));
/*
function arrJornal() {// создание массива из строки журнала событий
let array = localStorage['jornal'].split("#")// разбиваем строку в массив
	for (let i = 0; i < array.length; i++) {
	 // alert( i );
	 array[i]=array[i].substring(array[i].indexOf('|')+1)// удаляем все лишнее до знака | и остается только дата-время
	 console.log(array[i])
	 console.log('array['+i+']='+Date.parse(array[i]))
	}
}
*/
function arrJornal() {// создание массива из строки журнала событий
let array = localStorage['jornal'].split("#")// разбиваем строку в массив
let arrJornal=[]
let arrmMessage=[]
let arrDate=[]
let index
arrJornal[0]=arrmMessage
arrJornal[1]=arrDate
	for (let i = 0; i < array.length; i++) {
	 // alert( i );
	 index=array[i].indexOf('|')// находим позицию знака | в строке каждого элемента массива
	 //arrJornal[0][i]=array[i].substring(0,index)// удаляем все лишнее после знака | и остается только само сообщение
	 arrJornal[0][i]=array[i]// все сообщение записываем для удобства в этот же двухмерный масив
	 arrJornal[1][i]=array[i].substring(index+1)// удаляем все лишнее до знака | и остается только дата-время
	 console.log(arrJornal[0][i])
	  console.log( arrJornal[1][i])
	 console.log('array['+i+']='+Date.parse(arrJornal[1][i]))
	}
}
//localStorage['jornal']=' '
myconsolelog('Test 1');
function jornal(message) {
	let lengthJornal=700;// лимит размера после которого уменьшаем журнал
	let lengthJornalClear=50; // уменьшение журнала на столько за 1 раз
if (localStorage.getItem('jornal') == null) { // Если нету ключа в localStorage то создаем его пустым
	console.log('Нету ключа в localStorage')
	localStorage['jornal']='';
	}
	let strJornal=localStorage['jornal']
	let simbol='#'; // символ разделитель для разбиения строки в массив
	//let t=new Date()
	//console.log('strJornal.length='+strJornal.length)
	let date=new Date()
	if (strJornal.length<lengthJornal) {// если не привысили лимит lengthJornal
	console.log('strJornal.length='+strJornal.length)	
	if (strJornal.length==0) {
	simbol='';
	}
	
	localStorage['jornal']=strJornal+simbol+message+' :lenght jornal='+strJornal.length+'|'+date.toISOString()// дописываем новое сообщение в журнал удаляем последний символ # во всем журнале.
	arrJornal()
	}else{                              // если  привысили лимит lengthJornal
	delete localStorage['jornal']		// удаляем ключ журнала
	let strJornalNew=strJornal.substring(lengthJornalClear)// уменьшаем журнал на lengthJornalClear с начало
	strJornalNew=strJornalNew.substring(strJornalNew.indexOf('#')+1) // уменьшаем дополнительно до первого знака # и сам знак
	localStorage['jornal']=strJornalNew+'#'+message+' :lenght jornal='+strJornalNew.length+'|'+date.toISOString()	// дописываем новое сообщение в журнал удаляем последний символ # во всем журнале. 
	//console.log('strJornalNew.length='+strJornalNew.length)
	}
	//var string = "0,1";
	// str.slice(0, -1)// удалить последний символ из строки
	/*
	var array = localStorage['jornal'].split("#")
	array[0]=(array[0]).substring(array[0].indexOf('|')+1)
	console.log('Date.parse='+Date.parse('Wed May 22 2019 19:43:29 GMT+0300 (Москва, стандартное время)'))
	console.log('array[0]='+Date.parse(array[0]))
	*/
	//let array = localStorage['jornal'].split("#")
	/*
	let strtest='Это проверка функции jornal :lenght jornal=107|Wed May 22 2019 19:43:53 GMT+0300 (Москва, стандартное время)'
	let array=strtest.split("#")
	console.log('array.length='+array.length)
	console.log('array[0]='+array[0])
	*/
	
	// выделить в отдельную функцию для отсылки сообщения на сервер
	/*
	for (let i = 0; i < array.length; i++) {
	 // alert( i );
	 array[i]=array[i].substring(array[i].indexOf('|')+1)
	 console.log(array[i])
	 console.log('array['+i+']='+Date.parse(array[i]))
	}
	*/
	
}
$.post("http://hspick.ru/rulette/controllers/ruletterequest.php",
{'login':'1111', 'password' : '2222'},
function(data) {
  console.log('function data Good ruletterequest.php='+data);
})
.done(function(data) {
	console.log('Good ruletterequest.php='+data);
		})
.fail(function(data) { // после танцев с бубнами получилось получить строку ответа от сервера
		//console.log('error ruletterequest.php='+data); //
		//console.log(data);
		//alert(xhr.responseText);
		//console.log('xhr.responseText='+xhr.responseText); //
		console.log('fail data='+data); //
		})
.always(function(data) { 	
		console.log('.always data ruletterequest.php='+data); //
		//console.log(data);
		});
		
 let timer_setint=setTimeout(function() { // setTimeout - однократно, setInterval - многократно
	let limit='&limit=100';// лимит записей в ответе о жонатах в документации написано до 100 и 25 по умолчанию. Но по факту 10 по умолчанию
	//url='wqeqeqw';
	//apiToken='TxBToJ7CNy36dXuyvWts8d9HIzTjNGjlP4k2Fun79vJedd1ARJUOHUdScHlz';// My
	let apiToken='ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c';// Gruve
	//ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c
	//url='https://donatepay.ru/api/v1/transactions?'+access_token='+ apiToken+limit;
	//url='https://donatepay.ru/api/v1/transactions?access_token='+ apiToken+limit;
	let url='https://donatepay.ru/api/v1/transactions?access_token=ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c&limit=100';
	
	/*function IsJsonString(str) {// функция проверки на поступления Json строки, но у нас сразу  объект js поступает
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
	}
*/
// Запрс к серверу
/*
$.ajax({
  type: "POST",
  url: "hspick.ru/rulette/ruletterequest.php",
  data: "name=John&location=Boston",
  success: function(msg){
    alert( "Прибыли данные: " + msg );
  }
 }); 
  */

	let getJSON=$.getJSON(url,
	
	function(data) {
	//data="erwrewrt3.mncvxlkjoidr8372r74295fkdsvk..,,.5636536";
	//data=data+'3232fgfnnm6';
	/*if(IsJsonString(data)){//преобразует значение JavaScript в строку JSON
	console.log('This JSON');
	}else{
	console.log('This Not JSON');
	}
	*/	
	})
/*	.always(function() {
		console.log( "complete" ); 
	})
*/
	.done(function(data) {
		console.log('second success typeof='+typeof data); // "string" проверка на тип поступающих данных- с donatepay получаем  object
		if (typeof data==="object")
		{
		myconsolelog('Это проверка функции myconsolelog');//toISOString
		jornal('Это проверка функции jornal')
		if (localStorage.getItem('ewrwerwe') !== null) {
		console.log('Есть ключ  ewrwerwe')
		}else{
		console.log('Нету ключа  ewrwerwe')
		}
		//localStorage['jornal']='';
		//localStorage['jornal']=localStorage['jornal1']+' '
		//console.log(localStorage['jornal1'].length)
		console.log(data);
			if (data.status=="success"){
			console.log(data.status);//success
				if (data.data.length){
					console.log("data.data.length больше 0");//=100 не должно быть меньше 1. Т.е от 1до 100
					var successArray = data.data.filter(function(number) {//оставляем только те элементы массива data  в котором присутствуют только те что status= success
						return number.status=="success";
						});
					console.log(successArray);// новый массив в котором в data присутствуют только те что status= success
						if (successArray.length){// если больше 0 элементов в новом массиве
						console.log("successArray.length больше 0");
						console.log(successArray[0].id);// узнаем id последнего элемента нового массива
						localStorage["id_lost"]=successArray[0].id;//записываем этот id в localstorage id_lost
						//localStorage["id_lost"]=0;
						console.log(localStorage["id_lost"]);//проверим что записалось
						}else{// если записей не оказалось то записываем любое значение меньше тех что доллжно быть, например 0
						localStorage["id_lost"]=0;
						}
					}else{
					console.log(' error data.data.length=0');
					}
			}else{
				console.log('data.status not "success"');
				}
		}else{
		console.log('error This Not Object');
		}
		console.log(data.data.length);//=100 не должно быть меньше 1. Т.е от 1до 100
		// если lenght больше 0 то проходися по всему массиву и оставляем только те где data.status=="success"

		
		
		
		})
	.fail(function() { 
		console.log('error typeof='+typeof data); // "string" проверка на тип поступающих данных- с donatepay получаем  object
		//console.log(data);
		});


	
}, 1000);
console.log('Скрипт');
