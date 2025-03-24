<?php
require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$qrCode = new QrCode('http://ваш-сайт/upload.php'); // Ссылка на страницу загрузки
$writer = new PngWriter();
$result = $writer->write($qrCode);

header('Content-Type: ' . $result->getMimeType());
echo $result->getString();
?>