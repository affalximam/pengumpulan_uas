<?php

require '../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

    // Start output buffering
ob_start();
include('./laporan.php');
$html = ob_get_clean();

// Load HTML content into dompdf
$dompdf->loadHtml($html);

// Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('laporan.pdf', array("Attachment" => 0));

