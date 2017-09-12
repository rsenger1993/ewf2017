 <?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
include_once("../publicacionfiles/PublicacionCollector.php");
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
include_once("../registropedidofiles/RegistropedidoCollector.php");
include_once("../registroventafiles/RegistroVentaCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();
$registroPedidoCollectorObj = new RegistropedidoCollector();
$registroventaCollectorObj = new RegistroVentaCollector();
$us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);
//$arrayPublicacion = $PublicacionCollectorObj->showPublicacionByIdUser($us->getIdUsuario());
$arrayRegistroPedido=$registroPedidoCollectorObj->showRegistroPedidosByUser($_SESSION['MiSesion']);
$arrayRegistroVenta=$registroventaCollectorObj->showRegistroVentasByUser($_SESSION['MiSesion']);


	?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Mis Registros Pedidos</title>
<!-- jQuery-->
<script src="../js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
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
	<div class="header">
		<div class="header-left header-left3">
			<div class="logo">
				<a href="index.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav">
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>	
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="publicacionesfavoritas.php" class="black2" > PUBLICACIONES FAVORITAS</a></li>
					<li class="active"><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black3" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black3" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black4" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">

			</ul>
			<p class="footer-class"> Copyright © 2017 Easy Worthy Food </p>
		</div>
		<!---->
		<div class="header-top">
			<div class="logo-in">
				<a href="index.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav-in">
			<span class="menu"><img src="../images/menu.png" alt=""> </span>
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>	
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="publicacionesfavoritas.php" class="black2" > PUBLICACIONES FAVORITAS</a></li>
					<li class="active"><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black3" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black3" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black4" > SALIR</a></li>
				</ul>
				<script>
					$("span.menu").click(function(){
						$(".top-nav-in ul").slideToggle(500, function(){
						});
					});
			</script>

			</div>
			<div class="clear"> </div>
		</div>
			<!---->
<?php if(count($arrayRegistroPedido)>0) { ?>  <!-- Busco si existen mis publicaciones -->
		<div id="scroll-publi">
			<div class="single">
		
					<script src="js/responsiveslides.min.js"></script>
					<script>
						$(function () {
						  $("#slider4").responsiveSlides({
							auto: true,
							speed: 500,
							namespace: "callbacks",
								pager: true,
						  });
						});
					</script>
		
				
					<div class="comment-grid-top">
					<h3>Mis Pedidos</h3>
					
					<?php
					foreach ($arrayRegistroPedido as $pedidos){
					$publicacion= $PublicacionCollectorObj->showPublicacionById($pedidos->getPublicacionId());
					$ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());
																 
																  ?>

					<div class="projects">
				
					
				<ul>

				<li> <p> <?php echo ($ObjPlatillo->getNombrePlatillo())?></p></li>
				<center>
				<li>Categoria <p><?php echo ($ObjPlatillo->getCategoriaDescripcion())?></p></li>
				
					 <li>Cantidad <p><?php echo ($pedidos->getCantidadPedido())?></p></li>	

				</center>
			
				<li>Fecha <p><?php echo ($pedidos->getFechaPedido())?></p></li>
						
								</ul>
					
						<div class="clear"> </div>
					</div>

					<?php  } ?>
				
				</div>
					<br></br>


								<div class="comment-grid-top">
					<h3>Mis Ventas</h3>
					
					<?php
					foreach ($arrayRegistroVenta as $ventas){
					$publicacion= $PublicacionCollectorObj->showPublicacionById($ventas->getPublicacionId());
					$ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());
																 
																  ?>

					<div class="projects">
				
					
				<ul>

				<li> <p> <?php echo ($ObjPlatillo->getNombrePlatillo())?></p></li>
				<center>
				<li>Categoria <p><?php echo ($ObjPlatillo->getCategoriaDescripcion())?></p></li>
				
					 <li>Cantidad <p><?php echo ($ventas->getCantidadVenta())?></p></li>	

				</center>
			
				<li>Fecha <p><?php echo ($ventas->getFechaVenta())?></p></li>
						
								</ul>
					
						<div class="clear"> </div>
					</div>

					<?php  } ?>
				
				</div>
		
			
				<div class="clear"> </div>
			</div>
		</div>
<?php  } //FIN DEL IF COUNT PUBLICACIONES FAVORITOS
else{
 ?>
			<div id="scroll-publi">
				<div class="work">
					<p>No hay registro de pedidos</p>
				</div>
			</div>
<?php  } ?>
		<div class="clear"> </div>
				<p class="footer-class-in">Copyright © 2017 Easy Worthy Food </p>

	</div>
</body>
</html>
<?php
 }
 else{
header('Location: ../index.php'); //REDIRECCIONA AL INDEX
}
 ?>