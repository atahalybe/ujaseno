<?php

class Database
{

    public $dbname;
    public $host;
    public $username;
    public $password;

    public function __construct()
    {

        $this->dbname = "smartlock";
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";

    }

    public function checkConnection()
    {

        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname"
                , $this->username
                , $this->password
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connected";

        } catch (PDOException $e) {

            echo "ERROR: " . $e->getMessage();

        }

        $conn = null;

    }

    public function select($query)
    {

        try {

            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare($query);
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            return new RecursiveArrayIterator($stmt->fetchAll());

        } catch (PDOException $e) {

            echo "ERROR: " . $e->getMessage();

        }

        $conn = null;

    }

    public function query($query)
    {

        try {

            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare($query);
            $stmt->execute();

        } catch (PDOException $e) {

            echo "ERROR: " . $e->getMessage();

        }

        $conn = null;

    }

}
