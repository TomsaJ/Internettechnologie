<?php
// setup the autoloading
require_once DIR . '/vendor/autoload.php';
// setup Propel
require_once DIR . '/generated-conf/config.php';

$user = new User();
$user->setUsername("Banana");
$user->setPassword(1235);
$user->save();
?>