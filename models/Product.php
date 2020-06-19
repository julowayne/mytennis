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
	WHERE pc.category_id = ? ORDER BY price DESC'
	);
	$productsByCategories = $query->execute([
		$categoryId
	]);
	return $query->fetchAll();
}

function getCartProducts(){
	$db = dbConnect();
	foreach($_SESSION['cart'] as $product_id => $quantity){
	$query = $db->prepare("SELECT id, name, price, quantity FROM products WHERE id = ?");
	$query->execute([$product_id,]);
	$result[] = $query->fetch();
	}
	return $result;
}
function updateProductQuantity($cartProducts) {
	$db = dbConnect();


	foreach($cartProducts as $key => $cartProduct){
		$query = $db->prepare('UPDATE products SET quantity = quantity - ? WHERE id = ?');
		$query->execute([
			
			$_SESSION['cart'][$cartProduct['id']],
			$cartProduct['id']

		]);
	}
	return $result;
}