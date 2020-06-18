<?php 
require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
        case 'addProduct' :
            if(empty($_POST['quantity']) || $_POST['quantity'] < 1 ){
                $_SESSION['messages'] = ['message' => 'Vous devez choisir une quantité pour ajouter un produit a votre panier', 'type' => 'danger'];
                header('location:index.php?p=cart&action=display');
                exit;
            }else {
                $_SESSION['cart'] [$_GET['product_id']] = $_POST['quantity'];
                $_SESSION['messages'] = ['message' => 'Ajout du produit a votre panier', 'type' => 'success'];
                header('location:index.php?p=cart&action=display');
                exit;
            }
			break;
        case 'deleteProduct' :
            unset($_SESSION['cart'][$_GET['product_id']]);
            $_SESSION['messages'] = ['message' => 'Suppression du produit de votre panier', 'type' => 'success'];

            header('location:index.php?p=cart&action=display');
            exit;
			break;
        case 'updateProductQty':
            $_SESSION['cart'][$_GET['product_id']] = $_POST['quantity'];
            header('location:index.php?p=cart&action=display');
            exit;
			break;
        case 'display' :
            $cartProducts = []; 
            if(!empty($_SESSION['cart'])){ 
                $cartProducts = getCartProducts(); 
            }
            else{
                $_SESSION['messages'] = ['message' => 'Vous n\'avez pas encore ajouté de produit a votre panier', 'type' => 'danger'];
            }
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