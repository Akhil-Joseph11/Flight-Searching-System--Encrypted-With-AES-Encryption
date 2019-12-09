<?php
session_start();
if(!isset($_SESSION['user'])) {
  header('location:adminlogin.php');

}
?>

<!DOCTYPE html>
<head>
<title>
Add Routes
</title>
<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

td a {
    color: white;
    text-decoration: none;
}
</style>
</head>
<body>
<p>
<ul id="nav">
   <li><a href="home1.php">HOME</a></li>
   <li><a href="dashboard1.php">DASHBOARD</a></li>
   <li><a href="contactus1.php">CONTACT US</a></li>
   <li><a href="logout1.php"> LOGOUT </a></li>
   </ul>
</p>
<br>
<font color= "white">
<div class="login-box" class="text1">
<div class="col-md-10 login-center">
<h2>Add Routes</h2>
<form  method="post">
    <div class="form-group">
    <?php
if(isset($_POST['add']))
{
$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'flightdatabase');

  

$routeid= $_POST['routeid'];
$from= $_POST['from'];
$to= $_POST['to'];
$distance= $_POST['distance'];
$s = "select* from routes where routeid= '$routeid'";

$result= mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
    echo"Route Already Present";
}else{$reg="INSERT INTO routes(routeid,from1,to1,distance) VALUES('$routeid','$from','$to','$distance')";
    mysqli_query($con, $reg);
    echo"Route Entered Successfully";
}
}

?>
    </div>
    <div class="form-group">
    <label>Route ID</label>
    <input type="text" name="routeid" class="form-control" required>
    </div>
    <div class="form-group">
    <label>From</label>
    <input type="text " name="from" class="form-control" required>
    </div>
    <div class="form-group">
    <label>To</label>
     <input type="text" name="to" class="form-control" required>
    </div>
    <div class="form-group">
    <label>Distance</label>
    <input type="text" name="distance" class="form-control" required>
    </div>
    <button type="submit" name="add" class="btn btn-primary"> Add Route </button>
</form> 
</div> 
</div>   
</font>   
<br><br><br>
</body>
</html>