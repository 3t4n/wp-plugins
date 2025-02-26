<?php  if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="plbp_login-editor-wrapper">
	<div class="plpb_accordion_wrapper">

		<!-- Accordion Items Start Here -->

		<?php do_action( "fpolpb_before_options" ) ?>

		<h4> <?php echo __('Templates', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div class="templates_options_panel login_options_panel">
				
				<div class="polpb_template_card">
					<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/templates/00.png">
					<p>Default Template</p>
					<div class="template_select_btn" data-templateID="0"> Select Template</div>
				</div>


				<div class="polpb_template_card">
					<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/templates/01.png">
					<p>Starry Night</p>
					<div class="template_select_btn" data-templateID="1"> Select Template</div>
				</div>


				<div class="polpb_template_card">
					<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/templates/02.png">
					<p>Restaurant</p>
					<div class="template_select_btn" data-templateID="2"> Select Template</div>
				</div>


				<div class="polpb_template_card">
					<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/templates/03.png">
					<p>Digital Agency</p> 
					<div class="template_select_btn" data-templateID="3"> Select Template</div>
				</div>


				<div class="polpb_template_card">
					<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/templates/04.png">
					<p>Influencer</p> 
					<div class="template_select_btn" data-templateID="4"> Select Template</div>
				</div>


				<div class="polpb_template_card">
					<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/templates/05.png">
					<p>Healthy Foods</p>
					<div class="template_select_btn" data-templateID="5"> Select Template</div>
				</div>

				<div class="polpb_template_card">
					<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/templates/06.png">
					<p>Fashion Blog</p>
					<div class="template_select_btn" data-templateID="6"> Select Template</div>
				</div>

				<div class="polpb_template_card">
					<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/templates/07.png">
					<p>Female Influencer</p>
					<div class="template_select_btn" data-templateID="7"> Select Template</div>
				</div>

			</div>

		</div>

		<h4> <?php echo __('Logo Options', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div class="logo_options_panel login_options_panel">
				
				<label> Hide Logo </label>
				<select data-optname="logo.hideLogo">
					<option value="false">No</option>
					<option value="true">Yes</option>
				</select>

				<br><br><hr><br>
				<div class="image_preview_wrapper">
					<img src="#" class="image_upload_preview01 image_upload_preview logoImagePreview">
					<div class="image_preview_close_btn"> <span class="dashicons dashicons-no-alt"></span> </div>
				</div>
				<br>
				<input type="text" class="imageUploadFeild upload_image_button01" data-optname="logo.logoImage" placeholder="Image URL" style="width:95%;" >
				<br>
				<input type="button" class="upload_bg image_upload_button" data-id="01" value="Select Image" />
				<br><br>
               
				<br><br><hr><br>
				<label> Image Width </label>
				<input type="number" data-optname="logo.logoImageWidth" placeholder="In pixels">

				<br><br><hr><br>
				<label> Image Height </label>
				<input type="number" data-optname="logo.logoImageHeight" placeholder="In pixels">

				<br><br><hr><br>
				<label> Logo Alignment </label>
				<select data-optname="logo.logoAlignment">
					<option value="center">Center</option>
					<option value="left">Left</option>
					<option value="right">Right</option>
				</select>

				<br><br><hr><br>
				<label>Logo Link </label>
				<input type="url" class="fullWidthField" data-optname="logo.logoLink" placeholder="URL">

				<br><br><br><br><hr><br>
				<label>Logo Title </label>
				<input type="text" data-optname="logo.logoTitle" placeholder="Title Attr">

				<br><br><hr><br>
				

			</div>

		</div>

		<h4> <?php echo __('Background Options', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div class="logo_options_panel login_options_panel">
				
				<label> Bg Type </label>
				<select data-optname="bgOps.bgType">
					<option value="solid">Solid</option>
					<option value="gradient">Gradient</option>
					<option value="image">Image</option>
				</select>

				<div class="bgColorOpContainer" style="display: none;">
					<br><br><hr><br>
					<label>Bg Color</label>
					<input type="text" class="bgColor colorPicker" data-optname="bgOps.bgColor">
				</div>

				<div class="bgGradOpContainer" style="display: none;">

					<br><br><hr><br>
					<label>First Color </label>
					<input type="text" class="colorPicker" data-optname="bgOps.bgGradient.bgGr1Color">

					<br><br><hr><br>
					<label>Location</label>
					<input type="number" data-optname="bgOps.bgGradient.bgGr1Loc">

					<br><br><hr><br>
					<label>Second Color </label>
					<input type="text" class="bgGr2Color colorPicker" data-optname="bgOps.bgGradient.bgGr2Color">

					<br><br><hr><br>
					<label>Location</label>
					<input type="number" class="bgGr2Loc" data-optname="bgOps.bgGradient.bgGr2Loc">

					<br><br><hr><br>
					<label>Gradient Type </label>
                    <select class="bgGrType" data-optname="bgOps.bgGradient.bgGrType" >
						<option value="linear">Linear</option>
						<option value="radial">Radial</option>
        			</select>

        			<div class="bgGradientPosContainer" style="display: none;">

        				<br><br><hr><br>
						<label>Position </label>
						<select data-optname="bgOps.bgGradient.bgGrPos" >
							<option value="center center">Center Center</option>
							<option value="center left">Center Left</option>
							<option value="center right">Center Right</option>
							<option value="top center">Top Center</option>
							<option value="top left">Top Left</option>
							<option value="top right">Top Right</option>
							<option value="bottom center">Bottom Center</option>
							<option value="bottom left">Bottom Left</option>
							<option value="bottom right">Bottom Right</option>
					 	</select>

                    </div>
                    <div class="bgGradientAngleContainer" style="display: none;">

                    	<br><br><hr><br>
						<label>Angle </label>
						<input type="number" data-optname="bgOps.bgGradient.bgGrAngle" >
						
                    </div>

				</div>
					
				<div class="bgImageOpsContainer" style="display: none;">
					<br><br><hr><br>
					<div class="image_preview_wrapper">
						<img src="#" class="image_upload_preview02 image_upload_preview">
						<div class="image_preview_close_btn"> <span class="dashicons dashicons-no-alt"></span> </div>
					</div>
					<br>
					<input id="bgImage" type="text" class="imageUploadFeild upload_image_button02" data-optname="bgOps.bgImage" placeholder="Image URL" style="width:95%;">
					<br>
					<input type="button" class="upload_bg image_upload_button" data-id="02" value="Select Image" />
					<br><br>

					<div class="bgImgOpsExtra" style="display: none;">
						
						<br><br><hr><br>
						<label for="pos">Position</label>
						<select id="pos" class="pos" data-optname="bgOps.bgImgOps.pos">
							<option value="">Default</option>
                            <option value="top left">Top Left</option>
                            <option value="top center">Top Center</option>
                            <option value="top right">Top Right</option>
                            <option value="center left">Center Left</option>
                            <option value="center center">Center Center</option>
                            <option value="center right">Center Right</option>
                            <option value="bottom left">Bottom Left</option>
                            <option value="bottom center">Bottom Center</option>
                            <option value="bottom right">Bottom Right</option>
                            <option value="custom">Custom</option>
						</select>

						<div class="bgImgCustomPositionDiv" style="display: none;">
							
							<br><br><hr><br>
							<label for="xPos">Horizontal Position (X)</label>
							<select id="xPosU" class="xPosU" data-optname="bgOps.bgImgOps.xPosU" style="width:50px;">
								<option value="px">px</option>
                                <option value="%">%</option>
                                <option value="vw">vw</option>
							</select>
							<input type="number" id="xPos" class="xPos" data-optname="bgOps.bgImgOps.xPos" style="width:60px;" >

							<br><br><hr><br>
							<label for="yPos">Vertical Position (Y)</label>
							<select id="yPosU" class="yPosU" data-optname="bgOps.bgImgOps.yPosU" style="width:50px;">
								<option value="px">px</option>
                                <option value="%">%</option>
                                <option value="vw">vw</option>
							</select>
							<input type="number" id="yPos" class="yPos" data-optname="bgOps.bgImgOps.yPos" style="width:60px;" >
							

						</div>

						<br><br><hr><br>
						<label for="rep">Repeat</label>
						<select id="rep" class="rep" data-optname="bgOps.bgImgOps.rep">
							<option value="default">Default</option>
                            <option value="no-repeat">No-repeat</option>
                            <option value="repeat">Repeat</option>
                            <option value="repeat-x">Repeat-x</option>
                            <option value="repeat-y">Repeat-y</option>
						</select>

						<br><br><hr><br>
						<label for="size">Size</label>
						<select id="size" class="size" data-optname="bgOps.bgImgOps.size">
							<option value="">Default</option>
                            <option value="auto">Auto</option>
                            <option value="cover">Cover</option>
                            <option value="contain">Contain</option>
                            <option value="custom">Custom</option>
						</select>

						<div class="bgImgCustomSizeDiv" style="display: none;">
							
							<br><br><hr><br>
							<label for="cWid">Width</label>
							<select id="widU" class="widU" data-optname="bgOps.bgImgOps.widU" style="width:50px;">
								<option value="px">px</option>
                                <option value="%">%</option>
                                <option value="vw">vw</option>
							</select>
							<input type="number" id="cWid" class="cWid" data-optname="bgOps.bgImgOps.cWid" style="width:60px;" >
							

						</div>


					</div>

					
				</div>
					

			</div>

		</div>


		<!-- <h4>Form Alignment</h4>
		<div class="plpb_accordion_item">

			<div class="form_alignmnet_options_panel login_options_panel">

				
				<label>Vertical Alignment</label>
				<select data-optname="alignment.alignY">
					<option value="default">Default</option>
					<option value="top">Top</option>
					<option value="middle">Middle</option>
					<option value="bottom">Bottom</option>
				</select>


				<br><br><hr><br>
				<label>Horizontal Alignment</label>
				<select data-optname="alignment.alignX">
					<option value="default">Default</option>
					<option value="left">Left</option>
					<option value="center">Center</option>
					<option value="right">Right</option>
				</select>
				
			</div>
			
		</div> -->

		
		<h4> <?php echo __('Form Container', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div class="form_container_options_panel login_options_panel">


				<label>Width </label>
				<input type="number" data-optname="formContOps.fwidth">

				<br><br><hr><br>
				<label>Height </label>
				<input type="number" data-optname="formContOps.fheight">

				<!-- <br><br><hr><br>
				<label>Font Family</label>
				<input type="text" class="fontSelector" data-optname="formContOps.fontFamily"> -->

				
				<div class="border_ops_contaienr">

					<br><br><hr><br>
					<label>Border Color</label>
					<input type="text" class="colorPicker" data-optname="formContOps.border.color">

					<br><br><hr><br>
					<label>Border Style</label>
					<select class="widgetBorderStyle" data-optname="formContOps.border.style">
						<option value="solid">Solid</option>
						<option value="dotted">Dotted</option>
						<option value="dashed">Dashed</option>
						<option value="double">Double</option>
					</select>

					<br><br><hr><br>
					<p> Border Width </p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formContOps.border.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formContOps.border.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formContOps.border.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formContOps.border.left" >

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>

				</div>

				<div class="border_radius_contaienr">

					<br><br><hr><br>
					<p> Border Radius </p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top Left" title="Top Left"  data-optname="formContOps.borderRadius.tleft" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top Right" title="Top Right" data-optname="formContOps.borderRadius.tright" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom Left" title="Bottom Left" data-optname="formContOps.borderRadius.bleft" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom Right" title="Bottom Right" data-optname="formContOps.borderRadius.bright" >

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>

				</div>


				<div class="shadow_ops_contaienr">

					<br><br><hr><br>
					<label>Shadow Color</label>
					<input type="text" class="colorPicker" data-optname="formContOps.shadow.color">
					
					<br><br><hr><br>
					<label> Shadow Horizontal Position </label>
					<input type="number" data-optname="formContOps.shadow.posH">

					<br><br><hr><br>
					<label> Shadow Vertical Position </label>
					<input type="number" data-optname="formContOps.shadow.posV">

					<br><br><hr><br>
					<label> Shadow Blur/Spread </label>
					<input type="number" data-optname="formContOps.shadow.blur">

				</div>

				
				<div class="margin_padding_container">

					<br><br><hr>
					<p>Margins</p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formContOps.margin.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formContOps.margin.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formContOps.margin.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formContOps.margin.left" >


					<select class="inline_inp_4"  data-optname="formContOps.margin.unit" style="width:50px;">
						<option value="px">px</option>
	                    <option value="%">%</option>
	                    <option value="vw">vw</option>
					</select>

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>

				<div class="margin_padding_container">

					<br><br><hr>
					<p>Padding</p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formContOps.padding.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formContOps.padding.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formContOps.padding.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formContOps.padding.left" >


					<select class="inline_inp_4"  data-optname="formContOps.padding.unit" style="width:50px;">
						<option value="px">px</option>
	                    <option value="%">%</option>
	                    <option value="vw">vw</option>
					</select>

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>				
					

			</div>

		</div>

		
		<h4> <?php echo __('Form Background', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div  class="form_bg_options_panel login_options_panel">
				
				<label for="fbgType"> Bg Type </label>
				<select id="fbgType" data-optname="formContBgOps.fbgType">
					<option value="solid">Solid</option>
					<option value="gradient">Gradient</option>
					<option value="image">Image</option>
				</select>

				<div class="fbgColorOpContainer" style="display: none;">
					<br><br><hr><br>
					<label for="fbgColor">Bg Color</label>
					<input type="text" class="colorPicker" data-optname="formContBgOps.fbgColor">
				</div>

				<div class="fbgGradOpContainer" style="display: none;">

					<br><br><hr><br>
					<label for='fbgGr1Color'>First Color </label>
					<input id="fbgGr1Color" type="text" class="fbgGr1Color colorPicker" data-optname="formContBgOps.fbgGradient.fbgGr1Color">

					<br><br><hr><br>
					<label for="fbgGr1Loc">Location</label>
					<input type="number" id="fbgGr1Loc" class="fbgGr1Loc" data-optname="formContBgOps.fbgGradient.fbgGr1Loc">

					<br><br><hr><br>
					<label for='fbgGr2Color'>Second Color </label>
					<input type="text" id="fbgGr2Color" class="fbgGr2Color colorPicker" data-optname="formContBgOps.fbgGradient.fbgGr2Color">

					<br><br><hr><br>
					<label for="fbgGr2Loc">Location</label>
					<input type="number" id="fbgGr2Loc" class="fbgGr2Loc" data-optname="formContBgOps.fbgGradient.fbgGr2Loc">

					<br><br><hr><br>
					<label for="fbgGrType">Gradient Type </label>
                    <select id="fbgGrType" class="fbgGrType" data-optname="formContBgOps.fbgGradient.fbgGrType" >
						<option value="linear">Linear</option>
						<option value="radial">Radial</option>
        			</select>

        			<div class="fbgGradientPosContainer" style="display: none;">

        				<br><br><hr><br>
						<label for="fbgGrPos">Position </label>
						<select id="fbgGrPos" class="fbgGrPos" data-optname="formContBgOps.fbgGradient.fbgGrPos" >
							<option value="center center">Center Center</option>
							<option value="center left">Center Left</option>
							<option value="center right">Center Right</option>
							<option value="top center">Top Center</option>
							<option value="top left">Top Left</option>
							<option value="top right">Top Right</option>
							<option value="bottom center">Bottom Center</option>
							<option value="bottom left">Bottom Left</option>
							<option value="bottom right">Bottom Right</option>
					 	</select>

                    </div>
                    <div class="fbgGradientAngleContainer" style="display: none;">

                    	<br><br><hr><br>
						<label for="fbgGrAngle">Angle </label>
						<input type="number" id="fbgGrAngle" class="fbgGrAngle" data-optname="formContBgOps.fbgGradient.fbgGrAngle" >
						
                    </div>

				</div>
					
				<div class="fbgImageOpsContainer" style="display: none;">
					<br><br><hr><br>
					<div class="image_preview_wrapper">
						<img src="#" class="image_upload_preview03 image_upload_preview">
						<div class="image_preview_close_btn"> <span class="dashicons dashicons-no-alt"></span> </div>
					</div>
					<br>
					<input id="fbgImage" type="text" class="imageUploadFeild upload_image_button03" data-optname="formContBgOps.fbgImage" placeholder="Image URL" style="width:95%;" >
					<br>
					<input type="button" class="upload_bg image_upload_button" data-id="03" value="Select Image" />
					<br><br>

					<div class="fbgImgOpsExtra" style="display: none;">
						
						<br><br><hr><br>
						<label for="fpos">Position</label>
						<select id="fpos" class="fpos" data-optname="formContBgOps.fbgImgOps.fpos">
							<option value="">Default</option>
                            <option value="top left">Top Left</option>
                            <option value="top center">Top Center</option>
                            <option value="top right">Top Right</option>
                            <option value="center left">Center Left</option>
                            <option value="center center">Center Center</option>
                            <option value="center right">Center Right</option>
                            <option value="bottom left">Bottom Left</option>
                            <option value="bottom center">Bottom Center</option>
                            <option value="bottom right">Bottom Right</option>
                            <option value="custom">Custom</option>
						</select>

						<div class="fbgImgCustomPositionDiv" style="display: none;">
							
							<br><br><hr><br>
							<label for="fxPos">Horizontal Position (X)</label>
							<select id="fxPosU" class="fxPosU" data-optname="formContBgOps.fbgImgOps.fxPosU" style="width:50px;">
								<option value="px">px</option>
                                <option value="%">%</option>
                                <option value="vw">vw</option>
							</select>
							<input type="number" id="fxPos" class="fxPos" data-optname="formContBgOps.fbgImgOps.fxPos" style="width:60px;" >
							

							<br><br><hr><br>
							<label for="fyPos">Vertical Position (Y)</label>
							<select id="fyPosU" class="fyPosU" data-optname="formContBgOps.fbgImgOps.fyPosU" style="width:50px;">
								<option value="px">px</option>
                                <option value="%">%</option>
                                <option value="vw">vw</option>
							</select>
							<input type="number" id="fyPos" class="fyPos" data-optname="formContBgOps.fbgImgOps.fyPos" style="width:60px;" >
							

						</div>

						<br><br><hr><br>
						<label for="frep">Repeat</label>
						<select id="frep" class="frep" data-optname="formContBgOps.fbgImgOps.frep">
							<option value="default">Default</option>
                            <option value="no-repeat">No-repeat</option>
                            <option value="repeat">Repeat</option>
                            <option value="repeat-x">Repeat-x</option>
                            <option value="repeat-y">Repeat-y</option>
						</select>

						<br><br><hr><br>
						<label for="fsize">Size</label>
						<select id="fsize" class="fsize" data-optname="formContBgOps.fbgImgOps.fsize">
							<option value="">Default</option>
                            <option value="auto">Auto</option>
                            <option value="cover">Cover</option>
                            <option value="contain">Contain</option>
                            <option value="custom">Custom</option>
						</select>

						<div class="fbgImgCustomSizeDiv" style="display: none;">
							
							<br><br><hr><br>
							<label for="fcWid">Width</label>
							<select id="widU" class="widU" data-optname="formContBgOps.fbgImgOps.widU" style="width:50px;">
								<option value="px">px</option>
                                <option value="%">%</option>
                                <option value="vw">vw</option>
							</select>
							<input type="number" id="fcWid" class="fcWid" data-optname="formContBgOps.fbgImgOps.fcWid" style="width:60px;" >

						</div>


					</div>

					
				</div>

			</div>

		</div>

		
		<h4> <?php echo __('Form Labels', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">

			<div class="labels_options_panel login_options_panel">

				<label>Text Color</label>
				<input type="text" class="colorPicker" data-optname="formLabels.textColor">

				<br><br><hr><br>
				<label>Text Size</label>
				<select data-optname="formLabels.textSizeU" style="width:50px;">
					<option value="px">px</option>
                    <option value="em">em</option>
				</select>
				<input type="number" class="" data-optname="formLabels.textSize" style="width: 60px;">
				
				<br><br><hr><br>
				<label>Font Family</label>
				<input type="text" class="fontSelector" data-optname="formLabels.fontFamily">

				<div class="margin_padding_container">

					<br><br><hr>
					<p>Margins</p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formLabels.margin.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formLabels.margin.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formLabels.margin.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formLabels.margin.left" >


					<select class="inline_inp_4"  data-optname="formLabels.margin.unit" style="width:50px;">
						<option value="px">px</option>
	                    <option value="%">%</option>
	                    <option value="vw">vw</option>
					</select>

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>

				<br><br><br><br>
					
				
			</div>

			
		</div>

		
		<h4> <?php echo __('Form Input', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div  class="form_input_options_panel login_options_panel">

				<label>Bg Color</label>
				<input type="text" class="colorPicker" data-optname="formInput.bgColor">

				<br><br><hr><br>
				<label>Text Color</label>
				<input type="text" class="colorPicker" data-optname="formInput.textColor">

				<br><br><hr><br>
				<label>Font Family</label>
				<input type="text" class="fontSelector" data-optname="formInput.fontFamily">

				<br><br><hr><br>
				<label>Text Size</label>
				<select data-optname="formInput.textSizeU" style="width:50px;">
					<option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vw">vw</option>
				</select>
				<input type="number" class="" data-optname="formInput.textSize" style="width: 60px;">

				<div class="border_ops_contaienr">

					<br><br><hr><br>
					<label>Border Color</label>
					<input type="text" class="colorPicker" data-optname="formInput.border.color">

					<br><br><hr><br>
					<label>Border Style</label>
					<select class="widgetBorderStyle" data-optname="formInput.border.style">

						<option value="solid">Solid</option>
						<option value="dotted">Dotted</option>
						<option value="dashed">Dashed</option>
						<option value="double">Double</option>

					</select>

					<br><br><hr><br>
					<p> Border Width </p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formInput.border.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formInput.border.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formInput.border.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formInput.border.left" >

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>

				</div>

				<div class="border_radius_contaienr">

					<br><br><hr><br>
					<p> Border Radius </p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top Left" title="Top Left"  data-optname="formInput.borderRadius.tleft" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top Right" title="Top Right" data-optname="formInput.borderRadius.tright" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom Left" title="Bottom Left" data-optname="formInput.borderRadius.bleft" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom Right" title="Bottom Right" data-optname="formInput.borderRadius.bright" >

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>


				<div class="margin_padding_container">

					<br><br><hr>
					<p>Margins</p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formInput.margin.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formInput.margin.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formInput.margin.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formInput.margin.left" >


					<select class="inline_inp_4"  data-optname="formInput.margin.unit" style="width:50px;">
						<option value="px">px</option>
	                    <option value="%">%</option>
	                    <option value="vw">vw</option>
					</select>

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>

				<div class="margin_padding_container">

					<br><br><hr>
					<p>Padding</p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formInput.padding.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formInput.padding.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formInput.padding.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formInput.padding.left" >


					<select class="inline_inp_4"  data-optname="formInput.padding.unit" style="width:50px;">
						<option value="px">px</option>
	                    <option value="%">%</option>
	                    <option value="vw">vw</option>
					</select>

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>
				


				<div class="shadow_ops_contaienr">

					<br><br><hr><br>
					<label>Shadow Color</label>
					<input type="text" class="colorPicker" data-optname="formInput.shadow.color">
					
					<br><br><hr><br>
					<label> Shadow Horizontal Position </label>
					<input type="number" data-optname="formInput.shadow.posH">

					<br><br><hr><br>
					<label> Shadow Vertical Position </label>
					<input type="number" data-optname="formInput.shadow.posV">

					<br><br><hr><br>
					<label> Shadow Blur/Spread </label>
					<input type="number" data-optname="formInput.shadow.blur">

				</div>

			</div>

		</div>


		<h4> <?php echo __('Button Styles', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div  class="button_bg_options_panel login_options_panel">

				<label>Text Color</label>
				<input type="text" class="colorPicker" data-optname="formButton.textColor">

				<br><br><hr><br>
				<label>Font Family</label>
				<input type="text" class="fontSelector" data-optname="formButton.fontFamily">

				<br><br><hr><br>
				<label>Text Size</label>
				<select data-optname="formButton.textSizeU" style="width:50px;">
					<option value="px">px</option>
                    <option value="%">%</option>
                    <option value="vw">vw</option>
				</select>
				<input type="number" class="" data-optname="formButton.textSize" style="width: 60px;">
				

				<br><br><hr><br>
				<label>Button Width</label>
				<select data-optname="formButton.width">
					<option value="default">Default</option>
					<option value="full width">Full width</option>
				</select>


				<div class="border_ops_contaienr">

					<br><br><hr><br>
					<label>Border Color</label>
					<input type="text" class="colorPicker" data-optname="formButton.border.color">

					<br><br><hr><br>
					<label>Border Style</label>
					<select class="widgetBorderStyle" data-optname="formButton.border.style">

						<option value="solid">Solid</option>
						<option value="dotted">Dotted</option>
						<option value="dashed">Dashed</option>
						<option value="double">Double</option>

					</select>

					<br><br><hr><br>
					<p> Border Width </p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formButton.border.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formButton.border.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formButton.border.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formButton.border.left" >

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>

				</div>

				<div class="border_radius_contaienr">

					<br><br><hr><br>
					<p> Border Radius </p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top Left" title="Top Left"  data-optname="formButton.borderRadius.tleft" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top Right" title="Top Right" data-optname="formButton.borderRadius.tright" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom Left" title="Bottom Left" data-optname="formButton.borderRadius.bleft" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom Right" title="Bottom Right" data-optname="formButton.borderRadius.bright" >

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>

				<div class="shadow_ops_contaienr">

					<br><br><hr><br>
					<label>Shadow Color</label>
					<input type="text" class="colorPicker" data-optname="formButton.shadow.color">
					
					<br><br><hr><br>
					<label> Shadow Horizontal Position </label>
					<input type="number" data-optname="formButton.shadow.posH">

					<br><br><hr><br>
					<label> Shadow Vertical Position </label>
					<input type="number" data-optname="formButton.shadow.posV">

					<br><br><hr><br>
					<label> Shadow Blur/Spread </label>
					<input type="number" data-optname="formButton.shadow.blur">

				</div>

				<div class="margin_padding_container">

					<br><br><hr>
					<p>Margins</p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formButton.margin.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formButton.margin.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formButton.margin.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formButton.margin.left" >


					<select class="inline_inp_4" data-optname="formButton.margin.unit" style="width:50px;">
						<option value="px">px</option>
	                    <option value="%">%</option>
	                    <option value="vw">vw</option>
					</select>

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>

				<div class="margin_padding_container">

					<br><br><hr>
					<p>Padding</p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="formButton.padding.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="formButton.padding.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="formButton.padding.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="formButton.padding.left" >


					<select class="inline_inp_4" data-optname="formButton.padding.unit" style="width:50px;">
						<option value="px">px</option>
	                    <option value="%">%</option>
	                    <option value="vw">vw</option>
					</select>

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>	


			</div>

		</div>

		
		<h4> <?php echo __('Button Background', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div  class="button_bg_options_panel login_options_panel">
				
				<label for="bbgType"> Bg Type </label>
				<select id="bbgType" data-optname="formButtonBg.bbgType">
					<option value="solid">Solid</option>
					<option value="gradient">Gradient</option>
				</select>

				<div class="bbgColorOpContainer" style="display: none;">
					<br><br><hr><br>
					<label for="bbgColor">Bg Color</label>
					<input type="text" id="bbgColor" class="bbgColor colorPicker" data-optname="formButtonBg.bbgColor">
				</div>

				<div class="bbgGradOpContainer" style="display: none;">

					<br><br><hr><br>
					<label for='bbgGr1Color'>First Color </label>
					<input id="bbgGr1Color" type="text" class="bbgGr1Color colorPicker" data-optname="formButtonBg.bbgGradient.bbgGr1Color">

					<br><br><hr><br>
					<label for="bbgGr1Loc">Location</label>
					<input type="number" id="bbgGr1Loc" class="bbgGr1Loc" data-optname="formButtonBg.bbgGradient.bbgGr1Loc">

					<br><br><hr><br>
					<label for='bbgGr2Color'>Second Color </label>
					<input type="text" id="bbgGr2Color" class="bbgGr2Color colorPicker" data-optname="formButtonBg.bbgGradient.bbgGr2Color">

					<br><br><hr><br>
					<label for="bbgGr2Loc">Location</label>
					<input type="number" id="bbgGr2Loc" class="bbgGr2Loc" data-optname="formButtonBg.bbgGradient.bbgGr2Loc">

					<br><br><hr><br>
					<label for="bbgGrType">Gradient Type </label>
                    <select id="bbgGrType" class="bbgGrType" data-optname="formButtonBg.bbgGradient.bbgGrType" >
						<option value="linear">Linear</option>
						<option value="radial">Radial</option>
        			</select>

        			<div class="bbgGradientPosContainer" style="display: none;">

        				<br><br><hr><br>
						<label for="bbgGrPos">Position </label>
						<select id="bbgGrPos" class="bbgGrPos" data-optname="formButtonBg.bbgGradient.bbgGrPos" >
							<option value="center center">Center Center</option>
							<option value="center left">Center Left</option>
							<option value="center right">Center Right</option>
							<option value="top center">Top Center</option>
							<option value="top left">Top Left</option>
							<option value="top right">Top Right</option>
							<option value="bottom center">Bottom Center</option>
							<option value="bottom left">Bottom Left</option>
							<option value="bottom right">Bottom Right</option>
					 	</select>

                    </div>
                    <div class="bbgGradientAngleContainer" style="display: none;">

                    	<br><br><hr><br>
						<label for="bbgGrAngle">Angle </label>
						<input type="number" id="bbgGrAngle" class="bbgGrAngle" data-optname="formButtonBg.bbgGradient.bbgGrAngle" >
						
                    </div>

				</div>

					
			</div>

		</div>



		<h4> <?php echo __('Footer Links', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">

			<div class="footer_options_panel login_options_panel">

				<label>Text Color</label>
				<input type="text" class="colorPicker" data-optname="footerLinks.textColor">

				<br><br><hr><br>
				<label>Text Size</label>
				<select data-optname="footerLinks.textSizeU" style="width:50px;">
					<option value="px">px</option>
                    <option value="em">em</option>
				</select>
				<input type="number" class="" data-optname="footerLinks.textSize" style="width: 60px;">

				<br><br><hr><br>
				<label>Font Family</label>
				<input type="text" class="fontSelector" data-optname="footerLinks.fontFamily">


				<br><br><hr><br>
				<label>Alignment </label>
				<select data-optname="footerLinks.alignment">
					<option value="center">Center</option>
					<option value="left">Left</option>
					<option value="right">Right</option>
				</select>


				<div class="margin_padding_container">

					<br><br><hr>
					<p>Margins</p>

					<input type="number" class="inline_inp_4 linkedField" placeholder="Top"  data-optname="footerLinks.margin.top" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Right" data-optname="footerLinks.margin.right" >
	                    
					<input type="number" class="inline_inp_4 linkedField" placeholder="Bottom" data-optname="footerLinks.margin.bottom" >

					<input type="number" class="inline_inp_4 linkedField" placeholder="Left" data-optname="footerLinks.margin.left" >


					<select class="inline_inp_4" data-optname="footerLinks.margin.unit" style="width:50px;">
						<option value="px">px</option>
	                    <option value="%">%</option>
	                    <option value="vw">vw</option>
					</select>

					<span class="linkfieldBtn linkBtn"> <span class="dashicons dashicons-admin-links"></span> </span>
					
				</div>

				<br><br><br><br>

					
				
			</div>

			
		</div>



		<h4> <?php echo __('Form Text', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">

			<div class="textMessages_options_panel login_options_panel">

				<label>Username label</label>
				<input type="text" class="fullWidthField" data-optname="formTexts.unLabel" >

				<br><br><br><hr><br>
				<label>Password label</label>
				<input type="text" class="fullWidthField" data-optname="formTexts.passLabel" >

				<br><br><br><hr><br>
				<label>Remember Me label</label>
				<input type="text" class="fullWidthField" data-optname="formTexts.rembLabel" >

				<br><br><br><hr><br>
				<label>Button Text</label>
				<input type="text" class="fullWidthField" data-optname="formTexts.btnText" >

				<br><br><br><hr><br>
				<label>Lost Password Text</label>
				<input type="text" class="fullWidthField" data-optname="formTexts.lostPass" >

				<br><br><br><hr><br>
				<label>Back To Website Text</label>
				<input type="text" class="fullWidthField" data-optname="formTexts.backtoblog" >

				<br><br><br><br><br><br><br><br><br>
				
			</div>

			
		</div>




		<h4> <?php echo __('Custom CSS', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div class="textMessages_options_panel login_options_panel">

				<textarea data-optname="scripts.customcss"  style="margin-top: 0px; margin-bottom: 0px; height: 183px; width: 100%; min-width: 240px;"></textarea>

			</div>

		</div>


		<h4> <?php echo __('Google Recaptcha (V2)', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div class="textMessages_options_panel login_options_panel">

				<label>Enable ReCaptcha (v2)</label>
				<select data-optname="recaptcha.enable">
					<option value="false">No</option>
					<option value="true">Yes</option>
				</select>

				<br><br><br><hr><br>
				<label>Site Key</label>
				<input type="text" class="fullWidthField" data-optname="recaptcha.siteKey" >

				<br><br><br><br><br><hr><br>
				<label>Site Secret</label>
				<input type="text" class="fullWidthField" data-optname="recaptcha.siteSecret" >

				<br><br><br><br><br><hr><br>
				<label>ReCaptcha Theme</label>
				<select data-optname="recaptcha.theme">
					<option value="light">Light</option>
					<option value="dark">Dark</option>
				</select>

				<br>

			</div>

		</div>


		<h4 class="premiumFeaturesAcord"> <?php echo __('Premium Features', 'feather-login-page'); ?> </h4>
		<div class="plpb_accordion_item">
			
			<div class="textMessages_options_panel login_options_panel">

				<h2 style="text-align:center;"> Get Pro Version 50% OFF </h2>

				<div class="prem-card">
					<div class="prem-card-img-container">
						<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/icons/Artboard-1.png">
					</div>
					
					<h4>Custom Login URL</h4>
					<p> Mostly there are two reasons to change the default Login URL. 1st is to have a unique login slug to match your brand identity. 2nd and the most important reason is to secure your site from brute-force attacks and login bots. By having a secret login URL you can add a layer of protection against prying eyes and bad actors.</p>
					<a href="https://pluginops.com/feather-login-page/#pricing" target="_blank" >
						<div class="pro-buy-btn"> UPGRADE NOW </div>
					</a>
				</div>

				<div class="prem-card">
					<div class="prem-card-img-container">
						<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/icons/Artboard-4.png">
					</div>
					
					<h4>Expirable Login Links</h4>
					<p> An expiring link is a secret and custom login URL which can be used to let a team member or an outsider developer access the site. Now you don’t have to share the WordPress admin credentials with anyone. After the allowed time in hours or days the login link will automatically gets expired and access to the account will be blocked.</p>
					<a href="https://pluginops.com/feather-login-page/#pricing" target="_blank" >
						<div class="pro-buy-btn"> UPGRADE NOW </div>
					</a>
				</div>

				<div class="prem-card">
					<div class="prem-card-img-container">
						<img src="<?php echo FPOLPB_PLUGIN_URL; ?>/admin/images/icons/Artboard-3.png">
					</div>
					
					<h4>Limit Login Attempts</h4>
					<p> Protect your site and business from brute-force attacks. Automatically disable the login for some visitors who try to abuse the login system. A brute force attack uses trial-and-error to guess login info. Hackers work through all possible combinations hoping to guess correctly. Add extra security layer and protect sensitive business and commercial data. Many major hacks in past including popular Social Networks have provided hackers with millions or billions of email &password combinations to try. Act fast and stop brute-force attacks with Limit Login Attempts and Feather Login Designer.</p>
					<a href="https://pluginops.com/feather-login-page/#pricing" target="_blank" >
						<div class="pro-buy-btn"> UPGRADE NOW </div>
					</a>
				</div>

				<br>

			</div>

		</div>
		
		<?php do_action( "fpolpb_end_options" ) ?>


		<!-- Accordion Items End Here -->



	</div>
	
		
	<br><br><br>
	<textarea class="templateasd" style="margin-top: 0px; margin-bottom: 0px; height: 183px; width: 100%; display: none !important;"></textarea>
	<br><br><br><br><br><br><br><br><br><br>
	<i class='fas fa-spinner fa-spin' style="opacity: 0;"></i>

	
	
	<div class="editor_ops_bottom_bar">
		
		<div class="bottom_bar_ops">
			
			<div class="undoRedoBtns">
				<div id="pbbtnUndo" class="polpb_undo">
					<span class="dashicons dashicons-undo"></span>
				</div>
				<div id="pbbtnRedo" class="polpb_redo">
					<span class="dashicons dashicons-redo"></span>
				</div>
			</div>

			<div class="resposiveSwitch">
				<div class="desktopModeSwitch switchActive responsiveSwitchButton"> <i class="fa fa-desktop"></i></div>
				<div class="phoneModeSwitch responsiveSwitchButton"> <i class="fa fa-mobile"></i></div>
			</div>

			<div class="updateBtnContainer">
				<div class="updateBtn">Save Changes</div>
			</div>

		</div>

	</div>

</div>


<div id="googleFontsLoadLinkElContainer"></div>

