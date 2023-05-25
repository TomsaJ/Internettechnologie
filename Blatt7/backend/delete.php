
<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';
use generatedclasses\CategoryQuery;
use generatedclasses\ProductQuery;

$articleId = intval($_GET['cid']);
$artId = intval($_GET['id']);

if ($articleId == 1) {
    $del = CategoryQuery::create()->findPK($artId);
    
    if ($del !== null) {
        try {
            $del->delete();
            
            // Erfolgreiche Nachricht anzeigen
            $message = "Gelöscht";
            $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        } catch (Exception $e) {
            // Fehlermeldung anzeigen, wenn das Löschen fehlgeschlagen ist
            $message = "Nicht gelöscht";
            $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        }
    } else {
        // Fehlermeldung anzeigen, wenn die Kategorie nicht gefunden wurde
        $message = "Nicht gelöscht. Id nicht gefunden";
        $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
    }
} elseif ($articleId === 2) {
    $del = ProductQuery::create()->findPK($artId);
    
    if ($del !== null) {
        try {
            $del->delete();
            
            // Erfolgreiche Nachricht anzeigen
            $message = "Gelöscht";
            $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        } catch (Exception $e) {
            // Fehlermeldung anzeigen, wenn das Löschen fehlgeschlagen ist
            $message = "Nicht gelöscht";
            $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        }
    } else {
        // Fehlermeldung anzeigen, wenn die Kategorie nicht gefunden wurde
        $message = "Nicht gelöscht. Id nicht gefunden";
        $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
    }
}

header("Location: ../frontend/product.php");
exit();
?>
