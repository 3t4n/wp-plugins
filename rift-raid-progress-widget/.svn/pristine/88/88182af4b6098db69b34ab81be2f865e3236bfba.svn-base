<?php
/*
Plugin Name: Rift Raid Progress Widget
Plugin URI: http://savantgaming.com/raidprogress
Description: Wordpress widget plugin that shows the current progress of your guilds raids for rift
Author: Benjamin Evenson
Version: 1.2
Author URI: http://savantgaming.com

-------------------------------------------------------------------
Copyright (c) 2012 Benjamin Evenson

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
-------------------------------------------------------------------

*/

/* ==================================================================================
 * Define the class widget
 * ==================================================================================
 */
class Rift_Raid_Progress_Widget extends WP_Widget
{
	//IMPORTANT!!! Change Me!! The Current font is default on Ubuntu & Debian
	//If you upload your own font just use plugin_dir_path(__FILE__) . 'fontname.ttf';
	//Make sure its in the root directory of the plugin
	private static $fontfile = '/usr/share/fonts/truetype/ttf-dejavu/DejaVuSans.ttf';
	
    /* ==============================================================================
     * Constructor
     * ==============================================================================
     */
	public function __construct()
	{
		parent::__construct(
							'rift_raid_progress_widget',
							'Rift_Raid_Progress_Widget',
							array('description' => __('Displays raid progress', 'thepandasyndicate.com'),)
							);
	}
	
    /* ==============================================================================
     * Widget Form - Called when editing widget in admin mode.
     * This function updates the set values
     * ==============================================================================
     */
	public function form($instance)
	{
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Raid Progress', 'dh' => '0', 'gp' => '0', 'gsb' => '0', 'ros' => '0', 'rotp' => '0', 'hk' => '0', 'pf' => '0', 'id' => '0') );
		$title = $instance['title'];
		$dh = $instance['dh'];
		$gp = $instance['gp'];
		$gsb = $instance['gsb'];
		$ros = $instance['ros'];
		$rotp = $instance['rotp'];
		$hk = $instance['hk'];
		$pf = $instance['pf'];
		$id = $instance['id'];
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('dh'); ?>">DH(Out of 4): <input class="widefat" id="<?php echo $this->get_field_id('dh'); ?>" name="<?php echo $this->get_field_name('dh'); ?>" type="text" value="<?php echo attribute_escape($dh); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('gp'); ?>">GP(Out of 4): <input class="widefat" id="<?php echo $this->get_field_id('gp'); ?>" name="<?php echo $this->get_field_name('gp'); ?>" type="text" value="<?php echo attribute_escape($gp); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('gsb'); ?>">GSB(Out of 5): <input class="widefat" id="<?php echo $this->get_field_id('gsb'); ?>" name="<?php echo $this->get_field_name('gsb'); ?>" type="text" value="<?php echo attribute_escape($gsb); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('ros'); ?>">ROS(Out of 4): <input class="widefat" id="<?php echo $this->get_field_id('ros'); ?>" name="<?php echo $this->get_field_name('ros'); ?>" type="text" value="<?php echo attribute_escape($ros); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('rotp'); ?>">ROTP(Out of 4): <input class="widefat" id="<?php echo $this->get_field_id('rotp'); ?>" name="<?php echo $this->get_field_name('rotp'); ?>" type="text" value="<?php echo attribute_escape($rotp); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('hk'); ?>">HK(Out of 11): <input class="widefat" id="<?php echo $this->get_field_id('hk'); ?>" name="<?php echo $this->get_field_name('hk'); ?>" type="text" value="<?php echo attribute_escape($hk); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('pf'); ?>">PF(Out of 4): <input class="widefat" id="<?php echo $this->get_field_id('pf'); ?>" name="<?php echo $this->get_field_name('pf'); ?>" type="text" value="<?php echo attribute_escape($pf); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('id'); ?>">ID(Out of 5): <input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo attribute_escape($id); ?>" /></label></p>
	<?php
	}
	
    /* ==============================================================================
     * Widget Update - Called when widget settings have been updated.
     * This function is called after the values have been entered and saved.
     * It will then generate the images based on the numbers set.
     * ==============================================================================
     */
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$dh = $instance['dh'] = $new_instance['dh'];
		$gp = $instance['gp'] = $new_instance['gp'];
		$gsb = $instance['gsb'] = $new_instance['gsb'];
		$ros = $instance['ros'] = $new_instance['ros'];
		$rotp = $instance['rotp'] = $new_instance['rotp'];
		$hk = $instance['hk'] = $new_instance['hk'];
		$pf = $instance['pf'] = $new_instance['pf'];
		$id = $instance['id'] = $new_instance['id'];
		
		$path = plugin_dir_path(__FILE__);
		
		//Todo: Only update the change values
		$this->generate_image($path . 'images/dh/dh_.png', $dh, 4);
		$this->generate_image($path . 'images/gp/gp_.png', $gp, 4);
		$this->generate_image($path . 'images/gsb/gsb_.png', $gsb, 5);
		$this->generate_image($path . 'images/ros/ros_.png', $ros, 4);
		$this->generate_image($path . 'images/rop/rop_.png', $rotp, 4);
		$this->generate_image($path . 'images/hk/hk_.png', $hk, 11);
		$this->generate_image($path . 'images/pf/pf_.png', $pf, 4);
		$this->generate_image($path . 'images/id/id_.png', $id, 8);
		
