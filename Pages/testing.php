<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $timezone = 'Asia/Manila';
        date_default_timezone_set($timezone);
        
        $date = date('Y-m-d');
        $time = date('H-i-s');

        echo $date. " " . $time;
    ?>
</body>
</html>