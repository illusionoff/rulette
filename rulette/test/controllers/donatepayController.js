// donatepayController
'use strict';
{
    //Test mode   
    let test_mode = true;//тестовый режим с выводом console.log
    let jornal_mode = true;//тестовый режим с ведением журнала в localstorage и отправкой на сервер журнала
    let jornal_mode_setInterval = 60000;// периодичность отправки сообений на сервер 60000= раз в минуту
    let request_donatepay_setInterval = 20500;// периодичность отправки сообений на сервер 20500= раз в 20,5 секунды из-за ограничения API donatepay
    if (test_mode === true) {
        localStorage['rulette_complete'] = 'false';
        localStorage['rulette_status'] = 'start';
        localStorage['rulette_sum'] = '4300';
        localStorage['rulette_id_lost'] = '6600000';
        localStorage['rulette_winner'] = '';
        request_donatepay_setInterval = 1000;
    }

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
//
// console.log+ вывод даты
    function myconsolelog(message) {
        if (test_mode === true) {
            let date = new Date();

            if (typeof message === "object") {
                console.log(message);
            } else {
                console.log('\"' + message + '\" :' + date.toISOString());
            }

        }
    }
// создание массива из строки журнала событий
    function arrJornal(millis) {
        myconsolelog('arrJornal');
        myconsolelog('millis' + millis);

        if (millis != false) {
            if (test_mode === true) {
                let array = localStorage['rulette_jornal'].split("#");// разбиваем строку в массив
                let arrJornal = [];
                let arrmMessage = [];
                let arrDate = [];
                let index;
                let str_jornal_for_server = '';
                arrJornal[0] = arrmMessage;
                arrJornal[1] = arrDate;
                for (let i = 0; i < array.length; i++) {
                    index = array[i].indexOf('|');// находим позицию знака | в строке каждого элемента массива. Этот символ используется как разделитель между текстом и датой-временем в сообщении
                    arrJornal[0][i] = array[i];// все сообщение записываем для удобства в этот же двухмерный масив
                    arrJornal[1][i] = array[i].substring(index + 1);// удаляем все лишнее до знака | и остается только дата-время
                    //myconsolelog(arrJornal[0][i]);// сообщение
                    //myconsolelog(arrJornal[1][i]);// Дата-время в милисекундах
                    if (Date.parse(arrJornal[1][i]) >= millis) {
                        str_jornal_for_server = str_jornal_for_server + arrJornal[0][i];
                        myconsolelog(Date.parse(arrJornal[1][i]) + ':' + millis);// Дата-время в милисекундах 
                    } else {
                        //myconsolelog('нету новых записей для сервера'+i+str_jornal_for_server);// Дата-время в милисекундах 
                        //myconsolelog(Date.parse(arrJornal[1][i])+':'+millis);// Дата-время в милисекундах 
                    }

                    //myconsolelog('array[' + i + ']=' + Date.parse(arrJornal[1][i]));// Дата-время в милисекундах
                }
                myconsolelog('Строка для добавления на сервер' + str_jornal_for_server);// Дата-время в милисекундах
                myconsolelog('arrJornal end');
                return str_jornal_for_server;
            }
        } else {
            myconsolelog('ошибка преобразования даты вхождения в jornal function');
            jornal('ошибка преобразования даты вхождения в jornal function');
            return false;
        }

    }
// ведение журнала событий в localstorage
    function jornal(message) {
        if (test_mode === true) {
            let lengthJornal = 1000;// лимит размера после которого уменьшаем журнал
            let lengthJornalClear = 100; // уменьшение журнала на столько за 1 раз
            if (localStorage.getItem('rulette_jornal') === null) { // Если нету ключа в localStorage то создаем его пустым
                myconsolelog('Нету ключа в localStorage');
                localStorage['rulette_jornal'] = '';
            }
            let strJornal = localStorage['rulette_jornal'];
            let simbol = '#'; // символ разделитель для разбиения строки в массив
            let date = new Date();
            let str_jornal_old = simbol + message + name_strimer + ' :lenght jornal=' + strJornal.length + '|' + date.toISOString();//строка журнала 
            // дописываем новое сообщение в журнал удаляем последний символ # во всем журнале.
            if (strJornal.length < lengthJornal) {// если не привысили лимит lengthJornal
                myconsolelog('strJornal.length=' + strJornal.length);
                if (strJornal.length == 0) {
                    simbol = '';
                }
                //name_strimer это имя стримера или ник нейм для различия, если клиентов будет больше одного
                localStorage['rulette_jornal'] = strJornal + str_jornal_old;//строка журнала 
            } else {                              // если  привысили лимит lengthJornal
                delete localStorage['rulette_jornal'];		// удаляем ключ журнала
                let strJornalNew = strJornal.substring(lengthJornalClear);// уменьшаем журнал на lengthJornalClear с начало
                strJornalNew = strJornalNew.substring(strJornalNew.indexOf('#') + 1); // уменьшаем дополнительно до первого знака # и сам знак
                localStorage['rulette_jornal'] = strJornalNew + str_jornal_old;//строка журнала 
            }
        }

    }
    /**
     * URL post for writting jornal
     */

    function request_jornal_first() {
        myconsolelog('request_jornal');
        $.post("http://hspick.ru/rulette/controllers/ruletterequest.php", // запрос к серверу ддя ведения журнала
                {'request': 'first', 'password': '2222'},
                function (data) {
                    //        myconsolelog('function data Good ruletterequest.php=' + data);
                })
                .done(function (data) {
                    //Здесь разбираем присланную дату. переводим ее в миллисекунды для сравнения
                    //data='2019-05-26T11:40:23.698Z';
                    myconsolelog('request_jornal_data');
                    console.log('request_jornal_first Date.parse(data)_' + Date.parse(data) + '___data=' + data + '___');
                    // alert(data.length);
                    if (isNaN(Date.parse(data))) {// если есть ошибка в дате
                        myconsolelog('Ошибка разбора даты с сервера=' + Date.parse(data) + '__data__=' + data + '_end_data');
                        jornal('Ошибка разбора даты с сервера=' + Date.parse(data));
                        //return false;
                        /*
                         if(){
                         
                         }else{
                         
                         }
                         */

                    } else {
                        myconsolelog('Date millisecond from server=' + Date.parse(data));
                        let request = arrJornal(Date.parse(data));// вызов массива журнала
                        if ((request != false) && (request != '')) {
                            //если получили строку сообщений то передаем ее на сервер 
                            request_jornal_second(request);
                        } else {
                            myconsolelog('Ошибка=arrJornal');
                        }

                    }



                })
                .fail(function (data) { // после танцев с бубнами получилось получить строку ответа от сервера
                    //console.log('error ruletterequest.php='+data); //
                    //console.log(data);
                    //alert(xhr.responseText);
                    //console.log('xhr.responseText='+xhr.responseText); //
                    myconsolelog('fail data=' + data); //
                })
                .always(function (data) {
                    // myconsolelog('.always data ruletterequest.php=' + data); //
                });
    }
    function request_jornal_second(request) {
        myconsolelog('request_jornal_second');
        $.post("http://hspick.ru/rulette/controllers/ruletterequest.php", // запрос к серверу ддя ведения журнала
                {'request': 'second', 'jornal': request},
                function (data) {
                    //        myconsolelog('function data Good ruletterequest.php=' + data);
                })
                .done(function (data) {
                    //Здесь разбираем присланную дату. переводим ее в миллисекунды для сравнения
                    //data='2019-05-26T09:59:43.370Z';
                    myconsolelog(data);
                })
                .fail(function (data) { // после танцев с бубнами получилось получить строку ответа от сервера
                    //console.log('error ruletterequest.php='+data); //
                    //console.log(data);
                    //alert(xhr.responseText);
                    //console.log('xhr.responseText='+xhr.responseText); //
                    myconsolelog('fail data request_jornal_second=' + data); //
                })
                .always(function (data) {
                    // myconsolelog('.always data ruletterequest.php=' + data); //
                });
    }
    function request_donatepay() { // setTimeout - однократно, setInterval - многократно
        let limit = '&limit=100';// лимит записей в ответе о жонатах в документации написано до 100 и 25 по умолчанию. Но по факту 10 по умолчанию
        //url='wqeqeqw';
        //apiToken='TxBToJ7CNy36dXuyvWts8d9HIzTjNGjlP4k2Fun79vJedd1ARJUOHUdScHlz';// My
        let apiToken = 'ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c';// Gruve
        //ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c
        //url='https://donatepay.ru/api/v1/transactions?'+access_token='+ apiToken+limit;
        //url='https://donatepay.ru/api/v1/transactions?access_token='+ apiToken+limit;
        let url = 'https://donatepay.ru/api/v1/transactions?access_token=ASs0sjlGhpani8ztIwBA0EBT4h7AZY27Wz4TU7P0PXt9KFb4glprT1Cve13c&limit=100';

        $.getJSON(url,
                function (data) {
                })
                .done(function (data) {
                    myconsolelog('second success typeof=' + typeof data); // "string" проверка на тип поступающих данных- с donatepay получаем  object
                    if (typeof data === "object")
                    {
                        //jornal(' Тест  jornal ');
                        if (data.status === "success") {// если ответ от donatepay удачный
                            myconsolelog(data.data.status);//success
                            if (data.data.length) {// если  с success больше 0
                                myconsolelog("data.data.length больше 0");//=100 не должно быть меньше 1. Т.е от 1до 100
                                let successArray = data.data.filter(function (number) {//Создаем новый массив,оставляем только те элементы массива data  в котором присутствуют только те что status= success
                                    return number.status === "success";
                                });
                                successArray = successArray.filter(function (number) {//оставляем только те элементы массива data  в котором присутствуют только те что id> localStorage["id_lost"]
                                    return number.type === "donation";
                                });
                                myconsolelog(successArray);// новый массив в котором в data присутствуют только те что status= success
                                myconsolelog('second success typeof=' + typeof successArray);
                                if (successArray.length) {// если больше 0 элементов в новом массиве
                                    myconsolelog("successArray.length больше 0");
                                    myconsolelog(successArray[0].id);// узнаем id последнего элемента нового массива
                                    // нужно проверить id  последнего сообщения в массиве ответа с хранящимся в localStorage["id_lost"]
                                    myconsolelog('1 successArray.length =' + successArray.length);
                                    if (successArray[0].id != localStorage["rulette_id_lost"]) {
                                        myconsolelog('Есть новое(ые) поступления донатов');
                                        // поиск всех поступлений
                                        let idsuccessArray = successArray.filter(function (number) {//оставляем только те элементы массива data  в котором присутствуют только те что id> localStorage["id_lost"]
                                            return number.id > localStorage["rulette_id_lost"];
                                        });
                                        myconsolelog('2 idsuccessArray.length =' + idsuccessArray.length);
                                        myconsolelog(idsuccessArray);//
                                        let i = idsuccessArray.length - 1;// номер самого раннего поступления доната в примере из 10 штук=9
                                        let name = '';
                                        myconsolelog('i=' + i);
                                        if ((localStorage["rulette_status"] === 'start') && (localStorage["rulette_complete"] === 'false')) {// если рулетка запущена и незавершена
                                            // добавляем последовательно суммы к рулетке проверяя и изменяя rulette_sum, rulette_sum_max, rulette_complete учитывая количество эдементов в массиве i

                                            while ((Number(localStorage["rulette_sum"]) < Number(localStorage["rulette_max_sum"])) && (localStorage["rulette_complete"] === 'false') && (i >= 0)) {
                                                myconsolelog('localStorage[rulette_sum]<localStorage[rulette_sum_max]');
                                                myconsolelog(localStorage["rulette_sum"]);
                                                myconsolelog('i i--=' + i);
                                                localStorage["rulette_sum"] = Number(localStorage["rulette_sum"]) + Number(idsuccessArray[i].sum); // добавляем сумму каждого перевода последовательно к общей сумме rulette_sum
                                                //localStorage["rulette_sum"]=Number(localStorage["rulette_sum"])+1000;
                                                //Определения Name
                                                name = idsuccessArray[i].what;
                                                myconsolelog(' name=' + name);
                                                //myconsolelog(' idsuccessArray[i].id='+ idsuccessArray[i].id);
                                                myconsolelog(localStorage["rulette_sum"]);
                                                i--;
                                            }
                                            // если сумма набрана то localStorage["rulette_max_sum"]= true 
                                            if (Number(localStorage["rulette_sum"]) >= Number(localStorage["rulette_max_sum"])) {
                                                localStorage["rulette_complete"] = 'true';
                                                myconsolelog('Рулетка завершена !!!');
                                                localStorage["rulette_winner"] = name;
                                            }
                                        }

                                    } else {
                                        myconsolelog('Новых поступлений донатов не обнаружено');
                                    }
                                    myconsolelog(Number(successArray[0].sum) + 1);// узнаем sum последнего элемента нового массива, преобразуем сторку в число
                                    localStorage["rulette_id_lost"] = successArray[0].id;//записываем этот id в localstorage id_lost
                                    //localStorage["id_lost"]=0;
                                    myconsolelog(localStorage["rulette_id_lost"]);//проверим что записалось
                                } else {// если записей не оказалось то записываем любое значение меньше тех что доллжно быть, например 0
                                    localStorage["rulette_id_lost"] = 0;
                                }
                            } else {
                                jornal(' error data.data.length=0 Нет записей с завершенными транзакциями');
                                myconsolelog(' error data.data.length=0 Нет записей с завершенными транзакциями');
                            }
                        } else {
                            jornal('data.status not "success"');
                            myconsolelog('data.status not "success"');
                        }
                    } else {
                        jornal('error This Not Object');
                        myconsolelog('error This Not Object');
                    }
                })
                .fail(function (data) {
                    jornal('error request donatepay');
                    myconsolelog('request donatepay');
                });
    }
    if (test_mode === true) {// если включен журнал мод то разрешаем отправку и получения сообщения на сервер
        let request_donatepay_ = setTimeout(function () {
            request_donatepay();
        }, request_donatepay_setInterval);// таймер опроса в продакшене долден быть больше 20 секунд и setInterval. Это ограничение в 20 сек API donatepay
    } else {
        let request_donatepay_ = setInterval(function () {
            request_donatepay();
        }, request_donatepay_setInterval);// таймер опроса в продакшене долден быть больше 20 секунд и setInterval. Это ограничение в 20 сек API donatepay   
    }
    if (jornal_mode === true) {// если включен журнал мод то разрешаем отправку и получения сообщения на сервер
        let request_jornal_first_ = setInterval(function () {
            request_jornal_first();
        }, jornal_mode_setInterval);
    }
    console.log('donatepayController');
}
