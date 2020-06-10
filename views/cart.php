<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>
<body>
    <?php require ('partials/header.php'); ?>
    <?php $total = 0?>
    <?php foreach($cartProducts as $cartProduct) ?>
    <?= $rowTotal = $product['price'] * $_SESSION['cart'][$product['id']][$product['quantity']] 
    $total += $rowTotal?>

    <?php endforeach; ?>
    <a href="index.php?controller=cart&action=deleteProduct&productId=$product['id']">Supprimer</a>

   <?php if(isset($_SESSION['user'])){
       <a href="index.php?controller=order&action=new">Commander</a>
    }
    ?>
    <?php require ('partials/footer.php'); ?>
</body>
</html>