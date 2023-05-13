<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'Category' => '\\generatedclasses\\Map\\CategoryTableMap',
      'Product' => '\\generatedclasses\\Map\\ProductTableMap',
      'product_catalogy' => '\\generatedclasses\\Map\\ProductCatalogyTableMap',
      'user' => '\\generatedclasses\\Map\\UserTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Category' => '\\generatedclasses\\Map\\CategoryTableMap',
      '\\Product' => '\\generatedclasses\\Map\\ProductTableMap',
      '\\ProductCatalogy' => '\\generatedclasses\\Map\\ProductCatalogyTableMap',
      '\\User' => '\\generatedclasses\\Map\\UserTableMap',
    ),
  ),
));
