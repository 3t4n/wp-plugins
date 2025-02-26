<?php
if ( current_user_can( 'edit_dashboard' ) ) 
{
$paypal_url = site_url() . '/' . DBP_PATH . 'dbp-admin/images/PP_M.png';
?>
<div id="dashboard-options-wrap" class="hidden" tabindex="-1" aria-label="<?php echo esc_attr( 'Dashboard Options', 'DashPress' ); ?>" >
	<div id="dashboard-paypal">
		<a href="https://paypal.me/arenaut" target="_blank"><img title="<?php echo esc_attr( __( 'Thank you :-) !', 'DashPress' ) ); ?>" alt="<?php echo esc_attr( __( 'Thank you :-) !', 'DashPress' ) ); ?>" src="<?php echo $paypal_url; ?>" /></a>
	</div>
	<form id="adv-dashboard-settings" method="post" action="">
		<h5><?php _e( 'Show on Dashboard', 'DashPress' ); ?></h5>
		<div class="metabox-prefs">
<?php
	global $dbp_boxes;
	foreach( $dbp_boxes as $dbp_box )
	{
?>
			<label for="<?php echo $dbp_box['id']; ?>_dbp"><input type="checkbox"<?php checked( ( $dbp_box['checked'] == '1' ), true ); ?> value="<?php echo esc_attr( $dbp_box['id'] ); ?>" id="<?php  echo $dbp_box['id']; ?>_dbp" name="<?php echo $dbp_box['id']; ?>_dbp" class="hide-dashbox-tog" /><?php echo $dbp_box['title']; ?></label>
<?php
	}
?>
			<br class="clear" />
		</div>
		<h5><?php _e( 'DashPress Option', 'DashPress' ); ?></h5>
		<div class="widgets-prefs">
			<input id="dashpress-global-settings" type="button" class="button" value="<?php echo esc_attr( ( get_option( self::option_wdgts ) ? __( 'Erase default', 'DashPress' ) : __( 'Set default', 'DashPress' ) ) ); ?>" />
			<?php _e( 'Number of DashPress widgets:', 'DashPress' ); ?>
<?php
		for ( $i = 1; $i <= self::maxwidgets; $i++ ) 
		{
?>
			<label><input class="dbp_option"<?php checked( ( $i == $this->count ), true ); ?> name="dbp_option" value="<?php echo $i; ?>" type="radio" /><?php echo $i; ?></label>
<?php
		}
?>
		</div>
	</form>
</div>
<div id="dashboard-options-link-wrap" class="hide-if-no-js screen-meta-toggle"><button type="button" id="dashboard-options-link" class="button show-settings" aria-controls="dashboard-options-wrap" aria-expanded="false"><?php _e( 'Dashboard Options', 'DashPress' ); ?></button></div>
<?php
}
?>
<script type="text/html" id="tmpl-dbp-nocontent">
	<p><?php _e( 'Sorry! no news !', 'DashPress' ); ?></p>
</script>
<script type="text/html" id="tmpl-dbp-content">
	<div class="dbp-content" data-height="{{data.height}}em" style="max-height:{{data.height}}em;">
		<ul style="margin: 0;">
<# _( data.items ).each( function( data ) { #>
		   <li class="<# if ( typeof data.image !== 'undefined' ) { #>img<# } else { #>noimg<# } #>">
<# if ( typeof data.image !== 'undefined' ) { #>
				<table>
					<tr>
						<td>
							<div class="img lastnews">
								<img src="{{data.image}}" alt="" class="lastnews" />
							</div>
<# } #>
			<span class="lastnews">
				<a class="lastnews" href="{{data.permalink}}" title="{{data.desc}}" target="_blank">{{data.title}}</a>
				 &#8212; 
				<abbr class="dbp-c6" title="{{data.fulldate}}">{{data.date}}</abbr>
			</span>
<# if ( typeof data.image !== 'undefined' ) { #>
					</td>
				</tr>
			</table>
<# } #>
		   </li>
<# }) #>
		</ul>
	</div>
</script>
<script type="text/html" id="tmpl-dbp-control">
	<form method="post" class="dashboard-widget-control-form wp-clearfix widget-norequest">
		<p class="dbp-ctrl-mb0"><?php _e( 'Widget', 'DashPress' ); ?></p>
		<div class="dbp-ctrl-box">
			<table style="width: 100%;">
				<tr>
					<td colspan="2">
						<input class="widefat" type="text" value="{{data.options.wtitle}}" name="{{data.id}}[wtitle]" autocomplete="off" />
					</td>
				</tr>
				<tr>
					<td style="width: 50px;"><?php _e( 'Height : ', 'DashPress' ); ?></td>
					<td>
						<select name="{{data.id}}[height]">
<# for( var i = 5; i <= 85; i = i+5 ) { #>
							<option value="{{i}}"<# if ( i == data.options.height ) { #> selected="selected"<# } #>>{{i}}</option>
<# } #>
						</select>(em)
					</td>
				</tr>
			</table>
		</div>
		<p class="dbp-ctrl-mb0"><?php _e( 'Feeds', 'DashPress' ); ?></p>
		<div class="dbp-ctrl-box">
			<table style="width: 100%;">
				<tr>
					<td style="width: 50px;"><?php _e( 'Posts : ', 'DashPress' ); ?></td>
					<td>
						<select name="{{data.id}}[maxlines]">
<# for( var i = 1; i <= 99; i++ ) { #>
							<option value="{{i}}"<# if ( i == data.options.maxlines ) { #> selected="selected"<# } #>>{{i}}</option>
<# } #>
						</select>
					</td>
					<td style="width: 100px;"><?php _e( 'Image : ', 'DashPress' ); ?></td>
					<td>
						<input type="checkbox"<# if (typeof data.options.image !== 'undefined') { #> checked="checked"<# } #> name="{{data.id}}[image]" id="{{data.id}}_image" />
					</td>
				</tr>
				<tr>
					<td style="width: 50px;"><?php _e( 'Input : ', 'DashPress' ); ?></td>
					<td>
						<select name="{{data.id}}[maxfeeds]">
<# for( var i = 3; i <= 10; i++ ) { #>
							<option value="{{i}}"<# if ( i == data.options.maxfeeds ) { #> selected="selected"<# } #>>{{i}}</option>
<# } #>
						</select>
					</td>
					<td style="width: 100px;"><?php _e( 'Caching : ', 'DashPress' ); ?></td>
					<td>
						<select name="{{data.id}}[caching]">
<# for( var i in data.options.cache ) { #>
							<option value="{{i}}"<# if ( i == data.options.caching ) { #> selected="selected"<# } #>>{{data.options.cache[i]}}</option>
<# } #>
						</select>
					</td>
				</tr>
			</table>
		</div>
		<p>
			<label><?php _e( 'Fill the RSS or Atom urls here', 'DashPress' ); ?></label>
<# for( var i = 1; i <= data.options.maxfeeds; i++ ) { #>
			<input class="widefat dbp-ctrl-mb5" name="{{data.id}}[feeds][]" type="text" value="<# if (typeof data.options.feeds[i-1]!=='undefined') { #>{{data.options.feeds[i-1]}}<# } #>" /><br />
<# } #>
		</p>
		<p class="submit">
			<input type="submit" name="submit" id="submit_{{data.id}}" class="button button-primary" value="<?php _e( 'Submit', 'DashPress' ); ?>">
		</p>
	</form>
</script>