<?php
// Setup the autoloading
require_once __DIR__ . '/vendor/autoload.php';

// Setup Propel
require_once __DIR__ . '/generated-conf/config.php';


// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Erfassen Sie die Formulardaten
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Erstellen Sie eine Verbindung zur Datenbank
    $connection = Propel::getConnection();
    
    // Beispielcode zum Einfügen der Benutzerdaten
    try {
        // Beginnen Sie eine Transaktion
        $connection->beginTransaction();
        
        // Erstellen Sie eine neue Instanz Ihrer Benutzertabelle (nehmen wir an, sie heißt "User")
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->save();
        
        // Bestätigen Sie die Transaktion
        $connection->commit();
        
        echo "Benutzerdaten erfolgreich eingefügt!";
    } catch (Exception $e) {
        // Bei einem Fehler die Transaktion rückgängig machen
        $connection->rollBack();
        
        echo "Fehler beim Einfügen der Benutzerdaten: " . $e->getMessage();
    }
}
