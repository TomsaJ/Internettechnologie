<?php


use generatedclasses\User;

// Setup the autoloading
require_once __DIR__ . '/vendor/autoload.php';

// Setup Propel
require_once __DIR__ . '/generated-conf/config.php';

$user = new User();
$user->setusername('Test');
$user->setPassword(sha1('12345678'));
echo $user->save();
?>