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
    
     function setIdAmigo($idamigo){
       $this->idamigo = $idamigo;
     } 
     function getIdAmigo(){
       return $this->idamigo;
     }
     function setUsuarioId($usuario_id){
       $this->a_usuario = $usuario_id;
     } 
     function getUSuarioId(){
       return $this->usuario_id;
     } 
     function setAUsuario($a_usuario){
       $this->a_usuario = $a_usuario;
     } 

     function getAusuario(){
       return $this->a_usuario;
     } 
}

?> 
