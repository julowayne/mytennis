<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');
require('models/Cart.php');
require('models/Order.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
        case 'new' :
            // verifier si user = connected
            if(isset($_SESSION['user'])){

            }
            else {
                header('location:index.php?p=users&action=form');
				exit;
            }
            // Ici recuperer produit & quantity avec $_SESSION['cart']
            //creer la commande
            //rediriger vers list des commandes
			break;
        case 'view' :
            //affichage d'une commande
			break;
        case 'list':
            //afficher liste des commandes
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