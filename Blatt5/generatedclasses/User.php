<?php

namespace generatedclasses;

use generatedclasses\Base\User as BaseUser;

/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class User extends BaseUser {
    public function setPasswordWithSalt($password) {
        $salt = $this->generateSalt(); // Funktion zum Generieren eines zufälligen Salts
        $hashedPassword = $this->hashPassword($password, $salt); // Funktion zum Hashen des Passworts mit dem Salt
        $this->setPassword($hashedPassword); // Verwenden der ursprünglichen setPassword-Methode
        $this->setSalt($salt); // Speichern des Salts in der Datenbank
    }
    
    private function generateSalt() {
        $salt = random_bytes(16); // Generiert ein 16-Byte langes zufälliges Salt
        return base64_encode($salt); // Das Salt wird als Base64-kodierter String zurückgegeben
    }
    
    private function hashPassword($password, $salt) {
        $hashedPassword = hash('sha256', $salt . $password); // Das Salt wird dem Passwort vorangestellt und gehasht
        return $hashedPassword;
    }
}
