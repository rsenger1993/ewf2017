<?php

include_once('../usuariofiles/Usuario.php');

class Amigo extends Usuario
{
    private $idamigo;
    private $usuario_id;
    
        
      function __construct($idamigo, $usuario_id, $nombreusuario, $clave, $descripcion, $persona_id, $nombrecompleto, $correo, $edad, $telefono, $direccion_id, $direccion_descripcion);
        parent::__construct($usuario_id, $nombreusuario, $clave, $descripcion, $persona_id, $nombrecompleto, $correo, $edad, $telefono, $direccion_id, $direccion_descripcion );

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
