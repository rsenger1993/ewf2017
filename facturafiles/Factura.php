<?php

class Factura
{
    private $idfactura;
    private $fechafactura;
    private $valorunitario;
    private $total;
    private $formadepago_id;
    private $usuario_id;
    private $platillo_id;
    private $cantidadpedido;


      function __construct($idfactura, $fechafactura, $valorunitario, $total, $formadepago_id, $usuario_id, $platillo_id, $cantidadpedido) {

      //parent::__construct($direccion_id, $direccion_descripcion);

       $this->idfactura = $idfactura;
       $this->fechafactura = $fechafactura;
       $this->valorunitario = $valorunitario;
       $this->total = $total;
       $this->formadepago_id = $formadepago_id;
       $this->usuario_id = $usuario_id;
       $this->platillo_id = $platillo_id;
       $this->cantidadpedido = $cantidadpedido;

     }
    
     function setIdFactura($idfactura){
       $this->idfactura = $idfactura;
     } 
     function getIdFactura(){
       return $this->idfactura;
     } 
     function setFechaFactura($fechafactura){
       $this->fechafactura = $fechafactura;
     } 
     function getFechaFactura(){
       return $this->fechafactura;
     }
      function setValorUnitario($valorunitario){
       $this->valorunitario = $valorunitario;
     } 
     function getValorUnitario(){
       return $this->valorunitario;
     }

     function setTotal($total){
       $this->total = $total;
     } 
     function getTotal(){
       return $this->total;
     }
     function setFormadDePagoId($formadepago_id){
       $this->formadepago_id = $formadepago_id;
     } 
     function getFormadDePagoId(){
       return $this->formadepago_id;
     }
     function setUsuarioId($usuario_id){
       $this->usuario_id = $usuario_id;
     } 
     function getUsuarioId(){
       return $this->usuario_id;
     }
     function setPlatilloId($platillo_id){
       $this->platillo_id = $platillo_id;
     } 
     function getPlatilloId(){
       return $this->platillo_id;
     }
     function setCantidadPedido($cantidadpedido){
       $this->cantidadpedido = $cantidadpedido;
     } 
     function getCantidadPedido(){
       return $this->cantidadpedido;
     }
}

?> 