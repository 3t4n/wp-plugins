<?php 
/* PAGES RENDERING FOR ADMIN SECTION */
defined( 'ABSPATH' ) or die( 'I cannot do anything when called directly good sir' );

 /**
 * SETUP PAGE
 * 
 */
function flexbillet_events_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    //Load the options
    $flexbilletOptions = get_option( 'flexbillet_events_options' );

    //Check if we already have working organizer setup
    $organizerDetails = flexbillet_events_getOrganizerDetails( 'da', $flexbilletOptions['flexbillet_events_field_organizerkey'], $flexbilletOptions['flexbillet_events_field_passphrase'] );        
     
     
     // check if the user has submitted the settings
     if ( isset( $_GET['settings-updated'] ) ) {

        //Set wordpress confirmation update / error message. If we get $organizerDetails, the update will be successful.
        if ($organizerDetails) {
            $updateMessage = 'oplysningerne er korrekte og er nu gemt!';
            $updateType = 'updated';
        } else {
            $updateMessage = 'Oplysningerne er ikke korrekte. Kontroller API oplysningerne og prøv igen';
            $updateType = 'error';           
            //New or updated settings are not valid. Clear organizer settings to prevent shortcode generation.
            delete_option( 'flexbillet_events_organizer_name' );
            delete_option( 'flexbillet_events_organizer_email' );
        }

        // add settings saved message with the class of "updated"
        add_settings_error( 'flexbillet_events_messages', 'flexbillet_events_message', __(  $updateMessage, 'flexbillet_events' ), $updateType );

        //New API values set, let's check if these are valid 

        //Check if both values are set
        if ( $flexbilletOptions['flexbillet_events_field_organizerkey'] != '' && $flexbilletOptions['flexbillet_events_field_passphrase'] != '' ) {

            //If we get an organizer name back, then information is valid and we should save that info
            if ( $organizerDetails ) {

                //simpleXMLElement not parsed so unserialize values for WP options insertion
                $organizerName = (string) $organizerDetails['organizer-name'];
                $organizerEmail = (string) $organizerDetails['organizer-email'];

                if ( get_option('flexbillet_organizer_name') ) {
                    update_option( 'flexbillet_events_organizer_name', $organizerName );
                    update_option( 'flexbillet_events_organizer_email', $organizerEmail );
                } else {
                    add_option( 'flexbillet_events_organizer_name', $organizerName, '', 'yes' );
                    add_option( 'flexbillet_events_organizer_email', $organizerEmail, '', 'yes' );
                }
            } 
          

        } 



     } 
          
     // show error/update messages
     settings_errors( 'flexbillet_events_messages' );
     ?>

     <div class="wrap flexbillet-bootstrap">
        <div class="row flexbillet-admin">
            <div class="col-lg-12">
                <img class="flexbillet-admin-logo" src="<?php echo FLEXBILLET_EVENTS_PLUGIN_URL . '/assets/img/flexbillet-logo.png'; ?>" />
                <hr />
            </div>
            <div class="col api-wrapper ">
                <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Indsæt din organizer key og passphrase. Du kan finde oplysningerne under API-menuen i Flexbillets administration.', 'flexbillet' ); ?></p>                                
                <form action="options.php" method="post">
                
                <?php

                // output security fields for the registered setting "flexbillet"
                settings_fields( 'flexbillet_events' );

                // output setting sections and their fields
                do_settings_sections( 'flexbillet_events' );

                // output save settings button
                submit_button( 'Gem indstillinger' );
                ?>
                </form>
            </div>
            <div class="col organizer-details-wrapper text-center">
                <?php 
                if ( get_option('flexbillet_events_organizer_name') ) {

                //Valid organizer already set up, show successful information to user

                ?>

                <img clas="mx-auto d-block" src="<?php echo FLEXBILLET_EVENTS_PLUGIN_URL . '/assets/img/admin-check.png'; ?>" />
                <h3>Du er klar til at vise dine events på hjemmesiden</h3>
                <h4>Events vises for: <b><?php echo esc_html( get_option('flexbillet_events_organizer_name') ); ?></b></h4>
                <p>Indsæt denne shortcode hvor du vil vise dine events eller gå til "Shortcode tilpasning" for flere muligheder</p>
                <code>[flexbillet-events]</code>

                <?php
                }
                ?>
            </div>
        </div>
     </div>
 <?php
}

