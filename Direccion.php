<?php


class direccion
{
    private $iddireccion;
    private $nombredireccion;
    private $descripcion;
    
    
     function __construct($iddireccion, $nombredireccion, $descripcion) {
       $this->iddireccion = $iddireccion;
       $this->nombredireccion = $nombredireccion;
       $this->descripcion = $descripcion;      
     }
    
     function setId($iddireccion){
       $this->iddireccion = $iddireccion;
     } 
     function getId(){
       return $this->iddireccion;
     } 

     function setNombreDireccion($nombredireccion){
       $this->nombredireccion = $nombredireccion;
     } 
     function getNombreDireccion(){
       return $this->nombredireccion;
     }

     function setDescripcion($descripcion){
       $this->descripcion = $descripcion;
     } 
     function getDescripcion(){
       return $descripcion->descripcion;
     } 


}

?> 
