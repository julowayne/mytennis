<?php 

require('models/Category.php');
require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'list' :
            $users = getAllUsers();
			$view = 'views/userList.php';
			$pageTitle = "Liste de tous les utilisateurs";
			break;
		case 'new' :
			$users = getAllUsers();
			$view = 'views/userForm.php';
			$pageTitle = "Ajout d'un utilisateur";
			break;
		case 'add' :
			if(!empty($_POST['firstname']['lastname']['email']['password']['is_admin'])){
				if(empty($_POST['firstname']['lastname']['email']['password']['is_admin'])){
					$_SESSION['messages'][] = 'Tout les champs sont obligatoires pour créer un nouvel utilisateur !';
				}
				
				$_SESSION['old_inputs'] = $_POST;
				header('Location:index.php?controller=users&action=new');
				exit;
			}
			else{
				$resultAdd = addUser($_POST);
				
				$_SESSION['messages'] = $resultAdd ? ['message' => 'Vous avez ajouté un utilisateur', 'type' => 'success'] : ['message' => 'Erreur lors de l\'ajout de l\' utilisateur', 'type' => 'danger'];
				
				header('Location:index.php?controller=users&action=list');
				exit;
			}
			break;
		case 'edit' :
			if(!empty($_POST)){
				if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['address'])){
					if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['address'])){

						$_SESSION['messages'][] = 'Tout les champs sont obligatoires pour modifier un utilisateur !';
					}
						$_SESSION['old_inputs'] = $_POST;
						header('Location:index.php?controller=users&action=edit&id='.$_GET['id']);
						exit;
					}
			
					else {
						if(empty($_POST['is_admin'])){
							$_POST['is_admin'] = 0;
						}
						$result = updateUser($_GET['id'], $_POST);
						$_SESSION['messages'] = $result ? ['message' => 'Utilisateur mis à jour', 'type' => 'success'] : ['message' => 'Erreur lors de la mise à jour de l\' utilisateur', 'type' => 'danger'];
						header('Location:index.php?controller=users&action=list');
						exit;
					}
			}else {
					if(!isset($_SESSION['old_inputs'])){
						if (isset($_GET['id'])){
                            $users = getAllUsers();
							$user = getUser($_GET['id']);
							if ($user == false){
								header('Location:index.php?controller=users&action=list');
								exit;
							}	
						}
						else {
							header('Location:index.php?controller=users&action=list');
							exit;
						}
					}
					/* $categories = getAllCategories(); */
					$view = 'views/userForm.php';
					$pageTitle = "Modification d'un utilisateur";
				}
				break;
		case 'delete' :
			if (isset($_GET['id'])){
				$result = deleteUser( $_GET['id'] );
			}else {
				header('Location:index.php?controller=users&action=list');
				exit;
			}
			$_SESSION['messages'] = $result ? ['message' => 'Utilisateur supprimé', 'type' => 'success'] : ['message' => 'Erreur lors de la suppression de l\'utilisateur', 'type' => 'danger'];
		
			header('Location:index.php?controller=users&action=list');
			exit;
			break;		
        default :
		header('Location:index.php?controller=users&action=list');
	}
}
else{
	require('controllers/indexController.php');
}