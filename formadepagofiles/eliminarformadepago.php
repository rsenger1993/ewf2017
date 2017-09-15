 <?php
 session_start();
 $idformadepago= $_GET["idformadepago"];
 //print_r($idformadepago);
include_once("../formadepagofiles/FormaDePagoCollector.php");
$FormadepagoCollectorObj = new FormaDePagoCollector();
$FormadepagoCollectorObj->deleteFormaDePago( $idformadepago);

print_r("Eliminacion correcta")
 ?>
 <a id="btn-re" href="../pages/formulariometodopago.php" class="button">volver</a>
