<?php

class Amigo
{
    private $idamigo;
    private $a_usuario;
    private $usuario_id;

    
        
      function __construct($idamigo, $a_usuario, $usuario_id){

       $this->idamigo = $idamigo;   
       $this->a_usuario = $a_usuario;
       $this->usuario_id = $usuario_id;


     }
    
     function setId($idamigo){
       $this->idamigo = $idamigo;
     } 
     function getId(){
       return $this->idamigo;
     }
     function setUsuarioId($usuario_id){
       $this->a_usuario = $usuario_id;
     } 
     function getUSuarioId(){
       return $this->usuario_id;
     } 
     function setUsuarioAmigo($a_usuario){
       $this->a_usuario = $a_usuario;
     } 

     function getUSuarioAmigo(){
       return $this->a_usuario;
     } 
}

?> 
