<?php
/*.................................................................................................................
...................................................................................................................
@@@@@@@@@@@@@@@@@@@@@	Plugin Setting Page 	@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
...................................................................................................................
..................................................................................................................*/

// create custom plugin settings menu
add_action('admin_menu', 'goTop_create_menu');

function goTop_create_menu() {

	//create new top-level menu
	add_menu_page('goTop Plugin Settings', 'Go Top Settings', 'administrator', __FILE__, 'goTop_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_goTop' );
}


function register_goTop() {
	//register our settings
	register_setting( 'goTop-settings-group', 'bg_color');
    register_setting( 'goTop-settings-group', 'icon_color' );
    register_setting( 'goTop-settings-group', 'music' );
}


function goTop_settings_page() {
?>
<div class="wrap">
<h2>Go Top Settings</h2><hr>

<h3>General Settings</h3>
<form method="post" action="options.php">
    <?php settings_fields( 'goTop-settings-group' ); ?>
    <?php do_settings_sections( 'goTop-settings-group' ); ?>
    <table class="form-table">
    	<tr valign="top">
        <th scope="row">Background Color</th>
        <?php $bgc = esc_attr(get_option('bg_color')); ?>
        <td>
            <input type="text" name="bg_color" value="<?php if($bgc == '') : echo 'e23a47'; else: echo $bgc; endif; ?>" />
            <p class="description">Please use hexa decimal color code.</p>
        </td>
        <?php
            
        ?>
        </tr>

        <tr valign="top">
            <th scope="row">Icon Color</th>
            <?php $ic = esc_attr(get_option('icon_color')); ?>
            <td>
                <input type="text" name="icon_color" value="<?php if($ic == '') : echo 'f9f9f9'; else: echo $ic; endif; ?>" />
            <p class="description">Please use hexa decimal color code.</p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row">Music</th>
            <?php $music = esc_attr(get_option('music')); ?>
            <td>
                <select name='music'>
                    <option value='true' <?php if($music=='true') : echo 'selected'; endif; ?>>Enable</option>
                    <option value='false' <?php if($music=='false') : echo 'selected'; endif; ?>>Disable</option>
                </select>
            </td>
        </tr>
         
        
    </table>

    <?php submit_button(); ?>

</form>
</div>
<?php } 


//Activate goTop
function goTop_activate() {


	echo "
		<style>
		    .elevator {
                background: #".get_option('bg_color').";
            }
            .elevator i {
                color: #".get_option('icon_color').";
            }
		</style>

	";
}
add_action('wp_head','goTop_activate');

