<?php

//Super class used for other database communication classes throughout the project
class MySQLDataProviderModel {
    protected $dsn;

    public function __construct($dsn) {
        $this->dsn = $dsn;
    }

    //Method to handle queries to the database
    protected function query($sql, $sqlParms = [], $class = null) {
        $db = $this->connect();
        if($db == null) return [];

        $query = null;

        if(empty($sqlParms)) {
            $query = $db->query($sql);
        }else {
            $query = $db->prepare($sql);
            $query->execute($sqlParms);
        }

        //Fetch results based on whether a class is provided
        if($class) {
            $data = $query->fetchAll(PDO::FETCH_CLASS, $class);
        }else {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        }

        $query = null;
        $db = null;

        return $data;
    }


    //Method to handle execute statments rather than a query to the database
    protected function execute($sql, $sqlParms) {
        $db = $this->connect();
        if($db == null) return;

        $smt = $db->prepare($sql);

        $smt->execute($sqlParms);

        $smt = null;
        $db = null;
    }

    protected function connect() {
        try {
            return new PDO($this->dsn, DBINFO['db_user'], DBINFO['db_password']);
        }catch(PDOException $e) {
            die("Database connectoin failed: " . $e->getMessage());
        }
    }
}