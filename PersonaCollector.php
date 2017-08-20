<?php

include_once('Persona.php');
include_once('Collector.php');

class PersonaCollector extends Collector
{
  
  function showPersonas() {
    $rows = self::$db->getRows("SELECT * FROM persona ");        
    //echo "linea 1";
    $arrayPersona= array();        
    foreach ($rows as $c){
      $aux = new Persona($c{'id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'},$c{'direccion'});
      array_push($arrayPersona, $aux);
    }
    return $arrayPersona;        
  }

    function showPersona($idpersona) {
    $row = self::$db->getRows("SELECT * FROM persona WHERE id= ?",array("{$idpersona}"));
    $ObjPersona= new Usuario($row[0]{'id'}, $row[0]{'nombrecompleto'}, $row[0]{'correo'}, $row[0]{'edad'}, $row[0]{'telefono'}, $row[0]{'direccion'});

    return $ObjPersona;        
  }

    function showPersonaByMail($correo) {
    $row = self::$db->getRows("SELECT * FROM persona WHERE correo= ?",array("{$correo}"));
   $arrayUPersona= array();        
    foreach ($row as $c){
      $aux = new Persona($c{'id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'});
      //array_push($arrayUPersona, $aux);
    }
    return $aux;        
  }
     function countPersonaByMail($correo) {
    $row = self::$db->getRows("SELECT * FROM persona WHERE correo= ?",array("{$correo}"));
   $arrayUPersona= array();        
    foreach ($row as $c){
      $aux = new Persona($c{'id'},$c{'nombrecompleto'},$c{'correo'},$c{'edad'},$c{'telefono'});
      array_push($arrayUPersona, $aux);
    }
    return $aux;        
  }

      function updatePersona($idpersona,$nombrecompleto,$correo,$edad,$telefono,$direccion) {
    $insertrow = self::$db->updateRow("UPDATE public.persona SET nombrecompleto = ? , correo = ? , edad = ? , telefono = ? , direccion = ? WHERE id = ?", array("{$nombrecompleto}", "{$correo}", "{$edad}", "{$telefono}", "{$descripcion}",$idpersona));  
      
  }

      function deletePersona($idpersona) {
    $insertrow = self::$db->deleteRow("DELETE FROM public.persona WHERE id=?",array("{$idpersona}"));
      
  }

      function insertarPersona($nombrecompleto,$correo,$edad,$telefono) {
    $insertrow = self::$db->insertRow("INSERT INTO Persona (nombrecompleto, correo, edad, telefono) VALUES (?,?,?,?)",array("{$nombrecompleto}","{$correo}", "{$edad}", "{$telefono}"));
      
  }

}
?>
