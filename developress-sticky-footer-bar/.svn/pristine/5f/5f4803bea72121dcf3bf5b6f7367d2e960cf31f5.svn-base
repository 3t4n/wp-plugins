<?php

// Function to display the options page content
function mostra_pagina_opzioni() {
    $menus = get_terms('nav_menu', array('hide_empty' => false));
?>  

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="logo-backend" src="<?php echo plugin_dir_url( __FILE__ )?>/images/developress-logo.png">
                        <p class="mt-3">
                        
                            <img class="icon-language" src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/icons/it.png">
                            <img class="icon-language" src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/icons/fr.png">
                            <img class="icon-language" src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/icons/de.png">
                            <img class="icon-language" src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/icons/es.png">
                            <img class="icon-language" src="<?php echo plugin_dir_url( __FILE__ ); ?>/images/icons/en.png">
                        </p> 
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
<?php 
$developress_sticky_footer_bar_url = "https://api.wordpress.org/plugins/info/1.2/?action=plugin_information&request[slug]=developress-sticky-footer-bar";

$developress_sticky_footer_bar_data = wp_remote_get($developress_sticky_footer_bar_url);
$developress_sticky_footer_bar_current_version = json_decode(wp_remote_retrieve_body($developress_sticky_footer_bar_data), true);

?>
                            <h5 class="card-title">Sticky Footer Bar <i class="fas fa-arrow-right"></i> <?php echo __( 'Settings', 'developress_sticky_footer_bar' ); ?> <span class="badge rounded-pill text-bg-success">V. <?php echo $developress_sticky_footer_bar_current_version['version']; ?></span></h5> 
                                <p class="card-text">
                                    <?php echo __( 'Thanks for using the plugin! The plugin allows you to create a fixed scroll bar and customize it as you want by adding menu items and working on the style', 'developress_sticky_footer_bar' ); ?>
                                </p>
                                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#contactFormModal">
                                    <?php echo __( 'Documentation', 'developress_sticky_footer_bar' ); ?>
                                    <i class="fas fa-book"></i>
                                </button>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo __( 'You can select the menu item icon, directly on the menu management page (at the bottom of each item)', 'developress_sticky_footer_bar' ); ?> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                        
            <form method="post" action="options.php">

            <?php
                settings_fields('stickybar-settings');
                do_settings_sections('stickybar-settings');
            ?>
                
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <i class="fas fa-power-off icon-tab-big icon-tab-color-green"></i> <?php echo __( 'Active the sticky bar', 'developress_sticky_footer_bar' ); ?> 
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                            <p>
                                <?php echo __( 'When you have completed all the configurations, add the check mark in the box below to activate the footer bar.', 'developress_sticky_footer_bar' ); ?> 
                                        
                            </p>
                            <div class="form-check">
                                <label class="form-check-label" for="active_stiky_bar">
                                <input type="checkbox" id="active_stiky_bar" name="active_stiky_bar" value="1" <?php checked(get_option('active_stiky_bar'), 1); ?>>
                                <?php echo __( 'Active', 'developress_sticky_footer_bar' ); ?> 
                                </label>
                            </div>
                        </div> 
                    </div>
                </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                <i class="fas fa-paint-brush icon-tab-big icon-tab-color-blue"></i> 
                                    <?php echo __( 'Style and settings', 'developress_sticky_footer_bar' ); ?> 
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <p>
                                <?php echo __( 'In this section you can configure the text color, bar background and other settings.', 'developress_sticky_footer_bar' ); ?> 
                                </p>
                
                                <table class="table table-hover table-bordered">
                                <tr>
                                    <th scope="row">
                                    <?php echo __( 'Background color', 'developress_sticky_footer_bar' ); ?> 
                                    <span class="text-info-field">
                                            <?php echo __( 'Footer bar background color. Use the color picker to set it', 'developress_sticky_footer_bar' ); ?> 
                                    </span> 
                                    </th>
                                    <td>
                                        <input type="color" id="background_bar" name="background_bar" value="<?php echo esc_attr(get_option('background_bar')); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align:left;">
                                    <?php echo __( 'Font color of menu items', 'developress_sticky_footer_bar' ); ?> 

                                    <span class="text-info-field">
                                            <?php echo __( 'Color of menu items. Use the color picker to set it', 'developress_sticky_footer_bar' ); ?> 
                                        </span> 

                                    </th>
                                    <td>
                                        <input type="color" id="font_color" name="font_color" value="<?php echo esc_attr(get_option('font_color')); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align:left;">
                                    <?php echo __( 'Font size of menu items', 'developress_sticky_footer_bar' ); ?> 
                                
                                    <span class="text-info-field">
                                        <?php echo __( 'Font size for menu items. Use this field to set it. Add only "number" without "px".', 'developress_sticky_footer_bar' ); ?> 
                                    </span> 

                                    </th>
                                    <td>
                                        <div class="input-group mb-3">
                                        <input type="number" id="font_size" name="font_size" value="<?php echo esc_attr(get_option('font_size')); ?>" min="0">
                                            <span class="input-group-text" id="basic-addon1">px</span>
                                        </div>                    
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align:left;">
                                        <?php echo __( 'Font size othe label', 'developress_sticky_footer_bar' ); ?> 

                                        <span class="text-info-field">
                                            <?php echo __( 'Font size for other strings. Use this field to set it. Add only "number" without "px".', 'developress_sticky_footer_bar' ); ?>     
                                        </span> 
                                    </th>
                                    <td>
                                        <div class="input-group mb-3">
                                            <input type="number" id="font_size_other_label" name="font_size_other_label" value="<?php echo esc_attr(get_option('font_size_other_label')); ?>" min="0">
                                            <span class="input-group-text" id="basic-addon1">px</span>
                                        </div>  
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" style="text-align:left;">
                                    <?php echo __( 'Icon size', 'developress_sticky_footer_bar' ); ?> 

                                    <span class="text-info-field">
                                            <?php echo __( 'Size of icons in px. Use the field to set it. Add only "number" without "px".', 'developress_sticky_footer_bar' ); ?> 
                                        </span> 

                                    </th>
                                    <td>
                                    <div class="input-group mb-3">
                                        <input type="number" id="icon_size" name="icon_size" value="<?php echo esc_attr(get_option('icon_size')); ?>" min="0">
                                        <span class="input-group-text" id="basic-addon1">px</span>
                                    </div>  
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                    <?php echo __( 'Number of items horizontal bar', 'developress_sticky_footer_bar' ); ?> 

                                    <span class="text-info-field">
                                            <?php echo __( 'Specifies the number of entries in the horizontal bar. The rest will be added in the side menu.', 'developress_sticky_footer_bar' ); ?> 
                                    </span> 

                                    </th>
                                    <td>
                                        <input type="number" id="number_items_first_menu" name="number_items_first_menu" value="<?php echo esc_attr(get_option('number_items_first_menu', '4')); ?>" min="0" max="5">

                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">
                                    <?php echo __( 'Close link in the side menu', 'developress_sticky_footer_bar' ); ?> 

                                    <span class="text-info-field">
                                        <?php echo __( 'Translation for the closing link of the side menu. By default, it is "Close".', 'developress_sticky_footer_bar' ); ?> 
                                        </span> 

                                    </th>
                                    <td>
                                        <input type="text" id="translation_close_link" name="translation_close_link" value="<?php echo esc_attr(get_option('translation_close_link')); ?>">

                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <?php echo __( 'Hamburger menu title', 'developress_sticky_footer_bar' ); ?> 
                                        <span class="text-info-field">
                                        
                                        <?php echo __( 'Translation of the text of the link to the hamburger menu. By default, it is "Menu".', 'developress_sticky_footer_bar' ); ?> 
                                        </span> 

                                    </th>
                                    <td>
                                        <input type="text" id="translation_menu_link" name="translation_menu_link" value="<?php echo esc_attr(get_option('translation_menu_link')); ?>">

                                    </td>
                                </tr>

                            </table>
                        </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        <i class="fas fa-desktop icon-tab-big icon-tab-color-red"></i> 

                        <?php echo __( 'Display on all devices?', 'developress_sticky_footer_bar' ); ?> 
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">

                        <p>
                        <?php echo __( 'Choose on which type of device to show the footer bar.', 'developress_sticky_footer_bar' ); ?> 
                        </p>

                            <select id="visibility" name="visibility" class="form-select" aria-label="Default select example">
                                <option value="desktop" <?php selected(get_option('visibility'), 'desktop'); ?>><?php echo __( 'Only desktop', 'developress_sticky_footer_bar' ); ?></option>
                                <option value="tablet" <?php selected(get_option('visibility'), 'tablet'); ?>><?php echo __( 'Only tablet', 'developress_sticky_footer_bar' ); ?></option>
                                <option value="phone" <?php selected(get_option('visibility'), 'phone'); ?>><?php echo __( 'Only phone', 'developress_sticky_footer_bar' ); ?></option>
                                <option value="phone_tablet" <?php selected(get_option('visibility'), 'phone_tablet'); ?>><?php echo __( 'Only phone and tablet', 'developress_sticky_footer_bar' ); ?></option>
                                <option value="everywhere" <?php selected(get_option('visibility'), 'everywhere'); ?>><?php echo __( 'Everywhere', 'developress_sticky_footer_bar' ); ?></option>
                            </select>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                    <i class="fas fa-code icon-tab-big icon-tab-color-green"></i> 
                    <?php echo __( 'Custom CSS', 'developress_sticky_footer_bar' ); ?>
                </button>
                </h2>
                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                        <div class="accordion-body">
                            <p>
                                <?php echo __( 'If you have basic knowledge of HTML and CSS, you can add styling rules inside the box below. For example, you can add a different color and size to the icons.', 'developress_sticky_footer_bar' ); ?>
                            </p>
                            <textarea style="min-height: 300px; width:500px; background-color:#000;color:#fff;" id="custom_css" name="custom_css"><?php echo esc_textarea(get_option('custom_css')); ?></textarea>

                        </div>
                    </div>
            </div>

            <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                    <i class="fas fa-headphones icon-tab-big icon-tab-color-fuxia"></i>
                    <?php echo __( 'Need support?', 'developress_sticky_footer_bar' ); ?>
                </button>
                </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                        <div class="accordion-body">
                        <p>
                        <?php echo __( 'If you have any question or need support, do not hesitate to contact me. Provide as much information as possible and try to be precise. Only in this way can I give you the best support', 'developress_sticky_footer_bar' ); ?>
                        </p>   

                        <h5 class="mt-3 mb-3">
                        <?php echo __( 'Contact Form', 'developress_sticky_footer_bar' ); ?>
                        </h5>
                <div class="container">
                    <iframe src="https://developress.it/developress-plugin/technical-assistance/contact-form.php" width="100%" height="300px"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php submit_button(); ?>

            </form>                
        </div>
</div> 
       
<!-- Modal -->
<div class="modal fade" id="contactFormModal" tabindex="-1" aria-labelledby="contactFormModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contactFormModalLabel">Video Tutorial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <iframe width="100%" height="315" src="https://developress.it/developress-plugin/technical-assistance/developress-sticky-footer-bar-pro-documentation-video.mp4" title="developress-sticky-footer-bar-pro-documentation-video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
            <?php echo __( 'Close', 'developress_sticky_footer_bar' ); ?>
        </button>

      </div>
    </div>
  </div>
</div>

<?php } ?>