<?php
$path = dirname(__DIR__);

function home()
{
    global $path;
    require   $path . '/model/postRepository.php';
    
    $posts = getPostAll();
    
    
    render ('home',compact('posts'));
}


function show()
{
    global $path;
    require   $path . '/model/postRepository.php';
    
    $post = getPostId();

    render('show', compact('post'));
}

function  render(string $view,array $data)
{
    global $path;
   
    extract($data);
    $data;
    require $path . "/view/post/$view.php";
    
}