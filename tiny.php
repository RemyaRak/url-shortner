<?php

include_once('model.php');

if (isset($_GET['redirect'])) {
        
    $obj = new Model;
    $url = $obj->get_existing_value('short_url', $_GET['redirect'], 'url');
    if ($url) {
        header("location:".$url);
    } else {
        echo 'Invalid URL';
    }
        
    }

?>