<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Завантаження файлу</title>
</head>
<body>

<h1>Завантаження файлу</h1>

<form action="task5.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Завантажити">
</form>

</body>
</html>

<?php
function getRemoteFileSize($url) {

    $parse = parse_url($url);
    $host = $parse['host'];

    $fp = @fsockopen($host, 80, $errno, $errstr, 20);

    if (!$fp) {
        return 0;
    }

    fputs($fp, "HEAD " . $url . " HTTP/1.1\r\n");
    fputs($fp, "HOST: " . $host . "\r\n");
    fputs($fp, "Connection: close\r\n\r\n");

    $headers = "";
    while (!feof($fp)) {
        $headers .= fgets($fp, 128);
    }

    fclose($fp);

    $headers = strtolower($headers);

    $array = preg_split("|[\s,]+|", $headers);

    $key = array_search('content-length:', $array);

    if (isset($array[$key + 1])) {
        return $array[$key + 1];
    } else {
        return -1;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['file'])) {

        if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {

            $filename = $_FILES['file']['name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $tmpname = $_FILES['file']['tmp_name'];

            if ($filesize > 1048576) {
                echo "Файл занадто великий. Максимальний розмір: 1 МБ.";
                exit;
            }

            if (!in_array($filetype, array('image/jpeg', 'image/png', 'image/gif'))) {
                echo "Дозволено завантажувати лише зображення JPEG, PNG та GIF.";
                exit;
            }

            $uploaddir = 'uploads/';
            $uploadfile = $
            $uploaddir = 'uploads/';

            if (!is_dir($uploaddir)) {
                if (!mkdir($uploaddir, 0777, true)) {
                    echo "Помилка! Не вдалося створити папку uploads.";
                    exit;
                }
            }

            $uploadfile = $uploaddir . $filename;
            if (move_uploaded_file($tmpname, $uploadfile)) {
                echo "Файл успішно завантажено! \n";

                $filesize = filesize($uploadfile);
                echo "Розмір файлу: " . $filesize . " байт";
            } else {
                echo "Помилка при завантаженні файлу.";
            }

        } else {
            echo "Помилка при завантаженні файлу. Код: " . $_FILES['file']['error'];
        }
    }
}

?>