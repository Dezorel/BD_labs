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

$sql2 = "DELETE FROM `person` WHERE id_person = $delPerson";
$query2 = $db->prepare($sql2);
$query2->execute();



header("Location: test.php");
exit();
?>