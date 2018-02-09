<?php

class Database extends PDO {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_DBNAME;

    protected $_db;
    private $stmt;
    private $error;

    public function __construct()
    {
//        $dsn = 'mysql:host =' . $this->host . ';dbname="' . $this->dbname . '";charset=utf8';
//        echo $dsn;
//        $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
//
//        try {
//            $this->_db = new PDO($dsn, $this->user, $this->pass, $options);
//        } catch (PDOException $e) {
//            echo $e->getMessage();
//            $this->error = $e->getMessage();
//        }
        try {
            $this->_db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            // set the PDO error mode to exception
//            $this->_db=parent::__construct("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
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
        return $this->stmt->rowCount();
    }

//        public function lasInsertID(){
//        return $this->_db->lastInsertId();
//    }
}