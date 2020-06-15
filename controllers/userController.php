<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'form':
			$view = 'views/form.php';
			$pageTitle = "Formulaire d'inscription";
			break;
		case 'signup' :
			if(!empty($_POST)){
				if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password'])){
					$_SESSION['old_inputs'] = $_POST;
					$_SESSION['messages'][] = 'Tout les champs sont obligatoires';
					header('location:index.php?p=users&action=form');
					exit;
				}
				else{
					$emailExists = emailCheck();
				  if(!$emailExists){
					$user = add($_POST);
					$user = checkUser();
					$_SESSION['user'] = [
						'firstname' => $user['firstname'],
						'lastname' => $user['lastname'],
						'email' => $user['email'],
						'address' => $user['address'],
						'is_admin' => $user['is_admin'],
						'id' => $user['id'],
					];
					/* $_SESSION['messages'][] = 'Vous êtes inscrit sur Mytennis'; */
					$_SESSION['messages'] = $user ? ['message' => 'Vous êtes inscrit sur MyTennis', 'type' => 'success'] : ['message' => 'L adresse email indiquée est déjà utilisée', 'type' => 'danger'];
					$view = 'views/index.php';
					$pageTitle = "Accueil";
					header('location:index.php');
					exit;
				  }
				  /* else{
					$_SESSION['messages'][] = 'L adresse email indiquée est déjà utilisée';
					header('location:index.php');
					exit;
				  } */
				}
			  }
			$view = 'views/form.php';
			$pageTitle = "Formulaire d'inscription";
			break;
		case 'login' :
			if(!empty($_POST)){
				if(empty($_POST['email']) || empty($_POST['password'])){

					$_SESSION['messages'][] = 'Les champs Email et mot de passe sont obligatoires';
					$_SESSION['old_inputs'] = $_POST;
					header('location:index.php?p=users&action=form');
					exit;
				}
				else{
					$user = checkUser();	  
					if($user != false){
						$_SESSION['user'] = [
								'firstname' => $user['firstname'],
								'lastname' => $user['lastname'],
								'email' => $user['email'],
								'address' => $user['address'],
								'is_admin' => $user['is_admin'],
								'id' => $user['id'],
						];
						/* $_SESSION['messages'][] = 'Vous êtes connecté sur Mytennis'; */
						$_SESSION['messages'] = $user ? ['message' => 'Vous êtes connecté sur MyTennis!', 'type' => 'success'] : ['message' => 'Identifiants incorrects', 'type' => 'danger'];
						header('location:index.php');
						exit;
					}
				/* 	else {
						$_SESSION['messages'][] = 'Identifiants incorrects';
						header('location:index.php?p=users&action=form');
						exit;
					} */
				}
			}
			$view = 'views/index.php';
			$pageTitle = "Formulaire d'inscription";
			break;
		case 'password' :
			$view = 'views/resetpassword.php';
			$pageTitle = "Réinitialisation du mot de passe";
			break;
		case 'disconnected' :
			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
				$_SESSION['messages'] = isset($_SESSION['user']) ? ['message' => 'Erreur lors de la déconnexion', 'type' => 'danger'] : ['message' => 'Vous êtes déconnecté de Mytennis', 'type' => 'success'];
				header('location:index.php');
				exit;
			}
			break;
		case 'edit' :
			if(!empty($_POST)){
				if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['address'])){
					if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['address'])){

						$_SESSION['messages'][] = 'Tout les champs sauf le mot de passe sont obligatoires pour modifier vos informations !';
					}
						$_SESSION['old_inputs'] = $_POST;
						header('Location:index.php?p=users&action=edit&id='.$_GET['id']);
						exit;
					}
			
					else {
						$result = updateUser($_GET['id'], $_POST);
						$_SESSION['messages'] = $result ? ['message' => 'Votre profil a été mis à jour', 'type' => 'success'] : ['message' => 'Erreur lors de la mise à jour de l\' utilisateur', 'type' => 'danger'];
						header('Location:index.php');
						exit;
					}
			}else {
					if(!isset($_SESSION['old_inputs'])){
						if (isset($_GET['id'])){
							$user = getUser($_GET['id']);
							if ($user == false){
								header('Location:index.php');
								exit;
							}	
						}
						else {
							header('Location:index.php');
							exit;
						}
					}
				}
				$view = 'views/userProfil.php';
				$pageTitle = "Informations de votre profil";
			break;	
        default :
		header('Location:index.php');
	}
}
else{
	require('controllers/indexController.php');
}