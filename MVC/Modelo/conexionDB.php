<?php
class ConexionDB{
    public function cDB()
    {
        $db = new PDO("mysql:host=localhost;dbname=simple_crud","root","");
        return $db;
    }
}