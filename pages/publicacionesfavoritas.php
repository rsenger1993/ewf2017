<?php
 session_start();
?>
<?php
if (isset(($_SESSION['MiSesion']))){
include_once("../publicacionfiles/PublicacionCollector.php");
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
include_once("../favoritofiles/FavoritoCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();
$FavoritoCollectorObj = new FavoritoCollector();
$arrayFavoritos = $FavoritoCollectorObj->showFavoritosByUser($_SESSION['MiSesion']); //TRAIGO DATOS DE LAS PUBLICACIONES Favoritos
?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Muro</title>
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
		<div class="header-left header-work" >
			<div class="logo">
				<a href="home.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav">
				<ul>
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li class="active"><a href="publicacionesfavoritas.php" class="black2" > PUBLICACIONES FAVORITAS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">
			</ul>
			<p class="footer-class"> Copyright © 2017 EWF </p>
		</div>
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
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li class="active"><a href="publicacionesfavoritas.php" class="black2" > PUBLICACIONES FAVORITAS</a></li>
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
<?php if(count($arrayFavoritos)>0) { 
?>  <!-- Busco si existen publicaciones favoritas -->
		<div id="scroll-publi">
<?php
				foreach ($arrayFavoritos as $favorito){ //TODAS LAS PUBLICACIONES
				$publicacion = $PublicacionCollectorObj->showPublicacionById($favorito->getPublicacionId());
				$ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());// CARGO LOS DATOS DEL PLATILLO
			    $ObjUsuario = $UsuarioCollectorObj->showUsuarioById($publicacion->getUsuarioId());// CARGO LOS DATOS DEL USUARIO
?>
			<div class="work">
				<div class="work-top">
					<?php echo "<h2><a href='../publicacionfiles/eliminarpublicacionfavorita.php?idpublicacion=".$publicacion->getIdPublicacion()."'><button id='btn-favorite'> <img id='mini-favorite' src='../img/boton-eliminar1.png'></button>".$ObjPlatillo->getNombrePlatillo()."</a> </h2>";?>
						<div class="callbacks_container">
						  <ul class="rslides" id="slider">
							<li>
							  <a href="<?php echo "../pages/formularioComprar.php?idpublicacion=".$publicacion->getIdPublicacion() ?>"><img id="img-publicacion" src="<?php echo '../'.$ObjPlatillo->getImgPlatillo();?>" alt=""></a>
							</li>
						  </ul>
					  </div>
					  </br>
					  <a> Descripcion</a></br>
 					<div class="your-single">  </div>
					<a> <?php echo ($ObjPlatillo->getPlatilloDescripcion())?> </a>
				</div>
				<div class="work-in">
					<div class="info"> <!-- VALIDO QUE SOLO SE MUESTRE EL BOTON DE AGREGAR AMIGO A TODOS MENOS AL USUARIO ACTIVO -->
					<h3>Posteado Por: <?php echo ($ObjUsuario->getNombreUsuario())?> <?php if ($ObjUsuario->getNombreUsuario() != $_SESSION['MiSesion']) {echo "<a id='btn-agregar' class='button' href='../amigofiles/agregaramigo.php?idusuario=".$ObjUsuario->getIdUsuario()."'>Agregar EWF</a>"; }?></h3>
						<ul class="likes">
							<li>Contacto<span><i class="comment"> </i>Correo: <?php echo ($ObjUsuario->getCorreo())?></span></li>
							<li><span><i class="comment"> </i>Telefono: <?php echo ($ObjUsuario->getTelefono())?></span></li>
							<li>Comprar<span><i class="comment"> </i>Precio: $ <?php echo ($ObjPlatillo->getPrecio())?></span></li>
							<li><span><i class="comment"> </i>Cantidad disponible: <?php echo ($ObjPlatillo->getCantidad())?></span></li>
							 <?php if ($ObjUsuario->getNombreUsuario() != $_SESSION['MiSesion']) { ?> <!-- VALIDO QUE SOLO SE MUESTRE EL BOTON DE COMPRAR A TODOS MENOS AL USUARIO ACTIVO -->
							<li class="grid-single-in">
						    <?php echo "<a id='btn-re' class='button' href='../pages/formularioComprar.php?idpublicacion=".$publicacion->getIdPublicacion()."'>Comprar </a>"; ?>
                    		</li>
                    		</br>
							</br>
                    																		<?php } ?>
						</ul>
					</div>
					<div class="gallery">
					<h3>Publicaciones de <?php echo ($ObjUsuario->getNombreUsuario())?></h3>
						<ul class="gallery-grid">
<?php
							$arrayPublicacionPorUsuario = $PublicacionCollectorObj->showPublicacionByIdUser($ObjUsuario->getIdUsuario()); //PUBLICACIONES POR USUARIO
							foreach ($arrayPublicacionPorUsuario as $publicacionporusuario){
							$ObjPlatilloUser = $PlatilloCollectorObj->showPlatilloById($publicacionporusuario->getPlatilloId());// CARGO LOS DATOS DEL PLATILLO
?>
							<li><a href="<?php echo "formularioComprar.php?idpublicacion=".$publicacionporusuario->getIdPublicacion(); ?>"><img id="mini-publicacion" src="<?php echo '../'.$ObjPlatilloUser->getImgPlatillo();?>" alt="pi" /></a></li>
																					<?php  } ?> <!-- FIN DEL FOREACH PUBLICACIONES POR USUARIO-->
						</ul>
                        <div class="clear"> </div>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
											   <?php  } ?> <!-- FIN DEL FOREACH TODAS LAS PUBLICACIONES -->
		</div>
<?php  								} //FIN DEL IF COUNT PUBLICACIONES FAVORITOS
								else{
 ?>
			<div id="scroll-publi">
				<div class="work">
					<p>No hay publicaciones Favoritas</p>
				</div>
			</div>
						     <?php  } ?>
		<div class="clear"> </div>
				<p class="footer-class-in">Copyright © 2017 EWF </p>
	</div>
</body>
</html>
<?php
 								  }
 							  else{
header('Location: ../index.php'); //REDIRECCIONA AL INDEX
								  }
 ?>