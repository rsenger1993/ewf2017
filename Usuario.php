<?php

include_once 'Persona.php';

class Usuario extends Persona
{
    private $idusuario;
    private $nombreusuario;
    private $clave;
    private $descripcion;
    //private $persona_id;
    

      function __construct($idpersona, $nombrecompleto, $correo, $edad, $telefono, $idusuario, $nombreusuario, $clave, $descripcion) {

       parent::__construct($idpersona, $nombrecompleto, $correo, $edad, $telefono);

       $this->idusuario = $idusuario;
       $this->nombreusuario = $nombreusuario;
       $this->clave = $clave;
       $this->descripcion = $descripcion;
       //$this->persona_id = $persona_id;

     }
    
     function setId($idusuario){
       $this->idusuario = $idusuario;
     } 
     function getId(){
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
     //function setPersonaId($persona_id){
      // $this->persona_id = $persona_id;
     //} 
     //function getPersonaId(){
     //  return $this->persona_id;
    // }
}

?> 