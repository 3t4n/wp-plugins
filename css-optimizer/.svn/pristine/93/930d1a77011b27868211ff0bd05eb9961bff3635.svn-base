<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class bpminifycssConfig {
    private $config = null;
    static private $instance = null;

    //Singleton: private construct
    private function __construct() {
        if( is_admin() ) {
            //Add the admin page and settings
            add_action('admin_menu',array($this,'addmenu'));
            add_action('admin_init',array($this,'registersettings'));

            //Set meta info
            if(function_exists('plugin_row_meta')) {
                //2.8+
                add_filter('plugin_row_meta',array($this,'setmeta'),10,2);
            } elseif(function_exists('post_class')) {
                //2.7
                $plugin = plugin_basename(bpminifycss_PLUGIN_DIR.'bpminifycss.php');
                add_filter('plugin_action_links_'.$plugin,array($this,'setmeta'));
            }

            //Clean cache?
            if(get_option('bpminifycss_cache_clean')) {
                bpminifycssCache::clearall();
                update_option('bpminifycss_cache_clean',0);
            }
        }

        //Add the bpminifycss Toolbar to the Admin bar 
        //(we loaded outside the verification of is_admin to also be displayed on the frontend toolbar)
        $toolbar = new bpminifycssToolbar();
    }
    
    static public function instance() {
        //Only one instance
        if (self::$instance == null) {
            self::$instance = new bpminifycssConfig();
        }
        
        return self::$instance;
        }
    
    public function show() {
?>
<style>
/* title and button */
.wp-core-ui .button-primary {
    display: block;
    padding: 15px 25px;
    height: auto;
    width: auto;
    background: #04964c;
    text-shadow: 0 0 0 #fff;
    font-size: 16px;
    border: 0px;
    box-shadow: 0px 0px 0px #333;
    border-bottom: 2px solid rgba(0, 0, 0, 0.45);
    text-shadow: 1px 1px rgba(0, 0, 0, 0.35);
    margin: auto;
}
a#ao_show_adv, #ao_hide_adv {
    display: block;
    padding: 10px 25px;
    height: auto;
    width: auto;
    background: #04964c;
    text-shadow: 0 0 0 #fff;
    font-size: 14px;
    border: 0px;
    box-shadow: 0px 0px 0px #333;
    border-bottom: 2px solid rgba(0, 0, 0, 0.45);
    text-shadow: 1px 1px rgba(0, 0, 0, 0.35);
    margin: auto;
    color: #fff;
    margin: auto;
    display: inline-block;
}
ul {
    list-style: none;
    float: left;
    display: inline-block;
    width: 100%;
}
h2 {
    text-align:center;
    font-size:29px;
    margin-bottom:0;
}
table.form-table {
    display: block;
    max-width: 220px;
    margin: auto;
}

inspector-stylesheet:1
.form-table th {
    text-align: right;
    font-size: 16px;
    line-height: 130%;
}
#ao_title_and_button:after {content:''; display:block; clear:both;}
#ao_adv_button{float:left;}
#ao_hide_adv:before, #ao_show_adv:before {
    display: inline-block;
    float: left;
    height: 20px;
    width: 35px;
    background: none;
    color: #b4b9be;
    font: normal 20px/26px dashicons;
    letter-spacing: -4px;
    text-align: left;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
#ao_hide_adv:before {
    content: "\f108 \f142";
}
#ao_show_adv:before {
    content: "\f108 \f140";
}

/* form */
.itemDetail {
    background: #fff;
    border: 1px solid #ccc;
    padding: 15px;
    margin: 15px 10px 10px 0;
}
.itemTitle {
    margin-top: 0;
}
input[type=url]:invalid {color: red; border-color:red;} .form-table th{font-weight:100;}
#bpminifycss_main .cb_label {display: block; padding-left: 25px; text-indent: -25px;}

