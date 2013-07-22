<div id="comment_blockIV">
  	<?php
			while ($row = mysql_fetch_array($result)) {
				echo $row['author'];
				echo " on " . $row['date'];
				echo "<br />";
				echo $row['content'];
				echo "<br /><br />";
                }
		?>
</div>
