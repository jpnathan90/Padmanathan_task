<?php

require __DIR__ . '/../vendor/autoload.php';

use SWAPI\SWAPI;

$swapi = new SWAPI;

$result = [];
try{
	// Iterate through all pages of vehicles
	do {
		if (!isset($vehicles)) {
			$vehicles = $swapi->vehicles()->index();
		} else {
			// The getNext, getPrevious of Collection indicate whether more pages follow
			$vehicles = $vehicles->getNext();
		}

		foreach ($vehicles as $v) {
			if (strlen($v->name) < 15) { 
				break;
			}
			$films = $v->films;
			foreach($films as $film) {
				$filmUrl = $film->url;
				$filmNames[] = $swapi->getFromUri($filmUrl)->title;
			}

			$result[] = ['name' => $v->name, 'filmName' => implode(', ', $filmNames)];
			$filmNames = [];
			
			//echo sprintf("%s - %s\n", $v->name, $v->url);
		}
	} while ($vehicles->hasNext());
} catch(Exception $error) {
	if ($error->getCode() == 503) {
		echo 'Error Message: SWAPI Service Unreachable. Please try after some time';
		return;
	}
	echo "Exception:" . $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Southern Phone Company - Mammal HomeWorlds</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php
	if (empty($result)) {
		echo "No results found";
		exit;
	}
	echo "<h2>Name of all SWAPI api vehicles that can has a name of more than 15 characters in length and film they appear.</h2>";
	echo "<table border = '1'>
				<tr>
					<th>Mammals</th>
					<th>Homeworld Names</th>
				</tr>";
	foreach($result as $vehicleDetails) {
		echo "<tr>
				<td>".$vehicleDetails['name']."</td>
				<td>".$vehicleDetails['filmName']."</td>
			  </tr>";
	}			  
	echo "</table>"
	?>
</body>
</html>