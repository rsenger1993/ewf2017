<?php

include_once('../collector/Collector.php');
include_once("Platillo.php");

class PlatilloCollector extends Collector
{
  
  function showPlatillos() {
    $rows = self::$db->getRows("SELECT * FROM platillo ");        
    $arrayPlatillo= array();        
    foreach ($rows as $c){
      $aux = new Platillo($c{'idplatillo'},$c{'nombreplatillo'},$c{'platillodescripcion'},$c{'cantidad'},$c{'precio'},$c{'imgplatillo'},$c{'categoria_id'},$c{'categoriadescripcion'});
      array_push($arrayPlatillo, $aux);
    }
    return $arrayPlatillo;        
  }

    function showPlatilloById($idplatillo) {
    $row = self::$db->getRows("SELECT * FROM platillo INNER JOIN categoria ON (platillo.categoria_id = categoria.idcategoria) WHERE idplatillo= ?",array("{$idplatillo}"));
    $ObjPlatillo= new Platillo($row[0]{'idplatillo'}, $row[0]{'nombreplatillo'}, $row[0]{'platillodescripcion'}, $row[0]{'cantidad'}, $row[0]{'precio'}, $row[0]{'imgplatillo'}, $row[0]{'categoria_id'}, $row[0]{'categoriadescripcion'});

    return $ObjPlatillo;        
  }

     function countPlatilloById($idplatillo) {
    $row = self::$db->getRows("SELECT * FROM platillo INNER JOIN categoria ON (platillo.categoria_id = categoria.idcategoria)  WHERE idplatillo= ?",array("{$idplatillo}"));
   $arrayPlatillo= array();       
    foreach ($row as $c){
      $aux = new Platillo($c{'idplatillo'},$c{'nombreplatillo'},$c{'platillodescripcion'},$c{'cantidad'},$c{'precio'},$c{'imgplatillo'},$c{'categoria_id'},$c{'categoriadescripcion'});
      array_push($arrayPlatillo, $aux);
    }
    return $arrayPlatillo;        
  }

      function updatePlatillo($idplatillo,$nombreplatillo,$platillodescripcion,$cantidad,$precio,$imgplatillo,$categoria_id,$categoriadescripcion) {
    $insertrow = self::$db->updateRow("UPDATE public.platillo SET nombreplatillo = ? , platillodescripcion = ? , cantidad = ? , precio = ?  , imgplatillo = ? , categoria_id = ? , categoriadescripcion = ?  WHERE idplatillo = ?", array("{$nombreplatillo}", "{$platillodescripcion}", "{$cantidad}", "{$precio}", "{$imgplatillo}", "{$categoria_id}", "{$categoriadescripcion}",$idplatillo));  
      
  }

      function deletePlatillo($idplatillo) {
    $insertrow = self::$db->deleteRow("DELETE FROM public.platillo WHERE idplatillo=?",array("{$idplatillo}"));
      
  }

      function insertarPlatillo($nombreplatillo,$platillodescripcion,$cantidad,$precio,$imgplatillo,$categoria_id) {
        
        $insertrow = self::$db->insertRow("INSERT INTO platillo (nombreplatillo, platillodescripcion, cantidad, precio, imgplatillo, categoria_id) VALUES (?,?,?,?,?,?) RETURNING idplatillo", array("{$nombreplatillo}","{$platillodescripcion}", "{$cantidad}", "{$precio}", "{$imgplatillo}", "{$categoria_id}"));
        $row = $insertrow;
    return $row;
  }


}
?>