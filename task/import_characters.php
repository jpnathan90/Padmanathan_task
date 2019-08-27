<?php
require 'db.php';
// Iterate through all pages of species
try {
	do {
		if (!isset($peoples)) { // Get the first page results
			$peoples = $swapi->peoples()->index();
		} else {
			// The getNext, getPrevious of Collection indicate whether more pages follow
			$peoples = $peoples->getNext();
		}
		
		$homeWorldName = 'unknown';
		$speciesName   = 'unknown';
		
		foreach ($peoples as $v) {
			//To Get the homeworld
			$homeWorld = $v->homeworld->url;
			if ($homeWorld) {
				$homeWorldName = $swapi->getFromUri($homeWorld)->name;
				if (!$homeWorldName) {
					$homeWorldName = 'unknown';
				}
			}
			//To Get the Species Name
			$species = (isset($v->species) && (count($v->species) > 0)) ? reset($v->species)->url : 'unknown';
			if ($species && $species != 'unknown') {
				$speciesName = $swapi->getFromUri($species)->name;
				if (!$speciesName) {
					$speciesName = 'unknown';
				}
			}
			$query = "INSERT INTO `padmanathan_characters`(`name`,`height`,`mass`,`hair_color`,`skin_color`,`eye_color`,`birth_year`,`gender`,`homeworld_name`,`species_name`) VALUES ('".$v->name."', '".$v->height."', '".$v->mass."', '".$v->hair_color."', '".$v->skin_color."', '".$v->eye_color."', '".$v->birth_year."', '".$v->gender."', '".$homeWorldName."', '".$speciesName."');";
			db::getInstance()->dbquery($query); //Inserting details into DB
		}
	} while ($peoples->hasNext());
	echo "Imported Successfully. Please check the padmanathan_characters table";
} catch(Exception $e) {
	if ($e->getCode() == 503) {
		echo 'Error Message: SWAPI Service Unreachable. Please try after some time';
		return;
	}
	echo 'Error Message: ' .$e->getMessage();
}
?>