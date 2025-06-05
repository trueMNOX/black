<?php
define("DB_SERVER", "metro.proxy.rlwy.net");
define("DB_PORT", 3306); // پورت رو هم باید اضافه کنی
define("DB_USERNAME", "root");
define("DB_PASSWORD", "MKtySBnRwvZvnIqhsFKlFjwKuyQjRqVz");
define("DB_NAME", "railway");


$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
mysqli_set_charset($connect, "utf8mb4");

if ($connect) {
    echo "متصل شد.";
} else {
    echo "متصل نشد. خطا: " . mysqli_connect_error();
}


mysqli_query($connect, "CREATE TABLE IF NOT EXISTS user_id (
    `id` int(20) AUTO_INCREMENT PRIMARY KEY,
    `user_id` varchar(100),
    `step` varchar(200),
    `sana` varchar(100)
)");

mysqli_query($connect, "CREATE TABLE IF NOT EXISTS data (
    `id` int(20) AUTO_INCREMENT PRIMARY KEY,
    `code` varchar(100),
    `file_name` varchar(200),
    `file_id` varchar(200),
    `yuklang` varchar(200),
    `date` varchar(200),
    `title` varchar(200)
)");



?>
