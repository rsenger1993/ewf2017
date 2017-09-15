<?php

include_once('Favorito.php');
include_once('../collector/Collector.php');

class FavoritoCollector extends Collector
{
  
  function showFavoritos() {
    $rows = self::$db->getRows("SELECT * FROM favorito ");        
    //echo "linea 1";
    $arrayPublicacion= array();        
    foreach ($rows as $c){
      $aux = new Favorito($c{'idfavorito'},$c{'$f_usuario'},$c{'$publicacion_id'});
      array_push($arrayPublicacion, $aux);
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

    function showFavorito($idfavorito) {
    $row = self::$db->getRows("SELECT * FROM favorito WHERE idfavorito= ?",array("{$idfavorito}"));
    $ObjFavorito= new Favorito($row[0]{'idfavorito'},$row[0]{'$f_usuario'},$row[0]{'$publicacion_id'});

    return $ObjFavorito;

  }
      function updateFavorito($idfavorito, $f_usuario, $publicacion_id) {
    $insertrow = self::$db->updateRow("UPDATE favorito SET f_usuario = ? ,publicacion_id = ? WHERE idfavorito = ?", array("{$f_usuario}","{$publicacion_id}","{$idfavorito}"));  
      
  }

      function deleteFavorito($f_usuario, $publicacion_id) {
    $insertrow = self::$db->deleteRow("DELETE FROM favorito WHERE f_usuario=? AND publicacion_id = ?",array("{$f_usuario}","{$publicacion_id}"));
      
  }

      function insertarFavorito($f_usuario,$publicacion_id) {

    $insertrow = self::$db->insertRow("INSERT INTO favorito (f_usuario, publicacion_id) VALUES (?,?)",array("{$f_usuario}","{$publicacion_id}"));
      
  }

}

?>
