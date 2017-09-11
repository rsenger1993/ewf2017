<?php

include_once('Registropedido.php');
include_once('../collector/Collector.php');

class RegistropedidoCollector extends Collector
{
  
  function showRegistroPedidos() {
    $rows = self::$db->getRows("SELECT * FROM registropedido ");        
    //echo "linea 1";
    $arrayRegistroPedido= array();        
    foreach ($rows as $c){
      $aux = new RegistroPedido($c{'idregistropedido'},$c{'$fechapedido'},$c{'$publicacion_id'});
      array_push($arrayRegistroPedido, $aux);
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
    function showRegistroPedidosByUser($r_usuario) {
    $rows = self::$db->getRows("SELECT * FROM registropedido WHERE r_usuario= ?",array("{$r_usuario}"));        
    $arrayRegistroPedido= array();
    foreach ($rows as $c){
      $aux = new RegistroPedido($c{'idregistropedido'},$c{'fechapedido'},$c{'publicacion_id'},$c{'r_usuario'},$c{'cantidadpedido'});
      array_push($arrayRegistroPedido, $aux);
    }
    return $arrayRegistroPedido;        
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

      function insertarRegistroPedido($fechapedido,$publicacion_id,$r_usuario, $cantidadpedido) {

    $insertrow = self::$db->insertRow("INSERT INTO registropedido (fechapedido, publicacion_id, r_usuario, cantidadpedido) VALUES (?,?,?,?)",array("{$fechapedido}","{$publicacion_id}","{$r_usuario}","{$cantidadpedido}"));
      
  }

}

?>
