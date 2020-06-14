<div class="container">
<?php if(isset($_SESSION['messages'])): ?>	
            <h3 class="<?=$_SESSION['messages']['type']?>"><?= $_SESSION['messages']['message'] ?></h3>		
	<?php endif; ?>
    <div class="first-article">
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
