<?php
require "db_connect.php";
require "functions.php";

global $db;

$deleteAct = $_POST["del_activity"];

$activityToDelete = getActivity();
foreach($activityToDelete as $act) {

    if($act['id_action'] == $deleteAct)      $delPerson = $act['id_person'];
}
echo $delPerson;
$sql= "DELETE FROM `action` WHERE  id_action = $deleteAct";    
$query = $db->prepare($sql);
$query->execute();

$per = getPersonToDelete();
foreach($per as $p){
    if($p['id_person'] == $delPerson)       
    {
        $delGift = $p['id_gift'];
        $delDwelling = $p['id_dwelling'];
    }
}

$sql2 = "DELETE FROM `person` WHERE id_person = $delPerson";
$query2 = $db->prepare($sql2);
$query2->execute();

$sql3= "DELETE FROM `gift` WHERE id_gift = $delGift";
$query3 = $db->prepare($sql3);
$query3->execute();

$sql4= "DELETE FROM `dwelling` WHERE id_dwelling = $delDwelling";
$query4 = $db->prepare($sql4);
$query4->execute();

header("Location: test.php");
exit();
?>