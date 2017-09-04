<?php

include_once('Categoria.php');
include_once('../collector/Collector.php');

class CategoriaCollector extends Collector
{
  
  function showCategorias() {
    $rows = self::$db->getRows("SELECT * FROM categoria ");        
    //echo "linea 1";
    $arrayCategoria= array();        
    foreach ($rows as $c){
      $aux = new Categoria($c{'idcategoria'},$c{'categoriadescripcion'});
      array_push($arrayCategoria, $aux);
    }
    return $arrayCategoria;        
  }

    function showCategoria($idcategoria) {
    $row = self::$db->getRows("SELECT * FROM categoria WHERE idcategoria= ?",array("{$idcategoria}"));
    $ObjCategoria= new Categoria($row[0]{'idcategoria'}, $row[0]{'categoriadescripcion'});

    return $ObjCategoria;        
  }
     function showCategoriaByName($categoria) {
    $row = self::$db->getRows("SELECT * FROM categoria WHERE categoriadescripcion= ?",array("{$categoria}"));
    $ObjCategoria= new Categoria($row[0]{'idcategoria'}, $row[0]{'categoriadescripcion'});

    return $ObjCategoria;        
  }

    function showCategoriaByDescription($categoriadescripcion) {
    $row = self::$db->getRows("SELECT * FROM categoria WHERE categoriadescripcion= ?",array("{$categoriadescripcion}"));
   $arrayCategoria= array();      
    foreach ($row as $c){
      $aux = new Categoria($c{'idcategoria'},$c{'categoriadescripcion'});
    }
    return $aux;        
  }
     function countCategoriaByDescription($categoriadescripcion) {
    $row = self::$db->getRows("SELECT * FROM categoria WHERE categoriadescripcion= ?",array("{$categoriadescripcion}"));
   $arrayCategoria= array();    
    foreach ($row as $c){
      $aux = new Categoria($c{'idcategoria'},$c{'categoriadescripcion'});
      array_push($arrayCategoria, $aux);
    }
    return $arrayCategoria;        
  }

      function updateCategoria($idcategoria,$categoriadescripcion) {
    $insertrow = self::$db->updateRow("UPDATE public.categoria SET categoriadescripcion = ? WHERE idcategoria = ?", array("{$categoriadescripcion}",$idcategoria));  
      
  }

      function deleteCategoria($idcategoria) {
    $insertrow = self::$db->deleteRow("DELETE FROM public.categoria WHERE idcategoria=?",array("{$idcategoria}"));
      
  }

      function insertarCategoria($categoriadescripcion) {
    $insertrow = self::$db->insertRow("INSERT INTO categoria (categoriadescripcion) VALUES (?) RETURNING idcategoria",array("{$categoriadescripcion}"));
      $row = $insertrow;
    return $row;
  }

}
?>