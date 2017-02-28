<?php

// create captcha
define('CAPTCHA_NUMCHARS', 6);
define('CAPTCHA_WIDTH', 150);
define('CAPTCHA_HEIGHT', 40);

$pass_phrase = "";
for ($i = 0; $i < CAPTCHA_NUMCHARS; $i++) {
  $pass_phrase .= chr(rand(97, 122));
}

$img = imagecreatetruecolor(CAPTCHA_WIDTH, CAPTCHA_HEIGHT);

// color variables
$grey = imagecolorallocate($img, 224, 224, 224);
$dk_grey = imagecolorallocate($img, 64, 64, 64);
$blue = imagecolorallocate($img, 51, 122, 183);

// fill background
imagefilledrectangle($img, 0, 0, CAPTCHA_WIDTH, CAPTCHA_HEIGHT, $grey);

// draw random lines
for ($i = 0; $i < 5; $i++) {
  imageline($img, 0, rand() % CAPTCHA_HEIGHT, CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $blue);
}

// sprinkle in some dots
for ($i = 0; $i < 50; $i++) {
  imagesetpixel($img, rand() % CAPTCHA_WIDTH, rand() % CAPTCHA_HEIGHT, $blue);
}

// draw pass-phrase string
imagettftext($img, 18, 0, 35, CAPTCHA_HEIGHT - 12, $dk_grey, '../public/fonts/Courier New Bold.ttf', $pass_phrase);

header("Content-type: image/png");
imagepng($img);\

imagedestroy($img);
