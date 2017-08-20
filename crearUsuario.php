 <?php
 session_start();
 $nombrecompleto= $_POST["nombrecompleto"];
 $nombreusuario= $_POST["nombreusuario"];
 $clave= $_POST["clave"];
 $correo= $_POST["correo"];
 $edad= $_POST["edad"];
 $telefono= $_POST["telefono"];
 $descripcion= $_POST["descripcion"];


 include_once("UsuarioCollector.php");
  include_once("PersonaCollector.php");
 include_once("Usuario.php");
 $UsuarioCollectorObj = new UsuarioCollector();
 $PersonaCollectorObj = new PersonaCollector();
 $arrayUsuario = $UsuarioCollectorObj->showUsuarioByName($nombreusuario);
 $arrayPersona = $PersonaCollectorObj->countPersonaByMail($correo);
//print_r($ObjDemo);
print(count($arrayUsuario));
print(count($arrayPersona));
 echo "</br>";

	if (count($arrayUsuario)>0){
		  echo "ese usuario ya existe";
	}
	elseif (count($arrayPersona)>0) {
		 echo "ese correo ya existe";
	}
	 else{
	 	 $PersonaCollectorObj->insertarPersona($nombrecompleto,$correo,$edad,$telefono);
	 	 $ObjPersona = $PersonaCollectorObj->showPersonaByMail($correo);
	 	 print_r($ObjPersona->getId());

	 	 $UsuarioCollectorObj->insertarUsuario($nombreusuario,$clave,$descripcion,$ObjPersona->getId());
	 	 
	 	 echo "Usuario: ".$nombreusuario." creado correctamente</br>";
	}

?>
<a href="registrarse.php">Volver</a>