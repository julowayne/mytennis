<?php 

require('models/Category.php');
require('models/Order.php');
require('models/Product.php');
require('models/User.php');

if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'list' :
            $orders = getAllOrders();
			$view = 'views/orderList.php';
			$pageTitle = "Liste de toutes les commandes";
			break;
		case 'details' :
			$order = getOrder($_GET['id']);
			$view = 'views/OrderDetails.php';
			$pageTitle = "Détails de la commande";
			break;
        break;
        default :
            require('controllers/indexController.php');
	}
}
else{
	require('controllers/indexController.php');
}