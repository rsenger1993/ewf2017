 <?php
 session_start();
 $nombrecompleto= $_POST["nombrecompleto"];
 $clave= $_POST["clave"];
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
 $ObjUsuario = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);
 ?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Creacion de Usuario</title>
<script src="../js/jquery.min.js"></script>
<link href="../css/style-index2.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kappe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
		<header id="index-header">
			<input type="checkbox" id ="btn-menu">
			<label for="btn-menu"> <img src="../images/menu.png" alt="menu"></label>
			<nav class="menu">
 <?php
    if ($nombrecompleto=="" or $clave=="" or $edad=="" or $telefono=="" or $direccion=="" or $descripcion=="" or $urlimg=="")
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
					<a href="../pages/formularioeditarusuario.php" class="button">Volver</a>
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
	elseif (!is_numeric($edad)) 
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
				<h3>Ingresa solo numeros en el campo edad</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/formularioeditarusuario.php" class="button">Volver</a>
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
	elseif (!is_numeric($telefono))
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
				<h3>Ingresa un numero de telefono valido</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/formularioeditarusuario.php" class="button">Volver</a>
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
	elseif (strlen($telefono) != 8) 
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
				<h3>El numero de telefono debe tener 8 digitos sin contar el 0</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/formularioeditarusuario.php" class="button">Volver</a>
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
	elseif ($urlimg['imagen']['name']=="")
	{
		 //SI TODO ESTA CORRECTO PASAMOS A ACTUALIZAR EL USUARIO
		$DireccionCollectorObj->updateDireccion($ObjUsuario->getIdDireccion(), $direccion); //ACTUALIZO DIRECCION
	 	$PersonaCollectorObj->updatePersona($ObjUsuario->getIdPersona(),$nombrecompleto,$edad,$telefono); //ACTUALIZO PERSONA
	 	$UsuarioCollectorObj->updateUsuarioNoImg($ObjUsuario->getNombreUsuario(),$clave,$descripcion); //ACTUALIZO USUARIO
?>
 						<ul>
					<li> <a >Actualizacion exitosa</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Sus datos han sido actualizados</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/miperfil.php" class="button">Mi perfil</a>
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
 		 //SI TODO ESTA CORRECTO PASAMOS A ACTUALIZAR EL USUARIO
		//GUARDAR IMAGEN EN LA RUTA ESTABLECIDA  "imgperfil/"
		$ruta1= '../imgperfil/'.$ObjUsuario->getNombreUsuario().'-'.$urlimg['imagen']['name'];
		move_uploaded_file($urlimg['imagen']['tmp_name'],$ruta1);
		//RUTA QUE SE GUARDARA EN LA BASE
		$rutabase= 'imgperfil/'.$ObjUsuario->getNombreUsuario().'-'.$urlimg['imagen']['name'];
	 	$DireccionCollectorObj->updateDireccion($ObjUsuario->getIdDireccion(), $direccion); //ACTUALIZO DIRECCION
	 	$PersonaCollectorObj->updatePersona($ObjUsuario->getIdPersona(),$nombrecompleto,$edad,$telefono); //ACTUALIZO PERSONA
	 	$UsuarioCollectorObj->updateUsuario($ObjUsuario->getNombreUsuario(),$clave,$descripcion,$rutabase); //ACTUALIZO USUARIO
?>
 						<ul>
					<li> <a >Actualizacion exitosa</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
               	 <h3>Sus datos han sido actualizados</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/miperfil.php" class="button">Mi perfil</a>
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
 		 else
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
				<h3>Solo se permiten imagenes jpg, png y con un peso menor a 200kb</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/formularioeditarusuario.php" class="button">Volver</a>
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