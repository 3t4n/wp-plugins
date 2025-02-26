<?php
/*
Plugin Name: Archives Widget Extended by Urbancube
Description:  Lists archives with some options
Version: 1.0
Author: bastho //  URBANCUBE
Author URI: http://urbancube.fr
License: CC BY-NC 3.0
*/
wp_register_sidebar_widget(
    'uc_archives',        // your unique widget id
    __('Archives ++','archives-widget-extended'),          // widget name
    'uc_display_archives',  // callback function
    array(                  // options
        'description' => __('Display archives with some options','archives-widget-extended')
    )
);
register_widget_control('uc_archives','widget_uc_archives_control');

load_plugin_textdomain( 'archives-widget-extended', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

//Now create the webitect_widget_control function:
function widget_uc_archives_control(){
    if( isset($_POST['uc_archives_title']) ){
        update_option('uc_archives_title', $_POST['uc_archives_title']);
        update_option('uc_archives_limit', $_POST['uc_archives_limit']);
        update_option('uc_archives_freq', $_POST['uc_archives_freq']);
        update_option('uc_archives_count', $_POST['uc_archives_count']);
        echo __('Options saved').'<br/>';
    }
	$uc_archives_title= get_option('uc_archives_title');
	$uc_archives_limit= get_option('uc_archives_limit');
	$uc_archives_freq= get_option('uc_archives_freq');
	$uc_archives_count= get_option('uc_archives_count');
	echo "
	<p><label for='uc_archives_title'>".__('Title','archives-widget-extended')."<br/>
	<input type='text' name='uc_archives_title' id='uc_archives_title' value='$uc_archives_title'/></label>
	</p>
	<p><label for='uc_archives_limit'>".__('Limit')."<br/>
	<input type='text' name='uc_archives_limit' id='uc_archives_limit' value='$uc_archives_limit'/></label>
	</p>
	<p><label for='uc_archives_freq'>".__('Type','archives-widget-extended')."<br/>
	<select name='uc_archives_freq' id='uc_archives_freq'>
		<option value='daily' ";if($uc_archives_freq=='daily'){echo 'selected';} echo">".__('Daily','archives-widget-extended')."</option>
		<option value='weekly' ";if($uc_archives_freq=='weekly'){echo 'selected';} echo">".__('Weekly','archives-widget-extended')."</option>
		<option value='monthly' ";if($uc_archives_freq=='monthly'){echo 'selected';} echo">".__('Monthly','archives-widget-extended')."</option>
		<option value='yearly' ";if($uc_archives_freq=='yearly'){echo 'selected';} echo">".__('Yearly','archives-widget-extended')."</option>
	</select>
	</label>
	</p>
	<p><label for='uc_archives_count'>".__('Show posts count','archives-widget-extended')."<br/>
	<select name='uc_archives_count' id='uc_archives_count'>
		<option value='0' ";if($uc_archives_count=='0'){echo 'selected';} echo">".__('No','archives-widget-extended')."</option>
		<option value='1' ";if($uc_archives_count=='1'){echo 'selected';} echo">".__('Yes','archives-widget-extended')."</option>
	</select></label>
	</p>
	";
    
}
function uc_display_archives($params){
	$uc_archives_title= get_option('uc_archives_title');	
	$uc_archives_limit= get_option('uc_archives_limit');	
	$uc_archives_freq= get_option('uc_archives_freq');		
	$uc_archives_count= get_option('uc_archives_count');	
	?>
	<?=$params['before_widget']?>
        <?=$params['before_title']?>
            <?=$uc_archives_title?>
        <?=$params['after_title']?>
        <?=$params['before_content']?>
        <ul id="uc_archives">
			<?php wp_get_archives('type='.$uc_archives_freq.'&show_post_count='.$uc_archives_count.'&limit='.$uc_archives_limit); ?>
		</ul>
        <?=$params['after_content']?>
    <?=$params['after_widget']?>
<?
}