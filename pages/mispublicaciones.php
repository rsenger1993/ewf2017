 <?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
include_once("../publicacionfiles/PublicacionCollector.php");
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();

$us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);
$arrayPublicacion = $PublicacionCollectorObj->showPublicacionByIdUser($us->getIdUsuario()); //TRAIGO DATOS DE LA PUBLICACION DE ESE USUARIO

	?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Mis Publicaciones</title>
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
					<li class="active"><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black3" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black3" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black4" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">
				<li><a href="mispublicaciones.php"><i class="facebook"> </i></a></li>
				<li><a href="mispublicaciones.php"><i class="twitter"> </i></a></li>
			</ul>
			<p class="footer-class"> Template by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
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
		<div id="scroll-publi">
			<div class="single">
				<div class="single-top">
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
					<h3>Mis publicaciones</h3>
					
					<?php
					foreach ($arrayPublicacion as $publicacion){
					$ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());// CARGO LOS DATOS DEL PLATILLO
																 
																  ?>

					<div class="comments-top-top">
						<div class="top-comment-left">
							<img  src="<?php echo '../'.($ObjPlatillo->getImgPlatillo())?>" alt="1">
						</div>
						<div class="top-comment-right">
							<ul>

								<li><span > <a href="#"> <?php echo ($ObjPlatillo->getNombrePlatillo())?></a></span></li>
								<li><span>/<?php echo ($publicacion->getFechaPublicacion())?> </span> <a href="#"   class="btn-search">Editar</a></li>


							</ul>
							<p><?php echo ($ObjPlatillo->getCategoriaDescripcion())?></p>
							
						</div>
						<div class="clear"> </div>
					</div>

					<?php  } ?>
				
				</div>
		
				</div>
				<div class="single-in">
					<div class="info">
					<h3>Buscar platillo</h3>

							<input id="search-in" type="text" class="form-control" placeholder="Search">
							<a href="mispublicaciones.html" class="btn-search">Buscar</a>
							
					</div>
					
			
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="clear"> </div>
				<p class="footer-class-in">Copyright © 2015 Kappe Template by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>

	</div>
</body>
</html>
<?php
 }
 else{
header('Location: ../index.php'); //REDIRECCIONA AL INDEX
}
 ?>