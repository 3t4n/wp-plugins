<?php
add_action('wp_head', 'askdl_deal_header_code');
if (!function_exists('askdl_deal_header_code')) {
function askdl_deal_header_code(){ ?>
    <style>
        .askdeal-container{
            background: #f0f0f0;
            border-radius: 5px;
        }
        .askdeal-description p, .askdeal-price p{
            margin: 0px;
            color: #767676;
        }
        .askdeal-price p{
            font-weight: bold;
        }
        .askdeal-img{
            width: 100%;
            margin: auto;
        }
        article h2 a {
            color: #3C4858;
        }
        .askdeal {
            width: 100%;
            border: 0;
            padding: 28px 22px;
            margin: 0 auto!important;
            min-height: 150px;
            text-align: left;
            margin-bottom: 40px!important;
        }
        .askdeal h2 {
            font-size: 16px;
            color: #3C4858;
            line-height: 24px;
            max-height: initial;
            margin: 0;
            font-weight: 600;
            min-height: initial;
        }
        .askdeal-btn:hover{
            color: #3c4858 !important;
            background: #09aebf;
            border: 2px solid #09aebf;
        }
        .askdeal-btn{
            -ms-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            text-transform: none;
            width: 100%;
            max-width: 100%;
            font-size: 1em;
            padding: 1em 2em;
            color: #3c4858 !important;
            background: #09aebf;
            border: 2px solid #09aebf;
            font-weight: bold;
            -webkit-border-radius: 0.25em;
            -moz-border-radius: 0.25em;
            border-radius: 0.25em;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);
            text-align: center;
            display: inline-block;
            cursor: pointer;
            text-decoration: none;
            line-height: 1em;
            margin-top: 5%;
        }
        /* The Modal (background) */
        .askdeal-modal-content{
            max-width: 600px;    
            max-height: 80vh;
            overflow: auto; /* Full width */
        }
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 8000; /* Sit on top */
            padding-top: 10vh; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }
        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0} 
            to {top:0; opacity:1}
        }
        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }
        /* The Close Button */
        .close {
            float: right;
            color: #000;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,.close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-header {
            padding: 2px 16px;
            color: white;
        }
        .modal-body {
            padding: 2px 16px;
            margin-top: 4%;
            margin-bottom: 4%;
        }
        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }
        .invalid{
            border:1px solid #ff0000!important;
        }
        .askwithdeal-header{
            background-color: #efefef;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            float: left;
            margin-top: 2%;
        }
        .askwithdeal-header h6{
            margin: 0px;
        }
        .row-space {
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -moz-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-top: 1%;
            margin-bottom: 1%;
            width:100%;
            float: left;
            padding-left: 10px;  
        }
        .label {
            color: #555;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }
        .askdeal-input {
            width: 95%!important;
            line-height: 40px;
            padding: 0px!important;
            background: #fafafa;
            -webkit-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
            -moz-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
            box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, 0.08);
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            font-size: 16px;
            color: #666;
            -webkit-transition: all 0.4s ease;
            -o-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }
        .col-3 {
            width: -webkit-calc((100% - 30px) / 3);
            width: -moz-calc((100% - 30px) / 3);
            width: calc((100% - 30px) / 3);
            float: left;
        }
        .askdeal-img .img-responsive{
            width: 100%;
        }
        .max-w-300{
            width: 200px;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        @media(max-width:769px){
          .col-3 {
              width: 100%;
              float: left;
          }
        }
    </style>
    <script type="text/javascript"> var ajaxurl = "<?=admin_url('admin-ajax.php');?>";</script>  
<?php
};
}
add_action('wp_ajax_request_deal', 'askdl_request_deal');
if (!function_exists('askdl_request_deal')) {
function askdl_request_deal() {
    global $wpdb;
    parse_str($_POST['formdata'],$deal_data);
    $to = get_option('admin_email');
    $email = sanitize_email($deal_data['Email']);
    $dealid = sanitize_text_field($deal_data['dealid']);
    $name = sanitize_text_field($deal_data['Name']);
    $deal_title = sanitize_text_field($deal_data['Deal_title']);
    $phone = sanitize_text_field($deal_data['Phone']);
    $dealArr = array();
    foreach($deal_data as $key => $val){
        $dealArr[sanitize_text_field($key)] = sanitize_text_field($val);           
    }
    if (!is_email( $email ) ) {
        echo '<div class="alert alert-danger" role="alert">'.__("Please enter valid email.","askdl-askdeal").'</div>';
        die();
    }
    if (empty($phone)) {
        echo '<div class="alert alert-danger" role="alert">'.__("Please enter phone number.","askdl-askdeal").'</div>';
        die();
    }
    if(wp_verify_nonce( $deal_data['askdeal'], "askdeal-".$dealid )){
      $body = __("Hi Admin,","askdl-askdeal")."<br /><br />".esc_attr($name).__(" requested details regarding the deal - ","askdl-askdeal").esc_attr($deal_title)."<br /><br />".__("you may contact them by email ","askdl-askdeal").$email.__(" or phone ","askdl-askdeal").esc_attr($phone)."<br /><br />".__("Below are the form details submetted.","askdl-askdeal")."<br /><br />";
      foreach($dealArr as $key => $val){
          $ignore_keys = array("Phone", "Deal_title", "Email", "dealid","Name");
          if (!in_array($key, $ignore_keys)) {
              $body .= "".ucfirst(str_replace("_"," ",esc_attr($key))).": ".esc_attr($val)."<br /><br />";
          }    
      }
      $subject = __('Regarding deal - ',"askdl-askdeal").esc_attr($deal_title);
      $headers = array('Content-Type: text/html; charset=UTF-8',"Reply-To: ".$name." <".$email.">","From: Admin <".get_option('admin_email').">");
      wp_mail( $to, $subject, $body, $headers );
      echo '<div class="alert alert-success" role="alert">'.__("Your request submitted successfully.","askdl-askdeal").'</div>';
      die();
    }else{
      echo '<div class="alert alert-danger" role="alert">'.__("something might went wrong","askdl-askdeal").'</div>';
      die();
    }  
}
}
add_action('wp_footer', 'askdl_deal_footer_code');
if (!function_exists('askdl_deal_footer_code')) {
function askdl_deal_footer_code(){
?>
    <script>
        jQuery(document).on("click",".askdeal-modal",function(){
            jQuery("#myModal-"+jQuery(this).attr("attr")).show();  
        });
        jQuery(document).on("click",".submit_deal",function(){
            var isvalid = true;
            jQuery("#frm-askwithdeal-"+jQuery(this).attr("attr")+" input[type='text']").each(function( index ) {
                if(jQuery( this ).val() == ""){
                    jQuery( this ).addClass("invalid");
                    isvalid = false;
                }else{
                    jQuery( this ).removeClass("invalid");
                }
            });
            jQuery("#frm-askwithdeal-"+jQuery(this).attr("attr")+" input[type='email']").each(function( index ) {
                var input=jQuery(this);
                var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                var is_email=re.test(input.val());
                if(is_email){input.removeClass("invalid").addClass("valid");}
                else{isvalid = false;input.removeClass("valid").addClass("invalid");}
            });
            jQuery("#frm-askwithdeal-"+jQuery(this).attr("attr")+" textarea").each(function( index ) {
                if(jQuery( this ).val() == ""){
                    jQuery( this ).addClass("invalid");
                    isvalid = false;
                }else{
                    jQuery( this ).removeClass("invalid");
                }
            });
            if(isvalid){
                var data = {
                    action: 'request_deal',
                    formdata: jQuery("#frm-askwithdeal-"+jQuery(this).attr("attr")).serialize()
                };
                jQuery.post(ajaxurl, data, function(response){
                    jQuery(".deal_message").html(response);
                    //setTimeout(function(){ window.location.reload(); }, 3000);
                });
            } 
        });
        jQuery(document).on("click",".close",function(){
            jQuery("#myModal-"+jQuery(this).attr("attr")).hide();  
        });
    </script>
<?php
};
}
add_shortcode( 'deal', 'askdl_deal_with_ask_deal' );
if (!function_exists('askdl_deal_with_ask_deal')) {
function askdl_deal_with_ask_deal( $atts ) {
    global $wpdb;
    $dealArr = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'deal where is_deleted = 0 AND id = '.$atts['id'] , ARRAY_A );
    $url = wp_get_attachment_url( $dealArr[0]['image'] );
    $html = '<div class="askdeal-'.esc_attr($dealArr[0]['id']).' askdeal-container"><div class="askdeal-img"><a href="#"><img src="'.esc_url_raw($url).'" class="img-responsive"></a></div><article class="askdeal"><h2 class="askdeal-title"><a href="#">'.esc_attr($dealArr[0]['title']).'</a></h2><div class="askdeal-description"><p>'.nl2br(esc_attr($dealArr[0]['description'])).'</p></div><div class="askdeal-price"><p>'.esc_attr($dealArr[0]['price']).'</p></div>';
    $btntitle = "Request Details";
    if($dealArr[0]['button_title'] != ""){
        $btntitle = esc_attr($dealArr[0]['button_title']);
    }
    if($dealArr[0]['type'] == "deallink" && $dealArr[0]['askdeal']){
        $html .=  '<div class="askdeal-price"><a href="'.esc_url_raw($dealArr[0]['typevallink']).'" class="askdeal-btn">'.$btntitle.'</a></div>';
    }
    $fieldval = json_decode($dealArr[0]['typevalfrm'], 1);
    $btntitle = "Request Details";
    if($dealArr[0]['button_title'] != ""){
        $btntitle = esc_attr($dealArr[0]['button_title']);
    }
    if(count($fieldval['fieldname']) > 0 && $dealArr[0]['type'] == "dealform" && $dealArr[0]['askdeal']){
        $html .=  '<div class="askdeal-price"><button class="askdeal-modal askdeal-btn" attr="'.$dealArr[0]['id'].'">'.$btntitle.'</button></div>';  
        $html .=  '<div id="myModal-'.esc_attr($dealArr[0]['id']).'" class="modal"><div class="askdeal-modal-content modal-content"><div class="modal-header"><span class="close" attr="'.esc_attr($dealArr[0]['id']).'">&times;</span></div><div class="modal-body"><div class="deal_message"></div><form action="#" id="frm-askwithdeal-'.esc_attr($dealArr[0]['id']).'" name="frm-askwithdeal-'.esc_attr($dealArr[0]['id']).'" method="post"><input type="hidden" name="Deal_title"  value="'.$dealArr[0]['title'].'"><input type="hidden" name="askdeal" value="'.wp_create_nonce( 'askdeal-' . esc_attr($dealArr[0]['id']) ).'"><input type="hidden" name="dealid" id="'.esc_attr($dealArr[0]['id']).'" value="'.esc_attr($dealArr[0]['id']).'">';
        $personal_html = "";
        $deal_fieldhtml = "";                                         
        foreach($fieldval['fieldtype'] as $key => $field){
            if($fieldval['infotype'][$key] == "personal"){ 
                if($field == "textbox"){
                    $personal_html .=  '<div class="col-3"><label class="label">'.esc_attr($fieldval['fieldname'][$key]).'</label><input type="text" class="askdeal-input" name="'.esc_attr($fieldval['fieldname'][$key]).'" id="'.$key.'" required></div>'; 
                }
                if($field == "email"){
                    $personal_html .=  '<div class="col-3"><label class="label">'.esc_attr($fieldval['fieldname'][$key]).'</label><input type="email" class="askdeal-input" name="'.esc_attr($fieldval['fieldname'][$key]).'" id="'.esc_attr($key).'" required></div>'; 
                }
                if($field == "textarea"){
                    $personal_html .=  '<div class="col-3"><label class="label">'.esc_attr($fieldval['fieldname'][$key]).'</label><textarea class="askdeal-input" name="'.esc_attr($fieldval['fieldname'][$key]).'" id="'.esc_attr($key).'" required></textarea></div>'; 
                }
            }else{
                if($field == "textbox"){
                    $deal_fieldhtml .=  '<div class="row-space"><label class="label">'.esc_attr($fieldval['fieldname'][$key]).'</label><input type="text" class="askdeal-input" name="'.esc_attr($fieldval['fieldname'][$key]).'" id="'.esc_attr($key).'" required></div>'; 
                }
                if($field == "email"){
                    $deal_fieldhtml .=  '<div class="row-space"><label class="label">'.esc_attr($fieldval['fieldname'][$key]).'</label><input type="email" class="askdeal-input" name="'.esc_attr($fieldval['fieldname'][$key]).'" id="'.esc_attr($key).'" required></div>'; 
                }
                if($field == "textarea"){
                    $deal_fieldhtml .=  '<div class="row-space"><label class="label">'.esc_attr($fieldval['fieldname'][$key]).'</label><textarea class="askdeal-input" name="'.esc_attr($fieldval['fieldname'][$key]).'" id="'.esc_attr($key).'" required></textarea></div>'; 
                }
            }
        }
        $html .=  '<div class="col-12"><label class="label">'.esc_attr($dealArr[0]['title']).'</label></div>';
        $html .=  '<div class="askwithdeal-header"><h6>'.__("Personal Information","askdl-askdeal").'</h6></div>';
        $html .=  '<div class="row-space">'.$personal_html.'</div>';
        $html .=  '<div class="askwithdeal-header"><h6>'.__("Deal Information","askdl-askdeal").'</h6></div>'.$deal_fieldhtml.'</form>';
        $html .=  '<button type="submit" class="askdeal-modal askdeal-btn submit_deal max-w-300" attr="'.esc_attr($dealArr[0]['id']).'">'.__("Submit","askdl-askdeal").'</button>';  
        $html .=  '</div></div></div>';
    }
    $html .= '</article></div>';
    return $html;  
}
}