<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/src/SimpleXLSX.php';
include 'mysql.php';

echo "<h1>New Event Management Warehouse to SQL Parser</h1> \n";

if (isset($_FILES['file'])) {
	
	if ( $xlsx = SimpleXLSX::parse( $_FILES['file']['tmp_name'] ) ) {

		//echo '<h2>Parsing Result</h2>';
		//echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';

		$dim = $xlsx->dimension();
		$cols = $dim[0];


		foreach( $xlsx->rows() as $r ) {
		//     VALUES (NULL, '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '');		    
		    $sql_insert = "INSERT INTO `sprzet` (`model`, `nazwa`, `typ`, `ilosc`, `nr`, `barcode`, `magazyn`, `miejsce`, `szerokosc`, `wysokosc`, `glebokosc`, `objetosc`, `waga`, `moc`, `kategoria`, `nrseryjny`) VALUES ('".implode('\',\'', $r )."')";
		if(!$result = $db->query($sql_insert)){
    die('There was an error running the query sql_insert [' . $db->error . ']');
}

		echo "Dodano rekord!<br>";

}

		//echo '</table>';



// 	print_r($xlsx);

	} else {
		echo SimpleXLSX::parseError();
	}
}
echo '<h2>Upload form</h2>
<form method="post" enctype="multipart/form-data">
*.XLSX <input type="file" name="file"  />&nbsp;&nbsp;<input type="submit" value="Parse" />
</form>';
