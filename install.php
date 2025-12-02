<?php
// On vérifie si le site est déjà installé. Si oui, on redirige pour éviter de réinstaller.
if (file_exists('config-site.php')) {
    header('Location: index.php');
    exit;
}

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $color = $_POST['color'] ?? '#ccff00';

    if (strlen($password) < 6) {
        $error = "Le mot de passe doit faire au moins 6 caractères.";
    } else {
        // Le contenu du futur fichier de configuration
        $config_content = "<?php
// Fichier de configuration généré automatiquement
define('ADMIN_PASSWORD', '" . addslashes($password) . "');
define('ACCENT_COLOR', '" . htmlspecialchars($color) . "');
?>";

        // On écrit le fichier
        if (file_put_contents('config-site.php', $config_content)) {
            // Installation réussie, on redirige vers l'accueil
            header('Location: index.php');
            exit;
        } else {
            $error = "Impossible d'écrire le fichier de configuration. Vérifiez les permissions du serveur.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><title>Installation du Template</title>
    <style>
        body { font-family: sans-serif; background: #080808; color: white; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .installer { background: #111; border: 1px solid #333; padding: 40px; border-radius: 20px; width: 400px; }
        h1 { color: #ccff00; }
        label { display: block; margin: 15px 0 5px; color: #888; }
        input[type="text"], input[type="password"], input[type="color"] { width: 100%; padding: 10px; border: 1px solid #444; background: #222; color: white; border-radius: 5px; }
        button { background: #ccff00; color: black; border: none; padding: 12px 20px; border-radius: 5px; cursor: pointer; font-weight: bold; width: 100%; margin-top: 20px; }
        .error { color: #ff6b6b; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="installer">
        <h1>Installation</h1>
        <p style="color: #666;">Bienvenue ! Configurez votre site en quelques secondes.</p>
        <?php if ($error): ?><p class="error"><?= $error ?></p><?php endif; ?>
        <form method="POST">
            <label for="password">Choisissez un mot de passe Admin</label>
            <input type="password" name="password" id="password" required>
            
            <label for="color">Choisissez votre couleur principale</label>
            <input type="color" name="color" id="color" value="#ccff00">
            
            <button type="submit">Installer le site</button>
        </form>
    </div>
</body>
</html>