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

