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
	$query->execute([
       $_SESSION['user']['id'],
       $_SESSION['user']['address'],
       $_SESSION['user']['firstname'],
       $_SESSION['user']['lastname'],
    ]);
    return $order;
}
