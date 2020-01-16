<?php 
 require('fpdf/fpdf.php');

 class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->SetFillColor(200,200,0);
    $this->Image('../assets/img/reporteH.jpg',0,0,220);
    $this->Image('../assets/img/nombrecli.png',70,4,60);
   
    $this->Image('../assets/img/logo1.png',14,4,30);
    $this->Cell(40,20,'',1,0,'C');
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(30);
    // Título
     
     $this->SetTextColor(241,246,241);
    $this->Cell(40,20,'Reporte de Ventas',0,0,'C');
    // Salto de línea
    $this->SetFont('Arial','B',12);
    $this->Cell(35);
    $this->Cell(14,20,'Fecha:',0,0,'C');
    $this->Cell(1);
    $this->Cell(40,20,date('d/m/Y '),0,1,'L');
    $this->Cell(144);
    //$this->Cell(14,0,'Hora:',0,0,'C');
    //$this->Cell(1);
    //$this->Cell(40,0,date(' H:i:s'),0,1,'L');
    $this->Ln(20);
    
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

$consultaventa="SELECT
ventas.id_venta AS venta,
ventas.num_factura AS factura,
ventas.fecha AS fecha,
propietario.nombres AS clienteN,
propietario.apellidos AS clienteA,
empleados.DUI AS dui,
empleados.nombres AS nombreE,
empleados.apellidos AS apellidoE,
productos.nombre AS producto,
detalleventa.cantVenta AS cantidad,
detproductos.precVenta AS precio,
(detalleventa.cantVenta * detproductos.precVenta) AS subtotal
FROM
ventas
INNER JOIN detalleventa ON detalleventa.id_venta = ventas.id_venta
INNER JOIN detproductos ON detalleventa.id_detProducto = detproductos.id_detProd
INNER JOIN productos ON detproductos.id_producto = productos.id_producto
INNER JOIN empleados ON ventas.id_empleado = empleados.id_Empleado
INNER JOIN propietario ON ventas.id_propietario = propietario.id_propietario
ORDER BY
venta ASC";

$resultadoventa=$conexion->query($consultaventa);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$fac=-1;
$total=0;
$primero=0;
$registros=0;

while($fila=$resultadoventa->fetch_assoc()){
	$registros++;
}
$contador=0;

$resultadoventa=$conexion->query($consultaventa);
while($row=$resultadoventa->fetch_assoc()){
      
      $contador++;

      if($row['venta']!=$fac){
          
      	    if($primero>0){
      	    	$pdf->Cell(125);
      	    	$pdf->SetFillColor(234, 202, 133);
      	    	$pdf->Cell(35,7,"Total",1,0,'',1);
         	    $pdf->Cell(35,7,"$ ".$total,1,1,'',1);
                $pdf->Ln(10);
      	    }
      	    
      	    //$pdf->Ln(10);
      	    $pdf->SetFont('Arial','',16);
      	    $pdf->SetFillColor(185, 238, 248);
      	    $pdf->Cell(40,7,"Cliente: ",1,0,'',1);
         	$pdf->Cell(70,7,utf8_decode($row['clienteN']." ".$row['clienteA']),1,0,'',1);
         	$pdf->Cell(50,7,"Fecha de venta",1,0,'C',1);
         	$pdf->Cell(35,7,date('d/m/Y', strtotime($row['fecha'])),1,1,'C',1);
         	$pdf->Cell(40,7,"Empleado",1,0,'',1);
         	$pdf->Cell(70,7,utf8_decode($row['nombreE']." ".$row['apellidoE']),1,0,'',1);
         	$pdf->Cell(50,7,"Factura",1,0,'C',1);
         	$pdf->Cell(35,7,$row['factura'],1,1,'C',1);

         	$fac=$row['venta'];
            $pdf->SetFillColor(164, 241, 164);
         	$pdf->Cell(85,7,"Producto ",1,0,'',1);
         	$pdf->Cell(40,7,"Precio",1,0,'',1);
         	$pdf->Cell(35,7,"Cantidad",1,0,'',1);
         	$pdf->Cell(35,7,"Subtotal",1,1,'',1);
         	$total=0;
         	$primero=1;
      }

            $pdf->SetFont('Arial','',16);
            $pdf->Cell(85,7,$row['producto'],1,0,'',0);
         	$pdf->Cell(40,7,"$ ".$row['precio'],1,0,'',0);
         	$pdf->Cell(35,7,$row['cantidad'],1,0,'',0);
         	$pdf->Cell(35,7,"$ ".number_format($row['subtotal'],2),1,1,'',0);

         	$total=$total+$row['subtotal'];
         	if($registros==$contador){
         		$pdf->Cell(125);
         		$pdf->SetFillColor(234, 202, 133);
      	    	$pdf->Cell(35,7,"Total",1,0,'',1);
         	    $pdf->Cell(35,7,"$ ".$total,1,1,'',1);
         	}
            
}


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
