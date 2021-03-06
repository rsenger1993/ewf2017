<?php

include_once('../direccionfiles/Direccion.php');
include_once('../collector/Collector.php');

class DireccionCollector extends Collector
{
  
  function showDirecciones() {
    $rows = self::$db->getRows("SELECT * FROM direccion ");        
    //echo "linea 1";
    $arrayDireccion= array();        
    foreach ($rows as $c){
      $aux = new Direccion($c{'iddireccion'},$c{'descripcion'});
      array_push($arrayDireccion, $aux);
    }
    return $arrayDireccion;        
  }

    function showDireccion($iddireccion) {
    $row = self::$db->getRows("SELECT * FROM direccion WHERE iddireccion= ?",array("{$iddireccion}"));
    $ObjDireccion= new Direccion($row[0]{'iddireccion'}, $row[0]{'descripcion'});

    return $ObjDireccion;        
  }

    function showDireccionByDescription($direccion) {
    $row = self::$db->getRows("SELECT * FROM direccion WHERE descripcion= ?",array("{$direccion}"));
   $arrayDireccion= array();
   //$aux = Persona;        
    foreach ($row as $c){
      $aux = new Direccion($c{'iddireccion'},$c{'descripcion'});
      //array_push($arrayUPersona, $aux);
    }
    return $aux;        
  }
     function countDireccionByDescription($direccion) {
    $row = self::$db->getRows("SELECT * FROM direccion WHERE descripcion= ?",array("{$direccion}"));
   $arrayDireccion= array(); 
            
    foreach ($row as $c){
      $aux = new Direccion($c{'iddireccion'},$c{'descripcion'});
      array_push($arrayDireccion, $aux);
    }
    return $arrayDireccion;        
  }

      function updateDireccion($iddireccion,$direcciondescripcion) {
    $insertrow = self::$db->updateRow("UPDATE direccion SET direcciondescripcion = ? WHERE iddireccion = ?", array("{$direcciondescripcion}",$iddireccion));  
      
  }

      function deleteDireccion($iddireccion) {
    $insertrow = self::$db->deleteRow("DELETE FROM direccion WHERE iddireccion=?",array("{$iddireccion}"));
      
  }

      function insertarDireccion($direccion) {
    $insertrow = self::$db->insertRow("INSERT INTO direccion (direcciondescripcion) VALUES (?) RETURNING iddireccion",array("{$direccion}"));
      $row = $insertrow;
    return $row;
  }

}
?>