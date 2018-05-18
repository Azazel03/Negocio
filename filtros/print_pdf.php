<?php 
function datos(){
	$output = '';
	require_once("../../modelo/class.conexion.php");
	require_once("../../modelo/class.producto.php");
	$find = new Productos();
	$response = $find->reporte_productos($_POST["categoria"]);
	foreach($response as $datos){
		$output .= '<tr>  
                       	  <td>'.$datos["nombre_producto"].'</td>  
                          <td>'.$datos["stock_producto"].'</td>  
                          <td>'.$datos["codigo_producto"].'</td>  
                          <td>'.$datos["categoria_producto"].'</td>  
                          <td>'.$datos["descripcion_producto"].'</td>  
                     </tr>  
                          '; 
	}
	return $output;
}

if($_POST["categoria"]=="vestuario"){
  $categoria = "Vestuario";
}
if($_POST["categoria"]=="alimento"){
  $categoria = "Alimento";
}
if($_POST["categoria"]=="electro"){
  $categoria = "ElectroHogar";
}
if($_POST["categoria"]=="juguete"){
  $categoria = "Juguetes";
}  
if($_POST["categoria"]=="herramienta"){
  $categoria = "Herramienta";
}


require_once("../../modelo/tcpdf/tcpdf.php"); 
$PDF_HEADER_LOGO = 'logo_pdf.png';
$PDF_HEADER_LOGO_WIDTH = "10";
$PDF_HEADER_TITLE = 'Reporte Productos Categoria '.$categoria;
$PDF_HEADER_STRING= 'SistemaMarket 
Gabriel Arcos ©2018';
$obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetAuthor('Gabriel Arcos');  
$obj_pdf->SetTitle("Reporte Productos");
$obj_pdf->SetHeaderData($PDF_HEADER_LOGO, $PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'helvetica', PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('helvetica');  
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, '25', PDF_MARGIN_RIGHT);  
$obj_pdf->setPrintHeader(true);  
$obj_pdf->setPrintFooter(true);  
$obj_pdf->SetAutoPageBreak(TRUE, 10);  
$obj_pdf->SetFont('helvetica', '', 8);  
$obj_pdf->AddPage();  
$content = '';  
$content .= '  
<br/>  
<table border="1" cellspacing="0" cellpadding="1" align="center">  
     <tr style="background-color: black;">  
          <th width="15%" style="color: white;">Nombre</th>  
          <th width="10%" style="color: white;">Cantidad</th>  
          <th width="20%" style="color: white;">Código</th>  
          <th width="10%" style="color: white;">Categoria</th>  
          <th width="45%" style="color: white;">Descripción</th>  
     </tr>  
';  
$content .= datos();  
$content .= '</table>';  
$obj_pdf->writeHTML($content);  
$obj_pdf->Output('productos .'.$categoria.'pdf', 'I');
?>