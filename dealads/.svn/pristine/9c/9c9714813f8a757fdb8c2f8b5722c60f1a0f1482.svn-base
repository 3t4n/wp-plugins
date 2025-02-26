<?php

class wpdaWidget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'wpda_widget',
			'DealAds',
			array(
				'classname' => 'wpdaWidget',
				'description' => __('Rotate up to 3 of Amazon\'s Deals of the Day with your affiliate link', 'wpda'),
			)
		);
	}

	public function widget($args, $instance) {
		$region = get_option('wpda_region');
		$legal = get_option('wpda_legal');
		$target = (get_option('wpda_window') == 'blank')?'_blank':'_self';

		try {
			$amz = new wpdaAmazon($region, $instance['tag']);
			$data = $amz->rollout();
			if(!(count($data) > 2)) {
				throw new Exception('No data to rollout', 99);
			}
			shuffle($data);
		} catch (Exception $e) {
			$err = '['.date('Y-m-d H:i:s').'] Exception: '.$e->getMessage().' ('.$e->getCode().') in '.$e->getFile().' on '.$e->getLine()."\n";
			wpda_debug($err);
		}
		?>
			<div class="wpda wpda-widget wpda-widget-design-<?php echo $instance['design']; ?>">
				<script type="text/javascript">
		<?php

			$html = '<table>';
			$html .= '<tr><td colspan="2" class="wpda-widget-title">'.htmlentities(str_replace("'", "\\'", $instance['title'])).'</td></tr>';
			echo "document.write('".$html."');\n"; $html = '';
			$count = intval($instance['count']);
			for($i = 0; $i < $count; $i++) {
				$title = (mb_strlen($data[$i]['title']) < 45)?$data[$i]['title']:mb_substr($data[$i]['title'], 0, 43).'...';
				$title = htmlentities(str_replace("'", "\\'", $title));

				$exp = intval(round(($data[$i]['expiration'] - time()) / 60));
				if($exp > 90) {
					$exp_val = date('G:i', mktime(0, $exp));;
					$exp_unit = __('hours', 'wpda');
					$exp_txt = __('Ends in', 'wpda');
				} else {
					$exp_val = $exp;
					$exp_unit = __('minutes', 'wpda');
					$exp_txt = __('Ends in', 'wpda');
				}

				$html .= '<tr><td colspan="2" class="wpda-widget-image"><a href="'.$data[$i]['url'].'"><img src="'.$data[$i]['image'].'" target="'.$target.'"></a></td></tr>';
				$html .= '<tr><td colspan="2" class="wpda-widget-offer"><b><a href="'.$data[$i]['url'].'" target="'.$target.'">'.$title.'</a></b><br>';
				if (isset($data[$i]['preprice'])) $html .= __('List Price', 'wpda').': '.wpda_nf($data[$i]['preprice']).'<br><b>'.__('Deal Price', 'wpda').': '.wpda_nf($data[$i]['price']).'</b><br><span style="color: red;">'.__('You Save', 'wpda').': '.wpda_nf($data[$i]['save']).' ('.$data[$i]['discount'].' %)</span><br>';
				else $html .= '<span style="color: red; font-weight: bold;">'.__('Deal Price', 'wpda').': '.wpda_nf($data[$i]['price']).'</span><br>';

				echo "document.write('".$html."');\n"; $html = '';

				if($exp > 0) $html .= $exp_txt.' <b>'.$exp_val.'</b> '.$exp_unit.'!<br>';

				if(isset($data[$i]['sold']) && $data[$i]['sold'] > 15) {
					if($data[$i]['sold'] > 30 && $data[$i]['sold'] < 70) $progress_color = '#f0ad4e'; elseif($data[$i]['sold'] >= 70) $progress_color = '#d9534f'; else $progress_color = '#5cb85c';
					$html .= '<div class="wpda-progress"><div class="wpda-progress-status" style="width: '.$data[$i]['sold'].'%; background-color: '.($progress_color).';">'.$data[$i]['sold'].' %</div></div>'.__('are already sold', 'wpda').'!<br>';
				}

				$html .= '<div class="wpda-widget-buy"><a href="'.$data[$i]['url'].'" target="'.$target.'"><img src="'.WPDA_URI.'/img/buy_'.$region.'.gif"></a></div>';

				$html .= '</td></tr>';
				echo "document.write('".$html."');\n"; $html = '';

			}
			$html .= '<tr><td class="wpda-widget-legal">'.$legal.'</td><td class="wpda-widget-more"><a href="'.$amz->more().'" target="'.$target.'">'.__('more', 'wpda').'...</a></td></tr></table>';

			echo "document.write('".$html."');\n";
		?>
				</script>
			</div>
		<?php
	}

	public function form($instance) {
		?>
		<div class="wpda">
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title of widget', 'wpda'); ?>:</label><br>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr(@$instance['title']); ?>">
			<br>
			<label for="<?php echo $this->get_field_id('design'); ?>"><?php _e('Widget design', 'wpda'); ?>:</label><br>
			<select id="<?php echo $this->get_field_id('design'); ?>" name="<?php echo $this->get_field_name('design'); ?>">
				<option value="boxed"<?php if(@$instance['design'] == 'boxed') echo ' selected'; ?>><?php _e('boxed', 'wpda'); ?></option>
				<option value="blank"<?php if(@$instance['design'] == 'blank') echo ' selected'; ?>><?php _e('blank', 'wpda'); ?></option>
			</select>
			<br>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Product count', 'wpda'); ?>:</label><br>
			<select id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>">
				<option value="1"<?php if(@$instance['count'] == '1') echo ' selected'; ?>>1</option>
				<option value="2"<?php if(@$instance['count'] == '2') echo ' selected'; ?>>2</option>
				<option value="3"<?php if(@$instance['count'] == '3') echo ' selected'; ?>>3</option>
			</select>
			<br>
			<label for="<?php echo $this->get_field_id('tag'); ?>"><?php _e('Affiliate tag', 'wpda'); ?>:</label><br>
			<input type="text" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" value="<?php echo esc_attr(@$instance['tag']); ?>">
		</div>
		<?php
	}

	public function update($new, $old) {
		$old['title'] = sanitize_text_field($new['title']);
		$old['design'] = sanitize_text_field($new['design']);
		$old['count'] = intval($new['count']);
		$old['tag'] = sanitize_text_field($new['tag']);
		return $old;
	}

}
add_action('widgets_init', create_function('', 'return register_widget("wpdaWidget");'));

?>
