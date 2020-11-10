<?php


function getPersons() {
	//global $link;	
	// $result = mysqli_query($link, $sql);
	// $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	global $db;
	 $sql = "SELECT name_person FROM `person` ";
	$query= $db->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}

function getPersonPlusSeasonPlusAction() {
	//global $link;	
	// $result = mysqli_query($link, $sql);
	// $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

	global $db;
	 $sql = "SELECT name_person, name_season, name_action FROM (action A join person P on 
	 (A.id_person = P.id_person) ) join season S on (A.id_season = S.id_season) ";
	$query= $db->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}

function getGiftPerson() {			//link - my_sqlli подключение			db- поделючение через ПДО
	//global $link;	
	//$result = mysqli_query($link, $sql);
	//$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

	global $db;
	$sql = "SELECT name_person, name_gift FROM person P join gift G on (P.id_gift = G.id_gift)";
	$query= $db->query($sql);
	$query->execute();
	$data = $query->fetchAll();
	return $data;
}

function getPersonPlusDwelling() {
	global $db;
	$sql = "SELECT name_person, name_dwelling from person p join dwelling d on (p.id_dwelling = d.id_dwelling)";
	$query = $db->query($sql);
	$query->execute();
	return $query->fetchAll();
}

function getSeason(){
	global $db;
	$sql = "SELECT * from season";
	$query = $db->query($sql);
	$query->execute();
	return $query->fetchAll();
}
?>