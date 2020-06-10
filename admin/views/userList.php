<div class="col justify-content-center bg-lightgray text-center">
<h3>Liste des utilisateurs <a class="btn btn-primary btn-sm" href="index.php?controller=users&action=new" type="button"> Ajouter un utilisateur</a></h3>
	<?php if(isset($_SESSION['messages'])): ?>
		<h2>
			<?php foreach($_SESSION['messages'] as $message): ?>
				<?= $message ?><br>
			<?php endforeach; ?>
		</h2>
	<?php endif; ?>
</div>
<div class="col text-center text-light">
	<table class="table-striped col justify-content-center bg-lightgray text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Admin</th>
            <th>Action</th>
        </tr>
    </thead>
	<?php foreach($users as $user): ?> 
    <tbody>
    <tr>
        <td><?=  htmlspecialchars($user['id']) ?></td>
        <td><?=  htmlspecialchars($user['firstname']) ?></td>
        <td><?=  htmlspecialchars($user['lastname']) ?></td>
        <td><?=  htmlspecialchars($user['email']) ?></td>
        <td><?=  htmlspecialchars($user['is_admin']) ?></td>
        <td><a class="btn btn-warning mr-2"  href="index.php?controller=users&action=edit&id=<?= $user['id'] ?>" type="button">Modifier</a><a onclick="return confirm('êtes vous sur ?')" class="btn btn-danger" href="index.php?controller=users&action=delete&id=<?= $user['id'] ?>"type="button">Supprimer</a></td>
    </tr>
    </tbody>
		<?php endforeach; ?>
	</table>
</div>