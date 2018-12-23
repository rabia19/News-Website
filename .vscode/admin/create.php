<?php
if ($_COOKIE["login"] == null){
    var_dump($_COOKIE);
    echo "<script>window.location = '/PhpStorm/admin/login.php'</script>";
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>

<div class="article">
    Title:
    <div class="title">
        <label>
            <input id="title" name="title" type="text" size="40" ">
        </label>
    </div>

    Text:
    <div class="text">
        <label>
            <textarea id="text" name="text" cols="110" rows="15" ></textarea>
        </label>
    </div>

    Images:
    <div class="images">
        <label>
            <textarea id="images" name="text" cols="110" rows="5" ></textarea>
        </label>
    </div>

    Source:
    <div class="source">
        <label>
            <input id="source" name="source" type="text" size="40">
        </label>
    </div>

    <div class="edit">
        <button onclick="save()">Save</button>
    </div>

</div>
</body>
</html>

<script>
    function save() {
        var title = document.getElementById('title').value;
        var text = document.getElementById('text').value;
        var images = document.getElementById('images').value;
        var source = document.getElementById('source').value;

        if (title === ""){
            document.getElementById('title').style = "box-shadow: 0 0 3px #CC0000;";
            console.log("title null");
        } else if (text === ""){
            document.getElementById('title').style = "";
            document.getElementById('text').style = "box-shadow: 0 0 3px #CC0000;";
            console.log("text null");
        } else {
            fetch('create_.php', {
                method: 'post',
                headers: {
                    "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
                },
                body: 'title='+title+'&text='+text+'&images='+images+'&source='+source
            })
                .then(response => response.text())
                .then(function (data) {
                    console.log(data);
                })
                .catch(function (error) {
                    console.log('Request failed', error);
                });

        }
    }

</script>
