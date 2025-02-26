<link  rel='stylesheet' href='<?php echo $apm_settings['paths']['css'] ;?>portal.css' type='text/css' media='all' />
<link  rel='stylesheet' href='<?php echo $apm_settings['paths']['css'] ;?>ui-style.css' type='text/css' media='all' />

<script type='text/javascript' >
	var apm_path_js="<?php echo $apm_settings['paths']['js'] ;?>";
	var apm_path_css="<?php echo $apm_settings['paths']['css'] ;?>";
</script>
<script type="text/javascript">
		tinyMCEPreInit = {
			base : "<?php echo site_url(); ?>/wp-includes/js/tinymce",
			suffix : "",
			query : "ver=345-20111127",
			mceInit : {'content1':{mode:"exact",width:"100%",theme:"advanced",skin:"wp_theme",language:"en",spellchecker_languages:"+English=en,Danish=da,Dutch=nl,Finnish=fi,French=fr,German=de,Italian=it,Polish=pl,Portuguese=pt,Spanish=es,Swedish=sv",theme_advanced_toolbar_location:"top",theme_advanced_toolbar_align:"left",theme_advanced_statusbar_location:"bottom",theme_advanced_resizing:true,theme_advanced_resize_horizontal:false,dialog_type:"modal",formats:{
						alignleft : [
							{selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles : {textAlign : 'left'}},
							{selector : 'img,table', classes : 'alignleft'}
						],
						aligncenter : [
							{selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles : {textAlign : 'center'}},
							{selector : 'img,table', classes : 'aligncenter'}
						],
						alignright : [
							{selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles : {textAlign : 'right'}},
							{selector : 'img,table', classes : 'alignright'}
						],
						strikethrough : {inline : 'del'}
					},relative_urls:false,remove_script_host:false,convert_urls:false,remove_linebreaks:true,gecko_spellcheck:true,keep_styles:false,entities:"38,amp,60,lt,62,gt",accessibility_focus:true,tabfocus_elements:"major-publishing-actions",media_strict:false,paste_remove_styles:true,paste_remove_spans:true,paste_strip_class_attributes:"all",paste_text_use_dialog:true,extended_valid_elements:"article[*],aside[*],audio[*],canvas[*],command[*],datalist[*],details[*],embed[*],figcaption[*],figure[*],footer[*],header[*],hgroup[*],keygen[*],mark[*],meter[*],nav[*],output[*],progress[*],section[*],source[*],summary,time[*],video[*],wbr",wpeditimage_disable_captions:false,wp_fullscreen_content_css:"<?php echo site_url(); ?>/wp-includes/js/tinymce/plugins/wpfullscreen/css/wp-fullscreen.css",plugins:"inlinepopups,spellchecker,tabfocus,paste,media,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs",content_css:"<?php echo site_url(); ?>/wp-content/themes/aisle/editor-style.css",elements:"content1",wpautop:true,apply_source_formatting:false,theme_advanced_buttons1:"bold,italic,strikethrough,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,|,link,unlink,wp_more,|,spellchecker,fullscreen,wp_adv",theme_advanced_buttons2:"formatselect,underline,justifyfull,forecolor,|,pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo,wp_help",theme_advanced_buttons3:"",theme_advanced_buttons4:"",editor_selector:"apm-editor",height:"150"},'content':{elements:"content",wpautop:true,remove_linebreaks:true,apply_source_formatting:false,theme_advanced_buttons1:"bold,italic,strikethrough,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,|,link,unlink,wp_more,|,spellchecker,wp_fullscreen,wp_adv,|,scn_button",theme_advanced_buttons2:"formatselect,underline,justifyfull,forecolor,|,pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo,wp_help",theme_advanced_buttons3:"",theme_advanced_buttons4:""}},
			qtInit : {'content':{id:"content",buttons:"strong,em,link,block,del,ins,img,ul,ol,li,code,more,spell,close,fullscreen"},'replycontent':{id:"replycontent",buttons:"strong,em,link,block,del,ins,img,ul,ol,li,code,spell,close"}},
			ref : {plugins:"inlinepopups,spellchecker,tabfocus,paste,media,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs",theme:"advanced",language:"en"},
			load_ext : function(url,lang){var sl=tinymce.ScriptLoader;sl.markDone(url+'/langs/'+lang+'.js');sl.markDone(url+'/langs/'+lang+'_dlg.js');}
		};
	</script>
	<script type='text/javascript' src='<?php echo site_url(); ?>/wp-includes/js/tinymce/wp-tinymce.php?c=1&amp;ver=345-20111127'></script>
