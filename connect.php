<?php $baglanti = new mysqli("localhost", "root", "", "sw");

if ($baglanti->connect_errno > 0) {
    die("<b>Connection error:</b> " . $baglanti->connect_error);
}

$baglanti->set_charset("utf8");

?>