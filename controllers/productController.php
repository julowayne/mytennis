<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'raquette' :
			require('views/product.php'); 
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
		header('Location:index.php?controller=users&action=list');
	}
}
else{
	require('controllers/indexController.php');
}