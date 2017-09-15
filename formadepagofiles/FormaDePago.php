<?php

class FormaDePago
{
    private $idformadepago;
    private $formadepagodescripcion;
    

      function __construct($idformadepago, $formadepagodescripcion) {
       $this->idformadepago = $idformadepago;
       $this->formadepagodescripcion = $formadepagodescripcion;

     }
    
     function setIdFormaDePago($idformadepago){
       $this->idformadepago = $idformadepago;
     } 
     function getIdFormaDePago(){
       return $this->idformadepago;
     } 
     function setFormaDePagoDescripcion($formadepagodescripcion){
       $this->formadepagodescripcion = $formadepagodescripcion;
     } 
     function getFormaDePagoDescripcion(){
       return $this->formadepagodescripcion;
     }

}

?> 