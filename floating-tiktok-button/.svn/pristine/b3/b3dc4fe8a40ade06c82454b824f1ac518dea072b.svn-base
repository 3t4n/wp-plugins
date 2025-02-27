<div class="ftb-segment">

    <h2 style="margin-bottom: 0"><?php 
echo __( "Step 2: Choose Button Style", "floating-tiktok-button" );
?></h2>

    <p style="margin: 8px 0 20px;"><?php 
echo __( 'Several options are offered as floating Tiktok button (either static or animated). You may also use a custom image ...', 'floating-tiktok-button' );
?></p>

    <div class="row" style="margin-bottom: 0;">
        
        <div class="col-xs">
            <div class="ftb-icons">
                <input type="radio" name="icon_styles" id="icon_style1" value="icon_style1" class="input-hidden" v-model="data.icon_styles" @change="icon_url = '<?php 
echo FTB_PLUGIN_URL;
?>/admin/assets/icon1.svg'" />
                <label for="icon_style1"><img src="<?php 
echo FTB_PLUGIN_URL;
?>/admin/assets/icon1.svg" width="50" height="50" /></label>
                
                <input type="radio" name="icon_styles" id="icon_style2" value="icon_style2" class="input-hidden" v-model="data.icon_styles" @change="icon_url = '<?php 
echo FTB_PLUGIN_URL;
?>/admin/assets/icon2.svg'" />
                <label for="icon_style2"><img src="<?php 
echo FTB_PLUGIN_URL;
?>/admin/assets/icon2.svg" width="50" height="50" /></label>
                
            <?php 
?>
        
                <input type="radio" class="input-hidden" disabled />
                <label @click="getPro('Get Pro Version to Enable Animated Icon Feature')"><img src="<?php 
echo FTB_PLUGIN_URL;
?>/admin/assets/icon3.gif" width="50" height="50"  class="ftb-disabled" /></label>

                <input type="radio" class="input-hidden" disabled />
                <label @click="getPro('Get Pro Version to Enable Animated Icon Feature')"><img src="<?php 
echo FTB_PLUGIN_URL;
?>/admin/assets/icon4.gif" width="50" height="50"  class="ftb-disabled" /></label>

                <input type="radio" class="input-hidden" disabled />
                <label @click="getPro('Get Pro Version to Enable Custom Icon Feature')"><span class="ftb-custom ftb-disabled"><?php 
echo __( 'Custom', 'floating-tiktok-button' );
?></span></label>
            
        <?php 
?>
                
                
            </div>

        </div>

        <?php 
?>

        <input type="hidden" name="icon_url" class="ftb-input" v-model="icon_url" />
        <input type="hidden" name="icon_custom_preview" class="ftb-input" v-model="icon_custom_preview" />

    </div>

</div>