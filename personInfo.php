<?php


$activity = getPersonPlusSeasonPlusAction();

$person = getPersons();
    $belka = $person[0]['name_person'] ;
    $medved = $person[1]['name_person'] ;
    $zaiats = $person[2]['name_person'] ;
	$vorobei = $person[3]['name_person'] ;
    $ded_moroz = $person[4]['name_person'] ;

	foreach($activity as $pers) {
		if($pers['name_season'] == "winter")
			switch($pers['name_person']) {
				case $belka:
                        $actionWinterBelka = $pers['name_action'];
						break;
					
				case $medved:
                        $actionWinterMedved = $pers['name_action'];
				    	break;
					
				case $zaiats:
                        $actionWinterZaiats = $pers['name_action'];
						break;
					
				case $vorobei:
                        $actionWinterVorobei = $pers['name_action'];
						break;
					
				case $ded_moroz:
                        $actionWinterDedMoroz = $pers['name_action'];
						break;
			}
       
        if($pers['name_season'] == "spring")
			switch($pers['name_person']) {
				case $belka:
                        $actionSpringBelka = $pers['name_action'];
						break;
					
				case $medved:
                        $actionSpringMedved = $pers['name_action'];
				    	break;
					
				case $zaiats:
                        $actionSpringZaiats = $pers['name_action'];
						break;
					
				case $vorobei:
                        $actionSpringVorobei = $pers['name_action'];
						break;
            }
            
        if($pers['name_season'] == "autumn")
			switch($pers['name_person']) {
				case $belka:
                        $actionAutumnBelka = $pers['name_action'];
						break;
					
				case $zaiats:
                        $actionAutumnZaiats = $pers['name_action'];
						break;
					
				case $vorobei:
                        $actionAutumnVorobei = $pers['name_action'];
						break;
					
				
			}
        }
        
    $gifts = getGiftPerson();
    foreach($gifts as $gift) {
		if($gift['name_person'] == $belka)    $giftBelka = $gift['name_gift'];
        if($gift['name_person'] == $medved)    $giftMedved = $gift['name_gift'];
        if($gift['name_person'] == $vorobei)    $giftVorobei = $gift['name_gift'];
        if($gift['name_person'] == $zaiats)    $giftZaiats = $gift['name_gift'];
        }
?>