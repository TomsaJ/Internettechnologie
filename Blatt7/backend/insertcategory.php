<html>
<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';

use generatedclasses\Category;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Daten aus dem Formular abrufen
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    // Ein neues Category-Objekt erstellen
    $category = new Category();
    $category->setId($id);
    $category->setName($name);
    $category->setDescription($description);
    
    try {
        // Die Kategorie in die Datenbank einfügen
        $category->save();
        
        // Erfolgreiche Nachricht anzeigen
        $message = "Hinzugefügt";
        $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } catch (Exception $e) {
        // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
        $message = "Nicht hinzugefügt. ID vorhanden";
        $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
}
?>

</html>