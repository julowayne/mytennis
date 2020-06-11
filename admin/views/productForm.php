<div class="col text-left">
	<h3>Formulaire du produit</h3>
	<?php if(isset($_SESSION['messages'])): ?>
		<div>
			<?php foreach($_SESSION['messages'] as $message): ?>
				<?= $message ?><br>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<form class="form-group col-4" action="index.php?controller=products&action=<?= isset($product) || (isset($_SESSION['old_inputs']) && $_GET['action'] == 'edit') ? 'edit&id='.$_GET['id'] : 'add' ?>" method="post" enctype="multipart/form-data">
		
		<label for="name">Nom :</label><br>
		<input class="form-control" type="text" name="name" id="name" value="<?= isset($product) ? $product['name'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['name'] : '' ?>" /><br>

		<label for="category_id">Catégorie : </label><br>
		<select class="form-control" name="category_id[]" id="category_id" multiple>

		<?php foreach($categories as $categorie): ?>
			<?php
			$selected = false;
			foreach($categoryProducts as $categoryProduct){
				if($categorie['id'] == $categoryProduct['id']){
					$selected = true;
				}
			}
			?>	
		<option value="<?= $categorie['id'] ?>" <?php if (isset($product) && $selected): ?> selected="selected" <?php endif;?>><?= $categorie['name'] ?></option>
		<?php endforeach;?>
		</select><br>
		<label for="price">Prix :</label><br>
		<input class="form-control" type="text" name="price" id="price" value="<?= isset($product) ? $product['price'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['price'] : '' ?>" /><br>

		<label for="quantity">Quantité :</label><br>
		<input class="form-control" type="text" name="quantity" id="quantity" value="<?= isset($product) ? $product['quantity'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['quantity'] : '' ?>" /><br>

		<label for="short_description">Description :</label><br>
		<textarea rows="3" cols="50" name="short_description" id="short_description"><?= isset($product) ? $product['short_description'] : '' ?><?= isset($_SESSION['old_inputs']) ? $_SESSION['old_inputs']['short_description'] : '' ?></textarea><br>

		<label for="image">image :</label>
		<input class="form-control-file" type="file" name="image" id="image" /><br>
		
		<input class="btn btn-lg btn-success mt-2" name="save" type="submit" value="Enregistrer" />
	</form>
</div>