<?php
require_once("template/help-template.php");
require_once("template/pro-template.php");
function voad_settings_page() {
global $vdb_options;
	ob_start(); ?>
	<div class="wrap">
		<h2 class="voad-title"><?php _e('Videos on Admin Dashboard Options', 'videos-on-admin-dashboard');  ?></h2>
           <div class="nahiro-plugins-options">
                <div class="nahiro-plugins-options-wrap">
                    <div class="nahiro-plugins-options-actions">
                        <div class="nahiro-plugins-nav-tab-wrapper nahiro-plugins-nav-tab-wrapper-active tablinks">
                            <a href="#" onclick="openTab(event, 'tab_videos')" id="defaultOpen" class="voad_settingsTabs">
                                <i class="dashicons dashicons-format-video" ></i> <?php _e('Videos', 'videos-on-admin-dashboard');  ?>
                            </a>
                        </div>
                        
                    </div>
                </div>
                <div class="nahiro-plugins-options-wrap">
                    <div class="nahiro-plugins-options-actions">
                        <div class="nahiro-plugins-nav-tab-wrapper nahiro-plugins-nav-tab-wrapper tablinks">
                            <a href="#" onclick="openTab(event, 'tab_settings')" class="voad_settingsTabs">
                                <i class="dashicons dashicons-admin-tools"></i> <?php _e('Settings', 'videos-on-admin-dashboard');  ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="nahiro-plugins-options-wrap">
                    <div class="nahiro-plugins-options-actions">
                        <div class="nahiro-plugins-nav-tab-wrapper nahiro-plugins-nav-tab-wrapper tablinks">
                            <a href="#" onclick="openTab(event, 'tab_info')" class="voad_settingsTabs">
                                <i class="dashicons dashicons-admin-home"></i> <?php _e('About Nahiro.net', 'videos-on-admin-dashboard');  ?></a>
                        </div>
                    </div>
                </div>
                <div class="nahiro-plugins-options-wrap">
                    <div class="nahiro-plugins-options-actions">
                        <div class="nahiro-plugins-nav-tab-wrapper nahiro-plugins-nav-tab-wrapper tablinks">
                            <a href="#" onclick="openTab(event, 'tab_pro')" class="voad_settingsTabs">
                                <i class="dashicons dashicons-unlock"></i> <?php _e('Go Premium', 'videos-on-admin-dashboard');  ?></a>
                        </div>
                    </div>
                </div>
                    
            </div>
		<form method="post" action="options.php" style="margin-top: 10px" >
			<div id="tab_settings" class="voad-tabcontent">
			<input type="submit" class="button-primary voad-update-category" style="display: none;" id="update_category_form" name="update_category_form"value="<?php _e('Save Categories', 'videos-on-admin-dashboard'); ?>" />
			<?php settings_fields('voad_settings_group'); ?>
             <input id="categories" name="vdb_settings[categories]" type="hidden" value="<?php $vdb_options['categories'] ?>" />
             <div class="voad-style-div">
            <p><?php //Minimum Role Dropdown ?>
				<label class="voad-label" for="vdb_settings[minimum_role]"><?php _e('What is the minimum user role you wish to be able to see the videos in the dashboard?', 'videos-on-admin-dashboard'); ?></label>
                <select id="vdb_settings[minimum_role]" name="vdb_settings[minimum_role]" class="voad-select"> value="<?php $vdb_options['minimum_role'] ?>">
				<option value="subscriber" <?php if ( 'subscriber' == $vdb_options['minimum_role'] )
  						echo 'selected="selected"'; ?>><?php _e('Subscriber', 'videos-on-admin-dashboard');  ?></option>
                <option value="contributor" <?php if ( 'contributor' == $vdb_options['minimum_role'] )
  						echo 'selected="selected"'; ?>><?php _e('Contributor', 'videos-on-admin-dashboard');  ?></option>
                <option value="author" <?php if ( 'author' == $vdb_options['minimum_role'] )
  						echo 'selected="selected"'; ?>><?php _e('Author', 'videos-on-admin-dashboard');  ?></option>
                <option value="editor" <?php if ( 'editor' == $vdb_options['minimum_role'] )
  						echo 'selected="selected"'; ?>><?php _e('Editor', 'videos-on-admin-dashboard');  ?></option>
                <option value="administrator" <?php if ( 'administrator' == $vdb_options['minimum_role'] )
  						echo 'selected="selected"'; ?>><?php _e('Administrator', 'videos-on-admin-dashboard');  ?></option>
                </select>
			</p>

                <p>
                    <input style="display: none" type="number" id="vdb_settings[youtube_number]" name="vdb_settings[youtube_number]" min="0" class="voad-number" value="<?php echo esc_attr( $vdb_options['youtube_number']) ?>">
                </p>
			<p class="submit" style="margin-top: 0px;padding: 0px 0px 10px 0px;">
				<input type="submit" class="button-primary" value="<?php _e('Save Settings', 'videos-on-admin-dashboard'); ?>" />
			</p>
            </div>
        </div>
		<div id="tab_videos" class="voad-tabcontent">
			  <div class="container" style="padding: 0px;margin-bottom: 12px;" >
                     <div  style="float: none;padding: 0px;">
                            <div class="form-group voad-style-categories">
                                <h3 style="font-weight: 700;"><?php _e('Enter the video URL for each video of Youtube, Vimeo or Google Drive Video:', 'videos-on-admin-dashboard');  ?></h3>
                                <span><?php _e('This is a free plugin, your are allowed to create just one widget and a maximun of three videos, if you want to have unlimited videos and create unlimited widgets on the dashboard please get the premium version.', 'videos-on-admin-dashboard'); ?></span><br>
                                <div style="width: 50%; display: none !important">
                                <input type="text" class="voad-form-control" name="vdb_settings[categories]" value="<?php esc_attr( $vdb_options['categories'] )?>"  onkeydown="voad_notCommas( event )" id="voad_newCategory" maxlength="80"/>
                                <input type="hidden" class="voad-form-control" name="vdb_settings[categories]" id="voad_categories" value="<?php echo esc_attr( $vdb_options['categories'] )?>" />
                                </div>
                                <br>
                            </div>
                        </div>
            </div>
            <div id ="container_video_category" class="voad-style-div" >
            	<h3 class="categoriesList"><?php _e('Categories List', 'videos-on-admin-dashboard'); ?></h3>
                    <?php 

                        $str_arr = explode (",", esc_attr($vdb_options['categories'])); 
                        $categories_lenght = sizeof($str_arr);
                        if (strlen ( $vdb_options['categories'])>0) {
                    
                        for($i=0; $i < 1; $i++){ 
                            ?>
                            <input style="display: none" type="number" id="vdb_settings[youtube_number]" name="vdb_settings[youtube_number]" min="0" class="voad-number" value="3"> 
                            <div class="voad_div_tab">
                                <div id="voad_tab<?php echo $i?>" class="vdb_categoryTabName"  style="background-color:<?php _e($vdb_options['color'.$i.'']); ?> "><span class='vdb_category_name'><?php echo $str_arr[$i]?></span><div class='voad_renameCategory'><input class='voad_newCategoryName' type='text' onkeydown="voad_notCommas( event )"  maxlength="80" value='<?php echo $str_arr[$i]?>'/> <button type='button' onclick='voad_aceptCategoryName(this.id)' id='voad_changeCategoryOkButton<?php echo $i?>' class='voad_saveNewCategoryName'></button> <button type='button' onclick='voad_cancelCategoryName(this.id)' id='voad_changeCategoyCancelButton<?php echo $i?>' class='cancelNewCategoryName'></button></div></div>
                                <input type="color" id="voad_color<?php echo $i?>" name="vdb_settings[color<?php _e($i); ?>]" onclick="voad_changeColor(this.id)" class="voad_colorPicker" value="<?php echo esc_attr( $vdb_options['color' . $i.''])?>"/>
                                <button id="voad_editCategoryButton<?php echo $i?>" type="button" class="voad_editCategoryButton" onclick="voad_changeCategoryName(this.id)"></button>
                            <div class="voad_videoBox" id="voad_idVideoBox<?php echo $i?>" style="display: inline-table;"> 

                        <?php
                            
                            for ($j = 1; $j <= 3; $j++){ 
                                    ?>
                                    <div class="vdb_videoRows" id = "vdb_row_id<?php _e($j);?>">
                                        <label class="voad-label" for="vdb_settings[youtube_id<?php _e($j);?>]"> <?php _e('URL', 'videos-on-admin-dashboard');  ?></label>
                                        <input id="vdb_settings[youtube_id<?php _e($j); ?>]" class="voad_videoInput" name="vdb_settings[youtube_id<?php _e($j); ?>]" type="text" class="voad_titleInput" value="<?php  echo esc_attr( $vdb_options['youtube_id' . $j ]);  ?>"/>

                                        <label class="voad-label" for="vdb_settings[title<?php _e($j);?>]"  > <?php _e('Title', 'videos-on-admin-dashboard');  ?></label>
                                        <input id="vdb_settings[title<?php _e($j); ?>]" class="voad_titleInput" name="vdb_settings[title<?php _e($j); ?>]" type="text" class="voad_titleInput" value="<?php  echo esc_attr( $vdb_options['title' . $j ]); ?>"/>

                                        <label class="voad-label" for="vdb_settings[note<?php _e($j);?>]"  ><?php _e('Note', 'videos-on-admin-dashboard');  ?></label>
                                        <input id="vdb_settings[note<?php _e($j); ?>]" class="voad_noteInput" name="vdb_settings[note<?php _e($j); ?>]" type="text" class="voad_noteInput" maxlength="500" value="<?php echo esc_attr( $vdb_options['note' . $j.'' ]); ?>"/>

                                        <input id="vdb_settings[category_video<?php _e($j); ?>]" class="voad_categoryInput" style="display: none;" name="vdb_settings[category_video<?php _e($j); ?>]" type="text" class="voad_hiddenInput" value="<?php  echo esc_attr( $vdb_options['category_video' . $j ]) ?>"/>

                                        <input type="color" id="voad_colorVideo<?php echo $j?>" class="voad_colorVideo" name="vdb_settings[colorVideo<?php _e($j); ?>]"   value="<?php echo esc_attr( $vdb_options['color' . $i ])?>"/>

                                    </div>

                        <?php  } ?>

                            </div>
                            </div>

                    <?php  }
                    }else{
                        for($i=0; $i < 1; $i++){ 
                            ?>
                            <input style="display: none" type="number" id="vdb_settings[youtube_number]" name="vdb_settings[youtube_number]" min="0" class="voad-number" value="3"> 
                            <div class="voad_div_tab">
                                <div id="voad_tab<?php echo $i?>" class="vdb_categoryTabName"  style="background-color:<?php _e($vdb_options['color'.$i.'']); ?> "><span class='vdb_category_name'>Video Title</span><div class='voad_renameCategory'><input class='voad_newCategoryName' type='text' onkeydown="voad_notCommas( event )"  maxlength="80" value='<?php echo $str_arr[$i]?>'/> <button type='button' onclick='voad_aceptCategoryName(this.id)' id='voad_changeCategoryOkButton<?php echo $i?>' class='voad_saveNewCategoryName'></button> <button type='button' onclick='voad_cancelCategoryName(this.id)' id='voad_changeCategoyCancelButton<?php echo $i?>' class='cancelNewCategoryName'></button></div></div>
                                <input type="color" id="voad_color<?php echo $i?>" name="vdb_settings[color<?php _e($i); ?>]" onclick="voad_changeColor(this.id)" class="voad_colorPicker" value="#08104E"/>
                                <button id="voad_editCategoryButton<?php echo $i?>" type="button" class="voad_editCategoryButton" onclick="voad_changeCategoryName(this.id)"></button>
                                <input type="hidden" class="voad-form-control" name="vdb_settings[categories]" id="voad_categories" value="Video Title" />
                            <div class="voad_videoBox" id="voad_idVideoBox<?php echo $i?>" style="display: inline-table;"> 
                        <?php
                            
                            for ($j = 1; $j <= 3; $j++){ 
                                    ?>
                                    <div class="vdb_videoRows" id = "vdb_row_id<?php _e($j);?>">
                                        <label class="voad-label" for="vdb_settings[youtube_id<?php _e($j);?>]"> <?php _e('URL', 'videos-on-admin-dashboard');  ?></label>
                                        <input id="vdb_settings[youtube_id<?php _e($j); ?>]" class="voad_videoInput" name="vdb_settings[youtube_id<?php _e($j); ?>]" type="text" class="voad_titleInput" value="<?php  echo esc_attr( $vdb_options['youtube_id' . $j ]);  ?>"/>

                                        <label class="voad-label" for="vdb_settings[title<?php _e($j);?>]"  > <?php _e('Title', 'videos-on-admin-dashboard');  ?></label>
                                        <input id="vdb_settings[title<?php _e($j); ?>]" class="voad_titleInput" name="vdb_settings[title<?php _e($j); ?>]" type="text" class="voad_titleInput" value="<?php  echo esc_attr( $vdb_options['title' . $j ]); ?>"/>

                                        <label class="voad-label" for="vdb_settings[note<?php _e($j);?>]"  ><?php _e('Note', 'videos-on-admin-dashboard');  ?></label>
                                        <input id="vdb_settings[note<?php _e($j); ?>]" class="voad_noteInput" name="vdb_settings[note<?php _e($j); ?>]" type="text" class="voad_noteInput" maxlength="500" value="This is a free plugin, your are allowed to create just one widget and a maximun of three videos, if you want to have unlimited videos and create unlimited widgets on the dashboard please get the premium version."/>

                                        <input id="vdb_settings[category_video<?php _e($j); ?>]" class="voad_categoryInput" style="display: none;" name="vdb_settings[category_video<?php _e($j); ?>]" type="text" class="voad_hiddenInput" value="Video Title"/>

                                        <input type="color" id="voad_colorVideo<?php echo $j?>" class="voad_colorVideo" name="vdb_settings[colorVideo<?php _e($j); ?>]"   value="#08104E"/>

                                    </div>

                        <?php  } ?>

                            </div>
                            </div>

                    <?php  }
                    }
                    ?>
                <div id="boxSubmitButton" class="submit">
                    <input id="submit" type="submit" class="button-primary button_save" value="<?php _e('Save Options', 'videos-on-admin-dashboard'); ?>" />
                </div> 
	</div>
</div>
	<?php 
        infoTab();
        proTab();
    ?>
		</form>
	</div>
	
	        <script type="text/javascript">
            document.getElementById("defaultOpen").click();

            jQuery("#update_category_new").click(function() {
            jQuery("#update_category_form").click();
            });

            jQuery( document ).ready(function($) {
                $('#voad_newCategory').focus();
                var allRowsVideos = document.getElementsByClassName("vdb_videoRows");
                <?php $contIds = $vdb_options['youtube_number'] + 1?>

                //CHANGE COLOR
                function voad_changeColor(id){
                    document.getElementById(id).onchange=function(){
                        var newValue = this.value;
                    $(this).parent().find('div.vdb_categoryTabName').css('background-color', this.value);
                    $(this).parent().find('div.voad_videoBox').children('div.vdb_videoRows').each(function(i){
                        $(this).find('input.voad_colorVideo').val(newValue);
                        });
                    }   
                }

                //CHANGE CATEGORY NAME
                function voad_changeCategoryName(id){
                    var div = $('button#'+id+'').parent().find('div.voad_renameCategory');
                    var input = $('button#'+id+'').parent().find('input.voad_newCategoryName');
                    input.val($('button#'+id+'').parent().find('span.vdb_category_name').text());
                    $('button#'+id+'').parent().find('input.voad_colorPicker').attr('disabled', true);
                    $('button#'+id+'').parent().find('button.voad_editCategoryButton').attr('disabled', true);
                    div.css('display', 'flex');
                    if(window.matchMedia("(max-width: 768px)").matches){
                        $('div.vdb_categoryTabName').css('display','flex');
                    }
                }

                //CANCEL CHANGE CATEGORY NAME
                function voad_cancelCategoryName(id){
                    $(".error").remove();
                    var div = $('button#'+id+'').parent().parent().parent().find('div.voad_renameCategory');
                    $('button#'+id+'').parent().parent().parent().find('input.voad_colorPicker').attr('disabled', false);
                    $('button#'+id+'').parent().parent().parent().find('button.voad_editCategoryButton').attr('disabled', false);
                    div.css('display', 'none');
                    if(window.matchMedia("(max-width: 768px)").matches){
                        $('button#'+id+'').parent().find('div.vdb_categoryTabName').css('display','inline-flex');
                        $('input.voad_newCategoryName').css('display','flex');
                        $('input.voad_newCategoryName').css('flex-wrap','wrap');
                        $('input.voad_newCategoryName').css('width','6rem');
                    }
                }

                //ACCEPT CHANGE CATEGORY NAME
                function voad_aceptCategoryName(id){
                    var arrayCategories = $('#voad_categories').val().split(',');
                    $(".error").remove();
                    if($('button#'+id+'').parent().find('input.voad_newCategoryName').val().trim().length > 0){
                    var newValue = $('button#'+id+'').parent().parent().find('input.voad_newCategoryName').val();
                    $('#voad_categories').val($('#voad_categories').val().replace($('button#'+id+'').parent().parent().find('span.vdb_category_name').text(), newValue));
                    $('button#'+id+'').parent().parent().find('span.vdb_category_name').text(newValue);
                    $('button#'+id+'').parent().parent().parent().find('div.voad_videoBox').each(function(i){
                        $(this).find('input.voad_categoryInput').attr('value',newValue);
                        });
                    voad_cancelCategoryName(id);
                }else{
                    $('button#'+id+'').parent().find('input.voad_newCategoryName').after('<span style="color: #ff0000; background-color: #fff; padding: 5px; margin-left: 5px;" class="error"><?php _e('Please fill this field', 'videos-on-admin-dashboard'); ?></span>');
                    return false;
                }
                if(window.matchMedia("(max-width: 768px)").matches){
                        $('div.vdb_categoryTabName').css('display','inline-block');
                    }
                }

                window.voad_changeColor = voad_changeColor;
                window.voad_changeCategoryName = voad_changeCategoryName;
                window.voad_cancelCategoryName = voad_cancelCategoryName;
                window.voad_aceptCategoryName = voad_aceptCategoryName;

            });

            //CLOSE TABS ON CLICK
            function voad_closeTabsVideos(id){  
                var videoBox = document.getElementById("voad_idVideoBox"+id+"");
                if(videoBox.style.display == "none" ){
                    videoBox.style.display = "inline-table";
                }else{
                    videoBox.style.display = "none";
                }
            }

            //PREVENT TO WRITE COMMAS
            function voad_notCommas(event) {                    
                var e = event || window.event;
                var key = e.keyCode || e.which;
                    if ( key === 188 ) {     
                    e.preventDefault();     
                    }
            } 

        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("voad-tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
                tablinks[i].className = tablinks[i].className.replace(" nahiro-plugins-nav-tab-wrapper-active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.parentNode.className += " nahiro-plugins-nav-tab-wrapper-active";
            evt.currentTarget.className += " active";
        }

        </script>
            <?php
            echo ob_get_clean();
        }

        function voad_add_options_link() { //Add options menu item to settings
            add_menu_page('Video Dashboard Plugin Options', 'Videos on Admin Dashboard', 'manage_options', 'vdb-options', 'voad_settings_page','
        dashicons-video-alt3', 2);
        }
        add_action('admin_menu', 'voad_add_options_link');


        function voad_register_settings() {// create our settings in the options table
            register_setting('voad_settings_group', 'vdb_settings');
        }
        add_action('admin_init', 'voad_register_settings');

        function voad_load_js() //Register our JS
        {

            wp_register_script('voad-js', plugins_url('js/videos-on-admin-dashboard.js', __FILE__));
            wp_enqueue_script('voad-js');

        }
        add_action('admin_enqueue_scripts', 'voad_load_js');

        function voad_load_css($hook) //Register our stylesheet
        {
            wp_register_style('voad-styles', plugins_url('css/admin-page.css', __FILE__));
            if($hook == 'toplevel_page_vdb-options'){
                wp_enqueue_style('voad-styles');
            }

            wp_register_style('font-awesome-styles', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            wp_enqueue_style('font-awesome-styles');

            wp_register_style('amsify-styles', plugins_url('css/amsify.suggestags.css', __FILE__));
            wp_enqueue_style('amsify-styles');

            wp_register_style('voad-style', plugins_url('css/video-on-admin-dashboard.css', __FILE__));
            wp_enqueue_style('voad-style');

        }
        add_action('admin_enqueue_scripts', 'voad_load_css');

        function voad_notice_pro_version() {
            ?>
            <div class="notice notice-info is-dismissible voad_notice">
                <h3><strong><?php _e('Videos on Admin Dashboard','videos-on-admin-dashboard') ?></strong></h3>
                <p><?php _e( 'This is a free plugin, your are allowed to create just one widget and a maximun of three videos, if you want to have unlimited videos and create unlimited widgets on the dashboard please get the', 'videos-on-admin-dashboard' ); ?> <a href="https://nahiro.net/wordpress-plugins/videos-on-admin-dashboard/" target="_blank"><?php _e('premium version.','videos-on-admin-dashboard')?></a></p>
            </div>
            <?php
        }
        add_action( 'admin_notices', 'voad_notice_pro_version' );
        ?>