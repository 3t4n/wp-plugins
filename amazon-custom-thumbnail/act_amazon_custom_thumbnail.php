<?php
/*
Plugin Name: Amazon Custom Thumbnail
Plugin URI: n/a
Description: Create an attractive thumbnail display for your amazon affiliate sites.
Version: 1.0 .
Author: Sigit Prasetya Nugroho.
Author URI: http://seegatesite.com

License: GPL2
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
*/
add_action('admin_menu', 'act_lokasi_menu');
add_filter('post_thumbnail_html','act_amazon_custom_thumbnail',10);
function act_lokasi_menu(){
     add_options_page('Amazon custom thumbnail', 'Amazon custom thumbnail', 'manage_options', 'seegatesite-act-thumbnail-doc', 'seegatesite_act_thumbnail_doc');
}
function act_amazon_custom_thumbnail_back()
{
	return admin_url("options-general.php?page=seegatesite-act-thumbnail-doc");
}
function seegatesite_act_thumbnail_doc()
{
	if (isset($_POST['submit']))
		{
			$lebar = $_POST['thewidth'];
			update_option( 'sgt_act_thumbnail_width', $lebar );
			echo "<h3>Update Option success</h3>";
	
		}
	$width_value=get_option( 'sgt_act_thumbnail_width' );
	?>
        <h2>Amazon Custom Thumbnail Option : </h2>
        <form name="fupdateoptionthumbnail"  action="<?php echo act_amazon_custom_thumbnail_back();?>" method="post">
        <table>
            <tr>
                <td>Thumbnail Width</td><td > : <span id="range" style="color:#F00"><b><?php if($width_value==''){echo '380';}else{ echo $width_value;} ?> px</b></span></td>
            </tr>
            <tr><td></td><td> <input type="range" name="thewidth" min="150" max="380" width="100px" value="<?php if($width_value==''){echo '380';}else{ echo $width_value;} ?>" step="1" onchange="showValue(this.value)" />
			<script type="text/javascript">
            function showValue(newValue)
            {
                document.getElementById("range").innerHTML='<b>'+newValue+' px</b>';
            }
            </script></td></tr>
            <tr>
                <td colspan="2"><hr /><input type="submit" name="submit" value="Update" /></td>
            </tr>
			<tr>
				<td colspan="2" align="center"><h3>Did you like this plugin? if you can, donate to developers :) </h3></td>
			</tr>
			<tr>
				<td colspan="2"><hr/>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="YHYXZU32A6QQC">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>		
				</td>
			</tr>
        </table></form>
    <?php	
}
function act_amazon_custom_thumbnail( $html ) {
        global $post;
		$html ='</a><div class="sgtact_container_plugin"><sgtact_section_plugin>';
		if(!is_single() && !is_attachment() )
		{
				$name = get_post_meta($post->ID, 'azon_image', true);
				$rating = get_post_meta($post->ID, 'azon_rating', true);
				$price = get_post_meta($post->ID, 'azon_price', true);
				$list_price = get_post_meta($post->ID, 'azon_listprice', true);
				$url = get_post_meta($post->ID, 'azon_url', true);
				$cart = get_post_meta($post->ID, 'azon_cart', true);
				$titles=get_the_title();
				if( $name ) 
				{
					$html .= '<img src="'. esc_url( $name ).'" title="'.$titles.'" alt="'.$titles.'"  style="max-height:190px;width:auto;" align="middle" />';
				}
				$html .='</sgtact_section_plugin><sgtact_aside_plugin>';
				if( $rating ) 
				{
						$html .= '<img src="' . plugins_url( 'act_amazon_custom_thumbnail/images/'.$rating.'.gif', dirname(__FILE__) ) . '"  style="width:70px;float:left" alt="'.$titles.' product rating" /><br />
<hr/>';
				}
				$html .='<div style="margin-bottom:5px;">';
				if( !$list_price ) 
				{
					$list_price_tmp = ' -';
				}else
				{
					$list_price_tmp='$ '.$list_price;	
				}
						$html .= '<div align="left" style="font-family: Arial, Helvetica, sans-serif;
	font-size:12px;"><label>List Price : </label><label style="color:grey;"><s> '.$list_price_tmp.'</s></label></div>';
				
				if( $price ) 
				{
					$price_tmp=	'$ '.$price;
				}else
				{
					$price_tmp= ' -';
				}
	$html .= '<div align="left" style="font-family: Arial, Helvetica, sans-serif;
	font-size:12px;"><label><b>Price :</label><label style="font-size:14px;color:red;">'.$price_tmp.'</b></label></div>';
				
				if( $list_price && $price ) 
				{
					if ($list_price >= $price)
					{
						$save_point= ($list_price - $price);
						$save_prcn= (($list_price - $price)*100)/$list_price;
	$html .= '<div align="left" style="font-family: Arial, Helvetica, sans-serif;
	font-size:12px;"><label>You Save :</label><label style="font-size:12px;color:red;"> $ '.number_format($save_point).' ('.number_format($save_prcn).'%)</label></div>';
					}else
					{
							$html .= '<div align="left" style="font-family: Arial, Helvetica, sans-serif;
	font-size:12px;"><label>You Save : </label><label style="font-size:12px;color:red;"> -</label></div>';

					}
				}else
				{
						$html .= '<div align="left" style="font-family: Arial, Helvetica, sans-serif;
	font-size:12px;"><label>You Save : </label><label style="font-size:12px;color:red;"> -</label></div>';
				}
					$html .='</div>';
				if( $url ) 
				{
						$html .= '<a style="cursor: pointer; text-decoration: none;" href="'.$url.'" target="_blank"  rel="nofollow" title="Add to cart"><img src="' . plugins_url( 'act_amazon_custom_thumbnail/images/buy_now.png', dirname(__FILE__) ) . '"  style=" width:45%;float:left" alt="'.$titles.' check price and available at amazon site" title="'.$titles.' check price and available at amazon site" /></a>';
				}
				if( $cart ) 
				{
						$html .= '<a style="cursor: pointer; text-decoration: none;" href="'.$cart.'" target="_blank"  rel="nofollow" title="Add to cart"><img src="' . plugins_url( 'act_amazon_custom_thumbnail/images/add_cart.png', dirname(__FILE__) ) . '"  style=" width:50%;float:right" alt="add to cart" alt="'.$titles.' add to amazon cart" /></a><br />';
				}
			
		}
		$html .='</sgtact_aside_plugin></div>';
		if(!empty($name))
			{
				return $html;	
			}else
			{
    			$default = get_post_meta($post->ID, '_thumbnail_id', true);
				if ($default<>'-1') 
				{
					//echo $default;
					 $nm = get_post_meta($default, '_wp_attached_file', true);
					 $img=home_url().'/wp-content/uploads/'.$nm;
					 $html = '<img src="' .$img . '" />';
				//$thumb='';
				}else
				{
						$html ='';
				}
				return $html;
			}
		
}
add_action( 'publish_post', 'act_add_thumbnail_id' );
function act_add_thumbnail_id($postid) {
    if(!wp_is_post_revision($post_ID)) {
        $field_name = '_thumbnail_id';
        add_post_meta($postid, $field_name, '-1', true);    
    }
}
add_action( 'wp_enqueue_scripts', 'register_act_amazon_custom_css' );
function register_act_amazon_custom_css() {
	$width_value=get_option( 'sgt_act_thumbnail_width' );
	wp_register_style( 'act_amazon_custom_css', plugins_url( 'act_amazon_custom_thumbnail/act_amazon_custom_css.php?warna=white&lebar='.$width_value ) );
	wp_enqueue_style( 'act_amazon_custom_css' );
}
?>