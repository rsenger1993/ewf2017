 <?php
 session_start();
 include_once("../usuariofiles/UsuarioCollector.php");
 include_once("../platillofiles/PlatilloCollector.php");
 include_once("../categoriafiles/CategoriaCollector.php");
 include_once("../formadepagofiles/FormaDePagoCollector.php");
 include_once("PublicacionCollector.php");
 $UsuarioCollectorObj = new UsuarioCollector();
 $us = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);

 $nombreplatillo= $_POST["nombreplatillo"];
 $categoria= $_POST["categoria"];
 $cantidad= $_POST["cantidad"];
 $precio= $_POST["precio"];
 $platillodescripcion= $_POST["platillodescripcion"];
 $urlimg= $_FILES;
 $fecha = getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
 //$fecha= "1993-04-17";
 $estado="disponible";
 $formadepago= $_POST["formadepago"];

 $PublicacionCollectorObj = new PublicacionCollector();
 $UsuarioCollectorObj = new UsuarioCollector();
 $CategoriaCollectorObj = new CategoriaCollector();
 $PlatilloCollectorObj = new PlatilloCollector();
 $FormaDePagoCollectorObj = new FormaDePagoCollector();

 if ($nombreplatillo=="" or $categoria=="" or $cantidad=="" or  $precio=="" or $platillodescripcion=="" or $fecha=="" or $formadepago=="")
 {
 	echo "Porfavor llenar todos los campos </br>";
 }
 elseif ($urlimg['imagen']['name']=="")
 {
 	echo "Porfavor selecciona una imagen para el platillo </br>";
 }
 elseif (!is_numeric($precio))
 {
	echo "Porfavor Ingresa un valor correcto para el precio </br>";
	echo "ejemplo: 1 o 1.50</br>";
 }

else {
		//VALIDAR SUBIR SOLO IMAGENES PNG Y JPG QUE SEAN MENORES A 200KB
	 if((($urlimg["imagen"]["type"] == "image/png") || ($urlimg["imagen"]["type"] == "image/jpg") || ($urlimg["imagen"]["type"] == "image/jpeg")) && ($urlimg["imagen"]["size"] < 200000))
 		{
	      //echo "Datos correctos";
 				//GUARDAR IMAGEN EN LA RUTA ESTABLECIDA  "imgperfil/"
		$ruta1= '../imgpublicacion/'.$us->getNombreUsuario().'-'.$urlimg['imagen']['name'];
		move_uploaded_file($urlimg['imagen']['tmp_name'],$ruta1);

		//RUTA QUE SE GUARDARA EN LA BASE
		$rutabase = 'imgpublicacion/'.$us->getNombreUsuario().'-'.$urlimg['imagen']['name'];

 		$aObjFormaDePago= $FormaDePagoCollectorObj->showFormaDePagobyName($formadepago); //BUSCO LA CATEGORIA QUE SE HA SELECCIONADO
 		$aObjCategoria = $CategoriaCollectorObj->showCategoriaByName($categoria); //BUSCO LA FORMA DE PAGO QUE SE HA SELECCIONADO

 		$PlaId =$PlatilloCollectorObj->insertarPlatillo($nombreplatillo,$platillodescripcion,$cantidad,$precio,$rutabase,$aObjCategoria->getIdCategoria());
 		$PublicacionCollectorObj->insertarPublicacion($fecha,$estado, $us->getIdUsuario(), $PlaId["idplatillo"],$aObjFormaDePago->getIdFormaDePago());
 		echo "Publicacion creada exitosamente</br>";
 		}
 	else{
 		echo "Solo se permiten imagenes jpg, png y con un peso menor a 200kb </br>";
 			
 	}

     }
		
	



 ?>
 <a href="../pages/nuevapublicacion.php">Volver</a>