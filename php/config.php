<!-- Config.php adalah file yang bekerja mengubungkan ke database -->

<?php
$data_host = 'localhost';
$database_name = 'db_elektronik';
$database_username = 'root';
$database_password = 'p@ssw0rd';


$mysqli = mysqli_connect($data_host, $database_username, $database_password, $database_name);
