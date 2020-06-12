<?php 
function getAllUsers()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM users');
	$users =  $query->fetchAll();

    return $users;
}

/* function getUser($id){
	$db = dbConnect();

	$query = $db->prepare('SELECT * FROM users WHERE id = ?');
	$query->execute([$id]);


    return $query->fetch();
} */
function add($informations){

    $db = dbConnect();

    $query = $db->prepare('INSERT INTO users (firstname, lastname, email, password, address) VALUES (?, ?, ?, ?, ?)');
    $user = $query->execute(
        [
            $informations['firstname'],
            $informations['lastname'],
            $informations['email'],
            hash('md5', $informations['password']),
            $informations['address'],
        ]
    );
    return $user;
}

function checkUser(){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
    $query->execute([
      'password' => hash('md5', $_POST['password']),
      'email' => $_POST['email'],
    ]);
    $user = $query->fetch();

    //si couple email/md5(password) trouvé, connecter l'utilisateur
    if($user != false){
        $_SESSION['user'] = [
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'email' => $user['email'],
                'is_admin' => $user['is_admin']
        ];
    return $user;    
    }
}

function emailCheck(){

    $db = dbConnect();

    $query = $db->prepare('SELECT email FROM users WHERE email = ?');
    $query->execute([
    $_POST['email']
    ]);
    $emailExists = $query->fetch();
    return $emailExists;
}
