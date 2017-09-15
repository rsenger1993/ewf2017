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
<script src="../js/jquery.min.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kappe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
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
				<li><a href="https://www.facebook.com/Easy-Worthy-Food-1909652592590399/" target="_blank"><i 						class="facebook"> </i></a></li>
				<li><a href="https://twitter.com/ew_food" target="_blank"><i class="twitter"> </i></a></li>
			</ul>
			<p class="footer-class"> Copyright © 2017 Easy Worthy Food </p>
		</div>
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
<?php if(count($arrayPublicacion)>0) { ?>  <!-- Busco si existen mis publicaciones -->
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
					<h3>Mis publicaciones</h3>
<?php
					foreach ($arrayPublicacion as $publicacion){
					$ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());// CARGO LOS DATOS DEL PLATILLO										 
?>
					<div class="comments-top-top">
						<div class="top-comment-left">
							<img id="mis-publicaciones" src="<?php echo '../'.($ObjPlatillo->getImgPlatillo())?>">
						</div>
						<div class="top-comment-right">
							<ul>
								<li><span > <a> <?php echo ($ObjPlatillo->getNombrePlatillo())?></a></span></li>
								 <li><a><?php echo ($publicacion->getFechaPublicacion())?></a></li>
							  <?php echo "<li> <a class='btn-search' href='../pages/formulariopublicacioneditar.php?idpublicacion=".$publicacion->getIdPublicacion()."'>Editar </a></li>"; ?>
							  <?php echo "<li> <a class='btn-search' href='../publicacionfiles/eliminarmipublicacion.php?idpublicacion=".$publicacion->getIdPublicacion()."'>Eliminar </a></li>"; ?>
							</ul>
							<p><?php echo ($ObjPlatillo->getCategoriaDescripcion())?></p>
						</div>
						<div class="clear"> </div>
					</div>
														<?php  } ?>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
<?php  								 } //FIN DEL IF COUNT PUBLICACIONES FAVORITOS
								 else{
?>
			<div id="scroll-publi">
				<div class="work">
					<p>No hay publicaciones</p>
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
