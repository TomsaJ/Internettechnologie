<?php
use generatedclasses\User;
include 'hash.php';

// setup the autoloading
require_once __DIR__ . '/vendor/autoload.php';
// setup Propel
require_once __DIR__ . '/generated-conf/config.php';


$user = new User();
$user->setUsername('Lina');
$password = generateHash('123');
$user->setPassword($password['hash']);

$user->setSalt($password['salt']);
$affectedRows = 0;
try {
    $affectedRows = $user->save();
} catch (Exception $e){
    echo "Fehler beim Speichern!";
    echo "Betroffene Zeilen: " . $affectedRows;
}

?>