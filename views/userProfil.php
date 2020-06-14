<div class="form">
    <div class="headform">
        <div class="profil">
            Profil
        </div>
    </div>
    <?php if(isset($_SESSION['messages'])): ?>
        <div>
            <?php foreach($_SESSION['messages'] as $message): ?>
                <?= $message ?><br>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>    
    <div class="signup-content">
        <method="post" action="index.php?p=users&action=<?= isset($_SESSION['user']) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='.$_GET['id'] : 'form' ?>" method="post" enctype="multipart/form-data">
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" id="firstname" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['firstname'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['user']['old_inputs']['firstname'] : '' ?>" />
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" id="lastname" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['lastname'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['user']['old_inputs']['lastname'] : '' ?>" />
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['address'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['user']['old_inputs']['address'] : '' ?>" />
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?= isset($_SESSION['user']) ? $_SESSION['user']['email'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['user']['old_inputs']['email'] : '' ?>" required />
            <label for="password">Changer mon mot de passe</label>
            <input id="password" type="password" name="password">
            <button type="submit" id="profil">Modifier</button>
        </form>
    </div>
</div>