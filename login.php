<?php
// Connects to your Database 
include('connect.php');
include('loginII.php');

//Checks if there is a login cookie 

if (isset($_COOKIE['ID_my_site'])) {

//if there is, it logs you in and directes you to the members page 
    $username = $_COOKIE['ID_my_site'];
    $pass = $_COOKIE['Key_my_site'];
    $check = mysql_query("SELECT * FROM main WHERE author = '$username'") or die(mysql_error());
    while ($info = mysql_fetch_array($check)) {
        if ($pass != $info['password']) {
            
        } else {
            header("Location: members.php");
        }
    }
}

//if the login form is submitted 

if (isset($_POST['submit'])) {

// if form has been submitted
// makes sure they filled it in
    if (!$_POST['username'] | !$_POST['pass']) {
        die('You did not fill in a required field.');
    }
    // checks it against the database
//    if (!get_magic_quotes_gpc()) {
//        $_POST['email'] = addslashes($_POST['email']);
//    }
    $check = mysql_query("SELECT * FROM main WHERE author = '" . $_POST['username'] . "'") or die(mysql_error());

    //Gives error if user dosen't exist
    $check2 = mysql_num_rows($check);
    if ($check2 == 0) {
        die('That user does not exist in our database. <a href=registration.php>Click Here to Register</a>');
    }
    while ($info = mysql_fetch_array($check)) {
        $_POST['pass'] = stripslashes($_POST['pass']);
        $info['password'] = stripslashes($info['password']);
        $_POST['pass'] = md5($_POST['pass']);

        //gives error if the password is wrong
        if ($_POST['pass'] != $info['password']) {
            die('Incorrect password, please try again.');
        } else { // if login is ok then we add a cookie      
            $_POST['username'] = stripslashes($_POST['username']);
            $hour = time() + 3600;
            setcookie(ID_my_site, $_POST['username'], $hour);
            setcookie(Key_my_site, $_POST['pass'], $hour);
//then redirect them to the members area 
            header("Location: members.php");
        }
    }
} else {  // if they are not logged in 
}
?>
<html>
    <head>
        <title>Archives</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div id="body">
            <div id="login_account">
            <form class="contact_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="login_form"> 
                <ul>
                    <li>
                        <h2>Login Account</h2>
                        <span class="required_notification">* Required Field</span>
                    </li>
                    <li>
                        <label for="name">Pen Name:</label>
                        <input type="text" name="username" placeholder="Enter pen name" required />
                    </li>
                    <li>
                        <label for="password">Password:</label>
                        <input type="password" name="pass" placeholder="Password" required />
                    </li>
                    <li>
                        <button class="submit" type="submit" name="submit">Login</button>
<!--                        <input type="submit" name="submit" value="Register" class="submit"> -->
                    </li>
                </ul>
            </form> 
        	</div>
        </div>
    </body>
</html>
