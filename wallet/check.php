<?php 
SESSION_START(); 
include 'config.php'; 
$user = $_POST['user']; 
$sql = "select * from users where username='$user'"; 
$query = mysqli_query($con,$sql); 
$result = mysqli_fetch_assoc($query); 
if(isset($result)){ $_SESSION['user'] = $result; header("location: user.php"); 
}else{ 
echo ' <font color="red">USER wrong</font> ';
}
