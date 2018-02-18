<?php
header("content-type: image/png");
$img = imagecreatetruecolor(100, 40);
$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, rand(0, 100), 0x00);
$white = imagecolorallocatealpha($img, 0xFF, 0xFF, 0xFF,127);
imagefill($img,0,0,$white);
imagesavealpha($img, TRUE);
//生成随机的验证码
$str = '';
for($i = 0; $i < 4; $i++) {
$str.=dechex(rand(0,15));   //生成十六进制的数字

}
$font="C:\Windows\Fonts\comici.ttf";
imagettftext($img,20,0,20,30,$black,$font,$str);
//加入噪点干扰
for($i=0;$i<50;$i++) {
  imagesetpixel($img, rand(0, 100) , rand(0, 100) , $black); 
  imagesetpixel($img, rand(0, 100) , rand(0, 100) , $green);
}
//添加线条
for($i=0;$i<30;$i++){
    $col = imagecolorallocate($img, rand(0, 255), rand(0, 255), rand(0, 255));
    imageline($img, rand(0, 100),rand(0, 100), rand(0, 100), rand(0, 100), $col);
}
//输出验证码
// $pattern = "/(.*).png/";
// file_exists();
$filename='logo.png';
imagepng($img,$filename);
imagepng($img);
imagedestroy($img);