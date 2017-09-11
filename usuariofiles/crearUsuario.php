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
  ?>

<!DOCTYPE html>
<html>
<head>
<title>EWF | Creacion de Usuario</title>
<!-- jQuery-->
<script src="../js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="../css/style-index2.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kappe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
<!--//fonts-->
</head>
<body>
		<header id="index-header">
			<input type="checkbox" id ="btn-menu">
			<label for="btn-menu"> <img src="../images/menu.png" alt="menu"></label>
			<nav class="menu">


 <?php

    if ($nombrecompleto=="" or $nombreusuario=="" or $clave=="" or  $correo=="" or $edad=="" or $telefono=="" or $direccion=="" or $descripcion=="" or $urlimg=="")
	{
		?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Porfavor llene todos los campos</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/registrarse.php" class="button">Volver</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php

	}
	elseif (count($arrayUsuario)>0){
		 ?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Ese usuario ya existe</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/registrarse.php" class="button">Volver</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
	}
	elseif (count($arrayCorreo)>0) {
		?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Ese correo ya existe</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/registrarse.php" class="button">Volver</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
	}
	elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
		?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
               	<h3> <?php echo "Esta dirección de correo: ".$correo."es invalida";?> </h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/registrarse.php" class="button">Volver</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
	}
	elseif (!is_numeric($edad)) {
			?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Ingresa solo numeros en el campo edad</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/registrarse.php" class="button">Volver</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
	}
	elseif (!is_numeric($telefono)) {
		?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Ingresa un numero de telefono valido</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/registrarse.php" class="button">Volver</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
	}
	elseif (strlen($telefono) != 8) {
		?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>El numero de telefono debe tener 8 digitos sin contar el 0</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/registrarse.php" class="button">Volver</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
	}
	elseif ($urlimg['imagen']['name']==""){
			?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Porfavor selecciona una imagen para el Usuario</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/registrarse.php" class="button">Volver</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
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
	 	 $dirId = $DireccionCollectorObj->insertarDireccion($direccion); //INSERTO DIRECCION
	 	 $perId = $PersonaCollectorObj->insertarPersona($nombrecompleto,$correo,$edad,$telefono,$dirId["iddireccion"]); //INSERTO PERSONA
	 	 $UsuarioCollectorObj->insertarUsuario($nombreusuario,$clave,$descripcion,$perId["idpersona"],$rutabase); //INSERTO USUARIO
	 	  ?>
 						<ul>
					<li> <a >Creacion Exitosa</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
               	<?php
               	 echo "<h3> Usuario: ".$nombreusuario." creado correctamente </h3>";
               	?>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../index.php" class="button">Logearse</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
 		 } 
 		 else{
 		 ?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Solo se permiten imagenes jpg, jpeg, png y con un peso menor a 200kb</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/registrarse.php" class="button">Volver</a>
					</center>
					</br>				     
				</div>
				<div id="espacio"></div>
				</div>

				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
 		     }
 		 
		}
?>