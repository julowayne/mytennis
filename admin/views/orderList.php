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
            <th>firstname</th>
            <th>lastname</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
	<?php foreach($orders as $order): ?> 
    <tbody>
    <tr>
        <td><?=  htmlspecialchars($order['id']) ?></td>
        <td><?=  htmlspecialchars($order['firstname']) ?></td>
        <td><?=  htmlspecialchars($order['lastname']) ?></td>
        <!-- Test sur le retour du total via la fonction getOrderTotal(); mais pas réussi a afficher le bon contenu (prix tjs = a la 1ère commande) -->
        <?php foreach($orderTotal as $total): ?>
            <?php $price = intval($total['price']) ?>
            <?php $quantity = intval($total['quantity'])  ?>
            <?php endforeach; ?>
        <td><?= $price * $quantity ?> €
        </td>
        <td>
        <a class="btn btn-info mr-2"  href="index.php?controller=orders&action=details&id=<?= $order['id'] ?>" type="button">Details</a>
        </td>
    </tr>
    </tbody>
		<?php endforeach; ?>
	</table>
</div>