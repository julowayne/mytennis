<?php
/* 
function getAllOrders()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM orders');
	$orders =  $query->fetchAll();

    return $orders;
} */
/* function getAllOrderDetails($id){
    $db = dbConnect();
	$query = $db->prepare('
	SELECT od. *
	FROM order_details od
	INNER JOIN orders o ON o.id = od.order_id 
    WHERE o.user_id = ?
    GROUP BY order_id');
   $query->execute([
		$id
	]);
	return $query->fetchAll();
} */

function getAllOrderDetails($id){
    $db = dbConnect();
    $query= $db-> prepare ('SELECT * FROM order_details WHERE order_id = ?');
    $orderDetails = $query->execute([
        $id
    ]);
    return $query->fetchAll();
}
function getAllOrders($id) {
    $db = dbConnect();
    $query= $db-> prepare ('SELECT * FROM orders WHERE user_id = ?');
    $orderDetails = $query->execute([
        $id
    ]);
    return $query->fetchAll();
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


function getOrderDetails($orderId, $cartProducts){
    $db = dbConnect();
    $cartProducts = getCartProducts(); 
	$queryString ="INSERT INTO order_details (quantity, name, price, order_id) VALUES ";
    $queryValues = array();
    
	foreach($cartProducts as $key=>$cartProduct){
		$queryString .= "(:quantity_$key, :name_$key, :price_$key, :order_id)";
		if($key != array_key_last($cartProducts)){
			$queryString .= ',';
        }			
		$queryValues["quantity_$key"] = $_SESSION['cart'][$cartProduct['id']];	
        $queryValues["name_$key"] = $cartProduct['name'];	
        $queryValues["price_$key"] = $cartProduct['price'];	
    }
    $queryValues['order_id'] = $orderId;
	$query = $db->prepare($queryString);
	return $query->execute($queryValues);	
} 
