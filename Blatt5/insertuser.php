<?php

// setup the autoloading
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/generated-conf/config.php';
use generatedclasses\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formulardaten abrufen
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Neue Instanz des Propel-Modells 'User' erstellen
    $user = new User();
    $user->setUsername($username);
    $user->setPassword($password);
    
    // Eintrag in die Datenbank speichern
    $user->save();
    
    // Erfolgsmeldung anzeigen
    echo 'Benutzer erfolgreich hinzugefügt.';
}

?>