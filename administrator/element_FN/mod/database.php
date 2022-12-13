<?php
error_reporting(E_ERROR);
class database{
    
    public $connect;
    public function __construct() {
        $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );
        $this->connect = new PDO("mysql:host=localhost; dbname=mydb; charset=utf8", "root", "", $opt);
    }
        
}
    