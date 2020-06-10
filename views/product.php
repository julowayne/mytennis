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
        <img src="./admin/assets/images/products/1.png" alt="">
        <div id="description">
            <h3>Raquette Wilson Clash 100</h3>
            <p>
            La raquette Wilson Clash 100 apporte des sensations de jeux inédites : souplesse, stabilité et puissance !
            </p>
            <div id="stats">
                Caractéristiques :
                    <li>Poids: 295gr</li>
                    <li>Equilibre: 310mm</li>
                    <li>Vendue cordée</li>
            </div>
            <div id="price">
                170€
            </div>
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