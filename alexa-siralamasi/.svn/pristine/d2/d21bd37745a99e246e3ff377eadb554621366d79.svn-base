<?php
/* 
 Plugin Name: Alexa Siralamasi
 Plugin URI: https://wordpress.org/plugins/alexa-siralamasi/
 Description: Modern ve flat bir tasarima sahip olan bu eklenti sayesinde ziyaretcilerinize Alexa siralamanizi gostermenize olanak saglamaktadir.
 Version: 1.4       
 Author: Osman Sefa Cengiz      
 Author URI: http://www.sefacengiz.com/            
 License: GPLv2 or later                             
 */                                                                                                                                                                                                
                                                                                                                                                                                                                                                                                                 
class ALEXA_SIRALAMA extends WP_Widget {
	                      
	function __construct() {                       
		                                                                             
		parent::__construct(
			'alexa_traffic_rank_widget', // Base ID
			__( 'Alexa Siralamasi', 'alexa-trafik-siralamasi' ), // Name
			array( 'description' => __( 'Alexa Siralamanizi Goruntuleyin!', 'alexa-trafik-siralamasi' ), ) // Args
		);
		           
	}                                           
	 

	
	public function form( $instance ) {  

		$defaults = array( 'title' => __('Alexa Siralamam', 'webshouter'), 'website_url' => '', 'layout' => 'horizontal', 'colour' => '#da251c');
		
        $instance = wp_parse_args( (array) $instance, $defaults ); 

        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Baslik','webshouter' ); ?>:</label>
            <input class="widefat" style="border-radius:10px"  id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>
        
        <p>
            <label
                for="<?php echo $this->get_field_id( 'website_url' ); ?>"><?php _e( 'Website (google.com)','webshouter'); ?>:</label>
            <input class="widefat" style="border-radius:10px" id="<?php echo $this->get_field_id( 'website_url' ); ?>"
                   name="<?php echo $this->get_field_name( 'website_url' ); ?>" type="text"
                   value="<?php echo esc_attr( $instance['website_url'] ); ?>">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id( 'colour' ); ?>"><?php _e( 'Arkaplan Rengi','webshouter' ); ?>:</label>
            <input class="widefat" style="border-radius:10px" id="<?php echo $this->get_field_id( 'colour' ); ?>"
                   name="<?php echo $this->get_field_name( 'colour' ); ?>" type="text"
                   value="<?php echo esc_attr( $instance['colour'] ); ?>">
        </p>

		<p>
			 <label for="<?php echo $this->get_field_id('layout'); ?>" style="display:none;"><?php _e('Þekil','webshouter'); ?>:</label> 
			 <select id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>" style="display:none;">
			    
				
	 <option style="display:none;" <?php if ('vertical' == $instance['layout']) echo 'selected="selected"'; ?>>Vertical</option> 
			</select>
			</select>
		</p>	
		
	

    <?php
    }



public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']              = strip_tags( $new_instance['title'] );
		$instance['layout']      = strip_tags( strtolower($new_instance['layout']));
        $instance['website_url']      = strip_tags( $new_instance['website_url'] );
        $instance['colour']      = strip_tags( $new_instance['colour'] );
        
		return $instance;
    }

public function widget( $args, $instance ) {
        $title              = apply_filters( 'widget_title', $instance['title'] );
        $layout      = $instance['layout'];
        $website_url = $instance['website_url'];
		$colour = $instance['colour'];
		
        echo $args['before_widget'];
		
        if ( ! empty( $title ) ) {
        	
            echo $args['before_title'] . $title . $args['after_title'];
			
        }

$link ="https://data.alexa.com/data?cli=10&dat=snbamz&url=".$website_url;

 $dunya		='@<POPULARITY URL="'.$website_url.'/" TEXT="(.*?)" SOURCE="panel"/>@si';
 $turkiye	='@<COUNTRY CODE="TR" NAME="Turkey" RANK="(.*?)"/>@si';
$botara		= file_get_contents($link); 
preg_match_all($dunya,$botara,$dunyap);
preg_match_all($turkiye,$botara,$turkiyep);
 
$dunyapp	= $dunyap[1][0];
$turkiyepp	= $turkiyep[1][0];

$style=""; 
$kac = strlen($website_url);
if($kac > 16)
{ $style="font-size: 12pt;"; 
}
$noktali = number_format($dunyapp);
$noktali2 = number_format($turkiyepp);
		if($layout=="vertical"):
		
			$html .= '
<style>#kapsayici{width:100%}.ikon,.bilgi{font-family:"Titillium Web",sans-serif}.ikon{position:relative;z-index:2;width:100px;height:75px}.ikon img{width:75px;height:75px;border-radius:50%;overflow:hidden;top:-47%}.bilgi{background:'.$colour.';position:relative;height:40px;border-radius:0 50px 50px 0;display:inline-block;max-width:80%;top:-75px;left:39px}.bilgi a{color:#fff;font-size:25px;line-height:40px;padding-left:41px;padding-right:20px}
.bilgi a:hover{color:#fff;}
.backlink{font-family: "Titillium Web",sans-serif;
    position: relative;
    top: -60px;
    float: right;
color: white;
font-size: 13px;}
.backlink:hover{
color: white;
}
</style>
<div id="kapsayici">
<div class="ikon"><img src="http://i.hizliresim.com/1NZDAA.png" alt="site"></div>
		<div class="bilgi"><a style="'.$style.'">'.$website_url.'</style></a></div>
		<div class="ikon" style="
    top: -20px;
"><img src="http://i.hizliresim.com/Nk2gjO.png" alt="dunya"></div>
		<div class="bilgi" style="
    top: -95px;
"><a>'.$noktali.'</a></div>
		<div class="ikon" style="top: -35px"><img src="http://i.hizliresim.com/7A1Xj5.png" alt="ulke"></div>
		<div class="bilgi" style="top: -110px" ><a>'.$noktali2.'</a></div><div>

<a class="backlink" rel="dofollow" href="http://sefacengiz.com/alexa-siralama-eklentisi">Alexa Sýralama Eklentisi</a>

';
			
			echo $html;
		
		endif;
		
        echo $args['after_widget'];
    }

}

// register widget
function register_alexa_siralama_widget() {
	
    register_widget( 'ALEXA_SIRALAMA' );
	
}
add_action( 'widgets_init', 'register_alexa_siralama_widget' );




