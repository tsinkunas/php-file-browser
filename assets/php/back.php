<?php
$pathArr = explode('/', $path);
array_shift($pathArr);
array_pop($pathArr);
array_pop($pathArr);
$back = implode('/', $pathArr);
?>