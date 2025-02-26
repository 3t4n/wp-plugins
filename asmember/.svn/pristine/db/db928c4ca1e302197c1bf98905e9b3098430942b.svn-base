<?php


/*add_filter( 'comment_form_default_fields', function( $fields ) {
  // do things here
  //return $fields;
  return array();
}, 10 );
*/









if(!class_exists("asmember_admin"))
{
	
class asmember_admin
{

	public function __construct()
	{
		add_action("admin_init",array($this,"asmember_post_metainit"));			
		add_action('save_post',array($this,'asmember_post_save'));		
		add_action('admin_menu',array($this,'asmember_admin_menu'),2);		
		add_filter( 'the_content', array($this,'asmember_filter_the_content' )); 			
		add_filter( 'the_excerpt', array($this,'asmember_filter_the_excerpt' ));
		add_filter( 'comment_form_defaults', array($this,'asmember_filter_comment_form' ));
		
		add_action( 'admin_enqueue_scripts', array($this,'asmember_newsletter_scripts' ));		
		add_action('wp_head',array($this,'asmember_insert_tracking_code'));
	}
	
	
	
	

	function asmember_insert_tracking_code()
	{
		$options=get_option("asmember_options_tracking");
		if(isset($options["asmember_options_tracking_code_html"]))
		{
			if($options["asmember_options_tracking_code_html"]!="")
			{
				echo $options["asmember_options_tracking_code_html"];
			}
		}				
	}



	function asmember_newsletter_scripts()
	{	
		
		wp_enqueue_script(
		'asmember-newsletter-script',
		plugins_url('scripts-1-2-3.js',__FILE__),array('jquery'));
	
		$asmember_newsletterObject = array('ajaxurl' => admin_url('admin-ajax.php'));
	
		wp_localize_script(
		'asmember-newsletter-script',
		'asmember_ajaxurl',
		$asmember_newsletterObject);
		
	}
	
	
	
	
	function asmember_filter_comment_form($defaults)
	{
    	if( is_singular('post') && in_the_loop() && is_main_query() )
 		{ 
    		global $post;
    		if(comments_open() && !is_user_logged_in() && $post->_asmember_posts_zugriff==1)
    		{  
        		$defaults['comment_field'] = '';
		        $defaults['submit_button'] = '';
        		$defaults['submit_field']  = '';
        		$defaults['fields']              = '';
        		return $defaults;
    		}
    		
    		if(comments_open() && $post->_asmember_posts_zugriff==2)
    		{
				//Auf Mitgliedschaft prüfen
				global $wpdb;
												
				$vorhanden=0;				
				$user=wp_get_current_user();
				if($user->_asmember_account_membership!="")
				{	
					$memberships=explode(",",$user->_asmember_account_membership);
					
					foreach($memberships as $item)
					{						
						if(strpos(",".$post->_asmember_posts_membership,",".$item.",")>0) $vorhanden=1;
					}	
				}	
				if($vorhanden==0)
				{
					$defaults['comment_field'] = '';
		        	$defaults['submit_button'] = '';
        			$defaults['submit_field']  = '';
        			$defaults['fields']              = '';
        			return $defaults;
				}
			}
		}	
		return $defaults;
	}


	
	
	
	function asmember_filter_the_content( $content )
	{
 		if( is_singular('post') && in_the_loop() && is_main_query() )
 		{
    		global $post;			
			if(!is_user_logged_in() and $post->_asmember_posts_zugriff==1)
			{
				ob_start();				
				echo esc_html_e("Not logged in","asmember");
				return ob_get_clean();        
    		} 
    		
    		if($post->_asmember_posts_zugriff==2)
    		{
				//Auf Mitgliedschaft prüfen
				global $wpdb;
												
				$vorhanden=0;				
				$user=wp_get_current_user();
				if($user->_asmember_account_membership!="")
				{	
					$memberships=explode(",",$user->_asmember_account_membership);
					
					foreach($memberships as $item)
					{						
						if(strpos(",".$post->_asmember_posts_membership,",".$item.",")>0) $vorhanden=1;
					}	
				}	
				if($vorhanden==0)
				{
					ob_start();				
					if(!is_user_logged_in())
					{						
						echo "<p>".esc_html_e("Sie sind nicht eingeloggt.","asmember")."</p>";
						echo get_asverein_login_form();
					}else
					{
						echo "<p>".esc_html_e("Sie haben keinen Zugriff auf diesen Inhalt.")."</p>\n";
					}	
					return ob_get_clean();   
				}
				
			}
			
			
		}  
		if( is_singular('page') && in_the_loop() && is_main_query() )
 		{
    		global $post;			
			if(!is_user_logged_in() and $post->_asmember_page_zugriff==1)
			{
				ob_start();				
				echo esc_html_e("Not logged in","asmember");
				return ob_get_clean();        
    		} 
    		
    		if($post->_asmember_page_zugriff==2)
    		{
				//Auf Mitgliedschaft prüfen
				global $wpdb;
												
				$vorhanden=0;				
				$user=wp_get_current_user();
				if($user->_asmember_account_membership!="")
				{	
					$memberships=explode(",",$user->_asmember_account_membership);
					
					foreach($memberships as $item)
					{												
						if(strpos(",".$post->_asmember_page_membership,",".$item.",")>0) $vorhanden=1;
					}	
				}	
				if($vorhanden==0)
				{
					ob_start();				
					if(!is_user_logged_in())
					{						
						echo "<p>".esc_html_e("Sie sind nicht eingeloggt.","asmember")."</p>";
						echo get_asverein_login_form();
					}else
					{
						echo "<p>".esc_html_e("Sie haben keinen Zugriff auf diesen Inhalt.","asmember")."</p>\n";
					}	
					return ob_get_clean();   
				}
				
			}
			
			
		}  
		
    	return $content;
	}
	
	
	
	
	
	function asmember_filter_the_excerpt( $excerpt )
	{ 		
 		global $post; 		
 		if( !is_admin() && in_the_loop() && is_main_query() )
 		{	
			if(!is_user_logged_in() and $post->_asmember_posts_zugriff==1)
			{				
				return "";        
    		} 
    		
    		if($post->_asmember_posts_zugriff==2)
    		{
				//Auf Mitgliedschaft prüfen
				global $wpdb;
												
				$vorhanden=0;				
				$user=wp_get_current_user();
				if($user->_asmember_account_membership!="")
				{	
					$memberships=explode(",",$user->_asmember_account_membership);
					
					foreach($memberships as $item)
					{						
						if(strpos(",".$post->_asmember_posts_membership,",".$item.",")>0) $vorhanden=1;
					}	
				}	
				if($vorhanden==0)
				{
					return "";   
				}
			}
		}  		
    	return $excerpt;    	
	}
	
	
	
	
	
	function asmember_post_metainit()
	{
		
		add_meta_box("asmember_post_meta", "asMember", array($this,"asmember_post_meta"), "post", "side");
		add_meta_box("asmember_page_meta", "asMember", array($this,"asmember_page_meta"), "page", "side");
		
	}


	function asmember_post_meta()
	{
  		global $post;
  
  		$custom = get_post_custom($post->ID);  	
  		if(isset($custom["_asmember_posts_zugriff"][0])) $_asmember_posts_zugriff = $custom["_asmember_posts_zugriff"][0];else $_asmember_posts_zugriff=0;
  		if(isset($custom["_asmember_posts_membership"][0])) $_asmember_posts_membership = $custom["_asmember_posts_membership"][0];else $_asmember_posts_membership="0";
  		
  		?>
   
  		<p><label><?php echo esc_html_e('Sichtbar','asmember');?></label><br/>
  		<select name="asmember_posts_zugriff" id="asmember_posts_zugriff">
  			<option value="0" <?php if($_asmember_posts_zugriff==0)echo " selected";?>><?php echo esc_html_e('öffentlich','asmember');?></option>
  			<option value="1" <?php if($_asmember_posts_zugriff==1)echo " selected";?>><?php echo esc_html_e('Nur Mitglieder','asmember');?></option>
  			<option value="2" <?php if($_asmember_posts_zugriff==2)echo " selected";?>><?php echo esc_html_e('Nach Mitgliedschaft','asmember');?></option>
  		</select>
  		</p>
  
  		<p><label><?php echo esc_html_e('Sichtbar für Mitgliedschaften','asmember');?></label><br/> 			
  			    			  			
			<?php
			$_asmember_posts_membership=explode(",",trim($_asmember_posts_membership,","));					
			global $wpdb;
			$sql="select * from ".$wpdb->prefix."posts where post_status='publish' and post_type='asmember_memberships'";
			$results=$wpdb->get_results($sql);
			foreach($results as $item)
			{
				echo "<input type=\"checkbox\" name=\"asmember_posts_membership[]\" value=\"".$item->ID."\"";
				if(in_array($item->ID,$_asmember_posts_membership))echo " checked";
				echo ">".$item->post_title."</input><br>\n";
			}				
			?>		
  		</p>	
  		
  		<?php
	}



	function asmember_post_save($post_id)
	{  				
	  	$post_type = get_post_type($post_id);
		if($post_type=="post")
		{
			if(isset($_POST["asmember_posts_zugriff"]))$asmember_posts_zugriff=sanitize_text_field($_POST["asmember_posts_zugriff"]);else $asmember_posts_zugriff=0;
  			update_post_meta($post_id, "_asmember_posts_zugriff", $asmember_posts_zugriff);  		
  			
  			if(isset($_REQUEST['asmember_posts_membership']))$asmember_posts_membership=$_REQUEST['asmember_posts_membership'];else $asmember_posts_membership="";
  			if($asmember_posts_membership!="")
  				if(count($_REQUEST['asmember_posts_membership'])>0)
  					$asmember_posts_membership=",".implode(",",$_REQUEST['asmember_posts_membership']).",";else
  					$asmember_posts_membership="";
  			
  			update_post_meta($post_id,"_asmember_posts_membership",$asmember_posts_membership);	
  			
  			 	  	
		}	
		
		if($post_type=="page")
		{
			if(isset($_POST["asmember_page_zugriff"]))$asmember_page_zugriff=sanitize_text_field($_POST["asmember_page_zugriff"]);else $asmember_page_zugriff=0;
  			update_post_meta($post_id, "_asmember_page_zugriff", $asmember_page_zugriff);  		
  			
  			if(isset($_REQUEST['asmember_page_membership']))$asmember_page_membership=$_REQUEST['asmember_page_membership'];else $asmember_page_membership="";
  			if($asmember_page_membership!="")
  				if(count($_REQUEST['asmember_page_membership'])>0)
  					$asmember_page_membership=",".implode(",",$_REQUEST['asmember_page_membership']).",";else
  					$asmember_page_membership="";
  			
  			update_post_meta($post_id,"_asmember_page_membership",$asmember_page_membership);	
  			
  			 	  	
		}	
		
		
	}  


	
	function asmember_page_meta()
	{
  		global $post;
  
  		
  		$custom = get_post_custom($post->ID);  	
  		if(isset($custom["_asmember_page_zugriff"][0])) $_asmember_page_zugriff = $custom["_asmember_page_zugriff"][0];else $_asmember_page_zugriff=0;
  		if(isset($custom["_asmember_page_membership"][0])) $_asmember_page_membership = $custom["_asmember_page_membership"][0];else $_asmember_page_membership="0";
  		?>
   
  		<p><label><?php echo esc_html_e('Sichtbar','asmember');?></label><br/>
  		<select name="asmember_page_zugriff" id="asmember_posts_zugriff">
  			<option value="0" <?php if($_asmember_page_zugriff==0)echo " selected";?>><?php echo esc_html_e('öffentlich','asmember');?></option>
  			<option value="1" <?php if($_asmember_page_zugriff==1)echo " selected";?>><?php echo esc_html_e('Nur Mitglieder','asmember');?></option>
  			<option value="2" <?php if($_asmember_page_zugriff==2)echo " selected";?>><?php echo esc_html_e('Nach Mitgliedschaft','asmember');?></option>
  		
  		</select>
  		</p>
    
    	<p><label><?php echo esc_html_e('Sichtbar für Mitgliedschaften','asmember');?></label><br/> 			
  			    			  			
			<?php
			$_asmember_page_membership=explode(",",trim($_asmember_page_membership,","));					
			global $wpdb;
			$sql="select * from ".$wpdb->prefix."posts where post_status='publish' and post_type='asmember_memberships'";
			$results=$wpdb->get_results($sql);
			foreach($results as $item)
			{
				echo "<input type=\"checkbox\" name=\"asmember_page_membership[]\" value=\"".$item->ID."\"";
				if(in_array($item->ID,$_asmember_page_membership))echo " checked";
				echo ">".$item->post_title."</input><br>\n";
			}				
			?>		
  		</p>	
  		<?php  
	}

	
	
	function asmember_dashboard_output()
	{
		?>
		<style>
		.asverein-dashboard-header{background-color:#990000;padding:10px;color:#fff;margin-top:20px;margin-bottom:20px;}
		.asverein-help-frame{font-size:14px;width:100%;border:solid 1px #afafaf;backgroound-color:#fff;border-radius:5px;padding:10px;margin-bottom:20px;}
		</style>
		<?php
		echo "<h2 class=\"asverein-dashboard-header\">Dashboard</h2>";
		echo "<h4>Willkommen bei a.s.Member</h4>\n";
		
		
		//Datenbank prüfen
		global $wpdb;
		/*
		$table_name = $wpdb->prefix.'asmember_login_stat';
		$sql = "show columns from ".$table_name." where Field='last_logins'"; 
        if($wpdb->get_var($sql) != "user")
        {
        */	
        $table_name = $wpdb->prefix.'asmember_newsletter_send';
		if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name)
		{ 		
			echo "<div style=\"background-color:#990000;padding:4px;color:#ffffff;margin-bottom:20px;\">\n";
			echo "Die Datenbank ist nicht aktuell.<br>";				
			echo "Starten Sie die Datenbank-Aktualisierung unter Optionen->DB ... ";						
     		echo sprintf('<a href="%s" style="color:#fff">%s</a>',esc_url(add_query_arg('wp_http_referer',urlencode(wp_unslash($_SERVER['REQUEST_URI'])),self_admin_url('admin.php?page=asmember_option&tab=db'))),__("Weiter"));			
     		echo "</div>\n";
		}
		
		?>
		
		<p><b>Version:</b> 1.4</p>
		<p>&nbsp;</p>
		
		<h4>Erste Schritte</h4>
		<div class="asverein-help-frame">
		<ol>			
			<li>Nehmen Sie die Einstellungen des Plugins unter Optionen vor</li>
			<li>Legen Sie die entsprechenden Seiten für Inhalte und Mitgliederbereich mit Einbindung der Shortcodes an</li>
		</ol>
		</div>
				
		<h4>Hilfe & Support</h4>
		
		<a href="https://asuess.de/plugins/asmember/dokumentation-shortcodes/" target="_blank" class="btn btn-primary">Liste der Shortcodes</a>
		
		<p>&nbsp;</p>
		
		<h4>Weitere Angebote</h4>

		<style>
			.asmember-admin-angebote
			{
				border:solid 1px #afafaf;
				margin-bottom:5px;
				padding:10px;
			}
			
			.asmember-admin-angebote-img
			{
				width:100px;
				float:left;
				margin-right:15px;
			}
			.asmember-admin-angebote-img img
			{
				width:100%;
			}
				
		</style>

		<div class="asmember-admin-angebote">
			<div class="asmember-admin-angebote-img">
				<img src="<?php echo ASMEMBER_PLUGIN_URL?>assets/images/angebote_asdownload.png"/>
			</div>
			<div>
				<h5>a.s.Download</h5>
				<p>Mit asDownload kannst Du digitale Produkte anbieten und diese entsprechend einer gebuchten Mitgliedschaft zum Download zur Verfügung stellen.</p>
				<a href="https://asmember.de/plugins/asdownload/" class="btn btn-primary" target="_blank">Weitere Infos</a>
			</div>
			<div style="clear:left"></div>
		</div>
		
		
		<div class="asmember-admin-angebote">
			<div class="asmember-admin-angebote-img">
				<img src="<?php echo ASMEMBER_PLUGIN_URL?>assets/images/angebote_asmemberarea.png"/>
			</div>
			<div>
				<h5>a.s.Memberarea</h5>
				<p>Mit dem Plugin asMemberarea richtest Du auf Deine Seite einen Mitgliederbereich ein, dem Du verschiedene Bereich zuordnen kannst.</p>
				<a href="https://asmember.de/plugins/asmemberarea/" class="btn btn-primary" target="_blank">Weitere Infos</a>
			</div>
			<div style="clear:left"></div>
		</div>
		
		
		
		<div class="asmember-admin-angebote">
			<div class="asmember-admin-angebote-img">
				<img src="<?php echo ASMEMBER_PLUGIN_URL?>assets/images/angebote_ascourses.png"/>
			</div>
			<div>
				<h5>a.s.Courses</h5>
				<p>Mit dem Plugin asCourses kannst Du Online-Kurse und Tutorials erstellen und anbieten.</p>
				<a href="https://asmember.de/plugins/ascourses/" class="btn btn-primary" target="_blank">Weitere Infos</a>
			</div>
			<div style="clear:left"></div>
		</div>
		
		
		
		<div class="asmember-admin-angebote">
			<div class="asmember-admin-angebote-img">
				<img src="<?php echo ASMEMBER_PLUGIN_URL?>assets/images/angebote_asverein.png"/>
			</div>
			<div>
				<h5>a.s.Verein - Vereinsverwaltung für Wordpress</h5>
				<a href="https://asverein.de" class="btn btn-primary" target="_blank">Weitere Infos</a>
			</div>
			<div style="clear:left"></div>
		</div>
		
		<?php
	}

	
	
	
	
	
	function asmember_admin_menu()
	{
		add_menu_page(
			'asMember',
			'asMember',
			'manage_options',
			'asmember',
			array($this,'asmember_dashboard_output'),'',2);
	
		
		add_submenu_page(
			'asmember',
			_x('Mitgliedschaften','asmember'),
			_x('Mitgliedschaften','asmember'),
			'manage_options',
			'edit.php?post_type=asmember_memberships',
			'');
	
	
				
		add_submenu_page(
		'asmember',
		__('Login Statistik','asmember'),
		__('Login Statistik','asmember'),
		'manage_options',
		'asmember_login_stat',
		array('asmember_login_stat','asmember_login_stat_page_output'));
	
		
		add_submenu_page(
		'asmember',
		__('Buchungen','asmember'),
		__('Buchungen','asmember'),
		'manage_options',
		'asmember_bookings',
		array('asmember_bookings','asmember_bookings_page_output'));
		
		add_submenu_page(
			'asmember',
			_x('Newsletter','asmember'),
			_x('Newsletter','asmember'),
			'manage_options',
			'edit.php?post_type=asmember_newsletter',
			'');
			
		
		add_submenu_page(
		'asmember',
		_x('Optionen','asmember'),
		_x('Optionen','asmember'),
		'manage_options',
		'asmember_option',
		array('asmember_admin_options','asmember_options_page_output'));
	
				
		
		
			
		
		
	
	}




	

}

$asmember_admin_obj = new asmember_admin();	
}	