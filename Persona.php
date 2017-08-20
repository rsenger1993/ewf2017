<?php

class Persona
{
    private $idpersona;
    private $nombrecompleto;
    private $correo;
    private $edad;
    private $telefono;
    
     //function __construct($idpersona, $nombrecompleto) {
       //$this->idpersona = $idpersona;
       //$this->nombrecompleto = $nombrecompleto;
    // }

      function __construct($idpersona, $nombrecompleto, $correo, $edad, $telefono) {
       $this->idpersona = $idpersona;
       $this->nombrecompleto = $nombrecompleto;
       $this->correo = $correo;
       $this->edad = $edad;
       $this->telefono = $telefono;

     }
    
     function setId($idpersona){
       $this->idpersona = $idpersona;
     } 
     function getId(){
       return $this->idpersona;
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