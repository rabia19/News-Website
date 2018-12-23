<?php
if ($_COOKIE["login"] == null){
    var_dump($_COOKIE);
    echo "<script>window.location = 'PhpStorm/admin/login.php'</script>";
}

//echo "hello";
$conn = new mysqli("localhost", "root", "", "web_project");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$pass = md5($_POST['pass']);
$login = $_POST['login'];
//$pass = $_POST['pass'];
$sql = "SELECT IF( EXISTS(SELECT * FROM users WHERE `login` = '{$login}' AND `password` = '{$pass}'), 1, 0)";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($row[key($row)] == 1){
    setcookie("logged", "1");
    setcookie("login", $login);
    setcookie("pass", $pass);
    echo $_COOKIE['logged'];
//    echo true;
} else echo '0';