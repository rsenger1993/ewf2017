<?php

class Persona
{
    private $idPersona;
    private $nombrecompleto;
    private $correo;
    private $edad;
    private $telefono;
    


      function __construct($idPersona, $nombrecompleto, $correo, $edad, $telefono) {
       $this->idPersona = $idPersona;
       $this->nombrecompleto = $nombrecompleto;
       $this->correo = $correo;
       $this->edad = $edad;
       $this->telefono = $telefono;

     }
    
     function setIdPersona($idPersona){
       $this->idPersona = $idPersona;
     } 
     function getIdPersona(){
       return $this->idPersona;
     } 
     function setNombreCompleto($nombrecompleto){
       $this->nombrecompleto = $nombrecompleto;
     } 
     function getNombreCompleto(){
       return $this->nombrecompleto;
     }
     function setCorreo($correo){
       $this->correo = $correo;
     } 
     function getCorreo(){
       return $correo->correo;
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
}

?> 