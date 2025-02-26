<?php
/*
/*
Plugin Name:  Anxious Client Shield
Plugin URI:   https://developer.wordpress.org/plugins/anxious-client-shield/
Description:  Show random messages to your clients.
Version:      1.0
Author:       Delrey Agency
Author URI:   http://delreyagency.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action( 'admin_menu', 'acs_setup_menu' );

function acs_setup_menu() {
  acs_register_settings();    
  add_menu_page( 'Anxious Client Shield', 'ACS', 'manage_options', 'acs', 'acs_init' );    
}

function acs_register_settings() {
    register_setting( 'acs-settings-group', 'acs-text1' );
    register_setting( 'acs-settings-group', 'acs-text2' );
    register_setting( 'acs-settings-group', 'acs-text3' );
    register_setting( 'acs-settings-group', 'acs-text4' );
    register_setting( 'acs-settings-group', 'acs-text5' );
    register_setting( 'acs-settings-group', 'acs-text6' );
    register_setting( 'acs-settings-group', 'acs-text7' );
    register_setting( 'acs-settings-group', 'acs-text8' );
    register_setting( 'acs-settings-group', 'acs-text9' );
    register_setting( 'acs-settings-group', 'acs-text10' );
    register_setting( 'acs-settings-group', 'acs-active' );
    register_setting( 'acs-settings-group', 'acs-admin-level' );
    register_setting( 'acs-settings-group', 'acs-custom-lang' );
    register_setting( 'acs-settings-group', 'acs-language' );
}

function acs_init() {
?>
<style>
.acsnote {
  border: solid 2px #bdbdbd;
  border-style: dotted;
  padding: 30px;
  border-radius: 17px;
  width: 50%;
}
</style>
<div class="wrap">
   <h1>Anxious Client Shield Settings</h1>
   <form method="post" action="options.php">
    <?php settings_fields( 'acs-settings-group' ); ?>
    <?php do_settings_sections( 'acs-settings-group' ); ?>      
      <h2><span id="general-settings">General Settings</span></h2>
      <table class="form-table">
         <tbody>
            <tr>
               <td colspan="2" style="padding: 0">
                  <div class="acsnote">
                    - Check the messages before you show to your client.<br><br>
                    -You can show your custom messages selecting "Custom Language" or updating the file "acs-language.php" inside the folder of the plugin.<br><br>
                    - FX option will show images on the website.
                  </div>
               </td>
            </tr>          
            <tr>
               <th scope="row">Plugin is active?</th>
               <td>
                  <fieldset>
                     <label for="acs-active">
                     <input name="acs-active" type="checkbox" id="acs-active" value="1" <?php checked( '1', get_option( 'acs-active' ) ); ?>></label>
                  </fieldset>
               </td>
            </tr>
            <tr>
               <th scope="row">Only visible for admin level</th>
               <td>
                  <fieldset>
                     <label for="acs-admin-level">
                     <input name="acs-admin-level" type="checkbox" id="acs-admin-level" value="1" <?php checked( '1', get_option( 'acs-admin-level' ) ); ?> ></label>
                  </fieldset>
               </td>
            </tr>
            <tr>                
               <th scope="row">Language</th>
               <td>
                  <select name="acs-language">
                     <option value="1" <?php selected( '1', get_option( 'acs-language' ) ); ?>>English formal</option>
                     <option value="3" <?php selected( '3', get_option( 'acs-language' ) ); ?>>Spanish formal</option>
                     <option value="2" <?php selected( '2', get_option( 'acs-language' ) ); ?>>English informal (use only on your local testing server)</option>
                     <option value="4" <?php selected( '4', get_option( 'acs-language' ) ); ?>>Spanish informal  (use only on your local testing server)</option>
                     <option value="5" <?php selected( '5', get_option( 'acs-language' ) ); ?>>** FX ** (use only on your local testing server)</option>
                  </select>
               </td>
            </tr>
            <tr>
               <th scope="row">Custom Language</th>
               <td>
                  <fieldset>
                     <label for="acs-custom-lang">
                     <input name="acs-custom-lang" type="checkbox" id="acs-custom-lang" value="1" <?php checked( '1', get_option( 'acs-custom-lang' ) ); ?> ></label>
                  </fieldset>                  
               </td>
            </tr>          
            <tr><td colspan="2" style="padding:0">
              <?php 
                  $style = ( get_option( 'acs-custom-lang' ) == 1 ? "display: block;" : "display: none;");
                  ?>
                  <table class="form-table" id="custom-language" style="<?php echo $style;?>">
                     <tbody>
                        <tr><td colspan="2" style="padding:0">
                          <h2><span id="ac-language">Language Settings</span></h2>
                          <span id="ac-language">When a field is empty ACS will show default text according selected language</span>
                        </td></tr>
                        <tr>
                           <th scope="row"><label for="text1">Text #1</label></th>
                           <td>
                              <input name="acs-text1" type="text" id="text1" aria-describedby="text1" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text1' ) ); ?>">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><label for="text2">Text #2</label></th>
                           <td>
                              <input name="acs-text2" type="text" id="text2" aria-describedby="text2" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text2' ) ); ?>">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><label for="text3">Text #3</label></th>
                           <td>
                              <input name="acs-text3" type="text" id="text3" aria-describedby="text3" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text3' ) ); ?>">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><label for="text4">Text #4</label></th>
                           <td>
                              <input name="acs-text4" type="text" id="text4" aria-describedby="text4" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text4' ) ); ?>">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><label for="text5">Text #5</label></th>
                           <td>
                              <input name="acs-text5" type="text" id="text5" aria-describedby="text5" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text5' ) ); ?>">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><label for="text6">Text #6</label></th>
                           <td>
                              <input name="acs-text6" type="text" id="text6" aria-describedby="text6" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text6' ) ); ?>">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><label for="text7">Text #7</label></th>
                           <td>
                              <input name="acs-text7" type="text" id="text7" aria-describedby="text7" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text7' ) ); ?>">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><label for="text8">Text #8</label></th>
                           <td>
                              <input name="acs-text8" type="text" id="text8" aria-describedby="text8" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text8' ) ); ?>">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><label for="text9">Text #9</label></th>
                           <td>
                              <input name="acs-text9" type="text" id="text9" aria-describedby="text9" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text9' ) ); ?>">
                           </td>
                        </tr>
                        <tr>
                           <th scope="row"><label for="text10">Text #10</label></th>
                           <td>
                              <input name="acs-text10" type="text" id="text10" aria-describedby="text10" class="regular-text" value="<?php echo esc_attr( get_option( 'acs-text10' ) ); ?>">
                           </td>
                        </tr>                      
                     </tbody>
                  </table>              
            </td></tr>
         </tbody>
      </table>
      <?php submit_button(); ?>
   </form>
</div>
<script>
jQuery(document).ready(function($) {
  jQuery("#acs-custom-lang").click(function() {
      if(jQuery(this).is(":checked")) {
          jQuery("#custom-language").show(300);
      } else {
          jQuery("#custom-language").hide(200);
      }
  });
});
</script>
<?php
}

function acs_randomcolor() {
   $rand = array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f' );
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    return $color;
}

function acs_phrase( $lang, $custom ) {  

  $lang = intval($lang);
  $custom = intval($custom);  
  $rand = rand(1,10);

    include('acs-language.php');
    $acs_text_current = 'acs-text'.$rand;
    $text = get_option( $acs_text_current );  

  if( $custom ) {
    if( $text <> '' ) {
      $phrase = $text;
    } else {
      $phrase = $ac_text[ $lang ][ $rand ];
    }
  } else {
      $phrase = $ac_text[ $lang ][ $rand ];
  }
  return $phrase;
}

function acs_show() {
  $ac_active = get_option( 'acs-active' );
  $ac_only_admin = get_option( 'acs-admin-level' );
  $ac_language = get_option( 'acs-language' );
  $ac_language_cust = get_option( 'acs-custom-lang' );
  $user_is_admin = current_user_can( 'administrator' );

  if( ( $ac_active and ( $ac_only_admin and $user_is_admin ) ) or ( $ac_active and !$ac_only_admin ) ) {

    if( get_option( 'acs-language' ) == 5 ) {
      $rand = rand(1,3);
      if( $rand == 1 ) {
        include( 'acs-fx3.php' );
      } elseif( $rand==2 ) {
        include( 'acs-fx2.php' );
      } elseif( $rand==3 ) {
        include( 'acs-fx1.php' );
      }
    }    

    ?>
    <style>
    #acsdiv {
    height: 87px;
    text-align: center;
    color: #fff;
    background-color: <?php echo acs_randomcolor();?>;
    font-size: 34px;
    display: block;
    width: 100%;
    position: fixed;
    <?php 
    if( $user_is_admin ) {
    echo "top: 32px;";
    } else {
    echo "top: 0px;";            
    }
    ?>
    }
    body {
    margin-top: 87px;
    }
    .acsline{
    position: relative;
    top: 50%;  
    width: 24em;
    margin: 0 auto;
    border-right: 2px solid rgba(255,255,255,.75);
    font-size: 27px;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    transform: translateY(-50%);
    color: #ffffff !important;
    text-align: center;
    padding-top: 5px;
    padding-bottom: 5px;
    }
    .acsanim{
    animation: typewriter 4s steps(44) 1s 1 normal both,
    blinkTextCursor 500ms steps(44) infinite normal;
    }
    @keyframes typewriter{
    from{width: 0;}
    to{width: 24em;}
    }
    @keyframes blinkTextCursor{
    from{border-right-color: rgba(255,255,255,.75);}
    to{border-right-color: transparent;}
    }
    </style>
    <div id="acsdiv">
    <p class="acsline acsanim" style="margin: auto;"><?php echo acs_phrase( $ac_language, $ac_language_cust )?></p>
    </div>
<?php
  }
}

add_action( 'wp_footer', 'acs_show' );
?>