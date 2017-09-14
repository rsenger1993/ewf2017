<?php

class RegistroVenta
{
    private $idregistroventa;
    private $fechaventa;
    private $publicacion_id;
    private $v_usuario;
    private $c_usuario;
    private $cantidadventa;


      function __construct($idregistroventa, $fechaventa, $publicacion_id,$v_usuario,$c_usuario, $cantidadventa) {

       $this->idregistroventa = $idregistroventa;
       $this->fechaventa = $fechaventa;
       $this->publicacion_id = $publicacion_id;
       $this->v_usuario = $v_usuario;
       $this->c_usuario = $c_usuario;
       $this->cantidadventa = $cantidadventa;

     }
    
     function setIdRegistroVenta($idregistroventa){
       $this->idregistroventa = $idregistroventa;
     } 
     function getIdRegistroVenta(){
       return $this->idregistroventa;
     } 
     function setFechaVenta($fechaventa){
       $this->fechaventa = $fechaventa;
     } 
     function getFechaVenta(){
       return $this->fechaventa;
     }
      function setPublicacionId($publicacion_id){
       $this->publicacion_id = $publicacion_id;
     } 
     function getPublicacionId(){
       return $this->publicacion_id;
     }
     function setVUsuario($v_usuario){
       $this->v_usuario = $v_usuario;
     } 
     function getVUsuario(){
       return $this->v_usuario;
     }
     function setCUsuario($c_usuario){
       $this->c_usuario = $c_usuario;
     } 
     function getCUsuario(){
       return $this->c_usuario;
     }
     function setCantidadVenta($cantidadventa){
       $this->cantidadventa = $cantidadventa;
     } 
     function getCantidadVenta(){
       return $this->cantidadventa;
     }
}

?> 