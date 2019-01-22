<?php
/**
 * author: ShenYan.
 * Email：52o@qq52o.cn
 * CreatedTime: 2019/1/22 18:25
 */
error_reporting(0);
Header("Content-Type: image/jpeg");

// Get IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip= $_SERVER['REMOTE_ADDR'];
}

// Time
$actual_time = date('Y-m-d H:i:s', time());

// Get Browser
$browser = $_SERVER['HTTP_USER_AGENT'];

// Log
$myFile = dirname(__FILE__). "/logs.txt";
$fh = fopen($myFile, 'a+');
$stringData = $actual_time .' '. $ip . ' ' . $browser ."\r\n";
fwrite($fh, $stringData);
fclose($fh);

// Generate Image (Es. dimesion is 1x1)
$newimage = ImageCreate(1, 1);
$grigio = ImageColorAllocate($newimage, 255, 255, 255);
ImageJPEG($newimage);
ImageDestroy($newimage);
