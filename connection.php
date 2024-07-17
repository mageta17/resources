<?php
class Connection {
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpassword = "root";
    private $dbname = "form";
    protected $conn;

    // Constructor to automatically connect to the database
    public function __construct() {
        $this->connect();
    }

    // Method to establish a database connection
    private function connect() {
        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to get the connection
    public function getConnection() {
        return $this->conn;
    }
}

class Write extends Connection {
    public function executeWrite($query) {
        $result = $this->getConnection()->query($query);

        if ($result === TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

class Retrieve extends Connection {
    public function executeRetrieve($query) {
        $result = $this->getConnection()->query($query);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
}

