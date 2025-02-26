<?php
/*
Plugin Name: eBook Creator from posts
Description: Plugin automatically generates eBooks from posts in different formats: PDF,MOBI and ePub. (P.S. OTHER MUST-HAVE PLUGINS FOR EVERYONE: http://bitly.com/MWPLUGINS )
Version: 1.21
Author: TazoTodua
Author URI: http://www.protectpages.com/profile
Plugin URI: http://www.protectpages.com/
Donate link: http://paypal.me/tazotodua
*/
if ( ! defined( 'ABSPATH' ) ) exit; //Exit if accessed directly
define ('version__ECFP', 1.21);

//Define some things
	define('OPT_settng__ECFP',			'ECFP__all_opts' );											//options name of SETTINGS
	define('OPT_posts__ECFP',			'ECFP__all_posts' );										//options name of POSTS_ARRAY
										$x= wp_upload_dir();
	define('default_path__ECFP',		$x['basedir'].'/ebooks_generated/');				//first part of default PATH 
	define('default_url__ECFP',			$x['baseurl'].'/uploads/ebooks_generated/');				//first part of default URL
	define('domainURL__ECFP',			(((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!=='off') || $_SERVER['SERVER_PORT']==443) ? 'https://':'http://' ).$_SERVER['HTTP_HOST']);
	define('PLUGIN_URL__ECFP',			str_ireplace(domainURL__ECFP, '', plugin_dir_url(__FILE__)) );
	$GLOBALS['settngsARR__ECFP']		=non_empty_arrayyyy__ECFP(get_option(OPT_settng__ECFP));	//get settings on first load
	function IF_Folder_Exists__ECFP		($path){if(!file_exists($path)) {mkdir($path,0755,true);}  return $path;}
	function iss_admiiiiiin__ECFP		()	{require_once(ABSPATH.'wp-includes/pluggable.php');	return (current_user_can('activate_plugins')? true:false);}
	function MemoryLimits__ECFP()		{ @ini_set('max_execution_time', 1500); 	@set_time_limit(0);	  $a=ini_get('memory_limit');  $a= !empty($a) ? $a : 0;     @ini_set('memory_limit', (  (str_ireplace('m','',$a)<128) ? '128M' : $a)  ); }
	function get_optiooon__posts__ECFP	(){ return get_option(OPT_posts__ECFP,array()); }
	function non_empty_arrayyyy__ECFP	($x=array()){ if (!is_array($x)){return array();} return $x;}
	function validate_Nonce__ECFP(		$value, $name){if (!wp_verify_nonce($value, $name) ) { die("not allowed. refresh previous page.  error_41551");}  }	
	$GLOBALS['formatsARR__ECFP']		=array('pdf','epub','mobi');								//default formats
	$GLOBALS['mimetypesARR__ECFP']		=array('pdf'=>'pdf','epub'=>'epub+zip','mobi'=>'x-mobipocket-ebook');		//default formats
	define('homeURL__ECFP',				home_url() );												//Home url
	define('pluginpage__ECFP',			'ebook-creator-slug-ecfp' );								//options page slug 
	define('fonts_instal_1__ECFP',		'To install MUST_HAVE fonts ');//message...
	define('fonts_instal_2__ECFP',		'In case you are going to use Asian/African/some other fonts, needed for PDF generator (in sum 50 MB) ');//message...
	$GLOBALS['fonts_mpdfDIR__ECFP']		=directoried__ECFP(dirname(__FILE__).'/lib/format_PDF/mPDF/files/ttfonts/');
	define('basic_fonts__ECFP',		'fonts__basic.zip');		define('basic_font_example__ECFP',		'DejaVuSans.ttf');	
	define('continent_fonts__ECFP',	'fonts__continent.zip');	define('continent_font_example__ECFP',	'ZawgyiOne.ttf');
	
	function directoried__ECFP($dir) 	{return str_replace( array ('/','\\'), DIRECTORY_SEPARATOR, $dir); }
	define('fonts_download__ECFP',		admin_url().'?ecfp__DOWNLOAD_FONT=');
	define('fonts_downloadlink_1__ECFP',fonts_download__ECFP.'MUST_HAVEs');
	define('fonts_downloadlink_2__ECFP',fonts_download__ECFP.'ASIANs');
	define('plugin_settings_page__ECFP',admin_url('admin.php?page='.pluginpage__ECFP));
	
	//Determine Ebook LOCATIONS ( /wp-content/uploads/xxx/yyyy/   ------- folders are divided from 1-1000, 1000-2000, ... )
	function get_post_folder__ECFP($id,$post_type=false){
		if(!is_numeric($id)) { exit("incorrect ID"); }
		$dir		= IF_Folder_Exists__ECFP(default_path__ECFP);
		$defaults	= get_option(OPT_settng__ECFP);
		//check output path,and if needed, re-create
			if (defined('ECFT_subfoldername'))			{$dir .=ECFT_subfoldername;}
			else { $x= $defaults['extra_location'];  if (!empty($x)) {   if ($x=='ECFP_PSTYPE'){$dir .=$post_type;} }    }
			$dir .= (substr($dir,-1) != '/') ? 	 '/'		: '';   $thousands = floor($id/1000) *1000;	
			$dir .= $thousands.'-'. ($thousands+999).'/';   if(!isset($_GET['download_ebook'])) {  IF_Folder_Exists__ECFP($dir); }
			return $dir;
	}
	function get_post_folder_URL__ECFP($id,$post_type=false){return str_replace (WP_CONTENT_DIR,WP_CONTENT_URL,get_post_folder__ECFP($id,$post_type));	}


	
