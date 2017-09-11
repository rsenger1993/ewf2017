<?php

include_once('../publicacionfiles/Publicacion.php');
include_once('../collector/Collector.php');

class PublicacionCollector extends Collector
{
  
  function showPublicaciones() {
    $rows = self::$db->getRows("SELECT * FROM publicacion INNER JOIN platillo ON (publicacion.platillo_id = platillo.idplatillo)  where platillo.cantidad> 0");        
    //echo "linea 1";
    $arrayPublicacion= array();        
    foreach ($rows as $c){
      $aux = new Publicacion($c{'idpublicacion'},$c{'fechapublicacion'},$c{'estado'},$c{'usuario_id'},$c{'platillo_id'},$c{'formapago_id'});
      array_push($arrayPublicacion, $aux);
    }
    return $arrayPublicacion;        
  }

    function showPublicacionById($idpublicacion) {
    $row = self::$db->getRows("SELECT * FROM publicacion WHERE idpublicacion= ?",array("{$idpublicacion}"));
    $ObjPublicacion= new Publicacion($row[0]{'idpublicacion'}, $row[0]{'fechapublicacion'}, $row[0]{'estado'}, $row[0]{'usuario_id'}, $row[0]{'platillo_id'}, $row[0]{'formapago_id'});

    return $ObjPublicacion;        
  }

    function showPublicacionByIdUser($usuario_id) {
    $row = self::$db->getRows("SELECT * FROM publicacion WHERE usuario_id= ?",array("{$usuario_id}"));
   $arrayPublicacion= array();        
    foreach ($row as $c){
      $aux = new Publicacion($c{'idpublicacion'},$c{'fechapublicacion'},$c{'estado'},$c{'usuario_id'},$c{'platillo_id'},$c{'formapago_id'});
      array_push($arrayPublicacion, $aux);
    }
    return $arrayPublicacion;        
  }

     function countPublicacionById($idpublicacion) {
    $row = self::$db->getRows("SELECT * FROM publicacion  WHERE idpublicacion= ?",array("{$idpublicacion}"));
   $arrayPublicacion= array(); 
            
    foreach ($row as $c){
      $aux = new Publicacion($c{'idpublicacion'},$c{'fechapublicacion'},$c{'estado'},$c{'usuario_id'},$c{'platillo_id'},$c{'formapago_id'});
      array_push($arrayPublicacion, $aux);
    }
    return $arrayPublicacion;        
  }

      function updatePublicacion($idpublicacion,$fechapublicacion) {
    $insertrow = self::$db->updateRow("UPDATE publicacion SET fechapublicacion = ?  WHERE idpublicacion = ?", array("{$fechapublicacion}",$idpublicacion));  
      
  }

      function deletePublicacion($idpublicacion) {
    $insertrow = self::$db->deleteRow("DELETE FROM publicacion WHERE idpublicacion=?",array("{$idpublicacion}"));
      
  }

      function insertarPublicacion($fechapublicacion,$estado,$usuario_id,$platillo_id,$formadepago_id) {
        
        $insertrow = self::$db->insertRow("INSERT INTO publicacion (fechapublicacion, estado, usuario_id, platillo_id, formapago_id) VALUES (?,?,?,?,?) RETURNING idpublicacion", array("{$fechapublicacion}","{$estado}", "{$usuario_id}", "{$platillo_id}", "{$formadepago_id}"));
        $row = $insertrow;
    return $row;
  }


}
?>