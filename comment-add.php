<?php

error_reporting(E_ALL);
require "includes/connection.php";
$name = $_POST['name'];
var_dump($name);
if (isset($_POST['name']) && isset($_POST['comment']) && isset($_POST['update_time']) && isset($_POST['reply_to']) && !empty($_POST['name']) && !empty($_POST['comment']) && !empty($_POST['update_time']) ) {

    $time = $_POST['update_time'];
    $replyto = $_POST['reply_to'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];

        $collection = $connection->prepare("INSERT INTO `comments` (`comment` ,`commenter` ,`commenttime`, `replyto`) VALUES ('$comment','$name','$time',$replyto)");
        $collection->bind_param('ss', $comment, $name, $time, $replyto);

    $collection->execute();
    printf("%d Row inserted.\n", $collection->affected_rows);
    $collection->close();


}



?>