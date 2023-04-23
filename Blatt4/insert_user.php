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

$username = $_POST["username"];
$password = $_POST["password"];

// SQL-Anweisung zum Einfügen des Datensatzes in die Tabelle "user"
$sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
// Daten aus dem HTML-Formular lesen

if ($conn->query($sql) === TRUE) {
    echo "Datensatz erfolgreich eingefügt";
    echo "<br />";
    echo "<button onclick=\"location.href='user.php'\">Zurück</button>";
} else {
    echo "Fehler beim Einfügen des Datensatzes: " . $conn->error;
    echo "<br />";
    echo "<button onclick=\"location.href='user.php'\">Zurück</button>";
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
