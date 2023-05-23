<?php

use generatedclasses\CategoryQuery;
use generatedclasses\ProductQuery;

session_start();
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
        echo '<li><a href="logout.php">Logout</a></li>';
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
  <h1>Updatepage</h1>
  <?php 
    $articleId = $_GET['cid'];
    $artId = $_GET['id'];
    
    
    if ($articleId==1)
    {
        
    ?>
        <!-- Inhalt der ersten Spalte -->
    <form action="confirmationpage.php?cid=1" method="POST" name="userForm" class="form">
    <div class="form-group">
  <label for="id">Category ID:</label>
  <select id="cat_id" name="cat_id" accesskey="i" required>
    <option value="">Select a category</option>
    <?php
    // Verbindung zur Datenbank herstellen
    $con = Propel\Runtime\Propel::getConnection();

    // Datenbankabfrage durchführen
    $query = 'SELECT id, name FROM category';
    $stmt = $con->prepare($query);
    $stmt->execute();

    // Ergebnisse in das Formular einfügen
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $categoryId = $row['id'];
        $categoryName = $row['name'];
        echo "<option value='$categoryId'> $categoryId - $categoryName</option>";
    }
    ?>
  </select>
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
    
    <h3> Alte Daten: </h3>
    
        <?php 
        
        $update = ProductQuery::create()->findOneById($artId);
        // Beispiel für den Zugriff auf eine Eigenschaft der Kategorie
        echo "Product-ID: " . $update->getId() . "<br>";
        echo "Product-Name: " . $update->getName() . "<br>";
        echo "Price: ".$update->getPrice()."<br>";
        echo "Width: ".$update->getWidth()."<br>";
        echo "Heigth: ".$update->getHeigth()."<br>";
        echo "Description: ".$update->getDescription()."<br>";
        
        ?>
        </form>
    <?php 
    }
    
    if ($articleId==2)
    {
    ?>
    <form action="confirmationpage.php?cid=4&oid=<?php echo $artId; ?>" method="POST" name="userForm" class="form">
    <div class="form-group">
      <label for="id">ID:</label>
      <input type="text" id="id" name="id" accesskey="i" required>
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" accesskey="n" required>
    </div>
    <div class="form-group">
      <label for="description">Beschreibung:</label>
      <textarea id="description" name="description" accesskey="d"  maxlength="255" required></textarea>
    </div>
    <div class="form-group">
      <input type="submit" value="Absenden" accesskey="s">
    </div>
	<h3> Alte Daten: </h3>
	
        <?php 
        $update= CategoryQuery::create()->findOneById($artId);
        // Beispiel für den Zugriff auf eine Eigenschaft der Kategorie
        echo "Kategorie-ID: " . $update->getId() . "<br>";
        echo "Kategorie-Name: " . $update->getName() . "<br>";
        // Weitere Eigenschaften oder Methoden entsprechend der Kategorieklasse verwenden
        
        ?>
         </form>
    <?php 
    }
    ?>
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
    