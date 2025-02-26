<?php

if (isset($_POST['restore'])) 
{
	$posts = mysql_fetch_row(mysql_query("SELECT ID FROM " . $wpdb->prefix . "posts ORDER BY ID DESC LIMIT 1"));
	for($i=1;$i<($posts[0]+1);$i++){
		$comments = mysql_query("SELECT SQL_CALC_FOUND_ROWS comment_ID FROM " . $wpdb->prefix . "comments WHERE comment_post_ID = '$i' AND comment_approved = 1;") or die("Comments count failed");
		mysql_query("UPDATE " . $wpdb->prefix . "posts SET comment_count = '".mysql_num_rows($comments)."' WHERE id = '$i';") or dir("Update failed");
		echo "Updated Post #$i - ".mysql_num_rows($comments)." comments<br />";
	}
}

?>
<div class="wrap">
    <form method="post">
        <h2>Comments Number Restore</h2>
        <p><strong>Run at your own risk. Do a database backup before!</strong></p>
		<p>Press the "restore" button to recalculate and fix the comments number in each post.</p>
        
        <p class="submit">
            <input class="button" type="submit" name="restore" value="Restore">  
        </p>      
    </form>
</div>
