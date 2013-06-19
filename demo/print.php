<?php

include('../src/QR/QR.php');

$qrCode = QR\QR::generate(isset($_GET['s']) ? $_GET['s'] : 'Hello, World!');
$qrCode->printCode();