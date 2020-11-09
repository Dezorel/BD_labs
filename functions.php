<?php



function getCategory() {
	global $link;
     $sql = "SELECT * FROM `action` ";
     $result = mysqli_query($link, $sql);

     $data = mysqli_fetch_all($result, MYSQLI_ASSOC);	//получаем данные из БД и выводим их на экран в том виде в котором они хранятся в БД
	
     return $data;
} 

function getPersonTest() {
	global $link;
	$sql = "SELECT name_person FROM `person`  where name_person = 'Vorobei'";
	$result = mysqli_query($link, $sql);

	if($result)
	{
        $row = mysqli_fetch_row($result);
        echo"$row[0]";
    
		
	}

	 $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	 return $data;
}

function getPersons() {
	global $link;
	$sql = "SELECT name_person FROM `person` ";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $data;
}

function getPersonPlusSeasonPlusAction() {
	global $link;
	$sql = "SELECT name_person, name_season, name_action FROM (action A join person P on 
	(A.id_person = P.id_person) ) join season S on (A.id_season = S.id_season) ";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $data;
}

function getGiftPerson() {
	global $link;
	$sql = "SELECT name_person, name_gift FROM person P join gift G on (P.id_gift = G.id_gift)";
	$result = mysqli_query($link, $sql);
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $data;
}
?>