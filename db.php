<?php

$host = "rdbms.strato.de";
$dbname = "DEINE_DATENBANK";
$username = "DEIN_BENUTZER";
$password = "DEIN_PASSWORT";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    die("Datenbankfehler: " . $e->getMessage());

}
?>
