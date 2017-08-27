<?php

class categoria
{
    private $idcategoria;
    private $nombrecategoria;
    private $descripcion;
    
     function __construct($idcategoria, $nombrecategoria, $descripcion) {
       $this->idcategoria = $idcategoria;
       $this->nombrecategoria = $nombrecategoria;
       $this->descripcion = $descripcion;      
     }
    
     function setId($idcategoria){
       $this->idcategoria = $iddireccion;
     } 
     function getId(){
       return $this->idcategoria;
     } 

     function setNombreCategoria($nombrecategoria){
       $this->nombrecategoria = $nombrecategoria;
     } 
     function getNombreCategoria(){
       return $this->nombrecategoria;
     }

     function setDescripcion($descripcion){
       $this->descripcion = $descripcion;
     } 
     function getDescripcion(){
       return $descripcion->descripcion;
     } 
     
}
?>
