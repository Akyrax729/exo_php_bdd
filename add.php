<?php
    $bdd = new PDO('mysql:host=localhost;dbname=film;charset=utf8','root','');

    if (isset($_POST["titre"]) && isset($_POST["duree"]) && isset($_POST["date_de_sortie"])){
        $titre = htmlspecialchars($_POST['titre']);
        $duree = htmlspecialchars($_POST['duree']);
        $date = htmlspecialchars($_POST['date_de_sortie']);
        $file = htmlspecialchars($file = $_FILES['userfile']);

        $request = $bdd->prepare('  INSERT INTO film (titre,duree,date_de_sortie)
                                    VALUES (:titre,:duree,:date_de_sortie)
                                ');

        $request->execute([
            'titre'             =>$titre,
            'duree'             =>$duree,
            'date_de_sortie'    =>$date
        ]);
        
    };   
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="PumpkinSpiceNyan.gif" type="image/x-icon">
    <title>Ajouter un film</title>
</head>
<body>
    <?php include "nav.php" ?>

    <form action="add.php" method="POST">
        <label for="titre">Le titre de votre film</label>
        <input type="text" id="titre" name="titre" required>

        <label for="duree">La duree en minute</label>
        <input type="number" id="duree" name="duree" required>

        <label for="date_de_sortie">L'annee de sortie du film</label>
        <input type="text" id="date_de_sortie" name="date_de_sortie" required>

        <label for="userfile">Votre image a upload</label>
        <input type="file" name="userfile" id="userfile">

        <button>Ajouter</button>
    </form>

    <?php 
            $file = $_FILES['images'];
            move_uploaded_file($file['tmp_name'],$file['name']);
            echo '<img src="'.$file['name'].'">'; 
    ?>

</body>
</html>