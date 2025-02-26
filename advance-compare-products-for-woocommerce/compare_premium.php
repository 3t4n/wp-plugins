<style>
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
                       
					   /**premium box**/    
						.premium-box{ width:100%; height:auto; background:#fff; float:left; }
						.premium-features{}
						.premium-heading{color:#484747;font-size: 40px; padding-top:35px;text-align:center;text-transform:uppercase;}
						.premium-features li{ width:100%; float:left;  padding: 80px 0; margin: 0; }
						.premium-features li .detail{ width:50%; }
						.premium-features li .img-box{ width:50%;box-sizing:border-box; }
						

						.premium-features li:nth-child(odd) { background:#f4f4f9; }
						.premium-features li:nth-child(odd) .detail{float:right; text-align:left; }
						.premium-features li:nth-child(odd) .detail .inner-detail{}
						.premium-features li:nth-child(odd) .detail p{ }
						.premium-features li:nth-child(odd) .img-box{ float:left; text-align:right; padding-right:30px;}

						.premium-features li:nth-child(even){  }
						.premium-features li:nth-child(even) .detail{ float:left; text-align:right;}
						.premium-features li:nth-child(even) .detail .inner-detail{ margin-right: 46px;}
						.premium-features li:nth-child(even) .detail p{ float:right;} 
						.premium-features li:nth-child(even) .img-box{ float:right;}

						.premium-features .detail{}
						.premium-features .detail h2{ color: #484747;  font-size: 24px; font-weight: 700; padding: 0; line-height:1.1;}
						.premium-features .detail p{  color: #484747;  font-size: 13px;  max-width: 327px;}
					 
					 /**images**/
					 
					 .pd_prm_option1 { background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option1.png") no-repeat; width:100%; max-width:881px; height:223px; display:inline-block; background-size:100% auto;}
					 .prm_option2{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option2.png") no-repeat; width:100%;max-width:758px; height:112px; display:inline-block;  background-size:100% auto; }
                     .prm_option3{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option3.png") no-repeat; width:100%;max-width:748px;   height:217px; display:inline-block;background-size:100% auto;}
					 .prm_option4{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option4.png") no-repeat; width:100%;max-width:501px;  height:81px; display:inline-block;  background-size:100% auto;}					
					 .prm_option5{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option5.png") no-repeat; width:100%;max-width:665px; height:273px; display:inline-block; background-size:100% auto;}	
					 .prm_option6{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option6.png") no-repeat; width:100%; max-width:802px; height: 270px; display:inline-block; background-size:100% auto;}  					
					 .prm_option7{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option7.png") no-repeat; width:100%; max-width:737px; height: 693px; display:inline-block; background-size:100% auto;}  					
					 .prm_option8{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option8.png") no-repeat; width:100%; max-width:717px; height: 955px; display:inline-block; background-size:100% auto;}  					
					 .prm_option9{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option9.png") no-repeat; width:100%; max-width:546px; height: 584px; display:inline-block; background-size:100% auto;}  					
					 .prm_option10{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option10.png") no-repeat; width:100%; max-width:544px; height: 460px; display:inline-block; background-size:100% auto;}
					 .prm_option11{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option11.png") no-repeat; width:100%; max-width:482px; height: 320px; display:inline-block; background-size:100% auto;}
					 .prm_option12{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option12.png") no-repeat; width:100%; max-width:702px; height: 360px; display:inline-block; background-size:100% auto;}
					 .prm_option13{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option13.png") no-repeat; width:100%; max-width:735px; height: 360px; display:inline-block; background-size:100% auto;}
					 .prm_option14{background:url("<?php echo plugin_dir_url( __FILE__ ); ?>images/prm_option14.png") no-repeat; width:100%; max-width:747px; height: 360px; display:inline-block; background-size:100% auto;}
				.premium-box .pho-upgrade-btn{  text-align: center;}
                .pho-upgrade-btn > a{ display: inline-block; text-align: center; margin-top: 75px;}
                .premium-box-head {background: #eae8e7 none repeat scroll 0 0;height: 500px;text-align: center;width: 100%;}
                .pho-upgrade-btn a { display: inline-block; margin-top: 75px;}
                .main-heading {background: #fff none repeat scroll 0 0; margin-bottom: -70px;text-align: center;}
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
    background:url(<?php echo $plugin_dir_url; ?>images/head-arrow.png) no-repeat;
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
    background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>images/image-frame-odd.png) no-repeat 100% top;
}
.description .pho-plugin-content .pho-img-bg {
    border-radius: 5px 5px 0 0;
    height: auto;
    margin: 0 auto;
    padding: 70px 0 40px;
    width: 750px;
}
.premium-box-container .pho-desc-head h2 {
    line-height: 38px;
}
.premium-box-container .description:nth-child(2n) {
    background: #eae8e7 none repeat scroll 0 0;
}
.premium-box-container .description:nth-child(2n) .pho-img-bg {
    background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>images/image-frame-even.png) no-repeat 100% top;
}
.premium-box-container .description:nth-child(2n+1) .pho-img-bg {
    background: #f1f1f1 url(<?php echo $plugin_dir_url; ?>images/image-frame-odd.png) no-repeat scroll 100% top;
}
                </style>
		<div class="premium-box">	
				 <div class="premium-box-head">
                    <div class="pho-upgrade-btn">
                    <a target="_blank" href="http://www.phoeniixx.com/product/advance-compare-products-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>images/premium-btn.png" /></a>
                    </div>
                </div>
                <div class="main-heading"><h1><img src="<?php echo $plugin_dir_url; ?>images/premium-head.png" /></h1></div>
                 <div class="premium-box-container">
        
            <div class="description">
                <div class="pho-desc-head">
                <h2>Compare Variable Products</h2></div>
                
                    <div class="pho-plugin-content">
                        <p>
						 By incorporating this plugin, you could let your customers compare variable products by comparing the attributes (colors, size etc.) of these products, at one place.
						</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option11.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
              <div class="description">
                <div class="pho-desc-head">
                <h2>Dropdown to fetch products in 'Popup' &amp; 'Compare Table' for comparison</h2></div>
                
                    <div class="pho-plugin-content">
                        <p>
						 So that your customers can easily compare their chosen products, the plugin lets you have a dropdown option to select category and products in both - 'Popup' & 'Compare Table' to directly fetch the products that are required to be compared.  
						</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option12.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Popup Styling</h2></div>
                
                    <div class="pho-plugin-content">
                       <p>
						This plugin allows you to Style the Popup by setting the 'BG Color', 'Text Color' & 'Font Weight' of Compare Table Title, Compare Table Heading, Compare Table Data, Particular Table Row Heading, Particular Table Data Row. You could also set the table border’s 'width', 'type' and 'color'.
						</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option13.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Style each row or column as per choice</h2></div>
                
                    <div class="pho-plugin-content">
                       <p>
					If in case you want to highlight particular rows in a table, you could easily do that through this feature of the plugin. By highlighting a particular row the readability of data increases.  
					</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option14.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Choose your preferred type of Action Button</h2></div>
                
                    <div class="pho-plugin-content">
                       	<p>
						Depending on your liking and requirement, you could either select 'Button', 'Link' or 'Checkbox' as your action button. 
						</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option1.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Show Compare Table in Page or as PopUp</h2></div>
                
                    <div class="pho-plugin-content">
                       	<p>
						Whether you want to show Compare Table in a Page or as a Popup, it's up to you. This feature gives you both the choices to choose from. 
						</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option2.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
             <div class="description">
                <div class="pho-desc-head">
                <h2>Show Compare on 'Product List', 'Product Page' & 'Product Image'</h2></div>
                
                    <div class="pho-plugin-content">
                       		<p>
							Let your customers have the facility to Compare Products on Product List, Product Page and on Product Image. This feature allows you do that.
							</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option3.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Set the Number of Comparable Products</h2></div>
                
                    <div class="pho-plugin-content">
                       	<p>
						You have the option to increase or decrease the limit of products to compare as per your requirement.
						</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option4.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Exclude The Categories on Which You Don't Want to Allow Compare</h2></div>
                
                    <div class="pho-plugin-content">
                       <p>
						If in case, there is one or more categories, on which you don't want to give Compare as an option, you could easily exclude these categories in the backend. 
						</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option5.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Allow Social Sharing of Compared Items</h2></div>
                
                    <div class="pho-plugin-content">
                       <p>
						This option allows you to let your customers share their compared items with their friends on Social Sites (Facebook, Google+ Twitter & Pinterest). You can choose to show social shares either in a Popup or on a Page.
						</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option6.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Customize The Compare Table</h2></div>
                
                    <div class="pho-plugin-content">
                       <p>
					Set the Table Title, Add Image Size, Upload Table Image/Logo, Select the fields (like Add To Cart, Description, Availability etc.) that you require to show in the table. In short, freely customize your Compare Table by selecting your required settings in the backend.
					</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option7.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            <div class="description">
                <div class="pho-desc-head">
                <h2>Customize & Place the Slider As Per Your Choice</h2></div>
                
                    <div class="pho-plugin-content">
                      <p>
					You could customize the slider by selecting slider background color, compare button color etc. You could also place the slider anywhere you want it to be placed. 
					</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option8.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
             <div class="description">
                <div class="pho-desc-head">
                <h2>Style The Compare Table As You Like</h2></div>
                
                    <div class="pho-plugin-content">
                     <p>
					Set your own Compare 'Button' or 'Text' Color, remove product color, and explore more such choices to style the Compare Table, as per your preference.
                    </p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option9.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
             <div class="description">
                <div class="pho-desc-head">
                <h2>Edit & Customize Error Message</h2></div>
                
                    <div class="pho-plugin-content">
                     <p>
					You can edit the default error message to write your own message, and can even stylize the message as per your requirement.
					</p>
                        <div class="pho-img-bg">
                        <img src="<?php echo $plugin_dir_url; ?>images/prm_option10.png" />
                        </div>
                    </div>
            </div> <!-- description end -->
            
            </div>
	
						
					 <div class="pho-upgrade-btn">
										<a target="_blank" href="http://www.phoeniixx.com/product/advance-compare-products-for-woocommerce/"><img src="<?php echo $plugin_dir_url; ?>images/premium-btn.png" /></a>
									</div>
						
				   </div></div>