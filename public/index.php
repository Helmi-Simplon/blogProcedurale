<?php

$path = dirname(__DIR__);

ob_start();
try {
    $page = isset($_GET['page']) ? $_GET['page'] : 'post.home';

    if ($page === 'post.home') {

        require $path . '/controller/postController.php';
        home();
    } elseif ($page === 'post.show') {

        require $path . '/controller/postController.php';
        show();
    } elseif ($page === 'user.connect') {
       require $path . '/view/user/connectionForm.php';
    } else {
        throw new Exception('404');
    }
} catch (Exception $e) {
    require $path . '/controller/errorController.php';
    error($e);
}
$content = ob_get_clean();

require '../view/base.php';
