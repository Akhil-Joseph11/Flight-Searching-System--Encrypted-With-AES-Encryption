<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'flightdatabase');

$routeid = $_POST['delete'];


$s = "SELECT * FROM routes WHERE routeid = '$routeid'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num>0) {
    $reg = "DELETE FROM routes WHERE routeid='$routeid'";
    mysqli_query($con,$reg);
    echo "Route Deleted Successfullyl!";
    header('location:dr.php');
}else {
    echo "Route Not deleted";
}

?>