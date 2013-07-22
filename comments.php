<!DOCTYPE html>
<html>
    <head>
        <title>Comments</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="body">
            <div id="comments_blogs">
                <?php
                // Connects to your Database 
                include('connect.php');
                date_default_timezone_set('America/New_York');
                //checks cookies to make sure they are logged in 
//                1
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
                            $postID;
                            if (isset($_GET['postID'])) {
                                $postID = $_GET['postID'];
                            } else {
                                $postID = $_POST['postID'];
                            }
                            include('commentsII.php');

                            $result = mysql_query("SELECT * FROM comments WHERE postID = '$postID' ORDER BY date DESC");
                            include('commentsIV.php');
//                            $result = mysql_query("SELECT * FROM comments WHERE postID = '$postID'");
//                            echo "<a href=commentsII.php?postID=" . $_GET['postID'] . ">Comment</a>";
                        }
                    }
                } else {
//if the cookie does not exist, they are taken to the login screen 
                    header("Location: login.php");
                }
//This code runs if the form has been submitted
                if (isset($_POST['submit'])) {
                    //This makes sure they did not leave any fields blank
                    if (!$_POST['content']) {
                        die('You have not written anything.');
                    }
                    $mysqltime = date("Y-m-d H:i:s");
                    // now we insert it into the database
                    $insert = "INSERT INTO comments (postID, author, content, date)

     		VALUES ('" . $_POST['postID'] . "', '" . $username . "', '" . $_POST['content'] . "', '" . $mysqltime . "')";

                    $add_post = mysql_query($insert);
//                    echo $username . " on " . $mysqltime . "<br />";
//                    echo $_POST['content'] . "<br /><br />";
                }
                ?>
            </div>
            <div id="comment_blockII">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="contact_form" name="comments_form"> 
                    <ul>
                        <li>
                            <h2>Let's Comment</h2>
                            <span class="required_notification">* Required Field</span>
                        </li>
                        <li>
                            <label for="message">Care to comment?</label>
                            <textarea name="content" cols="40" rows="6" required placeholder="Write your comments here."></textarea>
                        </li>
                        <li>
                            <?php echo '<input type="hidden" name="postID" value=' . $postID . '>'; ?>
                            <button class="submit" type="submit" name="submit">Post</button>
                        </li>
                    </ul>
                </form> 
            </div>
        </div>              
    </body>
</html>
