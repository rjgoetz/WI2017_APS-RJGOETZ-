<?php

$dbc = new mysqli('localhost', 'root', 'root', 'car_swap');

if ($dbc -> connect_errno) {
  echo 'Failed to connect to MySQL: (' . $dbc -> connect_errno . ') ' . $dbc -> connect_error . '.';
}
