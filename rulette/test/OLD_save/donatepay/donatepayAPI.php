<?php 
/*
{
 "status": "success",
 "time": {
  "date": "2019-05-14 19:01:10.960762",
  "timezone_type": 3,
  "timezone": "Europe/Moscow"
 },
 "message": "Операция выполнена успешно"
}
*/
//https://github.com/antimYT/DonatePayAPI
//https://widget.donatepay.ru/widgets/notification/ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf/settings?target=&sum=322&name=DonatePay
//https://donatepay.ru/api/v1/notification
//https://widget.donatepay.ru/widgets/notification/ddefc0864b4c0e45df53b34235b20bcb5c25a8b904c999a27c74e4a77a406cdf/settings?id=4481449&target=&sum=30&name=sdsad
//https://donatepay.ru/widgets/lastTransactions/ajax?last_id=6666244&last_date=2019-05-14+20%3A38%3A01      в ответе параметр date это время в сек прошедшее с момента транзакции-сообщения
// last_id=6666244 это id сообщения с какого начинать показывать
/*
{"last_id":6666294,"transactions":[{"id":6666273,"name":"ewew","comment":"dsdsafdsfdsfdsfds","sum":"60.00","currency":"&#8381;","type":"donation","video_link":null,
"notification":"4482177","date":199},{"id":6666294,"name":"ewew","comment":"dsdsafdsfdsfdsfds","sum":"60.00","currency":"&#8381;","type":"donation","video_link":null,
"notification":"4482191","date":136}],"last_date":"2019-05-14 20:41:03"}
*/

/*
{"last_id":6666352,"transactions":[{"id":6666273,"name":"ewew","comment":"dsdsafdsfdsfdsfds","sum":"60.00","currency":"&#8381;","type":"donation","video_link":null,
"notification":"4482177","date":714},{"id":6666294,"name":"ewew","comment":"dsdsafdsfdsfdsfds","sum":"60.00","currency":"&#8381;","type":"donation","video_link":null,
"notification":"4482191","date":651},{"id":6666352,"name":"ewew","comment":"dsdsafdsfdsfdsfds","sum":"67.00","currency":"&#8381;","type":"donation","video_link":null,
"notification":"4482246","date":346}],"last_date":"2019-05-14 20:46:10"}
*/
//view-source:https://donatepay.ru/widgets/lastTransactions/modal



//Работает get запрос
//https://donatepay.ru/api/v1/transactions?access_token=TxBToJ7CNy36dXuyvWts8d9HIzTjNGjlP4k2Fun79vJedd1ARJUOHUdScHlz