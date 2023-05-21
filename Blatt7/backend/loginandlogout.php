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
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}


function logout()
{
    session_unset();
    session_destroy();
}
?>
