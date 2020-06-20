<div class="col text-left">
	<h3>Formulaire des utilisateurs</h3>
	<?php if(isset($_SESSION['messages'])): ?>
		<h2>
            <div class="alert alert-<?=$_SESSION['messages']['type']?>"><?= $_SESSION['messages']['message'] ?></div>
		</h2>
	<?php endif; ?>
	<form class="form-group col-4" action="index.php?controller=users&action=<?= isset($user) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">
        <label for="firstname">Prénom :</label><br>
		<input class="form-control" type="text" name="firstname" id="firstname" value="<?= isset($user) ? $user['firstname'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['firstname'] : '' ?>" /><br>
        <label for="lastname">Nom :</label><br>
		<input class="form-control" type="text" name="lastname" id="lastname" value="<?= isset($user) ? $user['lastname'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['lastname'] : '' ?>" /><br>
		<label for="email">Email : </label><br>
        <input class="form-control" type="email" name="email" id="email" value="<?= isset($user) ? $user['email'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['email'] : '' ?>" /><br>
		<label for="address">Adresse : </label><br>
        <input class="form-control" type="text" name="address" id="address" value="<?= isset($user) ? $user['address'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['address'] : '' ?>" /><br>
        <label for="password">Mot de passe : </label><br>
        <input class="form-control" type="password" name="password" id="password" /><br>
        <label for="is_admin">Status admin :</label><br>
		<select class="form-control" name="is_admin" id="is_admin" size="2">
			<option value="1" <?php if (isset($user['is_admin'])): ?> selected="selected" <?php endif;?>>Oui</option>
			<option value="0" <?php if (isset($user['is_admin'])): ?> selected="selected" <?php endif;?>>Non</option>
		</select><br>	
		<input class="btn btn-lg btn-success mt-2" name="save" type="submit" value="Enregistrer" />
	</form>
</div>