<!DOCTYPE html>
<html>
    <head>
        <!--        <meta charset="utf-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Members</title>
        <!--        <link rel="stylesheet" media="screen" href="styles.css" >-->
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
// Connects to your Database 
        include('connect.php');
        date_default_timezone_set('America/New_York');
//checks cookies to make sure they are logged in 
        $memberID;
        $postID;
        if (isset($_COOKIE['ID_my_site'])) {
            $username = $_COOKIE['ID_my_site'];
            $pass = $_COOKIE['Key_my_site'];
            $check = mysql_query("SELECT * FROM main WHERE author = '$username'") or die(mysql_error());
            while ($info = mysql_fetch_array($check)) {
                global $memberID;
                $memberID = $info['blogID'];
                //if the cookie has the wrong password, they are taken to the login page 

                if ($pass != $info['password']) {
                    header("Location: login.php");
                }
                //otherwise they are shown the admin area     
                else {
                    echo "Welcome " . $username . "<p>";
                    echo "Your Home:<p>";
                    echo "<a href=index.php>Main page</a> <br />";
                    echo "<a href=logout.php>Logout</a> <br /> <br />";
                    $author;
                    // this is for blog title
                    $main = mysql_query("SELECT * FROM main WHERE blogID = '$memberID'");
                    while ($row = mysql_fetch_array($main)) {
                        $author = $row['author'];
                        echo $row['title'];
                        $time;
                        $temp = mysql_query("SELECT * FROM posts WHERE blogID = '$memberID'");
                        while ($data = mysql_fetch_array($temp)) {
                            $time = $data['date'];
                        }
                        echo " on " . $time;
                        echo "<br />";
                        echo $row['about'];
                        echo "<br /><br />";
                    }
                    // this is to show all posts
                    $result = mysql_query("SELECT * FROM posts WHERE blogID = '$memberID' ORDER BY date DESC");
                    while ($row = mysql_fetch_array($result)) {
                        global $postID;
                        $postID = $row['postID'];
                        if (isset($_COOKIE['ID_my_site'])) {
                            echo "<a href=comments.php?postID=" . $postID . ">" . $row['title'] . "</a>";
                        } else {
                            echo $row['title'];
                        }
                        echo " on " . $row['date'];
                        $counter = 0;
                        $comment = mysql_query("SELECT * FROM comments WHERE postID = '$postID'");
                        while ($cur = mysql_fetch_array($comment)) {
                            $counter++;
                        }
                        echo " with <b>" . $counter . "</b> comments";
                        echo "<br />";
                        echo $row['content'];
                        echo "<br /><br />";
                    }
                }
            }
        } else {
//if the cookie does not exist, they are taken to the login screen 
            header("Location: login.php");
        }
//This code runs if the form has been submitted
        if (isset($_POST['submit'])) {
            //This makes sure they did not leave any fields blank
            if (!$_POST['title'] | !$_POST['content']) {
                die('Some fields are missing.');
            }
            $mysqltime = date("Y-m-d H:i:s");
            // now we insert it into the database
            $insert = "INSERT INTO posts (blogID, title, content, date)

 			VALUES ('" . $memberID . "', '" . $_POST['title'] . "', '" . $_POST['content'] . "', '" . $mysqltime . "')";

            $add_post = mysql_query($insert);
            echo "<a href=comments.php?postID=" . $postID . ">" . $_POST['title'] . "</a>";
            echo " on " . $mysqltime . "<br />";
            echo $_POST['content'] . "<br /><br />";
        }
        ?> 
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="contact_form" name="members_form"> 
            <ul>
                <li>
                    <h2>Let's Write Something</h2>
                    <span class="required_notification">* Required Field</span>
                </li>
                <li>
                    <label for="title">Subject:</label>
                    <input type="text" name="title" placeholder="Enter in subject" required />
                </li>
                <li>
                    <label for="message">What do you want to say?</label>
                    <textarea name="content" cols="40" rows="6" required placeholder="Let's write!"></textarea>
        <!--            <input type="password" name="pass" placeholder="Password" required />-->
                </li>
                <li>
                    <button class="submit" type="submit" name="submit">Post</button>
        <!--                        <input type="submit" name="submit" value="Register" class="submit">-->
                </li>
            </ul>
        </form> 
    </body>
</html>
