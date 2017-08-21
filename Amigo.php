<?php

//include_once 'Usuario.php';

class Amigo //extends Usuario
{
    private $idamigo;
    
        
      function __construct($idamigo) {

	//parent::__construct($idusuario, $nombreusuario, $clave, $descripcion);

       $this->idamigo = $idamigo;
          
     }
    
     function setId($idamigo){
       $this->idamigo = $idamigo;
     } 
     function getId(){
       return $this->idamigo;
     } 
     
}

?> 
