<?php

include 'config.php';

class Database {

    private $_connection;
    private static $_instance;
    private $_host = DB_HOST;
    private $_username = DB_USER;
    private $_password = DB_PASSWORD;
    private $_database = DB_DATABASE;

    public static function getInstance() {
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct() {
        $this->_connection = new PDO("mysql:host=" . $this->_host . ";dbname=" . $this->_database, $this->_username,
            $this->_password);
        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
                E_USER_ERROR);
        }
    }

    /*public function execute(string $sql, array $array): bool
    {
        $stmt = $this->_connection->prepare($sql);
        foreach($array as $key => $value){
            $stmt->bindParam($key, $value);
        }
        return $stmt->execute();
    }

    public function query(string $sql, array $array) : PDOStatement{
        $stmt = $this->_connection->prepare($sql);
        foreach ($array as $key => $value) {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();
        return $stmt;
    }*/

    public function getConnection() {
        return $this->_connection;
    }

}


