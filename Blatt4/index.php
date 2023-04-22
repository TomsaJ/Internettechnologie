<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Meine Seite</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <!-- Formular für die Tabelle "user" -->
  <div class="form-container">
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
  <form action="insert_product.php" method="POST" name="userForm" class="form">
    <div class="form-group">
      <label for="id">ID:</label>
      <input type="number" id="id" name="id" accesskey="i" required>
    </div>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" accesskey="n" required>
    </div>
    <div class="form-group">
      <label for="price">Preis:</label>
      <input type="number" step=".01" id="price" name="price" accesskey="r" required> Euro
    </div>
    <div class="form-group">
      <label for="width">Breite:</label>
      <input type="number" step=".01" id="width" name="width" accesskey="b" required> cm
    </div>
    <div class="form-group">
      <label for="height">Höhe:</label>
      <input type="number" step=".01" id="height" name="height" accesskey="h" required> cm
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
</div>
</body>
</html>
