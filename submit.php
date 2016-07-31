<?php
require_once("../../../wp-load.php");
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$captcha_response = $_POST["g-recaptcha-response"];
$comment = $_POST["comment"];

//establish connection
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
//on connection failure, throw an error
if(!$con) {  
die('Could not connect: '.mysql_error()); 
} 

$url = 'https://www.google.com/recaptcha/api/siteverify';
$secret = '6LdOBiUTAAAAAJOPTXT6n_uozywQcmsFfoDa1z2G';
$fields = array(
            'secret'=>urlencode($secret),
            'response'=>urlencode($captcha_response)
        );

//url-ify the data for the POST
$fields_string = "";
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string = rtrim($fields_string,'&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

//execute post
$result = curl_exec($ch);
curl_close($ch);
$result = json_decode($result, true);
if ($result["success"] == true) {
    $apartdb = DB_NAME;
    $sql="INSERT INTO `$apartdb`.`messages` ( `name` , `email`,`phone`,`message`,`date` ) VALUES ( '$name','$email', '$phone', '$comment', NOW())";
    $result = mysqli_query($con,$sql); 
    if ($result == false) {
        print $sql;
        $url = "Location: " . get_bloginfo('url') . "/fail";
        header($url);
        return;
    }
    $msg = "Someone wants to check out Draper!\n Name: " . $name . "\n Email: " . $email . 
        "\n Phone: " . $phone . "\n Message: " . $comment ;
    $msg = wordwrap($msg, 70);
    $didSend = wp_mail(get_option('admin_email'), "La Jolla Draper - Contacto", $msg);
    if ($didSend == false) {
        $url = "Location: " . get_bloginfo('url') . "/fail";
        header($url);
    } else {
        $url = "Location: " . get_bloginfo('url') . "/success" ;
        header($url);
    }
} else {
    $url = "Location: " . get_bloginfo('url') . "/fail";
    header($url);
}



?>
