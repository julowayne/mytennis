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
function getProductByCategories($productId){
	$db = dbConnect();
	$query = $db->prepare('
	SELECT p. *
	FROM products p
	INNER JOIN products_categories pc ON p.id = pc.product_id 
	WHERE pc.category_id = 14'
	);
	$productsByCategories = $query->execute([
		$productId
	]);
	return $query->fetchAll();
}
