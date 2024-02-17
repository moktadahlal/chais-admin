<?php 

if ($_GET) 
{

include("connect.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($baglanti->query("DELETE FROM ak4y_battlepass_premiumcodes WHERE code='$_GET[id]'")) 
{
    header("location:bpasse.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
}
}



?>