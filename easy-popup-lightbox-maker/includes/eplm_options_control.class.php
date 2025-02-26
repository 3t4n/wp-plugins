<?php

/**

 * Created by PhpStorm.

 * User: Rant

 * Date: 7/16/2018

 * Time: 04:35 م

 */



class eplm_options_control

{



    public function add_range_bar_input($rangename = "", $defultvalue = "")

    {

        $opj = new eplm_options_control();



        $opj-> save_my_setting($rangename, $defultvalue);



        $inarray = $opj->read_options();



        if (key_exists($rangename, $inarray)) {

            $updatedvalue = $inarray["$rangename"];

            //if (isset($defultvalue)) {  echo $defultvalue;     } else {    echo "50";   }



            echo " <span id='demo'>  </span>";





            echo ' <input class="form-control slider" id="myRange" class="text" type="range" min="0" max="1" step=".01"   name="' . $rangename . '"      value="' . $updatedvalue .'"> ';



            $inarray = array($rangename => $defultvalue);



        } else {

            $updatedvalue = '50';

            echo ' <input class="form-control slider" id="myRange" class="text" type="range" min="1"   name="' . $rangename . '"      value="' . $updatedvalue .'"> ';



            $inarray = array($rangename => $defultvalue);



        }



        // print_r($inarray);

    }



    public function add_check_box($checkboxcontrol = "", $defultvalue = "")

    {

        $opj = new eplm_options_control();

        $opj->save_my_setting($checkboxcontrol, "cheched=".$defultvalue );



        $dk = $opj->read_options();

        $inarray = $dk;





        if (key_exists($checkboxcontrol, $inarray)) {

            $updatedvalue = $inarray["$checkboxcontrol"];

            echo ' <input class="" type="checkbox"      name="' . $checkboxcontrol . '" id="'.$checkboxcontrol.'"  value="checked" '.$updatedvalue.'> ';

            $inarray = array($checkboxcontrol => "cheched".$defultvalue);

        } else {

            $updatedvalue = '';

            echo ' <input class="" type="checkbox"     name="' . $checkboxcontrol . '" id="'.$checkboxcontrol.'"  value="unchecked" '.$updatedvalue.' > ';

            $inarray = array($checkboxcontrol => "uncheched".$defultvalue);

        }



    }





    public function add_input($tname = "", $defultvalue = "", $placeholder = "")

    {

        $opj = new eplm_options_control();

        $opj->save_my_setting($tname, $defultvalue);



        $dk = $opj->read_options();

        $inarray = $dk;





        if (key_exists($tname, $inarray)) {





            $updatedvalue = $inarray["$tname"];



            echo ' <input class="form-control round" type="text" placeholder="' . $placeholder . '"   name="' . $tname . '" id="'.$tname.'" value="' . $updatedvalue . '"> ';



            $inarray = array($tname => $defultvalue);

        } else {

            $updatedvalue = '';



            echo ' <input class="form-control round" type="text" placeholder="' . $placeholder . '"  id="'.$tname.'"  name="' . $tname . '" value="' . $updatedvalue . '"> ';



            $inarray = array($tname => $defultvalue);

        }



    }



    public function save_my_setting($tname, $default_value)

    {

        $opj = new eplm_options_control();



        $inarray = $opj->read_options();



        if (isset($_POST['submit'])) {

            $inarray = $opj->read_options();



            $default_value = '';



            if (isset($_POST["$tname"])) $default_value = $_POST["$tname"];



            if (!isset($_POST["$tname"]) && $inarray["$tname"] != '') $default_value = $inarray["$tname"];

            if(!isset($_POST["$tname"]) && $inarray["$tname"] == 'checked') $default_value = '';



            $inarray["$tname"] = $default_value;



            update_option('inarray_easy_popup', $inarray);

            $dffsssfk = $opj->read_options();

            $inarray = $dffsssfk;



        }

    }

