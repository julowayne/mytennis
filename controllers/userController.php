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
						'id' => $user['id'],
					];
					/* $_SESSION['messages'][] = 'Vous êtes inscrit sur Mytennis'; */
					$_SESSION['messages'] = $user ? ['message' => 'Vous êtes inscrit sur MyTennis', 'type' => 'success'] : ['message' => 'L adresse email indiquée est déjà utilisée', 'type' => 'danger'];

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
			break;
		case 'password' :
			$result = updateUser($_GET['id'], $_POST);
			$_SESSION['messages'] = $result ? ['message' => 'Informations mises à jour', 'type' => 'success'] : ['message' => 'Erreur lors de la mise à jour des informations', 'type' => 'danger'];
						header('Location:index.php?controller=users&action=list');
						exit;
			$view = 'views/resetpassword.php';
			$pageTitle = "Réinitialisation du mot de passe";
			break;
		case 'disconnected' :
			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
				/* $_SESSION['messages'][] = 'Vous êtes déconnecté de Mytennis'; */
				$_SESSION['messages'] = isset($_SESSION['user']) ? ['message' => 'Erreur lors de la déconnexion', 'type' => 'danger'] : ['message' => 'Vous êtes déconnecté de Mytennis', 'type' => 'success'];
				header('location:index.php');
				exit;
			}
			break;
		case 'edit' :
			/* if($result){
				$profil = true;
			}else {
				$profil = false;
			}
			$profil = json_encode($profil); */
			$view = 'views/userProfil.php';
			$pageTitle = "Profil";
			break;	
        default :
		header('Location:index.php');
	}
}
else{
	require('controllers/indexController.php');
}