//Execute functions on Activation/Deactivation
	register_activation_hook( __FILE__, 'install__ECFP');
	function install__ECFP(){
		
	}

add_action('plugins_loaded', 'refresh_options__ECFP',1);
function refresh_options__ECFP(){
	$opts= $old_opts =  get_option(OPT_settng__ECFP);
	//get_editable_roles()
		$array =  array( 'enable_pdf'=>1,   'enable_epub'=>1,   'enable_mobi'=>1,   'CHBX_AUTOCHECK'=>0,  'mpdf_fonts_1_installed'=>0, 'mpdf_fonts_2_installed'=>0,  'extra_location'=>'ECFP_PSTYPE', 'placement_Block'=>'bottom',  'download_phraze'=> 'Download article eBook' ,  'include_images'=>0 );
	foreach($array as $name=>$value){ if(!array_key_exists($name,$opts)){ $opts[$name]=$array[$name]; } }
	$opts['vers']= version__ECFP; 
	if($old_opts != $opts) { update_option(OPT_settng__ECFP, $opts );  }
	return $opts;
}
	
	
//Execute functions on Activation/Deactivation
	register_deactivation_hook( __FILE__,  'uninstall__ECFP');
	function uninstall__ECFP()	{        }			//unlink($this->allowed_ipss_file());


