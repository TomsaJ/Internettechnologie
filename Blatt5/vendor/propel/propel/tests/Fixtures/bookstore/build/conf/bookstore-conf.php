<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion(2);
$serviceContainer->setAdapterClass('bookstore', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle('bookstore');
$manager->setConfiguration(array (
  'classname' => '\\Propel\\Runtime\\Connection\\DebugPDO',
  'dsn' => 'mysql:host=127.0.0.1;dbname=test',
  'user' => 'root',
  'password' => '',
  'options' =>
  array (
    'ATTR_PERSISTENT' => false,
  ),
  'attributes' =>
  array (
    'ATTR_EMULATE_PREPARES' => true,
    'ATTR_TIMEOUT' => 30,
  ),
  'settings' =>
  array (
    'charset' => 'utf8',
    'queries' =>
    array (
    ),
  ),
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$serviceContainer->setConnectionManager($manager);
$serviceContainer->setAdapterClass('bookstore-cms', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle('bookstore-cms');
$manager->setConfiguration(array (
  'classname' => '\\Propel\\Runtime\\Connection\\DebugPDO',
  'dsn' => 'mysql:host=127.0.0.1;dbname=test',
  'user' => 'root',
  'password' => '',
  'options' =>
  array (
    'ATTR_PERSISTENT' => false,
  ),
  'attributes' =>
  array (
    'ATTR_EMULATE_PREPARES' => true,
    'ATTR_TIMEOUT' => 30,
  ),
  'settings' =>
  array (
    'charset' => 'utf8',
    'queries' =>
    array (
    ),
  ),
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$serviceContainer->setConnectionManager($manager);
$serviceContainer->setAdapterClass('bookstore-behavior', 'mysql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle('bookstore-behavior');
$manager->setConfiguration(array (
  'classname' => '\\Propel\\Runtime\\Connection\\DebugPDO',
  'dsn' => 'mysql:host=127.0.0.1;dbname=test',
  'user' => 'root',
  'password' => '',
  'options' =>
  array (
    'ATTR_PERSISTENT' => false,
  ),
  'attributes' =>
  array (
    'ATTR_EMULATE_PREPARES' => true,
    'ATTR_TIMEOUT' => 30,
  ),
  'settings' =>
  array (
    'charset' => 'utf8',
    'queries' =>
    array (
    ),
  ),
  'model_paths' =>
  array (
    0 => 'src',
    1 => 'vendor',
  ),
));
$serviceContainer->setConnectionManager($manager);
$serviceContainer->setDefaultDatasource('bookstore');
require_once __DIR__ . '/./loadDatabase.php';
