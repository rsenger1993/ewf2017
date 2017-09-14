<?php
 session_start();
?>
<?php

if (isset(($_SESSION['MiSesion']))){
$idpublicacion= $_GET["idpublicacion"]; //ID DEL USUARIO QUE QUIERO AGREGAR
include_once("../favoritofiles/FavoritoCollector.php");
$FavoritoCollectorObj = new FavoritoCollector();
$ArrayFavorito=$FavoritoCollectorObj->showFavoritoByIdandPubli($_SESSION['MiSesion'],$idpublicacion);
 ?>

<!DOCTYPE html>
<html>
<head>
<title>EWF | Agregacion de Publicacion Favorita</title>
<!-- jQuery-->
<script src="../js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="../css/style-index2.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

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
		<header id="index-header">
			<input type="checkbox" id ="btn-menu">
			<label for="btn-menu"> <img src="../images/menu.png" alt="menu"></label>
			<nav class="menu">


 <?php

if (count($ArrayFavorito)>0){
	 	 ?>
 						<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Ya tienes esa publicacion agregada</h3>
				<div id="centrar-boton">
					<a href="../pages/muro.php" class="button">Volver</a>			     
				</div>
				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 	  <?php
}
else{
	$FavoritoCollectorObj->insertarFavorito($_SESSION['MiSesion'],$idpublicacion); //ENVIO MI USUARIO Y EL ID DEL USUARIO AMIGO
		 ?>
 						<ul>
					<li> <a >Agregacion de favorito con exito</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3>Publicacion Agregada como favorita</h3>
				<div id="centrar-boton">
					<a href="../pages/muro.php" class="button">Volver</a>			     
				</div>
				<div class="clear"> </div>
			</div>
           </div>

    </div>
</body>
</html>
 	  <?php
}	


}
else{
header('Location: ../index.php'); //REDIRECCIONA AL INDEX
}

?>

