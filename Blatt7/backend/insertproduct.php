<?php

session_start(); 
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
    
    // Erfolgsmeldung ausgeben

?>
