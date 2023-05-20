<?php
session_start();
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
    
    // Unset all of the session variables.
    $_SESSION['username'] = false;
    
    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    session_unset();
    
    // Finally, destroy the session.
    session_destroy();
}


// Überprüfen, ob der Benutzer versucht hat, sich abzumelden
if (isset($_GET['logout'])) {
    logout();
    header("Location: index.php"); // Passe die URL entsprechend deiner Anwendung an
    exit();
}
?>
