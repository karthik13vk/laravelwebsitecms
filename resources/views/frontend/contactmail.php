<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST["h_quantity"])) {
  // echo "data1"; exit;
  date_default_timezone_set("Asia/Calcutta");
  $h_name = isset($_POST["h_name"]) ? $_POST["h_name"] : "";
  $h_email = isset($_POST["h_email"]) ? $_POST["h_email"] : "";
  $h_subject = isset($_POST["h_subject"]) ? $_POST["h_subject"] : "";
  $h_phone = isset($_POST["h_phone"]) ? $_POST["h_phone"] : "";
  $h_quantity = isset($_POST["h_quantity"]) ? $_POST["h_quantity"] : ""; 
  $h_message = isset($_POST["msg"]) ? $_POST["msg"] : "";


  $secretAPIkey = '6Lf782ApAAAAAI1csvfm7DUjrnUeesHNXfbjJyhc';
   // reCAPTCHA response verification
   
     
        $hed = array(
          'Content-Type: application/json'
      );
      $ch = curl_init();
      $api_link = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query([
    'secret' => $secretAPIkey,
    'response' => $_POST['g-recaptcha-response'],
]);
      
      curl_setopt($ch, CURLOPT_URL, $api_link);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $hed);
      $server_output = curl_exec($ch);
      curl_close($ch);
      $data = json_decode($server_output);



  
  if (empty($h_name) ||    empty($h_email) ||  empty($h_subject) || empty($h_quantity) || empty($h_message) || empty($h_phone)) {
    // echo 1;
    echo json_encode(array(0 => "validation"));
    exit;
  }

  else if ($data->success != 1)
  {
    echo json_encode(array(0 => "capcha"));
    exit;
   
  }
    
    	$to = 'smile3denterprises@gmail.com';
			$subject = "Enquiry Form from Smile Website ";
			$headers = "From:smile3denterprises@gmail.com\r\n";
			$headers .="Reply-To:smile3denterprises@gmail.com\r\n";
// 			$headers .= "BCC: smile3denterprises@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

      $msg = "<table width=70% cellspacing=0 cellpadding=0 style='border-collapse:collapse;border: 1px solid #939393;font-family:Arial, Helvetica, sans-serif;'>
    
  
      <tr>
      <td colspan='2' style=' border: 1px solid #000; text-align:center;color: #fff;font-size: 20px;padding:6px 10px;background: #000;font-family:Arial, Helvetica, sans-serif;'>Smile  Enquiry Form</td>
    </tr>
    
    <tr style='background: #ffff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Name</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>" . $h_name . "</td>
    </tr>
    
    
    <tr style='background: #ffff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Email</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>" . $h_email .  "</td>
    </tr>
    
    <tr style='background: #fff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Subject</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>" . $h_subject . "</td>
    </tr>
    
    
    <tr style='background: #fff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Mobile Number</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>"  . $h_phone .  "</td>
    </tr>
    
    
    <tr style='background: #fff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Quantity</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>" . $h_quantity . "</td>
    </tr>


        
    <tr style='background: #fff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Message</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>" . $h_message . "</td>
    </tr>
     
    
      </table>";

  $result = mail($to, $subject, $msg, $headers);

  if ($result) {
    // echo 3;
    echo json_encode(array(0 => "success"));
    exit;
  } else {
    // echo 4;
    echo json_encode(array(0 => "tryagain"));
    exit;
  }

  // echo 5;
  echo json_encode(array(0 => "tryagain"));
  exit(0);
  // };
} 


 else if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  // echo "data"; exit;
  date_default_timezone_set("Asia/Calcutta");
  $h_name = isset($_POST["h_name"]) ? $_POST["h_name"] : "";
  $h_phone = isset($_POST["h_phone"]) ? $_POST["h_phone"] : "";
  $h_email = isset($_POST["h_email"]) ? $_POST["h_email"] : "";
  $h_subject = isset($_POST["h_subject"]) ? $_POST["h_subject"] : "";
  $h_message = isset($_POST["msg"]) ? $_POST["msg"] : "";


  $secretAPIkey = '6Lf782ApAAAAAI1csvfm7DUjrnUeesHNXfbjJyhc';
   // reCAPTCHA response verification
   
     
        $hed = array(
          'Content-Type: application/json'
      );
      $ch = curl_init();
      $api_link = "https://www.google.com/recaptcha/api/siteverify?" . http_build_query([
    'secret' => $secretAPIkey,
    'response' => $_POST['g-recaptcha-response'],
]);
      
      curl_setopt($ch, CURLOPT_URL, $api_link);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $hed);
      $server_output = curl_exec($ch);
      curl_close($ch);
      $data = json_decode($server_output);


  
  if (empty($h_name) ||    empty($h_email)  || empty($h_phone) ||  empty($h_subject) || empty($h_message)) {
    // echo 1;
    echo json_encode(array(0 => "validation"));
    exit;
  }

  else if ($data->success != 1)
  {
    echo json_encode(array(0 => "capcha"));
    exit;
   
  }
    
    	$to = 'smile3denterprises@gmail.com';
			$subject = "Enquiry Form from Smile Website ";
			$headers = "From:smile3denterprises@gmail.com\r\n";
			$headers .="Reply-To:smile3denterprises@gmail.com\r\n";
// 			$headers .= "BCC: smile3denterprises@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

      $msg = "<table width=70% cellspacing=0 cellpadding=0 style='border-collapse:collapse;border: 1px solid #939393;font-family:Arial, Helvetica, sans-serif;'>
    
  
      <tr>
      <td colspan='2' style=' border: 1px solid #000; text-align:center;color: #fff;font-size: 20px;padding:6px 10px;background: #000;font-family:Arial, Helvetica, sans-serif;'>Smile  Enquiry Form</td>
    </tr>
    
    <tr style='background: #ffff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Name</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>" . $h_name . "</td>
    </tr>
    
    
    <tr style='background: #ffff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Phone</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>" . $h_phone .  "</td>
    </tr>
    
    <tr style='background: #fff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Email</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>" . $h_email . "</td>
    </tr>
    
    
    <tr style='background: #fff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Subject</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>"  . $h_subject .  "</td>
    </tr>
    

    <tr style='background: #fff;'>
    <td valign='top' style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>Message</td>
    
    <td valign=top style='border: 1px solid #000; width:50%; padding:6px 10px;font-family:Arial, Helvetica, sans-serif;'>" . $h_message . "</td>
    </tr>
     
    
      </table>";

  $result = mail($to, $subject, $msg, $headers);

  if ($result) {
    // echo 3;
    echo json_encode(array(0 => "success"));
    exit;
  } else {
    // echo 4;
    echo json_encode(array(0 => "tryagain"));
    exit;
  }

  // echo 5;
  echo json_encode(array(0 => "tryagain"));
  exit(0);
  // };
}