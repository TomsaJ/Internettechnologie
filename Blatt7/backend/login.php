<?php
include 'loginandlogout.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formulardaten abrufen
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $log = login($username, $password);
    
    if($log === true)
    {
        $message = "Eingeloggt";
    }
    else
    {
        $message = "Falsche User oder Falsches Passwort";
    }
    
    // Umleitung auf die vorherige Seite mit dem übergebenen Wert
    header("Location: {$_SERVER['HTTP_REFERER']}?message=" . $message);
    exit();
}
