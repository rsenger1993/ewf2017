 <?php
 session_start();
 include_once("../usuariofiles/UsuarioCollector.php");
 include_once("../platillofiles/PlatilloCollector.php");
 include_once("../categoriafiles/CategoriaCollector.php");
 include_once("../formadepagofiles/FormaDePagoCollector.php");
 include_once("PublicacionCollector.php");

 $idpublicacion= $_POST["idpublicacion"];
 $cantidad= $_POST["cantidad"];
 $formadepago= $_POST["formadepago"];

 $PublicacionCollectorObj = new PublicacionCollector();
 $PlatilloCollectorObj = new PlatilloCollector();
 $publicacion = $PublicacionCollectorObj->showPublicacionById($idpublicacion);
 $PlatilloCollectorObj->updatePlatilloById($publicacion->getPlatilloId(), $cantidad);

 print_r("Compra exitosa");
 echo"</br>";
 echo "<a href='../pages/muro.php'>Ir al Muro</a>";
 //print_r($idpublicacion);
 //echo "</br>";
 //print_r($formadepago);
 // echo "</br>";
 //print_r($cantidad);


 ?>