<?php
use generatedclasses\CategoryQuery;

session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $articleId = $_GET['cid'];
    $artId = $_GET['oid'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    
    if ($articleId == 1) {
        $category = CategoryQuery::create()->findOneById($artId);
        
        if ($category) {
            $category->setId($id);
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
} else {
    $_SESSION['message'] = "Ungültige Anfrage.";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

?>