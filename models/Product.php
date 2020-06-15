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
	foreach($_SESSION['cart'] as $productId => $quantity){
	$query = $db->query("SELECT * FROM products WHERE id = $productId");
	$cartProducts = $query->fetchAll();
	}
	return $cartProducts ;
}
/* function getProduct(){
	$db = dbConnect();
	$queryString = "SELECT *
	FROM products
	WHERE product_id IN ()
	");
	$queryString .= "(:$_SESSION['cart'][$key])";
	$query->execute([$id]);
	return $query->fetchAll();
} */