<?php 
    $bdd = new PDO('mysql:host=localhost;dbname=film;charset=utf8','root','');


    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST['username'])  && isset($_POST['password'] )) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
   
            if (!empty($username) && !empty($password)){
                // Vérif dans la base de donnée pour les doublons
                $check = $bdd->prepare('SELECT * FROM user WHERE username = :username');
                $check->execute(['username' => $username]);

                // Confirme qu'il n'y a pas de ligne ayant le même nom d'utilisateur
                if ($check->rowCount() === 0) {
                    // Hashage du mot de passe 
                    $hashpass = password_hash($password, PASSWORD_ARGON2I);

                    // Ajouter l'utilisateur dans la base de donnée
                    $insert = $bdd->prepare('INSERT INTO user (username, password) VALUES (:username, :password)');
                    $insert->execute([
                        'username'  => $username,
                        'password'  => $hashpass
                    ]);

                    echo "Inscription réussi.";
                }
                else {echo "Le nom d'utilisateur est déjà utilisé.";}
            }         
            else {echo "Des champs obligatoires sont vides.";}
        }
    }  



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>S'enregistrer</title>
</head>
<body>
    <?php include "nav.php" ?>
    <h1>S'enregistrer</h1>
    <form id="register" action="register.php" method="POST">
        <label for="username">Username *</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password *</label>
        <input type="password" id="password" name="password" required>
        <button>S'enregistrer</button>
    </form>

</body>
</html>