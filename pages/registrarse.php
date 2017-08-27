 <?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>EWF | Registrarse</title>
<!-- jQuery-->
<script src="js/jquery.min.js"></script>
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
			<label for="btn-menu"> <img src="../images/menu.png" alt="imagen de menu"></label>

			<nav class="menu">

				<ul>
                    <li> <a href="../index.php">Iniciar sesión</a></li>
					<li> <a href="quienessomos.php">Nosotros</a></li>
                   
				</ul>

			</nav>

		</header>
    
 <div class="container">   
	       
              <!--FORMULARIO DE REGISTRO -->
                <div class="single" id="index-login">  
                    
               <div class="top-single">

				<h3>Registrarse</h3>
				<div class="grid-single">
					<form action="../usuariofiles/crearUsuario.php" method="post">
					<div class="your-single">
						<i> </i>
						<input type="text" name="nombrecompleto" value="nombre completo" onfocus="this.value=''" onblur="if (this.value == '') {this.value = 'nombre completo';}">								
						<div class="clear"> </div>
					</div>
					<div class="your-single">
						<i> </i>
						<input type="text" name="nombreusuario" value="nombre de Usuario" onfocus="this.value=''" onblur="if (this.value == '') {this.value = 'nombre de usuario';}">								
						<div class="clear"> </div>
					</div>
					<div class="your-single">
						<i class="email"> </i>
						<input type="text" name="clave" value="clave" onfocus="this.value=''" onblur="if (this.value == '') {this.value = 'clave';}">								
						<div class="clear"> </div>
					</div>
                    <div class="your-single">
					<i> </i>
						<input type="text" name="correo" value="correo" onfocus="this.value=''" onblur="if (this.value == '') {this.value = 'correo';}">								
						<div class="clear"> </div>	
                    </div>
                    <div class="your-single">
					<i> </i>
						<input type="text" name="edad" value="edad" onfocus="this.value=''" onblur="if (this.value == '') {this.value = 'edad';}">								
						<div class="clear"> </div>	
                    </div>
                    <div class="your-single">
					<i> </i>
						<input type="text" name="telefono" value="telefono" onfocus="this.value=''" onblur="if (this.value == '') {this.value = 'telefono';}">								
						<div class="clear"> </div>	
                    </div>
                        <div class="your-single">
					<i> </i>
						<input type="text" name="direccion" value="direccion" onfocus="this.value=''" onblur="if (this.value == '') {this.value = 'direccion';}">								
						<div class="clear"> </div>	
                    </div>
                    <div class="your-single">
					<i> </i>
						<input type="text" name="descripcion" value="descripcion" onfocus="this.value=''" onblur="if (this.value == '') {this.value = 'descripcion';}">								
						<div class="clear"> </div>	
                    </div>
                    <div class="grid-single-in">
  					<input type="submit" name="Enviar" value="Enviar">
                    </div>
                    </form>
                    <div class="grid-single-in">
					
				    </div>
				</div>
				<div class="clear"> </div>
			</div>
        
        
        
	
        <div class="clear"> </div>

        
           </div>
				
			<div class="slider">

				<ul>
					<li> <img src="images/slide/slide4.jpg" alt=""></li>
					<li> <img src="images/slide/slide2.jpg" alt=""></li>
					<li> <img src="images/slide/slide3.jpg" alt=""></li>
					<li> <img src="images/slide/slide1.jpg" alt=""></li>
				
				</ul>



			</div>
    </div>
</body>
</html>