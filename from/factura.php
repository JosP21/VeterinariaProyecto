<?php 
 require('fpdf/fpdf.php');

 class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->SetFillColor(200,200,0);
   // $this->Image('../assets/img/reporteH.jpg',0,0,220);
    $this->Image('../assets/img/nombrecli.png',75,4,60);
    $this->Cell(30);
    $this->Image('../assets/img/logo1.png',40,4,30);
    $this->Cell(30,20,'',1,0,'C');
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(14);
    // Título
     
     $this->SetTextColor(10, 7, 0);
    $this->Cell(40,20,'Factura de Venta',0,0,'C');
    // Salto de línea
    $this->SetFont('Arial','B',12);
    $this->Cell(18);
    $this->Cell(14,15,'Fecha:',0,0,'C');
    $this->Cell(1);
    $this->Cell(40,15,date('d/m/Y '),0,1,'L');

    //$this->Cell(144);
    //$this->Cell(14,0,'Hora:',0,0,'C');
    //$this->Cell(1);
    //$this->Cell(40,0,date(' H:i:s'),0,1,'L');
    //$this->Ln(10);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
   
}

 
}


include"../config/conexion.php";

$buscar="SELECT
ventas.id_venta as id,
ventas.num_factura as ultima
FROM
ventas
ORDER BY
ventas.id_venta ASC";
$resulbusqueda=$conexion->query($buscar);

$nuevafac="";
while($fil=$resulbusqueda->fetch_assoc()){
    $nuevafac=$fil['ultima'];
}
$consultafactura="SELECT
ventas.id_venta AS venta,
ventas.num_factura AS factura,
ventas.fecha AS fecha,
detalleventa.cantVenta AS cantidad,
detproductos.precVenta AS venta,
productos.nombre AS producto,
(detalleventa.cantVenta * detproductos.precVenta) AS subtotal,
unidmedida.descripcion AS medida,
categoria.nombre AS categoria,
propietario.nombres AS clienteN,
propietario.apellidos AS clienteA
FROM
ventas
INNER JOIN detalleventa ON detalleventa.id_venta = ventas.id_venta
INNER JOIN detproductos ON detalleventa.id_detProducto = detproductos.id_detProd
INNER JOIN productos ON detproductos.id_producto = productos.id_producto
INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria
INNER JOIN unidmedida ON productos.id_UnidMed = unidmedida.id_unidMed
INNER JOIN propietario ON ventas.id_propietario = propietario.id_propietario
WHERE
ventas.num_factura ='$nuevafac'";

$resultadofactura=$conexion->query($consultafactura);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$factura="";
$total=0;
$primero=0;
$registros=-1;
$total=0;
while($fila=$resultadofactura->fetch_assoc()){
	$factura=$fila['factura'];

}
$contador=0;


$resultadofactura=$conexion->query($consultafactura);

while($row=$resultadofactura->fetch_assoc()){
      

      $contador++;

      if($row['factura']==$factura){
          
      	    if($primero==0){
      	    	
      	    	$pdf->Cell(67);
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(20,0,utf8_decode('Cliente:'),0,0,'');
                $pdf->Cell(30,0,utf8_decode($row['clienteN']." ".$row['clienteA']),0,0,'');
                $pdf->Cell(10);
                $pdf->SetFont('Arial','B',12);
                $pdf->Cell(17,0,utf8_decode('N°:'),0,0,'C');
                $pdf->Cell(1);
                $pdf->Cell(40,0,$row['factura'],0,1,'L');
                $pdf->Ln(7);
                $pdf->Cell(30);
                $pdf->Cell(140,1,'',1,0,'C');
                $pdf->Ln(5);
                
                $pdf->Cell(30);
                $pdf->SetFillColor(206, 229, 191 );
                $pdf->SetFont('Arial','B',14);
                $pdf->Cell(140,7,"Detalle de venta",1,1,'C',1);
                 $pdf->Cell(30);
                 $pdf->SetFont('Arial','B',14);
                 $pdf->SetFillColor(239, 247, 244);
            $pdf->Cell(50,7,"Producto ",1,0,'',1);
            $pdf->Cell(30,7,"Precio",1,0,'',1);
            $pdf->Cell(30,7,"Cantidad",1,0,'',1);
            $pdf->Cell(30,7,"Subtotal",1,1,'',1);
            $primero=1;


      	    }
            $total=$total+$row['subtotal'];
            $pdf->Cell(30);
      	    $pdf->SetFont('Arial','',12);
            $pdf->Cell(50,7,$row['producto'],0,0,'',0);
            $pdf->Cell(30,7,"$ ".$row['venta'],0,0,'',0);
            $pdf->Cell(30,7,$row['cantidad'],0,0,'',0);
           
            $pdf->Cell(30,7,"$ ".$row['subtotal'],0,1,'',0);
      	    

         	
      }

            
}
  
                $pdf->Cell(110);
                $pdf->SetFont('Arial','',12);
                $pdf->SetFillColor(247, 209, 194);
                $pdf->Cell(30,7,"Total a pagar",0,0,'',1);
                $pdf->Cell(30,7,"$ ".$total,0,1,'',1);

$pdf->Output();
?>
<HTML>
<head>
	<title>Reporte de Venta</title>
</head>
<body>
	<h3>Aqui va a ir el reporte de venta</h3>
 </body>
</HTML> 
