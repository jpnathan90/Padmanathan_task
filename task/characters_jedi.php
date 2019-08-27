<?php

require __DIR__ . '/../vendor/autoload.php';

use SWAPI\SWAPI;

$swapi = new SWAPI;

try {
	$characterNames = [];
	$filmDetails = $swapi->films()->search('Return Of The Jedi');
	if ($filmDetails != '') {
		$film = reset($filmDetails['results']);
		if(isset($film['characters']) && count($film['characters']) > 0) {
			foreach ($film['characters'] as $chares) {
				$characterNames[] = $swapi->getFromUri($chares)->name;
			}
		}
	}
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
<title>Southern Phone Company -  Return Of The Jedi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php
	if (empty($characterNames)) {
		echo "No results found";
		exit;
	}
	echo "<h2>Lists all character names in the film 'Return Of The Jedi'.</h2>";
	echo "<table border = '1'>
				<tr>
					<th>List of characters</th>
				</tr>";
	foreach($characterNames as $characterName) {
		echo "<tr>
				<td>".$characterName."</td>
			  </tr>";
	}			  
	echo "</table>"
	?>
</body>
</html>
