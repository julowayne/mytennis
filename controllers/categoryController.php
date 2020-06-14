<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'menu' :
			$childCategories = getChildCategories();
			$productsByPrice = search();
			$view = 'views/category.php';
			$pageTitle = "Catégories"; 
			break;
		case 'list' :
			$productsByCategories = getProductByCategories($_GET['id']);
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