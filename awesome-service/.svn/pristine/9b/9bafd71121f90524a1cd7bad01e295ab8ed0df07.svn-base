<?php

    // create awesome service section plugin menu.
    function awesome_service_create_menu() {

        add_submenu_page( 'edit.php?post_type=awesome_service_', 'Service', 'Awesome Service Option', 'manage_options', 'service','awesome_service_option_function' );

    }
    
    add_action('admin_menu', 'awesome_service_create_menu');

    if (is_admin() ) :

    //call register settings function.
    function awesome_service_register_setting() {
 
        register_setting( 'awesome_group_options', 'awesome_service_options');
    }
    add_action( 'admin_init', 'awesome_service_register_setting' );


    // page options.
    function awesome_service_option_function() {
        $awesome_service_options; 
        $setting = get_option( 'awesome_service_options',$awesome_service_options); ?>
    
    <div class="about-wrap">
        <h1>
        <?php esc_html_e( 'Welcome to Awesome Service!', 'awesome_service' ); ?></h1>
            <p class="about-text"><?php esc_html_e( 'Thank you for installing Awesome Service! You\'re now running the most popular Awesome Service plugin.','awesome_service'); ?>
            </p>
    </div>
    <hr>

    <div class="wrap">
    <div>
        <h2 class="option-title"><?php esc_html_e('Awesome Service Options','awesome_service'); ?></h2>
        <?php settings_errors(); ?>
        <h3 class="shortcode-style"><strong ><?php echo esc_html_e( 'Click to copy shortcode : ', 'awesome_service' ) ?></strong><input onclick="myFunction()" type="text" value="<?php esc_html_e('[awesome_service]','awesome_service'); ?>" id="myInput"></h3>
    </div>
        <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            document.execCommand("copy");
        }
        </script>

    <form method="POST" action="options.php">

        <?php 
        settings_fields( 'awesome_group_options' ); 
        do_settings_sections( 'awesome_group_options' );  
        $setting= get_option( 'awesome_service_options', $awesome_service_options );
        ?>

        <table class="form-table">
            <tr valign="top">
            <th scope="row"><?php esc_html_e('Section Padding Top','awesome_service'); ?></th>
            <td>
            <input type="number" name="awesome_service_options[padding_top]" value="<?php if(!empty($setting['padding_top'])){echo $setting['padding_top'];}else{echo '50';} ?>" /> px
            <p class="description"><?php esc_html_e('Padding top means top space how many gap in top then show this content.','awesome_service'); ?></p>
            </td>
            </tr>


            <tr valign="top">
            <th scope="row"><?php esc_html_e('Section Padding Bottom','awesome_service'); ?></th>
            <td><input type="number" name="awesome_service_options[padding_bottom]" value="<?php if(!empty($setting['padding_bottom'])){echo $setting['padding_bottom'];}else{echo '50';} ?>" /> px
            <p class="description"><?php esc_html_e('Padding bottom means how many gap in bottom space','awesome_service'); ?></p>
            </td>
            </tr>


            <tr valign="top">
            <th scope="row"><?php esc_html_e('Change Title Color','awesome_service'); ?></th>
            <td>
            <input type="text" class="my-color-field" name="awesome_service_options[title_color]" value="<?php if(!empty($setting['title_color'])){echo $setting['title_color'];}else{echo '#000';}?>" data-default-color="#000" />
            <p class="description"><?php esc_html_e('Choose your color for title text.','awesome_service'); ?></p>
            </td>
            </tr> 

            <tr valign="top">
            <th scope="row"><?php esc_html_e('Change Content Color','awesome_service'); ?></th>
            <td>
            <input type="text" class="my-color-field" name="awesome_service_options[content_color]" value="<?php if(!empty($setting['content_color'])){echo $setting['content_color'];}else{echo '#000';}?>" data-default-color="#000"  />
            <p class="description"><?php esc_html_e('Choose content color in here.','awesome_service'); ?></p>
            </td>
            </tr>


            <tr valign="top">
            <th scope="row"><?php esc_html_e('Change Background Number Mood','awesome_service'); ?></th>
            <td>
                <?php 
                $awesome_service_number = array(
                    'awesome_service_number_false' => array(
                        'display' => 'none',
                         'label' => esc_html__( 'Hide', 'awesome_service')
                    ),
                    'awesome_service_number_true' => array(
                        'display' => 'block',
                        'label' => esc_html__( 'Show', 'awesome_service')
                    )
                ); 
                foreach($awesome_service_number as $active) : ?>

                    <label>
                        <input type="radio" name="awesome_service_options[awesome_service_number]" value="<?php echo $active['display'] ?>" checked="checked" /> 
                    </label>

                    <label><?php echo $active['label']; ?></label><br />

                <?php endforeach; ?>

                <p class="discription"><?php esc_html_e('You can change background number mood. If don\'t like this just click Hide.','awesome_service'); ?></p>
            </td>
            </tr>  
            
            
            <tr valign="top">
            <th scope="row"><?php esc_html_e('Change Number color','awesome_service'); ?></th>
            <td>
            <input type="text" class="my-color-field" name="awesome_service_options[awesome_service_number_color]" value="<?php if(!empty($setting['awesome_service_number_color'])){echo $setting['awesome_service_number_color'];}else{echo 'rgba(216, 216, 216, 0.6)';}?>" data-default-color="rgba(216, 216, 216, 0.6)" />
            <p class="description"><?php esc_html_e('choose your number color','awesome_service'); ?></p>
            </td>
            </tr>


            <tr valign="top">
            <th scope="row"><?php esc_html_e('slidesToShow','awesome_service'); ?></th>
            <td><input type="number" class="small-text"name="awesome_service_options[slidesToShow]" value="<?php if (!empty($setting['slidesToShow'])) {echo $setting['slidesToShow']; }else{echo '3';} ?>" /> 
            <p class="description"><?php esc_html_e('How many post show in you display recommand 3 is best.','awesome_service'); ?></p>
            </td>
            </tr>


            <tr valign="top">
            <th scope="row"><?php esc_html_e('Speed','awesome_service'); ?></th>
            <td><input class="regular-text" type="number" name="awesome_service_options[speed]" value="<?php if(!empty($setting['speed'])){echo $setting['speed'];}else{echo '2500';}?>" /> Millisecond
            <p class="description"><?php esc_html_e('deafult value is 2500 you can change value any time.','awesome_service'); ?></p>
            </td>
            </tr>


            <tr valign="top">
            <th scope="row"><?php esc_html_e('Change Autoplay Mood','awesome_service'); ?></th>
            <td>
                <?php 
                $awesome_service_autoplay = array(
                    'awesome_service_autoplay_false' => array(
                        'value' => 'false',
                         'label' => esc_html__( 'Off', 'awesome_service')
                    ),
                    'awesome_service_autoplay_true' => array(
                        'value' => 'true',
                        'label' => esc_html__( 'On', 'awesome_service')
                    )
                ); 

                foreach($awesome_service_autoplay as $active) : ?>

                    <label>
                        <input type="radio" name="awesome_service_options[awesome_service_autoplay]" value="<?php echo $active['value'];?>" checked="checked" /> 
                    </label>
                        
                    <label><?php echo $active['label']; ?></label><br />

                <?php endforeach; ?>

            </td>
            </tr>


            <tr valign="top">
            <th scope="row"><?php esc_html_e('Change Dots Mood','awesome_service'); ?></th>
            <td>
                <?php 
                $awesome_service_dots = array(
                    'awesome_service_dots_false' => array(
                        'value' => 'false',
                        'label' => esc_html__( 'Hide', 'awesome_service')
                    ),
                    'awesome_service_dots_true' => array(
                        'value' => 'true',
                         'label' => esc_html__( 'Show', 'awesome_service')
                    )
                ); 

                foreach($awesome_service_dots as $active) : ?>

                    <label>
                        <input type="radio"  name="awesome_service_options[awesome_service_dots]" value="<?php echo $active['value'];?>"checked="checked"/> 
                    </label>
                        
                    <label><?php echo $active['label']; ?></label><br />

                <?php endforeach; ?>

            </td>
            </tr> 
           
        </table>
        <?php submit_button(); ?>

    </form> 
    </div>
    <?php } endif; ?>