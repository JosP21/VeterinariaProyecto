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
    $this->Cell(40,20,'Reporte de Compras',0,0,'C');
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

$consultacompra="SELECT
factcompra.id_factura as factura,
factcompra.fecha as fecha,
productos.nombre as producto,
detproductos.precCompra as precio,
detproductos.cantidCompra as cantidad,
proveedores.nombre as vendedor,
categoria.nombre as categoria,
(detproductos.precCompra * detproductos.cantidCompra) as subtotal
FROM
factcompra
INNER JOIN detproductos ON detproductos.id_facturaComp = factcompra.id_factura
INNER JOIN proveedores ON factcompra.id_proveedor = proveedores.id_proveedor
INNER JOIN productos ON detproductos.id_producto = productos.id_producto
INNER JOIN categoria ON productos.id_categoria = categoria.id_categoria
ORDER BY
factcompra.id_factura ASC";

$resultadocompra=$conexion->query($consultacompra);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$fac=-1;
$total=0;
$primero=0;
$registros=0;

while($fila=$resultadocompra->fetch_assoc()){
	$registros++;
}
$contador=0;

$resultadocompra=$conexion->query($consultacompra);
while($row=$resultadocompra->fetch_assoc()){
      
      $contador++;

      if($row['factura']!=$fac){
          
      	    if($primero>0){
      	    	$pdf->Cell(125);
      	    	$pdf->SetFillColor(68,251,95);
      	    	$pdf->Cell(35,7,"Total",1,0,'',1);
         	    $pdf->Cell(35,7,"$ ".$total,1,1,'',1);
                $pdf->Ln(10);
      	    }
      	    
      	    //$pdf->Ln(10);
      	    $pdf->SetFont('Arial','',16);
      	    $pdf->SetFillColor(185, 238, 248);
      	    $pdf->Cell(30,7,"Vendedor: ",1,0,'C',1);
         	$pdf->Cell(80,7,utf8_decode($row['vendedor']),1,0,'C',1);
         	$pdf->Cell(50,7,"Fecha de compra",1,0,'C',1);
         	$pdf->Cell(35,7,date('d/m/Y', strtotime($row['fecha'])),1,1,'C',1);
         	

         	$fac=$row['factura'];
            $pdf->SetFillColor(188, 236, 232);
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
         	$pdf->Cell(35,7,"$ ".$row['subtotal'],1,1,'',0);

         	$total=$total+$row['subtotal'];
         	if($registros==$contador){
         		$pdf->Cell(125);
         		$pdf->SetFillColor(68,251,95);
      	    	$pdf->Cell(35,7,"Total",1,0,'',1);
         	    $pdf->Cell(35,7,"$ ".$total,1,1,'',1);
         	}
            
}


/*

$consultaproducto="SELECT * FROM productos";
$resultadop=$conexion->query($consultaproducto);

$consultadistribuidora="SELECT * FROM distribuidora";
$resultadod=$conexion->query($consultadistribuidora);

 $pdf = new PDF();
 $pdf->AliasNbPages();
 $pdf->AddPage();
 $pdf->SetFont('Arial','B',16);

while($row=$resultadoc->fetch_assoc()){
    
	
	$consultaproveedor="SELECT * FROM proveedores";
    $resultadoproveedor=$conexion->query($consultaproveedor);
	while($fila=$resultadoproveedor->fetch_assoc()){

         if($row['id_proveedor']==$fila['id_proveedor']){
         	$pdf->SetFont('Arial','',12);
         	$pdf->SetFillColor(223,215,100);
         	$pdf->Cell(25,10,"Vendedor: ",1,0,'C',0);
         	$pdf->Cell(70,10,utf8_decode($fila['nombre']),1,0,'C',0);
         	$pdf->Cell(35,10,"Fecha de venta",1,0,'C',0);
         	$pdf->Cell(70,10,$row['fecha'],1,1,'C',0);
         }

	}

   $consultadetpro="SELECT * FROM detproductos";
   $resultadodetpro=$conexion->query($consultadetpro);

   

}
*/


$pdf->Output();
?>

<HTML>
<head>
	<title>Reporte de Compra</title>
</head>
<body>
	<h3>Aqui va a ir el reporte de compra</h3>
 </body>
</HTML> 
