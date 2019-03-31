<?php

class Database
{
    private $host = 'localhost';
    private $dbuser = 'root';
    private $dbpass = '';
    private $dbname = 'api_dbase';

    private $conn;

    public function getConnection()
    {
        $this->conn = null;
        try{
            $this->conn= new PDO('mysql:host='.$this->host.';port=3308;dbname='.$this->dbname,$this->dbuser,$this->dbpass);
        }
        catch (PDOExeption $e )
        {
            echo 'Connection Error : '.$e->getMessage();
        }

        return $this->conn;
    }
}