    public function read_options()

    {

        if (get_option('inarray_easy_popup'))

            $inarray = get_option('inarray_easy_popup');

        else

            $inarray = array();



        return $inarray;

    }



    public function add_file_upload($fileUpname = "", $updatedvalue = "" ,$defult="")

    {

            $eplm_plugin_url = plugins_url( '', __FILE__ );

            $name = $fileUpname;

            $defult = $eplm_plugin_url.'/Jellyfish.jpg';



            $choosed_option_value = $updatedvalue;

            $inarray = array($fileUpname => $choosed_option_value);

            include 'media_uploader_script.php';





    }

	



    public function add_sellect_option($seelctname = "", $defultvalue = "")

    {

        $opj = new eplm_options_control();

        $opj->save_my_setting($seelctname, $defultvalue);



        $inarray = $opj->read_options();



        if (key_exists($seelctname, $inarray)) {

            $updatedvalue = $inarray["$seelctname"];



            echo '<select class="form-control" id="depuis" name="' . $seelctname . '" >

                                <option value="Canada"';

            if ($updatedvalue == 'Canada') {

                echo ' selected';

            }

            echo ' >Canada </option>';

            echo ' <option value="USA"';

            if ($updatedvalue == 'USA') {

                echo ' selected';

            }

            echo ' > USA</option>';

            echo ' <option value="Roma"';

            if ($updatedvalue == 'Roma') {

                echo ' selected';

            }

            echo ' >Roma </option>';

            echo '</select>';





            $inarray = array($seelctname => $defultvalue);



        } else {

            $updatedvalue = 'Canada';

            echo '<select class="form-control" id="depuis" name="' . $seelctname . '" >

                                <option value="Canada"';

            if ($updatedvalue == 'Canada') {

                echo ' selected';

            }

            echo ' > Canada</option>';

            echo ' <option value="USA"';

            if ($updatedvalue == 'USA') {

                echo ' selected';

            }

            echo ' >USA </option>';

            echo ' <option value="USA"';

            if ($updatedvalue == 'Roma') {

                echo ' selected';

            }

            echo ' >Roma </option>';

            echo '</select>';

            $inarray = array($seelctname => $defultvalue);



        }





        // print_r($inarray);

    }



    public function add_time_sellect_option($seelctname = "", $defultvalue = "")

    {

        $opj = new eplm_options_control();

        $opj->save_my_setting($seelctname, $defultvalue);



        $inarray = $opj->read_options();



        if (key_exists($seelctname, $inarray)) {

            $updatedvalue = $inarray["$seelctname"];



            echo '<select class="form-control"  id="" name="' . $seelctname . '" >

                                <option value="1"';

            if ($updatedvalue == '1') {

                echo ' selected';

            }

            echo ' >1 </option>';

            echo ' <option value="2"';

            if ($updatedvalue == '2') {

                echo ' selected';

            }

            echo ' > 2</option>';

            echo ' <option value="3"';

            if ($updatedvalue == '3') {

                echo ' selected';

            }

            echo ' >3 </option>';

            echo '</select>';





            $inarray = array($seelctname => $defultvalue);



        } else {

            $updatedvalue = '1';

            echo '<select class="form-control" id="depuis" name="' . $seelctname . '" >

                                <option value="1"';

            if ($updatedvalue == '1') {

                echo ' selected';

            }

            echo ' > 1</option>';

            echo ' <option value="2"';

            if ($updatedvalue == '2') {

                echo ' selected';

            }

            echo ' >2 </option>';

            echo ' <option value="2"';

            if ($updatedvalue == '3') {

                echo ' selected';

            }

            echo ' >3 </option>';

            echo '</select>';

            $inarray = array($seelctname => $defultvalue);



        }





        // print_r($inarray);

    }

    public function add_color_piker($colorname = "", $defultvalue = "")

