<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'Category' => '\\Map\\CategoryTableMap',
      'Product' => '\\Map\\ProductTableMap',
      'product_catalogy' => '\\Map\\ProductCatalogyTableMap',
      'user' => '\\Map\\UserTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Category' => '\\Map\\CategoryTableMap',
      '\\Product' => '\\Map\\ProductTableMap',
      '\\ProductCatalogy' => '\\Map\\ProductCatalogyTableMap',
      '\\User' => '\\Map\\UserTableMap',
    ),
  ),
));
