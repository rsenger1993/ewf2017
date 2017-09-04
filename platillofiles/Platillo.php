<?php
include_once('../categoriafiles/Categoria.php');

class Platillo extends Categoria
{
    private $idplatillo;
    private $nombreplatillo;
    private $platillodescripcion;
    private $cantidad;
    private $precio;
    private $imgplatillo;
    private $categoria_id;


      function __construct($idplatillo, $nombreplatillo, $platillodescripcion, $cantidad, $precio, $imgplatillo, $categoria_id, $cataegoriadescripcion) {

      parent::__construct($categoria_id, $cataegoriadescripcion);

       $this->idplatillo = $idplatillo;
       $this->nombreplatillo = $nombreplatillo;
       $this->platillodescripcion = $platillodescripcion;
       $this->cantidad = $cantidad;
       $this->precio = $precio;
       $this->imgplatillo = $imgplatillo;
       $this->categoria_id = $categoria_id;

     }
    
     function setIdPlatillo($idplatillo){
       $this->idplatillo = $idplatillo;
     } 
     function getIdPlatillo(){
       return $this->idplatillo;
     } 
     function setNombrePlatillo($nombreplatillo){
       $this->nombreplatillo = $nombreplatillo;
     } 
     function getNombrePlatillo(){
       return $this->nombreplatillo;
     }
     function setPlatilloDescripcion($platillodescripcion){
       $this->platillodescripcion = $platillodescripcion;
     } 
     function getPlatilloDescripcion(){
       return $this->platillodescripcion;
     }

      function setCantidad($cantidad){
       $this->correo = $cantidad;
     } 
     function getCantidad(){
       return $this->cantidad;
     }

     function setPrecio($precio){
       $this->precio = $precio;
     } 
     function getPrecio(){
       return $this->precio;
     }
     function setImgPlatillo($imgplatillo){
       $this->imgplatillo = $imgplatillo;
     } 
     function getImgPlatillo(){
       return $this->imgplatillo;
     }
     function setCategoriaId($categoria_id){
       $this->categoria_id = $categoria_id;
     } 
     function getCategoriaId(){
       return $this->categoria_id;
     }
}

?> 