<?php

require __DIR__ . '/../vendor/autoload.php';

use SWAPI\SWAPI;

$swapi = new SWAPI;

$result = [];
// Iterate through all pages of species
try {
	do {
		if (!isset($species)) {
			$species = $swapi->species()->index();
		} else {
			// The getNext, getPrevious of Collection indicate whether more pages follow
			$species = $species->getNext();
		}
		$homeWorldName = 'unknown';
		foreach ($species as $v) {
			if (isset($v->classification) && $v->classification == 'mammal') {
				$homeWorld = $v->homeworld->url;
				if ($homeWorld) {
					$homeWorldName = $swapi->getFromUri($homeWorld)->name;
					if (!$homeWorldName) {
						$homeWorldName = 'unknown';
					}
				}
				$result[] = ['name' => $v->name, 'homeworldName' => $homeWorldName];
			}
		}
	} while ($species->hasNext());
} catch(Exception $error) {
	if ($error->getCode() == 503) {
		echo 'Error Message: SWAPI Service Unreachable. Please try after some time';
		return;
	}
	echo "Exception:" . $error->getMessage();
	exit;
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
	echo "<h2>List of all characters that are 'mammals' (species) in all Star Wars films, and the name of their homeworld.</h2>";
	echo "<table border = '1'>
				<tr>
					<th>Mammals</th>
					<th>Homeworld Names</th>
				</tr>";
	foreach($result as $mammal) {
		echo "<tr>
				<td>".$mammal['name']."</td>
				<td>".$mammal['homeworldName']."</td>
			  </tr>";
	}			  
	echo "</table>"
	?>
</body>
</html>
