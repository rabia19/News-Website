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

<?php

$conn = new mysqli("localhost", "root", "", "web_project");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$sql = "SELECT * FROM `articles` WHERE `id`={$_GET['id']}";
$result = $conn->query($sql)->fetch_assoc();
$images = preg_split("/;/", $result['images']);
?>

<div class="article">
    <div class="title">
        <label>
            <input id="title" name="title" type="text" size="40" value="<?echo $result["title"];?>">
        </label>
    </div>

    <div class="text">
        <label>
            <textarea id="text" name="text" cols="110" rows="15" ><?echo $result["text"];?></textarea>
        </label>
    </div>

    <div id="images" class="images-<?echo sizeof($images)?>">
        <?foreach($images as $item) echo '<img src="'.$item.'">';?>
    </div>

    <div class="source">
        <label>
            <input id="source" name="source" type="text" size="40" value="<?echo $result["source"];?>">
        </label>
    </div>

    <div class="edit">
        <button onclick="save()">Save</button>
        <a onclick="delete($result['id'])"><button>Delete</button></a>
    </div>

</div>
</body>
</html>

<script>
    function save() {

        var queryDict = {};
        location.search.substr(1).split("&").forEach(function(item) {queryDict[item.split("=")[0]] = item.split("=")[1]});
        var title = document.getElementById('title').value;
        var text = document.getElementById('text').value;
        var images = document.getElementById('images').value;
        var source = document.getElementById('source').value;
        var id = queryDict['id'];

        var data = new FormData();
        data.append('title', title);
        data.append('text', text);
        data.append('images', images);
        data.append('source', source);
        data.append('id', id);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/admin/save.php', true);
        xhr.onload = function () {
            // do something to response
            console.log(this.responseText);
        };
        xhr.send(data);

    }
</script>

<?php $conn->close();
?>
