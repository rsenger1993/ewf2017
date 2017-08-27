 <?php
 session_start();
?>
<?php
 if (isset(($_SESSION['MiSesion']))){
	header('Location: pages/home.php'); //REDIRECCIONA AL HOME

 }
 else{

 ?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | index</title>
<!-- jQuery-->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style-index2.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />


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

				<ul>
          <li> <a href="pages/registrarse.php">Registrarse</a></li>
					<li> <a href="pages/quienessomos.php">Nosotros</a></li>
				</ul>

			</nav>

		</header>

	 <div class="container">
               <!--FORMULARIO DE LOGIN -->
        <div class="single" id="index-login">
          <div class="top-single">
				<h3>Iniciar sesión</h3>
				<div class="grid-single">
					<form action="pages/login.php" method="post">
					<div class="your-single">
						<i> </i>
						<input type="text" name="nombreusuario"  value="Usuario" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Usuario';}">
						<div class="clear"> </div>
					</div>
					<div class="your-single">
						<i> </i>
						<input type="text" name="clave"  value="Contraseña" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Usuario';}">
						<div class="clear"> </div>
					</div>
                    <div class="grid-single-in">
                    <input type="submit" name="Enviar" value="Enviar">
				    </div>
				      </form>


				</div>
				<div class="clear"> </div>
			</div>

        <div class="clear"> </div>


           </div>

			<div class="slider">

				<ul>
					<li> <img src="../images/slide/slide4.jpg" alt=""></li>
					<li> <img src="../images/slide/slide2.jpg" alt=""></li>
					<li> <img src="../images/slide/slide3.jpg" alt=""></li>
					<li> <img src="../images/slide/slide1.jpg" alt=""></li>

				</ul>



			</div>
    </div>
</body>
</html>
<?php } ?>