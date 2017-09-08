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
$arrayPublicacion = $PublicacionCollectorObj->showPublicaciones(); //TRAIGO DATOS DE TODAS LAS PUBLICACIONES

	?>
	<!DOCTYPE html>
<html>
<head>
<title>EWF | Home</title>
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
	<!---->
		<div class="header-left">
			<div class="logo">
				<a href="home.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav">
				<ul >

					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li class="active" ><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">
				<li><a href="home.php"><i class="facebook"> </i></a></li>
				<li><a href="home.php"><i class="twitter"> </i></a></li>

			</ul>
			<!--modificado copyright a ewf-2017-->
			<p class="footer-class">Copyright © 2017 EWF  <!--Template by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> --> </p>
		</div>
		<!---->
		<!---->
		<div class="header-top">
			<div class="logo-in">
				<a href="home.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav-in">
			<span class="menu"><img src="../images/menu.png" alt=""> </span>
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li class="active" ><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
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
			<!---->
		<div id="scroll-publi">
				<?php
				foreach ($arrayPublicacion as $publicacion){ //TODAS LAS PUBLICACIONES
				$ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());// CARGO LOS DATOS DEL PLATILLO
			    $ObjUsuario = $UsuarioCollectorObj->showUsuarioById($publicacion->getUsuarioId());// CARGO LOS DATOS DEL USUARIO
			    ?>

			<div class="content-grid">
			<?php echo "<a class='b-link-stripe b-animate-go  thickbox' href='../pages/formularioComprar.php?idpublicacion=".$publicacion->getIdPublicacion()."'>"; ?>

					<img  id="img-muro" src="<?php echo '../'.$ObjPlatillo->getImgPlatillo();?>" alt="1" />
						<div class="b-wrapper">
							<h2 class="b-animate b-from-left    b-delay03 ">
								<span>Easy Worthy Food</span>
								<i> </i><?php echo $ObjPlatillo->getNombrePlatillo();?>
							</h2>
						</div>
				</a>
			</div>
							<?php  } ?> <!-- FIN DEL FOREACH TODAS LAS PUBLICACIONES -->



		
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
header('Location: ../index.php'); //REDIRECCIONA AL INDEX
}
 ?>


