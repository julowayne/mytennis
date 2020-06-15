<div class="product-container">
    <img src="./admin/assets/images/products/<?= $product['image'] ?>" alt="">
    <div id="description">
        <h3><?= $product['name'] ?></h3>
        <p>
        <?= $product['short_description'] ?>
        </p>
        <div id="stats">
                Quantité disponible : <br><?= $product['quantity'] ?>
        </div>
        <div id="price">
        <?= $product['price'] ?>€
        </div>
        <form action="index.php?p=cart&action=addProduct&product_id=<?= $product['id'] ?>" method="post">
            <input type="submit" value="Ajouter au panier"/>
        </form>
    </div>
</div>



<!-- <form action="index.php?controller=cart&action=addProduct&product_id=$product['id']" method="post">
    <select name="quantity" id="quantity">
    <?php for($i=0;$i <= $product['quantity']; $i++): ?>
        <option value="$i"><?= $i ?></option>
    <?php endfor; ?>    
    </select>
 </form>   
quantité disponible : -->