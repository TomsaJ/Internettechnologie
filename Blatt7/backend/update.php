<?php


session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';
use generatedclasses\CategoryQuery;
use generatedclasses\Category;
use generatedclasses\ProductQuery;
use generatedclasses\ProductCatalogy;
use generatedclasses\ProductCatalogyQuery;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleId = $_GET['cid'];
    $artId = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    if ($articleId == 1 && $artId !== null) {
        $category = CategoryQuery::create()->findPK($artId);
        $name = $_POST['name'];
        $description = $_POST['description'];
        
        if ($category !== null) {
            //$category->setId($id);
            $category->setName($name);
            $category->setDescription($description);
            
            try {
                // Die Kategorie in die Datenbank aktualisieren
                $category->save();
                
                // Erfolgreiche Nachricht anzeigen
                $_SESSION['message'] = "Die Kategorie wurde erfolgreich aktualisiert.";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            } catch (Exception $e) {
                // Fehlermeldung anzeigen, wenn das Aktualisieren fehlgeschlagen ist
                $_SESSION['message'] = "Fehler beim Aktualisieren der Kategorie: " . $e->getMessage();
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }
        } else {
            $_SESSION['message'] = "Die Kategorie wurde nicht gefunden.";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    }
    if ($articleId == 2 && $artId !== null) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $width = $_POST['width'];
        $height = $_POST['height'];
        
        $product = ProductQuery::create()->findOneById($artId);
        //$delk = ProductCatalogyQuery::create()->findByProductId($artId);
        //$delk->delete();
        
        if (isset($_POST['item'])) {
            $selectedCategories = $_POST['item'];
            unset($_SESSION['selected_categories']);
            
            try {
                foreach ($selectedCategories as $item) {
                    $category = new ProductCatalogy(); // Korrigierter Klassenname
                    $category->setCategoryId($item);
                    $category->setProductId($artId);
                    // Die Kategorie in die Datenbank einfügen
                    $category->save();
                    $_SESSION['message'] = "Die Kategorie wurde erfolgreich aktualisiert.";
                    header("Location: {$_SERVER['HTTP_REFERER']}");
                }
            } catch (Exception $e) {
                // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
                $message = $e;
                $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }
            
            // Löschen des Session-Arrays
            
        }else
        {
            $_SESSION['message'] = "Ungültige Anfrage.";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
        
        
        if ($product !== null) {
            $product->setName($name);
            $product->setPrice($price);
            $product->setWidth($width);
            $product->setHeigth($height);
            $product->setDescription($description);
            
            try {
                // Die Kategorie in die Datenbank aktualisieren
                $product->save();
                
                // Erfolgreiche Nachricht anzeigen
                $_SESSION['message'] = "Die Product wurde erfolgreich aktualisiert.";
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            } catch (Exception $e) {
                // Fehlermeldung anzeigen, wenn das Aktualisieren fehlgeschlagen ist
                $_SESSION['message'] = "Fehler beim Aktualisieren der Kategorie: " . $e->getMessage();
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }
        } else {
            $_SESSION['message'] = "Die Kategorie wurde nicht gefunden.";
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    }
} else {
    $_SESSION['message'] = "Ungültige Anfrage.";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

?>