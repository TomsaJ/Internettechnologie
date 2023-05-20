<html>
<?php

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
        echo '<meta http-equiv="refresh" content="3; catalog.php">';
        echo '<h1>Kategorie wurde erfolgreich hinzugefügt</h1>';
        echo "Category:" .$name . "<br />";
        echo "Description:" . $description;
    } catch (Exception $e) {
        // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
        echo "Fehler beim Hinzufügen der Kategorie: " . $e->getMessage() . "<br />";
        echo '<h1 style="color: red;">ID vorhanden</h1>';
        echo '<a href="catalog.php" style="text-decoration:none">
        <button class="textstyle8">  Back</button>
        </a>';
        
    }
}
?>

</html>