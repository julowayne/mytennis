<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'product' :
			if(isset($_GET['id'])){
				$product = getProduct($_GET['id']);
				if ($product == false){
					$_SESSION['messages'] = ['message' => 'Le produit demandé n\'existe pas', 'type' => 'danger'];
					header('Location:index.php');
					exit;
				}	
			}
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