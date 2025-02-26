<?php
/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

	$product_changelog = get_post_meta( $post->ID, 'product_changelog', true );
	$ac_display_automatically = get_post_meta( $post->ID, 'ac_display_automatically', true );
	$ac_display_reverse = get_post_meta( $post->ID, 'ac_display_reverse', true );	
	$ac_head_line = get_post_meta( $post->ID, 'ac_head_line', true );	
	
	if( empty( $product_changelog ) ) $product_changelog = array();



wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-sortable');
wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_script( 'jquery-ui-core' );

wp_enqueue_script( 'ac_admin_js' );
wp_enqueue_style( 'ac_admin_style' );
wp_enqueue_style( 'ac_jquery-ui' );

wp_enqueue_script( 'ac_ParaAdmin' );
wp_enqueue_style( 'ac_paraAdmin' );
wp_enqueue_style( 'font-awesome' );


?>

<div class="para-settings">

    <div class="option-box">
		<p class="option-title"><?php _e('Shortcode','awesome-changelog'); ?></p>
		<div class="option-info"><?php _e('You can use this Shortcode anywhere you want to show this Changelog.', 'awesome-changelog' ); ?></div>
		
		<input type="text" value="[awesome_changelog id=<?php echo $post->ID; ?>]" size="30" style="background:#efefef;" onclick="this.select();"/>
	</div>	
	
    <div class="option-box">
		<p class="option-title"><?php _e('Head line text', 'awesome-changelog'); ?></p>
		<div class="option-info"></div>
		
		<input type="text" placeholder="Changelog" name="ac_head_line" value="<?php if(!empty($ac_head_line)) echo $ac_head_line; ?>" size="30" />
	</div>	    
    
    
    
    
    
    
    
    <div class="option-box">
		<p class="option-title"><?php _e('Display automatically under content.', 'awesome-changelog'); ?></p>
		<div class="option-info"></div>
		
        <select name="ac_display_automatically">
        	<option <?php if($ac_display_automatically=='yes') echo 'selected'; ?> value="yes"><?php _e('Yes', 'awesome-changelog'); ?></option>
            <option <?php if($ac_display_automatically=='no') echo 'selected'; ?> value="no"><?php _e('No','awesome-changelog' ); ?></option>
        </select>

	</div>	    
    
    
    <div class="option-box">
		<p class="option-title"><?php _e('Display reverse on front-end.', 'awesome-changelog'); ?></p>
		<div class="option-info"></div>
		
        <select name="ac_display_reverse">
            <option <?php if($ac_display_reverse=='no') echo 'selected'; ?> value="no"><?php _e('No','awesome-changelog' ); ?></option>
            <option <?php if($ac_display_reverse=='yes') echo 'selected'; ?> value="yes"><?php _e('Yes', 'awesome-changelog'); ?></option>
        </select>

	</div>	    
    
    
    
	<div class="option-box">
		<p class="option-title"><?php _e('Changelog','awesome-changelog' ); ?></p>
		
		
		
		<div class="changelog-list">
		<?php
			
			if( empty( $product_changelog ) ) {
				//echo ac_add_changelog();
			}

            if( !empty( $product_changelog ) )
			foreach($product_changelog as $changelog_index=>$changelog){

				$changelog['changelog_id'] = $changelog_index;
				echo ac_add_changelog($changelog);
			}
		?>
		</div>

		<div class="add-log button">Add <i class="fa fa-plus"></i></div>

	</div>
	 
</div>

<?php

$class_awesome_changelog_functions = new class_awesome_changelog_functions();
$changlog_status = $class_awesome_changelog_functions->changlog_status();

?>

<script>
    jQuery(document).ready(function($) {
        $(document).on('click','.add-log',function(){

            index = $.now();
            log_index = 1;


            html = "<div class='single'>";
            html += "<span class='remove'><i class='fa fa-times'></i></span> ";
            html += "<span class='move'><i class='fa fa-bars'></i></span>";
            html += "<input type='text' placeholder='1.0.0' name='product_changelog["+index+"][changelog_version]' value='' />";
            html += "<ul class='log-items'>";
            html += "<li>";
            html += "<span class='remove'><i class='fa fa-times'></i></span> ";
            html += "<span class='move'><i class='fa fa-arrows-alt'></i></span> ";
            html += "<select name='product_changelog["+index+"][log_items]["+log_index+"][log_type]'>";

            <?php
            if(!empty($changlog_status))
            foreach($changlog_status as $status_key=>$status){
                $title = $status['title'];
                ?>
                html += "<option value='<?php echo $status_key; ?>'><?php echo $title; ?></option>";
                <?php
            }
            ?>

            html += "</select> ";
            html += "<input class='ac_date_field' type='text' placeholder='17-05-2016' name='product_changelog["+index+"][log_items]["+log_index+"][log_date]' value='' /> ";
            html += "<textarea placeholder='Write something...' name='product_changelog["+index+"][log_items]["+log_index+"][log_content]' rows='1' cols='50'></textarea>";
            html += "</li>";
            html += "</ul>";
            html += "<div changelog_id='"+index+"' class='button add-log-item'>Add Log</div>";
            html += "</div>";

            $('.changelog-list').append(html);

        })


        $(document).on('click','.add-log-item',function(){

            index = $(this).attr('changelog_id');
            if( index.length == 0 ) return;

            log_index = $.now();

            html = "";

            html += "<li>";
            html += "<span class='remove'><i class='fa fa-times'></i></span> ";
            html += "<span class='move'><i class='fa fa-arrows-alt'></i></span> ";
            html += "<select name='product_changelog["+index+"][log_items]["+log_index+"][log_type]'>";

            <?php
            if(!empty($changlog_status))
            foreach($changlog_status as $status_key=>$status){
                $title = $status['title'];
                ?>
                html += "<option value='<?php echo $status_key; ?>'><?php echo $title; ?></option>";
                <?php
            }
            ?>

            html += "</select> ";
            html += "<input class='ac_date_field' type='text' placeholder='17-05-2016' name='product_changelog["+index+"][log_items]["+log_index+"][log_date]' value='' /> ";
            html += "<textarea placeholder='Write something...' name='product_changelog["+index+"][log_items]["+log_index+"][log_content]' rows='1' cols='50'></textarea>";
            html += "</li>";






            $(this).prev('.log-items').append(html);
            //awesome_changelog_bind_datepicker();

            $('.ac_date_field').datepicker({
                dateFormat : 'yy-mm-dd',
                onSelect: function(datetext){

                    var d = new Date(); // for now
                    var h = d.getHours();
                    h = (h < 10) ? ("0" + h) : h ;

                    var m = d.getMinutes();
                    m = (m < 10) ? ("0" + m) : m ;

                    var s = d.getSeconds();
                    s = (s < 10) ? ("0" + s) : s ;

                    datetext = datetext + " " + h + ":" + m + ":" + s;

                    $(this).val(datetext);
                }

            });

        })











    })

</script>