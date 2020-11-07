<?php
$my_host = 'localhost';
$username = 'root';
$password = '';
$database = 'story';

$link = mysqli_connect($my_host, $username, $password, $database);


if(mysqli_connect_errno() )  
{
    die ('Ошибка в подключении к БД ('.mysqli_connect_errno().') : '.mysqli_connect_error());           // выводит ошибку если она есть
    exit();     // завершаем работу приложения, останавливает работу php скриптов
}

?>