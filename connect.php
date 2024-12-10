<?php
    session_start();

    $bdd = new PDO('mysql:host=localhost;dbname=film;charset=utf8','root','');

    $request = $bdd ->prepare(' SELECT * FROM user');

    $request->execute([]);

    if (isset($_POST['username'])  && isset($_POST['password'] )) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        $check = $bdd->prepare('SELECT * FROM user WHERE username =:username');
        $check->execute(['username' => $username]);
        $user = $check->fetch();

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

        }
    }  

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Se connecter</title>
</head>
<body>
    <?php include "nav.php" ?>
    <h1>Se connecter</h1>
    <form action="connect.php" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <button>Se connecter</button>
    </form>

</body>
</html>