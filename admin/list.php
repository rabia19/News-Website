

<?php
if ($_COOKIE["login"] == null){
    var_dump($_COOKIE);
    echo "<script>window.location = 'PhpStorm/admin/login.php'</script>";
}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>

<form>
    <button onclick="filter_f()" type='button'>Find</button>
    <label>
        <input id="filter" type='text' style="margin: 10px; width:800px;">
    </label>
</form>

<?php
if(!isset($_GET['p'])) $_GET['p'] = 1;

$_GET['p'] -= 1;
$_GET['p'] *= 3;

$conn = new mysqli("localhost", "root", "", "web_project");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
if (!isset($_GET['f'])){
    $f = '';
    $sql = "SELECT * FROM articles order by id desc limit {$_GET['p']}, 10";
    $sql2 = "SELECT * FROM articles";
} else{
    $f = $_GET["f"];

    $sql = "SELECT * FROM articles WHERE `text` like '%{$f}%' or `title` like '%{$f}%' order by id desc limit {$_GET['p']}, 3 ";
    $sql2 = "SELECT * FROM articles WHERE `text` like '%{$f}%' or `title` like '%{$f}%' order by id desc";
}
$count = $conn->query($sql2)->num_rows/3;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $images = preg_split("/;/", $row['images']);
        ?>
        <div id="i<?php echo $row['id'];?>" class="article">
            <div class="title">
                <h1><a href="<?php echo "PhpStorm/article.php?id=".$row['id'];?>"><?php echo $row["title"];?></a></h1>
            </div>

            <div class="source">
                <h3>Source: <b><a href="<?php echo $row['source']?>"><?php echo $row['source']?></a></b></h3>
            </div>

            <div class="text">
                <p><?php echo substr($row['text'],0,1000)."..."?></p>
            </div>

            <div class="read_more">
                <p><b><a onclick="read_more(<?php echo $row['id'];?>)">More</a></b></p>
            </div>

            <div class="edit">
                <a href="<?php echo "update.php?id=".$row['id'];?>"><button>Edit</button></a>
                <a onclick="remove(<?php echo $row['id']?>)"><button>Delete</button></a>
            </div>

        </div>
    <?php }}

$sql = "SELECT COUNT(1) FROM articles";
$result = $conn->query($sql);

?>
<div class="pagination" style="">


    <?php
    for ($x = 1; $x <= $count+1; $x++){
        echo "<a href='list.php?p=$x&f=$f'>$x&nbsp&nbsp&nbsp</a>";
    }

    ?>
</div>

<script>

    function remove(n) {
        fetch('delete.php?id='+n)
            .then(response => response.text())
            .then((data) => {
                if (data==="OK"){
                    var article = document.querySelector('#i'+n);
                    article.style = "display:none;";
                }
            });
    }

    function filter_f() {
        var filter_text = document.querySelector('#filter').value;
        window.location.href = "PhpStorm/list.php?f="+encodeURIComponent(filter_text);

    }

    function read_more(n){
        var more = document.querySelector('#i'+n + " .read_more");
        more.style = "display:none;";
        var text = document.querySelector('#i'+n + " .text  p");

        fetch('loadtext.php?id='+n)
            .then(response => response.text())
            .then((data) => {
                text.textContent = data;
            });
    }
</script>
</body>

<?php 
$conn->close();
?>