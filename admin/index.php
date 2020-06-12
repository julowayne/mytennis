<?php
session_start();
$_SESSION['viewAdmin'] = true;
require ('../helpers.php');
require('../models/Category.php');
$categories = getCategories();
$childCategories = getChildCategories();
if(isset($_GET['controller'])){
	switch ($_GET['controller']){
		case 'users' :
            require 'controllers/usersController.php';
			break;
		case 'categories' :
			require 'controllers/categoriesController.php';
			break;
		case 'products' :
			require 'controllers/productsController.php';
			break;
		case 'orders' :
			require 'controllers/ordersController.php';
			break;		
        default :
            require 'controllers/indexController.php';
	}
}
else{
	require 'controllers/indexController.php';
}
require('views/admin.php');

if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);	
} ?>




