<?php 

function getUser($id){
	$db = dbConnect();

	$query = $db->prepare('SELECT * FROM users WHERE id = ?');
	$query->execute([$id]);


    return $query->fetch();
}