<?php

include_once('Usuario.php');
include_once('../personafiles/Persona.php');
include_once('../collector/Collector.php');

class UsuarioCollector extends Collector
{
  
  function showUsuarios() {
    $rows = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.idpersona)
      INNER JOIN direccion ON (persona.direccion_id = direccion.iddireccion) ");        
    //echo "linea 1";
    $arrayUsuario= array();        
    foreach ($rows as $c){
      $aux = new Usuario($c{'idusuario'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'},$c{'imgusuario'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }

    function showUsuario($idusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario WHERE idusuario= ?",array("{$idusuario}"));
    $ObjUsuario= new Usuario($row[0]{'idusuario'}, $row[0]{'nombreusuario'}, $row[0]{'clave'}, $row[0]{'descripcion'},$row[0]{'persona_id'});

    return $ObjUsuario;        
  }

     function showUsuarioByLogin($nombreusuario, $clave) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.idpersona)
      INNER JOIN direccion ON (persona.direccion_id = direccion.iddireccion) WHERE nombreusuario= ? AND clave= ?",array("{$nombreusuario}","{$clave}"));
   $arrayUsuario= array();        
    foreach ($row as $c){
      $aux = new Usuario($c{'idusuario'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'},$c{'imgusuario'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;      
  }

    function showUsuarioById($idusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.idpersona)
      INNER JOIN direccion ON (persona.direccion_id = direccion.iddireccion) WHERE idusuario= ?",array("{$idusuario}"));
  // $arrayUsuario= array();        
    foreach ($row as $c){
      $aux = new Usuario($c{'idusuario'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'},$c{'imgusuario'});
    }
    return $aux;        
  }


    function countUsuarioByName($nombreusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.idpersona)
      INNER JOIN direccion ON (persona.direccion_id = direccion.iddireccion) WHERE nombreusuario= ?",array("{$nombreusuario}"));
   $arrayUsuario= array();        
    foreach ($row as $c){
      $aux = new Usuario($c{'idusuario'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'},$c{'imgusuario'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }
    function countUsuarioById($idusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.idpersona)
      INNER JOIN direccion ON (persona.direccion_id = direccion.iddireccion) WHERE idusuario= ?",array("{$idusuario}"));
   $arrayUsuario= array();        
    foreach ($row as $c){
      $aux = new Usuario($c{'idusuario'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'},$c{'imgusuario'});
      array_push($arrayUsuario, $aux);
    }
    return $arrayUsuario;        
  }

      function showUsuarioByName($nombreusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.idpersona)
      INNER JOIN direccion ON (persona.direccion_id = direccion.iddireccion) WHERE nombreusuario= ?",array("{$nombreusuario}"));
  // $arrayUsuario= array();        
    foreach ($row as $c){
      $aux = new Usuario($c{'idusuario'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'},$c{'imgusuario'});

    }
    return $aux;        
  }
       function showUsuarioByImg($idusuario) {
    $row = self::$db->getRows("SELECT * FROM usuario INNER JOIN persona ON (usuario.persona_id = persona.idpersona)
      INNER JOIN direccion ON (persona.direccion_id = direccion.iddireccion) WHERE idusuario=?",array("{$idusuario}"));
   //$arrayUsuario= array();

    foreach ($row as $c){
      $aux = new Usuario($c{'idusuario'},$c{'nombreusuario'},$c{'clave'},$c{'usuariodescripcion'},$c{'persona_id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'},$c{'direcciondescripcion'},$c{'imgusuario'});
      //$per = new persona($c{'id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion_id'});
      //array_push($arrayUsuario, $aux);
      //array_push($arrayUsuario, $per);
    }
    return $aux;        
  }

      function updateUsuario($nombreusuario,$clave,$usuariodescripcion,$imgusuario) {
    $insertrow = self::$db->updateRow("UPDATE usuario SET clave = ? , usuariodescripcion = ? , imgusuario = ? WHERE nombreusuario = ?", array("{$clave}", "{$usuariodescripcion}", "{$imgusuario}",$nombreusuario));  
      
  }
      function updateUsuarioNoImg($nombreusuario,$clave,$usuariodescripcion) {
    $insertrow = self::$db->updateRow("UPDATE usuario SET clave = ? , usuariodescripcion = ?  WHERE nombreusuario = ?", array("{$clave}", "{$usuariodescripcion}",$nombreusuario));  
      
  }

      function deleteUsuario($idusuario) {
    $insertrow = self::$db->deleteRow("DELETE FROM usuario WHERE idusuario=?",array("{$idusuario}"));
      
  }

      function insertarUsuario($nombreusuario,$clave,$descripcion,$persona_id,$imgusuario) {
    $insertrow = self::$db->insertRow("INSERT INTO usuario (nombreusuario, clave, usuariodescripcion, persona_id, imgusuario) VALUES (?,?,?,?,?)",array("{$nombreusuario}","{$clave}", "{$descripcion}" ,"{$persona_id}","{$imgusuario}"));
      
  }

}
?>
