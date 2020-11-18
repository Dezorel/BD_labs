<?php


/*
belka
medved
zaiats
vorobei
ded-moroz
такая последовательность пероснажей в БД обязательна
*/

//create persons variable for used they in text
$person = getPersons();
$belka = $person[0]['name_person'] ;
$medved = $person[1]['name_person'] ;
$zaiats = $person[2]['name_person'] ;
$vorobei = $person[3]['name_person'] ;
$ded_moroz = $person[4]['name_person'] ;


//create activity variable for used they in text
$activity = getPersonPlusSeasonPlusAction();	
foreach($activity as $act) {
	if($act['name_season'] == "winter")
		switch($act['name_person']) {
			case $belka:
					$actionWinterBelka = $act['name_action'];
					break;
				
			case $medved:
					$actionWinterMedved = $act['name_action'];
					break;
				
			case $zaiats:
					$actionWinterZaiats = $act['name_action'];
					break;
				
			case $vorobei:
					$actionWinterVorobei = $act['name_action'];
					break;
				
			case $ded_moroz:
					$actionWinterDedMoroz = $act['name_action'];
					break;
		}
   
	if($act['name_season'] == "spring")
		switch($act['name_person']) {
			case $belka:
					$actionSpringBelka = $act['name_action'];
					break;
				
			case $medved:
					$actionSpringMedved = $act['name_action'];
					break;
				
			case $zaiats:
					$actionSpringZaiats = $act['name_action'];
					break;
				
			case $vorobei:
					$actionSpringVorobei = $act['name_action'];
					break;
		}
		
	if($act['name_season'] == "autumn")
		switch($act['name_person']) {
			case $belka:
					$actionAutumnBelka = $act['name_action'];
					break;
				
			case $zaiats:
					$actionAutumnZaiats = $act['name_action'];
					break;
				
			case $vorobei:
					$actionAutumnVorobei = $act['name_action'];
					break;
				
			
		}
	}
		
//create gift variable for used they in text
$gifts = getGiftPerson();
foreach($gifts as $gift) {
		if($gift['name_person'] == $belka)    $giftBelka = $gift['name_gift'];
        if($gift['name_person'] == $medved)    $giftMedved = $gift['name_gift'];
        if($gift['name_person'] == $vorobei)    $giftVorobei = $gift['name_gift'];
        if($gift['name_person'] == $zaiats)    $giftZaiats = $gift['name_gift'];
		}
		
//create dwelling variable for used they in text
$dwelling = getPersonPlusDwelling();
foreach($dwelling as $dwl) {
		if($dwl['name_person'] == $belka)    $dwlBelka = $dwl['name_dwelling'];
        if($dwl['name_person'] == $medved)    $dwlMedved = $dwl['name_dwelling'];
        if($dwl['name_person'] == $vorobei)    $dwlVorobei = $dwl['name_dwelling'];
        if($dwl['name_person'] == $zaiats)    $dwlZaiats = $dwl['name_dwelling'];
		}








?>