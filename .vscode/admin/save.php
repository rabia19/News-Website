<?php
if ($_COOKIE["login"] == null){
    var_dump($_COOKIE);
    echo "<script>window.location = 'PhpStorm/admin/create.php'</script>";
}?>

<?php

$conn = new mysqli("localhost", "root", "", "web_project");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

echo $_POST["id"];
$sql = "UPDATE `articles` SET `title`='{$_POST['title']}' WHERE `id`='{$_POST['id']}'";
$result = $conn->query($sql);


$conn->close();
