<div class="wrap">
<h2>Jin Menus</h2>
<?php
$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
$menu_id = isset($_REQUEST['menu_id'])?$_REQUEST['menu_id']:$menus[0]->term_id;
$menu_name = $menus[0]->name;
$menu_items = wp_get_nav_menu_items($menu_id);
?>


<div  class="manage-menus">





 					<form method="get" action="<?php echo  admin_url('themes.php'); ?>">


		<input type="hidden" name="page" value="jin-plugin-menu">


			<label for="menu" class="selected-menu">Select a menu to edit:</label>


			<select name="menu_id" id="menu_id">


			<?php foreach ($menus as $menu) : 


					$select ="";


					if(isset($_REQUEST['menu_id']) && $menu->term_id == $_REQUEST['menu_id'] )


					{ 


					$select = "selected='selected'";


					$menu_name = $menu->name;


					}


			?>


					<option  <?php echo $select ?>  value="<?php echo $menu->term_id ?>"><?php echo $menu->name; ?></option>


			<?php endforeach; ?>


			</select>


			<span class="submit-btn"><input class="button-secondary" value="Select" type="submit"></span>


			


		</form>


</div>	







<div id="nav-menus-frame" class="wp-clearfix">

<div id="menu-settings-column" class="metabox-holder">
<div class="clear"></div>

<div id="side-sortables" class="accordion-container">
<ul class="outer-border">
<li id="add-post-type-page" class="control-section accordion-section open add-post-type-page">
<h3 class="accordion-section-title hndle" tabindex="0">
Support & Review
<span class="screen-reader-text"></span>
</h3>
<div class="accordion-section-content ">
<div class="inside">
<div id="jin-info"> <a class="twitter-follow-button" data-size="large" data-show-count="false" href="https://twitter.com/buffernow">Follow @buffernow</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>
<div class="clear"></div>
<br/>
Your feedback and review are both important, rate this plugin! 
<a href="https://wordpress.org/support/view/plugin-reviews/jin-menu#plugin-info">rate this plugin</a>
<div class="clear"></div>
<br/>
<br/>
<a href="mailto:rohitchowdhary75@gmail.com">Need help ?</a>
</div>
</div>
</div>
</li>
</ul>
</div>
</div>

<div id="menu-management-liquid">
<div id="menu-management">
<form method="post">





<?php settings_fields( 'super-settings-group' ); ?>





<div class="menu-edit " >
<div id="nav-menu-header">

<div class="major-publishing-actions wp-clearfix">
<label class="menu-name-label" for="menu-name"><?php echo $menu_name ?></label>
<div class="publishing-action">

<input id="save_menu_header" class="button button-primary menu-save" type="submit" value="Save Menu" name="save_menu">
</div>
</div>
</div>


<div id="post-body">
<div id="post-body-content" class="wp-clearfix">



<ul id="menu-to-edit" class="menu ui-sortable">


<?php 


//echo "<pre>"; print_r($menu_items);die;


foreach ( (array) $menu_items as $key => $menu_item )  :


if($menu_item->type !="custom")


	continue;

?>


 		<li id="menu-item-<?php echo $menu_item->ID ?>" class="menu-item menu-item-depth-0 menu-item-custom menu-item-edit-inactive">


			<div class="menu-item-bar">


				<div class="menu-item-handle">


					<span class="item-title">


					<span class="menu-item-title"><?php echo $menu_item->title ?></span> 


					</span>


					<span class="item-controls">


						<span class="item-type"><?php  echo $menu_item->type_label ?></span>

<a id="edit-<?php echo $menu_item->ID ?>" class="item-edit"  href="#menu-item-settings-<?php echo $menu_item->ID ?>"></a>
					


					</span>


				</div>


			</div>


				


				<div class="menu-item-settings wp-clearfix" id="menu-item-settings-<?php echo $menu_item->ID ?>">


					


				


				<p class="field-jin description description-wide">


<label for="edit-menu-item-jin-<?php echo $menu_item->ID ?>">


OnClick Javascript Code


<br>
<textarea id="edit-menu-item-jin-<?php echo $menu_item->ID ?>" class="widefat code edit-menu-item-jin" name="menu-item-jin[<?php echo $menu_item->ID ?>]"><?php   echo $menu_item->jin ?></textarea>


</label>


</p>


										


			</div><!-- .menu-item-settings-->


			<ul class="menu-item-transport"></ul>


	


		


		</li>


		<?php endforeach; ?>


 </ul>


 </div>
 </div>
 </div>


 <!--


 <div id="jin_setting" style="float:left;width:49%">


 <h1>Extra Scripts</h1>


 <textarea name="jin-footer-script" id="jin-footer-script">


		<?php echo stripcslashes(get_option( 'jin-footer-script', '' )); ?>


 </textarea>


 </div> -->


<input type="hidden" name="jin_update" value="1" >





</form>
</div>
</div>
</div>

 <script>


jQuery(document).ready(function() {


jQuery( "#menu-to-edit" ).accordion({ collapsible: true });


});


</script>


</div> 