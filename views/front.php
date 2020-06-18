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
    <?php
	require $view;
	$pageTitle;
	?>
</main>	
<?php require('partials/footer.php'); ?>    
</body>
<script type="text/javascript" src="./assets/script/script.js"></script>
</html>