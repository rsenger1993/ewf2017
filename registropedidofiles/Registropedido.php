<?php

class Registropedido
{
    private $idregistropedido;
    private $fechapedido;
    private $publicacion_id;
    private $r_usuario;
    private $cantidadpedido;
    private $factura_id;


      function __construct($idregistropedido, $fechapedido, $publicacion_id,$r_usuario, $cantidadpedido, $factura_id) {

       $this->idregistropedido = $idregistropedido;
       $this->fechapedido = $fechapedido;
       $this->publicacion_id = $publicacion_id;
       $this->r_usuario = $r_usuario;
       $this->cantidadpedido = $cantidadpedido;
       $this->factura_id = $factura_id;

     }
    
     function setIdRegistroPedido($idregistropedido){
       $this->idregistropedido = $idregistropedido;
     } 
     function getIdRegistroPedido(){
       return $this->idregistropedido;
     } 
     function setFechaPedido($fechapedido){
       $this->fechapedido = $fechapedido;
     } 
     function getFechaPedido(){
       return $this->fechapedido;
     }
      function setPublicacionId($publicacion_id){
       $this->publicacion_id = $publicacion_id;
     } 
     function getPublicacionId(){
       return $this->publicacion_id;
     }
     function setRUsuario($r_usuario){
       $this->r_usuario = $r_usuario;
     } 
     function getRUsuario(){
       return $this->r_usuario;
     }
     function setCantidadPedido($cantidadpedido){
       $this->cantidadpedido = $cantidadpedido;
     } 
     function getCantidadPedido(){
       return $this->cantidadpedido;
     }
     function setFacturaId($factura_id){
       $this->factura_id = $factura_id;
     } 
     function getFacturaId(){
       return $this->factura_id;
     }
}

?> 