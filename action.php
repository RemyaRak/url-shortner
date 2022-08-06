<?php

include_once('model.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    if ((isset($_POST['url'])) && (!filter_var($_POST['url'], FILTER_VALIDATE_URL) === false)) {
        $url = $_POST['url'];
        $obj = new Model;
       //check requested URL already added, if added take tinyurl from db
        $tinyUrl = $obj->get_existing_value('url', $url, 'short_url');

       //if requested URL was new, generate tinyurl and save in DB
        if (!$tinyUrl) {
            $tinyUrl =$obj->generate_tiny_url();
            $obj->add_tiny_url($url, $tinyUrl);
        }
        echo '{"status":1,"url":"'.$obj->buid_shorturl($tinyUrl).'"}';

    } else {
        echo '{"status":0,"Message":"Incorrect URL"}';

    }

}
?>