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
function getProductByCategories($categoryId){
	$db = dbConnect();
	$query = $db->prepare('
	SELECT p. *
	FROM products p
	INNER JOIN products_categories pc ON p.id = pc.product_id 
	WHERE pc.category_id = ?'
	);
	$productsByCategories = $query->execute([
		$categoryId
	]);
	return $query->fetchAll();
}

function getCartProducts(){
	$db = dbConnect();
	foreach($_SESSION['cart'] as $product_id => $quantity){
	$query = $db->query("SELECT id, name, price, quantity FROM products WHERE id = $product_id");
	$result[] = $query->fetch();
	}
	return $result;
}
/* function getProduct(){
	$db = dbConnect();
	foreach $arrayKeys = array_keys($cart);
	 
	$queryString = "SELECT *
	FROM products
	WHERE product_id IN ()
	");
	$queryString .= "(:$_SESSION['cart'][$key])";
	$query->execute([$id]);
	return $query->fetchAll();
} */