<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';
use generatedclasses\CategoryQuery;

$articleId = $_GET['cid'];
$artId = $_GET['id'];

if($articleId===4)
{
    $del = CategoryQuery::create()->findOneById($artId);
}
    try {
        $del->delete();
        
        // Erfolgreiche Nachricht anzeigen
        $message = "Gelöscht";
        $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } catch (Exception $e) {
        // Fehlermeldung anzeigen, wenn das Einfügen fehlgeschlagen ist
        $message = "Nicht gelöscht";
        $_SESSION['message'] = $message; // Fehlermeldung in einer Session-Variablen speichern
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }


?>