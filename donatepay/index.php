<?php
$access_token='TxBToJ7CNy36dXuyvWts8d9HIzTjNGjlP4k2Fun79vJedd1ARJUOHUdScHlz';
$json = "https://donatepay.ru/api/v1/transactions?access_token=$access_token";
$jsonfile = file_get_contents($json);
//$jsonfile='dfsdagfasdgafm,tyhrtyrt';
$json_decode=json_decode($jsonfile);
echo count($json_decode->data);//подсчитываем количество элементов
//echo $json_decode; // так не работает
/*if($json_decode)
	{
	if ($json_decode->status=='success')// если ответ удачный
		{
		if (count($json_decode->data))// если есть записи
			{
			//echo $json_decode->count;
			}else
				{
				echo 'Ошибка в ответе c count';
				}
		
		}else 
			{
			echo 'Ошибка в ответе';
			}
	}else
		{
		echo 'Ошибка возвращаемого  JSON';
		}
*/
//var_dump($json_decode);
//echo $json_decode->status;
//echo $json_decode->time->timezone;
//echo $json_decode->count;
//echo json_last_error_msg();
?>