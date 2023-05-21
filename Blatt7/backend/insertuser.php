
<html>

<?php
session_start();
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
        $message = "Hinzugefügt";
        $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } catch (Exception $e) {
        // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
        $message = "Nicht hinzugefügt. User vorhanden";
        $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
}

?>

</html>