<?php
use generatedclasses\CategoryQuery;

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
        echo '<li><a href="backend/logout.php">Logout</a></li>';
    }
    else 
    {
        echo '<li><a href="frontend/user.php">Login</a></li>';
    }
    ?>
	
  </ul>
  </nav>
</header>
<body>
  <!-- Formular für die Tabelle "user" -->
  <h1>Bestätige:</h1>
  <?php 
  
  $articleId = $_GET['cid'];
  $artId = $_GET['id'];
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  if ($articleId==1)
  {
      
  
      // Daten aus dem Formular abruf
      $pro_id = $_POST['pro_id'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $width = $_POST['width'];
      $height = $_POST['height'];
      $description = $_POST['description'];
      
      
      echo "ProductID: " .$pro_id. "<br />";
      echo "Product: " .$name. "<br />";
      echo "Price: " .$price. "<br />";
      echo "Width:" .$width. "<br />";
      echo "Height:" .$height. "<br />";
      echo "Description:" .$description. "<br />";
      
      
      ?>
      
      
      <form action="../backend/insertproduct.php" method="POST">
      <input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="price" value="<?php echo $price; ?>">
      <input type="hidden" name="width" value="<?php echo $width; ?>">
      <input type="hidden" name="height" value="<?php echo $height; ?>">
      <input type="hidden" name="description" value="<?php echo $description; ?>">
      <input type="submit" value="Weiter">
      </form>
      
     <?php 
     } 
     elseif($articleId==2)
     {
         $id = $_POST['id'];
         $name = $_POST['name'];
         $description = $_POST['description'];
         
         echo "CategoryID: " .$id . "<br />";
         echo "Category: " .$name. "<br />";
         echo "Description: " .$description. "<br />";
         
         ?>
         <form action="../backend/insertcategory.php " method="POST">
         <input type="hidden" name="id" value="<?php echo $id; ?>">
         <input type="hidden" name="name" value="<?php echo $name; ?>">
         <input type="hidden" name="description" value="<?php echo $description; ?>">
         <input type="submit" value="Weiter">
         </form>
         
       <?php   
     }
  }
  if ($articleId==7)
  {
      
      $del = CategoryQuery::create()->findOneById($artId);
          // Beispiel für den Zugriff auf eine Eigenschaft der Kategorie
          echo "Kategorie-ID: " . $del->getId() . "<br>";
          echo "Kategorie-Name: " . $del->getName() . "<br>";
          // Weitere Eigenschaften oder Methoden entsprechend der Kategorieklasse verwenden
      
      ?>
      <form action="../backend/delete.php?cid=1?id=<?php echo $artId?>" method="POST">
      <input type="submit" value="Weiter">
    </form>

      <?php 
  }
     ?>
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
    }
}?>
      
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
