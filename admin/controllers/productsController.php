<?php 

require('models/Category.php');
require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'list' :
			$products = getAllProducts();
			/* $productsCategories = getProductCategories($_GET['id']); */
			$view = 'views/productList.php';
			$pageTitle = "Liste de tous les produits";
			break;
		case 'new' :
			$categories = getAllCategories();
			$view = 'views/productForm.php';
			$pageTitle = "Ajout d'un produit";
			break;
		case 'add' :
			if(empty($_POST['name']) || empty($_POST['short_description']) || empty($_POST['quantity']) || empty($_POST['price'])){
				if(empty($_POST['name']) || empty($_POST['short_description']) || empty($_POST['quantity']) || empty($_POST['price'])){
					$_SESSION['messages'][] = 'Les champs sont obligatoires sauf IMAGE & CATEGORIES!';
				}
				
				$_SESSION['old_inputs'] = $_POST;
				header('Location:index.php?controller=products&action=new');
				exit;
			}
			else{
				if(empty($_POST['activated'])){
					$_POST['activated'] = 0;
				}
				$resultAdd = addProduct($_POST);
				$_SESSION['messages'] = $resultAdd ? ['message' => 'Nouveau produit enregistré', 'type' => 'success'] : ['message' => 'Erreur lors de l\'enregistrement du produit', 'type' => 'danger'];
				header('Location:index.php?controller=products&action=list');
				exit;
			}
			break;
		case 'edit' :
			if(!empty($_POST)){
				if(empty($_POST['name']) || empty($_POST['short_description']) || empty($_POST['quantity']) || empty($_POST['price'])){
					
					if(empty($_POST['name']) || empty($_POST['short_description']) || empty($_POST['quantity']) || empty($_POST['price'])){
						$_SESSION['messages'][] = 'Les champs sont obligatoires sauf IMAGE & CATEGORIES!';
					}
					
					$_SESSION['old_inputs'] = $_POST;
					header('Location:index.php?controller=products&action=edit&id='.$_GET['id']);
					exit;
				}
		
				else {
					if(empty($_POST['activated'])){
						$_POST['activated'] = 0;
					}
					$result = updateProduct($_GET['id'], $_POST);
					$_SESSION['messages'] = $result ? ['message' => 'Produit mis à jour', 'type' => 'success'] : ['message' => 'Erreur lors de la mise a jour du produit', 'type' => 'danger'];
					header('Location:index.php?controller=products&action=list');
					exit;
				}
			}	
				else {
					if(!isset($_SESSION['old_inputs'])){
						if (isset($_GET['id'])){
							$categoryProducts = getCategoryByProductId($_GET['id']);
							$product = getProduct($_GET['id']);
							$categories = getAllCategories();
							if ($product == false){
								header('Location:index.php?controller=products&action=list');
								exit;
							}	
						}
						else {
							header('Location:index.php?controller=products&action=list');
							exit;
						}
					}
					$view = 'views/productForm.php';
					$pageTitle = "Modification d'un produit";
				}
				break;
		case 'delete' :
			if (isset($_GET['id'])){
				$result = deleteProduct( $_GET['id'] );
			}else {
				header('Location:index.php?controller=products&action=list');
				exit;
			}
			$_SESSION['messages'] = $result ? ['message' => 'Produit supprimé', 'type' => 'success'] : ['message' => 'Erreur lors de la supression du produit', 'type' => 'danger'];
		
			header('Location:index.php?controller=products&action=list');
			exit;
			break;		
        default :
            require('controllers/indexController.php');
	}
}
else{
	require('controllers/indexController.php');
}