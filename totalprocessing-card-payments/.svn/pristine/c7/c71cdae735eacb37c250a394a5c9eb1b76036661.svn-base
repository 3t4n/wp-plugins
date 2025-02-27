<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.totalprocessing.com
 */
?>
<style type="text/css">

/**
 * Checkbox Toggle UI
 */
input[type="checkbox"].wppd-ui-toggle {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;

    -webkit-tap-highlight-color: transparent;

    width: auto;
    height: auto;
    vertical-align: middle;
    position: relative;
    border: 0;
    outline: 0;
    cursor: pointer;
    margin: 0 4px;
    background: none;
    box-shadow: none;
}
input[type="checkbox"].wppd-ui-toggle:focus {
    box-shadow: none;
}
input[type="checkbox"].wppd-ui-toggle:after {
    content: '';
    font-size: 8px;
    font-weight: 400;
    line-height: 18px;
    text-indent: -14px;
    color: #ffffff;
    width: 36px;
    height: 18px;
    display: inline-block;
    background-color: #a7aaad;
    border-radius: 72px;
    box-shadow: 0 0 12px rgb(0 0 0 / 15%) inset;
}
input[type="checkbox"].wppd-ui-toggle:before {
    content: '';
    width: 14px;
    height: 14px;
    display: block;
    position: absolute;
    top: 2px;
    left: 2px;
    margin: 0;
    border-radius: 50%;
    background-color: #ffffff;
}
input[type="checkbox"].wppd-ui-toggle:checked:before {
    left: 20px;
    margin: 0;
    background-color: #ffffff;
}
input[type="checkbox"].wppd-ui-toggle,
input[type="checkbox"].wppd-ui-toggle:before,
input[type="checkbox"].wppd-ui-toggle:after,
input[type="checkbox"].wppd-ui-toggle:checked:before,
input[type="checkbox"].wppd-ui-toggle:checked:after {
    transition: ease .15s;
}
input[type="checkbox"].wppd-ui-toggle:checked:after {
    content: 'ON';
    background-color: #2271b1;
}
table.wc_status_table tbody {font-weight:100!important; font-size: smaller;}
table.wc_status_table code {font-weight:100!important; font-size: smaller!important;}
table.wc_status_table tbody tr td {vertical-align: middle;}
table.wc_status_table tbody tr td button.tp-admin-ajax {font-size:unset;line-height:unset;padding:5px;}
td mark.warning {color: #ffaf20;}
div#applePayDemo a.applePayBtn {
    -webkit-appearance:-apple-pay-button;
    height: 30px;
    width: 150px;
    display:block;
}
div#applePayDemo a.black {-apple-pay-button-style: black;}
div#applePayDemo a.white {-apple-pay-button-style: white;}
div#applePayDemo a.white-outline {-apple-pay-button-style: white-outline;}
div#applePayDemo a.plain {-apple-pay-button-type: plain;}
div#applePayDemo a.book {-apple-pay-button-type: book;}
div#applePayDemo a.buy {-apple-pay-button-type: buy;}
div#applePayDemo a.check-out {-apple-pay-button-type: check-out;}
div#applePayDemo a.donate {-apple-pay-button-type: donate;}
div#applePayDemo a.subscribe {-apple-pay-button-type: subscribe;}
a.wc_tpapv2_applepayment {height: 30px; width: 150px;}
</style>
<div>
    <?php
    $showSaveBtn=false;
    $htmlSubMenu='<ul id="settings-sections" class="subsubsub hide-if-no-js">'."\n";
    $htmlFormData='';
    $htmlTitle='';
    $htmlDescription='';
    $htmlBody='';
    $settingFields = $this->settings_fields(false);
    if(is_array($settingFields)){
        $lastSetting = count($settingFields);
        $qsArray=[];
        wp_parse_str( $_SERVER['QUERY_STRING'], $qsArray );
        if(!isset($qsArray['opt'])){
            $sectionId='general';
        } else {
            $sectionId=$qsArray['opt'];
        }
        foreach( $settingFields as $section => $data ) {
            $lastSetting--;
            $current='';
            if(isset($qsArray['opt'])){
                if($qsArray['opt'] === $section){
                    $current=' current';
                }
            } else {
                if($section==='general'){
                    $current=' current';
                }
            }
            if($section==='general'){
                $href='';
            } else {
                $href='&opt='.$section;
            }
            $htmlSubMenu .= '<li>
                <a class="tab'.$current.'" 
                   href="' . get_admin_url() . 'admin.php?page=wc-settings&tab=checkout&section='. $this->id . $href . '"
                >' . ucwords($section) . '</a>'; if($lastSetting > 0){$htmlSubMenu .=' | ';} $htmlSubMenu .= '</li>' . "\n";
            $display = 'none';
            if($section===$sectionId){
                $display='block';
            }
            if(isset($data['fields'])){
                if(count($data['fields'])>0){
                    if($display==='block'){
                        $showSaveBtn=true;
                    }
                    $htmlFormData .= '<table class="form-table" style="display:'.$display.';">'."\n";
                    $htmlFormData .= $this->generate_settings_html( $data['fields'], false );
                    $htmlFormData .= '</table>'."\n";
                }
            }
        }
        if(isset($settingFields[$sectionId]['title'])){
            $htmlTitle=$settingFields[$sectionId]['title'];
        } else {
            //
        }
        if(isset($settingFields[$sectionId]['description'])){
            $htmlDescription=$settingFields[$sectionId]['description'];
        } else {
            //
        }
        if(isset($settingFields[$sectionId]['body'])){
            $htmlBody=$settingFields[$sectionId]['body'];
        } else {
            $htmlBody='';
        }
    }
    $htmlSubMenu .= '</ul>' . "\n";
    $htmlSubMenu .= '<br class="clear" />' . "\n";
    if($showSaveBtn===false){
        $htmlSubMenu .= '<style type="text/css">form#mainform p.submit {display:none;}</style>';
    }
    ?>
    <?php echo $htmlSubMenu; ?>
    <table style="width:100%;">
        <tr>
            <td style="text-align:left; padding-right:2em; width:75%;">
                <h3><?php echo $htmlTitle; ?></h3>
                <?php echo $htmlDescription; ?>
               </td>
            <td style="text-align:right; width:25%;">
                <img src="<?php echo TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL.'/assets/img/'.'apple-pay-logo@2x.png'; ?>" alt="Apple Pay" style="height:58px; margin-right:24px;">
                   <img src="<?php echo TOTALPROCESSING_PAYMENTGATEWAY_APPLEPAY_BASEURL.'/assets/img/'.'tp-logo.png'; ?>" alt="Total Processing" style="height:58px;">
            </td>
        </tr>
        <?php
        if($sectionId==='styles'){
            echo '<tr><td colspan="2">'. "\n";
            echo '<div id="applePayDemo">'. "\n";
            echo '<a lang="'.$this->applepayapplepaylanguage.'" 
                class="applePayBtn '.$this->applepayapplepaystyle.' '.$this->applepayapplepaytype.'"></a>'. "\n";
            echo '</div>'. "\n";
            echo '</td></tr>'. "\n";
            $htmlBody='';
        }
        ?>
    </table>
    <?php if($sectionId==='styles'): ?>
    <script type="text/javascript">
    jQuery(function(){
        jQuery('body').on('change', '.changeButtonStyle', function(e){
            var el=document.getElementById('applePayDemo');
            var apStyle = document.getElementById('woocommerce_'+'<?php echo $this->id ?>'+'_applepayapplepaystyle').value;
            var apType = document.getElementById('woocommerce_'+'<?php echo $this->id ?>'+'_applepayapplepaytype').value;
            var apLang = document.getElementById('woocommerce_'+'<?php echo $this->id ?>'+'_applepayapplepaylanguage').value;
            el.innerHTML='';
            var aNode = document.createElement('a');
            aNode.classList.add('applePayBtn');
            aNode.classList.add(apStyle);
            aNode.classList.add(apType);
            aNode.setAttribute('lang',apLang);
            el.appendChild(aNode);
        });
    });
    </script>
    <?php endif; ?>
    <?php echo $htmlFormData; ?>
    <?php
    if($htmlBody==='showStatus') {
        echo '<div id="statusTablesContainer">'."\n";
        echo $this->generateStatusArray(true);
        echo '</div>'."\n";
    } else if($htmlBody==='reporting1'){
        echo '<div id="statusTablesContainer">'."\n";
        //echo $this->generateReportContent();
        echo '</div>'."\n";
    } else {
        echo $htmlBody;
    }
    if($sectionId === 'status') {
    ?>
    <!--js-->
    <script type="text/javascript">
        jQuery(function(){
            jQuery('body').on('click', '.tp-admin-ajax', function(e){
                e.preventDefault();
                let elem  = jQuery(this);
                var elTxt = elem.text();
                elem.prop('disabled', true);
                elem.text('Requesting....');
                var action = jQuery(this).data('pl_action');
                return wp.ajax.post(action,{})
                .then(function(response) {
                    //console.log(response);
                    if(response.hasOwnProperty('responseData')){
                     //console.log(response.responseData);    
                    }
                    if(response.valid==true){
                        if(response.hasOwnProperty('containerId')){
                            var el=document.getElementById(response.containerId);
                            if(response.hasOwnProperty('html')){
                                el.innerHTML=response.html;
                            }
                        }
                    }else{
                        elem.prop('disabled', false);
                        if( 'moveValidationFile' == action ){
                            elem.text('Move File');
			}else{
                            elem.text(elTxt);
                        }
                    }
                });
            });
        });
    </script>
    <!--/js-->
    <?php
    }

    if($sectionId === 'Gateway Settings') {
    ?>
    <!--js-->
    <script type="text/javascript">
        jQuery(function($){
            var alreadyTPApplepayPayModeVal = $( '#woocommerce_wc_tpapv2_platformBase' ).val();
            if( alreadyTPApplepayPayModeVal == 'test' ){
                $( document ).find( '#woocommerce_wc_tpapv2_entityId, #woocommerce_wc_tpapv2_accessToken' ).parent().parent().parent().hide();
                $( document ).find( '#woocommerce_wc_tpapv2_entityId_test, #woocommerce_wc_tpapv2_accessToken_test' ).parent().parent().parent().show();
            }else if( alreadyTPApplepayPayModeVal == 'live' ){
                $( document ).find( '#woocommerce_wc_tpapv2_entityId_test, #woocommerce_wc_tpapv2_accessToken_test' ).parent().parent().parent().hide();
                $( document ).find( '#woocommerce_wc_tpapv2_entityId, #woocommerce_wc_tpapv2_accessToken' ).parent().parent().parent().show();
            }
            $( '#woocommerce_wc_tpapv2_platformBase' ).on( 'change', function( e ){
                var el       = $( this );
                var elVal    = el.val();
                if( elVal == 'test' ){
                $( document ).find( '#woocommerce_wc_tpapv2_entityId, #woocommerce_wc_tpapv2_accessToken' ).parent().parent().parent().hide();
                $( document ).find( '#woocommerce_wc_tpapv2_entityId_test, #woocommerce_wc_tpapv2_accessToken_test' ).parent().parent().parent().show();
                }else if( elVal == 'live' ){
                $( document ).find( '#woocommerce_wc_tpapv2_entityId_test, #woocommerce_wc_tpapv2_accessToken_test' ).parent().parent().parent().hide();
                $( document ).find( '#woocommerce_wc_tpapv2_entityId, #woocommerce_wc_tpapv2_accessToken' ).parent().parent().parent().show();
                }
            } );
        });
    </script>
    <!--/js-->
    <?php
    }

    if($sectionId === 'Checkout configuration') {
    ?>
    <!--js-->
    <script type="text/javascript">
        jQuery(function($){
            var alreadyTPApplepayPayforceNoShipping = $( '#woocommerce_wc_tpapv2_forceNoShipping' ).is(':checked');
            if( alreadyTPApplepayPayforceNoShipping ){
                $( document ).find( '#woocommerce_wc_tpapv2_shippingAddressFields' ).removeAttr('disabled');
            }else{
                $( document ).find( '#woocommerce_wc_tpapv2_shippingAddressFields' ).attr('disabled', true);
            }
            $( '#woocommerce_wc_tpapv2_forceNoShipping' ).on( 'change', function( e ){
                var el       = $( this );
                var elVal    = el.is(':checked');
                if( elVal ){
                    $( document ).find( '#woocommerce_wc_tpapv2_shippingAddressFields' ).removeAttr('disabled');
                }else{
                    $( document ).find( '#woocommerce_wc_tpapv2_shippingAddressFields' ).attr('disabled', true);
                }
            } );
        });
    </script>
    <!--/js-->
    <?php
    }
    ?>
</div>
<br class="clear" />
