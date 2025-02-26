<?php
if( ! class_exists( 'AFAQCBC_q_a_faq_Select_Metabox' ) ) {
			/*
* خيارات التحكم في الفاق واختيار تيمبليت للفاق
*/
    class AFAQCBC_q_a_faq_Select_Metabox {

        private $faqs_template_array;
		/*
* جلب التيمبليت من مجلد التيمبليتس
*/
        public function __construct() {

            if ( is_admin() ) {
                $this->init_metabox();
            }
            $this->faqs_template_array = array();
            $directory_of_templates = dir(AFAQCBC_PLUGIN_DIR.'templates');

            while (false !== ($entry = $directory_of_templates->read()))
            {
                if (($entry != '.') && ($entry != '..')){
                    $this->faqs_template_array[] = array('name' => $entry);
                }
            }
            $directory_of_templates->close();
        }



        public function init_metabox() {

            add_action( 'faqs_add_form_fields',     array( $this, 'render_metabox' ), 1, 1 );
            add_action( 'faqs_edit_form_fields',    array( $this, 'render_metabox' ), 1, 1 );
            add_action( 'edited_faqs',              array( $this, 'save_metabox' ), 1, 1 );
            add_action( 'create_faqs',              array( $this, 'save_metabox' ), 1, 1 );

        }

		/*
* المنطقه المعروضه في اضافة او تعديل فاق إختيار تيمبليت للفاق
*/
        public function render_metabox( $post ) {
            add_action( 'admin_footer',          array( $this, 'select_field_css' )      );
            add_action( 'admin_footer',          array( $this, 'select_field_js' )      );
            // Retrieve an existing value from the database.

            $faq_template_selected = !empty($post->term_id)?esc_attr(get_term_meta( absint($post->term_id), 'faq_template', true )):'';
            $faq_template_data = !empty($post->term_id)?$this->esc_attr_text_or_array_field(array_filter((array)get_term_meta( absint($post->term_id), 'faqs_array', true ))):array();
            // Set default values.
            if( empty( $faq_template_selected ) ) $faq_template_selected = '';
            if( empty( $faq_template_data ) ) (array)$faq_template_data = array();

            // Form fields.
			?>
			<tr >
            	<td colspan="2">
                    <table class="puplicseteng">
                    <tr>
                    	<th colspan="2">
                            <?php echo esc_html__('Select Template', 'advanced-faq-creator-by-category');?>
                        </th>
                    </tr>
                    <tr class="background-white-color">
                	    <td colspan="2">
                            <div class="background-white-color">
                                <div class="cc-selector-2"><div class="row">
            <?php

			$template_selected = 0;
			
            foreach($this->faqs_template_array as $faq_template){
                if($faq_template_selected == $faq_template['name'] && $faq_template_data != '' && !empty($faq_template_data))
				{
					$template_name = $faq_template['name'];
					?>
                    <input type='hidden' id='<?php echo esc_attr($faq_template['name']);?>_data' name='<?php echo esc_attr($faq_template['name']);?>_data' value='<?php print_r(json_encode($this->esc_attr_text_or_array_field(array_filter($faq_template_data)),JSON_FORCE_OBJECT));?>'>
                <?php }else{
                    require_once(AFAQCBC_PLUGIN_DIR.'templates/'.$faq_template['name'].'/data.php');
					?>
                    
                    <input type='hidden' id='<?php echo esc_attr($faq_template['name']);?>_data' name='<?php echo esc_attr($faq_template['name']);?>_data' value='<?php print_r(json_encode($this->esc_attr_text_or_array_field(array_filter($array_data)), JSON_FORCE_OBJECT));?>'>
                <?php } ?>
				<div class="col">
                <input id="<?php echo esc_attr($faq_template['name']);?>" type="radio" name="faq_template" value="<?php echo esc_attr($faq_template['name']);?>"<?php echo (($faq_template_selected== ''&& $template_selected == 0)?' checked ':"");?>  <?php echo (($faq_template_selected== $faq_template['name'])?' checked ':"");?>/>
                <label class="drinkcard-cc <?php echo esc_attr($faq_template['name']);?> show" for="<?php echo esc_attr($faq_template['name']);?>"><span class="template_name"><?php echo esc_html($template_name);?></span></label>
                </div>
               <?php
				$template_selected++;
            }
?>
                       </div></div>
                </div>
            </td>
                    </tr>

			</tr>
			</td>
			</tbody>
			</table>
			<?php
        }
		/*
* حفظ التيمبليت المختار في الداتا بيز
*/
        public function save_metabox( $term_id ) {

            
            $WP_template_select = isset( $_POST['faq_template'] ) ? sanitize_text_field( $_POST['faq_template'] ) : '';
            update_term_meta( $term_id, 'faq_template', $WP_template_select );

        }
		
        function esc_attr_text_or_array_field($array_or_string){
            if( is_string($array_or_string) ){
                $array_or_string = esc_attr($array_or_string);
            }elseif( is_array($array_or_string) ){
                foreach ( $array_or_string as $key => &$value ) {
                    if ( is_array( $value ) ) {
                        $value = $this->esc_attr_text_or_array_field($value);
                    }else {
                        $value = esc_attr( $value );
                    }
                }
            }
            return $array_or_string;
        }

		/*
* كود الستايل الخاص بالسكشن
*/
        public function select_field_css() {

            // Print js only once per page
            if ( did_action( 'Post_select_Metabox_select_picker_jss' ) >= 1 ) {
                return;
            }

            ?>
            <style type="text/css">

                .cc-selector-2 input{
                    position:absolute;
                    z-index:999;
                    margin: 10px;
                }
                <?php foreach($this->faqs_template_array as $faq_template){?>
                .<?php echo esc_attr($faq_template['name']);?>{background-image:url(<?php echo plugin_dir_url( __FILE__ ). '../templates/'.esc_attr($faq_template['name']).'/screenshot.png' ;?>);}
                <?php } ?>

				

                .cc-selector-2 input:active +.drinkcard-cc, .cc-selector input:active +.drinkcard-cc{opacity: .9;}
                .cc-selector-2 input:checked +.drinkcard-cc, .cc-selector input:checked +.drinkcard-cc{
                    -webkit-filter: none;
                    -moz-filter: none;
                    filter: none;
					border: 3px solid #4caf50;
					position: relative;
					color: #4caf50;
                }
                span.template_name {
                    position: absolute;
                    bottom: -27px;
                    text-align: center;
                    display: block;
                    width: 100%;
                }
                .drinkcard-cc{
					position: relative;
                    cursor:pointer;
                    background-size:contain;
                    background-repeat:no-repeat;
                    display:inline-block;
                    margin: 10px 10px 30px 10px;
                    width:170px;
					height:89px;
                    -webkit-transition: all 100ms ease-in;
                    -moz-transition: all 100ms ease-in;
                    transition: all 100ms ease-in;
					opacity:1;
					box-shadow: 3px 4px 4px 1px #0000006e;
					-webkit-filter: none;
                    -moz-filter: none;
                    filter: none;
                }
                .drinkcard-cc:hover{
					border: 1px solid #5b9dd9;
                }
                .text-red{
                    color:red;
                }

            </style>

            <?php
            do_action( 'Post_select_Metabox_select_picker_jss', $this );

        }
				/*
* كود الجافا سكربت الكاخ بالسكشن وخياراته ( عند اختيار واحده من العناصر الرساله الي بتطلع )
*/
        public function select_field_js() {

            // Print js only once per page
            if ( did_action( 'Post_select_Metabox_Option_select_picker_js' ) >= 1 ) {
                return;
            }
            wp_enqueue_script("jquery-ui-dialog");
            ?>

            <script>
			"use strict";
                var $ = jQuery.noConflict();
                var currentradio= $("input[name='faq_template']:checked")[0];
                $("input[name='faq_template']").change(function(event) {
					"use strict";
                    var this_chick = this;
                    var newradio= $("input[name='faq_template']:checked")[0];
                    $.confirm({
                        title: 'Would you like to change template?',
                        content: 'Would you like to load the new template default style (recommended), or keep the previous template settings? <br/><small><span class="text-red">WARNING</span>: This process cannot be undone with the previous template data.</small>',
                        icon: 'fa fa-question-circle',
                        animation: 'scale',
                        closeAnimation: 'scale',
                        columnClass: 'medium',
                        opacity: 0.5,
                        buttons: {
                            'Load with defaults': function(){
                                currentradio= newradio;
                                var data_id = $(this_chick).attr('id');
                                var jsonValue = $("#"+data_id+"_data").val();

                                if(jsonValue != ''){
                                    $.each(JSON.parse(jsonValue), function(k, v) {

                                        if($("#"+k).is("select")) {
                                            $('[name='+ k +'] option[value="'+ v +'"]').prop('selected', true);
                                        }else{
                                            if($('#'+ k).attr('type') == 'hidden'){
                                                $('#'+ k ).val(JSON.stringify(v));
                                            }else{
                                                $('#'+ k ).val(v);
                                            }
                                        }
                                    });
									$('#question_like_icon').trigger('change.select2');
									$('#question_dislike_icon').trigger('change.select2');
                                }
								hide_show_faq_option();
                                this.setCloseAnimation('zoom');
                            },

                            moreButtons: {
                                text: 'keep previous template settings',
                                action: function(){
                                    this.setCloseAnimation('zoom');
                                }
                            },
                            cancel: function(){
                                currentradio.checked= true;
                                this.setCloseAnimation('zoom');
                            },
                        }
                    });


                });

                $(document).ready(function(){
					"use strict";
                    $('input[name=faq_template]').each(function () {
                        var Allval = $(this).val();

                        if($(this).prop("checked")){
                            var data_id = $(this).attr('id');
                            var jsonValue = $("#"+data_id+"_data").val();

                            if(jsonValue != ''){
                                $.each(JSON.parse(jsonValue), function(k, v) {

                                    if($("#"+k).is("select")) {
                                        $('[name='+ k +'] option[value="'+ v +'"]').prop('selected', true);
                                    }else{
                                        if($('#'+ k).attr('type') == 'hidden'){
                                            $('#'+ k ).val(JSON.stringify(v));
                                        }else{
                                            $('#'+ k ).val(v);
                                        }

                                    }

                                });
								$('#question_like_icon').trigger('change.select2');
								$('#question_dislike_icon').trigger('change.select2');
								hide_show_faq_option();

                            }
                        }

                    });


                });
				
				
				
            </script>
            <?php
            do_action( 'Post_select_Metabox_Option_select_picker_js', $this );

        }

    }

    new AFAQCBC_q_a_faq_Select_Metabox;
}