<?php
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
 <style type="text/css">
    body{
        background-color: lightblue;
        background-image: url("images/login-screen-backgrounds-27.jpg");
        background-position: fixed;
        background-repeat: no-repeat;
        background-size: 1366px 768px;
        }
    .center{
      margin-top: 50px;
    margin-bottom: 50px;
    margin-right: 2000px;
    margin-left: 400px;
    width: 35%;
    border: 3px solid #73AD21;
    padding: 10px;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

 <script>
$(document).ready(function(){
    $("p").mouseover(function(){
        $("#mypar").fadeToggle("slow");
    });
});
</script>

<script type="text/javascript">
 function validateForm() {
    var x = document.forms["myForm"]["email"].value;
    var y = document.forms["myForm"]["pwd"].value;
    if (x == null || x == "") {
        alert("email must be filled out");
        return false;
    }
   else if (y == null || y == "") {
    alert("password must be filled out");
        return false;
   }
}
</script>

</head>
<body>

<div class="center">
<div class="container">
  <p id="mypar" style="font-size:18px; color:white" ><strong>Please fill in your personal details here Mr Doctor...<br>Make sure that correct details are entered.</strong></p> 

<div class="row">
  <div class="col-md-4">



  <?php
if (isset($_POST['submit'])) {
  # code...
$email = $_POST['email'];
$username= $_POST['username'];
$password = $_POST['password'];

$ins="insert into user(id, email, username,Password) values('','$email','$username', '$password')";
$user = mysql_query($ins) or die(mysql_error());
if ($user) {
  echo "<script>alert('Successfully inserted')</script>";
  # code...
}
else{
  echo "<script>alert('insert failed')</script>";
}
}
  ?>
  <script type="text/javascript"></script>
<div id="main">
  <div id="form_sample">
<div class="col-md-4">
  
  <div class="maindiv">
<div class="form_div">
<div class="title">
<h2>Uer details validation.</h2>
</div>
<form action="config.php" method="post">
<h2>Form</h2>

username:
<input class="input" name="name" type="text" value="" size="60"><br>
Email:
<input class="input" name="email" type="text" value="" size="60"><br>
password:
<input class="input" name="password" type="password" value="" size="60">

<input class="submit" name="submit" type="submit" value="Submit">
</form>
</div>

</div>
</div>
</div>
</body>
</html>

   
