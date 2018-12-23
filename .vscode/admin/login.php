<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/style.css">

</head>

<form class="form">
    <label><input id="login" type="text" value="user"></label>
    <label><input id="password" type="password" value="qwerty"></label>
    <p><input onclick="login_()" type="button" value="Login"></p>
</form>


<script>
    function login_() {
        $log = document.querySelector('#login').value;
        $pass = document.querySelector('#password').value;
        if ($log === ""){
            document.getElementById('login').style = "box-shadow: 0 0 3px #CC0000;";
        } else if ($pass === "") {
            document.getElementById('login').style = "";
            document.getElementById('password').style = "box-shadow: 0 0 3px #CC0000;";
        } else {
            document.getElementById('password').style = "";
            fetch('/PhpStorm/admin/log.php', {
                method: 'post',
                headers: {
                    "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
                },
                body: 'login='+$log+'&pass='+$pass
            })
                .then(response => response.text())
                .then(function (data) {
                    if (data==='1'){
                        setCookie("pass", $pass);
                        setCookie("login", $log);
                        window.location = '/PhpStorm/admin/create.php';
                    } else {
                        document.getElementById('login').style = "box-shadow: 0 0 3px #CC0000;";
                        document.getElementById('password').style = "box-shadow: 0 0 3px #CC0000;";
                    }
                })
                .catch(function (error) {
                    console.log('Request failed', error);
                });
        }
    }

    function setCookie(name, value, options) {
        options = options || {};
        var expires = 3600;

        if (typeof expires === "number" && expires) {
            var d = new Date();
            d.setTime(d.getTime() + expires * 1000);
            expires = options.expires = d;
        }
        if (expires && expires.toUTCString) {
            options.expires = expires.toUTCString();
        }

        value = encodeURIComponent(value);

        var updatedCookie = name + "=" + value;

        for (var propName in options) {
            updatedCookie += "; " + propName;
            var propValue = options[propName];
            if (propValue !== true) {
                updatedCookie += "=" + propValue;
            }
        }

        document.cookie = updatedCookie;
    }


</script>