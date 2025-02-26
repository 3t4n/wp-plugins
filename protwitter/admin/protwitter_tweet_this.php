<?php 
	if(isset($_POST['protwitter_hidden']) && ($_POST['protwitter_hidden'] == 'Y')) {
		//Form data sent
		$protwitter_tweet_this_id = $_POST['protwitter_tweet_this_id'];
		$protwitter_tweet_this_tweet_text = $_POST['protwitter_tweet_this_tweet_text'];
		$protwitter_tweet_this_link_text = $_POST['protwitter_tweet_this_link_text'];
		$protwitter_tweet_this_link_title = $_POST['protwitter_tweet_this_link_title'];
		$protwitter_tweet_this_option1 = isset($_POST['protwitter_tweet_this_option1']);
		$protwitter_tweet_this_option2 = isset($_POST['protwitter_tweet_this_option2']);
		$protwitter_tweet_this_option3 = isset($_POST['protwitter_tweet_this_option3']);
		$protwitter_tweet_this_option4 = isset($_POST['protwitter_tweet_this_option4']);
		$protwitter_tweet_this_option5 = isset($_POST['protwitter_tweet_this_option5']);
		$protwitter_tweet_this_option6 = isset($_POST['protwitter_tweet_this_option6']);

		update_option('protwitter_tweet_this_id', $protwitter_tweet_this_id);
		update_option('protwitter_tweet_this_tweet_text', $protwitter_tweet_this_tweet_text);
		update_option('protwitter_tweet_this_link_text', $protwitter_tweet_this_link_text);
		update_option('protwitter_tweet_this_link_title', $protwitter_tweet_this_link_title);
		update_option('protwitter_tweet_this_option1', $protwitter_tweet_this_option1);
		update_option('protwitter_tweet_this_option2', $protwitter_tweet_this_option2);
		update_option('protwitter_tweet_this_option3', $protwitter_tweet_this_option3);
		update_option('protwitter_tweet_this_option4', $protwitter_tweet_this_option4);
		update_option('protwitter_tweet_this_option5', $protwitter_tweet_this_option5);
		update_option('protwitter_tweet_this_option6', $protwitter_tweet_this_option6);
		?>
		<div class="updated"><p><strong><?php _e('Options saved.' , 'protwitter'); ?></strong></p></div>
		<?php
	} else {
		//Normal page display
		$protwitter_tweet_this_id = get_option('protwitter_tweet_this_id');
		$protwitter_tweet_this_tweet_text = get_option('protwitter_tweet_this_tweet_text');
		$protwitter_tweet_this_link_text = get_option('protwitter_tweet_this_link_text');
		$protwitter_tweet_this_link_title = get_option('protwitter_tweet_this_link_title');
		$protwitter_tweet_this_option1 = get_option('protwitter_tweet_this_option1');
		$protwitter_tweet_this_option2 = get_option('protwitter_tweet_this_option2');
		$protwitter_tweet_this_option3 = get_option('protwitter_tweet_this_option3');
		$protwitter_tweet_this_option4 = get_option('protwitter_tweet_this_option4');
		$protwitter_tweet_this_option5 = get_option('protwitter_tweet_this_option5');
		$protwitter_tweet_this_option6 = get_option('protwitter_tweet_this_option6');
	}
?>

