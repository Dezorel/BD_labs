<?php
require "db_connect.php";
require "functions.php";

global $db;

if(!empty($_POST["gift"]) )
    {
        $name = $_POST["person_name"];
        $activity = $_POST["activity"];
        $season = $_POST["season"];
        $gift = $_POST["gift"];
        $dwelling = $_POST["dwelling"];

        //защищаю от XSS атак
        $name = htmlspecialchars($name);
        $activity = htmlspecialchars($activity);
        $season = htmlspecialchars($season);
        $gift = htmlspecialchars($gift); 
        $dwelling = htmlspecialchars($dwelling);

        
        //подготовленный запрос gift
        
        $query = $db->prepare("UPDATE `gift` SET `name_gift` = :name_gift WHERE `gift`.`id_gift` = 6");
        $params = ["name_gift"=> $gift];
        $query->execute($params);
        $lastIDGift = $db->lastInsertId();



         //завершаем отправку формы и возвращаемся на страницу
         header("Location: test.php");
         exit();
    }
    else {
        echo"<h1 align='center'>Ошбика изменения персонажа!</h1>";
        echo"<h1 align='center'>Заполните все поля!</h1>";
    }


?>