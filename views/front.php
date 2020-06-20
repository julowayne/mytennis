<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $pageTitle ?></title>
        <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php require('partials/header.php'); ?>
<main>
    <?php if (isset($_SESSION['user'])): ?>
    <div class="responsive-profil">
        <a href="index.php?p=users&action=edit&id=<?= $_SESSION['user']['id'] ?>"><?= $_SESSION['user']['firstname'] ?></a>
    <?php if($_SESSION['user']['is_admin'] == 1): ?>
        <a href="./admin/index.php?controller=index">Administration</a>
        <?php endif; ?>
        <a href="index.php?p=users&action=disconnected">Déconnexion</a>
    <?php endif; ?>
    </div>
<?php
	require $view;
	$pageTitle;
?>
</main>	
<?php require('partials/footer.php'); ?>    
</body>
<script type="text/javascript" src="./assets/script/script.js"></script>
</html>