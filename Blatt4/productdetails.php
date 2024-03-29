<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" sizes="48x48" href="IMG_1417.png">
  <title>Datenbanken Eintrag</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<header>
<nav>
  <ul>
    <li><a href="index.php">Startseite</a></li>
    <li><a href="user.php">Login</a></li>
    <li><a href="catalog.php">Categories</a>
      <menu>
        <li><a href="product.php">Product </a></li>
        <li><a href="productdetails.php"> Product Details</a></li>
      </menu>
      </li>
    <li><a href="contact.php">Contact us</a></li>
  </ul>
  </nav>
</header>
<body>
  <!-- Formular für die Tabelle "user" -->
  <h1>Productdetails</h1>
  <!-- Formular für die Tabelle "user" -->
  <div class="form-container">
<hr>
  <form action="insert_product.php" method="POST" name="userForm" class="form">
    <div class="form-group">
      <label for="id">ID:</label>
      <input type="number" id="id" name="id" placeholder="13" accesskey="i" required disabled>
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" placeholder="Apfel" name="name" accesskey="n" maxlength="100" required disabled>
    </div>
    <div class="form-group">
      <label for="price">Preis:</label>
      <input type="number" step=".01" id="price" placeholder="8.00" name="price" accesskey="r" required disabled> Euro  inkl. MwSt
    </div>
    <div class="form-group">
      <label for="width">Breite:</label>
      <input type="number" step=".01" id="width" placeholder="15.2" name="width" accesskey="b" required disabled> cm
    </div>
    <div class="form-group">
      <label for="height">Höhe:</label>
      <input type="number" step=".01" id="height" placeholder="13.5" name="height" accesskey="h" required disabled> cm
    </div>
    <div class="form-group">
      <label for="description">Beschreibung:</label>
      <textarea id="description" name="description" placeholder="Der Apfel ist rot." accesskey="d" maxlength="255" required disabled></textarea>
    </div>
    <div class="form-group">
      <input type="submit" value="Absenden" accesskey="s" disabled>
    </div>
  </form>
<hr>
</div>
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
