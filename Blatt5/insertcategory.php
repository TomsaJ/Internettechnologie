<?php

// setup the autoloading
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/generated-conf/config.php';
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
        echo "Kategorie wurde erfolgreich hinzugefügt";
    } catch (Exception $e) {
        // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
        echo "Fehler beim Hinzufügen der Kategorie: " . $e->getMessage();
    }
}
?>