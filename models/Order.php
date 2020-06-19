<?php

function getAllOrders()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM orders');
	$orders =  $query->fetchAll();

    return $orders;
}
function uploadOrder(){
    $db = dbConnect();
    $query = $db->prepare('INSERT INTO orders (user_id, address, firstname, lastname ) VALUES (?, ?, ?, ?)');
	$order = $query->execute([
       $_SESSION['user']['id'],
       $_SESSION['user']['address'],
       $_SESSION['user']['firstname'],
       $_SESSION['user']['lastname'],
    ]);
    $_SESSION['order_id'] = $db->lastInsertId();

    return $order;
}
/* function getOrderDetails () {
    $db = dbConnect();

    $query = $db->query('
	SELECT c. *
	FROM categories c
	INNER JOIN products_categories pc ON c.id = pc.category_id
	GROUP BY c.id'
	);
	return $query->fetchAll();
} */

function getOrderDetails($orderId, $cartProducts){
    $db = dbConnect();
    $cartProducts = getCartProducts(); 
	$queryString ="INSERT INTO order_details (quantity, name, price, order_id) VALUES ";
    $queryValues = array();
    
	foreach($cartProducts as $key=>$cartProduct){
		//génération dynamique de $queryString
		$queryString .= "(:quantity_$key, :name_$key, :price_$key, :order_id)";
		if($key != array_key_last($cartProducts)){
			$queryString .= ',';
        }			
		//génération dynamique de $queryValues
		$queryValues["quantity_$key"] = $_SESSION['cart'][$cartProduct['id']];	
        $queryValues["name_$key"] = $cartProduct['name'];	
        $queryValues["price_$key"] = $cartProduct['price'];	
    }
    $queryValues['order_id'] = $orderId;
	$query = $db->prepare($queryString);
	return $query->execute($queryValues);	
} 
