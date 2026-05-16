<?php
session_start();

require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users
            WHERE username = :username";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':username' => $username
    ]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];

        header("Location: dashboard.php");
        exit;

    } else {

        $message = "Login fehlgeschlagen.";

    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Login</h1>

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
            Einloggen
        </button>

    </form>

    <p><?php echo $message; ?></p>

    <a href="register.php">Registrieren</a>

</div>

</body>
</html>
