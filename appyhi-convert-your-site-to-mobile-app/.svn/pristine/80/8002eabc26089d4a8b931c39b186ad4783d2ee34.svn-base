<?php wp_head(); ?>
<?php
//Check if this site has a profile on appyhi. Check with the public api endpoint
          $response = wp_remote_request( "https://appyhi.com/api/sites?url=".get_site_url().""); 
          $body = trim(wp_remote_retrieve_body($response), "\xEF\xBB\xBF");  
          $body = trim($body, "\xEF\xBB\xBF"); 
          $json = json_decode($body);
          $status = esc_html($json->status); 
          $message = esc_html($json->message); 
          ///
          if($status == "error"){
          ?>

<div class="account-page">

    <div class="main-wrapper">
      <div class="account-content"> 
        <div class="container">

          <div class="account-logo">
            <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ); ?>images/logo.png">
          </div>

           <form target="_blank" method="POST" action="https://appyhi.com/dashboard/ss_reg_wordpress">

            <div class="account-box">
            <div class="account-wrapper">
              <h3 class="account-subtitle">

            Convert your website into a mobile app</h3> 
                                                                  
                <div class="row">
                <div class="col-lg-6">
                  <div class="card">
              
              <div class="form-group">
                  <label>Website</label>
                  <input name="url" required="1" class="form-control" type="text" value="<?php echo esc_html(get_site_url()); ?>">
                </div>
                 <div class="form-group">
                  <label>App Name:</label>
                  <input name="appname" required="1" class="form-control" type="text" value="<?php echo esc_html(get_bloginfo()); ?>">
                </div>
                 <div class="form-group">
                  <label>Your Full Name:</label>
                  <input name="name" required="1" class="form-control" type="text">
                </div>
                <div class="form-group">
                  <label>Email:</label>
                  <input name="email" required="1" class="form-control" type="text" value="<?php $user_info = get_userdata(1); echo $user_name = esc_html($user_info->user_email); ?>">
                </div>
                <div style="padding: 34px; background-color: #cc3333; color: #fff; margin-bottom: 33px; ">
                            <label style="color: #fff;">Include a Blog/News Section/Tab:</label> 
                            <br>
                            <select class="form-control" name="blog_section" required="1">
                              <option value="0">No - no need</option>
                              <option value="1" selected="1">Yes. Please include</option>
                            </select>
                            <br>
                            <label style="color: #fff;">Use your current blog or create new:</label>
                            <select class="form-control" name="blog_option">
                              <option value=""></option>
                              <option value="0">I don't have existing blog. Create one for me.</option>
                              <option value="1" selected="1">Yes. I have an existing blog</option>
                            </select>
                            <br>
                            <label style="color: #fff;">Blog Address (if you have existing blog. Or skip & we will provide for you.):</label>
                            <input style="font-weight: bold;" type="text" name="blog_address" class="form-control" value="<?php echo esc_html(get_site_url()); ?>/blog">
                          </div>
                 
               
            </div>
            </div>

            <div class="col-lg-4"> 
              <!-- phone -->
            <div class="phoneContent" >
                <div class="phoneWrapper">
                    <div class="in" id="in" style="color: #fff;">
                        <iframe class="getFrame" src="<?php echo esc_html(get_site_url()); ?>" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
            <!-- phone --> 
          </div>
        </div>


            <div class="container">
        <div class="row">
            
            <div class="col-lg-4">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <i class="fa fa-adjust"></i>
                        <div class="price-value"> $19.88 <span class="month">one time</span> </div>
                    </div>
                    <h3 class="heading">Basic</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><i class="fa fa-check"></i> ANDROID Only</li>
                            <li><i class="fa fa-check"></i> Get the APK version for distribution</li>
                            <li><i class="fa fa-check"></i> Share to your users to install.</li>
                            <li><i class="fa fa-check"></i> Push notification available.</li>
                            <li><i class="fa fa-check"></i> Blog/Vlog section with ability to monetize available.</li>
                            <li><i class="fa fa-check"></i>  24/7 Support.</li>
                            <li style="color: red;"><i class="fa fa-times"></i>  Publish it by yourself <br>on Google playstore.</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <button class="button btn btn-primary" name="type" value="basic" type="submit">Choose Plan</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="pricingTable green">
                    <div class="pricingTable-header">
                        <i class="fa fa-briefcase"></i>
                        <div class="price-value"> $39.99 <span class="month">one time</span> </div>
                    </div>
                    <h3 class="heading">Standard</h3>
                    <div class="pricing-content">
                       <ul>
                            <li><i class="fa fa-check"></i> ANDROID Only</li>
                            <li><i class="fa fa-check"></i> Get the APK version for distribution (optional)</li>
                            <li><i class="fa fa-check"></i>  Share to your users to install.</li>
                            <li><i class="fa fa-check"></i>  Push notification available.</li>
                            <li><i class="fa fa-check"></i>  Blog/Vlog section with ability to monetize available.</li>
                            <li><i class="fa fa-check"></i> Dedicated page with social share and analytics.</li>
                            <li><i class="fa fa-check"></i>  24/7 Support.</li>
                            <li style="color: green;"><i class="fa fa-check"></i>  We publish it for you on Google playstore!</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <button class="button btn btn-success" name="type" value="standard" type="submit">Choose Plan</button>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-4">
                <div class="pricingTable red">
                    <div class="pricingTable-header">
                        <i class="fa fa-cube"></i>
                        <div class="price-value"> $72.54 <span class="month">one time</span> </div>
                    </div>
                    <h3 class="heading">Extra</h3>
                    <div class="pricing-content">
                        <ul>
                            <li><i class="fa fa-check"></i> ANDROID app</li>
                            <li><i class="fa fa-check"></i> APPLE app</li> 
                            <li><i class="fa fa-check"></i> Get app packages for distribution to your users (optional)</li> 
                            <li><i class="fa fa-check"></i> Share to your users to install.</li>
                            <li><i class="fa fa-check"></i> Push notification available.</li>
                            <li><i class="fa fa-check"></i> Blog/Vlog section with ability to monetize available.</li>
                            <li><i class="fa fa-check"></i> Dedicated page with social share and analytics.</li>
                            <li><i class="fa fa-check"></i> 24/7 Support.</li>
                            <li style="color: green;"><i class="fa fa-check"></i>  We publish for you on Google playstore!</li>
                            <li style="color: green;"><i class="fa fa-check"></i>  We publish for you <br>on Apple Appstore!</li>
                        </ul>
                    </div>
                    <div class="pricingTable-signup">
                        <a href="#">Coming Soon</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

            </div>
          </div>
        </form>


      <a href="" onclick="javascript:window.location.reload();"><i class="fa fa-refresh"></i> Reload Page</a> after form submission

        </div>
      </div>
    </div>
  </div>

