<?php 

session_start();
if(isset($_SESSION['viewAdmin'])){
    unset($_SESSION['viewAdmin']);
}
print_r($_SESSION);
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}
require ('helpers.php');
require('models/Category.php');
$categories = getCategories();
$childCategories = getChildCategories();
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
        case 'cart' :
            require 'controllers/cartController.php';
        break;    
        default :
            require 'controllers/indexController.php';
    endswitch;
else:
    require 'controllers/indexController.php';
endif; 
require('views/front.php');

if(isset($_SESSION['messages'])){
	unset($_SESSION['messages']);	
}
if(isset($_SESSION['old_inputs'])){
	unset($_SESSION['old_inputs']);	
} 

?>
