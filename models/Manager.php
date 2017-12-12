<?php
namespace models;

class Manager
{
    protected function dbConnect() {
        $db = new \PDO('mysql:host=localhost;dbname=forteroche;charset=utf8','root','Commercy1411');

        return $db;
    }
}