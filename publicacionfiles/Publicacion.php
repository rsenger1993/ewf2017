<?php

class Publicacion
{
    private $idpublicacion;
    private $fechapublicacion;
    private $estado;
    private $usuario_id;
    private $platillo_id;
    private $formadepago_id;


      function __construct($idpublicacion, $fechapublicacion, $estado, $usuario_id, $platillo_id, $formadepago_id) {

      //parent::__construct($direccion_id, $direccion_descripcion);

       $this->idpublicacion = $idpublicacion;
       $this->fechapublicacion = $fechapublicacion;
       $this->estado = $estado;
       $this->usuario_id = $usuario_id;
       $this->platillo_id = $platillo_id;
       $this->formadepago_id = $formadepago_id;

     }
    
     function setIdPublicacion($idpublicacion){
       $this->idpublicacion = $idpublicacion;
     } 
     function getIdPublicacion(){
       return $this->idpublicacion;
     } 
     function setFechaPublicacion($fechapublicacion){
       $this->fechapublicacion = $fechapublicacion;
     } 
     function getFechaPublicacion(){
       return $this->fechapublicacion;
     }
      function setEstado($estado){
       $this->estado = $estado;
     } 
     function getEstado(){
       return $this->estado;
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
     function setFormaDePagoId($formadepago_id){
       $this->formadepago_id = $formadepago_id;
     } 
     function getFormaDePagoId(){
       return $this->formadepago_id;
     }
}

?> 