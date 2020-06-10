<div class="col justify-content-center bg-lightgray text-center">
<h3>Liste des commandes</h3>
	<?php if(isset($_SESSION['messages'])): ?>
		<h2>
			<?php foreach($_SESSION['messages'] as $message): ?>
				<?= $message ?><br>
			<?php endforeach; ?>
		</h2>
	<?php endif; ?>
</div>

<div class="col text-center text-light">
	<table class="table-striped text-light col justify-content-center bg-lightgray text-center">
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
        <td><?=  htmlspecialchars($order['total']) ?></td>
        <td>
        <a class="btn btn-info mr-2"  href="index.php?controller=products&action=details&id=<?= $order['id'] ?>" type="button">Details</a>
        </td>
    </tr>
    </tbody>
		<?php endforeach; ?>
	</table>
</div>