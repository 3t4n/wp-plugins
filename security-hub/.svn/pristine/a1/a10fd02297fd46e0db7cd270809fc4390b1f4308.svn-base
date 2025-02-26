<?php

class WPSH_Database {
    
    public $dbName = DB_NAME;
    public $dbHost = DB_HOST;
    public $dbusername = DB_USER;
    public $dbpassword = DB_PASSWORD;
    public $myconn;
    
    public function connect() {
    
        $con = mysqli_connect($this->dbHost, $this->dbusername, $this->dbpassword, $this->dbName);

        if (!$con) {
            die('Could not connect to database!');
        } else {
            $this->myconn = $con;
            
        }
        return $this->myconn;

    }

    function close() {
        mysqli_close($myconn);

    }
}
?>