<?php
$img = imagecreatetruecolor(100, 40);
$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
$white = imagecolorallocatealpha($img, 0, 0, 0, 127);
imagefill($img,0,0,$white);
imagesavealpha($img, TRUE);
//生成随机的验证码
$str = '';
for($i = 0; $i < 4; $i++) {
$str.=dechex(rand(0,15));   //生成十六进制的数字
}
for($i=0;$i<500;$i++) {
      imagesetpixel($img, rand(0, 100) , rand(0, 100) , $black); 
      imagesetpixel($img, rand(0, 100) , rand(0, 100) , $green);
    }
$font='C:\Windows\Fonts\simsun.ttc';
imagettftext($img,30,0, 10,35,$black,$font,$str );

//输出验证码
header("content-type: image/png");
// imagepng($img);
$filename='logo.png';
imagepng($img,$filename);
imagedestroy($img);

$url = 'http://www.iyi8.com/uploadfile/2014/0521/20140521105216901.jpg';
$content = file_get_contents($url);
$filename1 = 'bj.jpg';
file_put_contents($filename1, $content);

//开始添加水印操作logo
$im = imagecreatefromjpeg($filename1);
$logo = imagecreatefrompng('logo.png');
$size = getimagesize('logo.png');
imagecopy($im, $logo, 15, 15, 0, 0, $size[0], $size[1]); 
 
header("content-type: image/jpeg");
imagejpeg($im);
