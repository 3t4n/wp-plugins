<?php if ( ! defined( 'ABSPATH' ) ) exit;

class Icon_Text_Widget extends WP_Widget {
	
	public $valic=125;
	
	function __construct() {

		parent::__construct(

			'Icon_Text_Widget', // Base ID

			__('Phoeniixx Icons with Texts'), // Title Name

			array(

				'description' => __( 'Add Font awesome icons to your website.', 'fwit' ), 

			),

			array(

				'width' => 600,

			)
			 

		);
		add_action( 'admin_footer-widgets.php', array( $this, 'phoen_admin_scripts' ), 9999 );
		
	}

	
	
	//display Icons on frontend
	
	function widget( $args, $instance ) {
				
		echo $args['before_widget']; 
		
					
		 $widget_id = $args['widget_id'];	
		$unique_id="fwit ".$args['widget_id'];	
		
			 
		?>
		
		<div class="list-group">

			<h2 class="widget-title"> <?php  echo $instance['widtitle'];?> 

			</h2>

			<?php

			$count = 0;

			for($i=0;$i<=$this->valic;$i++)
			{

				$icon = 'icon' . $count;

				$title = 'title' . $count;

				$url = 'url' . $count; 

				if($instance[$icon]!="")
				{
				
				
					if($instance['fontposition']=="after")
					{
					 	?>
				
					<div class="phoen_widget_dashicon<?php echo $widget_id;?>" ><a class="list-group-item" style="display:table;" href="//<?php echo $instance[$url];?>">
								
							<span class="icons<?php echo $count;?>"><i class="fa <?php echo $instance[$icon];?> fa-fw" aria-hidden="true"></i></span>
								
							<span class="text<?php echo $count;?>"><?php echo $instance[$title];?></span></a></div>
											
						
						
						<?php 
					}
					
					if($instance['fontposition']=="before")
					{
						?>
				
						<div class="phoen_widget_dashicon<?php echo $widget_id;?>" ><a class="list-group-item" href="//<?php echo $instance[$url];?>">
						 
						 <span class="text<?php echo $count;?>"><?php echo $instance[$title];?></span>
						 
						 <span class="icons<?php echo $count;?>"><i class="fa <?php echo $instance[$icon];?> fa-fw" aria-hidden="true"></i></span>
						 
						 </a></div>
						


						<?php 
					}
					
					if($instance['fontposition']=="below")
					{
						
						?>
				
						<div class="phoen_widget_dashicon<?php echo $widget_id;?>" style="text-align:center;" ><a class="list-group-item" href="//<?php echo $instance[$url];?>">
						 
						 <span class="icon-top<?php echo $count;?>"><i class="fa <?php echo $instance[$icon];?> fa-fw" aria-hidden="true"></i></span>
						 
						 <span class="text-top<?php echo $count;?>"><?php echo $instance[$title];?></span></a></div>
						
						<?php 
					}
				
				
				?>
					
			<style>
			<?php if($instance['display']=="horizontal")
			{ ?>
			.phoen_widget_dashicon<?php echo $widget_id; ?>{ display: inline-block;} 
		<?php	} 	?>
		
		
			    
				.phoen_widget_dashicon<?php echo $widget_id;?>  a.list-group-item{ box-shadow:none!important;}
				
				.phoen_widget_dashicon<?php echo $widget_id;?> a{  font-size:<?php // echo $instance['fontsize']."px";?>; color:<?php echo $instance['iconbccol']  ?>; border:none; text-decoration:none;}

				.phoen_widget_dashicon<?php echo $widget_id;?> .list-group-item {display:table; text-align:center; border:none!important; padding:0!important;}

				.phoen_widget_dashicon<?php echo $widget_id;?> a:hover{ color:<?php  echo $instance['iconhcol']  ?>; background-color:transparent;}

				.phoen_widget_dashicon<?php echo $widget_id;?> a.list-group-item span.icons<?php echo $count;?> { display:table-cell; padding:<?php echo $instance['topmargin']."px"." ".$instance['rightmargin']."px"." ".$instance['bottommargin']."px"." ".$instance['leftmargin']."px"; ?>; font-size:<?php echo $instance['iconsize']."px";?>; color:<?php echo $instance['iconbccol'] ?>;}

				.phoen_widget_dashicon<?php echo $widget_id;?> a.list-group-item:hover span.icons<?php echo $count;?> { color:<?php echo $instance['iconhcol'] ?>;}

				.phoen_widget_dashicon<?php echo $widget_id;?> a.list-group-item span.text<?php echo $count;?> { padding: <?php echo $instance['fonttopmargin']."px"." ".$instance['fontrightmargin']."px"." ".$instance['fontbottommargin']."px"." ".$instance['fontleftmargin']."px"; ?>; vertical-align:middle; display:table-cell; font-size:<?php echo $instance['fontsize']."px";?>; color:<?php echo $instance['fontbccol'] ?>;}

				.phoen_widget_dashicon<?php echo $widget_id;?> a.list-group-item:hover span.text<?php echo $count;?> { color:<?php echo $instance['fonthcol'] ?>;}

				.phoen_widget_dashicon<?php echo $widget_id;?> a.list-group-item span.icon-top<?php echo $count;?> { display:block; padding:<?php  echo $instance['topmargin']."px"." ".$instance['rightmargin']."px"." ".$instance['bottommargin']."px"." ".$instance['leftmargin']."px"; ?>; font-size:<?php echo $instance['iconsize']."px";?>; color:<?php echo $instance['iconbccol'] ?>;}

				.phoen_widget_dashicon<?php echo $widget_id;?> a.list-group-item:hover span.icon-top<?php echo $count;?> { color:<?php echo $instance['iconhcol'] ?>;}

				.phoen_widget_dashicon<?php echo $widget_id;?> a.list-group-item span.text-top<?php echo $count;?> { padding:<?php echo $instance['fonttopmargin']."px"." ".$instance['fontrightmargin']."px"." ".$instance['fontbottommargin']."px"." ".$instance['fontleftmargin']."px"; ?>; vertical-align:middle; display:block; font-size:<?php echo $instance['fontsize']."px";?>; color:<?php echo $instance['fontbccol'] ?>;}

				.phoen_widget_dashicon<?php echo $widget_id;?> a.list-group-item:hover span.text-top<?php echo $count;?>{ color:<?php echo $instance['fonthcol'] ?>;}
			
			</style>  
			
				<?php
				}
			
			$count++;
			
			}
			?></div><?php
			echo $args['after_widget'];

	}
	
	// display content on backend
	
	public function form( $instance ) {
		
			
	?>
		
		
		<div class="phoen-widget-general-tab" style="text-align:left;" >

		<br/>
				
			<input  class="widefat" placeholder="Enter Title Here"  name="<?php echo $this->get_field_name( 'widtitle' ); ?>" type="text" value="<?php echo esc_attr($instance['widtitle'] ); ?>">
		<br>
				<?php 

				// this loop gives unique name to icon, title and URL fields.
				
				$count = 0;
				
				for($i=0;$i<=$this->valic;$i++)
				
				{
						$icon = 'icon' . $count;

						$title = 'title' . $count;

						$url = 'url' . $count;
												
						?>
						<p class="fwit-container" data-id="<?php echo $count; ?>">
											
							<input class="phoe_icons iconbrowse<?php echo $count; ?> social-item" placeholder="Browse icon" style="max-width:130px;" id="<?php echo $this->get_field_id( $icon ); ?>" name="<?php echo $this->get_field_name( $icon ); ?>" type="text" value="<?php echo esc_attr( $instance[$icon] ); ?>">
							
							<input class="widefat right " placeholder="Title" style="max-width:130px;" id="icontitle" name="<?php echo $this->get_field_name( $title ); ?>" type="text" value="<?php echo esc_attr( $instance[$title] ); ?>">
							
							<input class="widefat right " placeholder="URL" style="max-width:130px;" id="iconurl" name="<?php echo $this->get_field_name( $url ); ?>" type="text" value="<?php echo esc_attr( $instance[$url]);?>">
							
							<a href="" onclick="event.preventDefault();" class="remove_field">Remove </a>

						</p>
					<?php

					$count++;
				}
				
				?>
				<br>
				<button onclick="event.preventDefault();fwitAddIcon(this)" class="button button-primary add-fwit-row <?php echo $id;?>" data-id="<?php echo $id;?>" style="margin-bottom:10px;"><?php _e( 'Add Icon','fwit' ); ?></button>
		</div>
				
		<div class="phoen-widget-setting-tab" style="text-align:left;"> 

			<table class="form-table">
			
				<tbody>

					 <tr class="user-user-login-wrap">

						<th width="200px"> Display</th>
							
					
							<td> <select   class="widefat"  name="<?php echo $this->get_field_name( 'display' );?>" style="width: 100px;"value="<?php echo esc_attr($instance['diaplay'] );?>">
							
									<option value="horizontal"<?php if($instance['display']=="horizontal") echo 'selected="selected"';?>>Horizontal</option>

									<option value="vertical"<?php if($instance['display']=="vertical") echo 'selected="selected"';?> >Vertical</option>
									
									
								</select>	</td>

					</tr> 
				<tbody>
					
			
			
				<tbody>

					 <tr class="user-user-login-wrap">

						<th width="200px"> Text Padding</th>
							
						<td><input  class="widefat" placeholder="TOP" style="max-width:65px;font-size:12px;" name="<?php echo $this->get_field_name( 'fonttopmargin' );?>" 	type="number" min="0" value="<?php echo (esc_attr($instance['fonttopmargin'] ));?>">
								
							<input  class="widefat" placeholder="RIGHT" style="max-width:65px;font-size:12px;" name="<?php echo $this->get_field_name( 'fontrightmargin' );?>" 	type="number" min="0" value="<?php echo esc_attr($instance['fontrightmargin'] );?>">

							<input  class="widefat" placeholder="BOTTOM" style="max-width:65px;font-size:12px;" name="<?php echo $this->get_field_name( 'fontbottommargin' );?>" 	type="number" min="0"  value="<?php echo esc_attr($instance['fontbottommargin'] );?>">
								
							<input  class="widefat bordered" placeholder="LEFT" style="max-width:65px;font-size:12px;" name="<?php echo $this->get_field_name( 'fontleftmargin' );?>" 	type="number"  min="0" value="<?php echo esc_attr($instance['fontleftmargin'] );?>"><span class="pixel-11">px</span>

						</td>

					</tr> 
				<tbody>
					
					<tr class="user-user-login-wrap">

						<th> Text Position</th>
							
							<td> <select   class="widefat"  name="<?php echo $this->get_field_name( 'fontposition' );?>" style="width: 100px;"value="<?php echo esc_attr($instance['fontposition'] );?>">
							
									<option value="after"<?php if($instance['fontposition']=="after") echo 'selected="selected"';?>>After Icon</option>

									<option value="before"<?php if($instance['fontposition']=="before") echo 'selected="selected"';?> >Before Icon</option>
									
									<option value="below" <?php if($instance['fontposition']=="below") echo 'selected="selected"';?>>Below Icon</option>
								</select>
							
							</td>

					</tr>
					
				</tbody>
				
				<tbody>

					<tr class="user-user-login-wrap">

						<th width="200px"> Text Font Size</th>
						
						<td> <input  class="widefat bordered" placeholder="Text size" style="max-width:90px;" min="0" name="<?php echo $this->get_field_name( 'fontsize' );?>" 	type="number" value="<?php echo esc_attr($instance['fontsize'] );?>"><span class="pixel1">px</span>
						
						</td>

					</tr>
					
				</tbody>
				
				<tbody>

					<tr class="user-user-login-wrap">

						<th width="200px"> Text color

						</th>
						
						<td> <input  class="widefat color-picker" placeholder=""  name="<?php echo $this->get_field_name( 'fontbccol' ); ?>" type="text" value="<?php echo esc_attr($instance['fontbccol'] ); ?>">

						</td>

					</tr>
					
				</tbody>
				
				<tbody>
				
					<tr class="user-user-login-wrap">
						
						<th width="200px"> Text Hover color

						</th>
						
						<td> <input  class="widefat color-picker" placeholder=""  name="<?php echo $this->get_field_name( 'fonthcol' ); ?>" type="text" value="<?php echo esc_attr($instance['fonthcol'] ); ?>">

						</td>

					</tr>

				</tbody>

			</table>

		<hr>
				
			<table class="form-table">

				<tbody>

					<tr class="user-user-login-wrap">

						<th width="200px"> Icon Padding</th>
							
						<td><input  class="widefat" placeholder="TOP" style="max-width:60px;font-size:12px;" min="0" name="<?php echo $this->get_field_name( 'topmargin' );?>" 	type="number" value="<?php echo esc_attr($instance['topmargin'] );?>">
								
							<input  class="widefat" placeholder="RIGHT" style="max-width:65px;font-size:12px;" min="0" name="<?php echo $this->get_field_name( 'rightmargin' );?>" 	type="number" value="<?php echo esc_attr($instance['rightmargin'] );?>">

							<input  class="widefat" placeholder="BOTTOM" style="max-width:65px;font-size:12px;" min="0" name="<?php echo $this->get_field_name( 'bottommargin' );?>" 	type="number" value="<?php echo esc_attr($instance['bottommargin'] );?>">
								
							<input  class="widefat bordered" placeholder="LEFT" style="max-width:65px;font-size:12px;" min="0" name="<?php echo $this->get_field_name( 'leftmargin' );?>" 	type="number" value="<?php echo esc_attr($instance['leftmargin'] );?>"><span class="pixel-11">px</span>

						</td>

					</tr>
					
					<tr class="user-user-login-wrap">

						<th width="200px"> Icon Size</th>
						
						<td> <input  class="widefat bordered" placeholder="Icon size" style="max-width:110px;" min="0" name="<?php echo $this->get_field_name( 'iconsize' );?>" 	type="number" value="<?php echo esc_attr($instance['iconsize'] );?>"><span class="pixel1">px</span>
						
						</td>

					</tr>

					<tr class="user-user-login-wrap">

						<th width="200px"> Icon color

						</th>
						
						<td> <input  class="widefat color-picker" placeholder=""  name="<?php echo $this->get_field_name( 'iconbccol' ); ?>" type="text" value="<?php echo esc_attr($instance['iconbccol'] ); ?>">

						</td>

					</tr>

					<tr class="user-user-login-wrap">
						
						<th width="200px"> Icon Hover color

						</th>
						
						<td> <input  class="widefat color-picker" placeholder=""  name="<?php echo $this->get_field_name( 'iconhcol' ); ?>" type="text" value="<?php echo esc_attr($instance['iconhcol'] ); ?>">

						</td>
						<td><input type='hidden' value=''></td>

					</tr>
					

				</tbody>

			</table>
		</div>
			
			<script>
				
    		
			jQuery(document).ready(function () {
					
					jQuery('.panel-dialog').find('.color-picker').wpColorPicker(); 
													
					jQuery('.phoe_icons').mouseenter(function(){
						 
						jQuery(this).iconpicker();
								
					});
					 
					jQuery(document).on('click','.remove_field',function(){

						jQuery(this).parent('.fwit-container').remove();
						
					 });
						
					//Action perform when click on Tab 
					
				jQuery( '.social-item' ).each( function( index ) {

						if( ! jQuery(this).val() ) {

							jQuery( this ).parent().hide();
						}
					});
				});
				
				
				//add new textfields for adding icon, title and url

				function fwitAddIcon(elem,count) {

					jQuery( elem ).siblings('p:hidden:first').show();
					
					var id = jQuery( elem ).siblings('p:hidden:first').attr('data-id');
					
					jQuery('.iconbrowse'+id).iconpicker();
					
						
				}
										
									
			</script>
					
					<?php
		
	}

	public function phoen_admin_scripts() {
	 ?>
		<script>
		
	
			jQuery(document).ready(function($){
				
				 function phoen_updateColorPickers(){
					
					$('#widgets-right .color-picker, #accordion-panel-widgets .color-picker').each(function(){
						$(this).wpColorPicker({
							// you can declare a default color here,
							// or in the data-default-color attribute on the input
							defaultColor: false,
							// a callback to fire whenever the color changes to a valid color
							change: function(event, ui){},
							// a callback to fire when the input is emptied or an invalid color
							clear: function() {},
							// hide the color picker controls on load
							hide: true,
						});
					}); 
				}
				
				phoen_updateColorPickers();  
				
				$(document).ajaxSuccess(function(e, xhr, settings) {
					
					if (typeof settings.data.search !== 'undefined' && $.isFunction(settings.data.search)) {
						
						if(settings.data.search('action=save-widget') != -1 ) { 
						
							$('.color-field .wp-picker-container').remove();  
							
							phoen_updateColorPickers();
						}
					}
				}); 
			});
			
		</script>
		
		<?php
	}
	
	
	// Save data in database
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$count = 0;

		for($i=0;$i<=$this->valic;$i++)
		
		{
					
			$icon = 'icon' . $count;

			$title = 'title' . $count;

			$url = 'url' . $count;
			
			if($new_instance[$icon]=="")
			{
				$count++;
				
				$icon = 'icon' . $count;

				$title = 'title' . $count;

				$url = 'url' . $count;
			
			}
						
			$instance['icon'.$i] = strip_tags( $new_instance[$icon] );

			$instance['title'.$i] = strip_tags( $new_instance[$title] );

			$instance['url'.$i] = strip_tags( $new_instance[$url] );
			
			$count++;

		}
		$instance['display']=strip_tags( $new_instance['display'] );

		$instance['fontposition']=strip_tags( $new_instance['fontposition'] );

		$instance['fontsize']=strip_tags( $new_instance['fontsize'] );

		$instance['iconbccol']=strip_tags( $new_instance['iconbccol'] );

		$instance['iconhcol']=strip_tags( $new_instance['iconhcol'] );

	  	$instance['iconsize']=strip_tags( $new_instance['iconsize'] );

		$instance['fontbccol']=strip_tags( $new_instance['fontbccol'] );

		$instance['fonthcol']=strip_tags( $new_instance['fonthcol'] );

		$instance['widtitle']=strip_tags( $new_instance['widtitle'] );
		
		if ( $new_instance['leftmargin'] =="")
		{
			$instance['leftmargin']="0";
			
		}
		else
		{

		$instance['leftmargin']=strip_tags( $new_instance['leftmargin'] );
		}

		if ( $new_instance['rightmargin'] =="")
		{
			$instance['rightmargin']="0";
			
		}
		else
		{

	$instance['rightmargin']=strip_tags( $new_instance['rightmargin'] );
	}

		
		if ( $new_instance['topmargin'] =="")
		{
			$instance['topmargin']="0";
			
		}
		else
		{

		$instance['topmargin']=strip_tags( $new_instance['topmargin'] );
	}

		if ( $new_instance['bottommargin'] =="")
		{
			$instance['bottommargin']="0";
			
		}
		else
		{

		$instance['bottommargin']=strip_tags( $new_instance['bottommargin'] );
	}
		

if ( $new_instance['fonttopmargin'] =="")
		{
			$instance['fonttopmargin']="0";
			
		}
		else
		{

		$instance['fonttopmargin']=strip_tags( $new_instance['fonttopmargin'] );
	}
		
		
		
		if ( $new_instance['fontleftmargin'] =="")
		{
			$instance['fontleftmargin']="0";
			
		}
		else
		{

		$instance['fontleftmargin']=strip_tags( $new_instance['fontleftmargin'] );
	}

if ( $new_instance['fontrightmargin'] =="")
		{
			$instance['fontrightmargin']="0";
			
		}
		else
		{

		$instance['fontrightmargin']=strip_tags( $new_instance['fontrightmargin'] );
	}
		

		if ( $new_instance['fontbottommargin'] =="")
		{
			$instance['fontbottommargin']="0";
			
		}
		else
		{

		$instance['fontbottommargin']=strip_tags( $new_instance['fontbottommargin'] );
	}
			return $instance;
		
		
	}
	
//end of class	
}

//register the class
function icon_text_register_widget() {

    register_widget( 'Icon_Text_Widget' );

}

$gen_settings = get_option('phoen_icon_with_text');

if(isset($gen_settings) && $gen_settings == '1'){

	add_action( 'widgets_init', 'icon_text_register_widget' );
}

	add_action('wp_head','icons_display_frontend');

// include library to frontend
	function icons_display_frontend(){
		
		wp_enqueue_style('phoenixx_font-awesome55', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
		
} ?>