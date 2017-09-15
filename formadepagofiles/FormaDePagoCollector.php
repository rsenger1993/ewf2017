<?php

include_once('../collector/Collector.php');
include_once('FormaDePago.php');

class FormaDePagoCollector extends Collector
{
  
  function showFormaDePagos() {
    $rows = self::$db->getRows("SELECT * FROM formapago ");        
    //echo "linea 1";
    $arrayFormaDePago= array();        
    foreach ($rows as $c){
      $aux = new FormaDePago($c{'idformadepago'},$c{'formadepagodescripcion'});
      array_push($arrayFormaDePago, $aux);
    }
    return $arrayFormaDePago;        
  }

    function showFormaDePagobyName($formadepago) {
    $row = self::$db->getRows("SELECT * FROM formapago WHERE formadepagodescripcion= ?",array("{$formadepago}"));
    $ObjFormaDePago= new FormaDePago($row[0]{'idformadepago'}, $row[0]{'formadepagodescripcion'});

    return $ObjFormaDePago;        
  }

    function showFormaDePagoByDescription($formadepagodescripcion) {
    $row = self::$db->getRows("SELECT * FROM formadepago WHERE formadepagodescripcion= ?",array("{$formadepagodescripcion}"));
   $arrayFormaDePago= array();
   //$aux = Persona;        
    foreach ($row as $c){
      $aux = new FormaDePago($c{'idformadepago'},$c{'formadepagodescripcion'});
      //array_push($arrayUPersona, $aux);
    }
    return $aux;        
  }
     function countFormaDePagoByDescription($formadepagodescripcion) {
    $row = self::$db->getRows("SELECT * FROM formadepago WHERE formadepagodescripcion= ?",array("{$formadepagodescripcion}"));
   $arrayFormaDePago= array(); 
            
    foreach ($row as $c){
      $aux = new FormaDePago($c{'idformadepago'},$c{'formadepagodescripcion'});
      array_push($arrayFormaDePago, $aux);
    }
    return $arrayFormaDePago;        
  }

      function updateFormaDePago($idformadepago,$formadepagodescripcion) {
    $insertrow = self::$db->updateRow("UPDATE formadepago SET formadepagodescripcion = ? WHERE idformadepago = ?", array("{$formadepagodescripcion}",$idformadepago));  
      
  }

      function deleteFormaDePago($idformadepago) {
    $insertrow = self::$db->deleteRow("DELETE FROM formadepago WHERE idformadepago=?",array("{$idformadepago}"));
      
  }

      function insertarFormaDePago($formadepagodescripcion) {
    $insertrow = self::$db->insertRow("INSERT INTO formapago (formadepagodescripcion) VALUES (?) RETURNING idformadepago",array("{$formadepagodescripcion}"));
      $row = $insertrow;
    return $row;
  }

}
?>