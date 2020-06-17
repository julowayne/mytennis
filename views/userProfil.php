<div class="profil-container">
    <div class="form">
        <div class="headform">
            <div class="profil">
                Profil
            </div>
        </div>  
        <div class="signup-content">
            <form method="post" action="index.php?p=users&action=<?= isset($user) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='.$_GET['id'] : 'form' ?>" method="post" enctype="multipart/form-data">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" value="<?= isset($user) ? $user['firstname'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['firstname'] : '' ?>" />
                <label for="lastname">Nom</label>
                <input type="text" name="lastname" id="lastname" value="<?= isset($user) ? $user['lastname'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['lastname'] : '' ?>" />
                <label for="address">Adresse</label>
                <input type="text" name="address" id="address" value="<?= isset($user) ? $user['address'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['address'] : '' ?>" />
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?= isset($user) ? $user['email'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['email'] : '' ?>" required />
                <label for="password">Changer mon mot de passe</label>
                <input id="password" type="password" name="password">
                <input type="submit" value="Enregistrer">
            </form>
        </div>
    </div>
    <div class="orders-form">
        <div class="headform">
            <div class="profil">
               Mes commandes
            </div>
        </div>
        <?php if(isset($_SESSION['messages'])): ?>
            <div>
                <?php foreach($_SESSION['messages'] as $message): ?>
                    <?= $message ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <table id="orders">
            <thead>
                <tr>
                    <th colspan="3">Client</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($orders as $order): ?>
                <tr>
                    <td><?= $order['lastname'] ?></td>
                    <td><?= $order['firstname'] ?></td>
                    <td><?= $order['address'] ?></td>
                    <td>Raquette</td>
                    <td>15</td>
                    <td>1500</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="5">Total:</th>
                    <td>100</td>
                </tr>
            </tfoot>
        </table>    
    </div>
</div>
