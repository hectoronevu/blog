<!DOCTYPE html>
<?php
// Connects to your Database 
include('connect.php');
include('registrationII.php');
//This code runs if the form has been submitted
if (isset($_POST['submit'])) {
    //This makes sure they did not leave any fields blank
    if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2']) {
        die('You did not complete all of the required fields');
    }

    // checks if the username is in use
    if (!get_magic_quotes_gpc()) {
        $_POST['username'] = addslashes($_POST['username']);
    }
    $usercheck = $_POST['username'];
    $check = mysql_query("SELECT author FROM main WHERE author = '$usercheck'") or die(mysql_error());
    $check2 = mysql_num_rows($check);

    //if the name exists it gives an error
    if ($check2 != 0) {
        die('Sorry, the username ' . $_POST['username'] . ' is already in use.');
    }

    // checks if the blog title is in use
    $titlecheck = $_POST['title'];
    $check3 = mysql_query("SELECT author FROM main WHERE title = '$titlecheck'") or die(mysql_error());
    $check4 = mysql_num_rows($check3);

    //if the name exists it gives an error
    if ($check4 != 0) {
        die('Sorry, the title ' . $_POST['title'] . ' is already in use.');
    }

    // this makes sure both passwords entered match
    if ($_POST['pass'] != $_POST['pass2']) {
        die('Your passwords did not match. Go back and try again.');
    }

    // checks if username and password lengths are appropriate
    if (strlen($_POST['username']) > 50) {
        die('Sorry, your username is more than 50 characters');
    }
    if (strlen($_POST['title']) > 50) {
        die('Sorry, your blog title is more than 50 characters');
    }
    // here we encrypt the password and add slashes if needed
    $_POST['pass'] = md5($_POST['pass']);
    if (!get_magic_quotes_gpc()) {
        $_POST['pass'] = addslashes($_POST['pass']);
        $_POST['username'] = addslashes($_POST['username']);
    }
    // now we insert it into the database
    $insert = "INSERT INTO main (author, password, title, about)

 			VALUES ('" . $_POST['username'] . "', '" . $_POST['pass'] . "', '" . $_POST['title'] . "', '" . $_POST['about'] . "')";

    $add_member = mysql_query($insert);
    ?>
    <h1>Registered</h1>
    <p>Thank you, you have registered - you may now <a href="login.php">log in</a> or visit the <a href="index.php">home page</a>.
    </p>

    <?php
} else {
    ?>
    <html>
        <head>
            <!--        <meta charset="utf-8">-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Register Form</title>
            <!--        <link rel="stylesheet" media="screen" href="styles.css" >-->
            <link rel="stylesheet" type="text/css" href="styles.css">
        </head>
        <body>
            <div id="body">
                <div id="login_account">
                    <form class="contact_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="register_form">
                        <ul>
                            <li>
                                <h2>Register Account</h2>
                                <span class="required_notification">* Required Field</span>
                            </li>
                            <li>
                                <label for="name">Pen Name:</label>
                                <input type="text"  name="username" placeholder="User name" required />
                            </li>
                            <li>
                                <label for="password">Password:</label>
                                <input type="password" name="pass" placeholder="Password" required />
                            </li>
                            <li>
                                <label for="password">Confirm Password:</label>
                                <input type="password" name="pass2" placeholder="Password" required />
                                <span class="form_hint">Passwords have to match</span>
                            </li>
                            <li>
                                <label for="title">Blog Title:</label>
                                <input type="text"  name="title" placeholder="Title" required />
                            </li>
                            <li>
                                <label for="message">Description:</label>
                                <textarea name="about" cols="40" rows="6" required ></textarea>
                                <span class="form_hint">What will your blog be about?</span>
                            </li>
                            <li>
                                <button class="submit" type="submit" name="submit">Register</button>
        <!--                        <input type="submit" name="submit" value="Register" class="submit">-->
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </body>
    </html>
    <?php
}
?> 
