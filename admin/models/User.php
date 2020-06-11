<?php

function getAllUsers()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM users');
	$users =  $query->fetchAll();

    return $users;
}
function getUser($id){
	$db = dbConnect();

	$query = $db->prepare('SELECT * FROM users WHERE id = ?');
	$query->execute([$id]);


    return $query->fetch();
}
function addUser($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO users (firstname, lastname, email, password, is_admin, address) VALUES(:firstname, :lastname, :email, :password, :is_admin, :address)");
	$result = $query->execute([
        'firstname' => $informations['firstname'],
        'lastname' => $informations['lastname'],
		'email' => $informations['email'],
		'password' => $informations['password'],
		'is_admin' => $informations['is_admin'],
		'address' => $informations['address'],
	]);

/* 	if($result && isset($_FILES['image']['tmp_name'])){
		$productId = $db->lastInsertId();
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $productId . '.' . $my_file_extension;
			$destination = '../assets/images/products/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

			$query = $db->prepare("UPDATE products SET image = :image WHERE id = $artistId ");
			$query->execute([
				'image' => $new_file_name
			]);		
		}
	} */
	
	return $result;
}
function updateUser($id, $informations){
	$db = dbConnect();

	$query = $db->prepare("UPDATE users SET firstname = ?, lastname = ?, email = ?, is_admin = ?, address = ? WHERE id = ?");
	$result = $query->execute([
        $informations['firstname'],
        $informations['lastname'],
        $informations['email'],
		$informations['is_admin'],
		$informations['address'],
		$id,
	]);
	if(!empty($informations['password'])){
		$query = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
		$query = $query->execute([
			hash('md5', $informations['password']),
			$id,
		]);
	}
	return $result;
}
function deleteUser($id)
{
	$db = dbConnect();

	$query = $db->prepare('SELECT * FROM users WHERE id = ?');
	$query->execute([
		$id,
	]);
	/* $result = $query->fetch();
	if(!empty($result)){
		unlink('../assets/images/products/'. $result['image']);
	} */
	
	$query = $db->prepare('DELETE FROM users WHERE id = ?');
	$result = $query->execute([$id]);
	
	return $result;
}