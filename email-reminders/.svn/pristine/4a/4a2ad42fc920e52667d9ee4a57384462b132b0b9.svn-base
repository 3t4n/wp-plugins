<?php /**
 * @version 1.0
 * @package Email Reminders 
 * @category Admin Panel - Dashboard functions
 * @author wpdevelop
 *
 * @web-site https://oplugins.com/
 * @email info@oplugins.com 
 * 
 * @modified 2020-05-03
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit, if accessed directly


////////////////////////////////////////////////////////////////////////////////
// D a s h b o a r d      W i d g e t
////////////////////////////////////////////////////////////////////////////////
    

/** Get Info for Dashboard */
function oper_get_dashboard_info() {
    
    ob_start();  
    
    oper_dashboard_widget_show();
  
    return ob_get_clean();  
}


/** Show item Dashboard Widget content */
function oper_dashboard_widget_show() {    
    
    oper_dashboard_widget_css();
                
   ?>        
   <div id="oper_dashboard_widget_container" >
	<?php 
              
       oper_dashboard_section_version(); 
       
       oper_dashboard_section_support();        
       
	?>         
   </div>
   <div style="clear:both;"></div>   
   <?php 
}
    


/** CSS for Dashboard Widget */
function oper_dashboard_widget_css() {
    
    ?><style type="text/css">
        #oper_dashboard_widget_container {
            width:100%;
        }
        #oper_dashboard_widget_container .oper_dashboard_section {
            float:left;
            margin:0px;
            padding:0px;
            width:100%;
        }
        #oper_dashboard_widget_container .oper_dashboard_section h4 {            
            font-size: 14px;
            font-weight: 600;
            margin: 5px 0 15px;
        }     
        #bk_upgrade_section p {
            font-size: 13px;
            line-height: 1.5em;
            margin: 15px 0 0;
            padding: 0;
        }
        #dashboard-widgets-wrap #oper_dashboard_widget_container .oper_dashboard_section {
           width:49%;
        }
        #dashboard-widgets-wrap #oper_dashboard_widget_container .bk_right {
            float:right
        }
        #dashboard-widgets-wrap #oper_dashboard_widget_container .border_orrange, 
        #oper_dashboard_widget_container .border_orrange {
            background: #fffaf1 none repeat scroll 0 0;
            border-left: 3px solid #eeab26;
            clear: both;
            margin: 5px 5px 20px;
            padding: 10px 0;
            width: 99%;
        }
        #oper_dashboard_widget_container .bk_header {
            color: #555555;
            font-size: 13px;
            font-weight: 600;
            line-height: 1em;
        }
        #oper_dashboard_widget_container .bk_table {
            background:transparent;
            border-bottom:none;
            border-top:1px solid #ECECEC;
            margin:6px 0 10px 6px;
            padding:2px 10px;
            width:95%;
            -border-radius:4px;
            -moz-border-radius:4px;
            -webkit-border-radius:4px;
            -moz-box-shadow:0 0 2px #C5C3C3;
            -webkit-box-shadow:0 0 2px #C5C3C3;
            -box-shadow:0 0 2px #C5C3C3;
        }
        #oper_dashboard_widget_container .bk_table td{
            border-bottom:1px solid #DDDDDD;
            line-height:19px;
            padding:4px 0px 4px 10px;
            font-size:13px;
        }
		#oper_dashboard_widget_container .bk_table tr:last-child td {
			border:none;
		}
        #oper_dashboard_widget_container .bk_table tr td.first{
           text-align:center;
           padding:4px 0px;
        }
        #oper_dashboard_widget_container .bk_table tr td a {
            text-decoration: none;
        }
        #oper_dashboard_widget_container .bk_table tr td a span{
            font-size:18px;
            font-family: Georgia,"Times New Roman","Bitstream Charter",Times,serif;
        }
        #oper_dashboard_widget_container .bk_table td.bk_spec_font a{
            font-family: Georgia,"Times New Roman","Bitstream Charter",Times,serif;
            font-size:14px;
        }
        #oper_dashboard_widget_container .bk_table td.bk_spec_font {
            font-family: Georgia,"Times New Roman","Bitstream Charter",Times,serif;
            font-size:13px;
        }
        #oper_dashboard_widget_container .bk_table td.pending a{
            color:#E66F00;
        }
        #oper_dashboard_widget_container .bk_table td.new-items a{
            color:red;
        }
        #oper_dashboard_widget_container .bk_table td.actual-items a{
            color:green;
        }
        #bk_errror_loading {
             text-align: center;
             font-style: italic;
             font-size:11px;
        }
    </style><?php
}


////////////////////////////////////////////////////////////////////////////////
// S e c t i o n s
////////////////////////////////////////////////////////////////////////////////

/** Dashboard Support Section */
function oper_dashboard_section_support() {
    ?>
    <div class="oper_dashboard_section bk_right">
        <span class="bk_header"><?php _e('Support' , 'email-reminders');?>:</span>
        <table class="bk_table">
            <tr>
                <td style="text-align:center;" class="bk_spec_font"><a target="_blank" href="https://oplugins.com/plugins/email-reminders/"><?php _e('Help Info' , 'email-reminders');?></a></td>
            </tr>
            <tr>
                <td style="text-align:center;" class="bk_spec_font"><a href="mailto:support@oplugins.com"><?php _e('Contact Support' , 'email-reminders');?></a></td>
            </tr>                                        
            <tr>
                <td style="text-align:center;" class="bk_spec_font"><?php 
				printf( __( '%sNew feature suggestion%s', 'email-reminders'),
									'<a href="mailto:newfeature@oplugins.com?Subject=Email%20Reminders" target="_blank">',
									'</a>' ); ?></td>
            </tr>                                        
        </table>
    </div>
    <?php 
}


/** Dashboard Version Section */
function oper_dashboard_section_version() {
        
    $version = 'free';
    
    ?>
    <div class="oper_dashboard_section" >
        <span class="bk_header"><?php _e('Current version' , 'email-reminders');?>:</span>
        <table class="bk_table">
            <tr class="first">
                <td style="width:35%;text-align: right;;" class=""><?php _e('Version' , 'email-reminders');?>:</td>
                <td style="color: #e50;font-size: 13px;font-weight: 600;text-align: left;text-shadow: 0 -1px 0 #eee;;" 
                    class="bk_spec_font"><?php
                    echo OPER_VERSION_NUM;
                ?> <!--sup style="margin: 0 0.5em;font-size: 0.7em;">&beta;eta</sup--></td>
            </tr>
            <tr>
                <td style="width:35%;text-align: right;" class="first b"><?php _e('Release date' , 'email-reminders');?>:</td>
                <td style="text-align: left;  font-weight: 600;" class="bk_spec_font"><?php echo date ("d.m.Y", filemtime(OPER_FILE)); ?></td>
            </tr>
        </table>
    </div>    
    <?php 
}
