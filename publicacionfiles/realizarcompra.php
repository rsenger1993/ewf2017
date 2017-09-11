 <?php
 session_start();
 $idpublicacion= $_POST["idpublicacion"];
 $cantidad= $_POST["cantidad"];
 $formadepago= $_POST["formadepago"];
 $fecha = getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
?>

<?php

if (isset(($_SESSION['MiSesion']))){
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
include_once("../categoriafiles/CategoriaCollector.php");
include_once("../formadepagofiles/FormaDePagoCollector.php");
include_once("../registropedidofiles/RegistropedidoCollector.php");
include_once("PublicacionCollector.php");
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();
$registroPedidoCollectorObj = new RegistropedidoCollector();
$publicacion = $PublicacionCollectorObj->showPublicacionById($idpublicacion);
$PlatilloCollectorObj->updatePlatilloById($publicacion->getPlatilloId(), $cantidad);
$registroPedidoCollectorObj->insertarRegistroPedido($fecha,$publicacion->getIdPublicacion(),$_SESSION['MiSesion'], $cantidad);
 ?>

<!DOCTYPE html>
<html>
<head>
<title>EWF | Realizar Compra</title>
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
 					<ul>
					<li> <a >Compra con exito</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Has realizado una compra</h3>
				<div class="grid-single">	
				<div id="espacio"></div>
				<div class="clear">
					</br>
					<center> 
					<a href="../pages/muro.php" class="button">Volver</a>
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
header('Location: ../index.php'); //REDIRECCIONA AL INDEX
}

?>


