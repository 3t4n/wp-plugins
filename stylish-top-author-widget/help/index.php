<?php
function alwp() {
?>
<div class="wrap">
	<h2>Documentation - Author Widget</h2>


	<div id="welcome-panel" class="welcome-panel">
		<input id="welcomepanelnonce" name="welcomepanelnonce" value="1780d88760" type="hidden">
			<div class="welcome-panel-content">
	<h3>Welcome to Author Widget!</h3>
	<p class="about-description">Show your Blog author list in Cool Styles & more features</p>
	<div class="welcome-panel-column-container">
	<div class="welcome-panel-column">
					</br>
			<a class="button button-primary button-hero load-customize" href="#usage">Get Started...</a>
			</div>
	<div class="welcome-panel-column">
		<h4>Important Doc</h4>
		<ul>
					<li><a href="#how" class="welcome-icon welcome-write-blog">How To Configure...</a></li>
			<li><a href="#addicon" class="welcome-icon welcome-add-page">Add Icon Before Title...</a></li>
		</ul>
	</div>
	<div class="welcome-panel-column welcome-panel-last">
		<h4>Donate Us</h4>
		<ul>
					<li><div class="welcome-icon welcome-learn-more"><a href="http://webcarezone.com">Web Care Zone</a></div></li>
					<li><div class="welcome-icon welcome-learn-more"><a href="http://forsideint.com">Forside International</a></div></li>
		</ul>
	</div>
	</div>
	</div>
		</div>

	<div id="dashboard-widgets-wrap">
	<div id="dashboard-widgets" class="metabox-holder">
	<div id="postbox-container-1" class="postbox-container">
	<div id="normal-sortables" class="meta-box-sortables ui-sortable">
<section class="how" id="how" >

	<div id="dashboard_right_now" class="postbox">
<h3 class="hndle"><span>How To Configure...</span></h3>
<div class="inside">
	<div class="main">
	<ul>
	<style>#dashboard_right_now li{width:100%}</style>
		<li class="post-count"><a href="">At first Upload and Install The Plugin.</a></li>
		<li class="post-count"><a href="<?php echo get_admin_url( $blog_id, widgets, $scheme ); ?>.php">Then Go To Widget Area.</a></li>
		<li class="post-count"><a href="">Find out the widget named "Cool Author List".</a></li>
		<li class="post-count"><a href="">Drag it to an area you want to show the widget.</a></li>
		<li class="post-count"><a href="">or Click on the widget. You will get the option to insert the widget into your Widget Area.</a></li>
		<li class="post-count"><a href="">Configure it and save it.</a></li>
	</ul>
	</div>
	</div>
</section>

</div>
</div>
	<div id="postbox-container-2" class="postbox-container">
	<div id="side-sortables" class="meta-box-sortables ui-sortable">
<section class="addicon" id="addicon" >

	<div id="dashboard_right_now" class="postbox">
<h3 class="hndle"><span>Add Icon Before Title...</span></h3>
<div class="inside">
	<div class="main">
	<p>To Add icon before title, you need to activate the plugin <a href="https://wordpress.org/plugins/font-awesome/">Font Awesome</a>.</p><br/>
	<p>Here is the cheatsheet for FontAwesome Icon. You can use these code to show before your title of the widget. Please make sure to use it properly.</p><br/><p><b>
	Here is an example :</b></p><br/><p>
	Supose, you want to add "Android" icon before your title, You need to enter the code "android" into the widget option.</p><br/>
	<p><a class="button button-primary button-hero load-customize" href="<?php echo plugins_url('/FontAwesomeIconsCheatsheet.pdf', __FILE__);?>">Download</a><p>
	
	</div>
	</div>
</section>

	</div>	
	</div>
	<div id="postbox-container-3" class="postbox-container">
	<div id="column3-sortables" class="meta-box-sortables ui-sortable empty-container"></div>	</div>
	<div id="postbox-container-4" class="postbox-container">
	<div id="column4-sortables" class="meta-box-sortables ui-sortable empty-container"></div>	</div>
</div>

</div>
<?php } ?>