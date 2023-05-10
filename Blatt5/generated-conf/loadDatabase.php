<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'Category' => '\\generated-classes\\Map\\CategoryTableMap',
      'Product' => '\\generated-classes\\Map\\ProductTableMap',
      'product_catalogy' => '\\generated-classes\\Map\\ProductCatalogyTableMap',
      'user' => '\\generated-classes\\Map\\UserTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Category' => '\\generated-classes\\Map\\CategoryTableMap',
      '\\Product' => '\\generated-classes\\Map\\ProductTableMap',
      '\\ProductCatalogy' => '\\generated-classes\\Map\\ProductCatalogyTableMap',
      '\\User' => '\\generated-classes\\Map\\UserTableMap',
    ),
  ),
));
