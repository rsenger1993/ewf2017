<?php
include_once('../base/dataBase.php');

// Define configuration
define("DB_HOST", "ec2-107-22-171-11.compute-1.amazonaws.com");
define("DB_USER", "tnggwjyqgpeqru");
define("DB_PASS", "12caa1bddc89129c0efb3af1fd42d1e1bf79041aa83b2b37310087ac185e3ed8");
define("DB_NAME", "d7l296qdslij0u");
/*define("DB_HOST", "ec2-107-22-171-11.compute-1.amazonaws.com");
define("DB_USER", "tnggwjyqgpeqru");
define("DB_PASS", "12caa1bddc89129c0efb3af1fd42d1e1bf79041aa83b2b37310087ac185e3ed8");
define("DB_NAME", "d7l296qdslij0u");*/


class Collector extends dataBase
{
  public static $db;
  private $host      = DB_HOST;
  private $username  = DB_USER;
  private $password  = DB_PASS;
  private $dbname    = DB_NAME;
    
  public function __construct()
  {
    self::$db = new dataBase($this->username, $this->password, $this->host, $this->dbname);
  }

}

?>
