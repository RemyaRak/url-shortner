<?php

class Model {

    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($this->conn, 'urlshortner') or die ('{"status":0,"Message":"Connection to DB failed"}');
    }

    public function generate_tiny_url(){
        $token = uniqid(); 

        if ($this->get_existing_value('short_url', $token, 'short_url')) {
            generateUniqueID();
        } else {
            return $token;
        }

    }

    public function add_tiny_url($url, $tinyUrl) {
        $query = "INSERT INTO url_short (url, short_url) VALUES ('".$url."', '".$tinyUrl."')";

        if (mysqli_query($this->conn, $query)) {
            return TRUE;
        }
    }

    public function get_existing_value($field, $value, $expectedValue) {
        $query = "SELECT $expectedValue FROM url_short WHERE $field = '".$value."' ";
        $result = mysqli_query($this->conn, $query); 

        if (mysqli_affected_rows($this->conn) > 0) {
            $row = mysqli_fetch_row($result);
            return $row[0];
        }

        return FALSE;
    }

    public function get_all_urls() {
        $query = "SELECT * FROM url_short ORDER BY id DESC ";
        $result = mysqli_query($this->conn, $query); 

        if (mysqli_affected_rows($this->conn) > 0) {
            return $result;
        }

        return FALSE;
    }

    public function buid_shorturl($shorturl) {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
        $requestPath = explode('/',$_SERVER['REQUEST_URI']);
        $count = sizeof($requestPath);
        unset($requestPath[$count-1]);
        $requestPath = implode('/', $requestPath);
        $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $requestPath;  
        return $CurPageURL."/".$shorturl.".html";
    }

}


?>