<?php

function getDbConnection(){
$user = "root";
$pass = "";
$dbname = "blog";
$host = "localhost";
try {
    $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );
    $db = new PDO($dsn, $user, $pass, $options);
    return $db;
    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
}

function getPostAll(){
    try {
$db = getDbConnection();

$query ='SELECT id, title, LEFT(content, 100) as content, user, date FROM post';

$req = $db->query($query);
$req->setFetchMode(PDO::FETCH_ASSOC);
$posts = $req->fetchAll();
$req->closeCursor();
return $posts;
} catch (PDOException $e) {

    print "Erreur de requete!:" . $e->getMessage() . '<br>';
    die;
}
}


function getPostId(){
    try {
    $db = getDbConnection();
    $request = $db->prepare('SELECT * FROM post WHERE id=?');
    $request->execute([$_GET['id']]);
    $request->setFetchMode(PDO::FETCH_ASSOC);
    $post = $request->fetch();
    $request->closeCursor();
    return $post;
} catch (PDOException $e) {

    print "Erreur de requete!:" . $e->getMessage() . '<br>';
    die;
} 
}