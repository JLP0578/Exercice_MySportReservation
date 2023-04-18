<?php
function d($variable){
    echo '<pre>' , var_dump($variable) , '</pre>';
}

function redirection($url) {
    header('Location: '.$url);
    exit();
}