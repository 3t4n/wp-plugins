<?php

class asmember_memberships
{

	public function __construct()
	{
		add_action('init', array($this,'post_type_asmember_memberships'));	
		add_action("admin_init", array($this,"asmember_memberships_metainit"));	
		add_action('save_post', array($this,'asmember_memberships_save_details'));
		
	}
	
		
	function post_type_asmember_memberships()
	{
    	register_post_type(

               'asmember_memberships',
                array(
                    'label' => __('asmember-Memberships','asmember'),
                    'public' => true,
					'exclude_from_search'=>true,
					'publicly_queryable'=>true,
					'show_in_menu'=>false,
					'show_in_nav_menus'=>false,
                    'show_ui' => true,
                    'supports' => array('title','editor','thumbnail'),                    
                    'has_archive' => true,
                    'rewrite' => array( 'slug' => 'membership')                 
                    
                )

        );
	}




	function asmember_memberships_metainit()
	{
		add_meta_box("asmember_memberships_meta", __("Preis","asmember"), array($this,"asmember_memberships_meta"), "asmember_memberships", "normal", "high");
		add_meta_box("asmember_memberships_meta_angebot", __("Angebotspreis","asmember"), array($this,"asmember_memberships_meta_angebot"), "asmember_memberships", "normal", "high");
		add_meta_box("asmember_memberships_meta_options", __("Optionen","asmember"), array($this,"asmember_memberships_meta_options"), "asmember_memberships", "normal", "high");
		add_meta_box("asmember_memberships_meta_verl", __("Verl&auml;ngerung","asmember"), array($this,"asmember_memberships_meta_verl"), "asmember_memberships", "normal", "high");
		add_meta_box("asmember_memberships_meta_partner", __("Partnerprogramm","asmember"), array($this,"asmember_memberships_meta_partner"), "asmember_memberships", "normal", "high");
	}




