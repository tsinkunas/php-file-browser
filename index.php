<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File browser</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
        <form action="" method="POST">
            <label for="">Please enter password for corection: </label>
            <input type="password" name="passwd" placeholder="admin">
            <input type="submit" value="Submit">
        </form>
    <?php require_once './assets/php/helper.php'; ?>

    <?php
    $path = "./" . $_GET['path'];
    $dir = scandir($path);

    print('<table>');
    print('<thead><tr><th class = "type">Type</th><th>Name</th><th class = "action">Action</th></tr></thead>');
    print('<tbody');
    foreach ($dir as $dirName) {
        $file = './?path=' . $_GET['path'] . $dirName;
        if (($dirName != '.') && ($dirName != '..')) {
            print('<tr><td>' .
                (is_dir($path . $dirName) ? '<a href=./?path=' . $_GET['path'] . urlencode($dirName) .
                    "/><string class='dir'>&#x1F5C0" : "<string class='file'>&#x1F5CE") . '</td>');
            print('<td>' .
                (is_dir($path . $dirName) ? '<a href=./?path=' . $_GET['path'] . urlencode($dirName) .
                    '/>' . $dirName . '</a></td>' : $dirName));
            print('<td>');
            if ($_POST['passwd'] == 'admin') {
                print((is_file($path . $dirName) ? "<button id='download' onclick=location.href='./?path=" . $_GET['path'] .
                    "&action=download" . "&file=" . urlencode($dirName) . "'> Download </button>" : ''));


                if (
                    $dirName != 'index.php' && $dirName != 'style.css' && $dirName != 'delete.php' &&
                    $dirName != 'create.php' && $dirName != 'back.php' && $dirName != 'download.php' &&
                    $dirName != 'helper.php' && $dirName != 'upload.php'
                ) {
                    print((is_file($path . $dirName) ? "<button onclick=location.href='./?path=" . $_GET['path'] .
                        "&action=delete" . "&file=" . urlencode($dirName) . "'> Delete </button>" : ''));
                };
            }
            print('</td></tr>');
        }
    }
    print('</tbody></table>');
    ?>

    <div class="footer">
        <button onclick=location.href="<?php print('?path=' . $back . '/') ?>">Back</button>
        <button onclick='location.href="./"'>Home</button>
        <?php
        if ($_POST['passwd'] == 'admin') {
            echo ('<form action="" method="POST" id="create">
            <input type="text" name="newFolder" placeholder="new Folder">
            <input type="submit" value="Create">
        </form>
        <form action="" method="POST" id="upload" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload File" name="submit">
        </form>');
        }
        ?>
    </div>


</body>

</html>