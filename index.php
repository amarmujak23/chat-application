<?php
session_start();

if(isset($_GET['logout'])){    
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
    session_destroy();
    header("Location: index.php"); // Redirect the user 
}

if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
        $connect_message = "<div class='msgln'><span class='left-info'><b class='user-name-left'>".$_SESSION['name']."</b> has joined the chat session.</span><br></div>";
        file_put_contents("log.html", $connect_message, FILE_APPEND | LOCK_EX);
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}

function loginForm(){
    echo '
    <div id="loginform">
        <form action="index.php" method="post" class="login-form">
            <label for="name">Name:</label>
            <div class="input-wrapper">
                <input type="text" name="name" id="name" />
                <input type="submit" name="enter" id="enter" value="Enter" />
            </div>
        </form>
        <p class="name-instruction">Please enter your name to continue!</p>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Chat Application</title>
    <meta name="description" content="Tuts+ Chat Application"/>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
if(!isset($_SESSION['name'])){
    loginForm();
}
else {
?>
    <div id="wrapper">
        <div id="menu">
            <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
            <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        </div>
        <div id="chatbox" class="chatbox">
            <?php
            if (file_exists("log.html") && filesize("log.html") > 0) {
                $contents = file_get_contents("log.html");
                echo $contents; 
            }
            ?>
        </div>
        <form name="message" action="">
            <input name="usermsg" type="text" id="usermsg" />
            <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
        </form>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        // jQuery Document 
        $(document).ready(function () {
            $("#submitmsg").click(function () {
                var clientmsg = $("#usermsg").val();
                $.post("post.php", { text: clientmsg });
                $("#usermsg").val("");
                return false;
            });
            function loadLog() {
                var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20;
                $.ajax({
                    url: "log.html",
                    cache: false,
                    success: function (html) {
                        $("#chatbox").html(html);
                        var newscrollHeight = $("#chatbox")[0].scrollHeight - 20;
                        if(newscrollHeight > oldscrollHeight){
                            $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
                        }	
                    }
                });
            }
            setInterval (loadLog, 2500);
            $("#exit").click(function () {
                var exit = confirm("Are you sure you want to end the session?");
                if (exit == true) {
                window.location = "index.php?logout=true";
                }
            });
        });
    </script>
</body>
</html>
<?php
}
?>
