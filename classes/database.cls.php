<?php

class Database {

    // Initializing variable with the value of mysql credentials
    private $host     = "localhost";
    private $user     = "root";
    private $password = "";
    private $dbname   = "ajax";

    protected function connect() {
        // Connecting to the database
        $dsn  = "mysql:host=".$this->host.";dbname=".$this->dbname;

        // Creating PDO
        $connect = new PDO($dsn, $this->user, $this->password);

        // Set attributes of fetching into fetch_assoc()
        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $connect;
    }

}



