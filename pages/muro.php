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

//$us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);
$arrayPublicacion = $PublicacionCollectorObj->showPublicaciones(); //TRAIGO DATOS DE TODAS LAS PUBLICACIONES


	?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Muro</title>
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
	<div class="header" >
		<div class="header-left header-work" >
			<div class="logo">
				<a href="home.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav">
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li  ><a href="home.php" >HOME</a></li>
					<li class="active"><a href="muro.php" class="black" > MURO</a></li>
					<li><a href="amigos.php" class="black2" > AMIGOS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">
				<li><a href="muro.php"><i class="facebook"> </i></a></li>
				<li><a href="muro.php"><i class="twitter"> </i></a></li>
			</ul>
			<p class="footer-class"> Copyright © 2017 EWF </p>
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
					<li class="active"><a href="muro.php" class="black" > MURO</a></li>
					<li><a href="amigos.php" class="black2" > AMIGOS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
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

		<div id="scroll-publi">
			<!---->
			<?php
				foreach ($arrayPublicacion as $publicacion){
				$ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());// CARGO LOS DATOS DEL PLATILLO
			    $ObjUsuario = $UsuarioCollectorObj->showUsuarioById($publicacion->getUsuarioId());// CARGO LOS DATOS DEL USUARIO
			    ?>

		
			<div class="work">
				<div class="work-top">
					<h2><a href="muro.php"><?php echo ($ObjPlatillo->getNombrePlatillo())?></a></h2>
						<div class="callbacks_container">
						  <ul class="rslides" id="slider">
							<li>
							  <img id="img-publicacion" src="<?php echo '../'.$ObjPlatillo->getImgPlatillo();?>" alt="">

							</li>
						  </ul>
					  </div>
					  </br>
					  <a> Descripcion</a></br>
 					<div class="your-single">  </div>
					<a> <?php echo ($ObjPlatillo->getPlatilloDescripcion())?> </a>
				</div>
				<div class="work-in">
					<div class="info">
					<h3>Posteado Por: <?php echo ($ObjUsuario->getNombreUsuario())?></h3>
						<ul class="likes">
						
							<li>Contacto<span><i class="comment"> </i>Correo: <?php echo ($ObjUsuario->getCorreo())?></span></li>
							<li><span><i class="comment"> </i>Telefono: <?php echo ($ObjUsuario->getTelefono())?></span></li>
							<li>Comprar<span><i class="comment"> </i>Precio: $ <?php echo ($ObjPlatillo->getPrecio())?></span></li>
							<li><span><i class="comment"> </i>Cantidad disponible: <?php echo ($ObjPlatillo->getCantidad())?></span></li>
							<li class="grid-single-in">   
  							<input type="submit" name="Enviar" id="btn-re"  class="button" value="Comprar">
                    		</li>
						</ul>
					</div>
					</br>
					</br>
					<div class="gallery">
					<h3>Otras publicaciones de <?php echo ($ObjUsuario->getNombreUsuario())?></h3>
						<ul class="gallery-grid">

							<?php
							$arrayPublicacionPorUsuario = $PublicacionCollectorObj->showPublicacionByIdUser($ObjUsuario->getIdUsuario());
							foreach ($arrayPublicacionPorUsuario as $publicacionporusuario){
							$ObjPlatilloUser = $PlatilloCollectorObj->showPlatilloById($publicacionporusuario->getPlatilloId());// CARGO LOS DATOS DEL PLATILLO
			    			?>
							<li><a href="muro.php"><img id="mini-publicacion" src="<?php echo '../'.$ObjPlatilloUser->getImgPlatillo();?>" alt="pi" /></a></li>
							<?php  } ?> <!-- FIN DEL FOREACH PUBLICACIONES POR USUARIO-->
						</ul>
                        <div class="clear"> </div>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
	
					<?php  } ?> <!-- FIN DEL FOREACH TODAS LAS PUBLICACIONES -->
		</div>
		<div class="clear"> </div>
				<p class="footer-class-in">Copyright © 2017 EWF </p>

	</div>
</body>
</html>
<?php
 }
 else{
header('Location: index.php'); //REDIRECCIONA AL INDEX
}
 ?>
