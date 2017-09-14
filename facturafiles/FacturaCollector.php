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
      $aux = new Factura($c{'idfactura'},$c{'fechafactura'},$c{'valorunitario'},$c{'total'},$c{'formapago_id'},$c{'usuario_id'},$c{'platillo_id'});
      array_push($arrayFactura, $aux);
    }
    return $aux;        
  }
    function showFacturaById($idfactura) {
    $rows = self::$db->getRows("SELECT * FROM factura WHERE idfactura= ? ",array("{$idfactura}"));        
    //$arrayPublicacion= array();      
    foreach ($rows as $c){
      $aux = new Factura($c{'idfactura'},$c{'fechafactura'},$c{'valorunitario'},$c{'total'},$c{'formapago_id'},$c{'usuario_id'},$c{'platillo_id'},$c{'cantidadpedido'});
      //array_push($arrayPublicacion, $aux);
    }
    return $aux;
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
