<?php
session_start();

if (isset($_SESSION['name']) && isset($_POST['text'])) {
    $text = $_POST['text'];

    // Convert markdown-like syntax to HTML formatting
    $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text); // Bold: **text**
    $text = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $text); // Italic: *text*

    $text_message = "<div class='msgln'><span class='chat-time'>" . date("g:i A") . "</span> <b class='user-name'>" . $_SESSION['name'] . "</b> " . stripslashes(htmlspecialchars($text)) . "<br></div>";
    file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
}
?>