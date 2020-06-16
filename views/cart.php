<?php $total = 0; ?>
<div class="cart-container">
    <table id="cart">
        <thead>
            <tr>
                <th colspan="3">Client</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
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
                <td><?= $product['price'] ?></td>
                <td><?= $rowTotal = $product['price'] * $product['quantity']?></td>
                <?php endforeach; ?>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6">Total</th>
                <td><?php $total += $rowTotal ?></td>
            </tr>
        </tfoot>
    </table>   
</div>