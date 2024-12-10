<?php

    session_start();

    $bdd = new PDO('mysql:host=localhost;dbname=film;charset=utf8','root','');

    if (isset($_FILES['userfile'])){
        $file = $_FILES['userfile'];

        $uniqueName = uniqid() . "-" . basename($file['name']);
        $uploadDir = 'images/';
        $uploadPath = $uploadDir. $uniqueName;

        move_uploaded_file($file['tmp_name'],$uploadPath);};
    
    if (isset($_POST["titre"]) && isset($_POST["duree"]) && isset($_POST["date_de_sortie"])){
        $titre = htmlspecialchars($_POST['titre']);
        $duree = htmlspecialchars($_POST['duree']);
        $date = htmlspecialchars($_POST['date_de_sortie']);
        $file = htmlspecialchars($uploadPath);

        $request = $bdd->prepare('  INSERT INTO film (titre,duree,date_de_sortie,userfile)
                                    VALUES (:titre,:duree,:date_de_sortie,:userfile)
                                ');

        $request->execute([
            'titre'             =>$titre,
            'duree'             =>$duree,
            'date_de_sortie'    =>$date,
            'userfile'          =>$file
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

    <form action="add.php" method="POST" enctype="multipart/form-data">
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
    <?php if (isset($_FILES['userfile'])){
        echo "<img src='" . "$uploadPath" . "'>";
        };?>

</body>
</html>