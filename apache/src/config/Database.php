<?php

class Database {
    private $host = "db";
    private $db_name = "testsDB";
    private $username = "user";
    private $password = "password";
    public $conn;
    public function getConnection(){
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            $this->conn= mysqli_connect($this->host,  $this->username, $this->password, $this->db_name);
        } catch (mysqli_sql_exception $e) {
            echo "MySQLi Error Code: " . $e->getCode() . "<br />";
            echo "Exception Msg: " . $e->getMessage();
            exit;
        }
        return $this->conn;
    }
}
?>