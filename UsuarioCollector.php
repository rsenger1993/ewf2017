<?php

include_once('Usuario.php');
include_once('Collector.php');

class UsuarioCollector extends Collector
{
  
  function showUsuarios() {
    $rows = self::$db->getRows("SELECT * FROM usuario ");        
    //echo "linea 1";
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Usuario($c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'id'},$c{'nombreusuario'},$c{'clave'},$c{'descripcion'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }

    function showUsuario($idusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario WHERE id= ?",array("{$id}"));
    $ObjUsuario= new Usuario($row[0]{'persona_id'}, $row[0]{'nombrecompleto'}, $row[0]{'correo'}, $row[0]{'edad'}, $row[0]{'telefono'}, $row[0]{'idusuario'}, $row[0]{'nombreusuario'}, $row[0]{'clave'}, $row[0]{'descripcion'});

    return $ObjUsuario;        
  }

    function showUsuarioByName($nombreusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON usuario.persona_id = persona.id WHERE usuario.nombreusuario= ? ",array("{$nombreusuario}"));
   $arrayUsuario= array();        
    foreach ($row as $c){
      $aux = new Usuario($c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'id'},$c{'nombreusuario'},$c{'clave'},$c{'descripcion'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }

      function updateUsuario($idusuario,$nombrecompleto,$correo,$edad,$telefono,$clave,$descripcion) {
    $insertrow = self::$db->updateRow("UPDATE public.usuario SET nombrecompleto = ? , correo = ? , edad = ? , telefono = ? , clave = ? , descripcion = ?  WHERE id = ?", array("{$nombrecompleto}", "{$correo}", "{$edad}", "{$telefono}", "{$clave}", "{$descripcion}",$idusuario));  
      
  }

      function deleteUsuario($idusuario) {
    $insertrow = self::$db->deleteRow("DELETE FROM public.usuario WHERE id=?",array("{$idusuario}"));
      
  }

      function insertarUsuario($nombreusuario,$clave,$descripcion,$persona_id) {
    $insertrow = self::$db->insertRow("INSERT INTO usuario (nombreusuario, clave, descripcion, persona_id) VALUES (?,?,?,?)",array("{$nombreusuario}","{$clave}", "{$descripcion}" ,"{$persona_id}"));
      
  }

}
?>
