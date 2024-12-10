<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>navbar</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="add.php">Ajouter un film</a></li>
            </ul>
        </nav>
        <a href="register.php">S'enregistrer</a>
        <a href="connect.php">Se connecter</a>
        <a href="disconnect.php">Se déconnecter</a>
    </header>
    <?= "Coucou " . $_SESSION['username']; ?>


    
</body>
</html>