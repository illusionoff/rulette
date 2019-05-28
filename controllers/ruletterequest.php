<?php
//header('Content-Type: application/json');
header('Content-type:text/html');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');
//echo 'ruletterequest';
 $login=$_POST['login'];
    $pass=$_POST['password'];
    if($login=="1111" && $pass=="2222"){
        echo "Авторизация прошла успешно";
    }
    else{
        echo "Неверно введен логин или пароль";
    }
$filename = 'rulettejornal.txt';
$somecontent = "Добавить это к файлу\n";

// Вначале давайте убедимся, что файл существует и доступен для записи.
if (is_writable($filename)) {

    // В нашем примере мы открываем $filename в режиме "дописать в конец".
    // Таким образом, смещение установлено в конец файла и
    // наш $somecontent допишется в конец при использовании fwrite().
    if (!$handle = fopen($filename, 'a')) {
         echo "Не могу открыть файл ($filename)";
         exit;
    }

    // Записываем $somecontent в наш открытый файл.
    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Не могу произвести запись в файл ($filename)";
        exit;
    }
    
    echo "Ура! Записали ($somecontent) в файл ($filename)";
    
    fclose($handle);

} else {
    echo "Файл $filename недоступен для записи";
}
$rulettejornal = file_get_contents('rulettejornal.txt');
echo "содержимое файла: $rulettejornal";

$str="Это проверка функции jornal :lenght jornal=647|2019-05-23T17:26:07.885Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:27:17.799Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:27:49.947Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:29:09.571Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:29:25.689Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:37:21.912Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:38:12.927Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:41:44.809Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:42:18.193Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:51:43.387Z";

$number=strrpos($str,'|')+1;
echo '$number='.$number.'<br>strlen($str)='.strlen($str).'<br>';
$str=substr($str,$number);
echo "str с вырезанной датой:$str";