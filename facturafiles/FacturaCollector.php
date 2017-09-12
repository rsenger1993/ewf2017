<?php

include_once('Factura.php');
include_once('../collector/Collector.php');

class FacturaCollector extends Collector
{
  
  function showFacturas() {
    $rows = self::$db->getRows("SELECT * FROM factura ");        
    //echo "linea 1";
    $arrayFactura= array();        
    foreach ($rows as $c){
      $aux = new Factura($c{'idfactura'},$c{'$fechafactura'},$c{'$valorunitario'},$c{'$total'},$c{'$formadepago_id'},$c{'$usuario_id'},$c{'$platillo_id'});
      array_push($arrayFactura, $aux);
    }
    return $aux;        
  }
    function showFavoritoByIdandPubli($f_usuario, $publicacion_id) {
    $rows = self::$db->getRows("SELECT * FROM favorito WHERE f_usuario= ? AND publicacion_id= ?",array("{$f_usuario}","{$publicacion_id}"));        
    $arrayPublicacion= array();        
    foreach ($rows as $c){
      $aux = new Favorito($c{'idfavorito'},$c{'f_usuario'},$c{'publicacion_id'});
      array_push($arrayPublicacion, $aux);
    }
    return $arrayPublicacion;        
  }
    function showFavoritosByUser($f_usuario) {
    $rows = self::$db->getRows("SELECT * FROM favorito WHERE f_usuario= ?",array("{$f_usuario}"));        
    $arrayPublicacion= array();
    foreach ($rows as $c){
      $aux = new Favorito($c{'idfavorito'},$c{'f_usuario'},$c{'publicacion_id'});
      array_push($arrayPublicacion, $aux);
    }
    return $arrayPublicacion;        
  }

    function showFacturaById($idfactura) {
    $row = self::$db->getRows("SELECT * FROM factura WHERE idfactura= ?",array("{$idfactura}"));
    $ObjFactura= new Factura($row[0]{'idfactura'},$row[0]{'fechafactura'},$row[0]{'valorunitario'},$row[0]{'total'},$row[0]{'formapago_id'},$row[0]{'usuario_id'},$row[0]{'platillo_id'},$row[0]{'cantidadpedido'});

    return $ObjFactura;

  }
      function updateFavorito($idfavorito, $f_usuario, $publicacion_id) {
    $insertrow = self::$db->updateRow("UPDATE favorito SET arrayusuario_id = arrayusuario_id || ?  WHERE usuarioamigo = ?", array("{$idamigo}","{$usuario}"));  
      
  }

      function deleteFavorito($f_usuario, $publicacion_id) {
    $insertrow = self::$db->deleteRow("DELETE FROM favorito WHERE f_usuario=? AND publicacion_id=?",array("{$f_usuario}", "{$publicacion_id}"));
      
  }

      function insertarFactura($fechafactura,$valorunitario,$total,$formapago_id, $usuario_id, $platillo_id, $cantidadpedido) {

    $insertrow = self::$db->insertRow("INSERT INTO factura (fechafactura, valorunitario, total, formapago_id, usuario_id, platillo_id, cantidadpedido) VALUES (?,?,?,?,?,?,?) RETURNING idfactura",array("{$fechafactura}","{$valorunitario}","{$total}","{$formapago_id}","{$usuario_id}","{$platillo_id}","{$cantidadpedido}"));
      $row = $insertrow;
    return $row;
  }

}

?>
