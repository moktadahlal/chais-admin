<?php
include("settings.php");
session_start();
ob_start();
if(($_POST["username"]==$user) and ($_POST["password"]==$pass)){
$_SESSION["login"] = "true";
$_SESSION["user"] = $user;
$_SESSION["pass"] = $pass;
header("Location:admin.php");
}else{
    ?>
<html>
<head>
<title>Chaos-Admin</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/kibra-error.css" type="text/css" />
</head>
<body>
    <div class="kibra-alert">
        <h1>اسم المستخدم أو كلمة المرور غير صحيحة</h1>
        <p><b>يتم تحويلك إلى صفحة تسجيل الدخول..</p>
</div>
</body>
</html>
<?php 
header("Refresh: 2; url=index.php");
}
ob_end_flush();
?>