/* rss block */
#futtta_feed ul{list-style:outside;}
#futtta_feed {font-size:medium; margin:0px 20px;} 

/* banner + unslider */
.bpminifycss_banner {
    margin: 0 38px;
    padding-bottom: 5px;
}
.bpminifycss_banner ul li {
    font-size:medium;
    text-align:center;
}
.unslider {
    position:relative;
}
.nouserinteraction {
    display:none !important;
}
.unslider-arrow {
    display: block;
    left: unset;
    margin-top: -35px;
    margin-left: 7px;
    margin-right: 7px;
    border-radius: 32px;
    background: rgba(0, 0, 0, 0.10) no-repeat 50% 50%;
    color: rgba(255, 255, 255, 0.8);
    font: normal 20px/1 dashicons;
    speak: none;
    padding: 3px 2px 3px 4px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

#ao_hide_adv:before, #ao_show_adv:before {
    display:none !important;
}
.unslider-arrow:hover {
    background-color: rgba(0, 0, 0, 0.20);
    color: #FFF;
}
.unslider-arrow.prev {
    padding: 3px 4px 3px 2px;
}
.unslider-arrow.next {
    right: 0px;
}
.unslider-arrow.prev::before {
    content: "\f341";
}
.unslider-arrow.next::before {
    content: "\f345";
}
.itemDetail {
    background: #fff;
    border: 1px solid #ccc;
    padding: 15px;
    margin: 15px 10px 10px 0;
    border: 0px;
    box-shadow: 0px 0px 20px rgba(51, 51, 51, 0.36);
}
/* responsive stuff: hide admin-feed on smaller screens */
@media (min-width: 961px) {
    #bpminifycss_main {float:left;width:100%;max-width:1020px;}
    #bpminifycss_admin_feed{float:right;width:30%;display:block !important;}
    }
@media (max-width: 960px) {
    #bpminifycss_main {width:100%;}
    #bpminifycss_admin_feed {width:0%;display:none !important;}
}
@media (max-width: 782px) {
    #ao_hide_adv span, #ao_show_adv span {display: none;}
    #ao_hide_adv,#ao_show_adv {height: 34px;padding: 4px 12px 8px 8px;}
    #ao_hide_adv:before,#ao_show_adv:before {font-size: 25px;}
    #bpminifycss_main input[type="checkbox"] {margin-left: 10px;}
    #bpminifycss_main .cb_label {display: block; padding-left: 45px; text-indent: -45px;}
}
</style>

<div class="wrap">

<?php if (version_compare(PHP_VERSION, '5.3.0') < 0) { ?>
<div class="notice-error notice"><?php _e('<p><strong>You are using a very old version of PHP</strong> (5.2.x or older) which has serious security and performance issues. Please ask your hoster to provide you with an upgrade path to 5.6 or 7.0</p>','bpminifycss'); ?></div>
<?php } ?>

<div id="bpminifycss_main">
<div id="ao_title_and_button">
    <h1 id="ao_title"><?php _e('CSS Minify Settings','bpminifycss'); ?> </h1>
</div>
    <span id="ao_adv_button" class="nouserinteraction">
    <?php 
    if (get_option('bpminifycss_show_adv','0')=='1') {
        ?>
        <a href="javascript:void(0);" id="ao_show_adv" class="button" style="display:none;"><span><?php _e("Show advanced settings","bpminifycss") ?></span></a>
        <a href="javascript:void(0);" id="ao_hide_adv" class="button"><span><?php _e("Hide advanced settings","bpminifycss") ?></span></a>
        <style>tr.ao_adv{display:table-row;} li.ao_adv{display:list-item;}</style>
        <?php
        $hiddenClass="";
    } else {
        ?>
        <a href="javascript:void(0);" id="ao_show_adv" class="button"><span><?php _e("Show advanced settings","bpminifycss") ?></span></a>
        <a href="javascript:void(0);" id="ao_hide_adv" class="button" style="display:none;"><span><?php _e("Hide advanced settings","bpminifycss") ?></span></a>
        <?php
        $hiddenClass="hidden ";
    }
    ?>
    </span>
