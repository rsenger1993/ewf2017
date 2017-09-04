 <?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../publicacionfiles/PublicacionCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();
$us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);


?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Mi Perfil</title>
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
		<div class="header-left header-work">
			<div class="logo">
				<a href="home.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav">
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li  ><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>
					<li><a href="amigos.php" class="black2" > AMIGOS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4" > NUEVAPUBLICACION</a></li>
					<li class="active"><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">
				<li><a href="miperfil.php"><i class="facebook"> </i></a></li>
				<li><a href="miperfil.php"><i class="twitter"> </i></a></li>
			</ul>
			<!--modificado copyright a ewf-2017-->
			<p class="footer-class">Copyright © 2017 EWF  <!--Template by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> --> </p>
		</div>
		<!---->
		<div class="header-top">
			<div class="logo-in">
				<a href="home.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav-in">
			<span class="menu"><img src="../images/menu.png" alt=""> </span>
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>
					<li><a href="amigos.php" class="black2" > AMIGOS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4" > NUEVAPUBLICACION</a></li>
					<li class="active"><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
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
		<div class="content">
			<div class="work">
				<div class="work-top">
				<script src="js/responsiveslides.min.js"></script>
					<script>
						$(function () {
						  $("#slider").responsiveSlides({
							auto: true,
							speed: 500,
							namespace: "callbacks",
								pager: true,
						  });
						});
					</script>
					<div>

						<?php
						//print_r($us->getImgUsuario());
						?>
						<div class="callbacks_container">
						  <ul class="rslides" id="slider">
							<li>
							  <img src="<?php echo '../'.$us->getImgUsuario();?>" alt="" height="200" width="350">

							</li>
						  </ul>
					  </div>
					</div>
					<h2><a href="single.html">¿QUIEN SOY?</a></h2>
					
					<textarea readonly id="area-perfil"><?php echo "Soy ".$us->getUsuarioDescripcion()." y vivo en ".$us->getDireccionDescripcion() ?></textarea>


				<div class="projects">
					<h3>Amigos Ewf</h3>
					<ul>

						<li><a href="single.html"><img  src="../images/wo.jpg" alt="wo"/></a></li>
						<li><a href="single.html"><img  src="../images/wo1.jpg" alt="wo1" /></a></li>
						<li><a href="single.html"><img  src="../images/wo2.jpg" alt="wo2" /></a></li>

					</ul>
                    <div class="clear"> </div>
				</div>
				</div>
				<div class="work-in">
					<div class="info">
					<h3>Datos Generales</h3>
						<ul class="likes">
							<li><a><i > </i>Nombre</a>
							<a > <?php echo $us->getNombreCompleto() ?></a>
							</li>
							<li><span><i class="like"> </i>Nombre de usuario</span>
							<a > <?php echo $us->getNombreUsuario() ?></a>
							</li>
							<li><span><i class="dec"> </i>Contacto</span>
							<a > <?php print_r($us->getCorreo()); ?></a>
							</li>
							<li><a href="#"><i class="comment"> </i>Telefono</a>
							<a > <?php echo $us->getTelefono() ?></a>
							</li>
							<li>
							<a id="btn-re" href="miperfil.php" class="button">Editar</a>
							</li>


						</ul>
					</div>

					<div class="gallery">
					<h3>Mis Platillos</h3>
						<ul class="gallery-grid">
								<?php
							$arrayPublicacionPorUsuario = $PublicacionCollectorObj->showPublicacionByIdUser($us->getIdUsuario());
							foreach ($arrayPublicacionPorUsuario as $publicacionporusuario){
							$ObjPlatilloUser = $PlatilloCollectorObj->showPlatilloById($publicacionporusuario->getPlatilloId());// CARGO LOS DATOS DEL PLATILLO
			    			?>
							<li><a href="miperfil.php"><img  id="mini-publicacion" src="<?php echo '../'.$ObjPlatilloUser->getImgPlatillo();?>" alt="3" /></a></li>

							<?php  } ?> <!-- FIN DEL FOREACH PUBLICACIONES POR USUARIO-->
						</ul>
                        <div class="clear"> </div>
					</div>
					<div class="feature">
					<h3>Platillos Favoritos</h3>
							<ul class="gallery-grid">

							<li><a href="single.html"><img  src="../images/inicio/9.jpg" alt="9"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/16.jpg" alt="16"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/14.jpg" alt="14"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/7.jpg" alt="7"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/8.jpg" alt="8"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/2.jpg" alt="2"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/3.jpg" alt="3"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/1.jpg" alt="1"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/4.jpg" alt="4"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/15.jpg" alt="15"  /></a></li>
							<li><a href="single.html"><img  src="../images/inicio/11.jpg" alt="11"  /></a></li>

						</ul>
                        <div class="clear"> </div>

						<!--ul class="feature-grid">
							<li><a href="single.html"><i > </i> Responsive Layout  </a></li>
							<li><a href="single.html"><i >  </i>Font Awesome Icons</a></li>
							<li><a href="single.html"><i> </i>Clean & Commented Code</a></li>
							<li><a href="single.html"><i >  </i> Pixel perfect Design</a></li>
							<li><a href="single.html"><i >  </i>Highly Customizable</a></li>

						</ul>-->
					</div>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="clear"> </div>
		<!--modificado copyright a ewf-2017-->
		<p class="footer-class-in">Copyright © 2017 EWF  <!---<a href="http://w3layouts.com/" target="_blank">W3layouts</a>-->  </p>
	</div>
</body>
</html>
<?php
 }
 else{
header('Location: index.php'); //REDIRECCIONA AL INDEX
}
 ?>
