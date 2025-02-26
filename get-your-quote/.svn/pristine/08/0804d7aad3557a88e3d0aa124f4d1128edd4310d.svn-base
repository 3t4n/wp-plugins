<?php 

	function gyq_get_services_curl($url){
		$output =  wp_remote_retrieve_body(wp_remote_get($url));
		return json_decode($output);	
	}
	
	function gyq_post_services_curl($url,$args){
		$output = wp_remote_post($url, $args );
		return json_decode($output['body']);
	}
	
	function gyq_vertical($atts){
		global $wpdb;
		$data=array('url'=>'',
				'msg_header'=>'',
				'message'=>'',
				'api'=>'',
				'type'=>'',
				'back_color'=>'',
				'btn_color_prev'=>'',
				'btn_color_next'=>'',
				'form_back_color'=>'',
				'back_image'=>'',
				'h2_header'=>'',
				'h2_text'=>'',
				'service'=>sanitize_text_field($atts['service'])
			);
			
		$settings = $wpdb->get_results("SELECT * FROM wp_get_your_quote_options");	
		if (!empty($settings)){ 
			foreach ($settings as $setting){

				if($setting->type=='live'){
					$data['url'] = 'http://ctd.movesavers.com/api/';	
				}
				else{
					$data['url'] = 'http://ctd.movesavers.com/api/';
				}
				$data['msg_header'] = sanitize_text_field($setting->msg_header);	
				$data['message'] = sanitize_text_field($setting->message);
				$data['api'] = sanitize_text_field($setting->apikey);	
				$data['type'] = sanitize_text_field($setting->type);
				$data['back_color'] = sanitize_text_field($setting->backgroundcolor);
				$data['btn_color_prev'] = sanitize_text_field($setting->buttoncolorprev);
				$data['btn_color_next'] = sanitize_text_field($setting->buttoncolornext);
				$data['form_back_color'] = sanitize_text_field($setting->formbackgroundcolor);
				$data['back_image'] = sanitize_text_field($setting->backgroundimage);
				$data['h2_header'] = sanitize_text_field($setting->heading);
				$data['h2_text'] = sanitize_text_field($setting->headertext);
			}	    
		}
		
		if(strtolower($data['service'])!='alarm'){
			gyq_services($data);
		} 
		else{
			$data['url']='http://portal.movesavers.com/api/';
			//$data['api'] = '7fe37c231ab5b8118639e1d1df5e87a2';
			//$data['service'] = 'alarm'; 
			gyq_packages($data);
		}
	}
	
	function gyq_services($data){
		$url= $data['url'].'verticaldata?srch='.$data['service'].'&token='.$data['api'];
		$result=gyq_get_services_curl($url);
	?>
	    <div class="gyq_service"  style="position: relative;">
		<?php 
			if((wp_verify_nonce( $_REQUEST['_wpnonce'], 'gyq-public_100' ))&&(!empty($_POST))&&(!empty($_POST['JobAddress_zipcode']))){
				$vert_id = sanitize_text_field($_POST['vertId']);
				$src = rand();
				$customer =array("First_Name"=>sanitize_text_field($_POST['fname']),
					"Last_Name"=> sanitize_text_field($_POST['lname']),
					"Email"=> sanitize_text_field($_POST['uemail']),
					"Phone"=> sanitize_text_field($_POST['phone']),
					"CompanyName"=> null,
					"Address"=> array(
					"Full-address-line" => sanitize_text_field($_POST['full_address']))
				);
				$request =array("Verticalid"=>$vert_id, "Src"=>$api,"SourceID"=>$src,"JobDate"=>sanitize_text_field($_POST['JobDate']),"JobDescription"=>sanitize_text_field($_POST['JobDescription']),"Ip_address"=>"212.456.123.12");
				if(isset($_POST['JobAddress_zipcode'])) {
					$jobadd = array("Zip"=> sanitize_text_field($_POST['JobAddress_zipcode']),"Country"=>"United States");
					$request['JobAddress']= $jobadd;
				}
				if(isset($_POST['DestinationAddress_zipcode'])) {     
					$destadd = array("Zip"=> sanitize_text_field($_POST['DestinationAddress_zipcode']),"Country"=>"United States");
					$request['DestinationAddress']= $destadd;
				}
				for($i=1;$i<=25;$i++) {
					if(isset($_POST['q'.$i])) {
						$question = array("Question_Id"=> sanitize_text_field($_POST['q'.$i.'_Qid']),"Answer"=> null, "ChosenAnswersString"=> sanitize_text_field($_POST['q'.$i]));
						$request['q'.$i] = $question;
					}
				}
			
				$payload=array(
					'Requester'=>$api,
					'VerticalId'=> $vert_id,
					'Customer' =>$customer,
					'Request'=>$request
				);
		
				$payload = json_encode($payload);
				$args = array(
					'body' => $payload,
					'blocking' => true,
					'headers'   => array('Content-Type' => 'application/json; charset=utf-8'),
					'method'    => 'POST'
				);
				
				$result=gyq_post_services_curl($url,$args);
				echo '<div class="row">';
				echo '<div class="col-md-12 text-center" style="font-size:18px;">';
				//if($result->Status == "Success"){
					echo '<p class="success">'.esc_html__($data['msg_header']).'</p>';
					echo '<p class="success">'.esc_html__($data['message']).'</p>';
				//}
				//else{
					//echo '<p class="error">Error in data submission</p>';
				//}
				echo '</div>';
				echo '</div>';
			}
			else {
		 if(!empty($data['back_image'])){?>
            <div class="col-xs-12 roofing text-center" id="<?php echo esc_html__($result[0]->Id)?>" style="background:url(<?php echo esc_html__($data['back_image']);?>);background-repeat: no-repeat;background-size: cover;"> 
			<?php 
		 }else {?>
			<div class="col-xs-12 roofing text-center" id="<?php echo esc_html__($result[0]->Id)?>" style="background-color:<?php echo esc_html__($data['back_color']);?>"> 
			<?php }?>

				<div class="form_section" id="<?php echo esc_html__($result[0]->Id) ?>" style="background:<?php echo esc_html__($data['form_back_color']);?>"> 
				<h2 class="plugin_header"><?php echo esc_html__($data['h2_header']); ?></h2>
			    <h4 class="plugin_text"><?php echo esc_html__($data['h2_text']); ?></h4>
				<form method="post" id="getquotes_form" name="custom">
				<?php wp_nonce_field( 'gyq-public_100' );?>
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php
						foreach($result as $key2 =>$value){ 
							$a = $result[$key2]->FieldData;

							/* Sorting */
							$new = array();
							foreach ($a as $k => $v) {                                           
                                $new[$k] = $v->Order;
                            }
							array_multisort($new, SORT_ASC, $a);                            
							$i=1;
							foreach($a as $key1 =>$value1){     
                            if(count($a)==$i) { 
                               $idd= 'get_qoute';
                            } else {
                                $idd= 'next';
                            }
						    $form_fields = $a[$key1]->Field;
							$form_name = $a[$key1]->Name;
							?>  
							<div class="swiper-slide">
								<h3 class="servicetitlefirst"><?php if(isset($result[$key1]->Name)) {echo esc_html__($result[$key1]->Name);}?></h3>
								<p><span class="servicetitlesecond"><?php echo esc_html__($form_name);?></span></p>
								<div class="question-stage first-stage">
									<div class="question-stage-inner animated">
										<div class="zip-form">
										<?php
										$req =$a[$key1]->Required;
										if($req == true) {
											$required="required";
										} else {
											$required="not";
										}
										$fieldtype = $a[$key1]->FieldType; 
										if($fieldtype == "String"){
											if($form_name=="JobDescription"){
											?>
											<div class="col-md-12">
												<textarea class="form-control <?php echo $required;?>" name="<?php echo esc_html__($form_fields);?>" rows="3"/></textarea>
												<span class="error"></span>
											</div>
											<?php
											}
											else{
											?>
											<div class="col-md-12">
												<input type="text" class="form-control <?php echo $required;?>" name="<?php echo esc_html__($form_fields);?>"/>
												<span class="error"></span>
											</div>
											<?php	
											}							
										}
										else if ($fieldtype == "OneAnswerMultipleChoice"){
											$possibleanswer = $a[$key1]->PossibleAnswers;
											/* Sorting */
											$new_answer = array();
											foreach ($possibleanswer as $k => $v) {                                           
												$new_answer[$k] = $v->Order;
											}
											array_multisort($new_answer, SORT_ASC, $possibleanswer);
											foreach ($possibleanswer as $key2 =>$value2){
												$p_id = $possibleanswer[$key2]->Id;
												$p_text = $possibleanswer[$key2]->Text;
											?>
											<p><label><input type="radio" class="question" value="<?php echo esc_html__($p_id);?> " name="<?php echo esc_html__($form_fields);?>"><?php echo esc_html__( $p_text);?></label><input type="hidden" value="<?php echo esc_html__($a[$key1]->QID);?>" name="<?php echo esc_html( __( $form_fields.'_Qid')); ?>"></p>
											<?php
											}
											?>
											<input type="hidden" id="hidden" name="qs" class="<?php echo $required;?>">
											<span class="error"></span>
										<?php
										}
										if ($fieldtype == "GoogleAddress"){
										?>
										<div class="form-group">
											<div class="row">
											<div class="col-md-12">
											<input type="text" placeholder="Zipcode" class="form-control required" id="zipcode" name="<?php echo esc_html__($form_fields.'_zipcode');?>"><span class="error"></span>
											</div>
											</div>
										</div>
										<?php
										 }
										else if ($fieldtype == "System.Nullable`1[[System.DateTime, mscorlib, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089]]")
										{
										?>
									    <div class="col-md-12">
											<input type="text" value="" name="<?php echo esc_html( __( $form_fields));?>" id="datepicker" class="form-control <?php echo $required;?>">
											<span class="error"></span>
										</div>
										<?php
										}	
										?>
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-md-12 gyq-prev-div">
								<div class="col-md-6">  <div class="swiper-button-prev"><button style="background-color:<?php echo esc_html__($data['btn_color_prev']);?>" type="submit1">Back</button></div></div>	
								<div class="col-md-6">	<div class="swiper-button-next"><button style="background-color:<?php echo esc_html__($data['btn_color_next']);?>" type="submit1" class="next" id="<?php echo $idd;?>">Next</button></div></div>
								</div>							
								</div>
							</div>
							<?php
                            $i++;
						   }
						}
						?>
						<div class="swiper-slide">
							<div class="inner-input">
								<h3 class="servicetitlefirst">Almost Done!</h3>
								<fieldset>
									<div class="form-group">
										<div class="col-md-6"> 
										   <input type="text" required="" placeholder="First name" class="form-control" name="fname" id="first-name" aria-required="true">
											<span class="error fname_error"></span>
										</div>
										<div class="col-md-6"> 
										   <input type="text" required="" placeholder="Last name" class="form-control" name="lname" id="last-name" aria-required="true">
											<span class="error lname_error"></span>
										</div>
										<div class="col-md-6"> 
											<input type="text" placeholder="Phone" class="form-control" id="phone" name="phone" >
										   <span class="error phone_error"></span>
										</div>
										<div class="col-md-6"> 
											<input type="email" required="" placeholder="Email" class="form-control" name="uemail" id="Email" aria-required="true">
											<span class="error email_error"></span>
										</div>									                                
										<div class="col-md-12"> 
											<input type="text" placeholder="Full Address" class="form-control" id="full_address" name="full_address" required="required">
											<span class="error full_address_error"></span>   								
										</div>	
									</div>
								</fieldset>
								 <div class="submit_div">
									<div class="swiper-button-prev"><button type="submit1" style="background-color:<?php echo esc_html__($data['btn_color_prev']);?>">Back</button></div>
									<input type="submit" id="submit_quote" style="background-color:<?php echo esc_html__($data['btn_color_next']);?>" name="submit_quote" value="Get Free Quotes" onclick="return confirm_submit();">
								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" name="vertId" value="<?php echo esc_html__($result[0]->Id);?>">	
                </form>
            </div>
			</div>
			<?php
			}
			?>
			</div>
		<script>
		var swiper = new Swiper('.swiper-container', {
		//direction: 'vertical',
		simulateTouch: false,
		  navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev', 
		  },
		})
		jQuery(document).ready(function () {
			jQuery("#datepicker").datepicker({
				dateFormat: "yy-mm-dd"
			}); 
		});	
		</script>
	<?php
	}
	function gyq_packages($data){				
	?>
		<div class="container-fluid">
			<div class="">
			<?php 
			if ((wp_verify_nonce( $_REQUEST['_wpnonce'], 'gyq-public-package_200' ))&&(isset($_GET['chosen'])) &&(empty($_GET['submit_quote']))){
			?>
			
			<script>
			jQuery(document).ready(function(){
				jQuery('html,body').animate({scrollTop: jQuery("#formdata").offset().top},'slow');
			});
			</script>

			<?php
			$url=$data['url'].'verticaldata?srch='.$data['service'].'&token='.$data['api'].'&packages=true';
			$packages_list = gyq_get_services_curl($url);
			$pack  = []; 
			foreach ($packages_list as $pl){
				$pack = $pl;
			}
			?>
			<?php if(!empty($data['back_image'])){?>
				<div class="firstrow" style="background:url(<?php echo esc_html__($data['back_image']);?>);background-repeat: no-repeat;background-size: cover;"> 
			<?php 
			}else{?> 
				<div class="firstrow" style="background-image:url(<?php echo plugin_dir_url( __FILE__ ) . 'images/HomeSecurity.gif';?>);background-repeat: no-repeat; background-size: cover;">
			<?php } 
			?>
			<div class="firstcontainer">
    
			<?php
			$chosen12 = explode(',',sanitize_text_field($_GET['chosen']));	
			$count = count($chosen12);
			?>
			<h2>Most Affordable Home Security systems</h2>
			<div class="row">
			<center> <h2>Your selected packages:</h2></center>
			<?php
			foreach($pack->Packages as $pa) { 
				$l=1;		  
				$ID = $pa->Id; 
				$matched=1;
				if(in_array($pa->Id,$chosen12)){  
				if ($count==1){
				?>		 
				<div class="col-md-12 col-sm-3 col-xs-12 customcol" style="text-align:center">
				<?php } 
				else if ($count == 2){
				?>
				<div class="col-md-6 col-sm-3 col-xs-12 customcol" style="text-align:center">
				<?php } else if ($count == 3)
				{?>
				<div class="col-md-4 col-sm-3 col-xs-12 customcol" style="text-align:center">
				<?php } 
				else if ($count == 4)
				{?>
	  
				<div class="col-md-3 col-sm-3 col-xs-12 customcol" style="text-align:center">
				<?php } ?>
				<a href="#card<?php echo $l;?>">
				<div class="image">
					<img src="data:image/png;base64,<?php echo esc_html__($pa->SmallLogoString); ?>">
				</div>
				<h3>
				<?php 
				echo esc_html__($pa->PartnerName);
				$partners_name='';
				if(empty($partners_name)){
					$partners_name=sanitize_text_field($pa->PartnerName);
				}
				else if($matched==$count){
					$partners_name=$partners_name.' and '.sanitize_text_field($pa->PartnerName);
				}
				else {
					$partners_name=$partners_name.', '.sanitize_text_field($pa->PartnerName);
				}
				?>
				</h3>
				</a>
				</div>
				<?php 
					$matched++;
				}
				$ID = '';
				$l++;		  
			}
			?>
			</div>
			</div>
			</div>
			<div class="">
			<?php 
			$success_message=false;
			$error_message=false;
			
			$result = $packages_list;
			?>
		 	<div class="row" id="formdata">
				<div class="roofingbg"  style="position: relative;">
				<?php if (!empty($data['back_image'])){?>
					<div class="col-xs-12 roofing text-center" id="<?php echo esc_html__($result[0]->Id);?>" style="background:url(<?php echo esc_html__($data['back_image']);?>);background-repeat: no-repeat;background-size: cover;"> 
				<?php 
				}else {?>
				<div class="col-xs-12 roofing text-center" id="<?php echo esc_html__($result[0]->Id);?>" style="background-color:<?php echo esc_html__($data['back_color']);?>"> 
				<?php }?> 
				<div class="form_section" id="<?php echo esc_html__($result[0]->Id);?>" style="background:<?php echo esc_html__($data['form_back_color']);?>"> 			
				<?php
				if(!$success_message){
				$s=1;
				foreach ($result as $key => $value) { 
					$name = str_replace(' ', '_', sanitize_text_field($value->Name));
					$consenttxt=sanitize_text_field($value->Consenttxt);
					$consenttxt= explode("companies", $consenttxt);
					$consenttxt=$consenttxt[0].' companies '.$partners_name.' '.$consenttxt[1];			   
					$leadcheckcontrol_list=explode(',',sanitize_text_field($_GET['leadcheckcontrol_list']));
					$leadcheck_values='';
					foreach($leadcheckcontrol_list as $leadcheckcontrol){
						if(empty($leadcheck_values)){
							$leadcheck_values=sanitize_text_field($_GET[$leadcheckcontrol]);
						}
						else{
							$leadcheck_values.=','.sanitize_text_field($_GET[$leadcheckcontrol]);
						}					 
					}
			   
               ?>
                <form method="get" name="custom" action="" class="service <?php if($s==1) { echo 'active'; } ?>"  id="service_<?php echo esc_html__($name); ?>">
				<?php wp_nonce_field( 'gyq-public-package_200' );?>
                    <div class="swiper-container">
                       <div class="swiper-wrapper">
                        <?php                                
                            $a = $result[$key]->FieldData; 
                            $new = array();
                            foreach ($a as $k => $v)  {                                           
                                $new[$k] = $v->Order;
                            }
                            array_multisort($new, SORT_ASC, $a);
                            $i=1;
                            foreach($a as $key1 =>$value1)
                            {         
                            $form_fields = $a[$key1]->Field;
                            $form_name = $a[$key1]->Name;
                            ?>
                            <div class="swiper-slide">   
													
                            <h3 class="servicetitlefirst"><?php echo esc_html__($value->Name);?></h3>
                            <p><span class="servicetitlesecond"><?php echo esc_html__($form_name);  ?></span></p>
                            <div class="question-stage first-stage">
                            <div class="question-stage-inner animated">
                            <div class="zip-form1">
                            <?php
                             $req =$a[$key1]->Required;
                             if($req == true) {
                                $required="required";
                             } else {
                                $required="not";
                             }
                           
                             $fieldtype = $a[$key1]->FieldType; 
                              if ($fieldtype == "String") {
                                if($form_name=="Notes") {
                                    ?>
                                    <div class="col-md-12">
                                       <textarea class="form-control <?php echo  $required; ?>" name="<?php echo esc_html__( $form_fields); ?>" rows="3"/></textarea>
                                       <span class="error"></span>
                                   </div>
                               <?php }   else {
                             ?>
                             <div class="col-md-12">
                            <input type="text" class="form-control <?php echo  $required; ?>" name="<?php echo esc_html__( $form_fields); ?>"/>
                            <span class="error"></span>
                             </div>
                           <?php  } } else if ($fieldtype == "OneAnswerMultipleChoice")  { 
                            $possibleanswer = $a[$key1]->PossibleAnswers;
                             /* Sorting */
                             $new_answer = array();
                             foreach ($possibleanswer as $k => $v)  {                                           
                                $new_answer[$k] = $v->Order;
                             }

                            array_multisort($new_answer, SORT_ASC, $possibleanswer);
                             
                            foreach ($possibleanswer as $key2 =>$value2){
								$p_id = $possibleanswer[$key2]->Id;
								$p_text = $possibleanswer[$key2]->Text;
                             ?>
                            
                             <p><label><input type="radio" class="question" value="<?php echo esc_html__($p_id); ?>" name="<?php echo esc_html__($form_fields); ?>">   <?php echo $p_text; ?></label></p>
                             <input type="hidden" value="<?php echo esc_html__($a[$key1]->QID); ?>" name="<?php echo esc_html__($form_fields); ?>_Qid">
                            <?php
                             }
                            echo '<input type="hidden" id="hidden" name="qs" class="'.$required.'" /><span class="error"></span>';
                              }else if ($fieldtype == "GoogleAddress") { ?>
                              <div class="form-group">
                                <div class="row">
                                <div class="col-md-12"><input type="text" placeholder="Zipcode" class="form-control required" id="zipcode" name="<?php echo esc_html__($form_fields); ?>_zipcode"><span class="error"></span>
                                </div>
                               </div>
                              </div>
                            <?php  } else if ($fieldtype == "System.Nullable`1[[System.DateTime, mscorlib, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089]]")
                            {  ?>
                            	<div class="row">
                                <div class="col-md-12">
                                	<div class="col-md-12">
										<input type="text" value="" name="<?php echo esc_html__($form_fields); ?>" class="date_picker <?php echo  $required; ?>" placeholder="Date">
										<span class="error"></span>
									</div>
								</div>
								</div>
                           <?php }
                          ?>
                             </div> 
                            </div>
                            </div>  
                            <div class="row">													
                            <div class="col-md-12">
                             <div class="col-md-6">  <div class="swiper-button-prev" style="<?php if($i ==  "1"){  echo 'display:none';} ?>"><button type="submit1" style="background-color:<?php echo esc_html__($data['btn_color_prev']);?>">Back</button></div></div>     
                            <div class="col-md-6">  <div class="swiper-button-next"><button type="submit1" style="background-color:<?php echo esc_html__($data['btn_color_next']);?>" class="next">Next</button></div></div>
                             </div>                           
                            </div>                   
                        </div>
                        <?php  $i++; }            
                        ?>
                        <div class="swiper-slide">
                        <div class="inner-input">
                           <h3 class="servicetitlefirst">Almost Done!</h3> 
                            <fieldset>
                            <div class="form-group customer_info">
                                <div class="col-md-12">
									<div class="row"> 
										<div class="col-md-6"> 
										   <input type="text" required="" placeholder="First name" class="form-control" name="fname" id="first-name" aria-required="true">
										   <span class="error fname_error"></span>
										</div>
										<div class="col-md-6"> 
										   <input type="text" required="" placeholder="Last name" class="form-control" name="lname" id="last-name" aria-required="true">
										   <span class="error lname_error"></span>
										</div>
									</div>
									<div class="row"> 	
										<div class="col-md-6"> 
											<input type="text" required="" placeholder="Phone" class="form-control" id="phone" name="phone" >
											 <span class="error phone_error"></span>
										</div>
										<div class="col-md-6"> 
											<input type="email" required="" placeholder="Email" class="form-control" name="uemail" id="Email" aria-required="true">
											<span class="error email_error"></span>
										</div>
                                    </div>
									<div class="row"> 
										<div class="col-md-12"> 
											<input type="text" placeholder="Full Address" class="form-control" id="full_address" name="full_address" required="required">
											<span class="error full_address_error"></span>                                 
										</div>
                                     </div>
									 <div class="row" style="text-align:left;">
										<div class="col-md-12">
											<input type="checkbox" aria-required="true" name="consent_txt" id="consent_txt" value="1"/>&nbsp;<span style="color:#fb7f1d;font-size:12px;"><?php echo esc_html( __( $consenttxt)); ?></span>
											<br/><span class="error consent_txt_error"></span> 
										</div>
									 </div>
									 <input type="hidden" name="chosen" value="<?php echo esc_html( __( $_GET['chosen']));?>">
									 <input type="hidden" name="universal_leadid" value="<?php echo esc_html( __( $leadcheck_values));?>">
									 <input type="hidden" name="leadcheckname"  value="<?php echo esc_html( __( $_GET['leadcheckname_list']));?>">
                                </div>
                        </div>
                        </fieldset>
                         <div class="submit_div row">
                            <input type="submit" name="submit_quote" id="submit_quote" style="background-color:<?php echo esc_html__($data['btn_color_next']);?>" value="Get Free Quotes" onclick="return confirm_submit();">
                        </div>         
                        </div>
                      </div>
                      </div>
                   </div>
                   <input type="hidden" name="vertId" value="<?php echo esc_html__($value->Id); ?>">
                   <input type="hidden" name="home_url" id="home_url" value="<?php echo home_url(); ?>">
                </form>
            <?php $s++; }?>
			<script>
			var swiper = new Swiper('.swiper-container', {
				//direction: 'vertical',
				simulateTouch: false,
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev', 
				},
			})
			jQuery(document).ready(function () {
				jQuery("#datepicker").datepicker({
					dateFormat: "yy-mm-dd"
				}); 
			});
		</script>
		<?php		
		}
		?>		   		   
        </div>
		</div>
		</div>
		</div>
		</div>
	   <?php
		}
		else if ((wp_verify_nonce( $_REQUEST['_wpnonce'], 'gyq-public-package_200' ))&&(isset($_GET['submit_quote']))){
			$vert_id = sanitize_text_field($_GET['vertId']);
			$src = rand();
			$phone=sanitize_text_field($_GET['phone']);
			$phone=str_replace(" ","",$phone);
			$phone=str_replace("-","",$phone);
			$phone=str_replace(".","",$phone);
			$customer =array("First_Name"=>sanitize_text_field($_GET['fname']),
				"Last_Name"=> sanitize_text_field($_GET['lname']),
				"Email"=> sanitize_text_field($_GET['uemail']),
				"Phone"=> $phone,
				"CompanyName"=> null,
				"Address"=> array(
					"Full-address-line" =>sanitize_text_field($_GET['full_address']),'Country'=>'United States')
			);
			
			$request =array("Verticalid"=>$vert_id, "Src"=>esanitize_text_field($data['api']),"SourceID"=>$src,"JobDate"=>empty(sanitize_text_field($_GET['JobDate']))?'':sanitize_text_field($_GET['JobDate']),"JobDescription"=>empty(sanitize_text_field($_GET['JobDescription']))?'':sanitize_text_field($_GET['JobDescription']),"Ip_address"=>"212.456.123.12");

			if(isset($_GET['JobAddress_zipcode'])) {
				$jobadd = array("Zip"=> sanitize_text_field($_GET['JobAddress_zipcode']),'Country'=>'United States');
				$request['JobAddress']= $jobadd;
			}

			if(isset($_GET['DestinationAddress_zipcode'])) {
				$destadd = array("Zip"=> sanitize_text_field($_GET['DestinationAddress_zipcode']),'Country'=>'United States');
				$request['DestinationAddress']= $destadd;
			}
			for($i=1;$i<=25;$i++) {
				if(isset($_GET['q'.$i])) {
					$question = array("Question_Id"=> sanitize_text_field($_GET['q'.$i.'_Qid']),"Answer"=> null, "ChosenAnswersString"=> sanitize_text_field($_GET['q'.$i]));
					$request['q'.$i] = $question;
				}
				
			}
	
			$IdsForLead=array();	
			if(!empty($_GET['leadcheckname'])){
				$leadcheckname=explode(',',sanitize_text_field($_GET['leadcheckname']));
				$universal_leadid=explode(',',sanitize_text_field($_GET['universal_leadid']));
				for($i=0;$i<count($leadcheckname);$i++){
					$IdsForLead[]=array('Name'=>$leadcheckname[$i],'LeadIDValue'=>$universal_leadid[$i]);
				}
			}

			$payload=array(
				'Requester'=>'c9b994b2e121e11b069fe8c7c52f6592',
				'VerticalId'=> $vert_id,
				'Customer' =>$customer,
				'Request'=>$request,
				'Redirect' => false,
				'ChosenPackages'=> explode(",",sanitize_text_field($_GET['chosen'])),
				'IdsForLead' => $IdsForLead
			);

			$payload = json_encode($payload);
			$url=$data['url']."leadpost?pst=post";
		  
			$args = array(
				'body' => $payload,
				'blocking' => true,
				'headers'   => array('Content-Type' => 'application/json; charset=utf-8'),
				'method'    => 'POST'
			);
			
			$result=gyq_post_services_curl($url,$args);
			echo '<div class="row">';
			echo '<div class="col-md-12 text-center" style="font-size:18px;">';
			echo '<p class="success">'.esc_html__($data['msg_header']).'</p>';
			echo '<p class="success">'.esc_html__($data['message']).'</p>';
			echo '</div>';
			echo '</div>';
		}
		else{
			$url= $data['url'].'verticaldata?srch='.$data['service'].'&token='.$data['api'].'&packages=true';
			$packages_list = gyq_get_services_curl($url);
			$pack  = [];  
			foreach ($packages_list as $pl){
				$pack = $pl;
			}
			?>
			<div class="container-fluid firstrow" style="background-image:url(<?php echo plugin_dir_url( __FILE__ ) . 'images/HomeSecurity.gif';?>);background-repeat: no-repeat; background-size: cover;">
			<div class="container firstcontainer">
			<h2>Most Affordable Home Security systems</h2>
			<p> Trusted by over 11.000.000 home owners. Affordablehomesecurity helps you compare the best home security systems.</p>	
			<center><a href="#package_section" class="btn btn-info pack-button" role="button">View Packages</a></center>	
			<div class="row" id="minilogo">
			<?php 
			$l=1;
			foreach($pack->Packages as $pa) { ?>
				<div class="col-md-3 col-sm-3 col-xs-12 customcol">
				<a href="#card<?php echo $l;?>">
				<div class="image">
					<img src="data:image/png;base64,<?php echo esc_html__($pa->SmallLogoString); ?>">
				</div>
				<h3><?php echo esc_html__($pa->PartnerName); ?></h3>
				</a>
				</div>
			<?php 
				$l++;
			} ?>
			</div>
			</div>
			</div>
	
			<div class="partners" id="package_section">
			<?php if(empty($pack)) { ?>
				<span class="notfound">No records found</span>
				<?php } else { ?>
				<div class="container-fluid">
					<div class="container">
					<div class="partners-desktop">
					<?php  
					$i=1;
					foreach($pack->Packages as $p) {
						if($p->PartnerLogo == null) {
							$imgsrc= get_template_directory_uri().'/images/user.png';
						} 
						else {
							$imgsrc= $p->PartnerLogo;
						}         
						$pros = explode(';',$p->Pros);
						$cons = explode(';',$p->Cons);
					?>
        <div class="custom-card detailed mt-0 <?php echo esc_html__('package_select_'.$p->Id); ?>" id="card<?php echo esc_html__($i);?>"> 
            <div class="card-tag"><span># <?php echo $i;?></span><input type="hidden" name="package_name" class="package_name" id="<?php echo esc_html__('hidden_package_'.$p->Id); ?>" value="" /></div>
            <div class="card-header d-flex flex-row justify-content-between align-items-center flex-wrap">
				<div class="col-md-4 col-sm-4 col-xs-12 my-2 pl-0 image">
				  <img  src="data:image/png;base64,<?php echo esc_html__($imgsrc); ?>">
				</div> 
				<div class="col-md-4 col-sm-4 col-xs-12 my-2 text-center">
					<div class="star-ratings">
						<span class="phone"><a href="tel:<?php echo esc_html__($p->Phone);?>"><?php echo esc_html__($p->Phone);?></a></span><br>
						<span class="tm-rating_rev" data-rating="<?php echo round($p->Rating,1); ?>" data-num-stars="5" ></span>
						<span class="raterev"><?php echo round($p->Rating,1); ?>/5</span>
					</div>
				</div> 
				<div class="col-md-4 col-sm-4 col-xs-12 my-2 text-right pr-0">
					<div class="selectpackage">
						<label>FREE Quote
						<input type="checkbox" class="package <?php echo esc_html__('package_'.$p->Id); ?>" name="package" data-pname="<?php echo esc_html__($p->PartnerName);?>" value="<?php echo esc_html__($p->Id);?>">
						</label>
					</div>
				</div>
			</div> 
			<div class="card-content">
				<div class="step-header">
					<div class="d-flex flex-row flex-wrap justify-content-between align-items-start mb-4 ">
						<h4 class="font-weight-bold col-md-9"><?php echo $i;?>.  <?php echo esc_html__($p->Name);?></h4> 
					</div>
				</div>   
				<div class="step-content pl-0">            
					<div id="myCarousel<?php echo esc_html__($p->Id);?>" class="carousel slide" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
					<div class="item active">
					<div class="d-flex flex-row flex-wrap justify-content-between align-items-center step-1">
						<div class="col-md-6 p-0" style="position: relative;">
							<div class="image"><img src="data:image/png;base64,<?php echo esc_html__($p->Image1String); ?>" class=""></div> 
							<div class="stats-box text-center">
								<p class="fc-secondary font-aleo d-block m-0 starting-price">Starting Price</p> 
								<div class="price d-flex justify-content-center"><span>$</span><?php echo esc_html__($p->StartPrice);?></div> 
								<div class="selectpackage">
								<label>FREE Quote
								<input type="checkbox" class="package <?php echo esc_html__('package_'.$p->Id); ?>" name="package" data-pname="<?php echo esc_html__($p->PartnerName);?>" value="<?php echo esc_html__($p->Id);?>">
								</label>
								</div>
							</div>
						</div> 
						<div class="col-md-4">
							<h4 class="font-weight-bold name-class"><?php echo esc_html__($p->DescriptionHeader);?></h4> 
							<h5 class="font-aleo mb-4 mt-0 mx-0 p-0 border-0"><?php echo esc_html__($p->DescriptionSubtext);?> </h5><p class="mb-4"> <?php echo esc_html__($p->Description);?></p>
						</div>
					</div>
				</div> 
				<div class="item">
					<div class="d-flex flex-row flex-wrap justify-content-between align-items-center step-2">
						<div class="col-md-4 p-0">
							<div class="image">
								<img src="data:image/png;base64,<?php echo esc_html__($p->Image2String); ?>">
							</div> 
						</div>
						<div class="col-md-8 pl-0">
							<h5 class="ml-0 text-center font-aleo header"><?php echo esc_html__($p->ProsConsHeader); ?>?</h5> 
							<div class="d-flex flex-row flex-wrap">
							  <div class="col-md-6 pl-0">
								<h5 class="my-3 mx-0 mt-0 border-0 text-center">Pros</h5>
								<?php  
								foreach($pros as $pro) {
									echo '<p class="d-flex flex-row flex-nowrap align-items-baseline">
								  <i aria-hidden="true" class="fa fa-check-circle"></i>'.esc_html__($pro).'</p>';
								}
								?>
								</div> 
								<div class="col-md-6 pl-0">
								  <h5 class="my-3 mx-0 mt-0 border-0 text-center">Cons</h5> 
								   <?php  
									  foreach($cons as $c) {
										echo '<p class="d-flex flex-row flex-nowrap align-items-baseline">
										  <i aria-hidden="true" class="fa fa-minus-circle"></i>'.esc_html__($c).'</p>';
									  }
									  ?>
								</div>
							</div> 
							<div class="selectpackage">
								<label>Select
								<input type="checkbox" class="package <?php echo esc_html__('package_'.$p->Id); ?>" name="package" data-pname="<?php echo esc_html__($p->PartnerName);?>" value="<?php echo esc_html__($p->Id);?>">
								</label>
							</div>
						</div> 
					</div>
				</div> 
				</div>

			   <div class="controlsdiv">
				<a class="left" href="#myCarousel<?php echo esc_html__($p->Id);?>" data-slide="prev">
				  <span class="fa fa-long-arrow-left"></span>
				  <span class="sr-only">Previous</span>
				</a>
			   
				<a class="right" href="#myCarousel<?php echo esc_html__($p->Id);?>" data-slide="next">
				  <span class="fa fa-long-arrow-right"></span>
				  <span class="sr-only">Next</span>
				</a>
				 <ol class="carousel-indicators">
					<li data-target="#myCarousel<?php echo esc_html__($p->Id);?>" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel<?php echo esc_html__($p->Id);?>" data-slide-to="1"></li>
				 </ol>
				</div>
				</div> 
				</div>          
			</div> 
        </div>    
                 
		<?php $i++;} 
		?>   
        <form name="submitdata" id="submitdata" action="" method="GET">		  		
		 <div id="leadcheckname_section">
		 	<?php wp_nonce_field( 'gyq-public-package_200' );?>
		 <?php
		 $names_array='';
		 foreach($pack->LeadChecks as $leadcheck) {		
			if(!empty($leadcheck->Name)){
			if(empty($names_array)){
				$names_array=$leadcheck->Name;
			}
			else{
				$names_array.=','.$leadcheck->Name;
			}
			?>
			<?php echo $leadcheck->formHtml; ?>
			<?php echo $leadcheck->scriptHtml; ?>
			<?php
			  }
		  }
		?>
			<input type="hidden" name="leadcheckname_list" id="leadcheckname_list" value="<?php echo $names_array; ?>" />
			<input type="hidden" name="leadcheckcontrol_list" id="leadcheckcontrol_list" value="" />
			<?php
			?>
			</div>
			<input type="hidden" id="chosendata" name="chosen">
			<input type="hidden" name="code" value="c9b994b2e121e11b069fe8c7c52f6592">
			<div class="submitdiv">
			<input type="button" id="submitpackages" name="submitpackages" value="Next step"/>
			<div style="padding-top:10px;">
			</div>  
			</div>		
          </form>                
    </div>
	</div>
	</div>
    <div class="partner_mobile">
	<?php  
    $i=1;
    foreach($pack->Packages as $p) {
        if($p->PartnerLogo == null) {
			$imgsrc= get_template_directory_uri().'/images/user.png';
        } else {
			$imgsrc= $p->PartnerLogo;
        }
        $pros = explode(';',$p->Pros);
        $cons = explode(';',$p->Cons);
        ?>

        <div class="custom-card detailed mt-0 <?php echo esc_html__('package_select_'.$p->Id); ?>" id="card<?php echo $i;?>"> 
            <div class="card-tag" style="padding: .5rem .5rem !important;"><span># <?php echo $i;?></span><input type="hidden" name="package_name" class="package_name" id="<?php echo esc_html__('hidden_package_'.$p->Id); ?>" value="" /></div>
			<div class="card-name-mobile"><h4 class="font-weight-bold col-md-9"> <?php echo esc_html__(explode(':',$p->Name)[1]);?></h4></div>
            <div class="card-header d-flex flex-row justify-content-between align-items-center flex-wrap">
            
		    <div class="row">
			<div class="col-md-6 col-sm-6">
			<div class="col-md-12 col-sm-12 col-xs-12 my-2 pl-0 image">
              <img  src="data:image/png;base64,<?php echo $imgsrc; ?>">
            </div> 
			
			<div class="col-md-12 col-sm-12 col-xs-12 stat1 text-left">
              <div class="star-ratings">
              <span class="tm-rating_rev" style="padding-left: 10%;" data-rating="<?php echo round($p->Rating,1); ?>" data-num-stars="5" ></span>
            </div>
            </div> 
			<div class="col-md-3 col-sm-4 col-xs-6 my-2 text-center stat1 stat2">
                <p class="fc-secondary font-aleo d-block m-0 starting-price">Starting Price</p> 
                <div class="price d-flex justify-content-center"><span>$</span><?php echo esc_html__($p->StartPrice);?></div>
            </div> 
			</div>
			<div class="col-md-6 col-sm-6">
			<div class="col-md-3 col-sm-4 col-xs-6 my-2 text-right pr-0 pho1">
			<span class="phone"><a href="tel:<?php echo esc_html__($p->Phone);?>"><?php echo esc_html__($p->Phone);?></a></span><br>
			</div>
			<div class="col-md-3 col-sm-4 col-xs-6 my-2 text-right pr-0">
			
            <div class="selectpackage s2">
            <label>FREE Quote
            <input type="checkbox" class="package <?php echo esc_html__('package_'.$p->Id); ?>" name="package" data-pname="<?php echo esc_html__($p->PartnerName);?>" value="<?php echo esc_html__($p->Id);?>">
            </label>
			</div>
            </div>
			
			</div>
			</div>         
			</div> 
			<div class="card-content">
              <div class="step-header">
                <div class="d-flex flex-row flex-wrap justify-content-between align-items-start mb-4 "> 
                </div>
              </div>   
              <div class="step-content pl-0">            
			<div id="myCarousel<?php echo esc_html__($p->Id);?>" class="carousel slide" data-ride="carousel" data-interval="false">
   
			<div class="carousel-inner">
			  <div class="item active">
				<div class="d-flex flex-row flex-wrap justify-content-between align-items-center step-2">
				   <div class="col-md-4 p-0">
			   </div>
				<div class="col-md-8 pl-0">
					<h5 class="ml-0 text-center font-aleo header"><?php echo esc_html__($p->ProsConsHeader); ?>?</h5> 
					<div class="d-flex flex-row flex-wrap">
					  <div class="col-md-6 pl-0">
					 <h5 class="my-3 mx-0 mt-0 border-0 text-center">Pros</h5>
						<?php  
					  foreach($pros as $pro) {
						echo '<p class="d-flex flex-row flex-nowrap align-items-baseline">
						  <div style="display:table;width:100%;"><div style="width:10%;float:left;"><i aria-hidden="true" class="fa fa-check-circle"></i></div><div style="width:90%;float:right;padding-left:5px;">'.ltrim(esc_html__($pro)).'</div></div></p>';
					  }
					  ?>
					  </div> 
				<div class="col-md-6 pl-0">
				  <h5 class="my-3 mx-0 mt-0 border-0 text-center">Cons</h5> 
				   <?php  
					  foreach($cons as $c) {
					   echo '<p class="d-flex flex-row flex-nowrap align-items-baseline">
						 <div style="display:table;table;width:100%;"><div style="width:10%;float:left;"><i aria-hidden="true" class="fa fa-minus-circle"></i></div><div style="width:90%;float:right;padding-left:5px;">'.ltrim(esc_html__($c)).'</div></div></p>';
					  }
					  ?>
				</div>
			  </div> 
				<div class="selectpackage s1">
					<label>FREE Quote
					<input type="checkbox" class="package <?php echo esc_html__('package_'.$p->Id); ?>" name="package" data-pname="<?php echo esc_html__($p->PartnerName);?>" value="<?php echo esc_html__($p->Id);?>">
					</label>
				  </div>
			   </div> 
			  
			 </div>
			</div> 
			</div>
			</div>       
            </div>          
          </div>
        </div>    
                 
          <?php $i++;  } 
		  ?>   
          <form name="submitdata" id="submitdata" action="" method="GET">
		  <?php wp_nonce_field( 'gyq-public-package_200' );?>
		  <div id="leadcheckname_section">
		  <?php
		  $names_array='';
		  foreach($pack->LeadChecks as $leadcheck) {		
			  if(!empty($leadcheck->Name)){
			  if(empty($names_array)){
					$names_array=$leadcheck->Name;
				 }
				 else{
						$names_array.=','.$leadcheck->Name;
					 }
				
				  ?>
				  <?php echo $leadcheck->formHtml; ?>
				  <?php echo $leadcheck->scriptHtml; ?>
				  <?php
			  }
		  }
		?>
			<input type="hidden" name="leadcheckname_list" id="leadcheckname_list" value="<?php echo $names_array; ?>" />
			<input type="hidden" name="leadcheckcontrol_list" id="leadcheckcontrol_list" value="" />
			<?php
		  ?>
		  </div>
          <input type="hidden" id="chosendata_mobile" name="chosen">
          <input type="hidden" name="code" value="c9b994b2e121e11b069fe8c7c52f6592">
		   <div class="submitdiv">
			<input type="button" id="submitpackages_mobile" name="submitpackages" value="Next step"/> 
			 <div style="padding-top:10px;">
			   </div>  
          </div>		
          </form>
		  </div>
	</div>
	<?php	}
	}
	  ?>
</div>
</div>		
	<?php
	}
	add_shortcode('getyourquote', 'gyq_vertical' );	
	?>
 