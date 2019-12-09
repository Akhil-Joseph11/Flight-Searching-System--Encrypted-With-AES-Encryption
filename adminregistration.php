<?php
session_start();
if(!isset($_SESSION['user'])) {
  header('location:adminlogin.php');

}
?>

<!DOCTYPE html>
<head>
<title>
Add Admin
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
<div class="login-box"><font color= "white">
    <div class="col-md-10 login-center">
        <h2> Add Admin </h2>
        <form method="post">
            <div class="form-group">
            <?php
define('AES_256_CBC', 'aes-256-cbc');
if(isset($_POST['confirm']))
{

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
        

$name= $_POST['name'];
$p= $_POST['password'];
$phone= $_POST['phone'];
$email= $_POST['email'];
$s = "select* from admintable where name= '$name'";
$encrypted1=encryptthis($p, $key, $iv);
$encrypted2=encryptthis($phone, $key, $iv);
$encrypted3=encryptthis($email, $key, $iv);
$result= mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
    echo"<h5> Admin Exists! <h5>";
}else{$reg="INSERT INTO admintable(name,password,phone,email) VALUES('$name','$encrypted1','$encrypted2','$encrypted3')";
    mysqli_query($con, $reg);
    echo"<h5> Admin successfully added. <h5>";
    
}
}

?>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="name" class="form-control" required>
                </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text " name="password" class="form-control" required>
                </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
                </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" required>
                </div>
                <button type="submit" name="confirm" class="btn btn-primary"> Confirm </button>
        </form> 
</div>       
</div>
</font>
<br><br><br>
</body>
</html>

