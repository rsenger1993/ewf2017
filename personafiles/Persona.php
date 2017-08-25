<?php
include_once('../direccionfiles/Direccion.php');

class Persona extends Direccion
{
    private $idpersona;
    private $nombrecompleto;
    private $correo;
    private $edad;
    private $telefono;
    private $direccion_id;


      function __construct($idpersona, $nombrecompleto, $correo, $edad, $telefono, $direccion_id, $direccion_descripcion) {

      parent::__construct($direccion_id, $direccion_descripcion);

       $this->idpersona = $idpersona;
       $this->nombrecompleto = $nombrecompleto;
       $this->correo = $correo;
       $this->edad = $edad;
       $this->telefono = $telefono;
       $this->direccion_id = $direccion_id;

     }
    
     function setIdPersona($idpersona){
       $this->idpersona = $idpersona;
     } 
     function getIdPersona(){
       return $this->idpersona;
     } 
     function setNombreCompleto($nombrecompleto){
       $this->nombrecompleto = $nombrecompleto;
     } 
     function getNombreCompleto(){
       return $this->nombrecompleto;
     }
      function setCorreo($nombrecompleto){
       $this->correo = $correo;
     } 
     function getCorreo(){
       return $this->correo;
     }

     function setEdad($edad){
       $this->edad = $edad;
     } 
     function getEdad(){
       return $this->edad;
     }
     function setTelefono($telefono){
       $this->telefono = $telefono;
     } 
     function getTelefono(){
       return $this->telefono;
     }
     function setIdDireccion($direccion_id){
       $this->direccion_id = $direccion_id;
     } 
     function getDireccion(){
       return $this->direccion_id;
     }
}

?> 