<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/IndecisiveEats/Resources/lib/mysql_config.php');

class MySQLConnector {
	private $dbConn;
	
	/**
	 * Constructor
	 */
	function __construct(){
		try {	
			$this->dbConn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if($this->dbConn === false) throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
		} catch(Exception $e) {
			trigger_error(sprintf(
				"mysqli connection failed with error #%d: %s",
				$e->getCode(),
				$e->getMessage()),
				E_USER_ERROR
			);
		}
	}
	
	/**
	 * Destructor
	 */
	function __destruct() {
		mysqli_close($this->dbConn);
		unset($this->dbConn);
	}
	
	/** 
	 * Executes a query against the specified database
	 * 
	 * @param	$sql	Query to execute
	 * @return			The JSON response from the request      
	 */
	public function query($sql) {
		try {
			$result = mysqli_query($this->dbConn, $sql);
			if($result === false) throw new Exception(mysqli_error($this->dbConn), mysqli_errno($this->dbConn));
		} catch(Exception $e) {
			trigger_error(sprintf(
				"mysqli query failed with error #%d: %s",
				$e->getCode(),
				$e->getMessage()),
				E_USER_ERROR
			);
		}
		return $result;
	}
	
	/** 
	 * Escapes a string using the encoding of the specified database
	 * 
	 * @param	$str	The string being escaped
	 * @return  		The escaped string     
	 */
	public function escape_string($str) {
		return mysqli_real_escape_string($this->dbConn, $str);
	}
}
?>
