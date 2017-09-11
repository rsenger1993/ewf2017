 <?php
 session_start();
 $idpublicacion= $_POST["idpublicacion"];
 $nombreplatillo= $_POST["nombreplatillo"];
 $categoria= $_POST["categoria"];
 $platillodescripcion= $_POST["platillodescripcion"];
 $cantidad= $_POST["cantidad"];
 $precio= $_POST["precio"];
 $formadepago= $_POST["formadepago"];
 $fecha = getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
 $urlimg= $_FILES;
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../publicacionfiles/PublicacionCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
include_once("../categoriafiles/CategoriaCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();
$CategoriaCollectorObj = new CategoriaCollector();
$publicacion = $PublicacionCollectorObj->showPublicacionById($idpublicacion); //OBTENGO DATOS DE LA PUBLICACION
$platillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());//OBTENGO DATOS DEL PLATILLO
$categoria = $CategoriaCollectorObj->showCategoriaByName($categoria);//OBTENGO EL ID DE LA CATEGORIA
$us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);
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
    if ($nombreplatillo=="" or $categoria=="" or $platillodescripcion=="" or $cantidad=="" or $precio=="" or $formadepago=="" or $urlimg=="")
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
					<?php echo "<a class='button' href='../pages/formularioPublicacionEditar.php?idpublicacion=".$idpublicacion."'>Volver </a>"; ?>
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
	elseif (!is_numeric($precio)) 
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
				<h3>Ingresa solo numeros en el campo precio</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<?php echo "<a class='button' href='../pages/formularioPublicacionEditar.php?idpublicacion=".$idpublicacion."'>Volver </a>"; ?>
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
		$PlatilloCollectorObj->updatePlatilloNoImg($publicacion->getPlatilloId(),$nombreplatillo,$platillodescripcion,$cantidad,$precio,$categoria->getIdCategoria());
		$PublicacionCollectorObj->UpdatePUblicacion($publicacion->getIdPublicacion(), $fecha);
?>
 						<ul>
					<li> <a >Actualizacion exitosa</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Su Publicacion ha sido editada</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/mispublicaciones.php" class="button">Mis publicaciones</a>
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
 		 //SI TODO ESTA CORRECTO PASAMOS A ACTUALIZAR LA PUBLICACION
		//GUARDAR IMAGEN EN LA RUTA ESTABLECIDA  "imgperfil/"
		$ruta1= '../imgpublicacion/'.$us->getNombreUsuario().'-'.$urlimg['imagen']['name'];
		move_uploaded_file($urlimg['imagen']['tmp_name'],$ruta1);
		//RUTA QUE SE GUARDARA EN LA BASE
		$rutabase = 'imgpublicacion/'.$us->getNombreUsuario().'-'.$urlimg['imagen']['name'];
		$PlatilloCollectorObj->updatePlatilloWithImg($publicacion->getPlatilloId(),$nombreplatillo,$platillodescripcion,$cantidad,$precio,$categoria->getIdCategoria(),$rutabase);
		$PublicacionCollectorObj->UpdatePUblicacion($publicacion->getIdPublicacion(), $fecha);

?>
 						<ul>
					<li> <a >Actualizacion exitosa</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
               	 <h3>Su Publicacion ha sido editada</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/mispublicaciones.php" class="button">Mis publicaciones</a>
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
					<?php echo "<a class='button' href='../pages/formularioPublicacionEditar.php?idpublicacion=".$idpublicacion."'>Volver </a>"; ?>
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