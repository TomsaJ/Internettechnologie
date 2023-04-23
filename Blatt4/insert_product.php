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
    <li><a href="product.php">Product</a></li>
    <li><a href="user.php">User</a></li>
    <li><a href="catalog.php">Catalog</a></li>
  </ul>
  </nav>
  <!-- Formular für die Tabelle "user" -->
</body>
<?php
// Verbindung zur MySQL-Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catalog";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Daten aus dem HTML-Formular lesen
$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$width = $_POST["width"];
$height = $_POST["height"];
$description = $_POST["description"];
// SQL-Anweisung zum Einfügen des Datensatzes in die Tabelle "user"
$sql = "INSERT INTO product (id, name, price, width, heigth, description) VALUES ('$id', '$name', '$price', '$width', '$height', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Datensatz erfolgreich eingefügt";
    echo "<br />";
    echo "<button onclick=\"location.href='product.php'\">Zurück</button>";
} else {
    echo "Fehler beim Einfügen des Datensatzes: " . $conn->error;
    echo "<br />";
    echo "<button onclick=\"location.href='product.php'\">Zurück</button>";
}

$conn->close();
?>
<head>
  <meta charset="UTF-8">
  <title>Datenbanken Eintrag</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
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