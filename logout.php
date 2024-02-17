<?php
session_start();
ob_start();
session_destroy();
echo "You logged out. You are directed to the home page";
header("Refresh: 2; url=index.php");
ob_end_flush();
?>