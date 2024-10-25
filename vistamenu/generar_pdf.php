<?php
// Iniciar el buffer de salida para evitar el error de TCPDF
ob_start();

// Incluir TCPDF
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php'); // Asegúrate de que la ruta sea correcta

// Incluir el archivo de conexión y funciones
include '../Clases/conexion.php';

$coleccion = 'medidores'; // Reemplaza con el nombre de tu colección
$datos = leerDatos($coleccion);

// Crear nueva instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Configuraciones iniciales del PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CAEV');
$pdf->SetTitle('Reporte de Medidores');
$pdf->SetSubject('Medidores PDF');
$pdf->SetKeywords('PDF, medidores, CAEV');

$pdf->SetHeaderData('../IMG/logo.jpg', 20, 'Reporte de Medidores', 'Generado por CAEV');




// Fuente de encabezado y pie de página
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Márgenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Añadir una página
$pdf->AddPage();

// Establecer fuente
$pdf->SetFont('helvetica', '', 7.5);

// Escribir el título
$html = '<h1>Reporte de Medidores</h1>';


// Iniciar la tabla en HTML con estilos
$html .= '
<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color: #cccccc;"> <!-- Fondo gris para el encabezado -->
            <th style="font-weight: bold;">ID</th>
            <th style="font-weight: bold;">Número</th>
            <th style="font-weight: bold;">Cuenta</th>
            <th style="font-weight: bold;">Usuario</th>
            <th style="font-weight: bold;">Dirección</th>
            <th style="font-weight: bold;">Tipo de Usuario</th>
            <th style="font-weight: bold;">Obra</th>
            <th style="font-weight: bold;">Lleva Cuadro</th>
            <th style="font-weight: bold;">Fecha Instalación</th>
            <th style="font-weight: bold;">Fecha Salida</th>
        </tr>
    </thead>
    <tbody>';

// Recorrer los datos de la tabla y añadirlos al PDF
foreach ($datos as $dato) {
    $html .= '<tr>
        <td>' . $dato->_id . '</td>
        <td>' . $dato->num_medidor . '</td>
        <td>' . $dato->cuentamedidor . '</td>
        <td>' . $dato->nombreusuario . '</td>
        <td>' . $dato->direccion . '</td>
        <td>' . $dato->tipousuario . '</td>
        <td>' . $dato->obra . '</td>
        <td>' . $dato->cuadro . '</td>
        <td>' . $dato->fechainstalacion . '</td>
        <td>' . $dato->fechasalida . '</td>
    </tr>';
}

$html .= '</tbody></table>';

// Escribir el HTML en el PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Limpiar el buffer de salida
ob_end_clean();

// Cerrar y generar el PDF
$pdf->Output('reporte_medidores.pdf', 'I'); // 'I' es para abrir en el navegador; puedes cambiar a 'D' para forzar la descarga
?>
