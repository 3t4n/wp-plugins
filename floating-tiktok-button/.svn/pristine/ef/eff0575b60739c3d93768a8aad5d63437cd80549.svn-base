<div class="ftb-segment">

    <h2><?php 
echo __( "Step 1: Display Options", "floating-tiktok-button" );
?></h2>
    
    <div class="row">
        <div class="col-xs-3">
            <label class="ftb-label" for="enable_button">
                <strong>
                    <?php 
echo __( 'Enable Button/QRCode', "floating-tiktok-button" );
?>
                </strong>
            </label>
        </div>
        
        <div class="col-xs-9">
            <div class="ftb-switch-radio">

                <input type="radio" id="enable_button" name="enable_button" value="button" v-model="data.enable_button" />
                <label for="enable_button"><?php 
echo __( 'Floating TikTok Button', 'floating-tiktok-button' );
?></label>

        <?php 
?>

                <input type="radio" disabled />
                <label @click="getPro('Get Pro Version to Enable QRCode')" class="ftb-disabled"><?php 
echo __( 'TikCode', 'floating-tiktok-button' );
?></label>

                <input type="radio" disabled />
                <label @click="getPro('Get Pro Version to Enable QRCode')" class="ftb-disabled"><?php 
echo __( 'Both Button & TikCode', 'floating-tiktok-button' );
?></label>

        <?php 
?>

                <input type="radio" id="disable" name="enable_button" value="disable" v-model="data.enable_button" />
                <label for="disable"><?php 
echo __( 'Disable', 'floating-tiktok-button' );
?></label>

            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-3">
            <label class="ftb-label" for="tiktok_id">
                <strong>
                    <?php 
echo __( 'TikTok Username', "floating-tiktok-button" );
?>
                </strong>
            </label>
        </div>
        
        <div class="col-xs-9">
            <input id="tiktok_id" type="text" name="tiktok_id" class="ftb-input" v-model="data.tiktok_id" placeholder="Enter your TikTok Username here. e.g. khaby.lame" />
            <div v-if="!data.tiktok_id" class="ftb-alert ftb-info"><?php 
echo __( "Make sure to enter your TikTok Username for Button/TikCode to Work Properly", "floating-tiktok-button" );
?></div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3">
            <label class="ftb-label" for="enable_button">
                <strong>
                    <?php 
echo __( 'Display on', "floating-tiktok-button" );
?>
                </strong>
            </label>
        </div>
        
        <div class="col-xs-9">
            <div class="ftb-switch-radio">

                <input type="radio" id="post_pages" name="display_on" value="post_pages" v-model="data.display_on" checked="checked" />
                <label for="post_pages"><?php 
echo __( 'Posts & Pages', 'floating-tiktok-button' );
?></label>

        <?php 
?>

                <input type="radio" disabled />
                <label @click="getPro('Get Pro Version to Display Floating Button Everywhere')" for="everwhere" class="ftb-disabled"><?php 
echo __( 'Everywhere (+ Products)', 'floating-tiktok-button' );
?></label>

        <?php 
?>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-3">
            <label class="ftb-label" for="enable_button">
                <strong>
                    <?php 
echo __( 'Target Device', "floating-tiktok-button" );
?>
                </strong>
            </label>
        </div>
        
        <div class="col-xs-9">
            <div class="ftb-switch-radio">

                <input type="radio" id="desktop_mobile" name="devices" value="desktop_mobile" v-model="data.devices" checked="checked" />
                <label for="desktop_mobile"><?php 
echo __( 'Desktop & Mobile', 'floating-tiktok-button' );
?></label>

                <input type="radio" id="desktop" name="devices" value="desktop" v-model="data.devices" checked="checked" />
                <label for="desktop"><?php 
echo __( 'Desktop Only', 'floating-tiktok-button' );
?></label>

        <?php 
?>

                <input type="radio" disabled />
                <label @click="getPro('Get Pro Version to Display Floating Button on Mobile Only')" for="everwhere" class="ftb-disabled"><?php 
echo __( 'Mobile Only', 'floating-tiktok-button' );
?></label>

        <?php 
?>

            </div>
        </div>
    </div>


</div>