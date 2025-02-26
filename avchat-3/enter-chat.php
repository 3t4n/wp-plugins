<?php
/*
Copyright (C) 2009-2017, avchat.net

This WordPress Plugin is distributed under the terms of the GNU General Public License.
You can redistribute it and/or modify it under the terms of the GNU General Public License
as published by the Free Software Foundation, either version 3 of the License, or any later version.

You should have received a copy of the GNU General Public License
along with this plugin.  If not, see <http://www.gnu.org/licenses/>.
 */

/*
 *  This page is accessed from the WP backend and embeds the admin (admin.swf) area of AVChat
 */

if (session_id() == "") {session_start();}

/*
 * Check if the Connection string has been set
 */
    // Store any error messages
    $error_messages = array();

    $db_check_settings = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "community_lite_general_settings");
    $db_grab_conn_string = $db_check_settings[0]->connection_string;

    // Check if the user has uploaded the AVChat software files
    if (file_exists(plugin_dir_path(__FILE__) . 'audio_video_quality_profiles') == false)
    {
        $error_messages[] = "You need to upload the AVChat chat client to the <code>wp-content/plugins/avchat-3/</code> folder before the chat will show up on this page.";
    }

    // Pull from DB and do a small check to see if the user has filled Connection string
    if ($db_grab_conn_string === "rtmp://" || empty($db_grab_conn_string))
    {
        $error_messages[] = "You need to fill in the required <code>Connection string</code> in Community Lite > Settings before the chat knows to what media server to connect and thus work.";
    }


    // If the user hasn't filled Connection string, start nagging
    if (empty($error_messages) === false) {
        foreach ($error_messages as $error_message) {
            echo "
            <div class='wrap'>
                <div class='error form-invalid'>
                    <p>
                        {$error_message}
                    </p>
                </div>
            </div>
            ";
        }
    }

/*
 * Main function for outputting the chat in backend
 */
function start_output_in_admin() {
    $embed = '';

    // Make sure that there are no errors stored => display the chat
    if (isset($error_messages) === false) {
        $display_mode = 'embed';

        $user_info = avchat3_get_user_details();
        avchat3_set_user_details_on_session($user_info);
        avchat3_set_community_lite_general_settings_on_session();

        // Is admin, load admin login
        $movie_param = 'admin.swf';

        //Plugins URL without the trailing slash
        $pluginsurl = plugins_url();

        //link to SWF file
        $linktoswf= $pluginsurl.'/avchat-3/' . $movie_param;        

        $embed = <<<HTML
<div id="myContent">
    <div id="av_message">
        <p>You need to have JavaScript enabled and <a target="_blank" href="http://get2.adobe.com/flashplayer/">the latest version of Flash Player</a> for the chat to work.</p>
    </div>
</div>
<script type="text/javascript">
    var flashvars = {
        lstext : "Loading Settings...",
        sscode : "php",
        userId : ""
    };
    var params = {
        quality : "high",
        bgcolor : "#272727",
        allowFullScreen : "true",
        base : "$pluginsurl/avchat-3/"
    };
    var attributes = {
        name : "index_embed",
        id :   "index_embed",
        align : "middle"
    };
    var size = {
        width:"100%",
        height:600
    };
    //swfobject.embedSWF("' . get_bloginfo('url') . '/wp-content/plugins/avchat-3/' . $movie_param . '", "myContent", "100%", "600", "11.4.0", "", flashvars, params, attributes);
    var hasFlash = function(a,b){try{a=new ActiveXObject(a+b+'.'+a+b)}catch(e){a=navigator.plugins[a+' '+b]}return!!a}('Shockwave','Flash')
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    var isFirefox = typeof InstallTrigger !== 'undefined';
    if((isIE && hasFlash == false) || (isFirefox && hasFlash == false)){
        //If we're on IE or Firefox and Flash Player is NOT installed
        //Chrome 56+ and Safari 10  will not advertise Flash player's presence anymore so there's no way to check
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = "div.getFlash{width:100%;height:100%;background-color:#363738;margin:0 auto;} div.getFlash p {text-align:center;vertical-align: middle;line-height:100%;font-family:sans-serif;font-size:14px;color:#ffffff;text-decoration:underline;}";
        document.body.appendChild(css);

        document.getElementById('myContent').innerHTML = '<div class="getFlash"><p><a style = "color:#ffffff !important;" href="' + ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.adobe.com/go/getflashplayer" target="_blank">Flash Player is needed to display this content</a></p></div>';
    }else{
        if (flashvars && typeof flashvars === "object") {
            for (var k in flashvars) {
                if (typeof flashVarsString != "undefined") {
                    flashVarsString += "&" + k + "=" + flashvars[k];
                }
                else {
                    flashVarsString = k + "=" + flashvars[k];
                }
            }
        }
        //console.log(flashVarsString);
        flashVarsString = flashVarsString.replace(/\"/g,'\&quot;');
        //console.log(flashVarsString);
        //Detecting IE less than version 9
        var div = document.createElement("div");
        div.innerHTML = "<!--[if lt IE 9]><i></i><![endif]-->";
        var isIeLessThan9 = (div.getElementsByTagName("i").length == 1);
        if (isIE && isIeLessThan9){
            //IE8 and earlier
            document.getElementById('myContent').innerHTML = '<object type="application/x-shockwave-flash" name="'+attributes["name"]+'" id="'+attributes["id"]+'" align="'+attributes["align"]+'" width="'+size["width"]+'" height="'+size["height"]+'"><param name="quality" value="'+params["quality"]+'"><param name="bgcolor" value="'+params["bgcolor"]+'"><param name="allowscriptaccess" value="'+params["allowscriptaccess"]+'"><param name="base" value="'+params["base"]+'"><param name="allowFullScreen" value="'+params["allowFullScreen"]+'"><param name="flashvars" value="'+flashVarsString+'"><param name="movie" value="$linktoswf"</object> ';
        }else{
            //All other browsers
            document.getElementById('myContent').innerHTML = '<object type="application/x-shockwave-flash" name="'+attributes["name"]+'" id="'+attributes["id"]+'" align="'+attributes["align"]+'" data="$linktoswf" width="'+size["width"]+'" height="'+size["height"]+'"><param name="quality" value="'+params["quality"]+'"> <param name="bgcolor" value="'+params["bgcolor"]+'"><param name="allowscriptaccess" value="'+params["allowscriptaccess"]+'"><param name="base" value="'+params["base"]+'"><param name="allowFullScreen" value="'+params["allowFullScreen"]+'"><param name="flashvars" value="'+flashVarsString+'"></object> ';
        }
    }
</script>
HTML;

        return $embed;

    }// End empty($error_messages)

} // End start_output_in_admin()


?>

<div class="wrap">

    <?php
    /* -- Start -- */

    //If the chat files have been uploaded
    if (file_exists(plugin_dir_path(__FILE__) . 'audio_video_quality_profiles') == true)
    {
        // Parse the chat area
      echo start_output_in_admin();
    }
    /* -- End -- */
    ?>

</div>