<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php require ('partials/header.php'); ?>
        <div class="product-container">
            <img src="./admin/assets/images/products/<?= $product['image'] ?>" alt="">
            <div id="description">
                <h3><?= $product['name'] ?></h3>
                <p>
                <?= $product['short_description'] ?>
                </p>
                <div id="stats">
                    Caractéristiques :
                        <li>Poids: 295gr</li>
                        <li>Equilibre: 310mm</li>
                        <li>Vendue cordée</li>
                </div>
                <div id="price">
                <?= $product['price'] ?>€
                </div>
                <button type="submit">Ajouter au panier</button>
            </div>
        </div>
    <?php require ('partials/footer.php'); ?>
</body>
</html>


<!-- <form action="index.php?controller=cart&action=addProduct&product_id=$product['id']" method="post">
    <select name="quantity" id="quantity">
    <?php for($i=0;$i <= $product['quantity']; $i++): ?>
        <option value="$i"><?= $i ?></option>
    <?php endfor; ?>    
    </select>
 </form>   
quantité disponible : -->