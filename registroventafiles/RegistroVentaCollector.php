<?php

include_once('RegistroVenta.php');
include_once('../collector/Collector.php');

class RegistroVentaCollector extends Collector
{
  
  function showRegistroVenta() {
    $rows = self::$db->getRows("SELECT * FROM registroventa ");        
    //echo "linea 1";
    $arrayRegistroVenta= array();        
    foreach ($rows as $c){
      $aux = new RegistroVenta($c{'idregistroventa'},$c{'$fechaventa'},$c{'$publicacion_id'});
      array_push($arrayRegistroVenta, $aux);
    }
    return $aux;        
  }
    function showRegistroPedidoByIdandPubli($f_usuario, $publicacion_id) {
    $rows = self::$db->getRows("SELECT * FROM favorito WHERE f_usuario= ? AND publicacion_id= ?",array("{$f_usuario}","{$publicacion_id}"));        
    $arrayPublicacion= array();        
    foreach ($rows as $c){
      $aux = new Favorito($c{'idfavorito'},$c{'f_usuario'},$c{'publicacion_id'});
      array_push($arrayPublicacion, $aux);
    }
    return $arrayPublicacion;        
  }
    function showRegistroVentasByUser($v_usuario) {
    $rows = self::$db->getRows("SELECT * FROM registroventa WHERE v_usuario= ?",array("{$v_usuario}"));        
    $arrayRegistroVenta= array();
    foreach ($rows as $c){
      $aux = new RegistroVenta($c{'idregistroventa'},$c{'fechaventa'},$c{'publicacion_id'},$c{'v_usuario'},$c{'c_usuario'},$c{'cantidadventa'});
      array_push($arrayRegistroVenta, $aux);
    }
    return $arrayRegistroVenta;        
  }

    function showFavorito($idfavorito) {
    $row = self::$db->getRows("SELECT * FROM favorito WHERE idfavorito= ?",array("{$idfavorito}"));
    $ObjFavorito= new Favorito($row[0]{'idfavorito'},$row[0]{'$f_usuario'},$row[0]{'$publicacion_id'});

    return $ObjFavorito;

  }
      function updateFavorito($idfavorito, $f_usuario, $publicacion_id) {
    $insertrow = self::$db->updateRow("UPDATE favorito SET arrayusuario_id = arrayusuario_id || ?  WHERE usuarioamigo = ?", array("{$idamigo}","{$usuario}"));  
      
  }

      function deleteFavorito($f_usuario, $publicacion_id) {
    $insertrow = self::$db->deleteRow("DELETE FROM favorito WHERE f_usuario=? AND publicacion_id=?",array("{$f_usuario}", "{$publicacion_id}"));
      
  }

      function insertarRegistroVenta($fechaventa,$publicacion_id,$v_usuario,$c_usuario, $cantidadventa) {

    $insertrow = self::$db->insertRow("INSERT INTO registroventa (fechaventa, publicacion_id, v_usuario, c_usuario, cantidadventa) VALUES (?,?,?,?,?)",array("{$fechaventa}","{$publicacion_id}","{$v_usuario}","{$c_usuario}","{$cantidadventa}"));
      
  }

}

?>
