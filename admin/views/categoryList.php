<div class="col bg-lightgray">
    <h3>Liste des catégories <a class="btn btn-primary btn-sm" href="index.php?controller=categories&action=new" type="button"> Ajouter une catégorie</a></h3>
        <?php if(isset($_SESSION['messages'])): ?>
            <h2>
                <div class="alert alert-<?=$_SESSION['messages']['type']?>"><?= $_SESSION['messages']['message'] ?></div>
            </h2>
        <?php endif; ?>
</div>
<div class="col text-left">
    <table class="table-striped text-light col bg-lightgray">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php foreach($categories as $categorie): ?> 
        <tbody>
        <tr>
            <td><?=  htmlspecialchars($categorie['id']) ?></td>
            <td><?=  htmlspecialchars($categorie['name']) ?></td>
            <td><?=  htmlspecialchars($categorie['description']) ?></td>
            <td><a class="btn btn-warning mr-2"  href="index.php?controller=categories&action=edit&id=<?= $categorie['id'] ?>" type="button">Modifier</a><a onclick="return confirm('êtes vous sur ?')" class="btn btn-danger" href="index.php?controller=categories&action=delete&id=<?= $categorie['id'] ?>"type="button">Supprimer</a></td>
        </tr>
        </tbody>
            <?php endforeach; ?>
	</table>
</div>