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
<body>
<?php 
$artId = $_GET['id'];
$update = ProductQuery::create()->findOneById($artId);
if($update){
    
    ?>
        <!-- Inhalt der ersten Spalte -->
    <form action="../backend/update.php?cid=2&id=<?php echo $artId; ?>"  method="POST" name="userForm" class="form">
    <div class="form-group">
  
  <br />
    <?php
    
    
    
    // Speichern des Session-Arrays
    $update = ProductQuery::create()->findOneById($artId);
    ?>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" value="<?php echo $update->getName(); ?>" id="name" name="name" accesskey="n" maxlength="100" required disabled>
    </div>
    <div class="form-group">
        <label for="price">Preis:</label>
        <input type="number" value="<?php echo $update->getPrice(); ?>" step=".01" id="price" name="price" accesskey="r" required disabled> Euro
    </div>
    <div class="form-group">
        <label for="width">Breite:</label>
        <input type="text"  value="<?php echo $update->getWidth(); ?> "step=".0001" id="width" name="width" accesskey="b" required disabled> cm
    </div>
    <div class="form-group">
        <label for="height">Höhe:</label>
        <input type="text"  value="<?php echo $update->getHeigth(); ?> " step=".01" id="height" name="height" accesskey="h" required disabled> cm
    </div>
    <div class="form-group">
        <label for="description">Beschreibung:</label>
        <textarea id="description"  name="description" accesskey="d" maxlength="255" required disabled><?php echo $update->getDescription(); ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Absenden" accesskey="s" disabled>
    </div>


    
    
        </form>
    <?php 
    }else{
        echo "Nicht Vorhanden";
    }?>
    </body>
    </html>