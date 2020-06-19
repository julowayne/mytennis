<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
        case 'new' :
            if(isset($_SESSION['user']) && !empty($_SESSION['cart'])){
                $cartProducts = getCartProducts(); 
                $order = uploadOrder();
                $orderDetails = getOrderDetails($_SESSION['order_id'], $cartProducts);
                $_SESSION['messages'] = ['message' => 'Votre commande a bien été enregistrée', 'type' => 'success'];
                unset($_SESSION['cart']);
                unset($_SESSION['order_id']);
                header('location:index.php?p=users&action=edit&id='. $_GET['id']);
                exit;
            }
            else {
                $_SESSION['messages'] = ['message' => 'Vous devez être connecté pour passer une commande', 'type' => 'danger'];
            }
			break;
        case 'view' :
			break;
        case 'list':
			break;
        case 'display' :
			break;
        default :
		header('Location:index.php');
	}
}
else{
	require('controllers/indexController.php');
}