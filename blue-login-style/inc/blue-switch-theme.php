<?php
	function blue_login_switch_theme(){
	
	//theme names
	$arr = array('BlueWorld','DarkLight','SimpleBlue','BlueMount','WoodStyle','BlurPurple','SimpleFlat','SimpleOutLine');
	
?>

	<div class="wrap">
	<h2><?php echo _e('Blue Login Themes','alimir'); ?><span class="title-count theme-count"><?php echo sizeof($arr); ?></span></h2><br />
	<?php
	if(isset($_GET["action"]) &&  $_GET["action"] == 'activate'){
		update_option( 'blue_default_theme', $_GET["stylesheet"] );
		echo '<div id="message2" class="updated"><p>' . __( 'New theme activated.', 'alimir' ) .'</p></div>';
	}
	//move active theme to the first of all themes.
	if(get_option('blue_default_theme') != null){
		$activeitem = get_option('blue_default_theme');
		$key = array_search($activeitem, $arr);
		unset($arr[$key]);
		array_unshift($arr, $activeitem);
	}
	?>

	<div class="theme-browser rendered">
	
		<div class="themes">
		<?php
		foreach ($arr as $value) {
		?>
			<div tabindex="0" class="theme <?php if (get_option('blue_default_theme') == $value) echo 'active';?>">
				
				<div class="theme-screenshot">
					<img src="<?php echo plugins_url('/assets/images', dirname(__FILE__)); ?>/themes/<?php echo $value;?>.png" alt="">
				</div>
				
				<span class="more-details" id="<?php echo $value;?>-action"><?php echo $value;?> Theme</span>
				<div class="theme-author">By Ali Mirzaei</div>

				<h3 class="theme-name" id="<?php echo $value;?>-name">
					<?php if (get_option('blue_default_theme') == $value) echo '<span>' . __('Active:','alimir') . '</span>';?> 
					<?php echo $value;?>
				</h3>
				
				<?php if (get_option('blue_default_theme') != $value): ?>
				<div class="theme-actions">
					<a class="button button-primary activate" href="admin.php?page=blue-login-themes&amp;action=activate&amp;stylesheet=<?php echo $value; ?>"><?php echo _e('Activate'); ?>
					</a>
				</div>
				<?php endif; ?>
				
			</div>
		<?php
		}
		?>

		</div>
		
	<br class="clear">
	</div>
	
	<div class="theme-overlay"></div>

	</div>
<?php
	}