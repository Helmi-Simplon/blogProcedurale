<?php
$path = dirname(__DIR__);

function home(){
require $path . '/model/postRepository.php';
$posts = getPostAll();
render('home', compact('$posts'));
}


function show(){
    require $path . '/model/postRepository.php';
    $post = getPostId();
    render('show', compact('$post'));
    }

  function  render($view,$data){
      extract($view,$data);
        require $path . "/view/post/$view.php";
    }
    
