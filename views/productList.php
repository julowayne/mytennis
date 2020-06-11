<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des raquettes adultes</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php require ('partials/header.php'); ?>
<div id="product-list">   
<div class="filters">
        <h2>Filtres</h2>
        <div>
            <h4>Prix :</h4>
            <label for="increasing"><input type="checkbox" class="stay-connected" id="increasing"" name="increasing">Croissant</label><br>
            <label for="decreasing"><input type="checkbox" class="stay-connected" id="decreasing" name="decreasing">Décroissant</label>
        </div>
        <div>
            <h4>Marques :</h4>
            <label for="wilson"><input type="checkbox" class="stay-connected" id="wilson"" name="wilson"">Wilson</label><br>
            <label for="brand"><input type="checkbox" class="stay-connected" id="brand"" name="brand"">Babolat</label><br>
            <label for="brand"><input type="checkbox" class="stay-connected" id="brand" name="brand">Artengo</label><br>
            <label for="brand"><input type="checkbox" class="stay-connected" id="brand" name="brand">Head</label>
        </div>
        <div>
         <h4>Manche :</h4>
            <label for="grip"><input type="checkbox" class="stay-connected" id="grip"" name="grip"">Grip 1</label><br>
            <label for="grip"><input type="checkbox" class="stay-connected" id="grip"" name="grip"">Grip 2</label><br>
            <label for="grip"><input type="checkbox" class="stay-connected" id="grip"" name="grip"">Grip 3</label><br>
            <label for="grip"><input type="checkbox" class="stay-connected" id="grip" name="grip">Grip 4</label>
        </div>
        <div>
          <h4>Raquette :</h4>
            <label for="racket"><input type="checkbox" class="stay-connected" id="racket"" name="racket">Cordée</label><br>
            <label for="racket"><input type="checkbox" class="stay-connected" id="racket" name="racket">Non cordée</label>
        </div>
    </div>
        <div class="products-container">
            <?php foreach($productsByCategories as $productsByCategory): ?>
            <a class="card">
                <div class="product-head">
                    <?= $productsByCategory['name'] ?>
                    <?= $productsByCategory['price']?> €
                </div>
                <div>
                    <img src="admin/assets/images/products/<?= $productsByCategory['image']; ?>" alt="<?= $productsByCategory['name']; ?>">
                </div>
            </a>
            <?php endforeach; ?>
        </div>
</div>
<?php require ('partials/footer.php'); ?>
</body>
</html>