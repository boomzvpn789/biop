<?php
SESSION_START();
include 'config.php';

$walletmoney = $_POST['wallet'];

//Show all error, remove it once you finished you code.
ini_set('display_errors', 1);
//Include TrueWallet class.
include_once('manager/TrueWallet.php');
$wallet = new TrueWallet();
//Login with your username and password.

$username = "sd12074@bwit.ac.th";
$password = "0874542610p";
//Logout incase your previous session still exist, no need if you only use 1 user.
$wallet->logout();

//Login into TrueWallet
if($wallet->login($username,$password)){

	$profile = $wallet->get_profile();

	$transaction = $wallet->get_transactions();
	//เช็ค ย้อนหลัง 10 อัน

	for($i = 0;$i < 10;$i++){

			$report = $wallet->get_report($transaction[$i]->reportID);

			$checkid = $report->section4->column2->cell1->value; //เลขที่อ้างอิง

			$money = $report->section3->column1->cell1->value; //จำนวนเงิน


			//เช็คเลขที่อ้างอินกับจำนวนเงินที่โอนมา ถ้าไม่ตรงเงือนไข จะแสดง    รายการผิดพลาดลองใหม่อีกครั้ง
			if($walletmoney == $checkid && $money == 1){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				// ถ้า status กับเลขที่อ้างอิง ไม่มี
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
			}else if($walletmoney == $checkid && $money == 2){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 3){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 4){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 5){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 6){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 7){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 8){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 9){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 10){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 11){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 12){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 13){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 14){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 15){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 16){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 17){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 18){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 19){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 20){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 21){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 22){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 23){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 24){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 25){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 26){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 27){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 28){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 29){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 30){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 31){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 32){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 33){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 34){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 35){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 36){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 37){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 38){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 39){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 40){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 41){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 42){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 43){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 44){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 45){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 46){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 47){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 48){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 49){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 50){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 51){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 52){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 53){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 54){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 55){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 56){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 57){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 58){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 59){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 60){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 61){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 62){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 63){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 64){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 65){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 66){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 67){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 68){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 69){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 70){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 71){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 72){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 73){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 74){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 75){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 76){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 77){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 78){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 79){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 80){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 81){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 82){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 83){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 84){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 85){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 86){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 87){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 88){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 89){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 90){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 91){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 92){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 93){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 94){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 95){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 96){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 97){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 98){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 99){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 100){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 101){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 102){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 103){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 104){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 105){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 106){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 107){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 108){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 109){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 110){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 111){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 112){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 113){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 114){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 115){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 116){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 117){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 118){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 119){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 120){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 121){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 122){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 123){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 124){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 125){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 126){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 127){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 128){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 129){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 130){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 131){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 132){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 133){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 134){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 135){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 136){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 137){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 138){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 139){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 140){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 141){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 142){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 143){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 144){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 145){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 146){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 147){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 148){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 149){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 150){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 151){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 152){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 153){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 154){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 155){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 156){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 157){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 158){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 159){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 160){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 161){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 162){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 163){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 164){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 165){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 166){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 167){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 168){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 169){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 170){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 171){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 172){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 173){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 174){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 175){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 176){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 177){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 178){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 179){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 180){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 181){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 182){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 183){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 184){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 185){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 186){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 187){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 188){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 189){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 190){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 191){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 192){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 193){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 194){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 195){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 196){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 197){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 198){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 199){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 200){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 201){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 202){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 203){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 204){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 205){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 206){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 207){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 208){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 209){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 210){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 211){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 212){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 213){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 214){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 215){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 216){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 217){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 218){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 219){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 220){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 221){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 222){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 223){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 224){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 225){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 226){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 227){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 228){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 229){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 230){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 231){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 232){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 233){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 234){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 235){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 236){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 237){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 238){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 239){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 240){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 241){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 242){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 243){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 244){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 245){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 246){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 247){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 248){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 249){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 250){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 251){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 252){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 253){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 254){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 255){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 256){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 257){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 258){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 259){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 260){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 261){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 262){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 263){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 264){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 265){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 266){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 267){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 268){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 269){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 270){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 271){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 272){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 273){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 274){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 275){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 276){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 277){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 278){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 279){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 280){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 281){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 282){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 283){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 284){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 285){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 286){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 287){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 288){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 289){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 290){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 291){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 292){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 293){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 294){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 295){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 296){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 297){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 298){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 299){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
				}else if($walletmoney == $checkid && $money == 300){
				$sql = "select * from users where username='".$_SESSION['user']['username']."'";
				$sqle = "select * from histrory where NumberWallet='$walletmoney'";
				$query = mysqli_query($con,$sqle);
				$result = mysqli_fetch_assoc($query);
				if($result['status'] == ''){
					echo 'คุณได้เติมเงินจำนวน '.$money.'  บาทสำเร็จ';
					$sql = "insert into histrory (NumberWallet,money,username,status) values ('$walletmoney','$money','".$_SESSION['user']['username']."',1)";
					mysqli_query($con,$sql);
					$sql1 = "insert into users (saldo) values ('$money') where username='".$_SESSION['user']['username']."'";
					$sql1 = "update users set saldo=saldo+'".$money."'where username='".$_SESSION['user']['username']."'";
					mysqli_query($con,$sql1) or die; ('Error Query');
				}else{
					echo 'หมายเลขอ้างอิงนี้ถูกใช้งานแล้ว';
				}
				break;
			}else{
				echo 'รายการผิดพลาดโปรดลองใหม่อีกครั้ง';
				break;
			}
	}

	//Logout
	$wallet->logout();
}else{
	echo 'ยังไม่มีการเชื่อมต่อบัญชี!';
}
?>
