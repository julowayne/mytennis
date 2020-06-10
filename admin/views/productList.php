<div class="col justify-content-center bg-lightgray text-center">
<h3>Liste des produits <a class="btn btn-primary btn-sm" href="index.php?controller=products&action=new" type="button">Ajouter un produit</a></h3>
	<?php if(isset($_SESSION['messages'])): ?>
		<h2>
			<?php foreach($_SESSION['messages'] as $message): ?>
				<?= $message ?><br>
			<?php endforeach; ?>
		</h2>
	<?php endif; ?>
</div>

<div class="col text-center justify-content-center text-light">
	<table class="table-striped text-light col justify-content-center bg-lightgray text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <!-- <th>Categorie</th> -->
            <th>Action</th>
        </tr>
    </thead>
	<?php foreach($products as $product): ?> 
    <tbody>
    <tr>
        <td><?=  htmlspecialchars($product['id']) ?></td>
        <td><?=  htmlspecialchars($product['name']) ?></td>
            <!-- <?php foreach($productsCategories as $productsCategory): ?> 
                <td><?=  htmlspecialchars($productsCategory['category_id']) ?></td>
            <?php endforeach; ?> -->
        <td>
        <a class="btn btn-warning mr-2"  href="index.php?controller=products&action=edit&id=<?= $product['id'] ?>" type="button">Modifier</a>
        <a onclick="return confirm('êtes vous sur ?')" class="btn btn-danger" href="index.php?controller=products&action=delete&id=<?= $product['id'] ?>"type="button">Supprimer</a>
        </td>
    </tr>
    </tbody>
		<?php endforeach; ?>
	</table>
</div>