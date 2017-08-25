<?php

include_once('Usuario.php');
include_once('../collector/Collector.php');

class UsuarioCollector extends Collector
{
  
  function showUsuarios() {
    $rows = self::$db->getRows("SELECT * FROM usuario ");        
    //echo "linea 1";
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Usuario($c{'id'},$c{'nombreusuario'},$c{'clave'},$c{'descripcion'},$c{'persona_id'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }

    function showUsuario($idusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario WHERE id= ?",array("{$idusuario}"));
    $ObjUsuario= new Usuario($row[0]{'id'}, $row[0]{'nombreusuario'}, $row[0]{'clave'}, $row[0]{'descripcion'},$row[0]{'persona_id'});

    return $ObjUsuario;        
  }

     function showUsuarioByLogin($nombreusuario, $clave) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.id)
      INNER JOIN direccion ON (persona.direccion_id = direccion.id) WHERE nombreusuario= ? AND clave= ?",array("{$nombreusuario}","{$clave}"));
   $arrayUsuario= array();        
    foreach ($row as $c){
      $aux = new Usuario($c{'id'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;      
  }


    function countUsuarioByName($nombreusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.id)
      INNER JOIN direccion ON (persona.direccion_id = direccion.id) WHERE nombreusuario= ?",array("{$nombreusuario}"));
   $arrayUsuario= array();        
    foreach ($row as $c){
      $aux = new Usuario($c{'id'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }

      function showUsuarioByName($nombreusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.id)
      INNER JOIN direccion ON (persona.direccion_id = direccion.id) WHERE nombreusuario= ?",array("{$nombreusuario}"));
   //$arrayUsuario= array();        
    foreach ($row as $c){
      $aux = new Usuario($c{'id'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'});
      //array_push($arrayUsuario, $aux);
    }
    return $aux;        
  }

      function updateUsuario($idusuario,$nombrecompleto,$correo,$edad,$telefono,$clave,$descripcion) {
    $insertrow = self::$db->updateRow("UPDATE public.usuario SET nombrecompleto = ? , correo = ? , edad = ? , telefono = ? , clave = ? , descripcion = ?  WHERE id = ?", array("{$nombrecompleto}", "{$correo}", "{$edad}", "{$telefono}", "{$clave}", "{$descripcion}",$idusuario));  
      
  }

      function deleteUsuario($idusuario) {
    $insertrow = self::$db->deleteRow("DELETE FROM public.usuario WHERE id=?",array("{$idusuario}"));
      
  }

      function insertarUsuario($nombreusuario,$clave,$descripcion,$persona_id) {
    $insertrow = self::$db->insertRow("INSERT INTO usuario (nombreusuario, clave, usuariodescripcion, persona_id) VALUES (?,?,?,?)",array("{$nombreusuario}","{$clave}", "{$descripcion}" ,"{$persona_id}"));
      
  }

}
?>
