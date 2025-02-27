<div class="ftb-segment">
    
    <h2><?php 
echo __( "Step 4: Button Position", "floating-tiktok-button" );
?></h2>

    <div class="row">
        <div class="col-xs-3">
            <label class="ftb-label">
                <strong>
                    <?php 
echo __( 'Button Position', "floating-tiktok-button" );
?>
                </strong>
            </label>
        </div>

        <div class="col-xs">
            
            <div class="ftb-switch-radio">

                <input type="radio" id="position-1" name="button_position" value="bottom_left" v-model="button_position" />
                <label for="position-1"><?php 
echo __( 'Bottom Left', 'floating-tiktok-button' );
?></label>
                
                <input type="radio" id="position-2" name="button_position" value="bottom_right" v-model="button_position" />
                <label for="position-2"><?php 
echo __( 'Bottom Right', 'floating-tiktok-button' );
?></label>

                <input type="radio" id="position-3" name="button_position" value="top_left" v-model="button_position" />
                <label for="position-3"><?php 
echo __( 'Top Left', 'floating-tiktok-button' );
?></label>
                
                <input type="radio" id="position-4" name="button_position" value="top_right" v-model="button_position" />
                <label for="position-4"><?php 
echo __( 'Top Right', 'floating-tiktok-button' );
?></label>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-xs-3">
            <label class="ftb-label" for="enable_button">
                <strong>
                    <?php 
echo __( 'Text Position', "floating-tiktok-button" );
?>
                </strong>
            </label>
        </div>
        
        <div class="col-xs-9">
            <div class="ftb-switch-radio">

                <input type="radio" id="below" name="text_position" value="below" v-model="data.text_position" />
                <label for="below"><?php 
echo __( 'Below Image', 'floating-tiktok-button' );
?></label>

        <?php 
?>

                <input type="radio" disabled />
                <label @click="getPro('Get Pro Version to Display Text Above Icon')" for="everwhere" class="ftb-disabled"><?php 
echo __( 'Above Icon', 'floating-tiktok-button' );
?></label>

        <?php 
?>

            </div>

        <?php 
?>
            <div class="ftb-alert ftb-info" style="display: block;">
                <span class="closebtn">&times;</span>
                <?php 
echo sprintf( wp_kses( __( '<a href="%s">Get Pro version</a> to enable', "floating-tiktok-button" ), array(
    'a' => array(
        'href'   => array(),
        'target' => array(),
    ),
) ), esc_url( "admin.php?page=floating-tiktok-button-pricing" ) ) . " " . __( 'Text Position Feature', "floating-tiktok-button" );
?>
            </div>
        <?php 
?>

        </div>
    </div>

    <div class="row">
        <div class="col-xs-3">
            <label class="ftb-label">
                <strong>
                    <?php 
echo __( 'Button Margins', "floating-tiktok-button" );
?>
                </strong>
            </label>
        </div>

        <div class="col-xs-1">
            
            <label class="ftb-label" for="margin_top">
                <strong>
                    <?php 
echo __( 'Top', "floating-tiktok-button" );
?>
                </strong>
            </label>

        </div>

        <div class="col-xs-1">
            
            <input id="margin_top" type="number" name="margin_top" class="ftb-input" v-model="margin_top" />

        </div>

        <div class="col-xs-1">
            
            <label class="ftb-label" for="margin_right">
                <strong>
                    <?php 
echo __( 'Right', "floating-tiktok-button" );
?>
                </strong>
            </label>

        </div>

        <div class="col-xs-1">
            
            <input id="margin_right" type="number" name="margin_right" class="ftb-input" v-model="margin_right" />

        </div>

        <div class="col-xs-1">
            
            <label class="ftb-label" for="margin_bottom">
                <strong>
                    <?php 
echo __( 'Bottom', "floating-tiktok-button" );
?>
                </strong>
            </label>

        </div>

        <div class="col-xs-1">
            
            <input id="margin_bottom" type="number" name="margin_bottom" class="ftb-input" v-model="margin_bottom" />

        </div>

        <div class="col-xs-1">
            
            <label class="ftb-label" for="margin_left">
                <strong>
                    <?php 
echo __( 'Left', "floating-tiktok-button" );
?>
                </strong>
            </label>

        </div>

        <div class="col-xs-1">
            
            <input id="margin_left" type="number" name="margin_left" class="ftb-input" v-model="margin_left" />

        </div>

    </div>

</div>