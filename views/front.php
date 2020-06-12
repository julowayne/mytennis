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
<div>
    <?php
	require $view;
	$pageTitle 
    ?>
</div>
<?php require('partials/footer.php'); ?>    
</body>
</html>