<?php }else{ ?>
 
 <br>
 <br>
     
           <div class="container">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-12">
                  <h3 class="page-title"><?php echo esc_html($json->appname); ?></h3> 
                </div>
              </div>
            </div>


            
              <div class="card-body">
                <div class="row">                  
              
                       <div class="col-lg-7">
                            
                            <label>Link:</label>
                            <strong><?php echo esc_html($json->link); ?></strong>
                            <br>
                            <label>Type:</label>
                            <strong><?php echo esc_html($json->type); ?></strong>
                            <br>
                            <label>Status:</label>
                            <div class="progress">
        <?php
          $response1 = wp_remote_request( "https://appyhi.com/api/status?orderid=".$json->orderid."&acctid=".$json->acctid."");
          $body1 = trim(wp_remote_retrieve_body($response1), "\xEF\xBB\xBF");  
          $body1 = trim($body1, "\xEF\xBB\xBF"); 
          $json1 = json_decode($body1); 
          foreach( $json1->list as $item ) {
        ?>          
              <div style="font-size: 12px; font-weight: bold; padding: 5px;" class="<?php echo esc_html($item->css_class); ?>" style="width: <?php echo esc_html($item->percent); ?>">
                  <?php echo esc_html($item->des); ?> (<?php echo esc_html($item->percent); ?>)
              </div>
          <?php } ?>          
                            </div>
                            <br>


                            
                            <?php if($json->app_android !=""){ ?>
                                <a class="button" style="background-color: orange; color:#fff; border-color: orange;" target="_blank" href="<?php echo esc_html($json->app_android); ?>"><i class="fa fa-download"></i> Download Android App</a>
                            <?php } ?> 
                            <?php if($json->playstore_url !=""){ ?>
                                <a class="button" style="background-color: orange; color:#fff; border-color: orange;" target="_blank" href="<?php echo esc_html($json->playstore_url); ?>"><i class="fa fa-check"></i> View on Playstore</a>
                            <?php } ?> 
                            <?php if(!empty($json->blog_url) and !empty($json->app_android)){ ?>
                              <a class="button" style="background-color: orange; color:#fff; border-color: orange;" target="_blank" href="<?php echo esc_html($json->blog_url); ?>"><i class="fa fa-book"></i> Manage Blog Posts</a>
                            <?php } ?>
                           

                            <?php if($json->app_android != "" and $json->feedback == ""){ ?>
                              <div>
                                <br>
                                <form target="_blank" id="formABC" method="POST" action="https://appyhi.com/dashboard/autosign_wp">
                                  <label>Feedback</label>
                                  <br>
                                  <small>Your feedback will be highly appreciated</small>
                                  <br>
                                  <textarea style="border:1px solid orange;" name="feedback" maxlength="300" placeholder="Please type freely" required="1" class="form-control"><?php echo esc_html($json->feedback); ?></textarea>
                                  <label><small><input type="checkbox" checked="1" name="feedback_perm" value="1">*Permission to display as testimonial on our website - get 50% discount for your next app.</small></label>
                                  <br>
                                  <div id="plswait" style="color: red;"></div>
                                  <input type="hidden" name="id" value="<?php echo esc_html($json->id); ?>">
                                  <input type="hidden" name="auth" value="<?php echo esc_html($json->auth); ?>">
                                  <input type="hidden" name="email" value="<?php echo esc_html($json->email); ?>">
                                  <button type="submit" class="btn btn-secondary btn-sm">Submit</button>
                                </form>
                                 <script>
                                    $(document).ready(function () { 
                                        $("#formABC").submit(function (e) { 
                                            $("#plswait").html("Please wait....");
                                            //disable the submit button
                                            $("#send").attr("disabled", true); 
                                             return true; 
                                        });
                                    });
                                </script>

                              </div>
                            <?php } ?> 
                            

                            
                       </div>

                       <div class="col-lg-5">

                           <!-- phone -->
            <div class="phoneContent" >
                <div class="phoneWrapper">
                    <div class="in" id="in" style="color: #fff;">
                        <iframe class="getFrame" src="<?php echo esc_html($json->link); ?>" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
            <!-- phone --> 

                       </div> 
                 
                </div>
              </div>
            </div>
   
<?php  } ?>