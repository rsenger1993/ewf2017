<?php



class dataBase
{
  public $isConnected;
  protected $datab;

  private $host      = DB_HOST;
  private $username  = DB_USER;
  private $password  = DB_PASS;
  private $dbname    = DB_NAME;

  public function __construct($username, $password, $host, $dbname, $options=array()){
    $this->isConnected = true;

    try { 
      $this->datab = new PDO("pgsql:host={$host};dbname={$dbname}", $username, $password, $options);
      $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } 
    catch(PDOException $e) { 
      $this->isConnected = false;
      throw new Exception($e->getMessage());
    }
  }

  public function Disconnect(){
    $this->datab = null;
    $this->isConnected = false;
  }

  public function getRow($query, $params=array()){
    try{ 
      $stmt = $this->datab->prepare($query); 
      $stmt->execute($params);
      return $stmt->fetch();  
      }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }
  }

  public function getRows($query, $params=array()){
    try{ 
      $stmt = $this->datab->prepare($query); 
      $stmt->execute($params);
      return $stmt->fetchAll();       
      }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }       
  }

  public function insertRow($query, $params){
    try{ 
      $stmt = $this->datab->prepare($query); 
      $stmt->execute($params);
      }catch(PDOException $e){
      throw new Exception($e->getMessage());
    }           
  }

  public function updateRow($query, $params){
    return $this->insertRow($query, $params);
  }

  public function deleteRow($query, $params){
    return $this->insertRow($query, $params);
  }
}

?>
