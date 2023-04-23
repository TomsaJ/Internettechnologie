<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Datenbanken Eintrag</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav style="background-color: #dddddd">
  <ul>
    <li><a href="#">Startseite</a></li>
    <li><a href="product.php">Product</a></li>
    <li><a href="#user.php">User</a></li>
   <li><a href="catalog.php">Catalog</a></li>
  </ul>
  </nav>
  <!-- Formular für die Tabelle "user" -->
  <div class="form-container">
  <hr>
  <form action="insert_user.php" method="POST" name="userForm" class="form">
    <div class="form-group">
      <label for="username">Benutzername:</label>
      <input type="text" id="username" name="username" accesskey="b" required>
    </div>
    <div class="form-group">
      <label for="password">Passwort:</label>
      <input type="password" id="password" name="password" accesskey="p" required>
    </div>
    <div class="form-group">
      <input type="submit" value="Absenden" accesskey="s">
    </div>
  </form>
  <hr>
</div>
</body>
<footer style="background-color: green">
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
