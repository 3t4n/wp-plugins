<?php

class themoneytizer_space_widget extends WP_Widget {
    public function __construct(){
        parent::__construct(
    'themoneytizer_widget', // ID
			'The Moneytizer', // Nom
			      array( 'description' => __('Insérer un espace The Moneytizer sur votre site','themoneytizer'), ) // Args
		    );
    }

    public function widget($args, $instance){
        $api = new themoneytizer_API();
        $display = $api->getSpace($instance['ad_slot']);

        echo $args['before_widget'];
        echo $args['before_title'];
        echo apply_filters('widget_title', $instance['title']);
        echo $args['after_title'];
        echo $display;
        echo $args['after_widget'];
	  }

    public function form($instance){
        $array_formats = array(
            '1'=>'MEGABANNER',
            '2'=>'PAVE HAUT',
            '3'=>'GRAND ANGLE',
            '4'=>'SKYSCRAPER',
            '10'=>'CONTENU VIDEO',
            '16'=>'RECO CONTENUS',
            '19'=>'PAVE BAS',
            '20'=>'MEGASKYSCRAPER',
            '25'=>'NATIVE ARTICLE',
            '26'=>'PAVE MILIEU',
            '28'=>'MEGABANNER BAS',
            '31'=>'BILLBOARD'
        );

		    $array_formats_en = array(
            '1'=>'TOP MEGABANNER',
            '2'=>'TOP MEDIUM RECTANGLE',
            '3'=>'HALF PAGE',
            '4'=>'SKYSCRAPER',
            '10'=>'VIDEO CONTENT',
            '16'=>'RECOMMENDED CONTENT',
            '19'=>'BOTTOM MEDIUM RECTANGLE',
            '20'=>'MEGASKYSCRAPER',
            '25'=>'NATIVE ARTICLE',
            '26'=>'MIDDLE MEDIUM RECTANGLE',
            '28'=>'BOTTOM MEGABANNER',
            '31'=>'BILLBOARD'
        );
	      $title = isset($instance['title']) ? $instance['title'] : '';
	      $ad_slot = isset($instance['ad_slot']) ? $instance['ad_slot'] : '';
?>
      <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ,'themoneytizer'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title; ?>" />
        <br/><br/>
        <label for="<?php _e($this->get_field_name( 'ad_slot' ),'themoneytizer'); ?>"><?php _e( 'Choisissez l\'emplacement :' ,'themoneytizer'); ?></label>
        <select class="widefat" id="<?php echo $this->get_field_id( 'ad_slot' ); ?>" name="<?php _e( $this->get_field_name( 'ad_slot' ),'themoneytizer'); ?>">
          <?php
            $api = new themoneytizer_API();
            $website = $api->getWebsite(get_option('themoneytizer_setting_token'));
            $spaces = $website->site_tags;
            if(!is_null($spaces)) {
              if($ad_slot != ''){
                $ad_slot = explode('-',$ad_slot);
                $site_id = $ad_slot[0];
                $ad_id = $ad_slot[1];
                if(get_locale() == "fr_FR"){
                  echo '<option selected data-token="'.$site_id."-".$ad_id.'" value="'.$site_id."-".$ad_id.'"><b>'.$array_formats[$ad_id].'</b></option>';
                }else{
                  echo '<option selected data-token="'.$site_id."-".$ad_id.'" value="'.$site_id."-".$ad_id.'"><b>'.$array_formats_en[$ad_id].'</b></option>';
                }
              }
              foreach ($spaces as $space) {
                if($space->tag_type == 0 && $space->tag_name == $space->form_name){
                  $token = $website->site_id.'-'.$space->ad_id;
                    echo '<option data-token="'.$token.'" value="'.$token.'"><b>';							_e($space->tag_name,'themoneytizer');							echo '</b></option>';
                }
              }
            }
          ?>
        </select><br/>
      </p>
<?php }
    private function getSpaces(){
        $api = new themoneytizer_API();
        $website = $api->getWebsite(get_option('themoneytizer_setting_token'));
        $spaces = $website->spaces;
        return $spaces;
    }
}

function themoneytizer_register_widget() {
	register_widget( 'themoneytizer_space_widget' );
}

add_action( 'widgets_init', 'themoneytizer_register_widget' );
