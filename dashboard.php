<?php
session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit;

}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Dashboard</h1>

    <p>
        Willkommen,
        <?php echo htmlspecialchars($_SESSION["username"]); ?>
    </p>

    <a href="logout.php">
        <button>Logout</button>
    </a>

</div>

</body>
</html>
