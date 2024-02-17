<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/kibra-admin.css" type="text/css" />
<title>Chaos Panel</title>
</head>
<?php
include("settings.php");

session_start();
if(!isset($_SESSION["login"])){
header("Location:index.php");
}else{
?>
<body>
    <?php include("kibra-menu.php"); ?>
    <?php include("connect.php");  ?>

    <?php 
$baglanti->set_charset("utf8");

$sorgu = $baglanti->query("SELECT COUNT(*) FROM players");

if ($sorgu === false) {
    die("Query failed: " . $baglanti->error);
}

$cikti = $sorgu->fetch_array();


$kacarac = $baglanti->query("SELECT COUNT(*) FROM adminmenu");

if ($kacarac === false) {
    die("Query failed: " . $baglanti->error);
}

$nevarmis = $kacarac->fetch_array();


$kacwhitelist = $baglanti->query("SELECT COUNT(*) FROM whitelists");

if ($kacwhitelist === false) {
    die("Query failed: " . $baglanti->error);
}

$kackisi = $kacwhitelist->fetch_array();

$code = $baglanti->query("SELECT COUNT(*) FROM ak4y_battlepass_premiumcodes");

if ($code === false) {
    die("Query failed: " . $baglanti->error);
}

$codep = $code->fetch_array();



?>

    <h1 style="margin-top: 50px; text-align: center; width: 100%; color: #fff; font-size: 20px;">Chaos Panel - Statistics</h1>
    <div  class="card" style="display: inline-block; margin-left: 20%; top: 10%; width: 300px; background-color: #171921;">
  <div class="card-body">
    <h2 style="color: #fff;" class="card-title">Total Players</h2>
    <h6 style="text-align: center; color: green; font-size: 45px;" class="card-subtitle mb-2 text-muted"><?php echo $cikti[0]; ?></h6>
  </div>
</div>

<div  class="card" style="display: inline-block; margin-left: 5%; top: 10%; width: 300px; background-color: #171921;">
  <div class="card-body">
    <h2 style="color: #fff;" class="card-title">Total Staff</h2>
    <h6 style="text-align: center; color: green; font-size: 45px;" class="card-subtitle mb-2 text-muted"><?php echo $nevarmis[0]; ?></h6>
  </div>
</div>

<div  class="card" style="display: inline-block; margin-left: 5%; top: 10%; width: 300px; background-color: #171921;">
  <div class="card-body">
    <h2 style="color: #fff;" class="card-title">Premium Codes</h2>
    <h6 style="text-align: center; color: green; font-size: 45px;" class="card-subtitle mb-2 text-muted"><?php echo $codep[0]; ?></h6>
  </div>
</div>

<div  class="card" style="display: inline-block; margin-left: 5%; top: 10%; width: 300px; background-color: #171921;">
  <div class="card-body">
    <h2 style="color: #fff;" class="card-title">Total Whitelist</h2>
    <h6 style="text-align: center; color: green; font-size: 45px;" class="card-subtitle mb-2 text-muted"><?php echo $kackisi[0]; ?></h6>
  </div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>

