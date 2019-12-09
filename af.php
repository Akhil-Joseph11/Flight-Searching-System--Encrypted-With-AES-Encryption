<?php
session_start();
if(!isset($_SESSION['user'])) 
{
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
<h2>Add Flights</h2>
<form method="post">
    <div class="form-group">
    <?php
if(isset($_POST['add']))
{

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'flightdatabase');

  

$flightnumber= $_POST['flightnumber'];
$routeid= $_POST['routeid'];
$date1= $_POST['date'];
$departure= $_POST['departure'];
$arrival= $_POST['arrival'];
$seats= $_POST['seats'];
$price= $_POST['price'];

$s = "select* from flights where flightnumber= '$flightnumber'";

$result= mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
    echo"Flight Already Present";
}else{$reg="INSERT INTO flights(flightnumber,routeid,date1,departure,arrival,seats,price) VALUES('$flightnumber','$routeid','$date1','$departure','$arrival','$seats','$price')";
    mysqli_query($con, $reg);
    echo"Flight Entered Successfully";
}
}

?>
    </div>
    <div class="form-group">
    <label>Flight Number</label>
    <input type="text" name="flightnumber" class="form-control" required>
    </div>
    <div class="form-group">
    <label>Route ID</label>
    <input type="text" name="routeid" class="form-control" required>
    </div>
    <div class="form-group">
    <label>Date</label>
     <input type="date" name="date" class="form-control" required>
    </div>
    <div class="form-group">
    <label>Departure</label>
    <input type="time" name="departure" class="form-control" required>
    </div>
    <div class="form-group">
    <label>Arrival</label>
    <input type="time" name="arrival" class="form-control" required>
    </div>
    <div class="form-group">
    <label>No of Seats available</label>
    <input type="text" name="seats" class="form-control" required>
    </div>
    <div class="form-group">
    <label>Price</label>
    <input type="text" name="price" class="form-control" required>
    </div>
    <button type="submit" name="add" class="btn btn-primary"> Add Flight </button>
</form> 
</div> 
</div>   
</font>   
<br><br><br>
</body>
</html>