<script type='text/javascript' src='<?php echo site_url(); ?>/wp-includes/js/tinymce/langs/wp-langs-en.js?ver=345-20111127'></script><script type="text/javascript">
		(function(){
			var init, ed, qt, first_init, mce = false;

			if ( typeof(tinymce) == 'object' ) {
				// mark wp_theme/ui.css as loaded
				tinymce.DOM.files[tinymce.baseURI.getURI() + '/themes/advanced/skins/wp_theme/ui.css'] = true;

				for ( ed in tinyMCEPreInit.mceInit ) {
					if ( first_init ) {
						init = tinyMCEPreInit.mceInit[ed] = tinymce.extend( {}, first_init, tinyMCEPreInit.mceInit[ed] );
					} else {
						init = first_init = tinyMCEPreInit.mceInit[ed];
					}

					if ( mce )
						try { tinymce.init(init); } catch(e){}
				}
			}

			if ( typeof(QTags) == 'function' ) {
				for ( qt in tinyMCEPreInit.qtInit ) {
					try { quicktags( tinyMCEPreInit.qtInit[qt] ); } catch(e){}
				}
			}
		})();

		var wpActiveEditor;

		jQuery('.wp-editor-wrap').mousedown(function(e){
			wpActiveEditor = this.id.slice(3, -5);
		});

	</script>
<script type='text/javascript' src='<?php echo $apm_settings['paths']['js'] ;?>jquery-ui-1.8.16.custom/js/jquery-ui-1.8.16.custom.min.js'></script>
<script type='text/javascript' src='<?php echo $apm_settings['paths']['js'] ;?>admin/scripts.js'></script>
<script type='text/javascript' src='<?php echo $apm_settings['paths']['js'] ;?>portal/scripts.js'></script>

<script  type='text/javascript' src="<?php echo $apm_settings['paths']['js'] ;?>portal/jquery_002.js"></script>
<script  type='text/javascript' src="<?php echo $apm_settings['paths']['js'] ;?>portal/jquery-ui.js"></script>
<script  type='text/javascript' src="<?php echo $apm_settings['paths']['js'] ;?>portal/jquery.js"></script>
<script type='text/javascript' src='<?php echo $apm_settings['paths']['js'] ;?>admin/multiple-jquery-tabs/jquery-ilc-tabs.js'></script>
<script type='text/javascript' src='<?php echo $apm_settings['paths']['js'] ;?>admin/multiselect_jquery/ui.multiselect.js'></script>
<script  type='text/javascript' src="<?php echo $apm_settings['paths']['js'] ;?>portal/dash.js"></script>
<script  type='text/javascript' src="<?php echo $apm_settings['paths']['js'] ;?>portal/modernizr.js"></script>
	<script type="text/javascript">
		Modernizr.load([{
			//load: "https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"
		}, {
			load: "https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"
		}, {
	
		}/*, {
			load: "lib/dash.js"
		}*/]);
	</script>
	<style type="text/css">.icon { width:75px; height:75px; }
	.ticon { float:left; margin: .3em .5em; width:25px; height:25px; box-shadow:1px 1px 1px #aaa; }
	.ui-dialog { text-align:left; }
	.ui-dialog input[type="text"], 
	.ui-dialog textarea { display:block; width:90%; }</style>

<div id='left_nav_applications'>
	
	<?php require APPLICATION_MAKER_VIEWS_PATH . 'apm-apps_list_block.php'; ?>
	
</div>
<div id='top_nav_quick_add'>
	<span>QUICK ADD: </span>
	<ul>
		<li>
			<ul>
				<li>+Accounts</li>
				<li>+Contact</li>
				<li>+Deal</li>
				<li>+Quote</li>
				<li>+Report</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>+Project</li>
				<li>+Payment</li>
				<li>+Bank account</li>
			</ul>
		</li>
		<li>
			<ul>
				<li>+Invoice</li>
				<li>+Payment</li>
				<li>+Bank account</li>
			</ul>
		</li>
	</ul>
</div>
<div id='portal_zone'>
	<div id='portal_content'>
		<div id='portal_header'>
			<h3>15 Green Leaves Portal - <?php echo $post->post_title; ?></h3>
		</div>
		<?php
		//echo var_dump($this->atts);
			if(isset($this->atts['show_apps_list']) and $this->atts['show_apps_list']=="true"){
				require APPLICATION_MAKER_VIEWS_PATH . 'apm-portal_apps_list.php';
			}
			if(isset($this->atts['show_main_dashboard']) and $this->atts['show_main_dashboard']=="true"){
				//show_tabs
				require APPLICATION_MAKER_VIEWS_PATH . 'apm-portal_main_dashboard.php';
			}
		
		?>
	</div>
</div>
<div id="dialog-confirm-close-widget" title="Close widget" style="display: none;"><span class="ui-icon ui-icon-alert" style="float: left; cursor: pointer;"></span>You are about to delete this widget. Are you sure?</div><div id="dialog-config-widget" title="Modify" style="display: none;"><form><fieldset><legend>Change widget content</legend><p><label>Title <input id="widget-title-text" type="text"></label></p><p><label>Content <textarea rows="5" cols="50" id="widget-content-text">Some test content</textarea></label></p><p id="icon-field"><label>Icon URL <span>Will be resized to 75x75 pixels</span><input id="widget-icon-text" type="text"></label></p></fieldset></form></div></article>
		
