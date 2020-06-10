<?php 

require('models/Category.php');
require('models/Order.php');
require('models/Product.php');
require('models/User.php');

if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'list' :
            $orders = getAllOrders();
			$view = 'views/orderList.php';
			$pageTitle = "Liste de toutes les commandes";
			break;
		case 'details' :
			$categories = getAllCategories();
			$view = 'views/categoryForm.php';
			$pageTitle = "Ajout d'une catégorie";
			break;
		case 'add' :
			if(empty($_POST['name']) && isset($_POST['image'])){
				if(empty($_POST['name']) && isset($_POST['image'])){
					/* var_dump($_POST);
					die(); */
					$_SESSION['messages'][] = 'Les champs NOM & IMAGE sont obligatoires pour ajouter une nouvelle catégorie !';
				}
				$_SESSION['old_inputs'] = $_POST;
				header('Location:index.php?controller=categories&action=new');
				exit;
			}
			else{
				$result = addCategory($_POST);
				
				$_SESSION['messages'][] = $result  ? '<div class="alert alert-success"> Catégorie enregistré ! </div>' : '<div class="alert alert-danger"> Erreur lors de l enregistrement de la catégorie... :(</div>';
				
				header('Location:index.php?controller=categories&action=list');
				exit;
			}
			break;
		case 'edit' :
        break;
        default :
            require('controllers/indexController.php');
	}
}
else{
	require('controllers/indexController.php');
}