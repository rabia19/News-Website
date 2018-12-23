<?php
if ($_COOKIE["login"] == null){
    echo "<script>window.location = 'PhpStorm/admin/login.php'</script>";
}
$conn = new mysqli("localhost", "root", "", "web_project");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//var_dump($_POST);
$_POST['username'] = "";
if ($_POST['images'] == null) $_POST['images'] = "";

$title = inj($_POST['title']);
$text = inj($_POST['text']);
$src = inj($_POST['source']);
$user = inj($_POST['username']);
$img = inj($_POST['images']);

$sql = "INSERT INTO `articles`(`title`, `text`, `source`, `author`, `date_created`, `images`)
VALUES ('{$title}','{$text}','{$src}','{$user}', now() ,'{$img}')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

function inj($s) {
    $s = str_replace('"',"",$s);
    return str_replace("'","",$s);

}
?>