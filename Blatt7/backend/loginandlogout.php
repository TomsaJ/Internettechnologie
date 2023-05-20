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
    return isset($_SESSION['username']);
}

function logout()
{
    session_unset();
    session_destroy();
}

// Überprüfen, ob der Benutzer versucht hat, sich abzumelden
if (isset($_GET['logout'])) {
    logout();
    header("Location: index.php"); // Passe die URL entsprechend deiner Anwendung an
    exit();
}
?>

<!-- Navigationsleiste -->
<nav>
    <ul>
        <li><a href="index.php">Startseite</a></li>
        <?php if (isLoggedIn()): ?>
            <li><a href="?logout">Ausloggen</a></li>
        <?php else: ?>
            <li><a href="login.php">Einloggen</a></li>
        <?php endif; ?>
    </ul>
</nav>
