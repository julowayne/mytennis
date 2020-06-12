<?php 

require('models/Order.php');
require('models/Product.php');
require('models/User.php');


if(isset($_GET['action'])){
	switch ($_GET['action']){
		case 'form':
			require('views/form.php'); 
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
					$_SESSION['messages'][] = 'Vous êtes inscrit sur Mytennis';
					header('location:index.php?p=users&action=form');
					exit;
				  }
				  else{
					$_SESSION['messages'][] = 'L adresse email indiquée est déjà utilisée';
					header('location:index.php?p=users&action=form');
					exit;
				  }
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
						$_SESSION['messages'][] = 'Vous êtes connecté sur Mytennis';
						header('location:index.php?p=users&action=form');
						exit;
					}
					else {
						$_SESSION['messages'][] = 'Identifiants incorrects';
						header('location:index.php?p=users&action=form');
						exit;
					}
				}
			}
			break;
		case 'password' :
			require('views/resetpassword.php');
			break;
		case 'disconnected' :
			if(isset($_SESSION['user'])){
				unset($_SESSION['user']);
				$_SESSION['messages'][] = 'Vous êtes déconnecté de Mytennis';
				header('location:index.php');
				exit;
			}
			break;
		case 'edit' :
			if(!isset($_SESSION['old_inputs'])){
					$user = getUser($_GET['id']);
				}
				else {
					$result = updateUser($_GET['id'], $_POST);
					header('Location:index.php?p=users&action=form');
					exit;
				}
			require('views/userProfil.php');
			break;	
        default :
		header('Location:index.php');
	}
}
else{
	require('controllers/indexController.php');
}