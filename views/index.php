<div class="container">
<?php if(isset($_SESSION['messages'])): ?>	
            <h3 class="<?=$_SESSION['messages']['type']?>"><?= $_SESSION['messages']['message'] ?></h3>		
    <?php endif; ?>
    <div class="article">
        <h1><a href="">Nouveautés</a></h1>
        <p>Le club organise le tournois régional 2021, inscrivez-vous ! L'accueil reste a votre disposition pour toute information.</p>
    </div>
    <div class="article">
        <h1><a href="">Les derniers articles</a></h1>
        <p>Envie d'une nouvelle <a href="index.php?p=categories&action=menu&id=14">raquette</a>, de nouveaux <a href="index.php?p=categories&action=menu&id=15">vêtements</a> ou de <a href="index.php?p=categories&action=menu&id=16">balles</a> neuves ? N'hésitez pas a vous balader dans la boutique !</p>
    </div>
    <div class="article">
        <h1><a href="https://www.fft.fr/" target="_blank">Actualités</a></h1>
        <p>Les dernières informations sur le monde du tennis. Nouvelle technologie de raquette en vue? </p>
    </div>
</div>
