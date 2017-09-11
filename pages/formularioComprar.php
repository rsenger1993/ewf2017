 <?php
 session_start();
?>
<?php

 if (isset(($_SESSION['MiSesion']))){
$idpublicacion= $_GET["idpublicacion"];
//print_r($idpublicacion);
include_once("../publicacionfiles/PublicacionCollector.php");
include_once("../usuariofiles/UsuarioCollector.php");
include_once("../platillofiles/PlatilloCollector.php");
include_once("../formadepagofiles/FormaDePagoCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$PublicacionCollectorObj = new PublicacionCollector();
$PlatilloCollectorObj = new PlatilloCollector();
$FormaDePagoCollectorObj = new FormaDePagoCollector();
$publicacion = $PublicacionCollectorObj->showPublicacionById($idpublicacion); //OBTENGO DATOS DE LA PUBLICACION
$ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($publicacion->getPlatilloId());//OBTENGO DATOS DEL PLATILLO
$ArrayFormaDePago = $FormaDePagoCollectorObj->showFormaDePagos();//OBTENGO DATOS DE LA FORMA DE PAGO



	?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Comprar Platillo</title>
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
					<li><a href="publicacionesfavoritas.php" class="black2" > PUBLICACIONES FAVORITAS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black2" > NUEVAPUBLICACION</a></li>
					<li><a href="miperfil.php" class="black4" > MIPERFIL</a></li>
					<li><a href="logout.php" class="black3" > SALIR</a></li>
				</ul>
			</div>
			<ul class="social-in">

			</ul>
			<p class="footer-class"> Copyright © 2017 Easy Worthy Food </p>
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
					<li><a href="publicacionesfavoritas.php" class="black2" > PUBLICACIONES FAVORITAS</a></li>
					<li><a href="mispublicaciones.php" class="black2" > MISPUBLICACIONES</a></li>
					<li><a href="nuevapublicacion.php" class="black2" > NUEVAPUBLICACION</a></li>
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

<?php 
if ($ObjPlatillo->getCantidad()==0){
?>
				<div id="scroll-publi">
					<div class="work">
					<p>Ese platillo esta agotado</p>
					</div>
				</div>
			
	</div>
<?php

}
else{
$ObjUsuario = $UsuarioCollectorObj->showUsuarioById($publicacion->getUsuarioId());// CARGO LOS DATOS DEL USUARIO
?>

		<div class="content">

			<div class="work">
			<a href="muro.php" id="btn-regresar"  class="button" value="regresar" >Ir al Muro</a>
				<form  action="../publicacionfiles/realizarcompra.php" enctype="multipart/form-data" method="post">
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
						<div class="callbacks_container">
						  <ul class="rslides" id="slider">
							<li>
							  <img id="img-publicacion"  src="<?php echo '../'.$ObjPlatillo->getImgPlatillo();?>" alt="" >

							</li>
						  </ul>
					  </div>
					</div>
					<h2>Descripcion del Platillo</h2>
						
					  <h3 ><?php echo ($ObjPlatillo->getPlatilloDescripcion())?></h3>

				</div>
				<div class="work-in">
					<div class="info">
					<h3><?php echo "Vendedor: ".($ObjUsuario->getNombreUsuario())?> </h3>

					<h3>Datos Platillo </h3>
					<input readonly name="idpublicacion" value="<?php echo $idpublicacion?>" style="display:none;"> <!-- ENVIO EL ID DE LA PUBLICACION -->
						<ul class="likes">
							<li><p><i> </i><?php echo "Platillo: ".($ObjPlatillo->getNombrePlatillo())?></p>
							</li>
							<li><p><i > </i><?php echo "Categoria: ".($ObjPlatillo->getCategoriaDescripcion())?></p>
							</li>
							<li><p><i > </i><?php echo "Precio: $".($ObjPlatillo->getPrecio())?></p></li>
							<li><p><i > </i>Cantidad</p></li>
							<p>Seleccione la cantidad
							<select name="cantidad">
							<?php
							for ($i=1; $i<=$ObjPlatillo->getCantidad(); $i++)
							{
							?>
							<option value="<?php echo $i ?>"><?php echo $i ?></option><!--CARGAR LA CANTIDAD DEL PLATILLO-->
							<?php } ?>
							</select>
							</p>
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

							<?php if ($ObjUsuario->getNombreUsuario() != $_SESSION['MiSesion']) { ?> <!-- VALIDO QUE SOLO SE MUESTRE EL BOTON DE COMPRAR A TODOS MENOS AL USUARIO ACTIVO -->

							<div class="grid-single-in">
  							<input href="<?php '../publicacionfiles/realizarcompra.php?idpublicacion='.$publicacion->getIdPublicacion() ?>" type="submit" name="Enviar" id="btn-re"  class="button" value="Comprar" >

                    		</div>
                    		<?php } ?>
						</ul>
					</div>
				</div>

                    </form>
				<div class="clear"> </div>
			</div>
		</div>

	<?php } ?>
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