<?php

include_once('Direccion.php');
include_once('Collector.php');

class DireccionCollector extends Collector
{
  
  function showDirecciones() {
    $rows = self::$db->getRows("SELECT * FROM direccion ");        
    //echo "linea 1";
    $arrayDireccion= array();        
    foreach ($rows as $c){
      $aux = new Direccion($c{'id'},$c{'nombredireccion'},$c{'descripcion'});
      array_push($arrayDireccion, $aux);
    }
    return $arrayDireccion;        
  }

    function showDireccion($iddireccion) {
    $row = self::$db->getRows("SELECT * FROM direccion WHERE id= ?",array("{$iddireccion}"));
    $ObjDireccion= new Usuario($row[0]{'id'}, $row[0]{'nombredireccion'}, $row[0]{'descripcion'});

    return $ObjDireccion;        
  }

   


 function showDireccionByName($nombredireccion) {
    $row = self::$db->getRows("SELECT * FROM direccion WHERE nombredireccion= ?",array("{$nombredireccion}"));
   $arrayUDireccion= array();        
    foreach ($row as $c){
      $aux = new Direccion($c{'id'},$c{'nombredireccion'},$c{'descripcion'});
      //array_push($arrayUPersona, $aux);
    }
    return $aux;        
  }
    

      function updateDireccion($iddireccion,$nombredireccion,$descripcion) {
    $insertrow = self::$db->updateRow("UPDATE public.direccion SET nombredireccion = ? , descripcion = ?WHERE id = ?", array("{$nombredireccion}", "{$descripcion}"));  
      
  }

     

}
?>
