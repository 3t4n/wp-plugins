<?php
	function Juna_IT_Video_Gallery_GET_Shortcode_ID($atts, $content = null)
	{
		$atts=shortcode_atts(
			array(
				"id"=>"1"
			),$atts
		);
		return Juna_IT_Video_Gallery_Draw_Shortcode($atts['id']);
	}
	add_shortcode('Juna_Video_Gallery', 'Juna_IT_Video_Gallery_GET_Shortcode_ID');
	function Juna_IT_Video_Gallery_Draw_Shortcode($Gid)
	{
		ob_start();	
			$args = shortcode_atts(array('name' => 'Widget Area','id'=>'hopar_1','description'=>'','class'=>'','before_widget'=>'','after_widget'=>'','before_title'=>'','AFTER_TITLE'=>'','widget_id'=>'1','widget_name'=>'Juna_IT_Video_Gallery'), $atts, 'Juna_IT_Video_Gallery' );
			$Juna_IT_Video_Gallery=new Juna_IT_Video_Gallery;
			$instance=array('gallery_title'=>$Gid);
			$Juna_IT_Video_Gallery->widget($args,$instance);	
			$cont[]= ob_get_contents();
		ob_end_clean();	
		return $cont[0];		
	}
?>