/**
 * SHORTCODE PAGE
 * 
 */
function flexbillet_events_shortcode_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $flexbilletShortcodeOptions = get_option( 'flexbillet_events_shortcode_options' );

    //Handle submission / sanitize
    if (!empty($_POST)) {
        if ( ! isset( $_POST['flexbillet_events_shortcode_nonce'] ) || ! wp_verify_nonce( $_POST['flexbillet_events_shortcode_nonce'], 'flexbillet_events_shortcode_form_action' ) ) {
           print 'Something went wrong with this submission.<br>Error: nonce did not verify.';
           exit;
        
        } else {
                       
            /* Sanitize options */
            $sanitizedShortcodeOptions = array();
            $validateErrors = array();
            $errorCount = 0;
            
            /* Sanitize form submission*/
            $sanitizedShortcodeOptions['button-info-background'] = sanitize_hex_color( $_POST['flexbillet_events_shortcode_options']['button-info-background'] );
            $sanitizedShortcodeOptions['button-info-font-color'] = sanitize_hex_color( $_POST['flexbillet_events_shortcode_options']['button-info-font-color'] );
            $sanitizedShortcodeOptions['button-buy-background'] = sanitize_hex_color( $_POST['flexbillet_events_shortcode_options']['button-buy-background'] );
            $sanitizedShortcodeOptions['button-buy-font-color'] = sanitize_hex_color( $_POST['flexbillet_events_shortcode_options']['button-buy-font-color'] );
            $sanitizedShortcodeOptions['color-theme'] = intval( $_POST['flexbillet_events_shortcode_options']['color-theme'] );
            $sanitizedShortcodeOptions['border-radius'] = intval( $_POST['flexbillet_events_shortcode_options']['border-radius'] );
            
            /* validate form submission */
       
            if ( !ctype_xdigit( str_replace( '#', '', $sanitizedShortcodeOptions['button-info-background']) ) || strlen( $sanitizedShortcodeOptions['button-info-background'] ) !== 7){
               $errorCount++;
               array_push( $validateErrors, 'Info-knap baggrundsfarve er sat forkert, vælg igen.' );
            }

            if( !ctype_xdigit( str_replace( '#', '', $sanitizedShortcodeOptions['button-info-font-color'] ) ) || strlen( $sanitizedShortcodeOptions['button-info-font-color'] ) !== 7){
               $errorCount++;
               array_push( $validateErrors, 'Info-knap tekst farve er sat forkert, vælg igen.' );
            }

            if( !ctype_xdigit( str_replace( '#', '', $sanitizedShortcodeOptions['button-buy-background'] ) ) || strlen( $sanitizedShortcodeOptions['button-buy-background'] ) !== 7){
               $errorCount++;
               array_push( $validateErrors, 'Køb-knap baggrundsfarve er sat forkert, vælg igen.' );
            }

            if( !ctype_xdigit( str_replace( '#', '', $sanitizedShortcodeOptions['button-buy-font-color'] ) ) || strlen( $sanitizedShortcodeOptions['button-buy-font-color'] ) !== 7){
               $errorCount++;
               array_push( $validateErrors, 'Køb-knap tekst farve er sat forkert, vælg igen.' );
            }

            if ( !is_int($sanitizedShortcodeOptions['color-theme']) ) {
               $errorCount++;
               array_push( $validateErrors, 'Farve tema er sat forkert, vælg igen.' );            
            }

            if ( !is_int($sanitizedShortcodeOptions['border-radius']) ) {
               $errorCount++;
               array_push( $validateErrors, 'Hjørneudseende er sat forkert, vælg igen.' );            
            }

            if ( $errorCount > 0 ) {

            echo '<div class="alert alert-danger mt-2"><ul>';
            foreach ($validateErrors as &$value) {
               echo '<li>' . $value . '</li>';
            }  
            echo '</ul></div>';

            } else  {

                if ($flexbilletShortcodeOptions) {
                    update_option( 'flexbillet_events_shortcode_options', $sanitizedShortcodeOptions );
                } else {
                    add_option( 'flexbillet_events_shortcode_options', $sanitizedShortcodeOptions, '', 'yes' );                 
                }
            }      
        }
    }
    //Get our global shorcode options for appearance
    $flexbilletShortcodeOptions = get_option( 'flexbillet_events_shortcode_options' );

    /* Below we check to see that information is valid to make api call*/

    //Load the options
    $flexbilletOptions = get_option( 'flexbillet_events_options' );

    //Make call to check organizer settings work, or throw error to user to set up API
    $organizerDetails = flexbillet_events_getOrganizerDetails( 'da', $flexbilletOptions['flexbillet_events_field_organizerkey'], $flexbilletOptions['flexbillet_events_field_passphrase'] ); 

    //If details work, we fill up a category array for shorcode category choice, otherwise inform user to do correct setup  
    if ($organizerDetails) {

        $eventList = flexbillet_events_getEvents( 'da', $flexbilletOptions['flexbillet_events_field_organizerkey'], false, $flexbilletOptions['flexbillet_events_field_passphrase'] );
        $shortcodeCategories = flexbillet_events_getCategoryList($eventList);

    }
    ?>

    <div class="wrap flexbillet-bootstrap">
        <h4><span class="badge badge-info">Eksempelvisning af events</span></h4>
        <!-- START EXAMPLES -->
        <div class="row row-eq-height align-items-center">
            
            <!-- START BOXED EVENTS Example -->
            <div class="col-lg-4 col-md-12" style="margin: 0 -15px">
                <div class="flexbillet-box-wrapper flexbillet-compact-wrap d-flex flex-column col-12 my-3">

                    <div class="flexbillet-inner border d-flex flex-column flex-grow-1 p-3 <?php if ($flexbilletShortcodeOptions['border-radius'] == 1) echo 'flexbillet-rounded'; ?> flexbillet-theme-background-<?=$flexbilletShortcodeOptions['color-theme'];?>">
                        <div class="row d-flex flex-grow-1">
                            <!-- DATE -->
                            <div class="col-2">
                                <em class="date">3.</em>
                                <em class="month">jun</em>
                            </div>
                            
                            <!-- CONTENT -->
                            <div class="col-10 flex-column d-flex flex-grow-1">
                                <span class="flexbillet-title">Onsdagsevent - Håndbold</span>
                                <p class="flexbillet-description">Onsdagsevent</p>
                                <div class="mt-auto">
                                                                    <span class="cat-tag cat-color-span-<?=$flexbilletShortcodeOptions['color-theme'];?>">KATEGORI</span>
                                                                <div style="clear: both;"></div>
                                    <p class="location">Adresse / Stednavn</p>
                                        <a href="#" class="btn ucasetext button-buy float-right " style="background: <?=$flexbilletShortcodeOptions['button-buy-background']?>; color: <?=$flexbilletShortcodeOptions['button-buy-font-color']?>" role="button">KØB BILLETTER</a>
                                        <a href="#" class="btn ucasetext button-info float-right" style="background: <?=$flexbilletShortcodeOptions['button-info-background']?>; color: <?=$flexbilletShortcodeOptions['button-info-font-color']?>" role="button">MERE INFO</a>    
                                </div>
                            </div>                  
                            
                        </div>
                    </div>
                </div>                
            </div>
            <!-- END BOXED EVENTS Example -->            
            
            <!-- START COMPACT EVENTS Example -->
            <div class="col-lg-8 col-md-12 d-flex flex-column ">
                <div class="flexbillet-compact-wrap row eventdetailpanel compact category-hleird8f  event-signup-open" style="margin-bottom: 15px;">
                    <div class="col-lg-2 col-xs-12">
                        <div class="row date-wrapper compact">
                            <div class="col col-lg-12 weekday compact cat-color-acc-<?=$flexbilletShortcodeOptions['color-theme'];?> cat-color-bg-<?=$flexbilletShortcodeOptions['color-theme'];?> <?php if ($flexbilletShortcodeOptions['border-radius'] == 1) echo 'flex-events-border-radius-top-left'; ?>">Mandag</div>
                            <div class="col col-lg-12 date cat-color-acc-<?=$flexbilletShortcodeOptions['color-theme'];?> cat-color-bg-<?=$flexbilletShortcodeOptions['color-theme'];?> compact">24. december</div>
                            <div class="col col-lg-12 time cat-color-acc-<?=$flexbilletShortcodeOptions['color-theme'];?> cat-color-bg-<?=$flexbilletShortcodeOptions['color-theme'];?> compact <?php if ($flexbilletShortcodeOptions['border-radius'] == 1) echo 'flex-events-border-radius-bottom-left'; ?>"></div>
                        </div>
                    </div>
                    
                    <div class="col-lg-10 col-xs-12 right-event-wrapper border-acc-1 compact <?php if ($flexbilletShortcodeOptions['border-radius'] == 1) echo 'flex-events-border-radius-top-bottom-right'; echo ' flexbillet-theme-background-' . $flexbilletShortcodeOptions['color-theme']; ?>">
                        <div class="row">
                            <!-- description wrapper -->
                            <div class="col-md-12 event-title-wrap compact" style="height: 58px;">
                            Titel på event             <p>Eventbeskrivelsen vises her</p>
                            </div>

                                <div class="col-md-6 col-xs-12 lower-event-blocks">
                                    <!-- category wrapper -->
                                    <div class="col-md-12 category-wrap compact padding-left-0">
                                                                        <span class="cat-tag cat-color-span-<?=$flexbilletShortcodeOptions['color-theme'];?>">KATEGORI</span>
                                                                    </div>              
                                    <!-- location -->
                                    <div class="col-md-12 location-wrap padding-left-0 compact">
                                                                        <i class="fa fa-map-marker fa-fw site-event-details-icon align-middle"></i><p class="align-middle">Adresse / stednavn </p>
                                                                </div>
                                </div>
                                <div class="col-md-6 col-xs-12 lower-event-blocks text-right">
                                    <!-- info button -->
                                    <a href="#" class="btn ucasetext button-info" id="button-info" style="background: <?=$flexbilletShortcodeOptions['button-info-background']?>; color: <?=$flexbilletShortcodeOptions['button-info-font-color']?>" role="button">MERE INFO</a>                      
                                    <!-- buy tickets button -->
                                    <a href="#" class="btn btn-accent ucasetext button-buy " id="button-buy" style="background: <?=$flexbilletShortcodeOptions['button-buy-background']?>; color: <?=$flexbilletShortcodeOptions['button-buy-font-color']?>" role="button">KØB BILLETTER</a>
                                </div>

                        </div>              
                    </div>
                </div>   
            </div>
            <!-- END COMPACT EVENTS Example -->                       
                </div>
        <div class="row">
            <div class="col-lg-12">
                <hr />
            </div>
            <div class="col-lg-12">

                    <div class="row">
                        <!-- Left side -->
                        <div class="col-lg-6">
                            <h5><span class="badge badge-secondary">Tilpas udseende for alle shortcodes</span></h5>
                            <form action="admin.php?page=flexbillet-events-shortcodes" method="post">
                            <?php

                            //nonce field
                            wp_nonce_field( 'flexbillet_events_shortcode_form_action', 'flexbillet_events_shortcode_nonce' );

                            // output security fields for the registered setting "flexbillet"
                            settings_fields( 'flexbillet_events' );

                            // output setting sections and their fields
                            do_settings_sections( 'flexbillet_events_shortcodes' );

                            ?>
                            <!-- Info button background -->
                            <div class="row flexbillet-shortcode-input-wrapper">
                                <div class="col-lg-4">
                                    <p>Info-knap baggrundsfarve</p>
                                </div>
                                <div class="col-lg-8">
                                    <input style="text-align: left;" type="text" value="<? echo $flexbilletShortcodeOptions['button-info-background']; ?>" class="flexbillet-color-field" id="button-info-background" name="flexbillet_events_shortcode_options[button-info-background]"data-default-color="#effeff" />
                                </div>
                            </div>

                            <!-- Info button font color -->
                            <div class="row flexbillet-shortcode-input-wrapper">
                                <!-- buy button background -->
                                <div class="col-lg-4">
                                    <p>Info-knap tekst farve</p>
                                </div>
                                <div class="col-lg-8">
                                    <input style="text-align: left;" type="text" value="<? echo $flexbilletShortcodeOptions['button-info-font-color']; ?>" class="flexbillet-color-field" id="button-info-font-color" name="flexbillet_events_shortcode_options[button-info-font-color]"data-default-color="#effeff" />
                                </div>
                            </div>          

                            <!-- Buy button background -->
                            <div class="row flexbillet-shortcode-input-wrapper">
                                <!-- buy button background -->
                                <div class="col-lg-4">
                                    <p>Køb-knap baggrundsfarve</p>
                                </div>
                                <div class="col-lg-8">
                                    <input style="text-align: left;" type="text" value="<? echo $flexbilletShortcodeOptions['button-buy-background']; ?>" class="flexbillet-color-field" id="button-buy-background" name="flexbillet_events_shortcode_options[button-buy-background]"data-default-color="#effeff" />
                                </div>
                            </div>

                            <!-- Buy button font color -->
                            <div class="row flexbillet-shortcode-input-wrapper">
                                <!-- buy button background -->
                                <div class="col-lg-4">
                                    <p>Køb-knap tekst farve</p>
                                </div>
                                <div class="col-lg-8">
                                    <input style="text-align: left;" type="text" value="<? echo $flexbilletShortcodeOptions['button-buy-font-color']; ?>" class="flexbillet-color-field" id="button-buy-font-color" name="flexbillet_events_shortcode_options[button-buy-font-color]" data-default-color="#effeff" />
                                </div>
                            </div>

                            <!-- Select color scheme --> 
                             <div class="row flexbillet-shortcode-input-wrapper">
                                <div class="col-lg-4">
                                    Vælg farve udseende
                                </div>
                                <div class="col-lg-8">
                                    <select id="flexbillet-choose-color-theme" name="flexbillet_events_shortcode_options[color-theme]">
                                        <option value="1" <?php if ($flexbilletShortcodeOptions['color-theme'] == 1) echo 'selected'; ?>>Flex Farver</option>
                                        <option value="0" <?php if ($flexbilletShortcodeOptions['color-theme'] == 0) echo 'selected'; ?>>Neutral</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Select border radius --> 
                             <div class="row flexbillet-shortcode-input-wrapper">
                                <div class="col-lg-4">
                                    Vælg hjørne udseende
                                </div>
                                <div class="col-lg-8">
                                    <select id="flexbillet-choose-border-radius" name="flexbillet_events_shortcode_options[border-radius]">
                                        <option value="0" <?php if ($flexbilletShortcodeOptions['border-radius'] == 0) echo 'selected'; ?>>Skarpe hjørner</option>
                                        <option value="1" <?php if ($flexbilletShortcodeOptions['border-radius'] == 1) echo 'selected'; ?>>Afrundede hjørner</option>

                                    </select>
                                </div>
                            </div>                            

                            <?php
                            submit_button( 'Gem indstillinger' );
                            ?>
                            </form>     

                        </div>

                        <!-- RIGHT SIDE -->
                        <div class="col-lg-6 flexbillet-shortcode-right-wrap">
                            <h5><span class="badge badge-secondary">Lav event shortcode</span></h5>
                            <div class="row">
                                <div class="col">
                                    <!-- Category list -->
                                    <h5>Vælg kategorier</h5>
                                    <select id="shortcode-categories-select" name="short-select" size="4" multiple>
                                        <?php
                                        foreach ($shortcodeCategories as $categoryKey => $categoryName) {
                                        ?>
                                            <option value="<?=$categoryKey?>"><?=$categoryName?></option>
                                        <?
                                        }
                                        ?>
                                    </select>
                                     <p style="margin-top: 10px;">Vælg en eller flere kategorier til din shortcode.<br /><i>Hvis ingen vælges vises alle dine events</i></p>
                                     <div class="row">
                                <div class="col-lg-12">
                                    <br>
                                    <h5>Vælg din visningstype</h5>

                                </div>
                                    <div class="col-lg-6">
                                       Visningstype
                                    </div>
                                    <div class="col-lg-6 pr-4">
                                        <select id="flexbillet-choose-view-type" class="float-right">
                                            <option value="0" selected>Fuld bredde</option>
                                            <option value="1">Box visning (1/3)</option>
                                        </select>
                                    </div>
                                  </div>      
                                </div>
                                <div class="col">
                                    <div class="card bg-light mb-3">
                                      <div class="card-header">Shorcode information</div>
                                      <div class="card-body">
                                        <p class="card-text">
                                            Her kan du lave individuelle shorcodes til dine events. Temaindstillinger (farver) vil altid være ens alle steder, men du kan bygge shorcodes til at vise specifikke kategorier.<br><br> Du har også muligheden for at vise i fuld bredde (standard) eller boxed layout.<br><br> Boxed layout viser 3 bokse pr. række. 
                                            <i>Dine events bør altid indsættes i en fuld bredde række på din side</i>        
                                        </p>
                                      </div>
                                    </div>                                    
                                </div>

                            </div>                                
                               <div class="row flexbillet-shortcode-input-wrapper">
                                    <div class="col-lg-12">
                                        <hr style="margin-top: 30px; margin-bottom: 30px;">
                                        <p><i>Kopier shortcode herunder og indsæt på side du ønsker at vise events</i></p>
                                        <code id="flexbillet-show-shortcode">[flexbillet-events]</code>
                                        <button class="btn btn-success flex-copy-shortcode" data-clipboard-target="#flexbillet-show-shortcode">Kopier shortcode</button>                                    
                                    </div>                                    
                                </div>                                   


                        </div>
                    </div>
                </div>
            </div>





    </div>


