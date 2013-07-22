<html>
    <head>
        <!--        <meta charset="utf-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Register Form</title>
        <!--        <link rel="stylesheet" media="screen" href="styles.css" >-->
        <link rel="stylesheet" type="text/css" href="styles.css">
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
                        include('membersII.php');
                    	
                    $result = mysql_query("SELECT * FROM posts WHERE blogID = '$memberID'");
                    while ($row = mysql_fetch_array($result)) {
                        if (isset($_COOKIE['ID_my_site'])) {
                            global $postID;
                            $postID = $row['postID'];
                            include('membersIII.php');
                        } else {
                            echo $row['title'];
                        }
//                echo $row['title'];
/*                         include('membersIII.php'); */
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
        <div id="body"> 
        <div id="subject">
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
                    <button class="submit" type="submit" name="submit">Submit</button>
        <!--                        <input type="submit" name="submit" value="Register" class="submit">-->
                </li>
            </ul>  
        </form> 
       </div>
       </div>
    </body>
</html>
