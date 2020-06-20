<?php

function getAllOrders()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM orders');
	$orders =  $query->fetchAll();

    return $orders;
}
function getOrderTotal(){
    $db = dbConnect();
    $query = $db->query('
	SELECT o.id, od.quantity, od.price
	FROM orders o
	INNER JOIN order_details od ON o.id = od.order_id' 
	);
	return $query->fetchAll();
}
function getOrder($id){
	$db = dbConnect();

	$query = $db->prepare('SELECT * FROM orders WHERE id = ?');
	$query->execute([$id]);
    $order = $query->fetch();

    return $order;
}
function getAllOrderDetails($id){
    $db = dbConnect();
    $query= $db-> prepare ('SELECT * FROM order_details WHERE order_id = ?');
    $orderDetails = $query->execute([
        $id
    ]);
    return $query->fetchAll();
}

/* function getAllOrders($id) {
    $db = dbConnect();
    $query= $db-> prepare ('SELECT * FROM orders WHERE user_id = ?');
    $orderDetails = $query->execute([
        $id
    ]);
    return $query->fetchAll();
} */