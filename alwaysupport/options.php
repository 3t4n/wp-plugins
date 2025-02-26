<?php

    $option_group = '_plugin_option_group';
    
    $option_name = '_plugin_options';

    // Create plugin options

    global $chat_options;

    $chat_options = array (       

        array("type" => "full-col-open"),

        array("name" => __('Alwaysupport Code','alwaysupport'),        
                "id" => "alwaysupport_script",
                "type" => "textarea",
                "std" => ""),   

        array("type" => "close")

    );


function chat_settings_page() {

  global $chat_options, $option_group, $option_name;
?>

<div class="wrap">

    <div class="options_wrap">

    <h2><img src="<?php echo plugins_url( '/assets/alwaysupport.png' , __FILE__ ); ?>" /></h2>
        
    <div class="always-link">
        <p>You need to have account at Alwaysupport to use this plugin.</p>        
    </div>

    <form method="post" action="options.php">

        <?php settings_fields( $option_group ); ?>

        <?php $options = get_option( $option_name ); ?>        

        <?php foreach ($chat_options as $value) {
     
            if ( isset($value['id']) ) { $valueid = $value['id'];}
            switch ( $value['type'] ) {

                case 'text':
                ?>                
                    <div class="options_input options_text">      
                        <span class="labels">
                            <label for="<?php echo $option_name.'['.$valueid.']'; ?>">
                                <?php echo $value['name']; ?>
                            </label>
                        </span>
                        <input name="<?php echo $option_name.'['.$valueid.']'; ?>" id="<?php echo $option_name.'['.$valueid.']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?>" />
                    </div>
                <?php
                break;

                case 'textarea':
                ?>
                    <div class="options_input options_textarea">        
                        <span class="labels"><label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>
                        <textarea name="<?php echo $option_name.'['.$valueid.']'; ?>" type="<?php echo $option_name.'['.$valueid.']'; ?>" cols="20" rows="20"><?php if ( isset( $options[$valueid]) ){ esc_attr_e($options[$valueid]); } else { esc_attr_e($value['std']); } ?></textarea>
                    </div>
                <?php 
                break;

                case "radio":
                ?>
                    <div class="options_input options_select">        
                        <span class="labels"><label for="<?php echo $option_name.'['.$valueid.']'; ?>"><?php echo $value['name']; ?></label></span>
                          <?php foreach ($value['options'] as $key=>$option) { 
                            $radio_setting = $options[$valueid];
                            if($radio_setting != ''){
                                if ($key == $options[$valueid] ) {
                                    $checked = "checked=\"checked\"";
                                } else {
                                    $checked = "";
                                }
                            }else{
                                if($key == $value['std']){
                                    $checked = "checked=\"checked\"";
                                }else{
                                    $checked = "";
                                }
                            }?>
                            <input type="radio" id="<?php echo $option_name.'['.$valueid.']'; ?>" name="<?php echo $option_name.'['.$valueid.']'; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php } ?>
                    </div>
                <?php
                break;

                case "left-open":
                ?>
                    <div class="options_wrap_left">
                <?php 
                break;

                case "right-open":
                ?>
                    <div class="options_wrap_right">
                <?php 
                break;

                case "full-col-open":
                ?>
                    <div class="options_wrap_full">
                    <div class="section-head">
                        <h2>General Settings</h2>
                        <p>Please paste your code from Alwaysupport in the box below.</p>
                    </div>
                <?php 
                break;

                case "close":
                ?>
                <div class="clearfix"></div>
                <span class="submit">
                    <input class="button button-primary save-code" type="submit" name="save" value="<?php _e('Save', 'alwaysupport') ?>" />
                </span>
                    </div><!--div close-->
                <?php 
                break;

            }
        }
        ?>
       
    </form>
    </div>

    <div class="sidebox first-sidebox"> 

        <h3>Instruction to create Alwaysupport Widget</h3>

        <hr />    
        <ol>
        <li>Click <a href="https://www.alwaysupport.com" target="_blank">here</a> to create account at Alwaysupport.</li>    

        <li>Customize your widget after you login to your Alwaysupport accout. </li>
        <li>Click <a href="https://www.alwaysupport.com/BarWidget.html" target="_blank">here</a> to go widget customization page.</li>
        <li>Customize your widget, copy and paste code provided by Alwaysupport in the textarea box in 'General Setting'</li>
        <li>Go to 'Knowledge Base' and add few questions</li>
        </ol>

        <hr />

        <h3>Using Plugin</h3>

        <p>Plugin start working once you activate it. <br/>You need to add Alwaysupport code in plugin's option page and save it to initial chat support in your site.</p>

    </div>

</div>
<?php }

if ( is_admin() ) {
    add_action( 'admin_head', 'hook_admin_head' );
}


function hook_admin_head() {

 wp_enqueue_style('admin-style', plugins_url('/assets/admin-style.css', __FILE__), array(), PLUGIN_VERSION, 'all');            

}