<?php

declare(strict_types=1);

session_start();

require dirname(__DIR__) . '/lib/autoload.php';

use CapsuleLib\Security\Authenticator;

// Remplace par ton propre gestionnaire PDO
$pdo = new PDO('sqlite:' . __DIR__ . '/../data/site.sqlite');

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = Authenticator::login($pdo, $_POST['username'], $_POST['password']);

    if ($success) {
        header('Location: /admin');
        exit;
    }

    $error = "Identifiants incorrects.";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion admin</title>
</head>

<body>
    <h1>Connexion</h1>
    <?php if ($error): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Nom d'utilisateur : <input name="username" required></label><br>
        <label>Mot de passe : <input name="password" type="password" required></label><br>
        <button type="submit">Se connecter</button>
    </form>
</body>

</html>
