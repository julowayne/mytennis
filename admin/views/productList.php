<div class="col bg-lightgray">
<h3>Liste des produits <a class="btn btn-primary btn-sm" href="index.php?controller=products&action=new" type="button">Ajouter un produit</a></h3>
	<?php if(isset($_SESSION['messages'])): ?>
		<h2>
			<div class="alert alert-<?=$_SESSION['messages']['type']?>"><?= $_SESSION['messages']['message'] ?></div>
		</h2>
	<?php endif; ?>
</div>

<div class="col text-light">
	<table class="table-striped text-light col  bg-lightgray">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
	<?php foreach($products as $product): ?> 
    <tbody>
    <tr>
        <td><?=  htmlspecialchars($product['id']) ?></td>
        <td><?=  htmlspecialchars($product['name']) ?></td>
        <td>
        <a class="btn btn-warning mr-2"  href="index.php?controller=products&action=edit&id=<?= $product['id'] ?>" type="button">Modifier</a>
        <a onclick="return confirm('êtes vous sur ?')" class="btn btn-danger" href="index.php?controller=products&action=delete&id=<?= $product['id'] ?>"type="button">Supprimer</a>
        </td>
    </tr>
    </tbody>
		<?php endforeach; ?>
	</table>
</div>