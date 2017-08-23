<?php

//include_once('../personafiles/Persona.php');

class Usuario
{
    private $idusuario;
    private $nombreusuario;
    private $clave;
    private $descripcion;
    private $persona_id;
    

      function __construct($idusuario, $nombreusuario, $clave, $descripcion,$persona_id) {

       //parent::__construct($idpersona, $nombrecompleto, $correo, $edad, $telefono);

       $this->idusuario = $idusuario;
       $this->nombreusuario = $nombreusuario;
       $this->clave = $clave;
       $this->descripcion = $descripcion;
       $this->persona_id = $persona_id;

     }
    
     function setIdUsuario($idusuario){
       $this->idusuario = $idusuario;
     } 
     function getIdUsuario(){
       return $this->idusuario;
     } 
     function setNombreUsuario($nombreusuario){
       $this->nombreusuario = $nombreusuario;
     } 
     function getNombreUsuario(){
       return $this->nombreusuario;
     }
     function setClave($clave){
       $this->clave = $clave;
     } 
     function getClave(){
       return $clave->clave;
     } 
     function setDescripcion($descripcion){
       $this->descripcion = $descripcion;
     } 
     function getDescripcion(){
       return $this->descripcion;
     }
     function setPersonaId($persona_id){
       $this->persona_id = $persona_id;
     } 
     function getPersonaId(){
       return $this->persona_id;
     }
}

?> 