<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page user</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php require ('partials/header.php'); ?>
    <div class="form">
        <div class="headform">
            <div class="profil">
                Profil
            </div>
        </div>
        <div class="signup-content">
            <method="post" action="index.php?p=users&action=<?= isset($user) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='.$_GET['id'] : 'form' ?>" method="post" enctype="multipart/form-data">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" value="<?= isset($user) ? $user['firstname'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['firstname'] : '' ?>" />
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" id="lastname" value="<?= isset($user) ? $user['lastname'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['lastname'] : '' ?>" />
                <label for="address">Adresse</label>
                <input type="text" name="address" id="address" value="<?= isset($user) ? $user['address'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['address'] : '' ?>" />
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?= isset($user) ? $user['email'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['email'] : '' ?>" required />
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required>
                <button type="submit">Modifier</button>
            </form>
        </div>
    </div>
<?php require ('partials/footer.php'); ?>    
</body>
</html>