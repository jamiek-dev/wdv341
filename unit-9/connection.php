<?php 
require_once('config.php');

class Connection {
    private $conn;

    public function open() {
        try {
            $this->conn = new PDO(
                "mysql:host=".SERVERNAME."; dbname=".DATABASE.";",
                USERNAME,
                PASSWORD
            );

            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $this->conn;
        } catch(PDOException $e) {
            error_log($e->getMessage(), 3, 'debug.log');

            return false;
        }
    }

    public function close() {
        $this->conn = null;
    }
}
?>