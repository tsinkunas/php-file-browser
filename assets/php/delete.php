<?php
$path =  "./" . $_GET['path'];
if (array_key_exists('file', $_GET)) {
    if ($_GET['action'] == 'delete'){
        unlink($path . "/" . $_GET['file']);
        header("Location: ?path=" . $_GET['path']);
        exit;
    }        
    }
?>
