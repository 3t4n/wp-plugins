<?php
      global $wpdb;
      if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['addfee']) ) 
        {  
            $address=sanitize_text_field($_POST['address']);
             $nightsr=sanitize_text_field($_POST['nightsr']);
             $nightsr=filter_var($nightsr, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $weeksr=sanitize_text_field($_POST['weeksr']);
             $weeksr=filter_var($weeksr, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $monsr=sanitize_text_field($_POST['monsr']);
             $monsr=filter_var($monsr, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );            
             $dates1=sanitize_text_field($_POST['dates1']);        
             $datee1=sanitize_text_field($_POST['datee1']);             
             $nights1=sanitize_text_field($_POST['nights1']);
             $nights1=filter_var($nights1, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $weeks1=sanitize_text_field($_POST['weeks1']);
             $weeks1=filter_var($weeks1, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $mons1=sanitize_text_field($_POST['mons1']);
             $mons1=filter_var($mons1, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );                          
             $dates2=sanitize_text_field($_POST['dates2']);
             $datee2=sanitize_text_field($_POST['datee2']);
             $nights2=sanitize_text_field($_POST['nights2']);
             $nights2=filter_var($nights2, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $weeks2=sanitize_text_field($_POST['weeks2']);
             $weeks2=filter_var($weeks2, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $mons2=sanitize_text_field($_POST['mons2']);
             $mons2=filter_var($mons2, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );    
             $dates3=sanitize_text_field($_POST['dates3']);
             $datee3=sanitize_text_field($_POST['datee3']);
             $nights3=sanitize_text_field($_POST['nights3']);
             $nights3=filter_var($nights3, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $weeks3=sanitize_text_field($_POST['weeks3']);
             $weeks3=filter_var($weeks3, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $mons3=sanitize_text_field($_POST['mons3']);
             $mons3=filter_var($mons3, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );   
                          
             $saltax=sanitize_text_field($_POST['saltax']);
             $saltax=filter_var($saltax, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );             
             
             $toutax=sanitize_text_field($_POST['toutax']);
             $toutax=filter_var($toutax, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );             
             $othtax=sanitize_text_field($_POST['othtax']);
             $othtax=filter_var($othtax, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($othtax==""){$othtax=0;}
             $poolheatd=sanitize_text_field($_POST['poolheatd']);
             $poolheatd=filter_var($poolheatd, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             //if($poolheatd==""){$poolheatd=0;}
             $poolheatw=sanitize_text_field($_POST['poolheatw']);
             $poolheatw=filter_var($poolheatw, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );             
             //if($poolheatw==""){$poolheatw=0;}
             $poolheatm=sanitize_text_field($_POST['poolheatm']);
             $poolheatm=filter_var($poolheatm, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );               
             //if($poolheatm==""){$poolheatm=0;}
             $parkfee=sanitize_text_field($_POST['parkfee']);
             $parkfee=filter_var($parkfee, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $park=sanitize_text_field($_POST['park']);
             if($parkfee==""){$parkfee=0;}
             
             $otherfee=sanitize_text_field($_POST['otherfee']);
             $otherfee=filter_var($otherfee, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($otherfee==""){$otherfee=0;}
             $othr=sanitize_text_field($_POST['othr']);             
             $wififee=sanitize_text_field($_POST['wififee']);
             $wififee=filter_var($wififee, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($wififee==""){$wififee=0;}
             $wef=sanitize_text_field($_POST['we']);             
             $cleanfee=sanitize_text_field($_POST['clnfee']);
             $cleanfee=filter_var($cleanfee, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($cleanfee==""){$cleanfee=0;}
             $clndays=sanitize_text_field($_POST['clndays']);
             $clndays=filter_var($clndays, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );             
             //if($clndays==""){$clndays=0;}
             $discount=sanitize_text_field($_POST['discount']);
             $discount=filter_var($discount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($discount==""){$discount=0;}
             $disper=sanitize_text_field($_POST['dis']);             
             $dampro=sanitize_text_field($_POST['dmpr']);
             $dampro=filter_var($dampro, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($dampro==""){$dampro=0;}             
             $curr=sanitize_text_field($_POST['currency']);
            
            $table_name = $wpdb->prefix."ppcdelocation";
            if (isset( $_POST['fee_added'] ) && wp_verify_nonce($_POST['fee_added'],'addfee') )
            {
                 $wpdb->query($wpdb->prepare("INSERT INTO $table_name(address,nightr,weekr,monthr,start1,end1,night1,week1,month1,start2,end2,night2,week2,month2,start3,end3,night3,week3,month3,saltax,toutax,othertax,poolheatd,poolheatw,poolheatm,parkf,parkrate,othf,othrate,wifif,wifirate,clnf,clndys,discount,disrate,damgp,curr)
            VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",array($address,$nightsr,$weeksr,$monsr,$dates1,$datee1,$nights1,$weeks1,$mons1,$dates2,$datee2,$nights2,$weeks2,$mons2,$dates3,$datee3,$nights3,$weeks3,$mons3,$saltax,$toutax,$othtax,$poolheatd,$poolheatw,$poolheatm,$parkfee,$park,$otherfee,$othr,$wififee,$wef,$cleanfee,$clndays,$discount,$disper,$dampro,$curr)));
            }     
           
        }
        if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['updatefee']) ) 
        {  
             $id=sanitize_text_field($_POST['addressrecord']);
             $nightsr=sanitize_text_field($_POST['nightsr']);
             $nightsr=filter_var($nightsr, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $weeksr=sanitize_text_field($_POST['weeksr']);
             $weeksr=filter_var($weeksr, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $monsr=sanitize_text_field($_POST['monsr']);
             $monsr=filter_var($monsr, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
            
             $dates1=sanitize_text_field($_POST['dates1']);        
             $datee1=sanitize_text_field($_POST['datee1']);             
             $nights1=sanitize_text_field($_POST['nights1']);
             $nights1=filter_var($nights1, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $weeks1=sanitize_text_field($_POST['weeks1']);
             $weeks1=filter_var($weeks1, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $mons1=sanitize_text_field($_POST['mons1']);
             $mons1=filter_var($mons1, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );                          
             $dates2=sanitize_text_field($_POST['dates2']);
             $datee2=sanitize_text_field($_POST['datee2']);
             $nights2=sanitize_text_field($_POST['nights2']);
             $nights2=filter_var($nights2, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $weeks2=sanitize_text_field($_POST['weeks2']);
             $weeks2=filter_var($weeks2, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $mons2=sanitize_text_field($_POST['mons2']);
             $mons2=filter_var($mons2, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );    
             $dates3=sanitize_text_field($_POST['dates3']);
             $datee3=sanitize_text_field($_POST['datee3']);
             $nights3=sanitize_text_field($_POST['nights3']);
             $nights3=filter_var($nights3, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $weeks3=sanitize_text_field($_POST['weeks3']);
             $weeks3=filter_var($weeks3, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $mons3=sanitize_text_field($_POST['mons3']);
             $mons3=filter_var($mons3, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );   
                          
             $saltax=sanitize_text_field($_POST['saltax']);
             $saltax=filter_var($saltax, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );             
             
             $toutax=sanitize_text_field($_POST['toutax']);
             $toutax=filter_var($toutax, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );             
             $othtax=sanitize_text_field($_POST['othtax']);
             $othtax=filter_var($othtax, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($othtax==""){$othtax=0;}
             
             $poolheatd=sanitize_text_field($_POST['poolheatd']);
             $poolheatd=filter_var($poolheatd, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             //if($poolheatd==""){$poolheatd=0;}
             $poolheatw=sanitize_text_field($_POST['poolheatw']);
             $poolheatw=filter_var($poolheatw, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );             
             //if($poolheatw==""){$poolheatw=0;}
             $poolheatm=sanitize_text_field($_POST['poolheatm']);
             $poolheatm=filter_var($poolheatm, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );               
             //if($poolheatm==""){$poolheatm=0;}
             $parkfee=sanitize_text_field($_POST['parkfee']);
             $parkfee=filter_var($parkfee, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $park=sanitize_text_field($_POST['park']);
             if($parkfee==""){$parkfee=0;}
             
             $otherfee=sanitize_text_field($_POST['otherfee']);
             $otherfee=filter_var($otherfee, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($otherfee==""){$otherfee=0;}
             $othr=sanitize_text_field($_POST['othr']);             
             $wififee=sanitize_text_field($_POST['wififee']);
             $wififee=filter_var($wififee, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             $wef=sanitize_text_field($_POST['we']);
             if($wififee==""){$wififee=0;}         
             $cleanfee=sanitize_text_field($_POST['clnfee']);            
             $cleanfee=filter_var($cleanfee, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
              if($cleanfee==""){$cleanfee=0;}
             $clndays=sanitize_text_field($_POST['clndays']);             
             $clndays=filter_var($clndays, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             //if($clndays==""){$clndays=0;}            
             
             $discount=sanitize_text_field($_POST['discount']);
             $discount=filter_var($discount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($discount==""){$discount=0;}
             $disper=sanitize_text_field($_POST['dis']);             
             $dampro=sanitize_text_field($_POST['dmpr']);
             $dampro=filter_var($dampro, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
             if($dampro==""){$dampro=0;}            
             $curr=sanitize_text_field($_POST['currency']);            
            $table_name = $wpdb->prefix."ppcdelocation"; 
        
            if (isset( $_POST['fee_update'] ) && wp_verify_nonce($_POST['fee_update'],'updatefee') )
            {
                $wpdb->query($wpdb->prepare("UPDATE $table_name SET nightr=%s,weekr=%s,monthr=%s,start1=%s,end1=%s,night1=%s,week1=%s,month1=%s,start2=%s,end2=%s,night2=%s,week2=%s,month2=%s,start3=%s,end3=%s,night3=%s,week3=%s,month3=%s,saltax=%s,toutax=%s,othertax=%s,poolheatd=%s,poolheatw=%s,poolheatm=%s,parkf=%s,parkrate=%s,othf=%s,othrate=%s,wifif=%s,wifirate=%s,clnf=%s,clndys=%s,discount=%s,disrate=%s,damgp=%s,curr=%s WHERE lc_id=%d",
            $nightsr,$weeksr,$monsr,$dates1,$datee1,$nights1,$weeks1,$mons1,$dates2,$datee2,$nights2,$weeks2,$mons2,$dates3,$datee3,$nights3,$weeks3,$mons3,$saltax,$toutax,$othtax,$poolheatd,$poolheatw,$poolheatm,$parkfee,$park,$otherfee,$othr,$wififee,$wef,$cleanfee,$clndays,$discount,$disper,$dampro,$curr,$id));
            }  
        }
      
    class ppcde_plugin_admin
    {
         /** verbingo_plugin father class */
            private $ppcde_settings_key = 'ppcde_setting';
            private $ppcde_options_key = 'ppcde_options';
            private $addfee_settings_key = 'ppcde_fee';            
            private $plugin_settings_tabs = array();
            private $localleft = 'left';
                
            function __construct() 
            {
                add_action( 'init', array( &$this, 'ppcde_scripts_admin'));
                add_action( 'init', array( &$this, 'load_ppcde_settings'));
                add_action( 'admin_init', array( &$this, 'register_ppcde_fee_settings' ));
                add_action( 'admin_init', array( &$this, 'register_addfee_settings' ));                
                add_action( 'admin_init', array( &$this, 'regestered_locations' ));
                add_action( 'admin_menu', array( &$this, 'add_admin_menus' ));
            } 
            function regestered_locations()
            {
                global $wpdb;
                $table_name = $wpdb->prefix."ppcdelocation";
                $locations = $wpdb->get_results("SELECT * FROM $table_name",ARRAY_A);
                return $locations;
            }
            /** UTILITY FUNCTIONS * */
            private function sections($head, $text = '') {
                echo '<h2>' . $head . '</h2>';
                echo '<div class="col-wrap">';
                if ($text) echo '<p>' . $text . '</p>';
            }
        
            private function sectiontop() {
                echo '</div>';
            }
                
             private function header($head) 
             {
                 echo '<h3>'.$head.' </h3>';
             }
            function ppcde_scripts_admin()
            {
                //AIzaSyC5dYjwBFT9oWmNKmyq7Sz_wxq8UtjVpMg
                $google_map_api = 'https://maps.google.com/maps/api/js?sensor=true&key=AIzaSyC5dYjwBFT9oWmNKmyq7Sz_wxq8UtjVpMg&libraries=places&language=en-AU';
                wp_enqueue_script('google-places', $google_map_api);
                wp_register_style('ppcde_style', plugins_url('css/ppcde_style.css',__FILE__));
                wp_enqueue_style('ppcde_style');
                wp_register_style('ppcde_bootstrap', plugins_url('css/bootstrap.min.css',__FILE__));
                wp_enqueue_style('ppcde_bootstrap');
                wp_register_script('ppcde_script', plugins_url('js/ppcde_script.js', __FILE__ ),array('jquery'));
                wp_enqueue_script('ppcde_script');
                wp_enqueue_script('jquery-ui-datepicker');
                wp_enqueue_style('jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
                wp_register_script('ppcde_bootstrapjsfile', plugins_url('js/bootstrap.min.js', __FILE__ ));
                wp_enqueue_script('ppcde_bootstrapjsfile');
            }            
            // Settings
            function load_ppcde_settings() 
            {
                $this->general_settings = (array) get_option( $this->ppcde_settings_key );          
                // Merge with defaults
                $this->general_settings = array_merge( array(
                    'general_option' => 'General value'
                ), $this->general_settings ); 
           }  
            function register_ppcde_fee_settings() 
            {
                $this->plugin_settings_tabs[$this->ppcde_settings_key] = 'Update Property';
            
                register_setting( $this->ppcde_settings_key, $this->ppcde_settings_key );
                add_settings_section( 'section_fee', '', array( &$this, 'section_ppcde_fee_desc' ), $this->ppcde_settings_key );
            }            
            function section_ppcde_fee_desc() 
            { 
                $pplocations=$this->regestered_locations();
                $select='<select id="addressrecord" name="addressrecord" onchange="GetAddressData()" style="margin-left:2%;width:40%;margin-top:5px;"><option value="select">Select Property</option>';
                foreach($pplocations as $address)
                {
                    $select.='<option value="'.$address['lc_id'].'">'.$address['address'].'</option>';
                }
                $select.='</select>';
                $this->sections(__('Update Property Info','ppcode'));
        echo '<form name="updatefee">'
                .wp_nonce_field("updatefee","fee_update").
               '<div class="row"><div class="col-sm-12" style="background-color:#FAE6F4;height:40px;">                
                <label for="first-name">Property Address:</label>'.$select.'
                </div> 
                <hr>
                </div>
                <div class="row">
                <div class="col-sm-3" style="background-color:lavender;">
                <label for="first-name" style="margin-left:30%;">Rental cost:</label>                
                
                <label for="first-name" style="margin-right:45%">Regular Rates:</label>
                <input type="text" name="nightsr" placeholder="Daily" id="nightsr" style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="weeksr" id="weeksr" placeholder="Weekly"  style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="monsr" id="monsr" placeholder="Monthly" style="width:25%;height:31px;margin-top:9px;">                
                <hr style="margin-top:10px;margin-bottom:14px;">                                
                <label for="first-name" style="float:left;margin-right:42%;">Season One:</label>
                <label for="first-name" style="margin-right:10%;float:left;">From:</label> 
                <input type="text" style="width:68%;" name="dates1" id="dates1" placeholder="mm/dd/yyyy" class="form-control">
                <label for="first-name" style="margin-right:17%;float:left;">To:</label>                
                <input type="text" name="datee1" id="datee1" style="width:68%;" placeholder="mm/dd/yyyy" class="form-control">                 
                <label for="first-name">Rates:</label>
                <input type="text" name="nights1" placeholder="Daily" id="nights1" style="width:22%;height:31px;margin-top:9px;margin-left:16px;">
                <input type="text" name="weeks1" id="weeks1" placeholder="Weekly" style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="mons1" id="mons1" placeholder="Monthly" style="width:25%;height:31px;margin-top:9px;">                
                <hr style="margin-top:10px;margin-bottom:14px;">
                
                <label for="first-name" style="float:left;margin-right:42%;">Season Two:</label>
                <label for="first-name" style="margin-right:10%;float:left;">From:</label>                 
                <input type="text" style="width:68%;" name="dates2" id="dates2" placeholder="mm/dd/yyyy" class="form-control">                
                <label for="first-name" style="margin-right:17%;float: left;">To:</label>
                <input type="text" name="datee2" id="datee2" style="width:68%;" placeholder="mm/dd/yyyy" class="form-control">              
                <label for="first-name">Rates:</label>
                <input type="text" name="nights2" placeholder="Daily" id="nights2" style="width:22%;height:31px;margin-top:9px;margin-left:16px;">
                <input type="text" name="weeks2" id="weeks2" placeholder="Weekly" style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="mons2" id="mons2" placeholder="Monthly" style="width:25%;height:31px;margin-top:9px;">                              
                <hr style="margin-top:10px;margin-bottom:7px;">
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush;">
                
                <label for="first-name" style="float:left;margin-right:40%;margin-top:5%;">Season Third:</label>
                <label for="first-name" style="margin-right:10%;float:left;">From:</label>                 
                <input type="text" style="width:68%;margin-top:5%;" name="dates3" id="dates3" placeholder="mm/dd/yyyy" class="form-control">                
                <label for="first-name" style="margin-right:17%;float:left;">To:</label>
                <input type="text" name="datee3" id="datee3" style="width:68%;" placeholder="mm/dd/yyyy" class="form-control">          
                <label for="first-name">Rates:</label>
                <input type="text" name="nights3" placeholder="Daily" id="nights3" style="width:22%;height:31px;margin-top:9px;margin-left:16px;">
                <input type="text" name="weeks3" id="weeks3" placeholder="Weekly" style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="mons3" id="mons3" placeholder="Monthly" style="width:25%;height:31px;margin-top:9px;">
                <hr style="margin-top:10px;margin-bottom:5px;"> 
                <label for="first-name">Sales tax(%):</label>
                <input id="saltax" name="saltax" type="text" style="width:49%;margin-top:5%;" class="input-block-level" placeholder="%age of Rental Cost"/>
                <hr style="margin-top:12px;margin-bottom:10px;"> 
                <label for="first-name">Tourist tax(%):</label>
                <input id="toutax" name="toutax" type="text" style="width:45%;margin-top:0%;" class="input-block-level" placeholder="% of Rental Cost"/>
                <hr style="margin-top:8px;margin-bottom:8px;">
                <label for="first-name">Other tax(%):</label>
                <input id="othtax" name="othtax" type="text" style="width:47%;margin-top:0%;margin-left:2%;" class="input-block-level" placeholder="% of Rental Cost"/>                                
                <hr style="margin-top:12px;margin-bottom:10px;">
                <label for="first-name">Pool Heat Cost:</label>
                <label class="radio-inline">
                  
                <input type="text" name="poolheatd" id="poolheatd" placeholder="Daily" style="width:25%;height:31px;margin-top:9px;margin-left:-20px;">
                <input type="text" name="poolheatw" id="poolheatw" placeholder="Weekly" style="width:25%;height:31px;margin-top:9px;margin-left:13px;">
                <input type="text" name="poolheatm" id="poolheatm" placeholder="Monthly" style="width:27%;height:31px;margin-top:9px;margin-left:13px;">
                  </label>                              
                <hr>
                </div>
                <div class="col-sm-3" style="background-color:lavender;">
                
                <label for="first-name">Parking fee:</label>
                <input id="parkfee" type="text" name="parkfee" style="width:50%;margin-left:2%;margin-top:5%;" class="input-block-level" />
                <label class="radio-inline">
                  <input type="radio" id="parkfpn" name="park" value="5">Per Night
                </label>
                <label class="radio-inline">
                  <input type="radio" id="parkfps" name="park" value="6">Per Stay
                </label> 
                <hr style="margin-top:10px;margin-bottom:5px;">  
                
                  <label for="first-name">Other fee:</label>
                    <input id="otherfee" name="otherfee" type="text" style="width:50%;margin-top:5%;margin-left:8%;" class="input-block-level" />
                    <label class="radio-inline">
                     <input type="radio" id="othpn" name="othr" value="5">Per Night
                </label>
                <label class="radio-inline">
                  <input type="radio" id="othps" name="othr" value="6">Per Stay
                </label>                
                <hr>
                <label for="first-name">WiFi usage fee:</label>
                <input id="wififee" name="wififee" type="text" style="width:45%;margin-top:0%;" class="input-block-level" />
                <label class="radio-inline">
                  <input type="radio" id="wifipn" name="we" value="5" >Per Night
                </label>
                <label class="radio-inline">
                  <input type="radio" id="wifips" name="we" value="6">Per Stay
                </label> 
                <hr>
                <label for="first-name">Cleaning fee:</label><input id="clnfee" name="clnfee" type="text" style="width:52%;margin-top:0%;margin-left:2%;" class="input-block-level" />
                <b style="float:left;">Cleaning fee is waived for stays longer than</b>                
                    <input id="clndays"  name="clndays" type="text" style="width:24%;float:left;margin-top:-8%;margin-left:34%;" placeholder="days" class="input-block-level" />
                    <hr><hr style="margin-top:23%;"><hr>                                      
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush;">                                    
                <label for="first-name">Discount:</label>
                    <input id="discount" name="discount" type="text" style="width:50%;margin-top:5%;margin-left:8%;" class="input-block-level"/>
                    <label class="radio-inline">
                  <input type="radio" id="dispn" name="dis" value="7" style="">Fixed Amount
                </label>
                <label class="radio-inline" style="margin-left:1px;">
                  <input type="radio" id="disps" name="dis" value="8">% of "Per Night Cost"
                </label>
                <hr>
                <label for="first-name">Damage Protection:</label>
                    <input id="dmpr" name="dmpr" type="text" value="" style="width:34%;margin-top:0%;" class="input-block-level" />                
                    <hr style="margin-top:6%;margin-bottom:5%;">
                <label for="first-name">Currency:</label>
                    <input id="currency" name="currency" type="text" style="width:51%;margin-top:0%;" class="input-block-level" />                
                    <hr style="margin-top:6%;margin-bottom:5%;">  
                <input type="submit" id="updatefee" value="Update" class="button-primary" name="updatefee" style="margin-top:2%;margin-left:35%;width:105px;z-index:2147483647; padding: 0px;"/>
                <hr style="margin-top:9%;margin-bottom:5%;">
                </div>
              </div>
                </form></div>';
                echo '<br>';
        $this->sectiontop();
                $this->sectiontop();
            }
        function register_addfee_settings() 
                {
                $this->plugin_settings_tabs[$this->addfee_settings_key] = 'Add Property';
                register_setting( $this->addfee_settings_key, $this->addfee_settings_key );
                add_settings_section( 'section_addfee', '', array( &$this, 'section_addfee_desc' ), $this->addfee_settings_key );
        }
      function section_addfee_desc()
      {
        $this->sections(__('Add Property Info','ppcode'));
        echo '<form name="addfee" action="#">'
                .wp_nonce_field("addfee","fee_added").
                '<div class="row"><div class="col-sm-12" style="background-color:#FAE6F4;height:40px;">                
                <label for="first-name">Property Address:</label>
                <input type="text" name="address" placeholder="Type Your Property Address Here" id="addressrecord" onclick="getaddress()" style="margin-left:2%;width:40%;margin-top:5px;" />
                  </div> 
                <hr>
                </div>
                <div class="row">
                <div class="col-sm-3" style="background-color:lavender;">
                <label for="first-name" style="margin-left: 30%;">Rental cost:</label>                
                
                <label for="first-name" style="margin-right:45%">Regular Rates:</label>
                <input type="text" name="nightsr" placeholder="Daily" id="nightsr" style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="weeksr" id="weeksr" placeholder="Weekly"  style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="monsr" id="monsr" placeholder="Monthly" style="width:25%;height:31px;margin-top:9px;">                
                <hr style="margin-top:10px;margin-bottom:14px;">                                
                <label for="first-name" style="margin-right:42%;float:left;">Season One:</label>
                <label for="first-name" style="margin-right:10%;float:left;">From:</label> 
                <input type="text" style="width:68%;" name="dates1" id="dates1" placeholder="mm/dd/yyyy" class="form-control">
                <label for="first-name" style="margin-right:17%;float:left;">To:</label>                
                <input type="text" name="datee1" id="datee1" style="width:68%;" placeholder="mm/dd/yyyy" class="form-control">                 
                <label for="first-name">Rates:</label>
                <input type="text" name="nights1" placeholder="Daily" id="nights1" style="width:22%;height:31px;margin-top:9px;margin-left:16px;">
                <input type="text" name="weeks1" id="weeks1" placeholder="Weekly" style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="mons1" id="mons1" placeholder="Monthly" style="width:25%;height:31px;margin-top:9px;">                
                <hr style="margin-top:10px;margin-bottom:14px;">
                
                <label for="first-name" style="margin-right:42%;float:left;">Season Two:</label>
                <label for="first-name" style="margin-right:10%;float:left;">From:</label>                 
                <input type="text" style="width:68%;" name="dates2" id="dates2" placeholder="mm/dd/yyyy" class="form-control">                
                <label for="first-name" style="margin-right:17%;float: left;">To:</label>
                <input type="text" name="datee2" id="datee2" style="width:68%;" placeholder="mm/dd/yyyy" class="form-control">              
                <label for="first-name">Rates:</label>
                <input type="text" name="nights2" placeholder="Daily" id="nights2" style="width:22%;height:31px;margin-top:9px;margin-left:16px;">
                <input type="text" name="weeks2" id="weeks2" placeholder="Weekly" style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="mons2" id="mons2" placeholder="Monthly" style="width:25%;height:31px;margin-top:9px;">                              
                <hr style="margin-top:10px;margin-bottom:7px;">
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush;">
                
                <label for="first-name" style="margin-right:40%;float:left;margin-top:5%;">Season Third:</label>
                <label for="first-name" style="margin-right:10%;float:left;">From:</label>
                <input type="text" style="width:68%;margin-top:5%;" name="dates3" id="dates3" placeholder="mm/dd/yyyy" class="form-control">                
                <label for="first-name" style="margin-right:17%;float:left;">To:</label>
                <input type="text" name="datee3" id="datee3" style="width:68%;" placeholder="mm/dd/yyyy" class="form-control">          
                <label for="first-name">Rates:</label>
                <input type="text" name="nights3" placeholder="Daily" id="nights3" style="width:22%;height:31px;margin-top:9px;margin-left:16px;">
                <input type="text" name="weeks3" id="weeks3" placeholder="Weekly" style="width:22%;height:31px;margin-top:9px;">
                <input type="text" name="mons3" id="mons3" placeholder="Monthly" style="width:25%;height:31px;margin-top:9px;">
                <hr style="margin-top:10px;margin-bottom:5px;"> 
                <label for="first-name">Sales tax(%):</label>
                <input id="saltax" name="saltax" type="text" style="width:53%;margin-top:5%;" class="input-block-level" placeholder="%age of Rental Cost"/>
                <hr style="margin-top:12px;margin-bottom:10px;"> 
                <label for="first-name">Tourist tax(%):</label>
                <input id="toutax" name="toutax" type="text" style="width:48%;margin-top:0%;margin-left:0%;" class="input-block-level" placeholder="%age of Rental Cost"/>
                <hr style="margin-top:8px;margin-bottom:8px;">
                <label for="first-name">Other tax(%):</label>
                <input id="othtax" name="othtax" type="text" style="width:54%;margin-top:0%;margin-left:0%;" class="input-block-level" placeholder="%age of Rental Cost"/>                                
                <hr style="margin-top:12px;margin-bottom:10px;">
                <label for="first-name">Pool Heat Cost:</label>
                <label class="radio-inline">
                  
                <input type="text" name="poolheatd" id="poolheatd" placeholder="Daily" style="width:25%;height:31px;margin-top:9px;margin-left:-20px;">
                <input type="text" name="poolheatw" id="poolheatw" placeholder="Weekly" style="width:25%;height:31px;margin-top:9px;margin-left:13px;">
                <input type="text" name="poolheatm" id="poolheatm" placeholder="Monthly" style="width:27%;height:31px;margin-top:9px;margin-left:13px;">
                  </label>                              
                <hr>
                </div>
                <div class="col-sm-3" style="background-color:lavender;">
                
                <label for="first-name">Parking fee:</label>
                <input id="parkfee" type="text" name="parkfee" style="width:50%;margin-left:2%;margin-top:5%;" class="input-block-level" />
                <label class="radio-inline">
                  <input type="radio" name="park" value="5" checked="checked">Per Night
                </label>
                <label class="radio-inline">
                  <input type="radio" name="park" value="6">Per Stay
                </label> 
                <hr style="margin-top:10px;margin-bottom:5px;">  
                
                  <label for="first-name">Other fee:</label>
                    <input id="otherfee" name="otherfee" type="text" style="width:50%;margin-top:5%;margin-left:8%;" class="input-block-level" />
                    <label class="radio-inline">
                     <input type="radio" name="othr" value="5" checked="checked">Per Night
                </label>
                <label class="radio-inline">
                  <input type="radio" name="othr" value="6">Per Stay
                </label>                
                <hr>
                <label for="first-name">WiFi usage fee:</label>
                <input id="wififee" name="wififee" type="text" style="width:45%;margin-top:0%;" class="input-block-level" />
                <label class="radio-inline">
                  <input type="radio" name="we" value="5" checked="checked">Per Night
                </label>
                <label class="radio-inline">
                  <input type="radio" name="we" value="6">Per Stay
                </label> 
                <hr>
                <label for="first-name">Cleaning fee:</label><input id="clnfee" name="clnfee" type="text" style="width:52%;margin-top:0%;margin-left:2%;" class="input-block-level" />
                <b style="float:left;">Cleaning fee is waived for stays longer than</b>                
                    <input id="clndays"  name="clndays" type="text" style="width:24%;float:left;margin-top:-8%;margin-left:34%;" placeholder="days" class="input-block-level" />
                    <hr><hr style="margin-top:23%;"><hr>                                  
                </div>
                <div class="col-sm-3" style="background-color:lavenderblush;">                                    
                <label for="first-name">Discount:</label>
                    <input id="discount" name="discount" type="text" style="width:50%;margin-top:5%;margin-left:8%;" class="input-block-level"/>
                    <label class="radio-inline">
                  <input type="radio" name="dis" value="7" style="" checked="checked">Fixed Amount
                </label>
                <label class="radio-inline" style="margin-left:1px;">
                  <input type="radio" name="dis" value="8">% of "Per Night Cost"
                </label>
                <hr>
                <label for="first-name">Damage Protection:</label>
                    <input id="dmpr" name="dmpr" type="text" value="" style="width:34%;margin-top:0%;" class="input-block-level" />                
                    <hr style="margin-top:6%;margin-bottom:5%;">
                <label for="first-name">Currency:</label>
                    <input id="currency" name="currency" type="text" value="$" style="width:52%;margin-top:0%;" class="input-block-level" />                
                    <hr style="margin-top:6%;margin-bottom:5%;">  
                <input type="submit" id="feesubmit" value="Save" class="button-primary" name="addfee" style="margin-top:2%;margin-left:35%;width:105px;z-index:2147483647;padding:0px;"/>
                <hr style="margin-top:9%;margin-bottom:5%;">
                </div>
              </div>
                </form></div>';
                echo '<br>';
        $this->sectiontop();
      }  
    // Add Menu Here
    function add_admin_menus() {
    
    add_menu_page('ppcde_dashboard', 'Vacation Rental Cost', 'manage_options', $this->ppcde_options_key, array( &$this, 'plugin_options_page' ),''.plugins_url("img/", __FILE__).'ppcodeimg.png');
    
    }
    
    function plugin_options_page() {
    $tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->ppcde_settings_key; ?>
    <div class="wrap">
        <?php $this->plugin_options_tabs(); ?>
        <form method="post" action="options.php" onsubmit="return validatefield()">
            <?php wp_nonce_field( 'update-options' ); ?>
            <?php settings_fields( $tab ); ?>
            <?php do_settings_sections( $tab ); ?>
            <?php //submit_button(); ?>
        </form>
    </div>
    <?php
        }
        
    function plugin_options_tabs() {
    $current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->ppcde_settings_key;

    $scren=screen_icon();
    echo '<h2 class="nav-tab-wrapper">';
    foreach ( $this->plugin_settings_tabs as $tab_key => $tab_caption ) {
        $active = $current_tab == $tab_key ? 'nav-tab-active' : '';
        echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->ppcde_options_key . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';
    }
    echo '</h2>';
}
        
}
add_action( 'plugins_loaded', create_function( '', '$ppcde_admin_side = new ppcde_plugin_admin;' ) );
?>