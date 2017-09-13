<?php
session_start();
?>
<?php
$nombreusuario = $_POST['nombreusuario'];
$clave = $_POST['clave'];
include_once("../usuariofiles/UsuarioCollector.php");
$UsuarioCollectorObj = new UsuarioCollector();
$arrayUsuario = $UsuarioCollectorObj->showUsuarioByLogin($nombreusuario,$clave);
?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Log-In</title>
<script src="../js/jquery.min.js"></script>
<link href="../css/style-index2.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Kappe Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900' rel='stylesheet' type='text/css'>
</head>
<body>
		<header id="index-header">
			<input type="checkbox" id ="btn-menu">
			<label for="btn-menu"> <img src="../images/menu.png" alt="menu"></label>
			<nav class="menu">
<?php
if (count($arrayUsuario)>0){		
$_SESSION['MiSesion']=$_POST['nombreusuario'];
?>
				<ul>
					<li> <a >Log-in Con Exito</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3> <?php echo "Bienvenido: ".$_POST['nombreusuario'];?> </h3>
				<div id="centrar-boton">	
					<a  class="button"  href="home.php" >Continuar</a>     
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
?>
				<ul>
					<li> <a >Error</a></li>
				</ul>
			</nav>
		</header>
	 <div class="container">
        <div class="single" id="index-login">
               <div class="top-single">
				<h3> Usuario o contraseña Incorrecta </h3>
				<div id="centrar-boton">	
					<a class="button"  href="../index.php" >Volver</a>				     
				</div>
				<div class="clear"> </div>
			</div>
           </div>
    </div>
</body>
</html>
<?php
						  }
?>
				



