<?php
header('Content-Type:text/plain');
echo "GET:"; print_r($_GET);
echo "POST:"; print_r($_POST);
echo "Server:"; print_r($_SERVER);
?>

<?php
// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catalog";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Überprüfen, ob die Verbindung erfolgreich war
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Die eingegebenen Daten aus dem POST-Array abrufen
$name = $_POST['name'];
$email = $_POST['email'];
$password = sha1($_POST['password']);

// Ein SQL-Statement vorbereiten und ausführen, um die Daten in die Tabelle einzufügen
$sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
  echo "Datensatz erfolgreich eingefügt.";
} else {
  echo "Fehler beim Einfügen des Datensatzes: " . mysqli_error($conn);
}

// Verbindung zur Datenbank schließen
mysqli_close($conn);
?>
