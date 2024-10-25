<?php
ob_start();

require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');
include('../Clases/conexion2.php');

$coleccion = 'medidores_entrada';
$datos = leerDatos($coleccion);

// Crear nueva instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Configuraciones iniciales del PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CAEV');
$pdf->SetTitle('Reporte de Medidores');
$pdf->SetSubject('Medidores PDF');
$pdf->SetKeywords('PDF, medidores, CAEV');

// Configuración del encabezado con logo y texto
$pdf->SetHeaderData('../IMG/logo.jpg', 20, 'Reporte de Medidores', 'Generado por CAEV');
$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

// Márgenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Añadir una página
$pdf->AddPage();

// Establecer fuente
$pdf->SetFont('helvetica', '', 7.5);

// Título
$html = '<h1 style="font-size:14px;">Reporte de Medidores</h1>';

// Iniciar la tabla en HTML con estilos
$html .= '
<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color: #cccccc;"> <!-- Fondo gris para el encabezado -->
            <th style="font-weight: bold;">ID</th>
            <th style="font-weight: bold;">Número</th>
            <th style="font-weight: bold;">Marca</th>
            <th style="font-weight: bold;">Modelo</th>
            <th style="font-weight: bold;">Proveedor</th>
            <th style="font-weight: bold;">Proceso de adquisición</th>
            <th style="font-weight: bold;">Factura</th>
            <th style="font-weight: bold;">Fecha de facturación</th>
            <th style="font-weight: bold;">Fecha de entrada</th>
        </tr>
    </thead>
    <tbody>';

// Recorrer los datos de la tabla y añadirlos al PDF
foreach ($datos as $dato) {
    $html .= '<tr>
        <td>' . htmlspecialchars($dato->_id) . '</td>
        <td>' . htmlspecialchars($dato->cantidad) . '</td>
        <td>' . htmlspecialchars($dato->marca) . '</td>
        <td>' . htmlspecialchars($dato->modelo) . '</td>
        <td>' . htmlspecialchars($dato->provedor) . '</td>
        <td>' . htmlspecialchars($dato->procesoad) . '</td>
        <td>' . htmlspecialchars($dato->factura) . '</td>
        <td>' . htmlspecialchars($dato->fechafactura) . '</td>
        <td>' . htmlspecialchars($dato->fechaentrada) . '</td>
    </tr>';
}

$html .= '</tbody></table>';

// Escribir el HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Limpiar el buffer de salida y generar el PDF
ob_end_clean();
$pdf->Output('reporte_medidores.pdf', 'I');
?>
