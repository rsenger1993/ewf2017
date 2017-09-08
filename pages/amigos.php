 <?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
include_once("../amigofiles/AmigoCollector.php");
include_once("../usuariofiles/UsuarioCollector.php");
$AmigoCollectorObj = new AmigoCollector();
$UsuarioCollectorObj = new UsuarioCollector();
$ArrayAmigo=$AmigoCollectorObj->showAmigosByUser($_SESSION['MiSesion']);
	?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Amigos</title>
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
		<div class="header-left header-left2">
			<div class="logo">
				<a href="home.php"><img src="../images/logo.png" alt=""></a>
			</div>
			<div class="top-nav">
				<ul >
					<li><a>Hola: <?php echo $_SESSION['MiSesion'] ?></a></li>
					<li  ><a href="home.php" >HOME</a></li>
					<li><a href="muro.php" class="black" > MURO</a></li>	
					<li class="active"><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">
				<li><a href="amigos.php"><i class="facebook"> </i></a></li>
				<li><a href="amigos.php"><i class="twitter"> </i></a></li>
			</ul>
			<p class="footer-class"> Template by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
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
					<li class="active"><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
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
			<div class="blog">
				<?php
				foreach ($ArrayAmigo as $amigo){ //TODOS LOS AMIGOS
			    $ObjUsuario = $UsuarioCollectorObj->showUsuarioById($amigo->getUSuarioId());// CARGO LOS DATOS DEL USUARIO
			    ?>
					
					<div class="blog-top">
					<div class="col-d">
						<img  src="<?php echo '../'.$ObjUsuario->getImgUsuario();?>" alt="pi5" />
						<div class="blog-in">
							<h5><a href="amigos.php"><?php echo ($ObjUsuario->getNombreUsuario())?></a></h5>
							<p><?php echo ($ObjUsuario->getUsuarioDescripcion())?></p>
							<ul class="date">
								<p><?php echo "Telefono: " . ($ObjUsuario->getTelefono())?></p>
							</ul>
							<ul class="date">
								<p><?php echo "Correo: " .($ObjUsuario->getCorreo())?></p>
							</ul>
							</br>
							<ul><li>
								<center>
								<?php echo "<a id='btn-eliminaramigo' href='../pages/publicacionesamigo.php?idusuario=".$ObjUsuario->getIdUsuario()."'>Ver publicaciones </a>"; ?>
								</center>
							</li></ul>
							</br>
							<ul><li>
								<center>
								<?php echo "<a id='btn-eliminaramigo' href='../amigofiles/eliminaramigo.php?idusuario=".$ObjUsuario->getIdUsuario()."'>Eliminar EWF </a>"; ?>
								</center>
							</li></ul>
						</div>
					</div>
					</div>
					<?php  } ?> <!-- FIN DEL FOREACH TODOS LOS AMIGOS -->

				<div class="clear"> </div>
				</div>
			<div class="arrow arrow-at">
				
			</div>
			</div>
			
		</div>
		<div class="clear"> 
				<p class="footer-class-in">Copyright © 2015 Kappe Template by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>

	</div>
</body>
</html>
<?php
 }
 else{
header('Location: index.php'); //REDIRECCIONA AL INDEX
}
 ?>