<?php

try{
    $conn = new \PDO('mysql:dbname=blog;host=localhost', 'root', '');
    echo "Connection successful\n";
}catch(\PDOException $e){
    echo "Error: ". $e->getCode() . " - " . $e->getMessage() . '\n';
    die();
}
$stmt = $conn->prepare('INSERT INTO users(name, password, email) VALUES (:name, :password, :email)');
$stmt->bindValue(':name', 'Carlos', PDO::PARAM_STR);
$stmt->bindValue(':password', 'secret', PDO::PARAM_STR);
$stmt->bindValue(':email', 'contato@carloshb.com.br', PDO::PARAM_STR);
$result = $stmt->execute();
if ($result === true):
    echo "User created\n";
else:
    echo "User not created";
endif;