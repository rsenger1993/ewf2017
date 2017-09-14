 <?php
 session_start();
 ?>
 <?php
 $idfactura= $_GET["idfactura"];
 include_once("../facturafiles/FacturaCollector.php");
 include_once("../usuariofiles/UsuarioCollector.php");
 include_once("../platillofiles/PlatilloCollector.php");
 $FacturaCollectorObj = new FacturaCollector();
 $PlatilloCollectorObj = new PlatilloCollector();
 $UsuarioCollectorObj = new UsuarioCollector();
 $factura = $FacturaCollectorObj->showFacturaById($idfactura);
 $usuario = $UsuarioCollectorObj->showUsuarioByName($_SESSION['MiSesion']);
 $ObjPlatillo = $PlatilloCollectorObj->showPlatilloById($factura->getPlatilloId());
?>
<!doctype html>
<script src="../js/jquery.min.js"></script>
<link href="../css/style-index2.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<html>
<head>
    <meta charset="utf-8">
    <title>Generar Factura</title>
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../images/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                N. Factura:  <?php echo  $factura->getIdFactura()?><br>
                                Creado:  <?php echo  $factura->getFechaFactura()?><br>
                                Factura Valida: Febrero 2, 2019
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Easy Worthy Food, Inc.<br>
                                La Garzota<br>
                                Guayaquil, TX 12345
                            </td>
                            
                            <td>
                                 <?php echo  $usuario->getNombreUsuario()?><br>
                                 <?php echo  $usuario->getNombreCompleto()?><br>
                               <?php echo  $usuario->getCorreo()?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Metodo de Pago
                </td>
                
                <td>
                   
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Efectivo
                </td>
                
                <td>
                    
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Productos
                </td>
 
                <td>
                    Precio Unitario
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <?php echo $factura->getCantidadPedido()." " .$ObjPlatillo->getNombrePlatillo()?>
                </td>
          
                <td>
                    <?php echo "$ ".$ObjPlatillo->getPrecio()?>
                </td>
            </tr>
            
            
            <tr class="total">
                <td></td>
                
                <td>
                 <?php echo "Total + iva = ".$factura->getTotal()?>
                </td>
            </tr>
        </table>
    </div>
        <div class="invoice-box">
         <a href="../pages/muro.php" class="button">Comprar otro producto</a>
        </div>
        <div class="invoice-box">
         <a href="../pages/misregistrospedidos.php" class="button">Ver mis pedidos</a>
        </div>

<a class="imprimir" alt="Click para Imprimir esta página" title="Click para Imprimir esta página" 
href=javascript:window.print();>Imprimir esta página</a>

</body>
</html>
