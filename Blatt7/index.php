<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Datenbanken Eintrag</title>
  <link rel="stylesheet" type="text/css" href="/Blatt7/frontend/style.css">
</head>
<header>
<nav>
  <ul>
    <li><a href="index.php">Startseite</a></li>
    <li><a href="/Blatt7/frontend/user.php">Login</a></li>
    <li><a href="/Blatt7/frontend/catalog.php">Categories</a>
      <menu>
        <li><a href="/Blatt7/frontend/product.php">Product </a></li>
        <li><a href="/Blatt7/frontend/productdetails.php"> Product Details</a></li>
      </menu>
      </li>
    <li><a href="/Blatt7/frontend/contact.php">Contact us</a></li>
  
  <?php 
    include 'backend/loginandlogout.php';
// Überprüfen Sie, ob der Benutzer authentifiziert ist
    if (isLoggedIn()) {
    // Der Benutzer ist authentifiziert, zeige den Button zum Anlegen neuer Objekte an
        echo '<li><a href="backend/logout.php">logout</a></li>';
    }
    else 
    {
        echo '<li><a href="frontend/user.php">login</a></li>';
    }
    ?>
    </ul>
  </nav>
</header>
<body>
  <!-- Formular für die Tabelle "user" -->
  <h1>Startseite</h1>
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
