<?php
session_start();
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Datenbanken Eintrag</title>
  <link rel="stylesheet" type="text/css" href="backend/style.css">
</head>
<header>
<nav>
  <ul>
    <li><a href="index.php">Startseite</a></li>
    <li><a href="frontend/catalog.php">Categories</a>
      <menu>
        <li><a href="frontend/product.php">Product </a></li>
        <li><a href="frontend/productdetails.php"> Product Details</a></li>
      </menu>
      </li>
    <li><a href="frontend/contact.php">Contact us</a></li>
    <?php 
    include 'backend/loginandlogout.php';
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
  <h1>Startseite</h1>
  <?php 
  include '../backend/loginandlogout.php';
  if (isLoggedIn()) {
      echo "Die Sitzung ist aktiv.";
  } else{
      echo "Die Sitzung ist nicht aktiv.";
  }
  
  
  ?>
  <div id="message"><?php echo $message; ?></div>
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