	function asmember_memberships_meta_options()
	{
  		global $post;
  
  		$custom = get_post_custom($post->ID);  	  		  	
  		if(isset($custom["_asmember_memberships_enabled"][0]))		$_asmember_memberships_enabled = $custom["_asmember_memberships_enabled"][0];else $_asmember_memberships_enabled=1;
  		
  		if(isset($custom["_asmember_memberships_period"][0])) $_asmember_memberships_period = $custom["_asmember_memberships_period"][0];else $_asmember_memberships_period=0;
  		
  		if(isset($custom["_asmember_memberships_anmeldung_bis"][0]))
  		{
  			$_asmember_memberships_anmeldung_bis = $custom["_asmember_memberships_anmeldung_bis"][0];
  			if($_asmember_memberships_anmeldung_bis==0)
				$_asmember_memberships_anmeldung_bis="";else
  				$_asmember_memberships_anmeldung_bis=strftime("%Y-%m-%d",$_asmember_memberships_anmeldung_bis);
		
		}else $_asmember_memberships_anmeldung_bis="";
		
		if(isset($custom["_asmember_memberships_anmeldung_von"][0]))
		{
			$_asmember_memberships_anmeldung_von = $custom["_asmember_memberships_anmeldung_von"][0];
			if($_asmember_memberships_anmeldung_von==0)
				$_asmember_memberships_anmeldung_von="";else
  				$_asmember_memberships_anmeldung_von=strftime("%Y-%m-%d",$_asmember_memberships_anmeldung_von);
		}else $_asmember_memberships_anmeldung_von="";	
			
		?>
  		

  		<p><label><?php echo _e("Anmeldung:","asmember");?></label><br/>
  		<select name="_asmember_memberships_enabled">  		
  			<option value="0" <?php if($_asmember_memberships_enabled==0)echo " selected";?>><?php echo _e("Nein","asmember");?></option>
  			<option value="1" <?php if($_asmember_memberships_enabled==1)echo " selected";?>><?php echo _e("Ja","asmember");?></option>
  			</select>
  		</p>
  				
  		
  		<p><label><?php echo _e("Zeitraum:","asmember");?></label><br/>
  		<select name="_asmember_memberships_period">  		
  			<option value="0" <?php if($_asmember_memberships_period==0)echo " selected";?>><?php echo _e("unbeschr&auml;nkt","asmember");?></option>
  			<option value="1" <?php if($_asmember_memberships_period==1)echo " selected";?>><?php echo _e("1 Monat","asmember");?></option>
  			<option value="2" <?php if($_asmember_memberships_period==2)echo " selected";?>><?php echo _e("2 Monate","asmember");?></option>
  			<option value="3" <?php if($_asmember_memberships_period==3)echo " selected";?>><?php echo _e("3 Monate","asmember");?></option>
  			<option value="4" <?php if($_asmember_memberships_period==4)echo " selected";?>><?php echo _e("4 Monate","asmember");?></option>
  			<option value="5" <?php if($_asmember_memberships_period==5)echo " selected";?>><?php echo _e("5 Monate","asmember");?></option>
  			<option value="6" <?php if($_asmember_memberships_period==6)echo " selected";?>><?php echo _e("6 Monate","asmember");?></option>
  			<option value="7" <?php if($_asmember_memberships_period==7)echo " selected";?>><?php echo _e("7 Monate","asmember");?></option>
  			<option value="8" <?php if($_asmember_memberships_period==8)echo " selected";?>><?php echo _e("8 Monate","asmember");?></option>
  			<option value="9" <?php if($_asmember_memberships_period==9)echo " selected";?>><?php echo _e("9 Monate","asmember");?></option>
  			<option value="10" <?php if($_asmember_memberships_period==10)echo " selected";?>><?php echo _e("10 Monate","asmember");?></option>
  			<option value="11" <?php if($_asmember_memberships_period==11)echo " selected";?>><?php echo _e("11 Monate","asmember");?></option>
  			<option value="12" <?php if($_asmember_memberships_period==12)echo " selected";?>><?php echo _e("12 Monate","asmember");?></option>
  		</select>
  		</p> 	
  	
  		<p><label><?php _e("Anmeldung von:","asmember");?></label><br/>
  		<input type="date" name="_asmember_memberships_anmeldung_von" value="<?php echo $_asmember_memberships_anmeldung_von;?>"/>
  		</p>
  		
  		<p><label><?php _e("Anmeldung bis:","asmember");?></label><br/>
  		<input type="date" name="_asmember_memberships_anmeldung_bis" value="<?php echo $_asmember_memberships_anmeldung_bis;?>"/>
  		</p>
 		<?php  
	}
	
	
	
	
	function asmember_memberships_meta_verl()
	{
  		global $post;
  
  		$custom = get_post_custom($post->ID);  	  		  	
  		
  		if(isset($custom["_asmember_memberships_renew"][0]))		$_asmember_memberships_renew=	$custom["_asmember_memberships_renew"][0];else $_asmember_memberships_renew=0;
  		if(isset($custom["_asmember_memberships_renew_von"][0]))		$_asmember_memberships_renew_von=	$custom["_asmember_memberships_renew_von"][0];else $_asmember_memberships_renew_von=1;
  		if(isset($custom["_asmember_memberships_renew_bis"][0]))		$_asmember_memberships_renew_bis=	$custom["_asmember_memberships_renew_bis"][0];else $_asmember_memberships_renew_bis=1;
  		
		if(isset($custom["_asmember_memberships_verl_betrag"][0]))			$_asmember_memberships_verl_betrag=				$custom["_asmember_memberships_verl_betrag"][0];else $_asmember_memberships_verl_betrag=0;
		if(isset($custom["_asmember_memberships_verl_betrag_mwst_satz"][0]))$_asmember_memberships_verl_betrag_mwst_satz=	$custom["_asmember_memberships_verl_betrag_mwst_satz"][0];else $_asmember_memberships_verl_betrag_mwst_satz=19;
		if(isset($custom["_asmember_memberships_verl_betrag_mwst"][0]))		$_asmember_memberships_verl_betrag_mwst=		$custom["_asmember_memberships_verl_betrag_mwst"][0];else $_asmember_memberships_verl_betrag_mwst=0;
		if(isset($custom["_asmember_memberships_verl_betrag_netto"][0]))	$_asmember_memberships_verl_betrag_netto=		$custom["_asmember_memberships_verl_betrag_netto"][0];else $_asmember_memberships_verl_betrag_netto=0;  	
  		  		
		?>
  		
		
  		<p><label><?php echo _e("Verl&auml;ngerung:","asmember");?></label><br/>
  		<select name="_asmember_memberships_renew">
  			<option value="0" <?php if($_asmember_memberships_renew==0)echo " selected";?>><?php echo _e("Nein","asmember");?></option>
  			<option value="1" <?php if($_asmember_memberships_renew==1)echo " selected";?>><?php echo _e("manuell","asmember");?></option>
  			<option value="2" <?php if($_asmember_memberships_renew==2)echo " selected";?>><?php echo _e("automatisch","asmember");?></option>
  		</select></p>	
  	
  		  		
  		<p><label><?php _e("Verl&auml;ngerung von:","asmember");?></label><br/>
  		<select name="_asmember_memberships_renew_von">
  			<option value="0" <?php if($_asmember_memberships_renew_von==1)echo " selected";?>><?php echo _e("1 Woche","asmember");?></option>
  			<option value="1" <?php if($_asmember_memberships_renew_von==2)echo " selected";?>><?php echo _e("2 Wochen","asmember");?></option>
  			<option value="3" <?php if($_asmember_memberships_renew_von==3)echo " selected";?>><?php echo _e("3 wochen","asmember");?></option>
  			<option value="4" <?php if($_asmember_memberships_renew_von==4)echo " selected";?>><?php echo _e("4 wochen","asmember");?></option>
  			<option value="5" <?php if($_asmember_memberships_renew_von==5)echo " selected";?>><?php echo _e("5 wochen","asmember");?></option>
  			<option value="6" <?php if($_asmember_memberships_renew_von==6)echo " selected";?>><?php echo _e("6 wochen","asmember");?></option>
  			<option value="7" <?php if($_asmember_memberships_renew_von==7)echo " selected";?>><?php echo _e("7 wochen","asmember");?></option>
  			<option value="8" <?php if($_asmember_memberships_renew_von==8)echo " selected";?>><?php echo _e("8 wochen","asmember");?></option>
  		</select></p>
  		
  		<p><label><?php _e("Verl&auml;ngerung bis:","asmember");?></label><br/>
  		<select name="_asmember_memberships_renew_bis">
  			<option value="0" <?php if($_asmember_memberships_renew_bis==1)echo " selected";?>><?php echo _e("1 Woche","asmember");?></option>
  			<option value="1" <?php if($_asmember_memberships_renew_bis==2)echo " selected";?>><?php echo _e("2 Wochen","asmember");?></option>
  			<option value="3" <?php if($_asmember_memberships_renew_bis==3)echo " selected";?>><?php echo _e("3 wochen","asmember");?></option>
  			<option value="4" <?php if($_asmember_memberships_renew_bis==4)echo " selected";?>><?php echo _e("4 wochen","asmember");?></option>
  			<option value="5" <?php if($_asmember_memberships_renew_bis==5)echo " selected";?>><?php echo _e("5 wochen","asmember");?></option>
  			<option value="6" <?php if($_asmember_memberships_renew_bis==6)echo " selected";?>><?php echo _e("6 wochen","asmember");?></option>
  			<option value="7" <?php if($_asmember_memberships_renew_bis==7)echo " selected";?>><?php echo _e("7 wochen","asmember");?></option>
  			<option value="8" <?php if($_asmember_memberships_renew_bis==8)echo " selected";?>><?php echo _e("8 wochen","asmember");?></option>
  		</select></p>
  		
  		
  		<p><label><?php echo _e("Betrag:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_verl_betrag" value="<?php echo $_asmember_memberships_verl_betrag;?>"/></p>
  	
  		<p><label><?php echo _e("Mwst-Satz:","asmember");?></label><br/>
  		<select name="_asmember_memberships_verl_betrag_mwst_satz">
  			<option value="0" <?php if($_asmember_memberships_verl_betrag_mwst_satz==0)echo " selected";?>>0 %</option>
  			<option value="1" <?php if($_asmember_memberships_verl_betrag_mwst_satz==1)echo " selected";?>>1 %</option>
  			<option value="2" <?php if($_asmember_memberships_verl_betrag_mwst_satz==2)echo " selected";?>>2 %</option>
  			<option value="3" <?php if($_asmember_memberships_verl_betrag_mwst_satz==3)echo " selected";?>>3 %</option>
  			<option value="4" <?php if($_asmember_memberships_verl_betrag_mwst_satz==4)echo " selected";?>>4 %</option>
  			<option value="5" <?php if($_asmember_memberships_verl_betrag_mwst_satz==5)echo " selected";?>>5 %</option>
  			<option value="6" <?php if($_asmember_memberships_verl_betrag_mwst_satz==6)echo " selected";?>>6 %</option>
  			<option value="7" <?php if($_asmember_memberships_verl_betrag_mwst_satz==7)echo " selected";?>>7 %</option>
  			<option value="8" <?php if($_asmember_memberships_verl_betrag_mwst_satz==8)echo " selected";?>>8 %</option>
  			<option value="9" <?php if($_asmember_memberships_verl_betrag_mwst_satz==9)echo " selected";?>>9 %</option>
  			<option value="10" <?php if($_asmember_memberships_verl_betrag_mwst_satz==10)echo " selected";?>>10 %</option>
  			<option value="11" <?php if($_asmember_memberships_verl_betrag_mwst_satz==11)echo " selected";?>>11 %</option>
  			<option value="12" <?php if($_asmember_memberships_verl_betrag_mwst_satz==12)echo " selected";?>>12 %</option>
  			<option value="13" <?php if($_asmember_memberships_verl_betrag_mwst_satz==13)echo " selected";?>>13 %</option>
  			<option value="14" <?php if($_asmember_memberships_verl_betrag_mwst_satz==14)echo " selected";?>>14 %</option>
  			<option value="15" <?php if($_asmember_memberships_verl_betrag_mwst_satz==15)echo " selected";?>>15 %</option>
  			<option value="16" <?php if($_asmember_memberships_verl_betrag_mwst_satz==16)echo " selected";?>>16 %</option>
  			<option value="17" <?php if($_asmember_memberships_verl_betrag_mwst_satz==17)echo " selected";?>>17 %</option>
  			<option value="18" <?php if($_asmember_memberships_verl_betrag_mwst_satz==18)echo " selected";?>>18 %</option>
  			<option value="19" <?php if($_asmember_memberships_verl_betrag_mwst_satz==19)echo " selected";?>>19 %</option>
  			<option value="20" <?php if($_asmember_memberships_verl_betrag_mwst_satz==20)echo " selected";?>>20 %</option>  			
  		</select>
  		</p>
  		
  		<p><label><?php echo _e("Betrag MwSt:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_verl_betrag_mwst" readonly value="<?php echo $_asmember_memberships_verl_betrag_mwst;?>"/></p>

  		<p><label><?php echo _e("Betrag netto:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_verl_betrag_netto" readonly value="<?php echo $_asmember_memberships_verl_betrag_netto;?>"/></p>
  	  	
 		<?php  
	}
	
	
	
	
	
	function asmember_memberships_meta()
	{
  		global $post;
  
  		$custom = get_post_custom($post->ID);
  	
  		if(isset($custom["_asmember_memberships_betrag"][0])) $_asmember_memberships_betrag = $custom["_asmember_memberships_betrag"][0];else $_asmember_memberships_betrag=2;
  		if(isset($custom["_asmember_memberships_betrag_mwst"][0])) $_asmember_memberships_betrag_mwst = $custom["_asmember_memberships_betrag_mwst"][0];else $_asmember_memberships_betrag_mwst=0;
  		if(isset($custom["_asmember_memberships_betrag_mwst_satz"][0])) $_asmember_memberships_betrag_mwst_satz = $custom["_asmember_memberships_betrag_mwst_satz"][0];else $_asmember_memberships_betrag_mwst_satz=0;
  		if(isset($custom["_asmember_memberships_betrag_netto"][0])) $_asmember_memberships_betrag_netto = $custom["_asmember_memberships_betrag_netto"][0];else $_asmember_memberships_betrag_netto=0;
  		
  		
  		
		?>
  		<div>
  		
  		<p><label><?php echo _e("Betrag:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_betrag" value="<?php echo $_asmember_memberships_betrag;?>"/></p>
  	
  		<p><label><?php echo _e("Mwst-Satz:","asmember");?></label><br/>
  		<select name="_asmember_memberships_betrag_mwst_satz">
  			<option value="0" <?php if($_asmember_memberships_betrag_mwst_satz==0)echo " selected";?>>0 %</option>
  			<option value="1" <?php if($_asmember_memberships_betrag_mwst_satz==1)echo " selected";?>>1 %</option>
  			<option value="2" <?php if($_asmember_memberships_betrag_mwst_satz==2)echo " selected";?>>2 %</option>
  			<option value="3" <?php if($_asmember_memberships_betrag_mwst_satz==3)echo " selected";?>>3 %</option>
  			<option value="4" <?php if($_asmember_memberships_betrag_mwst_satz==4)echo " selected";?>>4 %</option>
  			<option value="5" <?php if($_asmember_memberships_betrag_mwst_satz==5)echo " selected";?>>5 %</option>
  			<option value="6" <?php if($_asmember_memberships_betrag_mwst_satz==6)echo " selected";?>>6 %</option>
  			<option value="7" <?php if($_asmember_memberships_betrag_mwst_satz==7)echo " selected";?>>7 %</option>
  			<option value="8" <?php if($_asmember_memberships_betrag_mwst_satz==8)echo " selected";?>>8 %</option>
  			<option value="9" <?php if($_asmember_memberships_betrag_mwst_satz==9)echo " selected";?>>9 %</option>
  			<option value="10" <?php if($_asmember_memberships_betrag_mwst_satz==10)echo " selected";?>>10 %</option>
  			<option value="11" <?php if($_asmember_memberships_betrag_mwst_satz==11)echo " selected";?>>11 %</option>
  			<option value="12" <?php if($_asmember_memberships_betrag_mwst_satz==12)echo " selected";?>>12 %</option>
  			<option value="13" <?php if($_asmember_memberships_betrag_mwst_satz==13)echo " selected";?>>13 %</option>
  			<option value="14" <?php if($_asmember_memberships_betrag_mwst_satz==14)echo " selected";?>>14 %</option>
  			<option value="15" <?php if($_asmember_memberships_betrag_mwst_satz==15)echo " selected";?>>15 %</option>
  			<option value="16" <?php if($_asmember_memberships_betrag_mwst_satz==16)echo " selected";?>>16 %</option>
  			<option value="17" <?php if($_asmember_memberships_betrag_mwst_satz==17)echo " selected";?>>17 %</option>
  			<option value="18" <?php if($_asmember_memberships_betrag_mwst_satz==18)echo " selected";?>>18 %</option>
  			<option value="19" <?php if($_asmember_memberships_betrag_mwst_satz==19)echo " selected";?>>19 %</option>
  			<option value="20" <?php if($_asmember_memberships_betrag_mwst_satz==20)echo " selected";?>>20 %</option>
  			
  		</select>
  		</p>
  		
  		<p><label><?php echo _e("Betrag MwSt:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_betrag_mwst" readonly value="<?php echo $_asmember_memberships_betrag_mwst;?>"/></p>

  		<p><label><?php echo _e("Betrag netto:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_betrag_netto" readonly value="<?php echo $_asmember_memberships_betrag_netto;?>"/></p>
  	  	
  		</div>
 		<?php 
	}



	function asmember_memberships_meta_angebot()
	{
  		global $post;
  
  		$custom = get_post_custom($post->ID);
  	
  		if(isset($custom["_asmember_memberships_angebot_betrag"][0])) 			$_asmember_memberships_angebot_betrag = $custom["_asmember_memberships_angebot_betrag"][0];else $_asmember_memberships_angebot_betrag=0;
  		if(isset($custom["_asmember_memberships_angebot_betrag_mwst_satz"][0])) $_asmember_memberships_angebot_betrag_mwst_satz = $custom["_asmember_memberships_angebot_betrag_mwst_satz"][0];else $_asmember_memberships_angebot_betrag_mwst_satz=0;
  		if(isset($custom["_asmember_memberships_angebot_betrag_mwst"][0])) 		$_asmember_memberships_angebot_betrag_mwst = $custom["_asmember_memberships_angebot_betrag_mwst"][0];else $_asmember_memberships_angebot_betrag_mwst=0;
  		if(isset($custom["_asmember_memberships_angebot_betrag_netto"][0])) 	$_asmember_memberships_angebot_betrag_netto = $custom["_asmember_memberships_angebot_betrag_netto"][0];else $_asmember_memberships_angebot_betrag_netto=0;
  		
  		if(isset($custom["_asmember_memberships_angebot_bis"][0]))  $_asmember_memberships_angebot_bis = $custom["_asmember_memberships_angebot_bis"][0];else $_asmember_memberships_angebot_bis=0;
  	
  		if(isset($custom["_asmember_memberships_angebot_bis"][0]))
  		{
  			$_asmember_memberships_angebot_bis = $custom["_asmember_memberships_angebot_bis"][0];
  			if($_asmember_memberships_angebot_bis==0)
				$_asmember_memberships_angebot_bis="";else
  				$_asmember_memberships_angebot_bis=strftime("%Y-%m-%d",$_asmember_memberships_angebot_bis);
		
		}else $_asmember_memberships_angebot_bis="";
		
		
		?>
  		<div>
  		
  		<p><label><?php echo _e("Betrag:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_angebot_betrag" value="<?php echo $_asmember_memberships_angebot_betrag;?>"/></p>
  	
  		<p><label><?php echo _e("MwSt-Satz:","asmember");?></label><br/>
  		<select name="_asmember_memberships_angebot_betrag_mwst_satz">
  			<option value="0" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==0)echo " selected";?>>0 %</option>
  			<option value="1" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==1)echo " selected";?>>1 %</option>
  			<option value="2" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==2)echo " selected";?>>2 %</option>
  			<option value="3" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==3)echo " selected";?>>3 %</option>
  			<option value="4" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==4)echo " selected";?>>4 %</option>
  			<option value="5" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==5)echo " selected";?>>5 %</option>
  			<option value="6" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==6)echo " selected";?>>6 %</option>
  			<option value="7" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==7)echo " selected";?>>7 %</option>
  			<option value="8" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==8)echo " selected";?>>8 %</option>
  			<option value="9" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==9)echo " selected";?>>9 %</option>
  			<option value="10" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==10)echo " selected";?>>10 %</option>
  			<option value="11" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==11)echo " selected";?>>11 %</option>
  			<option value="12" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==12)echo " selected";?>>12 %</option>
  			<option value="13" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==13)echo " selected";?>>13 %</option>
  			<option value="14" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==14)echo " selected";?>>14 %</option>
  			<option value="15" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==15)echo " selected";?>>15 %</option>
  			<option value="16" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==16)echo " selected";?>>16 %</option>
  			<option value="17" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==17)echo " selected";?>>17 %</option>
  			<option value="18" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==18)echo " selected";?>>18 %</option>
  			<option value="19" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==19)echo " selected";?>>19 %</option>
  			<option value="20" <?php if($_asmember_memberships_angebot_betrag_mwst_satz==20)echo " selected";?>>20 %</option>
  			
  		</select></p>
  		
  		
  		<p><label><?php echo _e("Betrag MwSt:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_angebot_betrag_mwst" readonly value="<?php echo $_asmember_memberships_angebot_betrag_mwst;?>"/></p>

  		<p><label><?php echo _e("Betrag netto:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_angebot_betrag_netto" readonly value="<?php echo $_asmember_memberships_angebot_betrag_netto;?>"/></p>
  	
  		<p><label><?php echo _e("Zeitraum:","asmember");?></label><br/>
  		<input type="date" name="_asmember_memberships_angebot_bis" value="<?php echo $_asmember_memberships_angebot_bis;?>"/>
  		</p>  	
  		</div>  	
 		<?php 
	}
	
	
	
	function asmember_memberships_meta_partner()
	{
  		global $post;
  
  		$custom = get_post_custom($post->ID);
  	
  		if(isset($custom["_asmember_memberships_partner_betrag"][0])) 			$_asmember_memberships_partner_betrag = $custom["_asmember_memberships_partner_betrag"][0];else $_asmember_memberships_partner_betrag=0;
  		if(isset($custom["_asmember_memberships_partner_betrag_mwst_satz"][0])) $_asmember_memberships_partner_betrag_mwst_satz = $custom["_asmember_memberships_partner_betrag_mwst_satz"][0];else $_asmember_memberships_partner_betrag_mwst_satz=0;
  		if(isset($custom["_asmember_memberships_partner_betrag_mwst"][0])) 		$_asmember_memberships_partner_betrag_mwst = $custom["_asmember_memberships_partner_betrag_mwst"][0];else $_asmember_memberships_partner_betrag_mwst=0;
  		if(isset($custom["_asmember_memberships_partner_betrag_netto"][0])) 	$_asmember_memberships_partner_betrag_netto = $custom["_asmember_memberships_partner_betrag_netto"][0];else $_asmember_memberships_partner_betrag_netto=0;

		if(isset($custom["_asmember_memberships_partner_event_id"][0])) 			$_asmember_memberships_partner_event_id = $custom["_asmember_memberships_partner_event_id"][0];else $_asmember_memberships_partner_event_id="";
		if(isset($custom["_asmember_memberships_partner_pid"][0])) 			$_asmember_memberships_partner_pid = $custom["_asmember_memberships_partner_pid"][0];else $_asmember_memberships_partner_pid="";
		if(isset($custom["_asmember_memberships_partner_tracking_code"][0])) 			$_asmember_memberships_partner_tracking_code = $custom["_asmember_memberships_partner_tracking_code"][0];else $_asmember_memberships_partner_tracking_code="";
		  		
  		?>
  		<div>
  		
  		<p><label><?php echo _e("Betrag:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_partner_betrag" value="<?php echo $_asmember_memberships_partner_betrag;?>"/></p>
  	
  		<p><label><?php echo _e("MwSt-Satz:","asmember");?></label><br/>
  		<select name="_asmember_memberships_partner_betrag_mwst_satz">
  			<option value="0" <?php if($_asmember_memberships_partner_betrag_mwst_satz==0)echo " selected";?>>0 %</option>
  			<option value="1" <?php if($_asmember_memberships_partner_betrag_mwst_satz==1)echo " selected";?>>1 %</option>
  			<option value="2" <?php if($_asmember_memberships_partner_betrag_mwst_satz==2)echo " selected";?>>2 %</option>
  			<option value="3" <?php if($_asmember_memberships_partner_betrag_mwst_satz==3)echo " selected";?>>3 %</option>
  			<option value="4" <?php if($_asmember_memberships_partner_betrag_mwst_satz==4)echo " selected";?>>4 %</option>
  			<option value="5" <?php if($_asmember_memberships_partner_betrag_mwst_satz==5)echo " selected";?>>5 %</option>
  			<option value="6" <?php if($_asmember_memberships_partner_betrag_mwst_satz==6)echo " selected";?>>6 %</option>
  			<option value="7" <?php if($_asmember_memberships_partner_betrag_mwst_satz==7)echo " selected";?>>7 %</option>
  			<option value="8" <?php if($_asmember_memberships_partner_betrag_mwst_satz==8)echo " selected";?>>8 %</option>
  			<option value="9" <?php if($_asmember_memberships_partner_betrag_mwst_satz==9)echo " selected";?>>9 %</option>
  			<option value="10" <?php if($_asmember_memberships_partner_betrag_mwst_satz==10)echo " selected";?>>10 %</option>
  			<option value="11" <?php if($_asmember_memberships_partner_betrag_mwst_satz==11)echo " selected";?>>11 %</option>
  			<option value="12" <?php if($_asmember_memberships_partner_betrag_mwst_satz==12)echo " selected";?>>12 %</option>
  			<option value="13" <?php if($_asmember_memberships_partner_betrag_mwst_satz==13)echo " selected";?>>13 %</option>
  			<option value="14" <?php if($_asmember_memberships_partner_betrag_mwst_satz==14)echo " selected";?>>14 %</option>
  			<option value="15" <?php if($_asmember_memberships_partner_betrag_mwst_satz==15)echo " selected";?>>15 %</option>
  			<option value="16" <?php if($_asmember_memberships_partner_betrag_mwst_satz==16)echo " selected";?>>16 %</option>
  			<option value="17" <?php if($_asmember_memberships_partner_betrag_mwst_satz==17)echo " selected";?>>17 %</option>
  			<option value="18" <?php if($_asmember_memberships_partner_betrag_mwst_satz==18)echo " selected";?>>18 %</option>
  			<option value="19" <?php if($_asmember_memberships_partner_betrag_mwst_satz==19)echo " selected";?>>19 %</option>
  			<option value="20" <?php if($_asmember_memberships_partner_betrag_mwst_satz==20)echo " selected";?>>20 %</option>  			
  		</select></p>
  		
  		
  		<p><label><?php echo _e("Betrag MwSt:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_partner_betrag_mwst" readonly value="<?php echo $_asmember_memberships_partner_betrag_mwst;?>"/></p>

  		<p><label><?php echo _e("Betrag netto:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_partner_betrag_netto" readonly value="<?php echo $_asmember_memberships_partner_betrag_netto;?>"/></p>
  	
  		<p><label><?php echo _e("Event-Id:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_partner_event_id" value="<?php echo $_asmember_memberships_partner_event_id;?>"/></p>
  	
  		<p><label><?php echo _e("Programm-Id:","asmember");?></label><br/>
  		<input type="text" name="_asmember_memberships_partner_pid" value="<?php echo $_asmember_memberships_partner_pid;?>"/></p>
  	
  	
  		<p><label><?php echo _e("Tracking-Code:","asmember");?></label><br/>
  		<textarea name="_asmember_memberships_partner_tracking_code" cols="140" rows="5"><?php echo $_asmember_memberships_partner_tracking_code;?></textarea>
  		</p>
  		</div>
 		<?php 
	}
	
	
	
	function asmember_memberships_save_details($post_id)
	{
  		$post_type = get_post_type($post_id);
		
		if($post_type=="asmember_memberships")
		{
  			if(isset($_POST["_asmember_memberships_period"]))$asmember_memberships_period=$_POST["_asmember_memberships_period"];else $asmember_memberships_period=0;
  			if(isset($_POST["_asmember_memberships_enabled"]))$asmember_memberships_enabled=$_POST["_asmember_memberships_enabled"];else $asmember_memberships_enabled=0;
  			
  			
  			if(isset($_POST["_asmember_memberships_betrag"]))$asmember_memberships_betrag=$_POST["_asmember_memberships_betrag"];else $asmember_memberships_betrag=0;
  			$asmember_memberships_betrag=str_replace(",",".",$asmember_memberships_betrag);	
			if(isset($_POST["_asmember_memberships_betrag_mwst_satz"]))$asmember_memberships_betrag_mwst_satz=$_POST["_asmember_memberships_betrag_mwst_satz"];else $asmember_memberships_betrag_mwst_satz=0;

  			if(isset($_POST["_asmember_memberships_angebot_betrag"]))$asmember_memberships_angebot_betrag=$_POST["_asmember_memberships_angebot_betrag"];else $asmember_memberships_angebot_betrag=0;
  			$asmember_memberships_angebot_betrag=str_replace(",",".",$asmember_memberships_angebot_betrag);	
			if(isset($_POST["_asmember_memberships_angebot_betrag_mwst_satz"]))$asmember_memberships_angebot_betrag_mwst_satz=$_POST["_asmember_memberships_angebot_betrag_mwst_satz"];else $asmember_memberships_angebot_betrag_mwst_satz=0;

			if(isset($_POST["_asmember_memberships_partner_betrag"]))$asmember_memberships_partner_betrag=$_POST["_asmember_memberships_partner_betrag"];else $asmember_memberships_partner_betrag=0;
			$asmember_memberships_partner_betrag=str_replace(",",".",$asmember_memberships_partner_betrag);	
			
			if(isset($_POST["_asmember_memberships_partner_betrag_mwst_satz"]))$asmember_memberships_partner_betrag_mwst_satz=$_POST["_asmember_memberships_partner_betrag_mwst_satz"];else $asmember_memberships_partner_betrag_mwst_satz=0;

			$asmember_memberships_betrag_netto=$asmember_memberships_betrag/($asmember_memberships_betrag_mwst_satz+100)*100;
			$asmember_memberships_betrag_mwst=$asmember_memberships_betrag-$asmember_memberships_betrag_netto;
			
			$asmember_memberships_angebot_betrag_netto=$asmember_memberships_angebot_betrag/($asmember_memberships_angebot_betrag_mwst_satz+100)*100;
			$asmember_memberships_angebot_betrag_mwst=$asmember_memberships_angebot_betrag-$asmember_memberships_angebot_betrag_netto;
			
			$asmember_memberships_partner_betrag_netto=$asmember_memberships_partner_betrag/($asmember_memberships_partner_betrag_mwst_satz+100)*100;
			$asmember_memberships_partner_betrag_mwst=$asmember_memberships_partner_betrag-$asmember_memberships_partner_betrag_netto;
			
			if(isset($_POST["_asmember_memberships_renew"]))		$asmember_memberships_renew=	$_POST["_asmember_memberships_renew"];else $asmember_memberships_renew=0;
			
	  		if(isset($_POST["_asmember_memberships_renew_von"]))	$asmember_memberships_renew_von=	$_POST["_asmember_memberships_renew_von"];else $asmember_memberships_renew_von=1;
  			if(isset($_POST["_asmember_memberships_renew_bis"]))	$asmember_memberships_renew_bis=	$_POST["_asmember_memberships_renew_bis"];else $asmember_memberships_renew_bis=1;
  		
			if(isset($_POST["_asmember_memberships_verl_betrag"][0]))			$asmember_memberships_verl_betrag=	$_POST["_asmember_memberships_verl_betrag"];else $asmember_memberships_verl_betrag=0;
			$asmember_memberships_verl_betrag=str_replace(",",".",$asmember_memberships_verl_betrag);	

			if(isset($_POST["_asmember_memberships_verl_betrag_mwst_satz"][0]))	$asmember_memberships_verl_betrag_mwst_satz=	$_POST["_asmember_memberships_verl_betrag_mwst_satz"];else $asmember_memberships_verl_betrag_mwst_satz=19;
			
			$asmember_memberships_verl_betrag_netto=$asmember_memberships_verl_betrag/($asmember_memberships_verl_betrag_mwst_satz+100)*100;
			$asmember_memberships_verl_betrag_mwst=$asmember_memberships_verl_betrag-$asmember_memberships_verl_betrag_netto;
				
  		  		
  		  		
  		  		
			if(isset($_POST["_asmember_memberships_partner_event_id"]))$asmember_memberships_partner_event_id=$_POST["_asmember_memberships_partner_event_id"];else $asmember_memberships_partner_event_id="";
			if(isset($_POST["_asmember_memberships_partner_pid"]))$asmember_memberships_partner_pid=$_POST["_asmember_memberships_partner_pid"];else $asmember_memberships_partner_pid="";
			if(isset($_POST["_asmember_memberships_partner_tracking_code"]))$asmember_memberships_partner_tracking_code=$_POST["_asmember_memberships_partner_tracking_code"];else $asmember_memberships_partner_tracking_code="";
			
			update_post_meta($post_id, "_asmember_memberships_verl_betrag", $asmember_memberships_verl_betrag);
  			update_post_meta($post_id, "_asmember_memberships_verl_betrag_mwst_satz", $asmember_memberships_verl_betrag_mwst_satz);  			
  			update_post_meta($post_id, "_asmember_memberships_verl_betrag_mwst", $asmember_memberships_verl_betrag_mwst);
  			update_post_meta($post_id, "_asmember_memberships_verl_betrag_netto", $asmember_memberships_verl_betrag_netto);
						
  			update_post_meta($post_id, "_asmember_memberships_betrag", $asmember_memberships_betrag);
  			update_post_meta($post_id, "_asmember_memberships_betrag_mwst_satz", $asmember_memberships_betrag_mwst_satz);
  			
  			update_post_meta($post_id, "_asmember_memberships_betrag_mwst", $asmember_memberships_betrag_mwst);
  			update_post_meta($post_id, "_asmember_memberships_betrag_netto", $asmember_memberships_betrag_netto);
  			update_post_meta($post_id, "_asmember_memberships_period", $asmember_memberships_period);
  			update_post_meta($post_id, "_asmember_memberships_enabled", $asmember_memberships_enabled);
  			update_post_meta($post_id, "_asmember_memberships_renew", $asmember_memberships_renew);
  			update_post_meta($post_id, "_asmember_memberships_renew_von", $asmember_memberships_renew_von);
  			update_post_meta($post_id, "_asmember_memberships_renew_bis", $asmember_memberships_renew_bis);
  			
  			update_post_meta($post_id, "_asmember_memberships_angebot_betrag", $asmember_memberships_angebot_betrag);
  			update_post_meta($post_id, "_asmember_memberships_angebot_betrag_mwst_satz", $asmember_memberships_angebot_betrag_mwst_satz);
  			update_post_meta($post_id, "_asmember_memberships_angebot_betrag_mwst", $asmember_memberships_angebot_betrag_mwst);
  			update_post_meta($post_id, "_asmember_memberships_angebot_betrag_netto", $asmember_memberships_angebot_betrag_netto);
  			
  			update_post_meta($post_id, "_asmember_memberships_partner_betrag", $asmember_memberships_partner_betrag);
  			update_post_meta($post_id, "_asmember_memberships_partner_betrag_mwst_satz", $asmember_memberships_partner_betrag_mwst_satz);
  			update_post_meta($post_id, "_asmember_memberships_partner_betrag_mwst", $asmember_memberships_partner_betrag_mwst);
  			update_post_meta($post_id, "_asmember_memberships_partner_betrag_netto", $asmember_memberships_partner_betrag_netto);
  			
  			update_post_meta($post_id, "_asmember_memberships_partner_event_id", $asmember_memberships_partner_event_id);
  			update_post_meta($post_id, "_asmember_memberships_partner_pid", $asmember_memberships_partner_pid);
  			update_post_meta($post_id, "_asmember_memberships_partner_tracking_code", $asmember_memberships_partner_tracking_code);
  			
  			
  			
  			if(isset($_POST["_asmember_memberships_angebot_bis"]))
  			{				
  				if($_POST["_asmember_memberships_angebot_bis"]=="")
  				{
					update_post_meta($post_id,"_asmember_memberships_angebot_bis",0);
				}else
				{		
					$date = DateTime::createFromFormat('Y-m-j H:i', $_POST["_asmember_memberships_angebot_bis"]." 23:59");
  					if($date)update_post_meta($post_id,"_asmember_memberships_angebot_bis",$date->getTimestamp());
				}	
			}	
			
			if(isset($_POST["_asmember_memberships_anmeldung_von"]))
  			{				
  				if($_POST["_asmember_memberships_anmeldung_von"]=="")
  				{
					update_post_meta($post_id,"_asmember_memberships_anmeldung_von",0);
				}else
				{		
					$date = DateTime::createFromFormat('Y-m-j H:i', $_POST["_asmember_memberships_anmeldung_von"]." 00:00");
  					if($date)update_post_meta($post_id,"_asmember_memberships_anmeldung_von",$date->getTimestamp());
				}	
			}	
			
			if(isset($_POST["_asmember_memberships_anmeldung_bis"]))
  			{				
  				if($_POST["_asmember_memberships_anmeldung_bis"]=="")
  				{
					update_post_meta($post_id,"_asmember_memberships_anmeldung_bis",0);
				}else
				{					
  					$date = DateTime::createFromFormat('Y-m-j H:i', $_POST["_asmember_memberships_anmeldung_bis"]." 23:59");
  					if($date)update_post_meta($post_id,"_asmember_memberships_anmeldung_bis",$date->getTimestamp());
				}	
			}	
  		}		  
	}
}




$asmember_memberships_obj = new asmember_memberships();		

