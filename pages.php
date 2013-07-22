<?php
// Connects to your Database 
include('connect.php');
date_default_timezone_set('America/New_York');
//checks cookies to make sure they are logged in 

if (isset($_COOKIE['ID_my_site'])) {
    $username = $_COOKIE['ID_my_site'];
    $pass = $_COOKIE['Key_my_site'];
    $check = mysql_query("SELECT * FROM main WHERE author = '$username'") or die(mysql_error());
    while ($info = mysql_fetch_array($check)) {
        //if the cookie has the wrong password, they are taken to the login page 

        if ($pass != $info['password']) {
            header("Location: login.php");
        }
        //otherwise they are shown the admin area     
        else {
            $author;
            echo "Welcome " . $username . "<p>";
            echo "<a href=index.php>Main page</a> <br />";
            echo "<a href=logout.php>Logout</a> <br /> <br />";
            $main= mysql_query("SELECT * FROM main WHERE blogID = '$_GET[blogID]'");
            while ($row = mysql_fetch_array($main)) {
//                if (isset($_COOKIE['ID_my_site'])) {
//                    echo "<a href=comments.php?postID=" . $row['postID'] . ">" . $row['title'] . "</a>";
//                } else {
//                    echo $row['title'];
//                }
                $author = $row['author'];
                echo $row['title'];
                $time;
                $temp = mysql_query("SELECT * FROM posts WHERE blogID = '$_GET[blogID]'");
                while ($data = mysql_fetch_array($temp)) {
                    $time=$data['date'];
                }
                echo " on " . $time;
                echo "<br />";
                echo $row['about'];
                echo "<br /><br />";
            }
            $result = mysql_query("SELECT * FROM posts WHERE blogID = '$_GET[blogID]'");
            while ($row = mysql_fetch_array($result)) {
                if (isset($_COOKIE['ID_my_site'])) {
                    echo "<a href=comments.php?postID=" . $row['postID'] . ">" . $row['title'] . "</a>";
                } else {
                    echo $row['title'];
                }
                echo " on " . $row['date'];
                $post = $row['postID'];
                $counter = 0;
                $comment = mysql_query("SELECT * FROM comments WHERE postID = '$post'");
                while ($cur = mysql_fetch_array($comment)) {
                    $counter++;
                }
                echo "with " . $counter . " comments";
                echo "<br />";
                echo $row['content'];
                echo "<br /> by ";
                echo $author;
                echo "<br /><br />";
            }
        }
    }
} else {
//if the cookie does not exist, they are taken to the login screen 
    header("Location: login.php");
}?>
