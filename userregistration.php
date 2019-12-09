<html>
<head>
    <title> User Login And Registration </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<br>
<h4 align="right"><a href="intro.php"><font color="white"> < Go back </font></a></h4>
<br>
<br>
<div class="login-box">
    <div class="col-md-10 login-center">
        <h2> Register Here </h2>
        <form method="post">
            <div class="form-group">
            <?php
define('AES_256_CBC', 'aes-256-cbc');
if(isset($_POST['register']))
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
$s = "select* from usertable where name= '$name'";
$encrypted1=encryptthis($p, $key, $iv);
$encrypted2=encryptthis($phone, $key, $iv);
$encrypted3=encryptthis($email, $key, $iv);
$result= mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num==1){
    echo"<h5> Username Already Taken <h5>";
}else{$reg="INSERT INTO usertable(name,password,phone,email) VALUES('$name','$encrypted1','$encrypted2','$encrypted3')";
    mysqli_query($con, $reg);
    echo"<h5> Registration Successful <h5>";
    
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
                <button type="submit" name="register" class="btn btn-primary"> Register </button>
        </form> 
        </div>       
    </div>
    </div>
    </div>   
    </div>        
    <br><br><br>

    
    
</body>
</html>

