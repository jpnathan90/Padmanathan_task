<?php
require 'db.php';
//Get the details from the table2 and update table1
try {
	$query = "update padmanathan_characters table1 INNER JOIN characterupdates table2 ON table1.id = table2.id SET table1.name = table2.name, table1.height = table2.height, table1.mass = table2.mass, table1.hair_color = table2.hair_color, table1.skin_color = table2.skin_color, table1.eye_color = table2.eye_color, table1.birth_year = table2.birth_year, table1.gender = table2.gender, table1.created = table2.created, table1.homeworld_name = table2.homeworld_name, table1.species_name = table2.species_name";
	
	db::getInstance()->dbquery($query); //updating details into database table
	echo "Updated Successfully. Please check the padmanathan_characters table";
} catch(Exception $e) {
  echo 'Error Message: ' .$e->getMessage();
}
?>