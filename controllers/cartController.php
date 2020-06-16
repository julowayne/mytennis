<?php 
require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
        case 'addProduct' :
            /* $_SESSION['cart'][] = [
                'id' => $_GET['product_id'],
                'quantity' => $_POST['quantity'],
            ]; */
            $_SESSION['cart'] [$_GET['product_id']] = $_POST['quantity'];
            header('location:index.php?p=cart&action=display');
            exit;
            // Ici ajouter au panier
            //rediriger vers display
            // Reçoit 2 informations : ID du produit & qty
            // s'assurer que la valeur reçue est un INT positif ou un float
            // s'assurer que la valeur demandée n'est pas supérieure au stock
            // sinon rediriger avec un msg
            // s'assurer que l'ID existe bien
            /*  $_SESSION['cart'] [$_GET['product_id']] = $_POST['quantity']; */
            /* $view = 'views/cart.php';
			$pageTitle = "Votre panier";  */ 
			break;
        case 'deleteProduct' :
            unset($_SESSION['cart'] [$_GET['product_id']]);
            // Ici supprimer du panier
            // afficher un msg
            //rediriger vers display
            header('location:index.php?p=cart&action=display');
            exit;
			break;
        case 'updateProductQty':
            $productId = $_GET['product_id'];
            $_SESSION['cart'][$_GET['product_id']] = $_POST['quantity'];
            // Ici mettre a jouer la quantité d'un produit du panier
            //rediriger vers display
            header('location:index.php?p=cart&action=display');
            exit;
			break;
        case 'display' :
            $cartProducts = []; 
            $cartProducts = getCartProducts(); 
            print_r($cartProducts);
            $view = 'views/cart.php';
			$pageTitle = "Votre panier"; 
			break;
        default :
		header('Location:index.php');
	}
}
else{
	require('controllers/indexController.php');
}