//add page under SETTINGS
	add_action('admin_menu',  'settingspage__ECFP' ); function settingspage__ECFP() {add_submenu_page('options-general.php' , 'eBook Creator', 'eBook-Creator', 'manage_options', pluginpage__ECFP, 'settngs__ECFP' );}
	function settngs__ECFP() 
	{
		if(isset($_GET['isactivation'])) { echo '<script>alert("You should set these options per sub-site one-by-one");</script>'; }
		
		$defaults= get_option(OPT_settng__ECFP);
		if (!empty($_POST['update_ecfp'])) {	validate_Nonce__ECFP($_POST['update_ecfp'],'ecfp_upd');
			$defaults['extra_location']	=urlencode($_POST['subfolder__ECFP']);
			$defaults['CHBX_AUTOCHECK']	=$_POST['chebkx__ECFP'];
			$defaults['include_images']	=$_POST['ImagesInclude__ECFP'];			
			$defaults['download_phraze']=$_POST['downl_phraze__ECFP'];
			$defaults['placement_Block']=$_POST['placement__ECFP'];  //$defaults['CHBX_showintop']=$_POST['showintop__ECFP']; $defaults['CHBX_showinbottom']=$_POST['showinbottom__ECFP'];
			foreach($GLOBALS['formatsARR__ECFP'] as $each){$defaults['enable_'.$each]=$_POST['enabled_'.$each];}
			update_option(OPT_settng__ECFP,$defaults);
		}
		?><style>	body{font-family:arial;} input.langs{width:100%;} span.codee{background-color:#D2CFCF; padding:1px 3px; border:1px solid;} .eachBlock{margin: 30px 0px 0px; border: 3px solid; padding: 10px; border-radius: 5px;}  .fakeH22{font-size:2em;font-weight:bold;}  .redd{color:red; font-weight:bold;} </style>
		<script type="text/javascript">
			/*
			//######################## simple POPUP  ############################# https://github.com/tazotodua/useful-javascript/ ###############
			function show_my_popup(TEXTorID){
					TEXTorID=TEXTorID.trim(); var FirstChar= TEXTorID.charAt(0); var eName = TEXTorID.substr(1); if ('#'==FirstChar || '.'==FirstChar){	if('#'==FirstChar){var x=document.getElementById(eName);} else{var x=document.getElementsByClassName(eName)[0];}} else { var x=document.createElement('div');x.innerHTML=TEXTorID;} var randm_id=Math.floor((Math.random()*100000000));
				var DivAA = document.createElement('div');    DivAA.id = "blkBackgr_"+randm_id;  DivAA.className = "MyJsBackg";   DivAA.setAttribute("style", 'background:black; height:5000px; left:0px; opacity:0.9; position:fixed; top:0px; width:100%; z-index:9599;'); document.body.appendChild(DivAA);
				var DivBB = document.createElement('div');    DivBB.id = 'popupp_'+randm_id;     DivBB.className = "MyJsPopup";   DivBB.setAttribute("style",'background-color:white; border:6px solid white; border-radius:10px; display:block; min-height:100px; min-width:350px; overflow:auto; max-height:80%; max-width:92%; padding:15px; position:fixed; text-align:center; top:25%; left:50%; transform:translate(-50%, 0); z-index:9599;'); 	DivBB.innerHTML = '<div style="background-color:#C0BCBF; border-radius:55px; padding:5px; font-family:arial; float:right; font-weight:700; margin:-15px -10px 0px 0px;"><a href="javascript:pop_hide('+randm_id+');" style="display:block;margin:-5px 0 0 0;font-size:1.6em;">x</a></div>'; document.body.appendChild(DivBB);z=x.cloneNode(true);DivBB.appendChild(z); if(z.style.display=="none"){z.style.display="block";}
			}
			function pop_hide(RandomIDD)  { var x=document.getElementById("blkBackgr_"+RandomIDD); x.parentNode.removeChild(x);      var x=document.getElementById('popupp_'+RandomIDD); x.parentNode.removeChild(x); }
			//###################################################################################
			*/
		</script>
		<?php if (isset($_GET['activatedd'])) { ?>
			<div  id="img_waitt1"> 	fonts are being downloaded. please wait about half minute.. <img src="<?php echo PLUGIN_URL__ECFP;?>/lib/media_files/preoader_1.gif" style="width:200px;height:auto;" alt="" /> </div>
			<iframe src="<?php echo fonts_downloadlink_1__ECFP;?>" style="width:100%; min-width:150px;height:10px;"  scrolling="none" frameborder=0></iframe>
		<?php exit; } ?>
		
		
		<form action="" method="POST">
				<?php Check_Fonts_installed__ECFP(basic_fonts__ECFP);?>
				<?php Check_Fonts_installed__ECFP(continent_fonts__ECFP);?>
				<div class="eachBlock"><center><span class="fakeH22">fot CUSTOM PROGRAMING abilities, read advices along the paragraphs.</span> </center>
				</div>

				
				<div class="eachBlock"><span class="fakeH22">OPTIONS</span> 
					<div class="ffee">
						*<span class="redd">How to view EPUB,MOBI files on WINDOWS</span>  - <a href="javascript:alert('You can install CALIBRE or AMAZON KINDLE READER');void(0);">Read advice!</a>  
						<br/><br/><br/><br/>*Enable creation of:<?php foreach($GLOBALS['formatsARR__ECFP'] as $each) {echo '<span style="margin:0 0 0 10px;"> </span><b>'.$each.'</b><input type="hidden"  value="0" name="enabled_'.$each.'" /><input type="checkbox"  value="1" name="enabled_'.$each.'" '.( ('1' == $defaults['enable_'.$each])	?  'checked="checked"' : '' ) .' /> '; }?>
						<br/><br/>*show Images into generated files ( <a href="javascript:alert('on some servers, if this option causes an error,then disable this.however,  try once,if your server supports image generations.. and images will be embeded into generated files with base64 method.');void(0);">Read advice!</a> ) <input type="hidden" name="ImagesInclude__ECFP" value="0"  />  <input type="checkbox"  <?php echo ( ('1' == $defaults['include_images'])	?  'checked="checked"' : '' );?>  name="ImagesInclude__ECFP" value="1"  />
						<br/><br/>* BUTTONS location - where you want to see the download buttons ?  (type: <span class="redd">bottom</span>, <span class="redd">top</span> or <span class="redd">disabled</span>)  <input type="text"  value="<?php echo $defaults['placement_Block'];?>" name="placement__ECFP" />  (read for <a href="javascript:alert('if you want to output them in WIDGETS (or anywhere), use shorcode [ebooks_download__ECFP]. If you want to manually use and modify the function with PHP coding,then the array can be obtained with \u0022get_ebooks_array__ECFP()\u0022 function) ');void(0);">modification API</a>) 	<?php /* ?> <br/><br/>* Display Download icons in:  Top of content:<input type="hidden" name="showintop__ECFP" value="0"  />  <input type="checkbox"  <?php echo ( ('1' == $defaults['CHBX_showintop'])	?  'checked="checked"' : '' );?>  name="showintop__ECFP" value="1"  />  <span style="margin:0 0 0 20px;"></span>Bottom of content:<input type="hidden" name="showinbottom__ECFP" value="0"  />  <input type="checkbox"  <?php echo ( ('1' == $defaults['CHBX_showinbottom'])	?  'checked="checked"' : '' );?>  name="showinbottom__ECFP" value="1"  /> <?php */ ?>
						<br/><br/>* Enter a phraze, to be shown with buttons: <input type="text"  value="<?php echo $defaults['download_phraze'];?>"  name="downl_phraze__ECFP"  />  (read for <a href="javascript:alert('if you want to change that dinamically with PHP coding, then set the constant \u0022ECFP_Download_Phraze\u0022  (before post_content is loaded on site) ');void(0);">modification API</a>)
						<br/><br/>* <b>BOOK save location</b> -  Default Location for generated books is: <?php echo default_path__ECFP;?>. However, you can add a subfolder to that path.. for this, you can type: <br/> 
						<span style="margin:0 0 0 20px;">1) folder-name </span> 
						<span style="margin:0 0 0 20px;">2) <b>ECFP_PSTYPE</b> ( this abbreviation determines as POST_TYPE)</span> 
						<span style="margin:0 0 0 20px;">3) special php code (<a href="javascript:alert('to define the subfolder name, create a function: add_action(\u0022init\u0022,....) and within that, set a php CONSTANT,named ECFT_subfoldername');void(0);">Read API advice!</a>) </span>
						<input type="text"  value="<?php echo $defaults['extra_location'];?>" name="subfolder__ECFP" />
						<br/><br/>* By Default (for new posts), should the "GENERATE" checkbox be checked? <input type="hidden" name="chebkx__ECFP" value="0"  />  <input type="checkbox"  <?php echo ( ('1' == $defaults['CHBX_AUTOCHECK'])	?  'checked="checked"' : '' );?>  name="chebkx__ECFP" value="1"  />
						
						
					</div>
				</div>
		
		
		
			
			
			<br/><br/>
			<input type="hidden" name="update_ecfp" value="<?php echo wp_create_nonce('ecfp_upd');?>" />
			<br/><br/>
			<input type="submit" value="SAVE" />
		</form>
		<br/><br/>
		* p.s. PLUGIN uses the following libraries: mPDF; php-epub-creator; phpMobi;
		<br/>*p.s.2.  I reccomend to view the topic - <a href="http://bitly.com/MWPLUGINS">Must-Have Plugins list</a>
		<?php
	}
		
		
	

