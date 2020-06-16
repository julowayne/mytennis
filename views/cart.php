<?php $total = 0; ?>
<div class="cart-container">
    <table id="cart">
        <thead>
            <tr>
                <th colspan="3">Client</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Action</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartProducts as $product): ?>
            <tr> 
                <td><?= $_SESSION['user']['lastname'] ?></td>
                <td><?= $_SESSION['user']['firstname'] ?></td>
                <td><?= $_SESSION['user']['address'] ?></td>
                <td><?= $product['name'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td><?= $product['price'] ?> €</td>
                <td><a  href="index.php?p=cart&action=deleteProduct&product_id=<?= $product['id'] ?>">Supprimer</a></td>
                <td>
                    <?= $rowTotal = $product['price'] * $_SESSION['cart'][$product['id']] ?> €
                    <?php $total += $rowTotal ?>
                </td>
                <?php endforeach; ?>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="7">Total</th>
                <td><?= $total?> €</td>
            </tr>
        </tfoot>
    </table>
        <form action="" id="validation">
            <input type="submit" value="Valider mon panier">
        </form>   
</div>