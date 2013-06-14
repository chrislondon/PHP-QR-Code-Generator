<?php

include('QR/QR.php');

$qrCode = QR\QR::generate(isset($_GET['s']) ? $_GET['s'] : '01234567');
$qrCode->printCode();