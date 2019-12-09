<html>
<head>
    <title> User Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<br>
<h4 align="right"><font color="white">Admin? </font><a href="adminlogin.php"> Click Here </a></h4>
<h1><font color="white"><p align="center"> Flight Booking System <br><br> User Login <br></h1></font></p>
<br>
<div class="container">
    <div class="login-box">
    <div class="row">
    <div class="col-md-10 login-center">
        <h2> Login Here </h2>
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


$name= $_POST['user'];
$pass= $_POST['password'];
$pass1= encryptthis($pass, $key, $iv);

$s = "select* from usertable where name= '$name' && password = '$pass1'";
$s1 = "select * from usertable where name= '$name'";

$result= mysqli_query($con, $s);
$result1= mysqli_query($con, $s1);

$num = mysqli_num_rows($result);
$num1 = mysqli_num_rows($result1);

if($num==1){
    $_SESSION['user'] = $name;
    header('location:home.php');
}else{if($num1>0)
    {   
       echo("<b><font><h4>  Incorrect Password </h4></font></b>");
    }else{
       echo("<b><font><h4>  Invalid Username </h4></font></b>");
       
   }
}
}
?>
            </div>
            <div class="form-group">
                <input type="text" name="user" class="form-control" placeholder="Username" required>
                </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                </div>
                <button type="submit" name="Login" class="btn btn-primary"> Login </button>
                </form>   
                
        <h4 align="center"> Not Registered Yet? <a href="userregistration.php"><font color="white"> Click Here </font></a></h4>  

    </div>
             
    </div>
    
    
</body>
</html>