    {

        $opj = new eplm_options_control();

        $opj->save_my_setting($colorname, $defultvalue);



        $inarray = $opj->read_options();





        if (key_exists($colorname, $inarray)) {

            $updatedvalue = $inarray["$colorname"];

            echo ' <input class="text" type="text"     name="' . $colorname . '" id="my-color-field" value="' . $updatedvalue . '" data-default-color="#effeff"> ';

            echo ' <input class="text" type="hidden"     name="colorpicker_value" id="colorpicker_value" value="' . $updatedvalue . '"> ';





            $inarray = array($colorname => $defultvalue);



        } else {

            $updatedvalue = '#effeff';



            echo ' <input class="text" type="text"     name="' . $colorname . '" id="my-color-field" value="' . $updatedvalue . '"   data-default-color="' . $updatedvalue . '"> ';

            echo ' <input class="text" type="hidden"     name="colorpicker_value" id="colorpicker_value" value="' . $updatedvalue . '"> ';



            $inarray = array($colorname => $defultvalue);



        }





        // print_r($inarray);

    }





    /** read single popup  */

    /* public function eplm_read_popup( $pop_id ) {

         global $wpdb;

         $sql = "SELECT * FROM `{$wpdb->prefix}eplm_popups` WHERE pop_id  = %d";

         return $wpdb->get_results( $wpdb->prepare( $sql, $pop_id ), OBJECT );



      }*/

    public function eplm_read_popup( $pop_id ) {

        global $wpdb;

        $sql = "SELECT * FROM `{$wpdb->prefix}eplm_popups` WHERE pop_id = %d";

        return $wpdb->get_row( $wpdb->prepare( $sql, $pop_id ), OBJECT );



    }

    public function eplm_read_popup_name( $pop_id ) {

        global $wpdb;

        $sql = "SELECT pop_name FROM `{$wpdb->prefix}eplm_popups` WHERE pop_id = %d";

        return $wpdb->get_row( $wpdb->prepare( $sql, $pop_id ), OBJECT );



    }





   public function eplm_render_popup($pop_id)

