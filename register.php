<?php
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password)
            VALUES (:username, :password)";

    try {

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        $message = "Registrierung erfolgreich!";

    } catch(PDOException $e) {

        $message = "Benutzer existiert bereits.";

    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrieren</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Registrierung</h1>

    <form method="POST">

        <input type="text"
               name="username"
               placeholder="Benutzername"
               required>

        <input type="password"
               name="password"
               placeholder="Passwort"
               required>

        <button type="submit">
            Registrieren
        </button>

    </form>

    <p><?php echo $message; ?></p>

    <a href="login.php">Zum Login</a>

</div>

</body>
</html>
