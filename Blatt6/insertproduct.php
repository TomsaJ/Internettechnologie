<?php


// setup the autoloading
require_once __DIR__ . '/vendor/autoload.php';
// setup Propel
require_once __DIR__ . '/generated-conf/config.php';

use generatedclasses\Product;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Daten aus dem Formular abrufen
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $description = $_POST['description'];
    
    // Erstellen Sie ein neues Objekt der Tabelle "Product"
    $product = new Product();
    $product->setId($id);
    $product->setName($name);
    $product->setPrice($price);
    $product->setWidth($width);
    $product->setHeigth($height);
    $product->setDescription($description);
    
    // Speichern Sie das Produkt in der Datenbank
    try {
        // Die Kategorie in die Datenbank einfügen
        $product->save();
        
        // Erfolgreiche Nachricht anzeigen
        echo "Kategorie wurde erfolgreich hinzugefügt";
    } catch (Exception $e) {
        // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
        echo "Fehler beim Hinzufügen der Kategorie: " . $e->getMessage();
    }
}
    
    // Erfolgsmeldung ausgeben

?>
