 <?php
 session_start();
 $nombrecompleto= $_POST["nombrecompleto"];
 $nombreusuario= $_POST["nombreusuario"];
 $clave= $_POST["clave"];
 $correo= $_POST["correo"];
 $edad= $_POST["edad"];
 $telefono= $_POST["telefono"];
 $direccion= $_POST["direccion"];
 $descripcion= $_POST["descripcion"];

 include_once("../personafiles/PersonaCollector.php");
 include_once("UsuarioCollector.php");
 include_once("../direccionfiles/DireccionCollector.php");
 include_once("../personafiles/Persona.php");
 include_once("Usuario.php");
 include_once("../direccionfiles/Direccion.php");
 $PersonaCollectorObj = new PersonaCollector();
 $UsuarioCollectorObj = new UsuarioCollector();
 $DireccionCollectorObj = new DireccionCollector();
 $arrayUsuario = $UsuarioCollectorObj->countUsuarioByName($nombreusuario);
 $arrayCorreo = $PersonaCollectorObj->countPersonaByMail($correo);

//print_r($ObjDemo);
print(count($arrayUsuario));
//print($arrayUsuario);
 echo "</br>";
print(count($arrayCorreo));
 echo "</br>";

	if (count($arrayUsuario)>0){
		  echo "ese usuario ya existe";
	}
	elseif (count($arrayCorreo)>0) {
		 echo "ese correo ya existe";
	}
	 else{
	 	 echo "valor";
	 	 $dirId = $DireccionCollectorObj->insertarDireccion($direccion); //INSERTO DIRECCION
	 	 $perId = $PersonaCollectorObj->insertarPersona($nombrecompleto,$correo,$edad,$telefono,$dirId["id"]); //INSERTO PERSONA
	 	 $UsuarioCollectorObj->insertarUsuario($nombreusuario,$clave,$descripcion,$perId["id"]); //INSERTO USUARIO
	 	 echo "Usuario: ".$nombreusuario." creado correctamente</br>";
	 	 //$ObjPersona = $PersonaCollectorObj->showPersonaByMail($correo);
	 	 //print_r("mostrando id de persona: ".$ObjPersona->getIdPersona());
	 	 //echo "ultimo id de persona: ".$perId["id"];
	 	 //echo "</br>";
	 	 //echo "ultimo id de drireccion: ".$dirId["id"];
	 	 //echo "</br>";
	 	 //print_r($perId);
	 	 //echo "</br>";

	 
	}

?>
<a href="../pages/registrarse.php">Volver</a>