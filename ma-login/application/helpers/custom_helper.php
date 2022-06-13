<?php

use Dompdf\Dompdf;

function generatePdf($html = '', $filename = 'document', $size = 'A4', $orientation = 'potrait', $attachment = false)
{
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper($size, $orientation);

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($filename, ['Attachment' => $attachment]);
}
