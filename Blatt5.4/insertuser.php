<?php


echo "t";


// setup the autoloading
require_once __DIR__ . '/vendor/autoload.php';
// setup Propel
echo "t";
require_once __DIR__ . '/generated-conf/config.php';
echo "t";

require_once 'generatedclasses/Base/User.php';
require_once 'generatedclasses/User.php';
use generatedclasses\User;


echo "e";
$name = "Banane";

$user = new User();
$user->setUsername($name);
$user->setPassword("eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee");
print_r($user);
echo $user->save();


?>