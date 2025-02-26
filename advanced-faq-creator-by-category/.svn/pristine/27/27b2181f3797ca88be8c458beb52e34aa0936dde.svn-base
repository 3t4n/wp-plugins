<?php 
 if( ! class_exists( 'AFAQCBC_q_a_faq_modall' ) ) {
	 		/*
* المودال (البوب اب ) الي بيطلع في صفحة إضاة او تعديلل فاق
*/
	class AFAQCBC_q_a_faq_modall {

		public function __construct() {
			if ( is_admin() ) {
				$this->init_metabox();
			}
		}

		public function init_metabox() {
			add_action( 'faqs_add_form_fields',     array( $this, 'render_metabox' ), 10, 2 );
            add_action( 'faqs_edit_form_fields',    array( $this, 'render_metabox' ), 10, 2 );
            add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts_styles')  );
		}



		public function render_metabox( $post ) {
            add_action('admin_footer',            array($this,'faq_css'));
            add_action( 'admin_footer',          array( $this, 'Setting_field_js' )      );
		}
		/*
* كود الاتش تي ام ال للمودال 
*/
        public function faq_css() {

            $c = new AFAQCBC_q_a_faq_controls_class();
            ?>

            <!-- Modal -->
            <div class="modal fade " id="element_modal" tabindex="-1" role="dialog" aria-labelledby="postionModalLabel" aria-hidden="true">
                <div class="modal-dialog " >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="postionModalLabel">...</h4>
                        </div>

                        <form action="#" id="faq-modal-form">
                        <div class="modal-body">

                            <?php $c->font_size(); ?>

                            <?php $c->color();?>
                            <div class="faq_style hide" id="text_font-weight">
                                <div class="m-p-r-label">
                                      <label><?php echo esc_html__('Font weight','')?>:</label>
                                </div>
                                <?php
                                $options_array = array(array('','select'),array(100,100),array(200,200),array(300,300),array(400,400),array(500,500),array(600,600),array(700,700),array(800,800),array(900,900),array('bold','bold'),array('bolder','bolder'),array('inherit','inherit'),array('initial','initial'),array('lighter','lighter'),array('normal','normal'),array('unset','unset'));
                                $default_value = '';
                                ?>
                                <?php $c->add_dropdown('font-weight', $options_array, $default_value);?>
                                <hr class="form_hr">
                            </div>
                            <div class="faq_style hide" id="text_font_alignment"><?php //text_font_alignment ?>
                                <div class="m-p-r-label">
                                    <label><?php echo esc_html__('text Alignment','advanced-faq-creator-by-category')?>:</label>
                                </div>
                                <?php
                                $options_array = array(array('','select'),array('left','Left'),array('right','Right'),array('center','Center'),array('justify','Justify'));
                                $default_value = '';
                                ?>
                                <?php $c->add_dropdown('text-align', $options_array, $default_value);?>
                                <hr class="form_hr">
                            </div>
                            <?php $c->margin_padding('margin');?>

                            <?php $c->margin_padding('padding');?>


                            <?php $c->margin_padding('border');?>

                            

                            <div class="faq_style hide" id="border-style_contener">
                                <div class="m-p-r-label">
                                    <label><?php echo esc_html__('border style','advanced-faq-creator-by-category')?>:</label>
                                </div>
                                <?php
                                $options_array = array(array('','select'),array('none','- None -'),array('hidden','hidden'),array('dotted','dotted'),array('dashed','dashed'),array('solid','solid'),array('double','double'),array('groove','groove'),array('ridge','ridge'),array('inset','inset'),array('outset','outset'),array('initial','initial'),array('inherit','inherit'));
                                $default_value = '';
                                ?>
                                <?php $c->add_dropdown('border-style', $options_array, $default_value);?>

                            </div>
                            <?php $c->border_color(); ?>

                            <?php $c->background_color(); ?>

                            <?php $c->hover_background_color();?>
                            <?php $c->hover_text_color(); ?>

                            <?php $c->input_text_contener('Shadow style','box-shadow');?>
                            <?php $c->input_text_contener('Label','text_options');?>
                            <?php $c->input_text_contener('Placeholder','text_placeholder');?>
                            <?php $c->input_text_contener('Button','text_button');?>
                            <div class="faq_style hide" id="text_cursor">
                                <div class="m-p-r-label">
                                    <label><?php echo esc_html__('Mouse cursor','')?>:</label>
                                </div>
                                <?php
                                $options_array = array(array('','select'),array('alias','alias'),array('all-scroll','all scroll'),array('auto','auto'),array('cell','cell'),array('context-menu','context-menu'),array('col-resize','col-resize'),array('copy','copy'),array('crosshair','crosshair'),array('default','default'),array('e-resize','e resize'),array('ew-resize','ew resize'),array('grab','grab'),array('grabbing','grabbing'),array('help','help'),array('move','move'),array('n-resize','n resize'),array('ne-resize','ne resize'),array('nesw-resize','nesw resize'),array('ns-resize','ns resize'),array('nw-resize','nw resize'),array('nwse-resize','nwse resize'),array('no-drop','no drop'),array('none','none'),array('not-allowed','not allowed'),array('pointer','pointer'),array('progress','progress'),array('row-resize','row resize'),array('s-resize','s resize'),array('se-resize','se resize'),array('sw-resize','sw resize'),array('text','text'),array('w-resize','w resize'),array('wait','wait'),array('zoom-in','zoom in'),array('zoom-out','zoom out'));
                                $default_value = '';
                                ?>
                                <?php $c->add_dropdown('cursor', $options_array, $default_value);?>
                                <hr class="form_hr">
                            </div>



                            <?php $c->animation();?>

                            <?php $c->add_hidden_input('id_modal_return','');?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>



            <?php
        }
				/*
* كود الجافا سكربت الخاصه بالمودال وتزيع البيانات على الحقول الخاصه بالمودال 
*/
		public function Setting_field_js() {

			// Print js only once per page
			if ( did_action( 'Post_Metabox_modall_functions_js' ) >= 1 ) {
				return;
			}

			?> 
			<script type="text/javascript">
			"use strict";
				function openModal(input_id,values = new array(),recipient="") {
					$('#TitleSizeV').html('Inherit');
                    document.getElementById('faq-modal-form').reset();
                    var jsonValue = $("#"+input_id).val();
                    if(jsonValue != ''){
                        $.each(JSON.parse(jsonValue), function(k, v) {
                            if($("#"+k).is("select")) {
                                $('[name='+ k +'] option').filter(function() {
                                    return ($(this).text() == v);
                                }).prop('selected', true);
                            }else{
                                
                                $('input[name="'+ k +'"]').val(v);
                                if(k == 'font-size'){
                                    
                                    if(v != '0' || v != ''){
                                        $('#TitleSizeV').html(v+'px');
                                    }
                                }
                            }

                        });

                    }
                    $("#id_modal_return").val(input_id);
                    $('.faq_style').each(function(i, obj) {
                        if(!$( this ).hasClass('hide')){
                            $( this ).addClass('hide')
                        }
                    });
                    $.each( values, function( key, value ) {
                        $('#'+ value).removeClass('hide');
                    });
					
                    $('.wp-color-picker').trigger("change");
                    $("#element_modal").addClass("show");
                    $("#element_modal").modal('show');
					
                    var recipient = recipient;
                    $("#postionModalLabel").text(recipient);
					
				}
				function saveModal(vol) {
					
					document.querySelector('#Icon_question_sizeV').value = vol + "px";
				}
                function TitleSize(vol) {
					
                    document.querySelector('#TitleSizeV').value = vol + "px";
                }
                function border_width(vol) {
					
                    document.querySelector('#border_widthv').value = vol + "px";
                }
                jQuery(document).ready(function($){
					"use strict";
                    $('#color').wpColorPicker();
                    $('#border-color').wpColorPicker();
                    $('#background-color').wpColorPicker();
                    $('#hover_background-color').wpColorPicker();
                    $('#hover_text_color').wpColorPicker();
                });
                jQuery('#animation_select').change(function () {
					"use strict";
                    jQuery('#animate-preview-faq').removeClass();
                    var el = jQuery('#animation_select').val();
                    jQuery('#animate-preview-faq').addClass(el);
                    jQuery('#animate-preview-faq').addClass('animated');
                });
                jQuery(document).ready(function($){
					"use strict";
                    $( "#faq-modal-form" ).submit(function( event ) {
                        event.preventDefault();
                        var values = $(this).serializeArray();
                        var dataValues = {};
                        $.each(values, function( index, value ) {
                            if(value.value != ''){
                                dataValues[value.name] = value.value;
                            }
                        });

                        let hidden_f = $("#id_modal_return").val();
                        $("#"+ hidden_f).val(JSON.stringify(dataValues));
                        $("#element_modal").modal('hide');
                    });
                });


			</script>
			
			<?php
			do_action( 'Post_Metabox_modall_functions_js', $this );
		}
				/*
* مكتبات الجافا سكربت والستايل
*/
        public function load_scripts_styles() {
            wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_style( 'wp-color-picker' );
            wp_enqueue_style('animate', AFAQCBC_PLUGIN_URL.'/assets/css/animate.css');
        }




	}

	new AFAQCBC_q_a_faq_modall();
 }