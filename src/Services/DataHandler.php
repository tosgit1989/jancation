<?php
namespace Services;
class DataHandler {
    // getPdo()
    protected function getPdo() {
        $dbConnect = 'mysql:dbname=jancation; host=127.0.0.1; charset=utf8';
        $username = 'root';
        $password = '';
        $driverOptions = [];
        $pdo = new \PDO($dbConnect, $username, $password, $driverOptions);
        return $pdo;
    }
}
?>