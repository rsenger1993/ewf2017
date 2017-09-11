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
					<form  action="../usuariofiles/crearUsuario.php" enctype="multipart/form-data" method="post">
					<div class="your-single">
						<i> </i>
						<input type="text" name="nombrecompleto" placeholder="nombre completo">								
						<div class="clear"> </div>
					</div>
					<div class="your-single">
						<i> </i>
						<input type="text" name="nombreusuario" placeholder="nombre de usuario">								
						<div class="clear"> </div>
					</div>
					<div class="your-single">
						<i> </i>
						<input type="password" name="clave" placeholder="clave">								
						<div class="clear"> </div>
					</div>
                    <div class="your-single">
					<i class="email"> </i>
						<input type="text" name="correo" placeholder="correo - ejemplo@hotmail.com">								
						<div class="clear"> </div>	
                    </div>
                    <div class="your-single">
					<i> </i>
						<input type="text" name="edad" placeholder="edad" minlength="2" maxlength="2" onkeypress="return valida(event)">								
						<div class="clear"> </div>	
                    </div>
                    <div class="your-single">
					<i> </i>
						<input type="text" name="telefono" placeholder="telefono - 8 digitos sin contar el 0" maxlength="8" onkeypress="return valida(event)">								
						<div class="clear"> </div>	
                    </div>
                        <div class="your-single">
					<i> </i>
						<input type="text" name="direccion" placeholder="direccion">								
						<div class="clear"> </div>	
                    </div>
                    <div class="your-single">
					<i> </i>
					<a id ="lbl1" >descripcion</a>
					  <textarea id="area-perfil"  name="descripcion">Ejemplo: Me llamo Juan vivo en Guayaquil, soy ayudante de chef en el restaurante "La Milanesa"...</textarea>
						<div class="clear"> </div>	
                    </div>
                    <p id="label-login">Imagen de Perfil</p>
                      <div class="your-single">
                      	<a id="label-login">Seleccione su imagen de perfil - solo imagenes jpg o png menor a 200kb </a>
						<input id="label-login" type="file" name="imagen">							
						<div class="clear"> </div>
                    </div>

                    <div class="grid-single-in">
  					<input  type="submit" name="Enviar" value="Enviar" >
                    </div>
                    </form>
       
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