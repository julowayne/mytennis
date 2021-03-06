<?php 

require('models/Category.php');
require('models/Order.php');
require('models/Product.php');
require('models/User.php');

if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'list' :
            $categories = getAllCategories();
			$view = 'views/categoryList.php';
			$pageTitle = "Liste de toutes les catégories";
			break;
		case 'new' :
			$categories = getAllCategories();
			$view = 'views/categoryForm.php';
			$pageTitle = "Ajout d'une catégorie";
			break;
		case 'add' :
			if(!empty($_POST['name']) || empty($_FILES['image'])){
				if(empty($_POST['name']) || empty($_FILES['image'])){
					/* var_dump($_POST);
					die(); */
					$_SESSION['messages'] = ['message' => 'Les champs NOM & IMAGE sont obligatoires pour ajouter une nouvelle catégorie', 'type' => 'danger'];

				}
				$_SESSION['old_inputs'] = $_POST;
				header('Location:index.php?controller=categories&action=new');
				exit;
			}
			else{
				$result = addCategory($_POST);
				
				$_SESSION['messages'] = $result ? ['message' => 'Nouvelle catégorie enregistrée', 'type' => 'success'] : ['message' => 'Erreur lors de l\'enregistrement de la catégorie', 'type' => 'danger'];
				
				header('Location:index.php?controller=categories&action=list');
				exit;
			}
			break;
		case 'edit' :
			if(!empty($_POST)){
				if( empty($_POST['name'])){
		
					if(empty($_POST['name'])){
						$_SESSION['messages'][] = 'Le champ nom est obligatoire !';
					}
					
					$_SESSION['old_inputs'] = $_POST;
					header('Location:index.php?controller=categories&action=edit&id='.$_GET['id']);
					exit;
				}
		
				else {
					$result = updateCategory($_GET['id'], $_POST);
					$_SESSION['messages'] = $result ? ['message' => 'Catégorie mise à jour', 'type' => 'success'] : ['message' => 'Erreur lors de la mise à jour de la catégorie', 'type' => 'danger'];
					header('Location:index.php?controller=categories&action=list');
					exit;
				}
			}	
				else {
					if(!isset($_SESSION['old_inputs'])){
						if (isset($_GET['id'])){
							$categorie = getCategory($_GET['id']);
							if ($categorie == false){
								header('Location:index.php?controller=categories&action=list');
								exit;
							}	
						}
						else {
							header('Location:index.php?controller=categories&action=list');
							exit;
						}
					}
					$categories = getAllCategories();
					$view = 'views/categoryForm.php';
					$pageTitle = "Modification d'une categorie";
				}
			break;	
		case 'delete' :
			if (isset($_GET['id'])){
				$result = deleteCategory( $_GET['id'] );
			}else {
				header('Location:index.php?controller=categories&action=list');
				exit;
			}
			$_SESSION['messages'] = $result ? ['message' => 'Catégorie supprimé', 'type' => 'success'] : ['message' => 'Erreur lors de la suppression de la catégorie', 'type' => 'danger'];
		
			header('Location:index.php?controller=categories&action=list');
			exit;
			break;	
        default :
            require('controllers/indexController.php');
	}
}
else{
	require('controllers/indexController.php');
}
