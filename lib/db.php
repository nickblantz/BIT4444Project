<?php
  //define a database connection class
  require_once("config.php");

  class MySQLDB {
    private $dbConn;

    public function open_connection() {
      //establish a connection to the database
      $this->dbConn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      //error checking
      if(mysqli_connect_errno()) {
        die( "Database connection error: ".mysqli_connect_error()."(".mysqli_connect_errno().")" );
      }
    }

    public function close_connection() {
      if(isset($this->dbConn)) {
        mysqli_close($this->dbConn);
        unset($this->dbConn);
      }
    }

    public function query($sql) {
      $result = mysqli_query($this->dbConn, $sql);
      //error checking
      if(!$result) {
        die("Database query error: ".mysqli_error($this->dbConn)." (".mysqli_errno($this->dbConn).")");
      }
      return $result;
    }
	
	public function getLink() {
		return $this->dbConn;
	}

    //constructor method
    function __construct(){
      $this->open_connection();
    }

  }//end of class MySQLDB
 ?>
