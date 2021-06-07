<?php

function error($e)
{
    require dirname(__DIR__) . '/view/error/error404.php' .$e->getMessage() . '.php';
}