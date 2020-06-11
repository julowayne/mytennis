<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie raquettes</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php require ('partials/header.php'); ?>
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
<?php require ('partials/footer.php'); ?>
</body>
</html>