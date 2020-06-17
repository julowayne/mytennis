<div class="col bg-lightgray">
<h3>Liste des commandes</h3>
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
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
	</table>
</div>