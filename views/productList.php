<div id="product-list">   
    <div class="filters">
        <h2>Filtres</h2>
        <div>
            <h4>Prix :</h4>
            <label for="increasing"><input type="checkbox" class="stay-connected" id="increasing" name="increasing">Croissant</label><br>
            <label for="decreasing"><input type="checkbox" class="stay-connected" id="decreasing" name="decreasing">Décroissant</label>
        </div>
        <div>
            <h4>Marques :</h4>
            <label for="wilson"><input type="checkbox" class="stay-connected" id="wilson" name="wilson">Wilson</label><br>
            <label for="brand"><input type="checkbox" class="stay-connected" id="brand" name="brand">Babolat</label><br>
            <label for="brand"><input type="checkbox" class="stay-connected" id="brand" name="brand">Artengo</label><br>
            <label for="brand"><input type="checkbox" class="stay-connected" id="brand" name="brand">Head</label>
        </div>
        <div>
        <h4>Manche :</h4>
            <label for="grip"><input type="checkbox" class="stay-connected" id="grip" name="grip">Grip 1</label><br>
            <label for="grip"><input type="checkbox" class="stay-connected" id="grip" name="grip">Grip 2</label><br>
            <label for="grip"><input type="checkbox" class="stay-connected" id="grip" name="grip">Grip 3</label><br>
            <label for="grip"><input type="checkbox" class="stay-connected" id="grip" name="grip">Grip 4</label>
        </div>
        <div>
        <h4>Raquette :</h4>
            <label for="racket"><input type="checkbox" class="stay-connected" id="racket" name="racket">Cordée</label><br>
            <label for="racket"><input type="checkbox" class="stay-connected" id="racket" name="racket">Non cordée</label>
        </div>
    </div>
    <div class="products-container">
        <?php foreach($productsByCategories as $productsByCategory): ?>
            <?php if($productsByCategory['activated'] == 1): ?>
                <a class="card" href="index.php?p=products&action=product&id=<?=$productsByCategory['id'] ?>">
<!--                 <a class="card" href="index.php?p=products&action<?= isset($product) && ($_GET['action']) == 'product' ? '&id='.$productsByCategory['id']  : 'default' ?>">
 -->               
                    <div class="product-head">
                    <span><?= $productsByCategory['name'] ?></span>
                    <span><?= $productsByCategory['price'] ?>€</span>    
                    </div>
                    <div>
                        <img src="admin/assets/images/products/<?= $productsByCategory['image']; ?>" alt="<?= $productsByCategory['name']; ?>">
                    </div>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>