		return $instance;
	}

    /* ==============================================================================
     * Render Widget - Renders the widget to the page.
     * This function renders the givin informaton to the widget section
     * ==============================================================================
     */
	public function widget($args, $instance) 
	{
		extract($args);
		
		$title = apply_filters( 'widget_title', $instance['title'] );
 		$dh = $instance['dh'];
		$gp = $instance['gp'];
		$gsb = $instance['gsb'];
		$ros = $instance['ros'];
		$rotp = $instance['rotp'];
		$hk = $instance['hk'];
		$pf = $instance['pf'];
		$id = $instance['id'];
			
		
		echo $before_widget;
		if (!empty($title))
			echo $before_title . $title . $after_title;

		echo '<center><a class="tooltip" title="';
		echo ($dh > 0) ? '<s>Assault Commander Jorb</s><br>' : 'Assault Commander Jorb<br>';
		echo ($dh > 1) ? '<s>Joloral Ragetide</s><br>' : 'Joloral Ragetide<br>';
		echo ($dh > 2) ? '<s>Isskal</s><br>' : 'Isskal<br>';
		echo ($dh > 3) ? '<s>High Priestess Hydris</s><br>' : 'High Priestess Hydris<br>';
		echo '"><img src="' .plugins_url('riftprogress/images/dh/dh.png', dirname(__FILE__)) . '"\></a>';
		echo '<a class="tooltip" title="';
		echo ($gp > 0) ? '<s>Anrak the Foul</s><br>' : 'Anrak the Foul<br>';
		echo ($gp > 1) ? '<s>Guurloth</s><br>' : 'Guurloth<br>';
		echo ($gp > 2) ? '<s>Thalguur</s><br>' : 'Thalguur<br>';
		echo ($gp > 3) ? '<s>Uruluuk</s><br>' : 'Uruluuk<br>';
		echo '"><img src="' .plugins_url('riftprogress/images/gp/gp.png', dirname(__FILE__)) . '"\></a>';
		echo '<a class="tooltip" title="';
		echo ($gsb > 0) ? '<s>Duke Letareus</s><br>' : 'Duke Letareus<br>';
		echo ($gsb > 1) ? '<s>Infiltrator Johnlen</s><br>' : 'Infiltrator Johnlen<br>';
		echo ($gsb > 2) ? '<s>Oracle Aleria</s><br>' : 'Oracle Aleria<br>';
		echo ($gsb > 3) ? '<s>Prince Hylas</s><br>' : 'Prince Hylas<br>';
		echo ($gsb > 4) ? '<s>Lord Greenscale</s><br>' : 'Lord Greenscale<br>';
		echo '"><img src="' .plugins_url('riftprogress/images/gsb/gsb.png', dirname(__FILE__)) . '"\></a><br>';
		echo '<a class="tooltip" title="';
		echo ($ros > 0) ? '<s>Warmaster Galenir</s><br>' : 'Warmaster Galenir<br>';
		echo ($ros > 1) ? '<s>Plutonus the Immortal</s><br>' : 'Plutonus the Immortal<br>';
		echo ($ros > 2) ? '<s>Herald Gaurath</s><br>' : 'Herald Gaurath<br>';
		echo ($ros > 3) ? '<s>Alsbeth the Discordant</s><br>' : 'Alsbeth the Discordant<br>';
		echo '"><img src="' .plugins_url('riftprogress/images/ros/ros.png', dirname(__FILE__)) . '"\></a><br>';
		echo '<a class="tooltip" title="';
		echo ($rotp > 0) ? '<s>Ereandorn</s><br>' : 'Ereandorn<br>';
		echo ($rotp > 1) ? '<s>Beruhast</s><br>' : 'Beruhast<br>';
		echo ($rotp > 2) ? '<s>General Silgen</s><br>' : 'General Silgen<br>';
		echo ($rotp > 3) ? '<s>High Priest Arakhurn</s><br>' : 'High Priest Arakhurn<br>';
		echo '"><img src="' .plugins_url('riftprogress/images/rop/rop.png', dirname(__FILE__)) . '"\></a><br>';
		echo '<a class="tooltip" title="';
		echo ($hk > 0) ? '<s>Murdantix</s><br>' : 'Murdantix<br>';
		echo ($hk > 1) ? '<s>Matron Zamira</s><br>' : 'Matron Zamira<br>';
		echo ($hk > 2) ? '<s>Soulrender Zilas</s><br>' : 'Soulrender Zilas<br>';
		echo ($hk > 3) ? '<s>Vladmal Prime</s><br>' : 'Vladmal Prime<br>';
		echo ($hk > 4) ? '<s>Sicaron</s><br>' : 'Sicaron<br>';
		echo ($hk > 5) ? '<s>King Molinar and Prince Dollin</s><br>' : 'King Molinar and Prince Dollin<br>';
		echo ($hk > 6) ? '<s>Estrode</s><br>' : 'Estrode<br>';
		echo ($hk > 7) ? '<s>Grugonim</s><br>' : 'Grugonim<br>';
		echo ($hk > 8) ? '<s>Inquisitor Garau</s><br>' : 'Inquisitor Garau<br>';
		echo ($hk > 9) ? '<s>Inwar Darktide</s><br>' : 'Inwar Darktide<br>';
		echo ($hk > 10) ? '<s>Lord Jornaru and Akylios</s><br>' : 'Lord Jornaru and Akylios<br>';
		echo '"><img src="' .plugins_url('riftprogress/images/hk/hk.png', dirname(__FILE__)) . '"\></a><br>';
		echo '<a class="tooltip" title="';
		echo ($pf > 0) ? '<s>Grandmaster Atrophinius</s><br>' : 'Grandmaster Atrophinius<br>';
		echo ($pf > 1) ? '<s>Swarmlord Khargroth</s><br>' : 'Swarmlord Khargroth<br>';
		echo ($pf > 2) ? '<s>Alltha the Reaper</s><br>' : 'Alltha the Reaper<br>';
		echo ($pf > 3) ? '<s>Faelord Twyl</s><br>' : 'Faelord Twyl<br>';
		echo '"><img src="' .plugins_url('riftprogress/images/pf/pf.png', dirname(__FILE__)) . '"\></a><br>';
		echo '<a class="tooltip" title="';
		echo ($id > 0) ? '<s>Warboss Drak</s><br>' : 'Warboss Drak<br>';
		echo ($id > 1) ? '<s>Maklamos the Scryer</s><br>' : 'Maklamos the Scryer<br>';
		echo ($id > 2) ? '<s>Rusila Dreadblade</s><br>' : 'Rusila Dreadblade<br>';
		echo ($id > 3) ? '<s>Ituziel</s><br>' : 'Ituziel<br>';
		echo ($id > 4) ? '<s>Ember Conclave</s><br>' : 'Ember Conclave<br>';
		echo ($id > 5) ? '<s>Laethys</s><br>' : 'Laethys<br>';
		echo ($id > 6) ? '<s>Dragon Eggs</s><br>' : 'Dragon Eggs<br>';
		echo ($id > 7) ? '<s>Maelforge</s><br>' : 'Maelforge<br>';
		echo '"><img src="' .plugins_url('riftprogress/images/id/id.png', dirname(__FILE__)) . '"\></a><br></center>';
		
		echo $after_widget;
	}
	
    /* ==============================================================================
     * Generate Image - Called when image needs to be updated.
     * This function takes the base images, converts the percentage to b&w,
     * creates the text, then merges the two images together and save them out.
     * ==============================================================================
     */
	private function generate_image($path, $completed, $total)
	{
		//Open coloured image(base image)
		$im1 = imagecreatefrompng($path);
		//Get dims
		$imgw = imagesx($im1);
		$imgh = imagesy($im1);
		//Calculate offset to start b&w
		$imgoffset = ($completed/$total) * $imgw;
		
		//Loop over image and convert offset pixels to b& w
		for($x = $imgoffset; $x < $imgw; $x++) {
			for($y = 0; $y < $imgh; $y++) {
				$rgb = ImageColorAt($im1, $x, $y);
				
				$r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;
                 
                $g = round(($r + $g + $b) / 3);
				
				$val = imagecolorallocate($im1, $g, $g, $g);
				
				imagesetpixel($im1, $x, $y, $val);
			}
		}
		
		$text = $completed . '/' . $total;	
		$dims = imagettfbbox(18, 0, self::$fontfile, $text);
		$bboxh = $dims[3] - $dims[5];
		
		$im2 = imagecreatetruecolor(100, 100);
		imagesavealpha($im2, true);
		imagealphablending($im2, false);
		
		$white = imagecolorallocatealpha($im2, 0, 0, 0, 127);
		imagefill($im2, 0, 0, $white);
		$wh = imagecolorallocate($im2, 255, 255, 255);

		
		imagettftext($im2, 18, 0, 5, ((50/2) - ($bboxh/2)) + 18, $wh, self::$fontfile, $text);
		imagecopy($im1, $im2, 0, 0, 0, 0, imagesx($im2), imagesy($im2));
		
		$path = substr_replace($path, "", -5);
		
		imagepng($im1, $path . '.png');
		imagedestroy($im1);
		imagedestroy($im2);
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget( "rift_raid_progress_widget" );' ) );

function attach_rift_jquery() 
{
	wp_enqueue_script('jquery');
	wp_register_script('tooltip', plugins_url('tooltip.js', __FILE__), array('jquery')); 
	wp_enqueue_script('tooltip');
}
add_action('wp_enqueue_scripts', 'attach_rift_jquery');

function attach_css()
{
	wp_register_style( 'tooltipcs',  plugins_url('tooltip.css', __FILE__));
	wp_enqueue_style( 'tooltipcs' );
}
add_action ('wp_enqueue_scripts', 'attach_css');
?>