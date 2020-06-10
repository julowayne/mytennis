<?php 
session_start();
Print_r ($_SESSION);

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
require ('helpers.php');

if(isset($_GET['p'])):
    switch ($_GET['p']):
        case 'users' :
            require 'controllers/userController.php';
            break;

        case 'categories' :
            require 'controllers/categoryController.php';
            break;

        case 'products' :
            require 'controllers/productController.php';
            break;

        case 'orders' :
            require 'controllers/orderController.php';
            break;    

        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif; 

if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);	
} 

?>
