 <?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../amigofiles/AmigoCollector.php");
include_once("../publicacionfiles/PublicacionCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$AmigoCollectorObj = new AmigoCollector();
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();
$us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);
$ArrayAmigo=$AmigoCollectorObj->showAmigosByUser($_SESSION['MiSesion']);
?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Editar Mi Perfil</title>
<script src="../js/jquery.min.js"></script>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kappe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
<!--VALIDAR INGRESAR SOLO NUMEROS-->
<script>
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
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
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="publicacionesfavoritas.php" class="black2"> PUBLICACIONES FAVORITAS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4" > NUEVAPUBLICACION</a></li>
					<li class="active"><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">
			</ul>
			<p class="footer-class">Copyright © 2017 Easy Worthy Food</p>
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
					<li><a href="home.php">HOME</a></li>
					<li><a href="muro.php" class="black"> MURO</a></li>
					<li><a href="amigos.php" class="black2"> EWF FAVORITOS</a></li>
					<li><a href="publicacionesfavoritas.php" class="black2"> PUBLICACIONES FAVORITAS</a></li>
					<li><a href="mispublicaciones.php" class="black2"> MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black4"> NUEVAPUBLICACION</a></li>
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
		<div class="content">
			<div class="work">
				<form  action="../usuariofiles/editarUsuario.php" enctype="multipart/form-data" method="post">
				<div class="work-top">
					<div>
						<div class="callbacks_container">
						  <ul class="rslides" id="slider">
							<li>
							  <img src="<?php echo '../'.$us->getImgUsuario();?>" alt="" height="200" width="350">
							</li>
						  </ul>
					  </div>
                      <div class="your-single">
                      	  <a id="label-login">Cambiar Imagen de Perfil</a>
                      	</br>
                      	<a id="label-login">Seleccione su nueva imagen de perfil - solo imagenes jpg o png menor a 200kb </a>
						<input id="label-login" type="file" name="imagen">							
						<div class="clear"> </div>
                    </div>
					</div>
					<h2><a href="single.html">¿QUIEN SOY?</a></h2>
					<textarea name="descripcion" id="area-perfil"><?php echo $us->getUsuarioDescripcion()?></textarea>
				</div>
				<div class="work-in">
					<div class="info">
					<h3>Datos Generales</h3>
						<ul class="likes">
							<li><p><i > </i>Nombre</p>
							<input type="text" name="nombrecompleto" value="<?php echo $us->getNombreCompleto() ?>" >
							</li>
							<li><p><i > </i>Edad</p>
							<input type="text" name="edad" maxlength="2" onkeypress="return valida(event)" value="<?php echo $us->getEdad() ?>" >
							</li>
							<li><p href="#"><i class="comment"> </i>Clave</p>
							<input type="text" name="clave" value="<?php echo $us->getClave() ?>" >
							</li>
							<li><p href="#"><i class="comment"> </i>Telefono</p>
							<input type="text" name="telefono" maxlength="8" onkeypress="return valida(event)" value="<?php echo $us->getTelefono() ?>" >
							</li>
							<li><p href="#"><i class="comment"> </i>Direccion</p>
							<input type="text" name="direccion" value="<?php echo $us->getDireccionDescripcion() ?>" >
							</li>
							<li>
							</br>
							<div class="grid-single-in">
  							<input  type="submit" name="Enviar" value="Actualizar" >
                    		</div>
                    		</li>
						</ul>
					</div>

				</div>
				 </form>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="clear"> </div>
		<p class="footer-class-in">Copyright © 2017 Easy Worthy Food</p>
	</div>
</body>
</html>
<?php
 }
 else{
header('Location: ../index.php'); //REDIRECCIONA AL INDEX
}
 ?>
