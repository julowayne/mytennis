<div class="cart-container">
    <table id="cart">
        <thead>
            <tr>
                <th colspan="3">Client</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $_SESSION['user']['lastname'] ?></td>
                <td><?= $_SESSION['user']['firstname'] ?></td>
                <td><?= $_SESSION['user']['address'] ?></td>
                <td>Raquette</td>
                <td>15</td>
                <td>1500</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">Total:</th>
                <td>100</td>
            </tr>
        </tfoot>
    </table>   
</div>