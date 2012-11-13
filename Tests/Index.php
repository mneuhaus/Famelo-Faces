<?php
require_once __DIR__ . '/../vendor/autoload.php';

$face = new \Famelo\Faces\Face('apocalip@gmail.com');

echo '<img src="' . $face->getImage() . '" />';
?>