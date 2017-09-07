<?php

include_once('Amigo.php');
include_once('../collector/Collector.php');

class AmigoCollector extends Collector
{
  
  function showAmigos() {
    $rows = self::$db->getRows("SELECT * FROM amigo ");        
    //echo "linea 1";
    $arrayAmigo= array();        
    foreach ($rows as $c){
      $aux = new Amigo($c{'idamigo'},$c{'$a_usuario'},$c{'$usuario_id'});
      array_push($arrayAmigo, $aux);
    }
    return $aux;        
  }
    function showAmigosByIdandUser($a_usuario, $usuario_id) {
    $rows = self::$db->getRows("SELECT * FROM amigo WHERE a_usuario= ? AND usuario_id= ?",array("{$a_usuario}","{$usuario_id}"));        
    $arrayAmigo= array();        
    foreach ($rows as $c){
      $aux = new Amigo($c{'idamigo'},$c{'a_usuario'},$c{'usuario_id'});
      array_push($arrayAmigo, $aux);
    }
    return $arrayAmigo;        
  }
    function showAmigosByUser($a_usuario) {
    $rows = self::$db->getRows("SELECT * FROM amigo WHERE a_usuario= ?",array("{$a_usuario}"));        
    $arrayAmigo= array();
    foreach ($rows as $c){
      $aux = new Amigo($c{'idamigo'},$c{'a_usuario'},$c{'usuario_id'});
      array_push($arrayAmigo, $aux);
    }
    return $arrayAmigo;        
  }

    function showAmigo($idamigo) {
    $row = self::$db->getRows("SELECT * FROM amigo WHERE id= ?",array("{$idamigo}"));
    $ObjAmigo= new Amigo($row[0]{'id'},$row[0]{'$usuario_id'});

    return $ObjAmigo;

  }
      function updateAmigo($usuario,$idamigo) {
    $insertrow = self::$db->updateRow("UPDATE amigo SET arrayusuario_id = arrayusuario_id || ?  WHERE usuarioamigo = ?", array("{$idamigo}","{$usuario}"));  
      
  }

      function deleteAmigo($idamigo) {
    $insertrow = self::$db->deleteRow("DELETE FROM public.amigo WHERE id=?",array("{$idamigo}"));
      
  }

      function insertarAmigo($a_usuario,$idusuario) {

    $insertrow = self::$db->insertRow("INSERT INTO amigo (a_usuario, usuario_id) VALUES (?,?)",array("{$a_usuario}","{$idusuario}"));
      
  }

}

?>
