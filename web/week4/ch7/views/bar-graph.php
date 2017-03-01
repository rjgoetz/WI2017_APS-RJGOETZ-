<?php

function draw_bar_graph($width, $height, $data, $max_value, $filename) {
  // create rectangle
  $img = imagecreatetruecolor($width, $height);

  // define colors
  $white = imagecolorallocate($img, 255, 255, 255);
  $black = imagecolorallocate($img, 0, 0, 0);
  $blue = imagecolorallocate($img, 51, 122, 183);

  // fill background
  imagefilledrectangle($img, 0, 0, $width, $height, $white);

  // draw graph bars
  $bar_width = $width / ((count($data) *2) + 1);

  for ($i = 0; $i < count($data); $i++) {
    imagefilledrectangle($img, ($i * $bar_width * 2) + $bar_width, $height, ($i * $bar_width * 2) + ($bar_width * 2), $height - ($height / $max_value) * $data[$i][1], $blue);

    imagestringup($img, 5, ($i * $bar_width * 2) + ($bar_width), $height - 5, $data[$i][0], $black);
  }

  // draw rectangle around graph
  imagerectangle($img, 0, 0, $width - 1, $height - 1, $black);

  // draw range up the left side
  for ($i = 1; $i <= $max_value; $i++) {
    imagestring($img, 5, 0, $height - ($i * ($height / $max_value)), $i, $blue);
  }

  imagepng($img, $filename, 5);

  imagedestroy($img);
}
