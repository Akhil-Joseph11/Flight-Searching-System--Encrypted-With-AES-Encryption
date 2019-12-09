<html>
<head>
    <title> Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="A">
<br>
<h4 align="right"> <a href="intro.php"><font color="white"> < User Login </font></a></h4>
<h1><font color="white"><p align="center"> Flight Booking System <br><br> Admin Login Page </h1></font></p>

<div class="container">
    <div class="login-box">
    <div class="row">
    <div class="col-md-10 login-center">
        <h2> Admin Login </h2>
        <form method="post">
            <div class="form-group">
            <?php
if(isset($_POST['Login']))
{
session_start();
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

mysqli_select_db($con, 'adminregistration');

$name= $_POST['user'];
$pass= $_POST['password'];
$pass1= encryptthis($pass, $key, $iv);

$s = "select * from admintable where name= '$name' && password = '$pass1'";
$s1 = "select * from admintable where name= '$name'";

$result= mysqli_query($con, $s);
$result1= mysqli_query($con, $s1);

$num = mysqli_num_rows($result);
$num1 = mysqli_num_rows($result1);


if($num==1){
    $_SESSION['user'] = $name;
    header('location:home1.php');
}else{
if($num1>0)
 {   
    echo("<b><font><h4>  Incorrect Password </h4></font></b>");
 }else{
    echo("<font><h4>  Invalid Username </h4></font>");
    
}
}
}

?>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="user" class="form-control" required>
                </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" name="Login" class="btn btn-primary"> Login </button>
        </form>        
    </div>
    
    </div>
    </div>   
    </div>        
    
       
</body>
</html>

