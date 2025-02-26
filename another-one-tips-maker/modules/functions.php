<?php 

function wts_generate_tip( $id, $atts = false ){

	// atts filtering
	if( isset($atts['align']) ){
		$al_patch = 'float:'.$atts['align'].';';
	}
	if( isset($atts['width']) ){
		$w_patch = 'width:'.$atts['width'].'px;';
	}
	

	$out = '
	<div class="tw-bs tip_container tip_preview tipid_'.$id.'" >
			<div class="tip_icon">
				<i class="feat_icon glyphicon '.get_post_meta( $id, 'icon_input', true ).'" ></i>
			</div>
			<div class="tip_title" >'.get_post_meta( $id, 'tip_title', true ).'</div>
			<div class="tip_content">'.get_post_meta( $id, 'tip_content', true ).'</div>
		</div>
	<style>
	.tipid_'.$id.'{
		'.$al_patch.'
		'.$w_patch.'
		margin:'.get_post_meta( $id, 'cont_margin', true ).';
		padding:'.get_post_meta( $id, 'cont_padding', true ).';
		border:'.get_post_meta( $id, 'border_width', true ).'px solid #'.get_post_meta( $id, 'border_color', true ).';
		border-radius:'.get_post_meta( $id, 'border_radius', true ).'px;
		-webkit-border-radius:'.get_post_meta( $id, 'border_radius', true ).'px;
		-moz-border-radius:'.get_post_meta( $id, 'border_radius', true ).'px;

		'.( get_post_meta( $id, 'bg_type', true ) == 'image' ? 'background: url('.get_post_meta( $id, 'bg_image', true ).'); background-size:cover; ' : '' ).'
		'.( get_post_meta( $id, 'bg_type', true ) == 'color' ? 'background: #'.get_post_meta( $id, 'bg_color', true ).';' : '' ).'
		
	}
	.tipid_'.$id.' .tip_title, .tipid_'.$id.' .tip_content{
		margin:'.get_post_meta( $id, 'blocks_margin', true ).';
		
	}
	
	/*********************************/
	.tipid_'.$id.' .tip_icon{
		'.( get_post_meta( $id, 'icon_pos', true ) == 'none' ? ' display:none; ' : '' ).'
		'.( get_post_meta( $id, 'icon_pos', true ) != 'none' ? ' float:'.get_post_meta( $id, 'icon_pos', true ).'; ' : '' ).'
		font-size:'.get_post_meta( $id, 'icon_size', true ).';
		line-height:'.get_post_meta( $id, 'icon_size', true ).';
		color:#'.get_post_meta( $id, 'icon_color', true ).';
		margin:'.get_post_meta( $id, 'icon_margin', true ).';
	}
	
	/**************************/
	
	.tipid_'.$id.' .tip_title{
		font-size:'.get_post_meta( $id, 'title_size', true ).';
		line-height:'.get_post_meta( $id, 'title_line_height', true ).';		
		color:#'.get_post_meta( $id, 'title_color', true ).';
		text-align:'.get_post_meta( $id, 'title_align', true ).';
	}
	
	/**************************/
	.tipid_'.$id.' .tip_content{
		font-size:'.get_post_meta( $id, 'content_size', true ).';
		line-height:'.get_post_meta( $id, 'content_line_height', true ).';
		color:#'.get_post_meta( $id, 'content_color', true ).';
		text-align:'.get_post_meta( $id, 'content_align', true ).';
		
	}
	
	/******************************/
	@media only screen and (max-width: 400px) {
		.tipid_'.$id.' .tip_icon{
			float:none;
			text-align:center;
		}
	}
	
	
	</style>
	';
	return $out;
}

?>