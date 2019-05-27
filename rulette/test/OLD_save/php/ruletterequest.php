<?php
//mb_internal_encoding("UTF-8");
//header('Content-Type: application/json');
header("Content-Type: text/html; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');
//echo 'ruletterequest';
$request = $_POST['request'];
if ($request == "first") {
    // Здесь должны отправить последнюю дату журнала на сервере
    //echo 'request==first ';
    //$str = "Это проверка функции jornal :lenght jornal=647|2019-05-23T17:26:07.885Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:27:17.799Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:27:49.947Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:29:09.571Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:29:25.689Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:37:21.912Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:38:12.927Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:41:44.809Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:42:18.193Z#Это проверка функции jornal :lenght jornal=647|2019-05-23T17:51:43.387Z";
$str = file_get_contents('rulettejornal.txt');    // убираем лишние символы переноса строки
$str = str_replace(array("\r\n", "\r", "\n"), '',  strip_tags($str));
    $number = strrpos($str, '|') + 1;
    //echo '$number=' . $number . '<br>strlen($str)=' . strlen($str) . '<br>';
    $str = substr($str, $number);
    //echo "str с вырезанной датой:$str";
    if(!$str){
         echo '2019-05-26T12:49:52.672Z';   
    }else{
        echo $str;    
    }

} else if ($request == "second") {
    //echo "request_jornal_second=request==second ";
    // дописываем в файл
    $jornal = $_POST['jornal'];
    $filename = 'rulettejornal.txt';
    //$somecontent = "Добавить это к файлу\n";
// Вначале давайте убедимся, что файл существует и доступен для записи.
    if (is_writable($filename)) {

        // В нашем примере мы открываем $filename в режиме "дописать в конец".
        // Таким образом, смещение установлено в конец файла и
        // наш $somecontent допишется в конец при использовании fwrite().
        if (!$handle = fopen($filename, 'a')) {
            echo "Не могу открыть файл ($filename)";
            exit;
        }

        // Записываем $jornal в наш открытый файл.
        if (fwrite($handle, $jornal) === FALSE) {
            echo "Не могу произвести запись в файл ($filename)";
            exit;
        }

        //  echo "Ура! Записали ($somecontent) в файл ($filename)";

        fclose($handle);
    } else {
        echo "Файл $filename недоступен для записи";
    }
    $rulettejornal = file_get_contents('rulettejornal.txt');
//echo "содержимое файла: $rulettejornal";
} else {
    echo "Неверно введен логин или пароль";
}
$str = file_get_contents('rulettejornal.txt');    // убираем лишние символы переноса строки
//$str = str_replace(array("\r\n", "\r", "\n"), '',  strip_tags($str));
$str=str_replace("Z","\r\n",$str);// использую символ Z в конце даты времени и заменяю его на перенос стри для удобного просмотра тестового фала журнала

    $filename = 'rulettejornal_.txt';// записываю  в новый файл для удобного просмотра
    //$somecontent = "Добавить это к файлу\n";
// Вначале давайте убедимся, что файл существует и доступен для записи.
    if (is_writable($filename)) {

        // В нашем примере мы открываем $filename в режиме "дописать в конец".
        // Таким образом, смещение установлено в конец файла и
        // наш $somecontent допишется в конец при использовании fwrite().
        if (!$handle = fopen($filename, 'w')) {
            echo "Не могу открыть файл ($filename)";
            exit;
        }

        // Записываем $jornal в наш открытый файл.
        if (fwrite($handle, $str) === FALSE) {
            echo "Не могу произвести запись в файл ($filename)";
            exit;
        }

        //  echo "Ура! Записали ($somecontent) в файл ($filename)";

        fclose($handle);
    } else {
        echo "Файл $filename недоступен для записи";
    }
