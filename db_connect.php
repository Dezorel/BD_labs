<?php
$my_host = 'localhost';
$username = 'root';
$password = '';
$database = 'story';

//$link = mysqli_connect($my_host, $username, $password, $database);

try{                                                                                                //подключение с помощью ПДО и проверка на подключение
    $db = new PDO('mysql:host='.$my_host.';dbname='.$database, $username, $password);
    $db->exec("SEET NAMES UTF8");
}catch(Exception $e){
    die("Не удалось подключиться". $e->getMessage());
}


// if(mysqli_connect_errno() )  
// {
//     die ('Ошибка в подключении к БД ('.mysqli_connect_errno().') : '.mysqli_connect_error());           // выводит ошибку если она есть
//     exit();     // завершаем работу приложения, останавливает работу php скриптов
// }

?>