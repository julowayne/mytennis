<?php

function getAllProducts()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM products');
	$products =  $query->fetchAll();

    return $products;
}


function getProduct($id){
	$db = dbConnect();

	$query = $db->prepare('SELECT * FROM products WHERE id = ?');
	$query->execute([$id]);


    return $query->fetch();
}


function addProduct($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO products (name, short_description, price, quantity) VALUES( :name, :short_description, :price, :quantity)");
	$result = $query->execute([
		'name' => $informations['name'],
		'short_description' => $informations['short_description'],
		'price' => $informations['price'],
		'quantity' => $informations['quantity'],
	]);
	if($result){
		$productId = $db->lastInsertId();

		if(isset($informations['category_id'])){
			$result = insertProductsCategoriesLinks($productId, $informations['category_id']);
		}
	}	
	if($result && isset($_FILES['image']['tmp_name'])){
	
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $productId . '.' . $my_file_extension;
			$destination = './assets/images/products/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

			$query = $db->prepare("UPDATE products SET image = :image WHERE id = $productId ");
			$query->execute([
				'image' => $new_file_name
			]);		
		}
	}
	
	return $result;
}


function updateProduct($id, $informations){
	$db = dbConnect();

	$query = $db->prepare("UPDATE products SET name = ?, short_description = ?, price = ?, quantity = ? WHERE id = ?");
	$result = $query->execute([
        $informations['name'],
		$informations['short_description'],
		$informations['price'],
		$informations['quantity'],
		$id,
	]);
	$query = $db->prepare("DELETE FROM products_categories WHERE product_id = ?");
	$result = $query->execute([
		$id,
	]);
	
	if($result){
		$productId = $id;
		if(isset($informations['category_id'])){
			$result = insertProductsCategoriesLinks($productId, $informations['category_id']);
		}
	}
	if(!empty($_FILES['image']['tmp_name'])){
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){

			$product = getProduct($productId);
			if($product['image'] != null){
				unlink('./assets/images/products/'. $product['image']);
			}
			$new_file_name = $productId . '.' . $my_file_extension;
			$destination = './assets/images/products/' . $new_file_name;
			move_uploaded_file( $_FILES['image']['tmp_name'], $destination);

			$query = $db->prepare("UPDATE products SET image = :image WHERE id = $productId ");
			$query->execute([
				'image' => $new_file_name
			]);		
		}
	}
	return $result;
}

function insertProductsCategoriesLinks($id, $categoriesIds){
	$db = dbConnect();
	$queryString ="INSERT INTO products_categories (product_id, category_id) VALUES ";
	$queryValues = array();

	foreach($categoriesIds as $key=>$categoryId){
		//génération dynamique de $queryString
		$queryString .= "(:product_id_$key, :category_id_$key)";
		if($key != array_key_last($categoriesIds)){
			$queryString .= ',';
		}
			
		//génération dynamique de $queryValues
		$queryValues["product_id_$key"] = intval($id);	
		$queryValues["category_id_$key"] = intval($categoryId);	
	}
	$query = $db->prepare($queryString);
	return $query->execute($queryValues);
	
}


function getProductCategories($productId){
	$db = dbConnect();
	$query = $db->prepare('
	SELECT p. *
	FROM products p
	INNER JOIN products_categories pc ON p.id = pc.product_id 
	WHERE p.id = ?'
	);
	$productsCategories = $query->execute([
		$productId
	]);
	return $query->fetchAll();
}


function getCategoryByProductId($ProductId)
{
    $db = dbConnect();
    $query = $db->prepare('
	SELECT c.id
	FROM categories c 
	INNER JOIN products_categories pc ON c.id = pc.category_id 
	WHERE pc.product_id = ?'
	);
    $categoryProducts = $query->execute([ 
		$ProductId 
		]);
    return $query->fetchAll();
}

function deleteProduct($id)
{
	$db = dbConnect();

	$query = $db->prepare('SELECT * FROM products WHERE id = ?');
	$query->execute([
		$id,
	]);
	$result = $query->fetch();
	if(!empty($result)){
		unlink('../assets/images/products/'. $result['image']);
	}
	
	$query = $db->prepare('DELETE FROM products WHERE id = ?');
	$result = $query->execute([$id]);
	
	return $result;
}