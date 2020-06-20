<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'menu' :
			if(isset($_GET['id'])){
				$categories =  getCategories();
				$childCategories = getChildCategories();
					if ($categories == false){
					$_SESSION['messages'] = ['message' => 'La catégorie demandée n\'existe pas', 'type' => 'danger'];
					header('Location:index.php');
					exit;
				}	
			}
			$view = 'views/category.php';
			$pageTitle = "Catégories"; 
			break;
		case 'list' :
			if(isset($_GET['id'])){
				$productsByCategories = getProductByCategories($_GET['id']);
				$products = getAllProducts();
				if ($productsByCategories == false){
					$_SESSION['messages'] = ['message' => 'Les produits demandés n\'existent pas', 'type' => 'danger'];
					header('Location:index.php');
					exit;
				}

			}
			$view = 'views/productList.php';
			$pageTitle = "Liste des produits"; 
			break;	
        default :
		header('Location:index.php?controller=users&action=list');
	}
}
else{
	require('controllers/indexController.php');
}