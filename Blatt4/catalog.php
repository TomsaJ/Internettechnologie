<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Datenbanken Eintrag</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav>
  <ul>
    <li><a href="index.php">Startseite</a></li>
    <li><a href="user.php">Login</a></li>
    <li><a href="catalog.php">Categories</a>
      <menu>
        <li><a href="product.php">Product </a></li>  <br />
        <li><a href="productdetails.php"> Product Details</a></li>
      </menu>
      </li>
    <li><a href="contact.php">Contact us</a></li>
  </ul>
  </nav>
  <!-- Formular für die Tabelle "user" -->
  <h1>Catalogie</h1>
  <!-- Formular für die Tabelle "user" -->
  <div class="form-container">
<hr>
  <form action="insert_category.php" method="POST" name="userForm" class="form">
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
      <textarea id="description" name="description" accesskey="d" required></textarea>
    </div>
    <div class="form-group">
      <input type="submit" value="Absenden" accesskey="s">
    </div>
  </form>
  <hr>
</div>
<table border = "1">
  <?php
  for ($row = 1; $row <= 4; $row++) {
      echo "<thead>";
    echo "<tr>";
    for ($col = 1; $col <= 6; $col++) {
        echo "<td rowspan='40' colspan='60'>" . rand(1, 100) . "</td>";
      
    }
    echo "</tr>";
    echo "</thead>";
  }
  ?>
</table>
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
