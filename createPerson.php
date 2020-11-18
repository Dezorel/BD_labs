<?php
require "db_connect.php";
require "functions.php";
global $db;

if(!empty($_POST["person_name"]) && !empty($_POST["activity"]) && !empty($_POST["season"]) 
    && !empty($_POST["gift"]) && !empty($_POST["dwelling"]) )
    {
        $name = $_POST["person_name"];
        $activity = $_POST["activity"];
        $season = $_POST["season"];
        $gift = $_POST["gift"];
        $dwelling = $_POST["dwelling"];

        //XSS
        $name = htmlspecialchars($name);
        $activity = htmlspecialchars($activity);
        $season = htmlspecialchars($season);
        $gift = htmlspecialchars($gift); 
        $dwelling = htmlspecialchars($dwelling);

        //подготовленный запрос gift
        $query = $db->prepare("INSERT INTO gift SET name_gift=:name_gift");
        $params = ["name_gift"=> $gift];
        $query->execute($params);
        $lastIDGift = $db->lastInsertId();

         //подготовленный запрос season
        $date = getSeason();
        $curEqualSeason=0;
        foreach($date as $d) {
            if($d['name_season'] == $season)  
            {
                $curEqualSeason++;
                $lastIDSeason = $d['id_season'];
                break;
            } 
            }
            
        if($curEqualSeason==0){
            $query = $db->prepare("INSERT INTO season SET name_season=:name_season");
            $params = ["name_season"=> $season];
            $query->execute($params);
           $lastIDSeason = $db->lastInsertId();
        }
        

        
         //подготовленный запрос dwelling
         $query = $db->prepare("INSERT INTO dwelling SET name_dwelling=:name_dwelling");
         $params = ["name_dwelling"=> $dwelling];
         $query->execute($params);
        $lastIDDwelling= $db->lastInsertId();

        //подготовленный запрос person
        $query = $db->prepare("INSERT INTO person SET name_person=:name_person, id_gift= $lastIDGift, id_dwelling= $lastIDDwelling");
        $params = ["name_person"=> $name];
        $query->execute($params);
        $lastIDPerson = $db->lastInsertId();

        //подготовленный запрос activity
        $query = $db->prepare("INSERT INTO `action` SET name_action=:name_activity, id_season= $lastIDSeason, id_person = $lastIDPerson");
        $params = ["name_activity"=> $activity];
        $query->execute($params);




        //завершаем отправку формы и возвращаемся на страницу
        header("Location: test.php");
        exit();
    }
    else {
        echo"<h1 align='center'>Ошбика создания персонажа!</h1>";
        echo"<h1 align='center'>Заполните все поля!</h1>";
    }

function insertTable() {
    
}
    
   
?>