<?php 

require('models/Category.php');
require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'rackets' :
			require('views/racketsCategory.php'); 
			break;
		case 'login' :
			break;
		case 'password' :
			break;
		case 'disconnected' :
			break;
		case 'new' :
			$users = getAllUsers();
			$view = 'views/userForm.php';
			$pageTitle = "Ajout d'un utilisateur";
			break;
		case 'add' :
			break;
		case 'edit' :
				break;
		case 'delete' :
			break;		
        default :
		header('Location:index.php?controller=users&action=list');
	}
}
else{
	require('controllers/indexController.php');
}