<script>

    //Initialize button to copy  shortcode to clipboard
    var clipboard = new ClipboardJS('.flex-copy-shortcode');

    //Notify user we've copied to clipboard
    clipboard.on('success', function(e) {
       alert('Shortcode er kopieret til udklipsholder');

        e.clearSelection();
    });    

    //Event handler for selection/de-selection of categories for shortcode
    jQuery('#shortcode-categories-select').multiSelect({
          afterSelect: function(values){
            flexbilletEventsBuildShortCode('shortcode-categories-select');
            
          },
          afterDeselect: function(values){
            flexbilletEventsBuildShortCode('shortcode-categories-select');
          }
    });

    //Event handler for changing color theme
    jQuery('#flexbillet-choose-color-theme').change( function() {
        var flexColorTheme = jQuery(this).val();
        if (flexColorTheme == 0) { var removeClass = 1; } else { var removeClass = 0; }
        jQuery('.cat-color-bg-1, .cat-color-bg-0').addClass('cat-color-bg-' +flexColorTheme).removeClass('cat-color-bg-' +removeClass);
        jQuery('.cat-color-acc-1, .cat-color-acc-0').addClass('cat-color-acc-' +flexColorTheme).removeClass('cat-color-acc-' +removeClass);
        jQuery('.cat-color-span-1, .cat-color-span-0').addClass('cat-color-span-' +flexColorTheme).removeClass('cat-color-span-' +removeClass);

        jQuery('.flexbillet-inner, .right-event-wrapper').addClass('flexbillet-theme-background-' +flexColorTheme).removeClass('flexbillet-theme-background-' +removeClass);
    });

    //Event handler for changing of border radius
    jQuery('#flexbillet-choose-border-radius').change( function() {
        var flexBorderRadius = jQuery(this).val();
        if (flexBorderRadius == 0) { 
            //remove
            jQuery('.flexbillet-compact-wrap .weekday').removeClass('flex-events-border-radius-top-left');
            jQuery('.flexbillet-compact-wrap .time').removeClass('flex-events-border-radius-bottom-left');
            jQuery('.flexbillet-compact-wrap .right-event-wrapper').removeClass('flex-events-border-radius-top-bottom-right');

            jQuery('.flexbillet-inner').removeClass('flexbillet-rounded');
         } else { 
            //add
            jQuery('.flexbillet-compact-wrap .weekday').addClass('flex-events-border-radius-top-left');            
            jQuery('.flexbillet-compact-wrap .time').addClass('flex-events-border-radius-bottom-left');   
            jQuery('.flexbillet-compact-wrap .right-event-wrapper').addClass('flex-events-border-radius-top-bottom-right');

            jQuery('.flexbillet-inner').addClass('flexbillet-rounded');

        }
    });    

   jQuery('#flexbillet-choose-view-type').change( function() {
        flexbilletEventsBuildShortCode('shortcode-categories-select');
    });    
</script>    

<?php
}

?>