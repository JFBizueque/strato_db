<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Formulardaten sichern
    $vorname = htmlspecialchars($_POST["vorname"]);
    $nachname = htmlspecialchars($_POST["nachname"]);
    $geburtsdatum = htmlspecialchars($_POST["geburtsdatum"]);
    $anschrift = htmlspecialchars($_POST["anschrift"]);
    $email = htmlspecialchars($_POST["email"]);
    $produktwebsite = htmlspecialchars($_POST["produktwebsite"]);

    // DEINE E-MAIL
    $to = "deine-email@example.com";

    // Betreff
    $subject = "Neue Dashboard Formular Anfrage";

    // Nachricht
    $message = "
    Neue Formulardaten wurden übermittelt:

    Vorname: $vorname
    Nachname: $nachname
    Geburtsdatum: $geburtsdatum
    Anschrift: $anschrift
    E-Mail: $email
    Produktwebsite: $produktwebsite
    ";

    // Header
    $headers = "From: noreply@deinedomain.de\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Mail senden
    if(mail($to, $subject, $message, $headers)) {

        header("Location: dashboard.php?success=1");
        exit;

    } else {

        echo "Fehler beim Senden der E-Mail.";

    }

} else {

    echo "Ungültige Anfrage.";

}
?>