//add meta boxes on POST EDITOR page
	add_action('add_meta_boxes','mtbxx34__ECFP'); function mtbxx34__ECFP(){ $x=get_post_types(); foreach($x as $screen) { add_meta_box('divID__ECFP', 'eBook Creator','ebk_mtbx__EFCP', $screen, 'normal'); }  }
	function ebk_mtbx__EFCP($post){
		$posts_list		= get_optiooon__posts__ECFP() ;
		?>
		<div id="meta_field__ECFP">
			Generate ebook for this post: <input type="hidden" name="ebok_create__ECFP" value="n"  />  
				<input type="checkbox"  <?php echo ( (empty($posts_list[$post->ID]) && ('1'==$GLOBALS['settngsARR__ECFP']['CHBX_AUTOCHECK'])) || (!empty($posts_list[$post->ID]) && 'y'==$posts_list[$post->ID]) ?  'checked="checked"' : '' ) ; ?>  name="ebok_create__ECFP" value="y"  />
			<div class="defss"  style="margin:20px 20px 20px 20x; background-color:#e7e7e7; float:right;">
				YOU CAN LEAVE THESE FIELDS EMPTY..
				<table>
					<tr> <td>eBook Title </td>  <td><input type="text" name="book_title__ECFP" value=""  /></td> </tr> 
					<tr> <td>eBook Creator</td>  <td><input type="text" name="book_creator__ECFP" value=""  /></td> </tr> 
					<tr> <td>Book Publisher</td>  <td><input type="text" name="book_publisher__ECFP" value=""  /></td> </tr>
					<tr style="display:none;"> <td>eBook Language</td>  <td><input type="text" name="book_language__ECFP" value=""  /></td> </tr> 
					<tr> <td>Book Rights</td>  <td><input type="text" name="book_rights__ECFP" value="Public Domain"  /></td> </tr> 
					<tr style="display:none;"> <td>Book UID</td>  <td><input type="text" name="book_uid__ECFP" value="x"  /></td> </tr>
				</table>
			</div>
			<div style="clear:both;"></div>
		</div><?php 
		Check_Fonts_installed__ECFP(continent_fonts__ECFP);
	}

	
						function Check_Fonts_installed__ECFP($fonts_archive_namee){	 
								//determine which font should be checked as an example,to ensure that whole package is installed
									$hint_font_name = determine_example_font__ECFP($fonts_archive_namee); 
								//determine which font package is requested
									$groupN= ($hint_font_name == basic_font_example__ECFP) ? 1 : 2;
								
							// ========check if font_package not installed =========
							if(!file_exists( $GLOBALS['fonts_mpdfDIR__ECFP'].$hint_font_name ) ) { ?>
								<div id="fonts_noinst__<?php echo $groupN;?>" style="background:pink;padding:40px; border:5px solid green;">
									<div>
									<?php echo constant('fonts_instal_'.$groupN.'__ECFP');?> click <a href="<?php echo constant('fonts_downloadlink_'.$groupN.'__ECFP');?>" target="_blank" style="font-weight:bold; font-size:1.1em; margin:0 10px;">INSTALL</a>; 
									</div>
								</div>
								<script type="text/javascript">
								function re_attachh(){
									var elementt	=document.getElementById("fonts_noinst__<?php echo $groupN;?>");   var targett	=document.getElementById("wpcontent");
									targett.insertBefore(elementt, targett.childNodes[0]);
								} re_attachh();
								</script> <?php 
							}
						} 


