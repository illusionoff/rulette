// donatepayController
timer_setint=setTimeout(function() { // setTimeout - однократно, setInterval - многократно
	errors=false;
	limit='&limit=100';// лимит записей в ответе о жонатах в документации написано до 100 и 25 по умолчанию. Но по факту 10 по умолчанию
	//url='wqeqeqw';
	//apiToken='TxBToJ7CNy36dXuyvWts8d9HIzTjNGjlP4k2Fun79vJedd1ARJUOHUdScHlz';// My
	apiToken='ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c';// Gruve
	//ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c
	//url='https://donatepay.ru/api/v1/transactions?'+access_token='+ apiToken+limit;
	//url='https://donatepay.ru/api/v1/transactions?access_token='+ apiToken+limit;
	url='https://donatepay.ru/api/v1/transactions?access_token=ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c&limit=100';
	
	/*function IsJsonString(str) {// функция проверки на поступления Json строки, но у нас сразу  объект js поступает
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
	}
*/
	var getJSON=$.getJSON(url,
	
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
		console.log(data);
		console.log(data.status);//success
		console.log(data.data.length);//=100 не должно быть меньше 1. Т.е от 1до 100
		})
	.fail(function() { 
		errors=true;
		console.log('error typeof='+typeof data); // "string" проверка на тип поступающих данных- с donatepay получаем  object
		//console.log(data);
		});


	
}, 1000);
console.log('Скрипт');
