<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$a = file_get_contents("http://localhost/UNITEDHANDS/report_contents.php");

$mpdf->WriteHTML($a);
$mpdf->Output();