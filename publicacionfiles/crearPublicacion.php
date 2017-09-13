 <?php
 session_start();
 ?>
 <?php
 include_once("../usuariofiles/UsuarioCollector.php");
 include_once("../platillofiles/PlatilloCollector.php");
 include_once("../categoriafiles/CategoriaCollector.php");
 include_once("../formadepagofiles/FormaDePagoCollector.php");
 include_once("PublicacionCollector.php");
 $UsuarioCollectorObj = new UsuarioCollector();
 $us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);

 $nombreplatillo= $_POST["nombreplatillo"];
 $categoria= $_POST["categoria"];
 $cantidad= $_POST["cantidad"];
 $precio= $_POST["precio"];
 $platillodescripcion= $_POST["platillodescripcion"];
 $urlimg= $_FILES;
 $fecha = getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
 $estado="disponible";
 $formadepago= $_POST["formadepago"];

 $PublicacionCollectorObj = new PublicacionCollector();
 $UsuarioCollectorObj = new UsuarioCollector();
 $CategoriaCollectorObj = new CategoriaCollector();
 $PlatilloCollectorObj = new PlatilloCollector();
 $FormaDePagoCollectorObj = new FormaDePagoCollector();
 ?>

<!DOCTYPE html>
<html>
<head>
<title>EWF | Creacion de Publicacion</title>
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

 if ($nombreplatillo=="" or $categoria=="" or $cantidad=="" or  $precio=="" or $platillodescripcion=="" or $fecha=="" or $formadepago=="")
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
				<h3> Porfavor llenar todos los campos </h3>
				<div id="centrar-boton">
					<a href="../pages/nuevapublicacion.php" class="button">Volver</a>			     
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
 	 	 ?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3> Porfavor selecciona una imagen para el platillo </h3>
				<div id="centrar-boton">
					<a href="../pages/nuevapublicacion.php" class="button">Volver</a>			     
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
				<h3> Porfavor Ingresa un valor correcto para el precio </h3>
				<h3> Ejemplo: 1 o 1.50 </h3>
				<div id="centrar-boton">
					<a href="../pages/nuevapublicacion.php" class="button">Volver</a>			     
				</div>
				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 		<?php
 }

else {
		//VALIDAR SUBIR SOLO IMAGENES PNG Y JPG QUE SEAN MENORES A 200KB
	 if((($urlimg["imagen"]["type"] == "image/png") || ($urlimg["imagen"]["type"] == "image/jpg") || ($urlimg["imagen"]["type"] == "image/jpeg")) && ($urlimg["imagen"]["size"] < 200000))
 		{
	      //echo "Datos correctos";
 				//GUARDAR IMAGEN EN LA RUTA ESTABLECIDA  "imgperfil/"
		$ruta1= '../imgpublicacion/'.$us->getNombreUsuario().'-'.$urlimg['imagen']['name'];
		move_uploaded_file($urlimg['imagen']['tmp_name'],$ruta1);

		//RUTA QUE SE GUARDARA EN LA BASE
		$rutabase = 'imgpublicacion/'.$us->getNombreUsuario().'-'.$urlimg['imagen']['name'];

 		$aObjFormaDePago= $FormaDePagoCollectorObj->showFormaDePagobyName($formadepago); //BUSCO LA FORMA DE PAGO QUE SE HA SELECCIONADO
 		$aObjCategoria = $CategoriaCollectorObj->showCategoriaByName($categoria); //BUSCO LA CATEGORIA QUE SE HA SELECCIONADO

 		$PlaId =$PlatilloCollectorObj->insertarPlatillo($nombreplatillo,$platillodescripcion,$cantidad,$precio,$rutabase,$aObjCategoria->getIdCategoria());
 		$PublicacionCollectorObj->insertarPublicacion($fecha,$estado, $us->getIdUsuario(), $PlaId["idplatillo"],$aObjFormaDePago->getIdFormaDePago());
 		?>
				<ul>
					<li> <a >Publicacion Con Exito</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3> Publicacion creada correctamente </h3>
				<div id="centrar-boton">
					<a href="../pages/muro.php" class="button">Continuar</a>			     
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
				<h3> Solo se permiten imagenes jpg, png y con un peso menor a 200kb </h3>
				<div id="centrar-boton">
					<a href="../pages/nuevapublicacion.php" class="button">Volver</a>
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




