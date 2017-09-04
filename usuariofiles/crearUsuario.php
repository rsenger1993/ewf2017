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
 $urlimg= $_FILES;

 include_once("../personafiles/PersonaCollector.php");
 include_once("UsuarioCollector.php");
 include_once("../direccionfiles/DireccionCollector.php");

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
	elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo "Esta dirección de correo ($correo) es invalida ";
	}
	elseif (!is_numeric($edad)) { 
	echo "Ingresa solo numeros en el campo edad";
	}
	elseif (!is_numeric($telefono)) { 
	echo "Ingresa un numero de telefono valido";
	}
	elseif (strlen($telefono) != 8) { 
	echo "El numero de telefono debe tener 8 digitos sin contar el 0";
	}
	elseif ($urlimg['imagen']['name']=="")
 	{
 	echo "Porfavor selecciona una imagen para el platillo </br>";
 	}
 	 
	else{

		 if((($urlimg["imagen"]["type"] == "image/png") || ($urlimg["imagen"]["type"] == "image/jpg") || ($urlimg["imagen"]["type"] == "image/jpeg")) && ($urlimg["imagen"]["size"] < 200000))
 		 {
 		 		
 		 //SI TODO ESTA CORRECTO PASAMOS A CREAR EL USUARIO
		
		//GUARDAR IMAGEN EN LA RUTA ESTABLECIDA  "imgperfil/"
		 $ruta1= '../imgperfil/'.$nombreusuario.'-'.$urlimg['imagen']['name'];
		 move_uploaded_file($urlimg['imagen']['tmp_name'],$ruta1);

		//RUTA QUE SE GUARDARA EN LA BASE
		 $rutabase= 'imgperfil/'.$nombreusuario.'-'.$urlimg['imagen']['name'];

	 	 echo "</br>";
	 	 $dirId = $DireccionCollectorObj->insertarDireccion($direccion); //INSERTO DIRECCION
	 	 print_r($dirId["iddireccion"]);
	 	 $perId = $PersonaCollectorObj->insertarPersona($nombrecompleto,$correo,$edad,$telefono,$dirId["iddireccion"]); //INSERTO PERSONA
	 	 $UsuarioCollectorObj->insertarUsuario($nombreusuario,$clave,$descripcion,$perId["idpersona"],$rutabase); //INSERTO USUARIO
	 	 echo "Usuario: ".$nombreusuario." creado correctamente</br>";

 		 } 
 		 else{
			echo "Solo se permiten imagenes jpg, png y con un peso menor a 200kb </br>";
 		     }
 		 
		}
?>
</br>
<a href="../pages/index.php">Logearse</a>