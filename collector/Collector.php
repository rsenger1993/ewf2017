<?php
include_once('../base/dataBase.php');

// Define configuration
define("DB_HOST", "ec2-50-17-217-166.compute-1.amazonaws.com");
define("DB_USER", "qldfqolxgbxxqx");
define("DB_PASS", "86f4b70063e14863a305c058dacc6ba13e3a030fa1a4b3d4bd62068ac1bfa936");
define("DB_NAME", "d5g9qf1pa0921m");


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
