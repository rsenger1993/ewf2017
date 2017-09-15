<?php

class Categoria
{
    private $idcategoria;
    private $categoriadescripcion;
    
     function __construct($idcategoria, $categoriadescripcion) {
       $this->idcategoria = $idcategoria;
       $this->categoriadescripcion = $categoriadescripcion;      
     }
    
     function setIdCategoria($idcategoria){
       $this->idcategoria = $idcategoria;
     } 
     function getIdCategoria(){
       return $this->idcategoria;
     } 
     
     function setCategoriaDescripcion($categoriadescripcion){
       $this->categoriadescripcion = $categoriadescripcion;
     } 
     function getCategoriaDescripcion(){
        return $this->categoriadescripcion;
     } 
     
}
?>
