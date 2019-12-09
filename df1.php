<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'flightdatabase');

$flightnumber = $_POST['delete'];


$s = "SELECT * FROM flights WHERE flightnumber = '$flightnumber'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num>0) {
    $reg = "DELETE FROM flights WHERE flightnumber='$flightnumber'";
    mysqli_query($con,$reg);
    echo "Flight Deleted Successfullyl!";
    header('location:df.php');
}else {
    echo "Flight Not deleted";
}

?>