
<?php

session_start();
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "excursionnest"; 

// Create connection 
$conn = mysqli_connect($servername, $username, $password, $dbname); 
// Check connection 
if(!$conn) 
{ 
    die("Connection failed: " . mysqli_connect_error()); 
} 

$mail= $_POST['email'];

$s = "select * from user where mail = '$mail'";
$result = mysqli_query($conn,$s);

$n = mysqli_num_rows($result);

if($n==1){
    header('location:signup.html');
}
else{
$sql = "INSERT INTO user (Name, Phone ,mail, password,location) VALUES 
				('$_POST[name]', '$_POST[phone]','$_POST[email]', '$_POST[pwd]', '$_POST[location]')";
                
                if (mysqli_query($conn, $sql)) 
                { 
                    header('location: login.html'); 
                } 
            }
            mysqli_close($conn);

?>