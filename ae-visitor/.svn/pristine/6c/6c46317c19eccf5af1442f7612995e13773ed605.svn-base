<?php
class ae_visitor_counter {
	function __construct() {
		$this->ae_visitor_counter();
	}
	function ae_visitor_counter() {
		
	}
	function getData() {
		$values	= array(
			'title'			=> $title ,
			'startDay'		=> get_option('ae_visitor_day') ,
			'startYest'		=> get_option('ae_visitor_yesterday') ,
			'startWeek'		=> get_option('ae_visitor_week') ,
			'startMonth'	=> get_option('ae_visitor_month') ,
			'startAll'		=> get_option('ae_visitor_all') ,
			
			'DayUpdate'		=> get_option('ae_visitor_day_update') ,
			'WeekUpdate'	=> get_option('ae_visitor_week_update') ,
			'MonthUpdate'	=> get_option('ae_visitor_month_update') ,
		);
		return $values;
	}
	function counter() {
		if(
			trim($_SERVER['HTTP_USER_AGENT'])==''
			||
			preg_match('/(bot.((x)?htm(l)?|php)|[\w\W]+bot[\W]+|feedfetcher|slurp|Baiduspider|WOW64)/i', $_SERVER['HTTP_USER_AGENT'])
		) return false;

		$values = $this->getData();

		$ae_visitor_update = ( isset( $_COOKIE[ 'ae_visitor_update' ] ) ) ? $_COOKIE[ 'ae_visitor_update' ] : 0 ;
		if( $ae_visitor_update != '1' ) {
			setcookie('ae_visitor_update', '1', time()+(60*15), COOKIEPATH, COOKIE_DOMAIN, false);

			if( $values['DayUpdate']!=(date("N")) ) { // for reset to day
				update_option('ae_visitor_day_update', (date("N")) );
				update_option('ae_visitor_day', 0 );
				$values['startYest']	= $values['startDay'];
				$values['startDay']		= 0;
			}
			if( $values['WeekUpdate']!=(date("W")) ) { // for reset this week
				update_option('ae_visitor_week_update', (date("W")) );
				update_option('ae_visitor_week', 0 );
				$values['startWeek']	= 0;
			}
			if( $values['MonthUpdate']!=(date("n")) ) { // for reset this month
				update_option('ae_visitor_month_update', (date("n")) );
				update_option('ae_visitor_month', 0 );
				$values['startMonth']	= 0;
			}

			$values['startDay']++;
			//$values['startYest']++;
			$values['startWeek']++;
			$values['startMonth']++;
			$values['startAll']++;

			update_option('ae_visitor_day', $values['startDay']);
			update_option('ae_visitor_yesterday', $values['startYest']);
			update_option('ae_visitor_week', $values['startWeek']);
			update_option('ae_visitor_month', $values['startMonth']);
			update_option('ae_visitor_all', $values['startAll']);
		}
	}
}
class ae_visitor extends WP_Widget {
	function __construct() {
		$this->ae_visitor();
	}
	function ae_visitor() {
		$widget_ops = array(
			'classname' => 'Widget_ae_visitor',
			'description' => __('Display guest visitor of your web in day, week, month, and all.', 'ae-visitor')
		);
		//Create widget
		$this->WP_Widget('aevisitor', __('AE Visitor', 'ae-visitor'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = empty($instance['title']) ? __('AE Visitor', 'ae-visitor') : apply_filters('widget_title', $instance['title']) ;

		$aeVC = new ae_visitor_counter();
		$values = $aeVC->getData();

		if ( !empty( $title ) ) {
			echo $before_title . $title . $after_title;
		};
		echo $ae_visitor_update;
		?>
<table align="center" cellpadding="0" cellspacing="0" width="90%">
  <tbody>
    <tr align="left">
      <td><img class="mvc_peopleImg" src="<?php echo plugin_dir_url( __FILE__ ); ?>peoples/vtoday.gif" alt="Today" title="Today"/></td>
      <td>Today</td>
      <td align="right"><?php echo number_format($values['startDay'], 0); ?></td>
    </tr>
    <tr align="left">
      <td><img class="mvc_peopleImg" src="<?php echo plugin_dir_url( __FILE__ ); ?>peoples/vyesterday.gif" alt="Yesterday" title="Yesterday"/></td>
      <td>Yesterday</td>
      <td align="right"><?php echo number_format($values['startYest'], 0); ?></td>
    </tr>
    <tr align="left">
      <td><img class="mvc_peopleImg" src="<?php echo plugin_dir_url( __FILE__ ); ?>peoples/vweek.gif" alt="This Week" title="This Week"/></td>
      <td>This Week</td>
      <td align="right"><?php echo number_format($values['startWeek'], 0); ?></td>
    </tr>
    <tr align="left">
      <td><img class="mvc_peopleImg" src="<?php echo plugin_dir_url( __FILE__ ); ?>peoples/vmonth.gif" alt="This Month" title="This Month"/></td>
      <td>This Month</td>
      <td align="right"><?php echo number_format($values['startMonth'], 0); ?></td>
    </tr>
    <tr align="left">
      <td><img class="mvc_peopleImg" src="<?php echo plugin_dir_url( __FILE__ ); ?>peoples/vall.gif" alt="All Days" title="All Days"/></td>
      <td>All Days</td>
      <td align="right"><?php echo number_format($values['startAll'], 0); ?></td>
    </tr>
  </tbody>
</table>
<a href="http://www.aldo-expert.com/" target="_blank">&nbsp;</a>
		<?php
		echo $after_widget;
	} //end of widget

	//Update widget options
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		//get old variables
		$instance['title']		= esc_attr($new_instance['title']);

		return $instance;
	} //end of update
	
	//Widget options form
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => __('AE Visitor','ae-visitor') ) );
		
		$title		= esc_attr($instance['title']);
		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:');?> 
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		   </label>
		</p>
	<?php
    } //end of form
	
}

function ae_visitor_init() { register_widget('ae_visitor'); }

add_action( 'widgets_init', 'ae_visitor_init' );
//Register Widget

$aeVC = new ae_visitor_counter();
add_action('wp', array(&$aeVC, 'counter'));

?>