<?php echo $this->ao_admin_tabs(); ?>

<form method="post" action="options.php">
<?php settings_fields('bpminifycss'); ?>

<ul>

<li class="itemDetail nouserinteraction">
<h2 class="itemTitle"><?php _e('HTML Options','bpminifycss'); ?></h2>
<table class="form-table">
<tr valign="top">
<th scope="row"><?php _e('Optimize HTML Code?','bpminifycss'); ?></th>
<td><input type="checkbox" id="bpminifycss_html" name="bpminifycss_html" <?php echo get_option('bpminifycss_html')?'checked="checked" ':''; ?>/></td>
</tr>
<tr class="<?php echo $hiddenClass;?>html_sub ao_adv" valign="top">
<th scope="row"><?php _e('Keep HTML comments?','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_html_keepcomments" <?php echo get_option('bpminifycss_html_keepcomments')?'checked="checked" ':''; ?>/>
<?php _e('Enable this if you want HTML comments to remain in the page.','bpminifycss'); ?></label></td>
</tr>
</table>
</li>

<li class="itemDetail nouserinteraction">
<h2 class="itemTitle"><?php _e('JavaScript Options','bpminifycss'); ?></h2>
<table class="form-table"> 
<tr valign="top">
<th scope="row"><?php _e('Optimize JavaScript Code?','bpminifycss'); ?></th>
<td><input type="checkbox" id="bpminifycss_js" name="bpminifycss_js" <?php echo get_option('bpminifycss_js')?'checked="checked" ':''; ?>/></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>js_sub ao_adv">
<th scope="row"><?php _e('Force JavaScript in &lt;head&gt;?','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_js_forcehead" <?php echo get_option('bpminifycss_js_forcehead')?'checked="checked" ':''; ?>/>
<?php _e('Load JavaScript early, reducing the chance of JS-errors but making it render blocking. You can disable this if you\'re not aggregating inline JS and you want JS to be deferred.','bpminifycss'); ?></label></td>
</tr>
<?php if (get_option('bpminifycss_js_justhead')) { ?>
<tr valign="top" class="<?php echo $hiddenClass;?>js_sub ao_adv">
<th scope="row"><?php _e('Look for scripts only in &lt;head&gt;?','bpminifycss');  _e(' <i>(deprecated)</i>','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_js_justhead" <?php echo get_option('bpminifycss_js_justhead')?'checked="checked" ':''; ?>/>
<?php _e('Mostly useful in combination with previous option when using jQuery-based templates, but might help keeping cache size under control.','bpminifycss'); ?></label></td>
</tr>
<?php } ?>
<tr valign="top" class="<?php echo $hiddenClass;?>js_sub ao_adv">
<th scope="row"><?php _e('Aggregate inline JS','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_js_include_inline" <?php echo get_option('bpminifycss_js_include_inline')?'checked="checked" ':''; ?>/>
<?php _e('Check this option for bpminifycss to also aggregate JS in the HTML. If this option is not enabled, you might have to "force JavaScript in head".','bpminifycss'); ?></label></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>js_sub ao_adv">
<th scope="row"><?php _e('Exclude Javascript files:','bpminifycss'); ?></th>
<td><label><input type="text" style="width:100%;" name="bpminifycss_js_exclude" value="<?php echo get_option('bpminifycss_js_exclude',"seal.js, js/jquery/jquery.js"); ?>"/><br />
<?php _e('A comma-separated list of scripts you want to exclude from being optimized, for example \'whatever.js, another.js\' (without the quotes) to exclude those scripts from being aggregated and minimized by bpminifycss.','bpminifycss'); ?></label></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>js_sub ao_adv">
<th scope="row"><?php _e('Add try-catch wrapping?','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_js_trycatch" <?php echo get_option('bpminifycss_js_trycatch')?'checked="checked" ':''; ?>/>
<?php _e('If your scripts break because of a JS-error, you might want to try this.','bpminifycss'); ?></label></td>
</tr>
</table>
</li>

<li class="itemDetail">
<h2 class="itemTitle"><?php _e('CSS Minifcation','bpminifycss'); ?></h2>
<table class="form-table"> 
<tr valign="top">
<th scope="row"><?php _e('Optimize and Minify CSS Code?','bpminifycss'); ?></th>
<td><input type="checkbox" id="bpminifycss_css" name="bpminifycss_css" <?php echo get_option('bpminifycss_css')?'checked="checked" ':''; ?>/></td>
</tr>
<tr class="nouserinteraction <?php echo $hiddenClass;?>css_sub ao_adv" valign="top">
<th scope="row"><?php _e('Generate data: URIs for images?','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_css_datauris" <?php echo get_option('bpminifycss_css_datauris')?'checked="checked" ':''; ?>/>
<?php _e('Enable this to include small background-images in the CSS itself instead of as separate downloads.','bpminifycss'); ?></label></td>
</tr>
<tr class="<?php echo $hiddenClass;?>css_sub ao_adv" valign="top">
<th scope="row"><?php _e('Do not load Google Fonts','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_css_nogooglefont" <?php echo get_option('bpminifycss_css_nogooglefont')?'checked="checked" ':''; ?>/>
<?php _e('','bpminifycss'); ?></label></td>
</tr>
<?php if (get_option('bpminifycss_css_justhead')) { ?>
<tr valign="top" class="<?php echo $hiddenClass;?>css_sub ao_adv">
<th scope="row"><?php _e('Look for styles only in &lt;head&gt;?','bpminifycss'); _e(' <i>(deprecated)</i>','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_css_justhead" <?php echo get_option('bpminifycss_css_justhead')?'checked="checked" ':''; ?>/>
<?php _e('Don\'t bpminifycss CSS outside the head-section. If the cache gets big, you might want to enable this.','bpminifycss'); ?></label></td>
</tr>
<?php } ?>
<tr valign="top" class="<?php echo $hiddenClass;?>css_sub ao_adv">
<th scope="row"><?php _e('Aggregate inline CSS?','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_css_include_inline" <?php echo get_option('bpminifycss_css_include_inline','1')?'checked="checked" ':''; ?>/>
<?php _e('Check this option for bpminifycss to also aggregate CSS in the HTML.','bpminifycss'); ?></label></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>css_sub ao_adv">
<th scope="row"><?php _e('Inline and Defer CSS?','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_css_defer" id="bpminifycss_css_defer" <?php echo get_option('bpminifycss_css_defer')?'checked="checked" ':''; ?>/>
<?php _e('Inline "above the fold CSS" while loading the main CSS','bpminifycss'); ?></label></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>css_sub ao_adv" id="bpminifycss_css_defer_inline">
<th scope="row"></th>
<td><label><textarea rows="10" cols="10" style="width:100%;" placeholder="<?php _e('Paste the above the fold CSS here.','bpminifycss'); ?>" name="bpminifycss_css_defer_inline"><?php echo get_option('bpminifycss_css_defer_inline'); ?></textarea></label></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>ao_adv css_sub">
<th scope="row"><?php _e('Inline all CSS?','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" id="bpminifycss_css_inline" name="bpminifycss_css_inline" <?php echo get_option('bpminifycss_css_inline')?'checked="checked" ':''; ?>/>
<?php _e('','bpminifycss'); ?></label></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>ao_adv css_sub">
<th scope="row"><?php _e('Remove CSS Files:','bpminifycss'); ?></th>
<td><label><input type="text" style="width:100%;" name="bpminifycss_css_exclude" value="<?php echo get_option('bpminifycss_css_exclude','admin-bar.min.css, dashicons.min.css'); ?>"/><br />
<?php _e('Seperate with commas.','bpminifycss'); ?></label></td>
</tr>
</table>
</li>

<li class="itemDetail nouserinteraction">
<h2 class="itemTitle"><?php _e('CDN Options','bpminifycss'); ?></h2>
<table class="form-table"> 
<tr valign="top">
<th scope="row"><?php _e('CDN Base URL','bpminifycss'); ?></th>
<td><label><input id="cdn_url" type="text" name="bpminifycss_cdn_url" pattern="^(https?:)?\/\/([\da-z\.-]+)\.([\da-z\.]{2,6})([\/\w \.-]*)*(:\d{2,5})?\/?$" style="width:100%" value="<?php echo esc_url(get_option('bpminifycss_cdn_url',''),array("http","https")); ?>" /><br />
<?php _e('Enter your CDN root URL to enable CDN for bpminifycssd files. The URL can be http, https or protocol-relative (e.g. <code>//cdn.example.com/</code>).','bpminifycss'); ?></label></td>
</tr>
</table>
</li>

<li class="<?php echo $hiddenClass;?>itemDetail ao_adv nouserinteraction">
<h2 class="itemTitle"><?php _e('Cache Info','bpminifycss'); ?></h2>
<table class="form-table" > 
<tr valign="top" class="<?php echo $hiddenClass;?>ao_adv">
<th scope="row"><?php _e('Cache folder','bpminifycss'); ?></th>
<td><?php echo htmlentities(bpminifycss_CACHE_DIR); ?></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>ao_adv">
<th scope="row"><?php _e('Can we write?','bpminifycss'); ?></th>
<td><?php echo (bpminifycssCache::cacheavail() ? __('Yes','bpminifycss') : __('No','bpminifycss')); ?></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>ao_adv">
<th scope="row"><?php _e('Cached styles and scripts','bpminifycss'); ?></th>
<td><?php
    $AOstatArr=bpminifycssCache::stats(); 
    $AOcacheSize=round($AOstatArr[1]/1024);
    echo $AOstatArr[0].__(' files, totalling ','bpminifycss').$AOcacheSize.__(' Kbytes (calculated at ','bpminifycss').date("H:i e", $AOstatArr[2]).')';
?></td>
</tr>
<tr valign="top" class="<?php echo $hiddenClass;?>ao_adv">
<th scope="row"><?php _e('Save aggregated script/css as static files?','bpminifycss'); ?></th>
<td><label class="cb_label"><input type="checkbox" name="bpminifycss_cache_nogzip" <?php echo get_option('bpminifycss_cache_nogzip','1')?'checked="checked" ':''; ?>/>
<?php _e('By default files saved are static css/js, uncheck this option if your webserver doesn\'t properly handle the compression and expiry.','bpminifycss'); ?></label></td>
</tr>
</table>
</li>

</ul>

<input type="hidden" id="bpminifycss_show_adv" name="bpminifycss_show_adv" value="<?php echo get_option('bpminifycss_show_adv','0'); ?>">

<p class="submit">
<input type="submit" class="button-primary" name="bpminifycss_cache_clean" value="<?php _e('Save Changes and Empty Cache','bpminifycss') ?>" />
</p>

</form>
<p style="text-align:center;">
    <a href="http://rebrand.ly/cssminifylink" target="_blank">
<img src="https://i.imgur.com/CGwzXnF.png" style="max-width: 100%;">
</a>
</p>

</div>
<div id="bpminifycss_admin_feed" class="hidden">
<!-- Sidebar-->
</div>

<script type="text/javascript">
    var feed = new Array;
    feed[1]="bpminifycssfeed";
    feed[2]="wordpressfeed";
    feed[3]="webtechfeed";
    cookiename="bpminifycss_feed";

    jQuery(document).ready(function() {
        check_ini_state();
        jQuery('#bpminifycss_admin_feed').fadeTo("slow",1).show();        
        jQuery('.bpminifycss_banner').unslider({autoplay:true, delay:3500, infinite: false, arrows:{prev:'<a class="unslider-arrow prev"></a>', next:'<a class="unslider-arrow next"></a>'}}).fadeTo("slow",1).show();

        jQuery( "#feed_dropdown" ).change(function() {
            jQuery("#futtta_feed").fadeTo(0,0);
            jQuery("#futtta_feed").fadeTo("slow",1);
        });

        jQuery( "#ao_show_adv" ).click(function() {
            jQuery( "#ao_show_adv" ).hide();
            jQuery( "#ao_hide_adv" ).show();
            jQuery( ".ao_adv" ).removeClass("hidden");
            jQuery( ".ao_adv" ).show("slow");
            if (jQuery("#bpminifycss_css").attr('checked')) {
                jQuery(".css_sub:visible").fadeTo("fast",1);
                if (!jQuery("#bpminifycss_css_defer").attr('checked')) {
                    jQuery("#bpminifycss_css_defer_inline").hide();
                }
            }
            if (jQuery("#bpminifycss_js").attr('checked')) {
                jQuery(".js_sub:visible").fadeTo("fast",1);
            }
            check_ini_state()
            jQuery( "input#bpminifycss_show_adv" ).val("1");
        });

        jQuery( "#ao_hide_adv" ).click(function() {
            jQuery( "#ao_hide_adv" ).hide();
            jQuery( "#ao_show_adv" ).show();
            jQuery( ".ao_adv" ).hide("slow");
            jQuery( ".ao_adv" ).addClass("hidden");
            if (!jQuery("#bpminifycss_css").attr('checked')) {
                jQuery(".css_sub:visible").fadeTo("fast",.33);
            }
            if (!jQuery("#bpminifycss_js").attr('checked')) {
                jQuery(".js_sub:visible").fadeTo("fast",.33);
            }
            check_ini_state()
            jQuery( "input#bpminifycss_show_adv" ).val("0");
        });

        jQuery( "#bpminifycss_html" ).change(function() {
            if (this.checked) {
                jQuery(".html_sub:visible").fadeTo("fast",1);
            } else {
                jQuery(".html_sub:visible").fadeTo("fast",.33);
            }
        });

        jQuery( "#bpminifycss_js" ).change(function() {
            if (this.checked) {
                jQuery(".js_sub:visible").fadeTo("fast",1);
            } else {
                jQuery(".js_sub:visible").fadeTo("fast",.33);
            }
        });

        jQuery( "#bpminifycss_css" ).change(function() {
            if (this.checked) {
                jQuery(".css_sub:visible").fadeTo("fast",1);
            } else {
                jQuery(".css_sub:visible").fadeTo("fast",.33);
            }
        });

        jQuery( "#bpminifycss_css_inline" ).change(function() {
            if (this.checked) {
                jQuery("#bpminifycss_css_defer").prop("checked",false);
                jQuery("#bpminifycss_css_defer_inline").hide("slow");
            }
        });

        jQuery( "#bpminifycss_css_defer" ).change(function() {
            if (this.checked) {
                jQuery("#bpminifycss_css_inline").prop("checked",false);
                jQuery("#bpminifycss_css_defer_inline").show("slow");
            } else {
                jQuery("#bpminifycss_css_defer_inline").hide("slow");
            }
        });

        jQuery("#feed_dropdown").change(function() { show_feed(jQuery("#feed_dropdown").val()) });
        feedid=jQuery.cookie(cookiename);
        if(typeof(feedid) !== "string") feedid=1;
        show_feed(feedid);
    })

    // validate cdn_url
    var cdn_url=document.getElementById("cdn_url");
    cdn_url_baseCSS=cdn_url.style.cssText;
    if ("validity" in cdn_url) {
        jQuery("#cdn_url").focusout(function (event) {
        if (cdn_url.validity.valid) {
            cdn_url.style.cssText=cdn_url_baseCSS;
        } else {
            cdn_url.style.cssText=cdn_url_baseCSS+"border:1px solid #f00;color:#f00;box-shadow: 0 0 2px #f00;";
        }});
    }

    function check_ini_state() {
        if (!jQuery("#bpminifycss_css_defer").attr('checked')) {
            jQuery("#bpminifycss_css_defer_inline").hide();
        }
        if (!jQuery("#bpminifycss_html").attr('checked')) {
            jQuery(".html_sub:visible").fadeTo('fast',.33);
        }
        if (!jQuery("#bpminifycss_css").attr('checked')) {
            jQuery(".css_sub:visible").fadeTo('fast',.33);
        }
        if (!jQuery("#bpminifycss_js").attr('checked')) {
            jQuery(".js_sub:visible").fadeTo('fast',.33);
        }
    }

    function show_feed(id) {
        jQuery('#futtta_feed').children().hide();
        jQuery('#'+feed[id]).show();
        jQuery("#feed_dropdown").val(id);
        jQuery.cookie(cookiename,id,{ expires: 365 });
    }
</script>
</div>

<?php
    }

    public function addmenu() {
        $hook=add_options_page(__('CSS Minify Options','bpminifycss'),'CSS Minify','manage_options','CSS Minify',array($this,'show'));
        add_action( 'admin_print_scripts-'.$hook,array($this,'bpminifycss_admin_scripts'));
        add_action( 'admin_print_styles-'.$hook,array($this,'bpminifycss_admin_styles'));
    }

    public function bpminifycss_admin_scripts() {
        wp_enqueue_script('jqcookie', plugins_url('/external/js/jquery.cookie.min.js', __FILE__), array('jquery'),null,true);
        wp_enqueue_script('unslider', plugins_url('/external/js/unslider-min.js', __FILE__), array('jquery'),null,true);
    }

    public function bpminifycss_admin_styles() {
        wp_enqueue_style('unslider', plugins_url('/external/js/unslider.css', __FILE__));
        wp_enqueue_style('unslider-dots', plugins_url('/external/js/unslider-dots.css', __FILE__));
    }

    public function registersettings() {
        register_setting('bpminifycss','bpminifycss_html');
        register_setting('bpminifycss','bpminifycss_html_keepcomments');
        register_setting('bpminifycss','bpminifycss_js');
        register_setting('bpminifycss','bpminifycss_js_exclude');
        register_setting('bpminifycss','bpminifycss_js_trycatch');
        register_setting('bpminifycss','bpminifycss_js_justhead');
        register_setting('bpminifycss','bpminifycss_js_forcehead');
        register_setting('bpminifycss','bpminifycss_js_include_inline');
        register_setting('bpminifycss','bpminifycss_css');
        register_setting('bpminifycss','bpminifycss_css_exclude');
        register_setting('bpminifycss','bpminifycss_css_justhead');
        register_setting('bpminifycss','bpminifycss_css_datauris');
        register_setting('bpminifycss','bpminifycss_css_defer');
        register_setting('bpminifycss','bpminifycss_css_defer_inline');
        register_setting('bpminifycss','bpminifycss_css_inline');
        register_setting('bpminifycss','bpminifycss_css_include_inline');
        register_setting('bpminifycss','bpminifycss_css_nogooglefont');
        register_setting('bpminifycss','bpminifycss_cdn_url');
        register_setting('bpminifycss','bpminifycss_cache_clean');
        register_setting('bpminifycss','bpminifycss_cache_nogzip');
        register_setting('bpminifycss','bpminifycss_show_adv');
    }

    public function setmeta($links,$file=null) {
        //Inspired on http://wpengineer.com/meta-links-for-wordpress-plugins/
        //Do it only once - saves time
        static $plugin;
        if(empty($plugin))
            $plugin = plugin_basename(bpminifycss_PLUGIN_DIR.'bpminifycss.php');
        
        if($file===null) {
            //2.7
            $settings_link = sprintf('<a href="options-general.php?page=CSS+Minify">%s</a>', __('Settings'));
            array_unshift($links,$settings_link);
        } else {
            //2.8
            //If it's us, add the link
            if($file === $plugin) {
                $newlink = array(sprintf('<a href="options-general.php?page=CSS+Minify">%s</a>',__('Settings')));
                $links = array_merge($links,$newlink);
            }
        }

        return $links;
    }

    public function get($key) {        
        if(!is_array($this->config)) {
            //Default config
            $config = array('bpminifycss_html' => 0,
                'bpminifycss_html_keepcomments' => 0,
                'bpminifycss_js' => 0,
                'bpminifycss_js_exclude' => "seal.js, js/jquery/jquery.js",
                'bpminifycss_js_trycatch' => 0,
                'bpminifycss_js_justhead' => 0,
                'bpminifycss_js_include_inline' => 0,
                'bpminifycss_js_forcehead' => 0,
                'bpminifycss_css' => 0,
                'bpminifycss_css_exclude' => "admin-bar.min.css, dashicons.min.css",
                'bpminifycss_css_justhead' => 0,
                'bpminifycss_css_include_inline' => 1,
                'bpminifycss_css_defer' => 0,
                'bpminifycss_css_defer_inline' => "",
                'bpminifycss_css_inline' => 0,
                'bpminifycss_css_datauris' => 0,
                'bpminifycss_css_nogooglefont' => 0,
                'bpminifycss_cdn_url' => "",
                'bpminifycss_cache_nogzip' => 1,
                'bpminifycss_show_adv' => 0
                );

            //Override with user settings
            foreach(array_keys($config) as $name) {
                $conf = get_option($name);
                if($conf!==false) {
                    //It was set before!
                    $config[$name] = $conf;
                }
            }

            //Save for next question
            $this->config = $config;
        }

        if(isset($this->config[$key]))
            return $this->config[$key];

        return false;
    }

    private function getFutttaFeeds($url) {
        if (apply_filters('bpminifycss_settingsscreen_remotehttp',true)) {
            $rss = fetch_feed( $url );
            $maxitems = 0;

            if ( ! is_wp_error( $rss ) ) {
                $maxitems = $rss->get_item_quantity( 7 ); 
                $rss_items = $rss->get_items( 0, $maxitems );
            }
            ?>
            <ul>
                <?php if ( $maxitems == 0 ) : ?>
                    <li><?php _e( 'No items', 'bpminifycss' ); ?></li>
                <?php else : ?>
                    <?php foreach ( $rss_items as $item ) : ?>
                        <li>
                            <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                                title="<?php printf( __( 'Posted %s', 'bpminifycss' ), $item->get_date('j F Y | g:i a') ); ?>">
                                <?php echo esc_html( $item->get_title() ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <?php
        }
    }

    // based on http://wordpress.stackexchange.com/a/58826
    static function ao_admin_tabs(){
        $tabs = apply_filters('bpminifycss_filter_settingsscreen_tabs',array('bpminifycss' => __('Main','bpminifycss')));
        $tabContent="";
        if (count($tabs)>1) {
            if(isset($_GET['page'])){
                $currentId = $_GET['page'];
            } else {
                $currentId = "bpminifycss";
            }
            $tabContent .= "<h2 class=\"nav-tab-wrapper nouserinteraction\">";
            foreach($tabs as $tabId => $tabName){
                if($currentId == $tabId){
                    $class = " nav-tab-active nouserinteraction";
                } else{
                    $class = "";
                }
                $tabContent .= '<a class="nouserinteraction nav-tab'.$class.'" href="?page='.$tabId.'">'.$tabName.'</a>';
            }
            $tabContent .= "</h2>";
        } else {
            $tabContent = "<hr/>";
        }

        return $tabContent;
    }
}
