<?php

use Dompdf\Dompdf as Dompdf;

require_once 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();

ob_start();
require_once __DIR__ . '/views/vendasDiarias.php';
$dompdf->loadHtml(
    ob_get_clean());


$dompdf->loadHtml($html);
$dompdf->setPaper("A4", "Portrait");
$dompdf->render();
$dompdf->stream("relatorio_diario.pdf", ["Attachment" => false]);

