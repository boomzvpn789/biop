<?php
SESSION_START();
include 'config.php';
if(!$_SESSION['user']['username']){
	header("location: login.php");
}

?>
	
<html>
	
 <head> 
  <meta charset="utf-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <h2><title>SPEED VPN</title></h2>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> 
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Kanit|Mitr|Pridi:400,300&amp;subset=thai,latin" rel="stylesheet" type="text/css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/spacelab/bootstrap.min.css">
  <style>
		body {
		  font-family: 'Kanit', sans-serif;
		  font-family: 'Pridi', serif;
		  font-family: 'Mitr', sans-serif;
		}
		h1 {
		  font-family: 'Kanit', sans-serif;
		  font-family: 'Pridi', serif;
		  font-family: 'Mitr', sans-serif;
		}
    </style> 
    <style type="text/css">
body {
background-image: url('/asset/bg.jpg');
background-repeat: no-repeat;
background-position: center center;
background-attachment: fixed;
-o-background-size: 100% 100%, auto;
-moz-background-size: 100% 100%, auto;
-webkit-background-size: 100% 100%, auto;
background-size: 100% 100%, auto;
}
</style>
 </head>
 <body class="hold-transition register-page"> 
  <div class="register-box"> 
   <section class="content"> 
    <div class="main-panel"> 
     <div class="content"> 
      <div class="container-fluid"> 
       <div class="row"> 
        <div class="col-md-4"> 
         <div class="card card-profile"> 
          <div class="card-avatar"> 
             <center> <a href="#pablo"> <img class="img" src="logo.png"> </a> </center>
          </div> 
          <div class="content"> 
         <center>  
         <h4><b> <font color="#0090FF">WELCOME TO SPEED VPN</font></b></h4> 
           <h5 <b> <font color="#0090FF">AUTO TRUE WALLET</font></b></h5> 
           </center>
         <center>
  <?php
$sql = "select * from users where username='".$_SESSION['user']['username']."'";
$query = mysqli_query($con,$sql) or die ("Error Query");
$result = mysqli_fetch_assoc($query);

?>
	<br />
           <p><b>ชื่อบัญชี <?php echo $result['username'];?></b> </p> 
           <p><b>เครดิตที่เหลือ <?php echo $result['saldo'];?> บาท</B>
              <?php if (isset($user->saldo)) {echo $user->saldo; }?> 
           <form action="wallet.php" method="post"> 
            <div class="form-group"> 
                <br />
           <p>  <font color="red"> นำเลขที่อ้างอิงจากการโอนมาใส่</font><p>  
             
             <p><font color="red"> ดูจากรายงานที่แอพ wallet </font><a href="wallet.jpg">ดูตัวอย่าง</a></p>
             <h3></h3>
             <input type="number" style="width:210px; border:1px" class="form-control text-center" maxlength="20" name="wallet"  placeholder="ใส่เลขอ้างอิง 14หลัก" autofocus>
           </div>
            <input class="btn btn-info btn-round" class="form-control" type="submit" value="ยืนยันเลขอ้างอิง" name="wallet" onclick="this.disabled=1;this.value='รอสักครู่กำลังตรวจสอบเลขอ้างอิง...';document.forms[0].submit();loading()" style="height:40px;font-size16px"> 
           </form> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div> 
     </div> 
     <div>
     </div> 
    </div>
   </section> 
  </div> 
  <div class="amp-viewer-wrapper amp-viewer-is-touch" style="display: none;">
   <div class="amp-viewer">
    <div class="amp-viewer-header" style="transform: translate3d(0px, 0px, 0px);">
     <span class="amp-viewer-icon amp-viewer-icon-close">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewbox="0 0 100 125" style="enable-background:new 0 0 100 100;" xml:space="preserve">
       <path d="M88.8,77.5L60.6,49.3l28.2-28.2c1.2-1.2,1.2-3.1,0-4.2l-8.5-8.5L50,38.7L19.6,8.3l-8.5,8.5c-1.2,1.2-1.2,3.1,0,4.2  l28.2,28.2L11.2,77.5c-1.2,1.2-1.2,3.1,0,4.2l8.5,8.5L50,59.9l30.4,30.4l8.5-8.5C90,80.6,90,78.7,88.8,77.5z"></path>
      </svg></span>
     <div class="amp-viewer-header-main"></div>
    </div>
    <div class="amp-viewer-body" style="transform: translate3d(0px, 0px, 0px);"></div>
   </div>
  </div>
  </center>
 </body>
</html>