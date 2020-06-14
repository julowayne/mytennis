<?php 
function getCategories()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM categories WHERE parent_id IS NULL');
	$categories =  $query->fetchAll();

    return $categories;
}
function getChildCategories(){
    $db = dbConnect();

    $query = $db->query('SELECT * FROM categories WHERE parent_id IS NOT NULL');
    $childCategories = $query->fetchAll();
    
    return $childCategories;
}
/* function search(){
    $db = dbConnect();
    $order = $_GET['order'] ? $_GET['order'] : 'ASC';
    $query = $db->query('SELECT * FROM products ORDER BY price ' . $order);
    $productsByPrice =  $query->fetchAll();
    
    return $productsByPrice;
} */
