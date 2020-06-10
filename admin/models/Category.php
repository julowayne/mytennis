<?php 
function getAllCategories()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM categories');
	$categories =  $query->fetchAll();

    return $categories;
}

function addCategory($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO categories (name, description) VALUES (:name, :description)");
	$result = $query->execute([
        'name' => $informations['name'],
		'description' => $informations['description']
	]);
	if($result && isset($_FILES['image']['tmp_name'])){
		$categoryId = $db->lastInsertId();
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $categoryId . '.' . $my_file_extension;
			$destination = './assets/images/categories/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

			$query = $db->prepare("UPDATE categories SET image = :image WHERE id = $categoryId ");
			$query->execute([
				'image' => $new_file_name
			]);		
		}
	}
	return $result ;
}
function updateCategory($id, $informations){
	$db = dbConnect();

	$query = $db->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
	$result = $query->execute([
        $informations['name'],
        $informations['description'],
		$id,
	]);
	if($result && isset($_FILES['image']['tmp_name'])){
		$categoryId = $id;
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $categoryId . '.' . $my_file_extension;
			$destination = './assets/images/categories/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

			$query = $db->prepare("UPDATE categories SET image = :image WHERE id = $categoryId ");
			$query->execute([
				'image' => $new_file_name
			]);		
		}
	}
	return $result;
}
function getCategory($id){
	$db = dbConnect();

	$query = $db->prepare('SELECT * FROM categories WHERE id = ?');
	$query->execute([$id]);


    return $query->fetch();
}
function deleteCategory($id)
{
	$db = dbConnect();

	$query = $db->prepare('SELECT * FROM categories WHERE id = ?');
	$query->execute([
		$id,
	]);
	$result = $query->fetch();
	if(!empty($result)){
		unlink('./assets/images/categories/'. $result['image']);
	}
	
	$query = $db->prepare('DELETE FROM categories WHERE id = ?');
	$result = $query->execute([$id]);
	
	return $result;
}