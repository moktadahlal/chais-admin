<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/kibra-admin.css" type="text/css" />
<title>Chaos Panel Panel</title>
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
  
  
  
  
  
  ?>
<h1 style="margin-top: 50px; text-align: center; width: 100%; color: #fff; font-size: 20px;">Chaos Panel - Permissions List</h1>
<button data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="width: 500px; margin-left: 36.8%;" type="button" class="btn btn-success" >Add Staff</button><br>
<table class="table" style="border: 1px solid #fff; color: #fff; background-color: #171921; margin: auto; width: 500px;"><br>
<thead>
<tr>
      <th scope="col"></th>
      <th scope="col">License</th>
      <th scope="col">Group</th>
      <th scope="col">Name</th>
      <th scope="col">Permission</th>
      <th scope="col">Citizen Id</th>
      <th scope="col">Edit</th>
      <th scope="col">Process</th>

      </tr>
</thead>
<tbody>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="permissionekle.php" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">License: </label>
            <input name="license" type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Permission (Grade):</label>
            <input name="permission" type="text" class="form-control" id="recipient-name">
          </div>
      </div>
      <div class="modal-footer">
          <input class="btn btn-danger" value="Add" type="submit"/>
    </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php 

$sorgu = $baglanti->query("SELECT * FROM adminmenu"); 

while ($sonuc = $sorgu->fetch_assoc()) { 

// Check if the keys exist in the $sonuc array before accessing them
if (isset($sonuc['Id'])) {
    $hex = $sonuc['Id'];
} else {
    $hex = null; // or handle the case where 'identifier' key doesn't exist
}

if (isset($sonuc['name'])) {
  $Job = $sonuc['name'];
} else {
  $Job = null; // or handle the case where 'job' key doesn't exist
}

if (isset($sonuc['license'])) {
    $adsoyad = $sonuc['license'];
} else {
    $adsoyad = null; // or handle the case where 'firstname' or 'lastname' key doesn't exist
}

if (isset($sonuc['group'])) {
    $usergroup = $sonuc['group'];
} else {
    $usergroup = null; // or handle the case where 'group' key doesn't exist
}

if (isset($sonuc['permission'])) {
    $Cid = $sonuc['permission'];
} else {
    $Cid = null; // or handle the case where 'sex' key doesn't exist
}

if (isset($sonuc['citizenid'])) {
    $Telephone = $sonuc['citizenid'];
} else {
    $Telephone = null; // or handle the case where 'phone_number' key doesn't exist
}

?>
    <tr>
      <th scope="row"><?php echo $hex; ?></th>
      <td><?php echo $adsoyad; ?></td>
      <td><?php if($usergroup == 'user'){?> Normal User <?php } else {?><font color="red">Staff</font><?php } ?></td>
      <td><font color="#0091ff"><?php echo $Job; ?></font></td>
      <td><font color="#7FFFD4"><?php echo $Cid; ?></font></td>
      <td><h5><span class="badge bg-danger"><?php echo $Telephone; ?></span></h5></td>
      <td><a target="blank" href="editpp.php?id=<?php echo $hex; ?>"<button class="btn btn-primary" type="button">Edit</button></td>
      <td><a href="deletevehicle.php?id=<?php echo $hex; ?>"<button class="btn btn-danger" type="button">Revoke</button></td>


    </tr>
    <?php 
} 
?>



  </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>

<?php
}
?>

