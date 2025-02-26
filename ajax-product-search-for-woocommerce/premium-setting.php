<?php

if ( ! defined( 'ABSPATH' ) ) exit;

$plugin_dir_url =  plugin_dir_url( __FILE__ );
?>
<style>
.premium-box{ width:100%; height:auto; background:#fff;  }
.premium-features{}
.premium-heading{  color: #484747;font-size: 40px;padding-top: 35px;text-align: center;text-transform: uppercase;}
.premium-features li{ width:100%; float:left;  padding: 80px 0; margin: 0; }
.premium-features li .detail{ width:50%; }
.premium-features li .img-box{ width:50%; }

.premium-features li:nth-child(odd) { background:#f4f4f9; }
.premium-features li:nth-child(odd) .detail{float:right; text-align:left; }
.premium-features li:nth-child(odd) .detail .inner-detail{}
.premium-features li:nth-child(odd) .detail p{ }
.premium-features li:nth-child(odd) .img-box{ float:left; text-align:right;}

.premium-features li:nth-child(even){  }
.premium-features li:nth-child(even) .detail{ float:left; text-align:right;}
.premium-features li:nth-child(even) .detail .inner-detail{ margin-right: 46px;}
.premium-features li:nth-child(even) .detail p{ float:right;} 
.premium-features li:nth-child(even) .img-box{ float:right;}

.premium-features .detail{}
.premium-features .detail h2{ color: #484747;  font-size: 24px; font-weight: 700; padding: 0; line-height: 30px;}
.premium-features .detail p{  color: #484747;  font-size: 13px;  max-width: 327px;}
/**images**/
.pincode-check{ background:url(<?php echo $plugin_dir_url; ?>assets/images/search.PNG); width:530px; height:300px; display:inline-block; margin-right: 25px; background-repeat:no-repeat; background-size:100%;}

.sat-sun-off{ background:url(<?php echo $plugin_dir_url; ?>assets/images/category.png); width:530px; height:250px; display:inline-block; background-size:500px auto; margin-right:30px; margin-top:30px; background-repeat:no-repeat; background-size:100%;}

.bulk-upload{ background:url(<?php echo $plugin_dir_url; ?>assets/images/styling.png); width:465px; height:500px; display:inline-block; background-repeat:no-repeat;}

.cod-verify{background:url(<?php echo $plugin_dir_url; ?>assets/images/search-types.png); width:512px; height:165px; display:inline-block; margin-right:30px; background-repeat:no-repeat;}

.delivery-date{background:url(<?php echo $plugin_dir_url; ?>assets/images/search-by-sku.png); width:530px; height:230px; display:inline-block; background-repeat:no-repeat; background-size:100%;}

.advance-styling{background:url(<?php echo $plugin_dir_url; ?>assets/images/search-options.png); width:480px; height:320px; display:inline-block; margin-right:30px; background-repeat:no-repeat; background-size:100%;}

.Checkout-Page-Pincode--Check{background:url(<?php echo $plugin_dir_url; ?>assets/images/short-code.png); width:500px; height:150px; display:inline-block; background-repeat:no-repeat; background-size:100%;}

.deactivate-menu {background:url(<?php echo $plugin_dir_url; ?>assets/images/view-all.png); width:530px; height:280px; display:inline-block; margin-right:30px; background-repeat:no-repeat; background-size:100%;}


/*upgrade css*/

.upgrade{background:#f4f4f9;padding: 50px 0; width:100%; clear: both;}
.upgrade .upgrade-box{ background-color: #808a97;
    color: #fff;
    margin: 0 auto;
   min-height: 110px;
    position: relative;
    width: 60%;}

.upgrade .upgrade-box p{ font-size: 15px;
     padding: 19px 20px;
    text-align: center;}

.upgrade .upgrade-box a{background: none repeat scroll 0 0 #6cab3d;
    border-color: #ff643f;
    color: #fff;
    display: inline-block;
    font-size: 17px;
    left: 50%;
    margin-left: -150px;
    outline: medium none;
    padding: 11px 6px;
    position: absolute;
    text-align: center;
    text-decoration: none;
    top: 36%;
    width: 277px;}

.upgrade .upgrade-box a:hover{background: none repeat scroll 0 0 #72b93c;}

.premium-vr{ text-transform:capitalize;} 
.premium-box-head {
    background: #eae8e7 none repeat scroll 0 0;
    height: 500px;
    text-align: center;
    width: 100%;
}
.pho-upgrade-btn a {
    display: inline-block;
    margin-top: 75px;
}
.main-heading {
    background: #fff none repeat scroll 0 0;
    margin-bottom: -70px;
    text-align: center;
}
.main-heading img {
    margin-top: -200px;
}
.premium-box-container {
    margin: 0 auto;
}
.premium-box-container .description:nth-child(2n+1) {
    background: #fff none repeat scroll 0 0;
}
.main-heading h1{ margin: 0px;}
.premium-box {
    background: none;
    height: auto;
    width: 100%;
}

.premium-box-container .description {
    display: block;
    padding: 35px 0;
    text-align: center;
}
.premium-box-container .pho-desc-head::after {
    background:url(<?php echo $plugin_dir_url; ?>assets/images/head-arrow.png) no-repeat;
    content: "";
    height: 98px;
    position: absolute;
    right: -40px;
    top: -6px;
    width: 69px;
}
.premium-box-container .pho-desc-head {
    margin: 0 auto;
    position: relative;
    width: 768px;
}
.pho-plugin-content {
    margin: 0 auto;
    overflow: hidden;
    width: 768px;
}
.pho-plugin-content img {
    max-width: 100%;
    width: auto;
}
.premium-box-container .pho-desc-head h2{ line-height:38px;}

.premium-box-container .pho-desc-head h2 {
    color: #02c277;
    font-size: 28px;
    font-weight: bolder;
    margin: 0;
    text-transform: capitalize;
}
.pho-plugin-content p {
    color: #212121;
    font-size: 18px;
    line-height: 32px;
}
.premium-box-container .description:nth-child(2n+1) .pho-img-bg {
    background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>assets/images/image-frame-odd.png) no-repeat 100% top;
}
.description .pho-plugin-content .pho-img-bg {
    border-radius: 5px 5px 0 0;
    height: auto;
    margin: 0 auto;
    padding: 70px 0 40px;
    width: 750px;
}
.pho-upgrade-btn {
    text-align: center;
}
.premium-box-container .description:nth-child(2n) {
    background: #eae8e7 none repeat scroll 0 0;
}
.premium-box-container .description:nth-child(2n) .pho-img-bg {
    background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>assets/images/image-frame-even.png) no-repeat 100% top;
}
.premium-box-container .description:nth-child(2n+1) .pho-img-bg {
    background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>assets/images/image-frame-odd.png") no-repeat scroll 100% top;
}

.pho-upgrade-btn > a:focus {
	box-shadow: none !important;
}

</style>

<div class="premium-box">

	<div class="premium-box-head">
           <div class="pho-upgrade-btn">
           <a target="_blank" href="https://www.phoeniixx.com/product/ajax-product-search-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>assets/images/premium-btn.png" /></a>
			<a href="http://ajaxsearch.phoeniixxdemo.com/" target="_blank"><img src="<?php echo $plugin_dir_url; ?>assets/images/button2.png"></a>
		  </div>
           </div>
            <div class="main-heading">
           <h1> <img src="<?php echo $plugin_dir_url; ?>assets/images/premium-head.png" />
           
          </h1>
           </div>
           <div class="premium-box-container">
           <div class="description">
                <div class="pho-desc-head">
                <h2><?php _e('Advance Search Results','ph-ajax-pro-search');?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p><?php _e('Search result will show a list of results of Product Thumbnail, Product Price, Product Description with excerpt option and View All Product link.','ph-ajax-pro-search');?></p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/search.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2><?php _e('Option to Show & Hide Category Product Filter Before Search Bar','ph-ajax-pro-search');?></h2></div>
                
                    <div class="pho-plugin-content">
                        
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/category.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2><?php _e('Advance Styling','ph-ajax-pro-search');?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p>
                          <?php _e('The plugin lets you style the Search options as per your need. You could set :-','ph-ajax-pro-search');?>  </br>
                    <?php _e('a.) Description Color','ph-ajax-pro-search');?>	 </br>
                    <?php _e('b.) Price color','ph-ajax-pro-search');?>	 </br>
                    <?php _e('c.) Suggestion hover background color','ph-ajax-pro-search');?>	 </br>
                    <?php _e('d.) Search button color','ph-ajax-pro-search');?>	  </br>
                    <?php _e('e.) Search button text color','ph-ajax-pro-search');?>	 </br>
                    <?php _e('f.) Search button text hover color','ph-ajax-pro-search');?>	 </br>
                    <?php _e('g.) Search button hover color, as per your requirements.','ph-ajax-pro-search');?>	
                    
                    
                        </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/styling.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2><?php _e('Two Types of Searches','ph-ajax-pro-search');?></h2></div>
                 <div class="pho-plugin-content">
                       <p>
                      <?php _e('1.) Exact Word','ph-ajax-pro-search');?> </br>
                	 <?php _e('2.) Containing Word','ph-ajax-pro-search');?> 
                    </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/search-types.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
             <div class="description">
                <div class="pho-desc-head">
                <h2><?php _e('Search by SKU Settings','ph-ajax-pro-search');?></h2></div>
                
                    <div class="pho-plugin-content">
                        
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/search-by-sku.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2><?php _e('Options to Search in','ph-ajax-pro-search');?></h2></div>
                
                    <div class="pho-plugin-content">
                        <p>
                       <?php _e('1.) Option to search in All & Product','ph-ajax-pro-search');?>   </br>
                    	<?php _e('2.) Search in excerpt','ph-ajax-pro-search');?>  </br>
                    	<?php _e('3.) Search in content','ph-ajax-pro-search');?>  </br>
                    	<?php _e('4.) Search in product categories','ph-ajax-pro-search');?>  </br>
                    	<?php _e('5.) Search in product tags','ph-ajax-pro-search');?>  </br>
                        </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/search-options.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2><?php _e('Shortcode is Also Available','ph-ajax-pro-search');?></h2></div>
                
                    <div class="pho-plugin-content">
                         <p>
                          <?php _e('You can add short code on any page.','ph-ajax-pro-search');?> 
                        </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/short-code.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
             <div class="description">
                <div class="pho-desc-head">
                <h2><?php _e('View All Search Result Page','ph-ajax-pro-search');?></h2></div>
                
                    <div class="pho-plugin-content">
                        
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>assets/images/view-all.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
           </div>

</div>
<div class="pho-upgrade-btn">
        <a target="_blank" href="https://www.phoeniixx.com/product/ajax-product-search-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>assets/images/premium-btn.png" /></a>
        <a href="http://ajaxsearch.phoeniixxdemo.com/" target="_blank"><img src="<?php echo $plugin_dir_url; ?>assets/images/button2.png"></a>
		</div>
