<?php
session_start();
/*
// Überprüfen Sie, ob der Benutzer authentifiziert ist
if ($_SESSION['authenticated'] === true) {
    // Der Benutzer ist authentifiziert, zeige den Button zum Anlegen neuer Objekte an
    echo '<a href="neues_objekt_erstellen.php" class="btn btn-primary">Neues Objekt anlegen</a>';
}*/
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <li><a href="../frontend/productdetails.php"> Product Details</a></li>
      </menu>
      </li>
    <li><a href="contact.php">Contact us</a></li>
    <?php 
    include '../backend/loginandlogout.php';
// Überprüfen Sie, ob der Benutzer authentifiziert ist
    if (isLoggedIn()) {
    // Der Benutzer ist authentifiziert, zeige den Button zum Anlegen neuer Objekte an
        echo '<li><a href="../backend/logout.php">Logout</a></li>';
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
  <h1>Category</h1>
  <?php if (isLoggedIn()) {
	    
	    
	  
	    ?>
  <!-- Formular für die Tabelle "user" -->
  <div class="form-container">
<hr>
  <form action="confirmationpage.php?cid=2" method="POST" name="userForm" class="form">
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
      <textarea id="description" name="description" accesskey="d"  maxlength="255" required></textarea>
    </div>
    <div class="form-group">
      <input type="submit" value="Absenden" accesskey="s">
    </div>
  </form>
  <hr>
  <?php } else {
    echo "Zum hinzufügen von Categories bitte anmelden";
    echo '<hr>';
}?>
</div>
<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../propel_folder/generated-conf/config.php';
use generatedclasses\CategoryQuery;

$articles = CategoryQuery::create()->find();

echo "<table style='width: 100%; max-width: 100%;'>";
echo "<tr><th>Id</th><th>Categoriy</th><th>Description</th>";
if (isLoggedIn()) {

// Durchlaufen der Zeilen und Ausgabe der Daten
echo "<th>Update</th><th>Delete</th></tr>";
foreach ($articles as $article) {
    echo '<tr>';
    echo '<td>' . $article->getId() . '</td>';
    echo '<td><a href="../frontend/product.php?id=' . $article->getId() . '">' . $article->getName() . '</a></td>';
    echo '<td>' . $article->getDescription() . '</td>';
    echo '<td><a href="../frontend/update.php?cid=2&id=' . $article->getId() . '">Update</a></td>';
    echo '<td><a href="../frontend/confirmationpage.php?cid=7&id=' . $article->getId() . '">Delete</a></td>';
    echo '</tr>';
}

}
else 
{
    echo "</tr>";
    foreach ($articles as $article) {
        echo '<tr>';
        echo '<td>' . $article->getId() . '</td>';
        echo '<td><a href="../frontend/product.php?id=' . $article->getId() . '">' . $article->getName() . '</a></td>';
        echo '<td>' . $article->getDescription() . '</td>';
        echo '</tr>';
    }
}
echo '</table>';

?>
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
