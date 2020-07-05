<!doctype html>
<html lang="en">
<head>
    <title>Live Chat in PHP Tutorial</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.5.0.min.js"></script>
    <script>
        function submitChat() {
            if (form1.uname.value == '' || form1.msg.value == '') {
                alert("All fields are mandatory");
            }

            form1.uname.readyStatus = true,
            form1.uname.style.border = 'none';

            // image load
            $('#imageload').show();

            var uname = encodeURIComponent(form1.uname.value);
            var msg = encodeURIComponent(form1.msg.value);
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                    // image load
                    $('#imageload').hide();
                }
            }
            xmlhttp.open('GET', 'insert.php?uname='+uname+'&msg='+msg, true);
            xmlhttp.send();
        }

        $('document').ready(function (e) {
            $.ajaxSetup({cache:false});
            setInterval(function () {
                $('#chatlogs').load('logs.php');
            }, 1000);
        });
    </script>
</head>
<body class="bg-info">

<div class="container">

    <form name="form1" action="">
        <div class="form-group">
            <label for="name">Enter Your Name :</label>
            <input type="text" name="uname" id="name" class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="message">Message :</label>
            <textarea name="msg" id="message" class="form-control" cols="10" rows="5"></textarea>
        </div>
        <div>
            <a class="btn btn-primary" onclick="submitChat()" href="#">Send</a>
        </div>

        <div id="imageload" style="display: none">
            <img src="Loading_icon.gif" alt="no image">
        </div>

        <div class="bg-success text-center text-light mt-3" id="chatlogs">
            Loading chatlog please wait...<img class="bg-secondary ml-5 mb-2" src="Loading_icon.gif" alt="no image" height="50px" width="50px">
        </div>
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="js/jquery.slim.min.js"></script>-->
<!--<script src ="js/popper.min.js"></script>-->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
