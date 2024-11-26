<?php
$host = 'localhost';
$user = 'root';
$password = '3427';
$database = 'crud_example';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