//Generate files (or NOT)  on Save_POST
	add_action( 'save_post', 'savpst44__ECFP' , 31);
	function savpst44__ECFP($post_id=false) { global $wpdb;
		if(isset($_POST['ebok_create__ECFP'])) {
			$posts_list		= get_optiooon__posts__ECFP() ;
			$posts_list[$post_id]=$_POST['ebok_create__ECFP'];  update_option(OPT_posts__ECFP, $posts_list);
				
			if ('y'==$_POST['ebok_create__ECFP'] )	{
				$array=array();
				
				$array['create_PDF']		= $GLOBALS['settngsARR__ECFP']['enable_pdf'];	
				$array['create_EPUB']		= $GLOBALS['settngsARR__ECFP']['enable_epub'];	
				$array['create_MOBI']		= $GLOBALS['settngsARR__ECFP']['enable_mobi'];	
				$array['book_title']		= !empty($_POST['book_title__ECFP']) ? $_POST['book_title__ECFP']			: $_POST['post_title'];
				$array['book_creator']		= !empty($_POST['book_creator__ECFP']) ? $_POST['book_creator__ECFP']		: $_POST['post_name'];
				$array['book_publisher']	= !empty($_POST['book_publisher__ECFP']) ? $_POST['book_publisher__ECFP']	: $_POST['post_name'];
				$array['book_language']		= !empty($_POST['book_language__ECFP']) ? $_POST['book_language__ECFP']		: '';
				$array['book_rights']		= !empty($_POST['book_rights__ECFP']) ? $_POST['book_rights__ECFP']			: '';
				$array['book_uid']			= !empty($_POST['book_uid__ECFP']) ? $_POST['book_uid__ECFP']				: '';
				$array['book_filename']		= $_POST['post_ID'];
				$array['css_styles']		= 'body { line-height:1.3em; background-color:#F2F0EE; font-family:"my_custom_font", "___my_custom_fonttt is added in config_fonts.php___" ; }	.contntt {}  img{display: block; margin-right: auto; margin-left: auto;}  ';
				$array['output_path'] 		= get_post_folder__ECFP($_POST['post_ID'], $_POST['post_type']);
				//set final array
				
				
				$array['book_content']		= '<br/><div class="ebook_contntt">'.stripslashes($_POST['post_content']).'</div>';
				
				//if images are included, then it is better to replace SRC images with BASE64 data 
				if ($GLOBALS['settngsARR__ECFP']['include_images']=='1') {
					include_once(dirname(__FILE__).'/lib/media_files/__ecfp_typical_image-functionssss.php');  
					$array['book_content']	= ReplaceImgSrcs_with_base64__ECFP($array['book_content']);  
					//depart centered images from text..
					$array['book_content']	= preg_replace('/(\<img[^\(.*?)>]class\=\"aligncenter\"(.*?)\/\>)/si','<div class="image_centerizatorr" style="text-align:center;">$1</div>', $array['book_content']);
				}
				
				$final_arr=array_merge($_POST,$array);
				book_createe__ECFP($final_arr);
			}
		}
	}


	//function 
	function book_createe__ECFP($array=array()){
		MemoryLimits__ECFP();
		if ($array['create_PDF'])	{  PDF_CREATE__ECFP($array);  }
		if ($array['create_EPUB'])	{  EPUB_CREATE__ECFP($array); }
		if ($array['create_MOBI'])	{  MOBI_CREATE__ECFP($array); }
	}
	
	
	// ===================== PDF (CREATE) ===================== \\
	function PDF_CREATE__ECFP( $array=array() ){
		// ====START CLASS ===
		include_once(dirname(__file__).'/lib/format_PDF/mPDF/files/mpdf.php');
		
		$contnt=$array['book_content'];
		$contnt=str_replace("\n",'<br/>',$contnt);
		$contnt= $array['book_title'].'<br/>'.$contnt;
		$mpdf=new mPDF( '',  						 // mode (default '')
						'A4',  0, '', 				// format ('A4', '' or...), font size(default 0), font family
						15,	15,	16,	16,		9,	9, 	//(margins) left, right, top, bottom, HEADER, FOOTER
						'L');
						
		$mpdf->showImageErrors = true;
		
		$mpdf->WriteHTML('<html><head><style>'.$array['css_styles']	.'</style></head><body>'.  $contnt .'</body></html>');
		$mpdf->Output($array['output_path'].$array['book_filename'].'.pdf','F');
		return array(true);
	}
	
	// ===================== EPUB (CREATE) ===================== \\
	function EPUB_CREATE__ECFP( $array=array() ){
			// ====START CLASS ===
			$path_to_class= dirname(__file__).'/lib/format_EPUB/php-epub-creator/files/';	include_once($path_to_class.'classes/TPEpubCreator.php');
			header('Content-Type: text/html; charset=utf-8');  // This is only to make sure the charset is UTF-8
			$epub = new TPEpubCreator();
			// Temp folder and epub file name (path)
				$epub->temp_folder	=$array['output_path'].'../temp_folder/';  IF_Folder_Exists__ECFP($epub->temp_folder);
				$epub->epub_file	=$array['output_path'].$array['book_filename'].'.epub'; 
			// E-book configs
				$epub->title	=$array['book_title'];		//i.e. post-name     
				$epub->creator	=$array['book_creator'];		//i.e. 'Luiz Otávio Miranda'     
			 //	$epub->language	=$array['book_language'];		//i.e. 'pt'
				$epub->rights	=$array['book_rights'];		//i.e. 'Public Domain'
				$epub->publisher=$array['book_publisher'];	//i.e. 'http://www.tutsup.com/';  
				$epub->uuid		=$array['book_uid'];  		// You can specify your own uuid
			// Make sure only one image is set to cover !!! otherwsie bad file will be created.. 
					// [[[ DESCRIPTION: AddImage( image path, mimetype, cover_set ) ]]]
				//$epub->AddImage( $path_to_class.'images/1.jpg', false, true );
			// You can specity your own CSS
				$epub->css		=$array['css_styles'];
			// add to <body> content... You must not use doctype, head and body tags (only XHTML body content) 
					// [[[ DESCRIPTION:   AddPage( XHTML, file, title, download images ); ]]]
				//$epub->AddPage( false, $path_to_class.'file.txt', 'Título (check accent)' );		// Add page from file  ....   remove doctype, head and body tags
				//$epub->AddPage( '<b>Test</b>', false, 'Title 2' );					// Add page content directly...  
				//$epub->AddPage( '<img src="images/2.jpg" />', false, 'Title 3' );
			//	$epub->AddPage( '<img src="http://lorempixel.com/400/200" />', false, 'Title 4', true );		// Here the last param tells the class to download de image
				//$epub->AddPage( '<img src="images/4.jpg" />', false, 'Title 5' );
				$epub->AddPage( $epub->title, false, '' );
				$epub->AddPage( $array['book_content'], false, '' );

			// Create the EPUB  ( If yet no error happened..)
			if ( !$epub->error ) {	$epub->CreateEPUB();  if (!$epub->error ) {
					return array(false, $epub->epub_file );
			} }
			return array(false, $epub->error);
	}
	
	
	// ===================== MOBI (CREATE) ===================== \\
	function MOBI_CREATE__ECFP( $array=array() ){
		// my customs 
		$path_to_output	= $array['output_path'];
		$filename		= $array['book_filename'].".mobi";
		$UseContent_Instead_of_URL= true;

		// =====START CLASS ===
		$path_to_class	= dirname(__file__).'/lib/format_MOBI/phpMobi/files/';	include_once($path_to_class."MOBIClass/MOBI.php");
		if($UseContent_Instead_of_URL){
			$mobi		= new MOBI();
			$content	= new MOBIFile();
			$content->set("title",	$array['book_title']);			//i.e. post-name  
			$content->set("author",	$array['book_creator']);		//i.e. 'Luiz Otávio Miranda' 
			//$content->appendChapterTitle("START CHAPTER");
		//	for($i = 0, $lenI = rand(5, 10); $i < $lenI; $i++){   $content->appendParagraph("P".($i+1));   }
			//Based on PHP's imagecreatetruecolor help paage
		//		$im = imagecreatetruecolor(220, 200);
		//		$text_color = imagecolorallocate($im, 233, 14, 91);
		//		imagestring($im, 10, 5, 5,  'A Simple Text String', $text_color);
		//		imagestring($im, 5, 15, 75,  'A Simple Text String', $text_color);
		//		imagestring($im, 3, 25, 125,  'A Simple Text String', $text_color);
		//		imagestring($im, 2, 10, 155,  'A Simple Text String', $text_color);
		//		$content->appendImage($im);
		//		imagedestroy($im);
		//	$content->appendPageBreak();
		//	for($i = 0, $lenI = rand(10, 15); $i < $lenI; $i++){
		//		$content->appendChapterTitle(($i+1).". Chapter ".($i+1));
		//		for($j = 0, $lenJ = rand(20, 40); $j < $lenJ; $j++){   $content->appendParagraph("P".($i+1).".".($j+1)." TEXT TEXT TEXT");   }
		//		$content->appendPageBreak();
		//	}
			$content->appendParagraph($array['book_content']);
			$mobi->setContentProvider($content);
		}else{
			$url = "http://google.com";
			$recognize = false;
			$mobi = new MOBI();															//Create the mobi object
			$content = null;															//Find and set the content handler
			if($recognize){ $content = RecognizeURL::GetContentHandler($url); }			//Pass through to right handler
			if($content==null){ $content = new OnlineArticle($url); }					//If handler not found
			$mobi->setContentProvider($content);	
		}
		//$title = $mobi->getTitle();  if($title === false) { $title = $array['book_title']; }  $title = urlencode(str_replace(" ", "-", strtolower(substr($title, 0, 15))));
		//$mobi->download	($title.'__'.$filename);									//download
		$mobi->save		($path_to_output.$filename);									//Save the file locally
		return  array(true,$path_to_output.$filename);
	}
	

	
	
	//get books download array
	function get_ebooks_array__ECFP($post=false){ 
		if (!$post) { if (empty($GLOBALS['post'])) {return false;} else { $post=$GLOBALS['post']; }  }
		$defaults	= $GLOBALS['settngsARR__ECFP'];
		$bookArray				=array();		
		$books_URL	= get_post_folder_URL__ECFP($post->ID, $post->post_type);
		$bookArray['output']	='<div class="bd__ECFP"> <style type="text/css">.bd__ECFP .EachLine{display:inline-block; } .bd__ECFP img{width:40px; height:auto; } .bd__ECFP .downloadd{margin: 10px 10px 0px 0px; float:none; display: inline; position: relative; top: -15px;} .bd1__ECFP{text-align:center;} </style>'.
				'<div class="bd1__ECFP"><span class="downloadd">'.(defined('ECFP_Download_Phraze') ? ECFP_Download_Phraze : $defaults['download_phraze'] ).'</span> ';
		foreach($GLOBALS['formatsARR__ECFP'] as $each) { 
			if ($defaults['enable_'.$each] ){
				$bookArray[$each.'_location']	= homeURL__ECFP.'?download_ebook=y&booktype='.$each.'&id='.$post->ID.'&ptype='.$post->post_type ;  //$books_URL .$post->ID. '.' . $each
				$bookArray[$each.'_image']		= PLUGIN_URL__ECFP .'/lib/media_files/'.$each.'_1.png' ; 
				$bookArray['output']			.= '<div class="EachLine"><a href="'.$bookArray[$each.'_location'].'" target="_blank"> <span class="nm">'.strtoupper(' ').'</span> <img src="'.$bookArray[$each.'_image'].'" alt="'. $each .'" /></a></div>';
			}
		}
		$bookArray['output']	.='</div></div>  ';
		return $bookArray;
	}
	
	
	// =================================== DOWNLOAD ===================
	DownloadBook__ECFP();
	function DownloadBook__ECFP(){
		if(isset($_GET['download_ebook'])){ array_filter($_GET, 'sanitize_text_field');
			if(!is_numeric($_GET['id']))									{ exit("error 34511"); }
			if(!in_array($_GET['booktype'], $GLOBALS['formatsARR__ECFP']))	{ exit("error 34512"); } 
			$post=get_post($_GET['id']);
			$file_path	=  (get_post_folder__ECFP($_GET['id'], $post->post_type)) . $_GET['id'].'.'.$_GET['booktype'];
			$file_name	=	$post->post_name.'    ___'.$_GET['id'].'.'.$_GET['booktype'];
			ob_get_clean();	
			ini_set('auto_detect_line_endings', true);
			header("Pragma: public");
			header("Expires: 0");
			header('Content-Type: application/force-download'); //application/octet-stream  // $GLOBALS['mimetypesARR__ECFP'][$_GET['booktype']]
			header("Content-Description: File Transfer");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: public");
			header("Content-Disposition: attachment; filename=\"".$file_name."\"");
			header('Content-Length:' . filesize($file_path));
			die(file_get_contents($file_path));
		}
	}


	//output 
	add_filter( 'widget_text', 'do_shortcode' ); //enable SHORTCODES in widgets
	add_shortcode( 'ebooks_download__ECFP', 'downloads_out__ECFP' ); function downloads_out__ECFP($atts){
		echo get_ebooks_array__ECFP($GLOBALS['post']);
	}
	
	add_filter( 'the_content', 'addblock_to_post__ECFP', 20 );
	function addblock_to_post__ECFP( $content ) {
		if( (!empty($GLOBALS['wp_query']) && is_singular()) || defined('temporary_enabled__ECFP') ){
			$defaults	= $GLOBALS['settngsARR__ECFP'];
			$posts_list	= get_optiooon__posts__ECFP();
			if ( array_key_exists($GLOBALS['post']->ID, $posts_list)  && 'y'==$posts_list[$GLOBALS['post']->ID] ) {
				$BookArr	= get_ebooks_array__ECFP($GLOBALS['post']);
				if ($defaults['placement_Block'] == 'top')			{ $content = $BookArr['output'].	$content;			}
				elseif ($defaults['placement_Block'] == 'bottom')	{ $content = $content. 				$BookArr['output'];	}
			}
		}
		return $content;
	}
	
	
	
	
	// ========= download and install fonts ========== //
	if (is_admin() && isset($_GET['ecfp__DOWNLOAD_FONT'])){ download_start__ECFP($_GET['ecfp__DOWNLOAD_FONT']); exit('<script type="text/javascript">top.window.location ="'. plugin_settings_page__ECFP .'";</script>');  } 
			 

	
	// =================== functions ==================//
	function download_start__ECFP($package_type){		 if (!iss_admiiiiiin__ECFP()) return false;
		$opts = get_option(OPT_settng__ECFP);
		switch($package_type) {
			case "ASIANs":			Download_Fonts_Archive__ECFP(continent_fonts__ECFP);	$opts['mpdf_fonts_2_installed']=1; 	echo 'Installed!  <script type="text/javascript">top.window.location="'.plugin_settings_page__ECFP.'";</script>'; break;
			case "MUST_HAVEs":		Download_Fonts_Archive__ECFP(basic_fonts__ECFP);		$opts['mpdf_fonts_1_installed']=1;
																echo '<script type="text/javascript">if (confirm("'.constant('fonts_instal_2__ECFP').', click OK.")) { window.location = "'.fonts_download__ECFP.'ASIANs"; } else { top.window.location="'.plugin_settings_page__ECFP.'"; }</script>';  	break;
																															default: break;
		}
		update_option( OPT_settng__ECFP, $opts );
	}
	
		function Download_Fonts_Archive__ECFP($font_archive_name){  $archive_font = determine_example_font__ECFP($font_archive_name);
			if (!file_exists($GLOBALS['fonts_mpdfDIR__ECFP'].$archive_font)){
				Download_file__ECFP('http://plugins.svn.wordpress.org/ebook-create-using-post/assets/___additional_fonts_for_MPDF_ttfonts/'.$font_archive_name,  $GLOBALS['fonts_mpdfDIR__ECFP']); 
				doExtract__ECFP($font_archive_name,  $GLOBALS['fonts_mpdfDIR__ECFP']);
				unlink($GLOBALS['fonts_mpdfDIR__ECFP'].$font_archive_name);
			}
		}
	
	function determine_example_font__ECFP($archive_name){  return ($archive_name==basic_fonts__ECFP) ?  basic_font_example__ECFP : continent_font_example__ECFP; }
	
	
	
	
	
	
	
	
	// =========================== TYPICAL FUNCTIONS  ================
	function zipSupport__ECFP(){
		if (function_exists('zip_open'))  return 'function';
		if (class_exists('ZipArchive'))									return 'class';
		if (strpos(PHP_OS, 'WIN') === false && @shell_exec('unzip'))	return 'exec';
		return false;
	}

	function doExtract__ECFP($subject, $path){
		$subjectHTML=$path.'/'.$subject;
		switch (zipSupport__ECFP()) {
			case 'function':
				if (!is_resource($zip = zip_open($path.'/'.$subject))) {  print($subjectHTML . ' could not be read for extracting');  }

				while ($zip_entry = zip_read($zip)){
					zip_entry_open($zip, $zip_entry);
					if (substr(zip_entry_name($zip_entry), -1) == '/') {
						$zdir = substr(zip_entry_name($zip_entry), 0, -1);
						if (file_exists($path.'/'.$zdir)) {	print(htmlspecialchars($zdir) . ' exists!');  }
						mkdir($path.'/'.$zdir);
					}
					else {
						if (file_exists($path.'/'.zip_entry_name($zip_entry))) { print(htmlspecialchars($path.'/'.zip_entry_name($zip_entry)) . ' exists!'); }
						$fopen = fopen($path.'/'.zip_entry_name($zip_entry), 'w');
						$ze_fs = zip_entry_filesize($zip_entry);
						fwrite($fopen, zip_entry_read($zip_entry, $ze_fs), $ze_fs);
					}
					zip_entry_close($zip_entry);
				}
				zip_close($zip);	break;
			case 'class':
				$zip = new ZipArchive();
				if ($zip->open($path.'/'.$subject) !== true) {	return refresh($subjectHTML . ' could not be read for extracting'); }
				$zip->extractTo($path);
				$zip->close();		break;
			case 'exec':
				shell_exec('unzip ' . escapeshellarg($path.'/'.$subject));	break;
		}
		return true;
	}
	function Download_file__ECFP($file_Url, $directory, $silently = false){   
		set_time_limit (300);  $file_name	= basename($file_Url);
		$x= file_put_contents($directory.$file_name,   file_get_contents($file_Url)  );
		if($silently)  { return ($x ? true:false); }
		else {echo ($x ? 'OK, <b>'.$file_name.'</b> installed.' : $file_name . ' (FAILED...Try later..)');}
	}
	
	
								//===========  links in Plugins list ==========//
								add_filter( "plugin_action_links_".plugin_basename( __FILE__ ), function ( $links ) {   $links[] = '<a href="'.plugin_settings_page__ECFP.'">Settings</a>'; $links[] = '<a href="http://paypal.me/tazotodua">Donate</a>';  return $links; } );
								//REDIRECT SETTINGS PAGE (after activation)
								add_action( 'activated_plugin', function($plugin ) { if( $plugin == plugin_basename( __FILE__ ) ) { exit( wp_redirect( plugin_settings_page__ECFP.'&isactivation' ) ); } } );
?>