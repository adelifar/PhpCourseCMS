<?php
/**
 * Created by IntelliJ IDEA.
 * User: Unity
 * Date: 2/27/2019
 * Time: 12:52 PM
 */

class DB
{
    private $serverName;
    private $username;
    private $password;
    private $dbName;
    private $charset;

    protected function connect(){
        $this->serverName="localhost";
        $this->username="root";
        $this->password="";
        $this->dbName="cmsdb";
        $this->charset="utf8mb4";
        try {
            $dsn = "mysql:host=$this->serverName;dbname=$this->dbName;charset=$this->charset";
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch (Exception $e){
            die( "connection failed ".$e->getMessage());
        }
    }
}