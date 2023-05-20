<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';
use generatedclasses\ProductQuery;
use generatedclasses\ProductCatalogyQuery;

/*
// Überprüfen Sie, ob der Benutzer authentifiziert ist
if ($_SESSION['authenticated'] === true) {
    // Der Benutzer ist authentifiziert, zeige den Button zum Anlegen neuer Objekte an
    echo '<a href="neues_objekt_erstellen.php" class="btn btn-primary">Neues Objekt anlegen</a>';
}*/
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Datenbanken Eintrag</title>
  <link rel="stylesheet" type="text/css" href="../backend/style.css">
</head>
<header>
<nav>
  <ul>
    <li><a href="../index.php">Startseite</a></li>
    <li><a href="catalog.php">Categories</a>
      <menu>
        <li><a href="product.php">Product </a></li>
        <li><a href="productdetails.php"> Product Details</a></li>
      </menu>
      </li>
    <li><a href="contact.php">Contact us</a></li>
    <?php 
    include '../backend/loginandlogout.php';
// Überprüfen Sie, ob der Benutzer authentifiziert ist
    if (isLoggedIn()) {
    // Der Benutzer ist authentifiziert, zeige den Button zum Anlegen neuer Objekte an
        echo '<li><a href="../backend/logout.php">Logout</a></li>';
    }
    else 
    {
        echo '<li><a href="user.php">Login</a></li>';
    }
    ?>
	
  </ul>
  </nav>
</header>
<body>
  <!-- Formular für die Tabelle "user" -->
  <h1>Product</h1>
  <!-- Formular für die Tabelle "user" -->
  <div class="form-container">
<hr>
  <form action="../backendend/insertproduct.php" method="POST" name="userForm" class="form">
    <div class="form-group">
      <label for="id">Category ID:</label>
      <input type="number" id="cat_id" name="cat_id" accesskey="i" required>
    </div>
    <div class="form-group">
      <label for="id">Product ID:</label>
      <input type="number" id="pro_id" name="pro_id" accesskey="i" required>
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" accesskey="n"  maxlength="100" required>
    </div>
    <div class="form-group">
      <label for="price">Preis:</label>
      <input type="number" step=".01" id="price" name="price" accesskey="r" required> Euro
    </div>
    <div class="form-group">
      <label for="width">Breite:</label>
      <input type="number" step=".01" id="width" name="width" accesskey="b" required> cm
    </div>
    <div class="form-group">
      <label for="height">Höhe:</label>
      <input type="number" step=".01" id="height" name="height" accesskey="h" required> cm
    </div>
    <div class="form-group">
      <label for="description">Beschreibung:</label>
      <textarea id="description" name="description" accesskey="d" maxlength="255" required></textarea>
    </div>
    <div class="form-group">
      <input type="submit" value="Absenden" accesskey="s">
    </div>
  </form>
<hr>
</div>

<div>
	<?php 
	include 'Blatt7/backend/loginandlogout.php';
	// Überprüfen Sie, ob der Benutzer authentifiziert ist
	
	if (isLoggedIn()) {
	    
	    
	    $articleId = $_GET['id'];
	    
	    
	    $PCId = ProductCatalogyQuery::create()->findByCategoryId($articleId);
	    
	    foreach ($PCId as $art) {
	        $productId = $art->getProductId();
	        $product = ProductQuery::create()->findPk($productId);
	        
	        if ($product !== null) {
	            echo "Id: ".$product->getId() . "<br>";
	            echo "Name: ".$product->getName() . "<br>";
	            echo "Preis: ".$product->getPrice(). "€ <br>" ;
	            echo "Breite: ".$product->getWidth(). "cm <br>" ;
	            echo "Höhe: ".$product->getHeigth(). "cm <br>" ;
	            echo "Beschreibung :". $product->getDescription(). "<br>" ;
	            echo "<hr>";
	        }
	    }
	   
	}
	else
	{
	    echo "Bitte einloggen". '<a href="user.php">Login</a>';
	}
	?>
	

</div>
</body>
<footer class = "foot">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Kontaktieren Sie uns</h4>
        <p>123 Beispielstraße, Beispielstadt</p>
        <p>Telefon: 123-456-7890</p>
        <p>E-Mail: info@example.com</p>
      </div>
    </div>
  </div>
</footer>
</html> 
