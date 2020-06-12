<div class="category-container">
    <?php foreach($childCategories as $childCategory): ?>
        <?php if($childCategory['parent_id'] == $_GET['id']): ?>
        <a class="rackets" href="index.php?p=categories&action=list&id=<?= $childCategory['parent_id'] ?>">
            <div>
            <?=  $childCategory['name'] ?>
            </div>
            <img src="./admin/assets/images/categories/<?= $childCategory['image'] ?>" alt="catégorie raquette adulte">
        </a>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
