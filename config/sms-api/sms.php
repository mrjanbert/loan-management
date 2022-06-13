<?php
// session_start();
// include_once('../database.php');

// if (isset($_POST['send'])) {
    $url = "https://semysms.net/api/3/sms.php"; //Url address for sending SMS
    $phone = '9300344555'; // Phone number
    $msg = 'message';  // Message
    $device = '1';  //  Device code
    $token = '63fa3282e71eca4c5b11a89504f2c6c4';  //  Your token (secret)

    $data = array(
        "phone" => '+63' .$phone,
        "msg" => $msg,
        "device" => $device,
        "token" => $token
    );

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
    $output = curl_exec($curl);
    curl_close($curl);

    echo $output;
// }
?>
  