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
    <?php include("connect.php"); ?>
 
    <?php      $sorgu = $baglanti->query("SELECT * FROM adminmenu");
    
    if (!$sorgu) {
        // Handle the query error
        die("Query failed: " . $baglanti->error);
    }
    
    $sonuc = $sorgu->fetch_assoc(); // Fetch the data
    
    // Check if any row was found
    if ($sonuc) {
        // Use the fetched data
        // ...
    } else {
        echo "No data found for this ID.";
    }

?>
<style>
    .kibra-player-edit {
    background-color: #14151c;
    width: 1000px;
    margin: auto;
    margin-top: 30px;
    height: 800px;
    border: 1px;
    
}

.kibra-player-edit-header {
    background-color: transparent;
    width: 500px;
    height: 100px;
    border: 1px solid #fff;
}

::-webkit-input-placeholder { /* Edge */
  color: white;
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: white;
}

::placeholder {
  color: white;
}

img{
width: 219px;
height: 217px;
margin-top: -270px;
margin-left: 30px;
border-radius: 175px;
border-color: #ecf0f1;
border-width: 1px;
border-style: solid;

}
    </style>

<div class="kibra-player-edit">

<form action="" method="post">
<br>
<input type="text" name="license" style="margin: auto; position:relative; left: 15%; top: -70%; width: 450px; height: 45px; " class="form-control" placeholder="Player License" value="<?php echo $sonuc['license']; ?>" /><br>
<input type="text" name="name" style="margin: auto; position:relative; left: 15%; top: -70%; width: 450px; height: 45px; " class="form-control" placeholder="Player Name" value="<?php echo $sonuc['name']; ?>" /><br>
<input type="text" name="job" style="margin: auto; position:relative; left: 15%; top: -70%; width: 450px; height: 45px; " class="form-control" placeholder="Player Permission" value="<?php echo $sonuc['permission']; ?>" /><br>
<input type="text" name="phone_number" style="margin: auto; position:relative; left: 15%; top: -70%; width: 450px; height: 45px; " class="form-control" placeholder="Citizen Id" value="<?php echo $sonuc['citizenid']; ?>" /><br>
<br>
<input type="submit" style="margin: auto; margin-left: 42.5%; margin-top: 1%; width: 450px; height: 45px; " class="btn btn-primary" value="Save Changes">
<img src="https://media.discordapp.net/attachments/1120524858648961036/1137170705318940714/Picsart_23-06-23_02-32-35-295.png?width=676&height=676" width="50" height="400" />

</form>
</div>
</div>
<div>



<?php 

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
    
    $hex = $_POST['license']; // Post edilen değerleri değişkenlere aktarıyoruz
    $Job = $_POST['permission'];
    $firstname = $_POST['name'];
    $Telephone = $_POST['citizenid'];
    $group = $_POST['group'];


    if ($hex!="" && $Job!="") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($baglanti->query("UPDATE adminmenu SET permission = '$Job', name = '$firstname', citizenid = '$Telephone' WHERE adminmenu='$_GET[id]'")) 
        {
            header("location:vehicles.php"); 
            // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
        }
        else
        {
            echo "An error occurred"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
        }
    }

}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>

