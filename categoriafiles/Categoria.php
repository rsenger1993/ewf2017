<?php

class categoria
{
    private $idcategoria;
    
    private $categoriadescripcion;
    
     function __construct($idcategoria, $categoriadescripcion) {
       $this->idcategoria = $idcategoria;
       $this->categoriadescripcion = $categoriadescripcion;      
     }
    
     function setId($idcategoria){
       $this->idcategoria = $idcategoria;
     } 
     function getId(){
       return $this->idcategoria;
     } 

     
     function setCategoriadescripcion($categoriadescripcion){
       $this->categoriadescripcion = $categoriadescripcion;
     } 
     function getCategoriadescripcion(){
       return $categoriadescripcion->categoriadescripcion;
     } 
     
}
?>
