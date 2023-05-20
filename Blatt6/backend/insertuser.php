
<html>

<?php

// setup the autoloading
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';

use \generatedclasses\User;
include 'hash.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formulardaten abrufen
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    
    // Neue Instanz des Propel-Modells 'User' erstellen
    // Salt und Passwort aus dem gehashten Passwort extrahieren
    // Salt und Passwort aus dem gehashten Passwort extrahieren
    $hashedPassword = generateHash($password);
    $hashedPassword = $hashedPassword;
    
    
    // Neue Instanz des Propel-Modells 'User' erstellen
    $user = new User();
    $user->setUsername($username);
    $user->setPassword($hashedPassword);
    
    // Erfolgsmeldung anzeigen
    try {
        // Die Kategorie in die Datenbank einfügen
        $user->save();
        
        // Erfolgreiche Nachricht anzeigen
        echo '<meta http-equiv="refresh" content="3; ../frontend/user.php">';
        echo '<h1>User wurde erfolgreich hinzugefügt</h1>';
        echo "User: " . $username . "<br />";
        echo "Password: " . $password . "<br />";
        echo "HashPassword: " . $hashedPassword . "<br />";
        echo "Salt:" .$salt;
    } catch (Exception $e) {
        // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
        echo '<h1 style="color: red;">' . $e->getMessage(). '</h1>';
        echo $user;
        echo '<a href="user.php" style="text-decoration:none">
        <button class="textstyle8">Back</button>
    </a>';
    }
}

?>

</html>