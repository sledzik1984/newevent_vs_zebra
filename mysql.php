<?php

//Default timezone
date_default_timezone_set('Europe/Warsaw');

//Łaczymy się z bazą

$dbserver = "localhost";

//Nazwa użytkownika
$user = "user";

//Hasło
$pass = "pass";

//Nazwa bazy danych
$database = "newevent";


$db = new mysqli($dbserver, $user, $pass, $database);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

//Ustawiamy kodowanie:

$query_utf = "SET NAMES `utf8`";

if(!$result = $db->query($query_utf)){
    die('There was an error running the query [' . $db->error . ']');
}

?>

