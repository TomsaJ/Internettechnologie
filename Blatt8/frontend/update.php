<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';
use generatedclasses\ProductQuery;
use generatedclasses\ProductCatalogyQuery;
use generatedclasses\CategoryQuery;


session_start();
if (!isset($_SESSION['selectedCategories'])) {
    $_SESSION['selectedCategories'] = array();
}
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
        <li><a href="../frontend/productdetails.php" > Product Details</a></li>
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
  <h1>Updatepage</h1>
  <?php 
    $articleId = $_GET['cid'];
    $artId = $_GET['id'];
    
    
        if ($articleId==1)
        {
            $update = ProductQuery::create()->findOneById($artId);
            if($update){
        
    ?>
        <!-- Inhalt der ersten Spalte -->
    <form action="../backend/update.php?cid=2&id=<?php echo $artId; ?>"  method="POST" name="userForm" class="form">
    <div class="form-group">
  <label for="id">Category:</label>
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
    $update = ProductQuery::create()->findOneById($artId);
    ?>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" value="<?php echo $update->getName(); ?>" id="name" name="name" accesskey="n" maxlength="100" required>
    </div>
    <div class="form-group">
        <label for="price">Preis:</label>
        <input type="number" value="<?php echo $update->getPrice(); ?>" step=".01" id="price" name="price" accesskey="r" required> Euro
    </div>
    <div class="form-group">
        <label for="width">Breite:</label>
        <input type="number" value="<?php echo number_format($update->getwidth(), 4, '.', ''); ?>" step="0.0001" min="0" id="width" name="width" accesskey="b" required> cm

    </div>
    <div class="form-group">
        <label for="height">Höhe:</label>
        <input type="number" value="<?php echo number_format($update->getHeigth(), 4, '.', ''); ?>" step="0.0001" min="0" id="height" name="height" accesskey="h" required> cm

    </div>
    <div class="form-group">
        <label for="description">Beschreibung:</label>
        <textarea id="description"  name="description" accesskey="d" maxlength="255" required><?php echo $update->getDescription(); ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Absenden" accesskey="s">
    </div>


    
    <h3> Alte Daten: </h3>
    
        <?php 
        
        
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
    }else{
        echo "Nicht Vorhanden";
    }}
    if ($articleId==2)
    {
    
    
        $update= CategoryQuery::create()->findPK($artId);
    ?>
    <form action="../backend/update.php?cid=1&id=<?php echo $artId; ?>" method="POST" name="userForm" class="form">
    <!-- <div class="form-group">
      <label for="id">ID:</label>
      <input type="text"  id="id" name="id" accesskey="i" required>
    </div> -->
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" value="<?php echo $update->getName(); ?>" id="name" name="name" accesskey="n" required>
    </div>
    <div class="form-group">
      <label for="description">Beschreibung:</label>
      <textarea id="description"  name="description" accesskey="d"  maxlength="255" required><?php echo $update->getDescription(); ?></textarea>
    </div>
    <div class="form-group">
      <input type="submit" value="Absenden" accesskey="s">
    </div>
	<h3> Alte Daten: </h3>
	
        <?php 
        
        // Beispiel für den Zugriff auf eine Eigenschaft der Kategorie
        echo "Kategorie-ID: " . $update->getId() . "<br>";
        echo "Kategorie-Name: " . $update->getName() . "<br>";
        echo "Katergorie-Beschreibung: ". $update->getDescription();
        // Weitere Eigenschaften oder Methoden entsprechend der Kategorieklasse verwenden
        
        ?>
         </form>
    <?php 
    }
    ?>
    <?php 
    if (isset($_SESSION['message'])) {
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
    