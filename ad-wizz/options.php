<style type="text/css">
ul.tabs {
	margin: 0;
	padding: 0;
	float: left;
	list-style: none;
	height: 32px; /*--Set height of tabs--*/
	border-bottom: 1px solid #999;
	border-left: 1px solid #999;
	width: 100%;
}
ul.tabs li {
	float: left;
	margin: 0;
	padding: 0;
	height: 31px; /*--Subtract 1px from the height of the unordered list--*/
	line-height: 31px; /*--Vertically aligns the text within the tab--*/
	border: 1px solid #999;
	border-left: none;
	margin-bottom: -1px; /*--Pull the list item down 1px--*/
	overflow: hidden;
	position: relative;
	background: #e0e0e0;
}
ul.tabs li a {
	text-decoration: none;
	color: #000;
	display: block;
	font-size: 1.0em;
	padding: 0 20px;
	border: 1px solid #fff; /*--Gives the bevel look with a 1px white border inside the list item--*/
	outline: none;
	line-height:1.em;
}
ul.tabs li a:hover {
	background: #ccc;
}
html ul.tabs li.active, html ul.tabs li.active a:hover  { /*--Makes sure that the active tab does not listen to the hover properties--*/
	background: #fff;
	border-bottom: 1px solid #fff; /*--Makes the active tab look like it's connected with its content--*/
}

.tab_container {
	border: 1px solid #999;
	border-top: none;
	overflow: hidden;
	clear: both;
	float: left; width: 100%;
	background: #fff;
}
.tab_content {
	padding: 20px;
	font-size: 1.0em;
	line-height:1.em;
}
</style>

<script language="javascript1.4" type="text/javascript">
$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs .options").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	
	function ajax_submit() {

$.post('options-general.php?page=adwizz.php',$("#form1").serialize()), function(data) {
  $('#messagead').html(data);
  }
  }
});






</script>

<div id="messagead"></div>
<div id="tabs">
<ul class="tabs">
    <li><a href="#tab1" class="ads">Ads page</a></li>
    <li><a href="#tab2" class="options">Plugin Options</a></li>
	<li><a href="#tab3" >About</a></li>
</ul>
</div>


<div class="tab_container">
    <div id="tab1" class="tab_content">
	<h3>Edit message</h3>
	<form id="form2" name="form2" method="post" action="">
	  <p>
	    <?php $content_addwizz = get_option("content_add"); ?>
		<?php $content_addwizz = htmlspecialchars_decode(html_entity_decode(stripslashes($content_addwizz))); ?>
	  <?php the_editor($content_addwizz); ?>
</p>
	  <p>
	    <input type="submit" name="Submit2" value="Submit" />
</p>
	</form>
	<p>&nbsp;</p>
</div>
<div class="tab_container">
    <div id="tab2" class="tab_content">
	<h3>Options</h3>
<form id="form1" name="form1" method="post" action="">
<table width="500" border="0" cellspacing="5" cellpadding="5">
  <tr>
    <td>Enable/Disable ad </td>
    <td><label>
	<?php 
	$selected = get_option('enable_ad');
	if($selected == 1) {
	$s1 = "selected='selected'";
	$s2 = "";
	} else {
	$s2 = "selected='selected'";
	$s1 = "";
	}
	 
	?>
	
	
    <select name="enable_ad" id="enable_ad" style="width:150px;">
      <option value="1" <?php echo $s1 ?>>Enabled</option>
      <option value="0" <?php echo $s2 ?>>Disabled</option>
    </select>
    </label></td>
  </tr>
  <tr>
    <td width="321">Expire Time (seconds) </td>
    <td width="179">
      <label>
        <input name="expire" type="text" id="expire" value="<?php echo get_option('expire'); ?>" />
        </label>    </td>
  </tr>
  <tr>
    <td>Time until redirect </td>
    <td><input name="redirect_wizz" type="text" id="redirect_wizz" value="<?php echo get_option('redirect_wizz'); ?>"/></td>
  </tr>
  <tr>
    <td>Move forward message </td>
    <td><input name="forward_wizz" type="text" id="forward_wizz" value="<?php echo get_option('forward_wizz'); ?>" /></td>
  </tr>
  <tr>
    <td>Disable ad for logged in users </td>
    <td><label>
	
	<?php 
	$selected_d = get_option('logged_in');
	if($selected_d == 1) {
	$s11 = "selected='selected'";
	$s22 = "";
	} else {
	$s22 = "selected='selected'";
	$s11 = "";
	}
	?>
	
	
	
      <select name="logged_in" id="logged_in" style="width:150px;">
        <option value="1" <?php echo $s11; ?>>Yes</option>
        <option value="0" <?php echo $s22; ?>>No</option>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="Submit" value="Submit" onClick="ajax_submit();"/>
    </label></td>
  </tr>
</table>
</form>
</div>
<div class="tab_container">
    <div id="tab3" class="tab_content">
	<strong>AdWizz v1.0</strong><br><br>
	This plugin add an advertise page to your blog. <br><br>
	Plugin home: <a href="http://www.wpwizz.com">www.wpwizz.com</a><br>
	Programed by: <a href="mailto:marius81@gmail.com">Marius Moiceanu</a><br>
	<div style="height:200px;"></div>
</div>

