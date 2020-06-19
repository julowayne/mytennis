<?php $total = 0; ?>
<div class="cart-container <?= empty($cartProducts) ? 'hide' : '' ; ?>">
    <?php if(isset($_SESSION['messages'])): ?>	
            <h3 class="<?=$_SESSION['messages']['type']?>"><?= $_SESSION['messages']['message'] ?></h3>		
    <?php endif; ?>
    <table id="cart">
        <thead>
            <tr>
                <th>Client</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Action</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if(isset($cartProducts)): ?>
            <?php foreach ($cartProducts as $product): ?>
            <tr> 
                <td><?= $_SESSION['user']['lastname'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $_SESSION['cart'][$product['id']] ?></td>
                <td><?= $product['price'] ?> €</td>
                <td><a  href="index.php?p=cart&action=deleteProduct&product_id=<?= $product['id'] ?>">Supprimer</a></td>
                <td>
                    <?= $rowTotal = $product['price'] * $_SESSION['cart'][$product['id']] ?> €
                    <?php $total += $rowTotal ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">Total de la commande</td>
                <td><?= $total?> €</td>
            </tr>
        </tfoot>
    </table>
    <form action="index.php?p=orders&action=new" id="validation" method="post">
            <input type="submit" value="Valider mon panier">
        </form> 
</div>