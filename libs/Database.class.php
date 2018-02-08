<?php

class Database extends PDO {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_DBNAME;

    private $_db;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = 'mysql:host = '.$this->host .';dbname ='.$this->dbname;

        $options = array(PDO::ATTR_PERSISTENT =>true,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try {
            $this->_db = new PDO($dsn,$this->user,$this->pass,$options);
        }catch (PDOException $e){
            echo $e->getMessage();
            $this->error=$e->getMessage();
        }
    }

    public function query($sql){
        $this->stmt = $this->_db->prepare($sql);
    }

    public function bind($params_array){
        foreach ($params_array as $param => $value){
            $type = isset($p['type'])? $p['type'] : NULL;

            if (is_null($type)){
                switch (true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;

                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;

                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;

                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param,$value,$type);
        }
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function findAll(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findOne(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->_db->lastInsertId($seq_name);
    }
}