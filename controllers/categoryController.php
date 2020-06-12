<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'menu' :
			$childCategories = getChildCategories();
			require('views/category.php'); 
			break;
		case 'list' :
			$productsByCategories = getProductByCategories($_GET['id']);
			require('views/productList.php');  
			break;	
        default :
		header('Location:index.php?controller=users&action=list');
	}
}
else{
	require('controllers/indexController.php');
}