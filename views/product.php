<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
</head>
<body>
    


 <form action="index.php?controller=cart&action=addProduct&product_id=$product['id']" method="post">
    <select name="quantity" id="quantity">
    <?php for($i=0;$i <= $product['quantity']; $i++): ?>
        <option value="$i"><?= $i ?></option>
    <?php endfor; ?>    
    </select>
 </form>   
quantité disponible :

</body>
</html>