<div class="wrap">
	<?php    echo "<h2>" . __( 'Pro Twitter - Tweet this', 'protwitter') . "</h2>"; ?>
	<form name="protwitter_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="protwitter_hidden" value="Y">  	
					
		<?php    echo "<h4>" . __( 'Display Settings', 'protwitter') . "</h4>"; ?>
		

		<p><?php _e("You can add @'s and hashtags to \"Tweet Text,\" i.e. \"@Haotikus [TITLE] [URL] #plugins.\" ", 'protwitter'); ?></p>
		<p><?php _e("Tweet Text : " , 'protwitter'); ?><input type="text" name="protwitter_tweet_this_tweet_text" value="<?php echo $protwitter_tweet_this_tweet_text; ?>" size="50"></p>

		<p><?php _e("Add Text after image : " , 'protwitter'); ?><input type="text" name="protwitter_tweet_this_link_text" value="<?php echo $protwitter_tweet_this_link_text; ?>" size="20">
		<?php _e("Title : " , 'protwitter'); ?><input type="text" name="protwitter_tweet_this_link_title" value="<?php echo $protwitter_tweet_this_link_title; ?>" size="20"></p>


		<table border="0">
		<tr>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="1" <?php echo $protwitter_tweet_this_id==1? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
			$PLUGIN_PATH = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
			echo '<img src="'.$PLUGIN_PATH.'../img/t_mini-a.png">'; 
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="2" <?php echo $protwitter_tweet_this_id==2? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
			$PLUGIN_PATH = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
			echo '<img src="'.$PLUGIN_PATH.'../img/t_mini-b.png">'; 
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="3" <?php echo $protwitter_tweet_this_id==3? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
			$PLUGIN_PATH = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
			echo '<img src="'.$PLUGIN_PATH.'../img/t_mini-c.png">'; 
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="4" <?php echo $protwitter_tweet_this_id==4? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<img src="'.$PLUGIN_PATH.'../img/t_small-a.png">';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="5" <?php echo $protwitter_tweet_this_id==5? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<img src="'.$PLUGIN_PATH.'../img/t_small-b.png">';
		?>
		</td>		
		</tr>		

		<tr>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="6" <?php echo $protwitter_tweet_this_id==6? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<span style="background: #fff; padding: 1px; font-family: Geneva, Vera, Arial, Helvetica, sans-serif; font-size: x-small; font-variant: small-caps; border: 1px solid #999999;"><span style="color: #FFFFFF; background: #3333FF; padding: 0px 3px 0px 3px;">Tweet</span><span style="color: #0000CC; background: #AAAAAA; padding: 0px 6px 0px 3px;">this</span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="7" <?php echo $protwitter_tweet_this_id==7? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 10px; font-variant: small-caps; border: 1px solid #aaa;"><span style="color: #00c; background: #fff; padding: 0px 2px 0px 4.5px;">Tweet</span><span style="color: #000; background: #f93; padding: 0px 4.5px 0px 2px;">this</span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="8" <?php echo $protwitter_tweet_this_id==8? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: x-small; font-variant: small-caps; border: 1px solid #080;"><span style="color: #fff; background: #080; padding: 0px 2px;">Tweet</span><span style="color: #080; background: #fff; padding: 0px 8px 0px 2px;">This</span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="9" <?php echo $protwitter_tweet_this_id==9? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 10px; font-variant: small-caps; border: 1px solid #000;"><span style="color: #000; background: #fc0; padding: 0px 2px 0px 3px;">Tweet</span><span style="color: #fc0; background: #000; padding: 0px 3px 0px 2px;">this</span></span>';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="10" <?php echo $protwitter_tweet_this_id==10? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<span style="background: #fff; padding: 1px; font-family: Verdana, Geneva, Vera, Arial, Helvetica, sans-serif; font-size: 0.8em; font-variant: small-caps; border: 1px solid #aaa;"><span style="color: #fff; background: #c00; padding: 0px 2px 0px 2.4000000000000004px;">Tweet</span><span style="color: #000; background: #fff; padding: 0px 2.4000000000000004px 0px 2px;">this</span></span>';
		?>
		</td>
		
		</tr>

		<tr>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="11" <?php echo $protwitter_tweet_this_id==11? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
			$PLUGIN_PATH = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
			echo '<img src="'.$PLUGIN_PATH.'../img/twitter-a.png">'; 
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="12" <?php echo $protwitter_tweet_this_id==12? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
			$PLUGIN_PATH = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
			echo '<img src="'.$PLUGIN_PATH.'../img/twitter-b.png">'; 
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="13" <?php echo $protwitter_tweet_this_id==13? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
			$PLUGIN_PATH = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
			echo '<img src="'.$PLUGIN_PATH.'../img/twitter-c.png">'; 
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="14" <?php echo $protwitter_tweet_this_id==14? 'checked=checked': '' ?>>
		</td>
		<td width="150px">
		<?php 
		echo '<img src="'.$PLUGIN_PATH.'../img/t_logo-a.png">';
		?>
		</td>
		<td>
			<input type="radio" name="protwitter_tweet_this_id" value="15" <?php echo $protwitter_tweet_this_id==15? 'checked=checked': '' ?>>
		</td>
		<td width="150px">	
		<?php 
		echo '<img src="'.$PLUGIN_PATH.'../img/t_logo-b.png">';
		?>
		</td>		
		</tr>		




	</table>
	
	<?php    echo "<h4>" . __( 'Advanced Options', 'protwitter') . "</h4>"; ?>
		

		<input type="checkbox" name="protwitter_tweet_this_option1" value="1" <?php echo $protwitter_tweet_this_option1==1? 'checked=yes': '' ?>> 
				Open links in a new windows. <br \>
		<input type="checkbox" name="protwitter_tweet_this_option2" value="1" <?php echo $protwitter_tweet_this_option2==1? 'checked=yes': '' ?>> 
				Add nofollow tag to links. <br \>
		<input type="checkbox" name="protwitter_tweet_this_option3" value="1" <?php echo $protwitter_tweet_this_option3==1? 'checked=yes': '' ?>> 
				Only show Tweet This when viewing single posts or pages. <br \>
		<input type="checkbox" name="protwitter_tweet_this_option4" value="1" <?php echo $protwitter_tweet_this_option4==1? 'checked=yes': '' ?>> 
				Hide Tweet This button on pages. <br \>
		<input type="checkbox" name="protwitter_tweet_this_option5" value="1" <?php echo $protwitter_tweet_this_option5==1? 'checked=yes': '' ?>> 
				Don't shorten URLs with bit.ly service.<br \>
		<input type="checkbox" name="protwitter_tweet_this_option6" value="1" <?php echo $protwitter_tweet_this_option6==1? 'checked=yes': '' ?>> 
				Don't shorten URLs under 30 characters.<br \>

		</p>		
			
		<p class="submit">
		<input type="submit" name="Submit" value="<?php _e('Update Options', 'protwitter') ?>" />
		</p>
	</form>
	<p>For more plugins visit <a href="http://www.myfastblog.com" target="_BLANK" alt="My Fast Blog"> My Fast Blog</a></p>
</div>
