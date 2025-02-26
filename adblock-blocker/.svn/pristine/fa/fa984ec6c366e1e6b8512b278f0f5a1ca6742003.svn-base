<?php 
function db_popup(){ ?>
<script type="text/javascript" src="<?php bloginfo('wpurl'); ?>/wp-includes/js/jquery/jquery.js"></script>
				<script type="text/javascript" src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/adblock-blocker/js/jNotify.jquery.js"></script>
				<script type="text/javascript">
				//Show popup
				  function Startadblock(){
				  jNotify(
				    '<div id="designersblogalert"><p><b><span style="font-size:18px !important;"><?php echo get_option('db_adblock_blocker_data_title'); ?></span></b><br><div style=" display:block; margin-top: 10px; margin-bottom: -20px; font-family: verdana; font-size: 12px;"><?php echo get_option('db_adblock_blocker_data_text'); ?></div><br><span style="font-size:10px !important; text-align:!important right; font-family: verdana;"><br>Click anywhere to remove this alert</span></p></div>',
				    {
				      autoHide : false, 
						  clickOverlay : true, 
						  MinWidth : 250,
						  TimeShown : 3000,
						  ShowTimeEffect : 1500,
						  HideTimeEffect : 200,
						  LongTrip :20,
						  HorizontalPosition : 'center',
						  VerticalPosition : 'center',
						  ShowOverlay : true,
   						  ColorOverlay : '#000',
						  OpacityOverlay : 0.5,
						  onClosed : function(){
   					 }
				  }
 				 ); // close jNotify
 				 }
				//Show popup end
				</script>
				<style>
				#ab-bl-advertisement{display:none;}#jNotify{position:absolute;background:#d8e6fc url('<?php bloginfo('wpurl'); ?>/wp-content/plugins/db-adblock-blocker/img/info.png') no-repeat 15px center;color:#35517c;border:1px solid #a7c3f0;z-index:9999;-moz-border-radius:5px;border-radius:5px;-webkit-border-radius:5px;margin:15px;padding:10px 10px 10px 50px; max-width: 400px!important;}#jNotify a{color:#35517c!important;text-decoration:none;}#jOverlay{width:100%;height:100%;position:fixed;top:0;left:0;z-index:9998;}#designersblogalert p{font-family:verdana!important;font-size:12px;}
				</style>
<?php } ?>