    {

        $pop_id = (int)$pop_id;



        $popup = NULL;

        if (!empty($pop_id)) {

            $popup = eplm_read_popup($pop_id);



        }

        $options = array();

        if (!is_object($popup) || is_wp_error($popup)) {

            return;

        }

        $options = unserialize($popup->pop_options);

        extract((array)$popup);

        extract((array)$options);



        if(  !is_admin() || is_front_page() ) {



            wp_enqueue_style('eplm_style', plugins_url('includes/bootstrap/eplm_style.css', __FILE__), array(), '1.6');


            wp_enqueue_style('animate', plugins_url('includes/animate.min.css', __FILE__), false, true);

            wp_enqueue_style('bootstrap', plugins_url('includes/bootstrap/bootstrap.min.css', __FILE__), false, true);

            wp_enqueue_script('my_js_script', plugins_url('includes/bootstrap/js/my_js_script.js', eplm_PLUGIN_MAIN_FILE), false, true);

            wp_enqueue_script('jquery');







        }





        if (in_array( get_post_type( get_the_ID() ), $popup_vesability_post) || is_front_page())

        {











            if ($popup_type_sellect == 'I Frame' )

            {

                $content = $iframe;

            }else if($popup_type_sellect == 'HTML' )

            {

                $content =  base64_decode($pop_text);

            }else if($popup_type_sellect == 'Video' )

            {

                $content=   $video;

            }









            $mystring = <<<EOT

  <div class="popupmodal animated " id="popup_modal">



    <div id="popup_header" class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12 wpoc-field">



<div class="form-group col-lg-10 col-md-10 col-sm-10 col-xs-10 wpoc-field">



   <$title_size_sellect id="title_tag"> $title_text</$title_size_sellect>

            



</div>



<div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-2 wpoc-field">



    <span id="closepopup"> &times; </span>

   





</div>

<br/>

    </div>



    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12 wpoc-field">



        $content





    </div>

    <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12 wpoc-field" id="popup_footer">



        <button id="close_popup" class="closepopup btn btn-default">Close</button>



    </div>





</div>





 

    <div class="coverpopup" id="pop_cover">



    </div>

	         

    <script> 

    

   var $ = jQuery;

   

   

                  /* start_dimension_block*/

        if('$dimension' == 'responsive')

            {

                 jQuery("#responsive_options").show('fast');

                 jQuery("#custom_options").hide();

               

              if('$popup_responsive_dimension_measure' == 'auto')

              {

                   jQuery("#popup_modal").css('width','$popup_responsive_dimension_measure');

                 

              }else 

              {

                        jQuery("#popup_modal").css('width','$popup_responsive_dimension_measure');

              }

              

               } 

               else if('$dimension' == 'Custom')

               { 

                 

                        jQuery("#responsive_options").hide();

                        jQuery("#custom_options").show('fast');

                        

                           jQuery("#popup_modal").css('width','$di_width_val%');

               

                           jQuery("#popup_modal").css('height','$di_hight_val%');

                           jQuery("#popup_modal").css('max-height','$di_max_hight_val%');

                          jQuery("#popup_modal").css('max-width','$di_max_width_val%');

               }

               

                              /* end_dimension_block*/

                

                

                /*start_closing_block*/

                

                  jQuery("#title_tag").css("color", "$title_font_color_picker");

                            jQuery("#title_tag").css("float", "$title_posi_sellect");

                

               

              if('$showclosebtn'== '1')

              {

            

    

     

               if('$Closingsellect'== '50%')

            {

             

            jQuery("#close_popup").css({marginLeft: '$Closingsellect'});

            }

            else {

            jQuery("#close_popup").css({float: '$Closingsellect'});

            }

           

            jQuery("#close_popup").text('$closebtntext');

            jQuery("#close_popup").css({backgroundColor:'$btnclose_color_picker'});

            jQuery("#close_popup").css({color:'$font_btnclose_color_picker'});

            

              }else {

                

                 jQuery('#close_popup').hide();

                 jQuery('#popup_footer').hide();

                 

              }

               

               if('$showtitlecheck'== '1')

              {

               jQuery('#title_tag').fadeIn('slow');

              

               }else {

                  jQuery('#title_tag').hide();

              }

              

              

             

            if('$showcloseicon'== 0 && $showtitlecheck ==0) 

            {

                jQuery('#popup_header').hide();

            

            }

            

              jQuery('#close_popup').click(function(){

 

        jQuery(".coverpopup").hide();

        jQuery(".popupmodal").hide();



    });

             if('$showcloseicon'== 1)

                {  

                     jQuery("#closepopup").css({float:'$closeiconsellect'});

                     jQuery("#closepopup").css({float:'$closeiconsellect'});

                     jQuery("#closepopup").css({float:'$Icon_color_picker'});

                     jQuery("#closepopup").css('fontSize','$iconsize."px"');

                }

                

                  jQuery('#closepopup').click(function(){

                      jQuery(".coverpopup").hide();

                      jQuery(".popupmodal").hide();



                });

                

               

                   if('$escbtncheckbox' == 1)

                   {

                      jQuery(document).keydown(function(event) {

                    if (event.keyCode == 27) {

    

                          jQuery(".coverpopup").css("display", "none");

                            jQuery("#popup_modal").css("display", "none");

                    }

                      });

                   }

                   

                    if('$outerclose' == 1)

                   { 

                          jQuery(".coverpopup").click(function () {

                          jQuery(".coverpopup").fadeOut('slow');

                          jQuery(".popupmodal").fadeOut('slow');



                       });

                   }

                   

                  

                  

                  /*end_closing_block*/

                  

                  

                  

                  

                  /*start_styling_block*/

                  

                         jQuery("#popup_modal").css({backgroundColor:'$color_picker'});

                           jQuery("#pop_cover").css({backgroundColor:'$Opacity_color_picker'});

                          jQuery("#popup_modal").css('border-style', '$Border_Style_sellect');

                          jQuery("#popup_modal").css('border-color', '$slide_Border_color_picker');

                          

                          if('$Background_Image' == 1){

                             jQuery("#popup_modal").css('background-image', 'url("$pop_back_image")'); 

                         

                           }

                        

                           if('$border_shadow_check' == 1){

                            jQuery("#popup_modal").css('box-shadow', '10px 10px 5px 5px $border_shadow_color_picker');

                           }

                         

                          if('$Background_trncfer_check' == 1)

                           {

                              jQuery("#popup_modal").css({'background-color':'transparent'});

                               

                           }

                         



                        

                  

                  /*end_styling_block*/

                  

                  

                /*start_aperance_block*/

                   

                  

                       if('$Animation' == 1)

                           {

                               jQuery("#popup_modal").addClass('$animate_sellect');  

                           }

                        

                     jQuery(".coverpopup").css('opacity', '$Opacity_myRange');

                               

              /* border raduas option*/

             jQuery(".popupmodal").css({BorderTopRightRadius: $radious_Top_Right , BorderBottomRightRadius : $Bottom_Top_Right ,BorderTopLeftRadius: $radious_Top_Lift ,BorderBottomLeftRadius :$Bottom_Top_Lift });

        

               jQuery("#popup_modal").css('border-width', '$Thickness_myRange');

                  

                  

                    

                           if('$slideoptradio' == 'Top_bottom')

                           { 

                            

                               jQuery(".popupmodal").css({top:0});

                               jQuery(".popupmodal").css({ marginTop:0});

                               

                               jQuery(".popupmodal").addClass('slideInDown');

                           } 

                           else if('$slideoptradio' == 'Slide_box')

                            {

                             

                                   jQuery(".popupmodal").addClass('slideInUp');

                                    

                                    jQuery(".popupmodal").css({bottom:0});

                                     jQuery(".popupmodal").css({ marginLeft:20});

                            }

                           else if('$slideoptradio' == 'Left_Right')

                            {

                            

                                   jQuery(".popupmodal").addClass('slideInLeft');

                                    jQuery(".popupmodal").css({left:0});

                                    jQuery(".popupmodal").css({ marginLeft:0});

                                    jQuery(".popupmodal").css({bottom:0});

                                    

                                      

                            }else if('$slideoptradio' == 'Right_Left')

                             {

                             

                                   jQuery(".popupmodal").addClass('slideInRight');

                                    jQuery(".popupmodal").css({right:0});

                                    jQuery(".popupmodal").css({bottom:0});

            

                             } 

                                        

                          

                        

                          

                   

                     

                               

                                  

                              

                                

                             

                              

                              /*end_aperance_block*/

                              /*start_visibilty_block*/

                        if('$loading'==1)

                             {

                              var runpoptime =  '$loadingtime';

                                   setTimeout(function(){

                                    jQuery(".popupmodal").show('fast');

                                    jQuery(".coverpopup").show('fast');

                                    }, runpoptime * 1000);

                                 

                             }

                             

                                            

                   if('$scrolling'==1)

                   {

                   window.onscroll= function () {

                                 jQuery(".popupmodal").show('fast');

                                 jQuery(".coverpopup").show('fast');

                               };

                   }

                            

                             /*end_visibilty_block*/ 

                           

                  

                          if('$closingtimebtn' == 1)

                           {

                             

                               var closetime =  '$closingtime';

              

                                 setTimeout(function(){

                           

                                    jQuery(".coverpopup").hide();

                                    jQuery(".popupmodal").hide();

                                

                                    }, closetime * 1000);

                              

                           }

                           

     

 

    </script>

EOT;





            return $mystring;

        }else{



        }



    }



}