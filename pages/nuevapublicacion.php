 <?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
include_once("../categoriafiles/CategoriaCollector.php");
include_once("../formadepagofiles/FormaDePagoCollector.php");
$CategoriaCollectorObj = new CategoriaCollector();
$FormaDePagoCollectorObj = new FormaDePagoCollector();
$ArrayCategorias = $CategoriaCollectorObj->showCategorias();//OBTENGO DATOS DE LA FORMA DE PAGO
$ArrayFormaDePago = $FormaDePagoCollectorObj->showFormaDePagos();//OBTENGO DATOS DE LA FORMA DE PAGO
	?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Nueva Publicacion</title>
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
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li class="active"><a href="nuevapublicacion.php" class="black2" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">
				<li><a href="nuevapublicacion.php"><i class="facebook"> </i></a></li>
				<li><a href="nuevapublicacion.php"><i class="twitter"> </i></a></li>
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
					<li><a href="amigos.php" class="black2" > EWF FAVORITOS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li class="active"><a href="nuevapublicacion.php" class="black2" > NUEVAPUBLICACION</a></li>
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
		<div class="content">
			<div class="work">
				<form  action="../publicacionfiles/crearPublicacion.php" enctype="multipart/form-data" method="post">
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
					
				   <div class="your-single">
					
						<label>Subir Imagen</label>
						<input  type="file" name="imagen">
					
														
						<div class="clear"> </div>	
                    </div>

					<h2><a >Descripcion del Platillo</a></h2>
					  <textarea id="area-perfil" name="platillodescripcion">Escriba aqui...</textarea>
				</div>
				<div class="work-in">
					<div class="info">
					<h3>Datos Platillo</h3>
						<ul class="likes">
							<li><p><i > </i>Platillo</p>
							<input type="text" id="nombre" name="nombreplatillo" placeholder="Nombre del platillo"></li>
							<li><i class="comment"> </i>Precio $<input type="text" id="precio" name="precio" placeholder="0"> Ejemplo: 1 ó 1.50</li>
							<li><p><i > </i>Cantidad</p>
							<p>Seleccione la cantidad
							<select name="cantidad">
							<option value="1" selected>1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							</select>
							</p>
							</li>
							<li><p><i > </i>Categoria</p>
							<p>Seleccione una opcion
							<select name="categoria">
							<?php
							foreach ($ArrayCategorias as $categoria){
							?>
							<option value="<?php echo $categoria->getCategoriaDescripcion() ?>"><?php echo $categoria->getCategoriaDescripcion() ?></option><!--CARGAR LAS FORMAS DE PAGO DE LA BASE-->
							<?php } ?>
							</select>
							</p>
							</li>
							<li><p><i > </i>Forma de Pago</p>
							<p>Seleccione una opcion
							<select name="formadepago">
							<?php
							foreach ($ArrayFormaDePago as $formadepago){
							?>
							<option value="<?php echo $formadepago->getFormaDePagoDescripcion() ?>"><?php echo $formadepago->getFormaDePagoDescripcion() ?></option><!--CARGAR LAS FORMAS DE PAGO DE LA BASE-->
							<?php } ?>
							</select>
							</p>
							</li>
							<br>
							<div class="grid-single-in">
	
  							<input type="submit" name="Enviar" id="btn-re"  class="button" value="Publicar" >

                    		</div>
						</ul>
					</div>
				</div>

                    </form>
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
header('Location: index.php'); //REDIRECCIONA AL INDEX
}
 ?>