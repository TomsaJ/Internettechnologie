<html>
<meta http-equiv="refresh" content="3; user.php">
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
    $user->setPassword(sha1($password));
    
    // Eintrag in die Datenbank speichern
    $user->save();
    
    // Erfolgsmeldung anzeigen
    try {
        // Die Kategorie in die Datenbank einfügen
        $user->save();
        
        // Erfolgreiche Nachricht anzeigen
        echo '<h1>User wurde erfolgreich hinzugefügt</h1>';
        echo "User:" .$username . "<br />";
        echo "Password:" . $password;
    } catch (Exception $e) {
        // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
        echo "Fehler beim Hinzufügen der Kategorie: " . $e->getMessage();
    }
}

?>

</html>