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
$description = $_POST["description"];
// SQL-Anweisung zum Einfügen des Datensatzes in die Tabelle "user"
$sql = "INSERT INTO category (id, name, description) VALUES ('$id', '$name', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "Datensatz erfolgreich eingefügt";
    echo "<br />";
    echo "<button onclick=\"location.href='index.php'\">Zurück zur Startseite</button>";
} else {
    echo "Fehler beim Einfügen des Datensatzes: " . $conn->error;
    echo "<br />";
    echo "<button onclick=\"location.href='index.php'\">Zurück zur Startseite</button>";
}

$conn->close();
?>