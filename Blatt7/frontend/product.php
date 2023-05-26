<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';
use generatedclasses\ProductQuery;
use generatedclasses\ProductCatalogyQuery;
use generatedclasses\CategoryQuery;

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
        <li><a href="../frontend/productdetails.php"> Product Details</a></li>
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
<body >
  <!-- Formular für die Tabelle "user" -->
  <h1>Product</h1>
  <?php if (isLoggedIn()) {
	    
	    
	  
	    ?>
  <!-- Formular für die Tabelle "user" -->
  <div class="form-container">
<hr>
  <form action="confirmationpage.php?cid=1" method="POST" name="userForm" class="form">
    <div class="form-group">
  <label for="id">Category ID:</label>
  <br />
    <?php
    
    $counter = 0;
    $category = CategoryQuery::create()->find();
    
    foreach ($category as $item) {
        echo "<label class=\"item\">";
        echo "<input type=\"checkbox\" class=\"checkbox\" title=\"".htmlspecialchars($item->getDescription())."\" name=\"item[]\" value=\"".$item->getId()."\">";
        echo $item->getName()."</label>";
        
        // Überprüfen, ob das aktuelle Element ausgewählt wurde
        if (isset($_POST['item']) && in_array($item->getId(), $_POST['item'])) {
            // Hinzufügen zur Session
            $_SESSION['selected_categories'][] = $item->getId();
        }
        
        if (++$counter % 1 === 0) {
            echo "<br/>";
        }
    }
    
    // Speichern des Session-Arrays
    
    ?>
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
<?php } else {
    echo "Zum hinzufügen von Producten bitte anmelden";
    echo '<hr>';
}?>

<div>
	<?php 
	include 'Blatt7/backend/loginandlogout.php';
	// Überprüfen Sie, ob der Benutzer authentifiziert ist
	
	$articleId = $_GET['id'];
	if ($articleId !== null){
	$PCId = ProductCatalogyQuery::create()->findByCategoryId($articleId);
	
	    
	if($PCId){
	
	echo "<table style='width: 100%; max-width: 100%;'>";
	echo "<tr><th>Id</th><th>Name</th><th>Preis</th><th>Breite</th><th>Höhe</th><th>Beschreibung</th>";
	if (isLoggedIn()) {
	    
	    // Durchlaufen der Zeilen und Ausgabe der Daten
	    echo "<th>Update</th><th>Delete</th></tr>";
	    foreach ($PCId as $art) {
	        $productId = $art->getProductId();
	        $product = ProductQuery::create()->findPk($productId);
	        
	        if ($product !== null) {
	            echo "<tr>";
	            echo "<td>".$product->getId()."</td>";
	            echo "<td>".$product->getName()."</td>";
	            echo "<td>".$product->getPrice()."€</td>";
	            echo "<td>".$product->getWidth()."cm</td>";
	            echo "<td>".$product->getHeigth()."cm</td>";
	            echo "<td>".$product->getDescription()."</td>";
	            echo '<td><a href="../frontend/update.php?cid=1&id=' . $product->getId() . '">Update</a></td>';
	            echo '<td><a href="../frontend/confirmationpage.php?cid=8&id=' . $product->getId() . '">Delete</a></td>';
	            echo '</tr>';
	        }
	    }
	        
	   }
	    
	else
	{
	    echo "</tr>";
	    foreach ($PCId as $art) {
	        $productId = $art->getProductId();
	        $product = ProductQuery::create()->findPk($productId);
	        
	        if ($product !== null) {
	            echo "<tr>";
	            echo "<td>".$product->getId()."</td>";
	            echo "<td>".$product->getName()."</td>";
	            echo "<td>".$product->getPrice()."€</td>";
	            echo "<td>".$product->getWidth()."cm</td>";
	            echo "<td>".$product->getHeigth()."cm</td>";
	            echo "<td>".$product->getDescription()."</td>";
	            echo "</tr>";
	        }
	    }
	}
	echo '</table>';
	}else{
	    echo "<table style='width: 100%; max-width: 100%;'>";
	    echo "<tr><th>Id</th><th>Name</th><th>Preis</th><th>Breite</th><th>Höhe</th><th>Beschreibung</th>";
	    if (isLoggedIn()) {
	        echo "<th>Update</th><th>Delete</th></tr>";
	        
	        
	            $product = ProductQuery::create()->find();
	            foreach ($product as $product) {
	            if ($product !== null) {
	                echo "<tr>";
	                echo "<td>".$product->getId()."</td>";
	                echo "<td>".$product->getName()."</td>";
	                echo "<td>".$product->getPrice()."€</td>";
	                echo "<td>".$product->getWidth()."cm</td>";
	                echo "<td>".$product->getHeigth()."cm</td>";
	                echo "<td>".$product->getDescription()."</td>";
	                echo '<td><a href="../frontend/update.php?cid=1&id=' . $product->getId() . '">Update</a></td>';
	                echo '<td><a href="../frontend/confirmationpage.php?cid=8&id=' . $product->getId() . '">Delete</a></td>';
	                echo "</tr>";
	            }
	            }
	    }else{
	        
	        echo "</tr>";
	    
	        $prod = ProductQuery::create()->find();
	        foreach ($prod as $product) {
	        if ($product !== null) {
	            echo "<tr>";
	            echo "<td>".$product->getId()."</td>";
	            echo "<td>".$product->getName()."</td>";
	            echo "<td>".$product->getPrice()."€</td>";
	            echo "<td>".$product->getWidth()."cm</td>";
	            echo "<td>".$product->getHeigth()."cm</td>";
	            echo "<td>".$product->getDescription()."</td>";
	            echo "</tr>";
	        }
	        
	       
	} 
	} echo '</table>';
	}
	}else{
	    echo "Id nicht vorhanden";
	}
	
?>

	

</div>
<hr>
<?php if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    
    if ($articleId==1)
    {
    echo '<meta http-equiv="refresh" content="3; ../frontend/product.php">';
    }
    elseif($articleId==2)
    {
        echo '<meta http-equiv="refresh" content="3; ../frontend/catalog.php">';
    }}
?>
<hr>
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
