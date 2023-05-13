<?php



// setup the autoloading
require_once __DIR__ . '/vendor/autoload.php';
// setup Propel
require_once __DIR__ . '/generated-conf/config.php';
use generatedclasses\Product;
use generatedclasses\CategoryQuery;
$product = new Product();
$product->setId(8);
$product->setName("Mercedes");
$product->setPrice(14000.99);
$product->setWidth(10);
$product->setHeigth(20);
$product->setDescription("gebraucht");

$category = CategoryQuery::create()->findOneById(2);

$product->addCategory($category);

$affectedRows = 0;
try {
    $affectedRows = $product->save();
} catch (Exception $e){
    echo "Fehler beim Speichern!";
}
echo "Betroffene Zeilen: " . $affectedRows;
?>