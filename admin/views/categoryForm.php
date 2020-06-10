<div class="col text-left">
	<h3>Formulaire des catégories</h3>
	<?php if(isset($_SESSION['messages'])): ?>
		<div>
			<?php foreach($_SESSION['messages'] as $message): ?>
				<?= $message ?><br>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<form class="form-group col-4" action="index.php?controller=categories&action=<?= isset($categorie) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">
		
		<label for="name">Nom :</label><br>
		<input class="form-control" type="text" name="name" id="name" value="<?= isset($categorie) ? $categorie['name'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>" /><br><br>
		<label for="description">Description :</label><br>
		<textarea class="form-control" name="description" id="short_description"><?= isset($categorie) ? $categorie['description'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['description'] : '' ?></textarea><br>
        <label for="image">image :</label>
		<input class="form-control-file" type="file" name="image" id="image" /><br>
		<input class="btn btn-lg btn-success mt-2" name="save" type="submit" value="Enregistrer" />
	</form>
</div>