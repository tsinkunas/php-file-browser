<?php
$file = $path . $_GET['file'];
if (array_key_exists('file', $_GET)) {
    if ($_GET['action'] == 'download') {
        ob_clean();
        ob_flush();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}
?>