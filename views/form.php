<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php require ('partials/header.php'); ?>
            <div class="form">
                <ul class="headform">
                    <li class="tab" id="tab-inscription" onclick="javascript:change_tab('inscription')">Inscription</li>
                    <li class="tab" id="tab-connexion" onclick="javascript:change_tab('connexion')">Connexion</li>
                </ul>
                <div>
                    <div class="contenu_onglets">
                    <?php if(isset($_SESSION['messages'])): ?>
                        <div>
                            <?php foreach($_SESSION['messages'] as $message): ?>
                                <?= $message ?><br>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?> 
                        <div class="tab-content signup-content" id="tab-content-inscription">
                            <form action="index.php?p=users&action=signup" method="post">
                                <label for="firstname">Prénom *</label>
                                <input type="text" name="firstname">
                                <label for="lastname">Nom *</label>
                                <input type="text" name="lastname">
                                <label for="email">Email *</label>
                                <input id="email" type="email" name="email" required>
                                <label for="password">Mot de passe *</label>
                                <input id="password" type="password" name="password" required>
                                <div id="obligatory">* Champs obligatoires</div>
                                <button type="submit">Envoyer</button>
                            </form>
                        </div>
                        <div class="tab-content signup-content" id="tab-content-connexion">
                            <form action="index.php?p=users&action=login" method="post">
                                <label for="email">Email</label>
                                <input type="email" name="email" required>
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" required>
                                <label for="connected"><input type="checkbox" class="stay-connected" id="connected" name="connected">Rester connecté</label>
                                <div id="forgot"><a href="index.php?p=users&action=password">Mot de passe oublié ?</a></div>
                                <button type="submit">Connexion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php require ('partials/footer.php'); ?>
<script type="text/javascript" src="./assets/script/script.js"></script>
</body>
</html>