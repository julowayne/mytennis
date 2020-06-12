<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mytennis</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php require ('partials/header.php'); ?>

<div class="container">
    <?php if(isset($_SESSION['messages'])): ?>
        <div>
            <?php foreach($_SESSION['messages'] as $message): ?>
                <?= $message ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?> 
    <div id="first-article">
        <h1><a href="">Nouveautés</a></h1>
        <p>Le club organise le tournois régional 2021, inscrivez-vous ! L'accueil reste a votre disposition pour toute information.</p>
    </div>
    <div id="second-article">
        <h1><a href="http://fft.com">Actualités</a></h1>
        <p>Les dernières informations sur le monde du tennis. Nouvelle technologie de raquette en vue? </p>
    </div>
    <div id="second-article">
        <h1><a href="http://fft.com">Actualités</a></h1>
        <p>Les dernières informations sur le monde du tennis. Nouvelle technologie de raquette en vue? </p>
    </div>
</div>
<?php require ('partials/footer.php'); ?>
</body>
</html>
