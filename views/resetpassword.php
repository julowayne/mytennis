<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer mon mot de passe</title>
</head>
<body>
<?php require ('partials/header.php'); ?>
<div class="form">
    <form action="" method="get">
        <div class="signup-content">
            <label for="email">Email</label>
            <input type="email">
            <div>Vous recevrez un lien pour réinitialiser votre mot de passe</div>
            <button type="button">Envoyer</button>
        </div>
    </form>
</div>
<?php require ('partials/footer.php'); ?>
</body>
</html>