<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'product' :
			$product = getProduct($_GET['id']);
			$view = 'views/product.php';
			$pageTitle = "Liste des raquettes";  
			break;
		case 'password' :
			break;
		case 'disconnected' :
			break;
		case 'new' :
			break;
		case 'add' :
			break;
		case 'edit' :
				break;
		case 'delete' :
			break;		
        default :
		header('Location:index.php?p=categories&action=list');
		exit;
	}
}
else{
	require('controllers/indexController.php');
}