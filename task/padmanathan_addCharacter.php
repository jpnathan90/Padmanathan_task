<?php
require 'db.php';
$result = 'Import failed';
// Iterate through all pages of species
try {
	if (isset($_POST)) {
		extract($_POST);
		$query = "INSERT INTO `padmanathan_characters`(`name`,`height`,`mass`,`hair_color`,`skin_color`,`eye_color`,`birth_year`,`gender`,`homeworld_name`,`species_name`) VALUES ('".$name."', '".$height."', '".$mass."', '".$hair_color."', '".$skin_color."', '".$eye_color."', '".$birth_year."', '".$gender."', '".$homeworld_name."', '".$species_name."');";
		
		db::getInstance()->dbquery($query); //Inserting details into DB
		$result = 'Imported Successfully';
	}
	echo $result;
} catch(Exception $e) {
	echo 'fail: ' .$e->getMessage();
}
?>