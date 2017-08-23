<?php

class Direccion
{
    private $iddireccion;
    private $descripcion;
    

      function __construct($iddireccion, $descripcion) {
       $this->iddireccion = $iddireccion;
       $this->descripcion = $descripcion;

     }
    
     function setIdDireccion($iddireccion){
       $this->iddireccion = $iddireccion;
     } 
     function getIdDireccion(){
       return $this->iddireccion;
     } 
     function setDescripcion($descripcion){
       $this->descripcion = $descripcion;
     } 
     function getDescripcion(){
       return $this->descripcion;
     }

}

?> 