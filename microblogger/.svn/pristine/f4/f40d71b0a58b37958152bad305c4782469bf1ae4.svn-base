<?php
@include("../../../../wp-blog-header.php");

// SETTINGS

global $wpdb;
$table = $wpdb->prefix."microBsettings";

$query = "SELECT * FROM `" . $wpdb->prefix . "microBsettings` WHERE 1";
$res = mysql_query($query);
$row = mysql_fetch_assoc($res);
if ($row['adminblogmodule'] == 'TRUE' ){
?>
<style type="text/css">
<!-- 
#microwidget input{
height:20px;
padding:0;
border:1px solid #000000;
vertical-align:middle;
font-size:1em;
}
#microwidget .submit {height:22px;}
button {
height:24px;
margin:0;margin-bottom:-1px;
vertical-align:bottom;
font-size:1em;
}
-->
</style>
<div id="microwidget" align=right>
<FORM action="../wp-content/plugins/microblogger/modules/admin_blog-logic.php" method="post">
<input type="text" name="blog" />

<input type="checkbox" name="article" />

<input type="submit" value="Microblog it!" />
</div>
</form>
<?php
}
?>