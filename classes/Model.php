<?php

abstract class Model{
    protected $dbh;
    protected $stmt;

    public function __construct(){
        $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    }

    public function query($query){
        echo "querySet<br>" . $query . "<br>";
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){

        if(is_null($type)){
            switch(true){

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
        echo "<br>" . $param . "|" . $value . "|" . $type . "<br>";
        $this->stmt->bindValue($param, $value, $type);

    }

    public function execute(){
        echo "queryExe<br>";
        $this->stmt->execute();
    }


    public function resultSet(){
        $this->execute();
        echo "resultSet<br>";
        print_r($this); echo "<br>";
        $RES = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($RES);

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>