<?php 
	if ( ! defined( 'wpadlPLUGIN_URL' ) )
	define( 'wpadlPLUGIN_URL', plugin_dir_url( __FILE__ ) );
	global $wpdb;
	$bootStrapJS = wpadlPLUGIN_URL."asset/js/bootstrap.min.js";
	$bootStrapCSS = wpadlPLUGIN_URL."asset/css/bootstrap.min.css";
	wp_register_script('wpa-bootstrap_init', $bootStrapJS);
	wp_enqueue_script('wpa-bootstrap_init');
	wp_register_style('wpa-bootstrapCSS_init', $bootStrapCSS);
	wp_enqueue_style('wpa-bootstrapCSS_init');
	
	$plugin = 'connections/connections.php';
	if(!is_plugin_active($plugin))
	{
		$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
		echo "<div class='alert alert-danger'><b>This plugin requires the 'Connections Business Directory' plugin.</b><p>Please install <a href='$protocol".$_SERVER['SERVER_NAME']."/wp-admin/plugin-install.php?tab=search&s=connections'>'Connections Business Directory'</a> plugin to continue.</div>";
		exit;	
	}
	$emlLimit = round(ini_get('max_execution_time')/5) ; 
	$prefix = $wpdb->prefix;
	$query = "select * from $prefix"."connections where visibility != 'unlisted' order by first_name,last_name";
	$posts = $wpdb->get_results($query);
	$rows = count($posts);
	$split =  ceil($rows / $emlLimit);
	$i = 1;
	echo "Based on your server's Max_Execution_Limit, we recommend sending maximum $emlLimit emails every ".ini_get('max_execution_time')." seconds. The entire process should complete in approx. ". (ini_get('max_execution_time')* $split) / 60  ." minutes<p>";
	echo "<div class='btn-group' role='group' aria-label='Basic example'>";
	/*Paginate*/
	while($i <= $split)
	{
		echo "<input type=button class='paginate btn btn-primary' value=$i>"	;
		$i++;	
	}
	echo "</div>";
	echo "<div style='clear:both'><p></div>";
	if($rows == 0)
	{
		echo "<p><h3>No Active Connections Found</h3>"	;
	}
	$i = 0;
	$c = 1;
	$hidden = '';
	$checked = "checked='checked'";
	echo "<p><div id=memberlist class='col-xs-12 col-sm-4'>";
	while($i < $rows)
	{
		$cid = $posts[$i]->id;
		$csal = $posts[$i]->honorific_prefix;
		$cfname = $posts[$i]->first_name;
		$clname = $posts[$i]->last_name;
		/* Get Preferred Email Address List from the connections_email table*/
		$cquery = "select address from $prefix"."connections_email where entry_id= '$cid' and preferred='1' ";
		$cposts = $wpdb->get_results($cquery);
		$ceml =  $cposts[0]->address;
		echo "<div class='paged $c $hidden'><input type='checkbox' class='members' data-id=$ceml $checked>$csal $cfname $clname</div>";
		$i++;	
		if($i > 0 && ($i % $emlLimit == 0)){ $c++; $hidden = 'hidden'; $checked  = "";}
	}
	echo "</div>";
	echo "<div id=membermessage class='col-xs-12 col-sm-8'>";
	echo "<div  class='col-xs-12 col-sm-12'>Email subject<br><input id=WPAdlSub type=text class=form-control value=\"\" placeholder=\"Subject\"></div><p>&nbsp;</p>";
	$content = "";
	$editor_id = "WPAdlEditor";
	wp_editor( $content, $editor_id );
	echo "<input type=button value='Send Email' class='btn btn-success' id=WPASendMail><p>&nbsp;</p>";
	echo "<div id='WPAresult' class=alert role=alert></div>";
	echo "</div>";
?>
<script>
	jQuery(document).ready(function(){
		jQuery("#WPASendMail").click(function(){
			tinyMCE.triggerSave();
			var allVals = [];
			jQuery('#memberlist :checked').each(function() {
				allVals.push(jQuery(this).attr('data-id'));
			});
			var sub = format(jQuery("#WPAdlSub").val());
			if(sub == "") {
				jQuery("#WPAdlSub").focus();
				jQuery("#WPAresult").addClass('alert-danger');
				jQuery("#WPAresult").text('Subject is required.');
				return;
			}
			var inputid = "WPAdlEditor";
			var editor = tinyMCE.get(inputid);
			if (editor) {
				msg = editor.getContent();
				} else {
				msg = jQuery('#'+inputid).val();
			}
			jQuery("#WPASendMail").prop('disabled', true);
			Q = "C=sendmail&S=" + sub + "&M=" + msg + "&L=" + allVals +  "&Sessid=" + Math.random();
			jQuery("#WPAresult").removeClass('alert-danger');
			jQuery("#WPAresult").text('');
			if(msg == "") return;
			
			jQuery.ajax({
				url: ajaxurl,
				data: {
					'action':'sendMail_ajax_request',
					'S' : sub,
					'M' : msg,
					'L' : allVals
				},
				success:function(data) {
					jQuery("#WPAresult").append(data);
				},
				error: function(errorThrown){
					jQuery("#WPAresult").append(errorThrown);
				}
			});
			/*Start Countdown*/
			var counter = <?php echo ini_get('max_execution_time'); ?>;
			counter = (counter * allVals.length ) / <?php echo $emlLimit; ?>;
			var interval = setInterval(function() {
				counter--;
				jQuery("#WPASendMail").attr('value','Next Batch in ' + counter + ' seconds');
				if (counter == 0) {
					jQuery("#WPASendMail").attr('value',' Send Email');
					jQuery("#WPASendMail").prop('disabled', false);
					clearInterval(interval);
				}
			}, 1000);
			
		});
		/*Switch checkboxes list on pagination*/
		jQuery(".paginate").click(function(){
			var v = jQuery(this).val();
			jQuery(".paged").hide();
			jQuery(".paged").removeClass('hidden');
			jQuery(".paged .members").prop('checked', false);
			jQuery("."+v+" .members").prop('checked', true);
			jQuery("."+v).show();
		});
	});
	/*format the values*/
	function format(value)
	{
		value  = value.replace(/class=""/g,'');
		value  = value.replace(/"/g,"%22");
		value  = value.replace(/</g,'&lt;');
		value  = value.replace(/>/g,'&gt;');
		value  = value.replace(/&/g,'%26');
		value  = value.replace(/'/g,'%27');
		value  = value.replace(/`/g,'%2C');
		value  = value.replace(/\+/g,'%2B');
		return value;
	}
</script>