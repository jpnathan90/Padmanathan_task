<?php
define('DBUSER','root');
define('DBPWD','');
define('DBHOST','localhost');
define('DBNAME','task');
require __DIR__ . '/../vendor/autoload.php';

use SWAPI\SWAPI;

$swapi = new SWAPI;

class db extends mysqli {
	// single instance of self shared among all instances
	private static $instance = null;


	// db connection config vars
	private $user   = DBUSER;
	private $pass   = DBPWD.'1';
	private $dbName = DBNAME;
	private $dbHost = DBHOST;

	//This method must be static, and must return an instance of the object if the object
	//does not already exist.
	public static function getInstance() {
		if (!self::$instance instanceof self) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	// The clone and wakeup methods prevents external instantiation of copies of the Singleton class,
	// thus eliminating the possibility of duplicate objects.
	public function __clone() {
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}
	public function __wakeup() {
		trigger_error('Deserializing is not allowed.', E_USER_ERROR);
	}

	private function __construct() {
		try{
			parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
			if (mysqli_connect_error()) {
				exit('Database connectivity issue: Please update the DB details in config.php (' . mysqli_connect_errno() . ') '
						. mysqli_connect_error());
			}
			parent::set_charset('utf-8');
		} catch(Exception $e) {
		  echo 'Database connectivity issue: Please update the DB details in config.php: - ' .$e->getMessage();
		}
   }

   public function dbquery($query) {
		if($this->query($query))
		{
			return true;
		}
	}

	public function get_result($query) {
		$result = $this->query($query);
		if ($result->num_rows > 0){
			$row = $result->fetch_assoc();
			return $row;
		} else
			return null;
	}
}
?>