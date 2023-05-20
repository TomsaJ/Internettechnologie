<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';
use generatedclasses\UserQuery;
include 'hash.php';

function login($username, $password)
{
    $user = UserQuery::create()->findOneByUserName($username);
    
    if ($user) {
        $storedPassword = $user->getPassword();
        $extractedPassword = substr($storedPassword, 0, 9);
        $passwordHash = checkgenerateHash($password, $extractedPassword);
        
        if ($passwordHash === $storedPassword) {
            $_SESSION['username'] = $user->getUsername();
            return true;
        }
    }
    
    return false;
}

function isLoggedIn()
{
    if(session_status() == PHP_SESSION_ACTIVE)
    {
        return true;
    }else {
        return false;
    }
    
}

function logout()
{
    if (session_status() == PHP_SESSION_ACTIVE) {
        session_unset(); // Setzt alle Session-Variablen zurück
        session_destroy(); // Zerstört die Sitzung
        // Weitere Aktionen, wie Benutzer benachrichtigen oder Protokolle schreiben, können hier durchgeführt werden
    }
}

// Überprüfen, ob der Benutzer versucht hat, sich abzumelden
if (isset($_GET['logout'])) {
    logout();
    header("Location: index.php"); // Passe die URL entsprechend deiner Anwendung an
    exit();
}
?>
