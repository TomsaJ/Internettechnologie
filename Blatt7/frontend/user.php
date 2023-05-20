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
  <h1>Login</h1>
  <!-- Formular für die Tabelle "user" -->
  <div class="form-container">
  <hr>
  <form action="../backend/login.php" method="POST" name="userForm" class="form">

    <div class="form-group">
      <label for="username">Benutzername:</label>
      <input type="text" id="username" name="username" maxlength="40" accesskey="b" required>
    </div>
    <div class="form-group">
      <label for="password">Passwort:</label>
      <input type="password" placeholder="Password" id="password" name="password" accesskey="p" required>
    </div>
    <div class="form-group">
      <input type="submit" value="Absenden" accesskey="s">
    </div>
  </form>
  <div id="message"><?php echo $message; ?></div>
  <hr>
</div>
<h1>Registrieren</h1>
  <!-- Formular für die Tabelle "user" -->
  <div class="form-container">
  <hr>
  <form action="../backend/insertuser.php" method="POST" name="userForm" class="form">
    <div class="form-group">
      <label for="username">Benutzername:</label>
      <input type="text" id="username" name="username" maxlength="40" accesskey="b" required>
    </div>
    <div class="form-group">
      <label for="password">Passwort:</label>
      <input type="password" placeholder="Password" id="password" name="password" accesskey="p" required>
    </div>
    <div class="form-group">
      <label for="password">Passwort Bestätigen:</label>
      <input type="password" placeholder="Password" id="password" name="password" accesskey="p" required>
    </div>
    <div class="form-group">
      <input type="submit" value="Absenden" accesskey="s">
    </div>
  </form>
  <hr>
</div>
<script>
        setTimeout(function() {
            document.getElementById("message").style.display = "none";
        }, 3000);
    </script>
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
