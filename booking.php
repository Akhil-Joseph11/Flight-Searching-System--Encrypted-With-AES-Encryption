<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:intro.php');
}
?>

<!DOCTYPE html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
<ul>
   <li><a href="home.php">HOME</a></li>
   <li><a href="dashboard.php">DASHBOARD</a></li>
   <li><a href="contactus.php">CONTACT US</a></li>
   <li><a href="logout.php"> LOGOUT </a></li>
</ul>
<br>

<?php
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
$iv = '1000100010001000';
$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'flightdatabase');
function encryptthis($data, $key, $iv) {
    $encryption_key = base64_decode($key);
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted);
    }

function decryptthis($data, $key, $iv) {
    $encryption_key = base64_decode($key);
    $new_data= base64_decode($data);
    return openssl_decrypt($new_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }

$name = $_SESSION['user'];
$name1= encryptthis($name, $key, $iv);
mysqli_select_db($con,'flightdatabase');

$flightnumber = $_POST['book'];


$s = "SELECT * FROM flights WHERE flightnumber = '$flightnumber'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num=1) 
{   $reg = "INSERT INTO bookings(user,flightnumber,from1,to1,date1,departure,arrival,price) select '$name1',flightnumber,from1,to1,date1,departure,arrival,price from routes R, flights F where F.flightnumber='$flightnumber' AND F.routeid=R.routeid";
    mysqli_query($con,$reg);
    $reg1 = "UPDATE flights set seats = seats - 1 where flightnumber = '$flightnumber' AND seats > 0";
    mysqli_query($con,$reg1);
    echo "<font color=white><h3> Your Ticket Has Been Booked! </h3></font>";

}else {
    echo "Error. Flight not found!";
}

?>