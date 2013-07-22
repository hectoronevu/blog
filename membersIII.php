<div id="members_comment">
  <?php
		echo "<a href=comments.php?postID=" . $postID . ">" . $row['title'] . "</a>";
		echo " on " . $row['date'];
		echo "<br />";
		echo $row['content'];
		echo "<br /><br />";	
	?>
</div>
