<?php

class Favorito
{
    private $idfavorito;
    private $f_usuario;
    private $publicacion_id;

    
        
      function __construct($idfavorito, $f_usuario, $publicacion_id){

       $this->idfavorito = $idfavorito;   
       $this->f_usuario = $f_usuario;
       $this->publicacion_id = $publicacion_id;


     }
    
     function setIdFavorito($idfavorito){
       $this->idfavorito = $idfavorito;
     } 
     function getIdFavorito(){
       return $this->idfavorito;
     }
     function setPublicacionId($publicacion_id){
       $this->publicacion_id = $publicacion_id;
     } 
     function getPublicacionId(){
       return $this->publicacion_id;
     } 
     function setFUsuario($f_usuario){
       $this->f_usuario = $f_usuario;
     } 

     function getFUSuario(){
       return $this->f_usuario;
     } 
}

?> 
