<?php

/*
Plugin Name: Analog Clock WP-7
Plugin URI: http://www.styleseven.com/php/get_product.php?product=Analog%20Clock%20WP-7
Description: Original analog clock for decoration and show the current time 
Version: 1.0
Author: Style-7
Author URI: http://www.styleseven.com
License: A "Slug" license name e.g. GPL2
*/

class AnaloClockWP7 extends WP_Widget{
  function __construct(){
		parent::__construct(
			'analog_clock_wp7',  // Base ID
			'Analog Clock WP-7', // Name
			array( 'description' => __( 'Original analog clock for decoration and show the current time', 'text_domain' ), ) // Args
		);
	}
  
  function form($instance){
		$size = ! empty( $instance['size'] ) ? $instance['size'] : '192';
    $color = ! empty( $instance['color'] ) ? $instance['color'] : '#ff0000';
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Size (160-256):' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>" type="text" value="<?php echo esc_attr( $size ); ?>">
    
		<label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php _e( 'Secondary color:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" type="color" value="<?php echo esc_attr( $color ); ?>">    
		</p>
		<?php 
  }

  function update($new_instance, $old_instance){
    $instance = array();
    $instance['size'] = ( ! empty( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : '';
    $instance['color'] = ( ! empty( $new_instance['color'] ) ) ? strip_tags( $new_instance['color'] ) : '';
    return $instance;    
  }

  function widget($args, $instance){
?>
      <a href="http://www.styleseven.com" title="Get analog clock for your blog!">
        <canvas id="canvas_clock" width="256" height="256"></canvas>                    
      </a>

      <script type="text/javascript">
        pref_size = 192;
        pref_color = "#ff0000";
<?php
    if( !empty($instance['size']) ){
        echo "pref_size = ".$instance['size'].";";
    }
    if( !empty($instance['color']) ){
        echo 'pref_color = "'.$instance['color'].'";';
    }    
?>
        var _0x112a=["\x63\x61\x6E\x76\x61\x73\x5F\x63\x6C\x6F\x63\x6B","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x32\x64","\x67\x65\x74\x43\x6F\x6E\x74\x65\x78\x74","\x50\x49","\x77\x69\x64\x74\x68","\x68\x65\x69\x67\x68\x74","\x6C\x69\x6E\x65\x43\x61\x70","\x72\x6F\x75\x6E\x64","\x6D\x69\x6E","\x74\x65\x78\x74\x41\x6C\x69\x67\x6E","\x63\x65\x6E\x74\x65\x72","\x74\x65\x78\x74\x42\x61\x73\x65\x6C\x69\x6E\x65","\x6D\x69\x64\x64\x6C\x65","\x72\x67\x62\x28\x20\x31\x32\x38\x2C\x31\x32\x38\x2C\x31\x32\x38\x29","\x72\x67\x62\x28\x30\x2C\x30\x2C\x30\x29","\x72\x67\x62\x28\x32\x35\x35\x2C\x32\x35\x35\x2C\x32\x35\x35\x29","\x72\x67\x62\x28\x20\x32\x35\x35\x2C\x32\x35\x35\x2C\x32\x35\x35\x29","\x66\x6F\x6E\x74","","\x70\x78\x20\x61\x72\x69\x61\x6C","\x62\x65\x67\x69\x6E\x50\x61\x74\x68","\x6D\x6F\x76\x65\x54\x6F","\x6C\x69\x6E\x65\x57\x69\x64\x74\x68","\x6C\x69\x6E\x65\x54\x6F","\x73\x74\x72\x6F\x6B\x65\x53\x74\x79\x6C\x65","\x73\x74\x72\x6F\x6B\x65","\x66\x69\x6C\x6C\x53\x74\x79\x6C\x65","\x66\x69\x6C\x6C\x54\x65\x78\x74","\x53\x54\x59\x4C\x45\x53\x45\x56\x45\x4E\x2E\x43\x4F\x4D","\x67\x65\x74\x49\x6D\x61\x67\x65\x44\x61\x74\x61","\x70\x75\x74\x49\x6D\x61\x67\x65\x44\x61\x74\x61","\x73\x68\x61\x64\x6F\x77\x43\x6F\x6C\x6F\x72","\x72\x67\x62\x61\x28\x20\x30\x2C\x20\x30\x2C\x20\x30\x2C\x20\x30\x2E\x33\x29","\x73\x68\x61\x64\x6F\x77\x4F\x66\x66\x73\x65\x74\x58","\x73\x68\x61\x64\x6F\x77\x4F\x66\x66\x73\x65\x74\x59","\x73\x68\x61\x64\x6F\x77\x42\x6C\x75\x72","\x67\x65\x74\x48\x6F\x75\x72\x73","\x67\x65\x74\x4D\x69\x6E\x75\x74\x65\x73","\x72\x67\x62\x28\x20\x30\x2C\x30\x2C\x30\x29","\x61\x72\x63","\x63\x6C\x6F\x73\x65\x50\x61\x74\x68","\x66\x69\x6C\x6C","\x67\x65\x74\x53\x65\x63\x6F\x6E\x64\x73","\x73\x69\x6E","\x63\x6F\x73","\x63\x72\x65\x61\x74\x65\x4C\x69\x6E\x65\x61\x72\x47\x72\x61\x64\x69\x65\x6E\x74","\x61\x64\x64\x43\x6F\x6C\x6F\x72\x53\x74\x6F\x70"];canvas=document[_0x112a[1]](_0x112a[0]);context=canvas[_0x112a[3]](_0x112a[2]);radianPerGradus=2*Math[_0x112a[4]]/360;canvas[_0x112a[5]]=pref_size;canvas[_0x112a[6]]=pref_size;context[_0x112a[7]]=_0x112a[8];width=canvas[_0x112a[5]];height=canvas[_0x112a[6]];size=Math[_0x112a[9]](width,height);center=size/2;shadow_offset=size*0.013;context[_0x112a[10]]=_0x112a[11];context[_0x112a[12]]=_0x112a[13];text_dx=size*0.025;FillCircle(context,center,size,size*0.49,_0x112a[14],_0x112a[15]);FillCircle(context,center,size,size*0.465,_0x112a[15],_0x112a[14]);FillCircle(context,center,size,size*0.46,_0x112a[16],_0x112a[17]);context[_0x112a[18]]=_0x112a[19]+size*0.115+_0x112a[20];for(i=0;i<60;i++){angle=(6*i)*radianPerGradus;x=RotateX(angle,size*0.44,center);y=RotateY(angle,size*0.44,center);context[_0x112a[21]]();context[_0x112a[22]](x,y);if(i%5==0){context[_0x112a[23]]=size*0.01;x=RotateX(angle,size*0.41,center);y=RotateY(angle,size*0.41,center);}else {x=RotateX(angle,size*0.42,center);y=RotateY(angle,size*0.42,center);context[_0x112a[23]]=size*0.004;};context[_0x112a[24]](x,y);context[_0x112a[25]]=_0x112a[15];context[_0x112a[26]]();if(i%5==0){add_x=0;n=i/5;if(n==0){n=12};switch(n){case 3:add_x=text_dx;break ;;case 2:;case 4:add_x=text_dx/2;break ;;case 8:add_x=-text_dx/2;break ;;case 9:add_x= -text_dx;break ;;};x=RotateX(angle,size*0.34,center);y=RotateY(angle,size*0.34,center);context[_0x112a[27]]=_0x112a[15];context[_0x112a[28]](n,x+add_x,y);};};context[_0x112a[18]]=_0x112a[19]+size*0.04+_0x112a[20];context[_0x112a[28]](_0x112a[29],center,size*0.35);image_data=context[_0x112a[30]](0,0,size,size);DrawClock();setInterval(DrawClock,1000);function DrawClock(){context[_0x112a[31]](image_data,0,0);context[_0x112a[32]]=_0x112a[33];context[_0x112a[34]]=shadow_offset;context[_0x112a[35]]=shadow_offset;context[_0x112a[36]]=3;date= new Date();hour=date[_0x112a[37]]();if(hour>12){hour-=12};min=date[_0x112a[38]]();hour+=min/60;angle=(hour*360/12)*radianPerGradus;context[_0x112a[21]]();context[_0x112a[22]](center,center);x=RotateX(angle,size*0.28,center);y=RotateY(angle,size*0.28,center);context[_0x112a[24]](x,y);context[_0x112a[23]]=size*0.04;context[_0x112a[25]]=_0x112a[39];context[_0x112a[26]]();angle=(6*min)*radianPerGradus;context[_0x112a[21]]();context[_0x112a[22]](center,center);x=RotateX(angle,size*0.4,center);y=RotateY(angle,size*0.4,center);context[_0x112a[24]](x,y);context[_0x112a[23]]=size*0.03;context[_0x112a[26]]();context[_0x112a[21]]();context[_0x112a[40]](center,center,size*0.03,0,Math[_0x112a[4]]*2,false);context[_0x112a[41]]();context[_0x112a[27]]=_0x112a[39];context[_0x112a[42]]();angle=(6*date[_0x112a[43]]())*radianPerGradus;context[_0x112a[21]]();context[_0x112a[22]](center,center);x=RotateX(angle,size*0.4,center);y=RotateY(angle,size*0.4,center);context[_0x112a[24]](x,y);context[_0x112a[23]]=size*0.01;context[_0x112a[25]]=pref_color;context[_0x112a[26]]();angle=((6*date[_0x112a[43]]())+180)*radianPerGradus;context[_0x112a[21]]();context[_0x112a[22]](center,center);x=RotateX(angle,size*0.16,center);y=RotateY(angle,size*0.16,center);context[_0x112a[24]](x,y);context[_0x112a[23]]=size*0.022;context[_0x112a[26]]();context[_0x112a[32]]=_0x112a[19];context[_0x112a[34]]=0;context[_0x112a[35]]=0;context[_0x112a[36]]=0;context[_0x112a[21]]();context[_0x112a[40]](center,center,size*0.02,0,Math[_0x112a[4]]*2,false);context[_0x112a[41]]();context[_0x112a[27]]=pref_color;context[_0x112a[42]]();}function RotateX(_0x4de5x3,_0x4de5x4,_0x4de5x5){return _0x4de5x5+_0x4de5x4*Math[_0x112a[44]](_0x4de5x3)}function RotateY(_0x4de5x3,_0x4de5x4,_0x4de5x5){return _0x4de5x5-_0x4de5x4*Math[_0x112a[45]](_0x4de5x3)}function FillCircle(_0x4de5x8,_0x4de5x5,_0x4de5x9,_0x4de5x4,_0x4de5xa,_0x4de5xb){_0x4de5x8[_0x112a[21]]();_0x4de5x8[_0x112a[40]](_0x4de5x5,_0x4de5x5,_0x4de5x4,0,Math[_0x112a[4]]*2,false);_0x4de5x8[_0x112a[41]]();_0x4de5x8[_0x112a[27]]=_0x112a[15];_0x4de5x8[_0x112a[42]]();gradient=_0x4de5x8[_0x112a[46]](0,0,_0x4de5x9,_0x4de5x9);gradient[_0x112a[47]](0,_0x4de5xa);gradient[_0x112a[47]](1,_0x4de5xb);_0x4de5x8[_0x112a[27]]=gradient;_0x4de5x8[_0x112a[42]]();}              
      </script>                     
<?php    
  }
}
//call register widget
add_action( 'widgets_init', create_function('', 'return register_widget("AnaloClockWP7");') );
?>