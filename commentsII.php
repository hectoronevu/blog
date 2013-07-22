<div id="logout_widget">
    <?php
    echo "Welcome " . "<a class='a1' href=members.php>$username</a>" . "&nbsp&nbsp&nbsp<a href=logout.php class='a1'>Logout</a>";
    ?>
</div>

<div id="main_page">
    <?php
    echo "<a href=index.php class='a1'>Main page</a> <br />";
    ?>
</div>

<div id="archives">
    <?php
    echo "Archives";
    ?>
</div>

<div id="comment_block">

    <?php
    error_reporting(0);
    $current = mysql_query("SELECT * FROM posts WHERE postID = '$postID'");
    while ($row = mysql_fetch_array($current)) {
        echo "<b>".$row['title']."</b>";
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
    ?>
</div>
