<?php


require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';

use generatedclasses\Product;
use generatedclasses\ProductCatalogy;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Daten aus dem Formular abrufen
    $cat_id = $_POST['cat_id'];
    $pro_id = $_POST['pro_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $description = $_POST['description'];
    
    // Erstellen Sie ein neues Objekt der Tabelle "Product"
    $product = new Product();
    $product->setId($pro_id);
    $product->setName($name);
    $product->setPrice($price);
    $product->setWidth($width);
    $product->setHeigth($height);
    $product->setDescription($description);
    
    
    $category = new ProductCatalogy();
    $category->setCategoryId($cat_id);
    $category->setProductId($pro_id);
    
    
    
    // Speichern Sie das Produkt in der Datenbank
    try {
        // Die Kategorie in die Datenbank einfügen
        
        $product->save();
        $category->save();
        // Erfolgreiche Nachricht anzeigen
        echo '<meta http-equiv="refresh" content="3; product.php">';
        echo '<h1>User wurde erfolgreich hinzugefügt</h1>';
    } catch (Exception $e) {
        // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
        echo "Fehler beim Hinzufügen der Kategorie: " . $e->getMessage();
        echo '<a href="catalog.php" style="text-decoration:none">
        <button class="textstyle8">  Back</button>
        </a>';
    }
}
    
    // Erfolgsmeldung ausgeben

?>
