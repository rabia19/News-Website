<link rel="stylesheet" href="/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$conn = new mysqli("localhost", "root", "", "web_project");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$sql = "SELECT * FROM articles where `id`={$_GET['id']}";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$images = preg_split("/;/", $row['images']);
?>

<div class="article">
    <div class="title">
        <h1><?echo $row["title"];?></h1>
    </div>

    <div class="text">
        <p><?echo $row['text']?></p>
    </div>

    <div class="images-1">
        <?echo '<img onclick="showGallery()" src="'.$images[0].'">';?>
    </div>

    <div class="date_created">
        Created date: <b><?echo $row['date_created']?></b>
    </div>

    <div class="source">
        Source: <b><a onclick="gallery()" href="<?echo $row['source']?>"><?echo $row['source']?></a></b>
    </div>


    <div id="gallery_overlay" onclick="hideGallery()" ></div>
    <div id="gallery">
        <div class="panel-main">
            <img src="<?echo $images[0]?>" id="selected">
        </div>
        <div class="thumbs">
            <?
            foreach($images as $item) echo '<img onclick="imgActivate(event)" class="gallery_item" src="'.$item.'">';
            ?>
        </div>
    </div>
</div>


<script>
    const current = document.querySelector("#selected");
    const thumbs = document.querySelectorAll(".thumbs img");
    const opacity = 0.5;
    thumbs[0].style.opacity = opacity;
    function imgActivate(e) {
        thumbs.forEach(img => (img.style.opacity = 1));
        current.src = e.target.src;
        current.classList.add("fade-in");
        setTimeout(() => current.classList.remove("fade-in"), 500);
        e.target.style.opacity = opacity;
        current.style.height = "50%";
    }

    function showGallery(){
        document.getElementById("gallery_overlay").style.display = "block";
        document.getElementById("gallery").style.display = "block";
    }

    function hideGallery(){
        document.getElementById("gallery_overlay").style.display = "none";
        document.getElementById("gallery").style.display = "none";
    }
</script>
