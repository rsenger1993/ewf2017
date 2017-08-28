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
      $aux = new Amigo($c{'id'},$c{'$usuario_id'});
      array_push($arrayAmigo, $aux);
    }
    return $arrayAmigo;        
  }

    function showAmigo($idamigo) {
    $row = self::$db->getRows("SELECT * FROM amigo WHERE id= ?",array("{$idamigo}"));
    $ObjAmigo= new Amigo($row[0]{'id'},$row[0]{'$usuario_id'});

    return $ObjAmigo


      function updateAmigo($idamigo,$usuario_id) {
    $insertrow = self::$db->updateRow("UPDATE public.amigo SET nombrecompleto = ? , correo = ? , edad = ? , telefono = ? , clave = ? , descripcion = ?  WHERE id = ?", array("{$nombrecompleto}", "{$correo}", "{$edad}", "{$telefono}", "{$clave}", "{$descripcion}",$idamigo));  
      
  }

      function deleteAmigo($idamigo) {
    $insertrow = self::$db->deleteRow("DELETE FROM public.amigo WHERE id=?",array("{$idamigo}"));
      
  }

      function insertarAmigo($usuario_id) {
    $insertrow = self::$db->insertRow("INSERT INTO public.amigo (usuario_id) VALUES (?)",array("{$usuario_id}"));
      
  }

}
?>
