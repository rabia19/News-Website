<?
if ($_COOKIE["login"] == null){
    echo "<script>window.location = 'PhpStorm/admin/login.php'</script>";
}?>

<?php

$conn = new mysqli("localhost", "root", "", "web_project");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$sql = "DELETE FROM `articles` WHERE `id`={$_GET['id']}";
$result = $conn->query($sql);
$conn->close();
echo "OK";
?>