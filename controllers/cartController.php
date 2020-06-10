<?php 

require('models/Category.php');
require('models/Order.php');
require('models/Product.php');
require('models/User.php');
require('models/Cart.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'addProduct' :
            // Ici ajouter au panier
            //rediriger vers display
            // Reçoit 2 informations : ID du produit & qty
            // s'assurer que la valeur reçue est un INT positif ou un float
            // s'assurer que la valeur demandée n'est pas supérieure au stock
            // sinon rediriger avec un msg
            // s'assurer que l'ID existe biens
            $_SESSION['cart'] [$_GET['product_id']] = $_POST['quantity']
			break;
        case 'deleteProduct' :
            unset(  $_SESSION['cart'] [$_GET['product_id']])
            // Ici supprimer du panier
            // afficher un msg
            //rediriger vers display
			break;
        case 'updateProductQty':
            $productId = $_GET['product_id']
            $_SESSION['cart'][$_GET['product_id']] = $_POST['quantity']
            // Ici mettre a jouer la quantité d'un produit du panier
            //rediriger vers display
			break;
        case 'display' :
            $cartsProduct = [];
            foreach $_SESSION['cart'] as $product_id => $quantity
            $cartsProduct = getCartProducts(); //SELECT FROM products WHERE id = product_id  (regarder IN SQL)
            // Aller chercher tout les produits en BDD
            //Afficher un message potentiel
            //Appeller la vue de display
			break;
        default :
		header('Location:index.php?controller=users&action=list');
	}
}
else{
	require('controllers/indexController.php');
}