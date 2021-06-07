<?php

function getDbConnection(){
try {
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ];
    $db = new PDO('mysql:host=localhost;dbname=blog', 'root', '', $options);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
}


function getPostAll(){
    $db = getDbConnection();
$request = $db->query('SELECT id, title, LEFT(content, 100) as content, user, date FROM post');
$request->setFetchMode(PDO::FETCH_ASSOC);
$posts = $request->fetchAll();
$request->closeCursor();
}


function getPostId(){
    $db = getDbConnection();
    $request = $db->prepare('SELECT * FROM post WHERE id=?');
    $request->execute([$_GET['id']]);
    $request->setFetchMode(PDO::FETCH_ASSOC);
    $post = $request->fetch();
    $request->closeCursor();
}