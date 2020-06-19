<?php $total = 0; ?>
<div class="profil-container">
    <div class="orders-form">
        <div class="headform">
            <div class="profil">
               Détail de la commande
            </div>
        </div>
        <?php if(isset($_SESSION['messages'])): ?>
            <div>
                <?php foreach($_SESSION['messages'] as $message): ?>
                    <?= $message ?><br>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <table class="orders">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($orderDetails as $orderDetail): ?>
                <tr>
                    <td><?= $orderDetail['name'] ?></td>
                    <td><?= $orderDetail['quantity'] ?></td>
                    <td><?= $orderDetail['price'] ?> €</td>
                    <td> <?= $rowTotal = $orderDetail['price'] * $orderDetail['quantity'] ?> €
                    <?php $total += $rowTotal ?></td>
            <?php endforeach; ?>
                </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <td><?= $total?> €</td>
            </tr>
        </tfoot>
        </table>    
    </div>
</div>