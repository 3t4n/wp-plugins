<?php 
if ( ! defined( 'ABSPATH' ) ) { exit;} 
if( !class_exists( 'Ni_WooPR_Payment_Reminder' ) ) {
    class Ni_WooPR_Payment_Reminder {
		 public function __construct(){
			
		 }
		 function page_init(){
		 $status =  $this->get_order_status_total();
		 $color = $this->get_text_color();
		 ?>
          <div class="container-fluid" id="niwoopr">
          <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            	 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="1"></li>
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="2"></li>
                    <li data-target="#carouselExampleSlidesOnly" data-slide-to="3"></li>
                     <li data-target="#carouselExampleSlidesOnly" data-slide-to="4"></li>
                  </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card bg-rgba-green-slight">
                            <div class="card-header bg-rgba-salmon-strong"> <?php _e('Monitor your sales and grow your online business with naziinfotech plugins', 'niwoopvt'); ?> </div>
                            <div class="card-body">
                                <h2 class="card-title text-center color-rgba-salmon-strong">Buy Ni Display Product Variation Table Pro $34.00</h2>
                               	<div class="row" style="font-size:16px">
                                	<div  class="col-md-6">
                                    	  <span class="font-weight-bold color-rgba-black-strong">Show variation product table on product detail page</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Show the variation dropdown on product page and category page</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Show the variation product on shop page and category page</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Add to cart bulk quantity on product detail page in variation table</span>	<br />					<span class="font-weight-bold color-rgba-black-strong">Set the default quantity in variation table</span><br />
                                    </div>
                                   
                                    <div  class="col-md-3">
                                    	
                                        <span class="font-weight-bold color-rgba-black-strong">Change the display order for table variation columns</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Set columns of product variation table</span>	<br />	
                                        
                                    </div>
                                   <div  class="col-md-3">
                                   		<h5> <span class="font-weight-bold" >Coupon Code: <span class="text-warning">ni10</span>  Get 10% OFF</span></h5> 
                                        <span> <span class="font-weight-bold" >Email at:</span><a href="mailto:support@naziinfotech.com" target="_blank">support@naziinfotech.com</a></span><br />
                                        <span> <span class="font-weight-bold" >Website: </span><a href="http://naziinfotech.com/" target="_blank">www.naziinfotech.com</a></span>	<br />	
                                   </div>
                                </div>
                                <div class="text-center">
                                    <a href="http://demo.naziinfotech.com?demo_login=woo_sales_report" class="btn btn-rgba-salmon-strong btn-lg" target="_blank">View Demo</a>
                                    <a href="http://naziinfotech.com/?product=ni-woocommerce-sales-report-pro" target="_blank" class="btn btn-rgba-salmon-strong btn-lg">Buy Now</a>
                                </div>
                                <br />
                                <br />
                                 
                           </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card bg-rgba-green-slight">
                            <div class="card-header bg-rgba-green-strong"> <?php _e('Monitor your sales and grow your online business with naziinfotech plugins', 'niwoopvt'); ?> </div>
                            <div class="card-body">
                                <h2 class="card-title text-center color-rgba-green-strong">Buy Ni WooCommerce Sales Report Pro $24.00</h2>
                               	<div class="row" style="font-size:16px">
                                	<div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong">Dashboard order Summary</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Order List - Display order list</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Order Detail - Display Product information</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Sold Product variation Report</span>	<br />	
                                    </div>
                                    <div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong">Customer Sales Report</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Payment Gateway Sales Report</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Country Sales Report</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Coupon Sales Report</span>	<br />	
                                    </div>
                                    <div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong">Order Export To CSV</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Custom Date Filter, Start Date and End Date</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Ajax pagination </span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Easy to use </span>	<br />	
                                    </div>
                                   <div  class="col-md-3">
                                   		<h5> <span class="font-weight-bold" >Coupon Code: <span class="text-warning">ni10</span>  Get 10% OFF</span></h5> 
                                        <span> <span class="font-weight-bold" >Email at:</span><a href="mailto:support@naziinfotech.com" target="_blank">support@naziinfotech.com</a></span><br />
                                        <span> <span class="font-weight-bold" >Website: </span><a href="http://naziinfotech.com/" target="_blank">www.naziinfotech.com</a></span>	<br />	
                                   </div>
                                </div>
                                <div class="text-center">
                                    <a href="http://demo.naziinfotech.com?demo_login=woo_sales_report" class="btn btn-green-strong btn-lg" target="_blank">View Demo</a>
                                    <a href="http://naziinfotech.com/?product=ni-woocommerce-sales-report-pro" target="_blank" class="btn btn-green-strong btn-lg">Buy Now</a>
                                </div>
                                  <br />
                                <br />
                           </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card bg-rgba-cyan-slight">
                            <div class="card-header bg-rgba-cyan-strong"> <?php _e('Monitor your sales and grow your online business with naziinfotech plugins', 'niwoopvt'); ?> </div>
                            <div class="card-body">
                                <h2 class="card-title text-center color-rgba-cyan-strong">Buy Ni WooCommerce cost of goods Pro @ $34.00</h2>

                               	<div class="row" style="font-size:16px">
                                	<div  class="col-md-3">
                                    	 <span class="font-weight-bold color-rgba-black-strong">Sales Profit Report</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Dashboard order Summary</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Daily profit Report</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Monthly profit Report</span>	<br />	
                                       
                                    </div>
                                    <div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong">Add Cost of goods for simple product</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Add Cost of goods for variation product</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Top Profit Product</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Stock valuation</span>	<br />	
                                    </div>
                                    <div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong">Order Export To CSV</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Custom Date Filter, Start Date and End Date</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Ajax pagination </span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Easy to use </span>	<br />	
                                    </div>
                                   <div  class="col-md-3">
                                   		<h5> <span class="font-weight-bold" >Coupon Code: <span class="text-warning">ni10</span>  Get 10% OFF</span></h5> 
                                        <span> <span class="font-weight-bold" >Email at:</span><a href="mailto:support@naziinfotech.com" target="_blank">support@naziinfotech.com</a></span><br />
                                        <span> <span class="font-weight-bold" >Website: </span><a href="http://naziinfotech.com/" target="_blank">www.naziinfotech.com</a></span>	<br />	
                                   </div>
                                </div>
                                 <div class="text-center">
                                    <a href="http://demo.naziinfotech.com/?demo_login=woo_cost_of_goods" class="btn btn-rgba-cyan-strong btn-lg" target="_blank">View Demo</a>
                                    <a href="http://naziinfotech.com/product/ni-woocommerce-cost-of-good-pro/" target="_blank" class="btn btn-rgba-cyan-strong btn-lg">Buy Now</a>
                                </div>
                                 <br />
                                <br />
                           </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card bg-rgba-indigo-slight">
                            <div class="card-header bg-rgba-indigo-strong"> <?php _e('Monitor your sales and grow your online business with naziinfotech plugins', 'niwoopvt'); ?> </div>
                            <div class="card-body">
                                <h2 class="card-title text-center color-rgba-indigo-strong"> <?php _e('Buy Ni WooCommerce Product Enquiry Pro @ $24.00', 'niwoopvt'); ?> </h2>
                               	<div class="row" style="font-size:16px">
                                	<div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong"><?php esc_html_e('Dashboard Summary (Today, Total Enquiry)', 'niwoopvt'); ?></span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Monthly Enquiry Graph</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Recent Enquiry</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Last Enquiry Date</span>	<br />	
                                    </div>
                                    <div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong">Enquiry List</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Enquiry Export</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Top Enquiry Product</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Top Enquiry Visitor</span>	<br />	
                                    </div>
                                    <div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong">Order Export To CSV</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Custom Date Filter, Start Date and End Date</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Ajax pagination </span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Easy to use </span>	<br />	
                                    </div>
                                   <div  class="col-md-3">
                                   		<h5> <span class="font-weight-bold" >Coupon Code: <span class="text-warning">ni10</span>  Get 10% OFF</span></h5> 
                                        <span> <span class="font-weight-bold" >Email at:</span><a href="mailto:support@naziinfotech.com" target="_blank">support@naziinfotech.com</a></span><br />
                                        <span> <span class="font-weight-bold" >Website: </span><a href="http://naziinfotech.com/" target="_blank">www.naziinfotech.com</a></span>	<br />	
                                   </div>
                                </div>
                                <div class="text-center">
                                    <a href="http://demo.naziinfotech.com/enquiry-demo/" class="btn btn-rgba-indigo-strong btn-lg" target="_blank">View Demo</a>
                                    <a href="http://naziinfotech.com/product/ni-woocommerce-product-enquiry-pro/" target="_blank" class="btn btn-rgba-indigo-strong btn-lg">Buy Now</a>
                                </div>
                                  <br />
                                <br /> 
                           </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="card bg-rgba-blue-slight">
                            <div class="card-header bg-rgba-blue-strong"> <?php _e('Monitor your sales and grow your online business with naziinfotech plugins', 'niwoopvt'); ?> </div>
                            <div class="card-body">
                                <h2 class="card-title text-center color-rgba-blue-strong"> <?php _e('Ni One Page Inventory Management System For WooCommerce', 'niwoopvt'); ?> </h2>
                               	<div class="row" style="font-size:16px">
                                	<div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong"><?php esc_html_e('Dashboard Summary stock status', 'niwoopvt'); ?></span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Manage Purchase order</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Multi location inventory management</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Stock Center</span>	<br />	
                                    </div>
                                    <div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong">Purchase History</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Mange product</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Vendor management</span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Product Vendor</span>	<br />	
                                    </div>
                                    <div  class="col-md-3">
                                    	<span class="font-weight-bold color-rgba-black-strong">Order Export To CSV</span><br />
                                        <span class="font-weight-bold color-rgba-black-strong">Custom Date Filter, Start Date and End Date</span>	<br />
                                        <span class="font-weight-bold color-rgba-black-strong">Ajax pagination </span>	<br />	
                                        <span class="font-weight-bold color-rgba-black-strong">Easy to use </span>	<br />	
                                    </div>
                                   <div  class="col-md-3">
                                   		<span> <span class="font-weight-bold" >Email at:</span><a href="mailto:support@naziinfotech.com" target="_blank">support@naziinfotech.com</a></span><br />
                                        <span> <span class="font-weight-bold" >Website: </span><a href="http://naziinfotech.com/" target="_blank">www.naziinfotech.com</a></span>	<br />	
                                   </div>
                                </div>
                                 <div class="text-center">
                                    <a href="https://wordpress.org/plugins/ni-one-page-inventory-management-system-for-woocommerce/" class="btn btn-rgba-blue-strong btn-lg" target="_blank">View</a>
                                    <a href="https://downloads.wordpress.org/plugin/ni-one-page-inventory-management-system-for-woocommerce.zip" target="_blank" class="btn btn-rgba-blue-strong btn-lg">Download</a>
                                </div>
                                   <br />
                                <br />
                           </div>
                        </div>
                    </div>
                </div>
                 <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
            </div>
          
          
          <div class="row" >
             	<div class="col">
                	<div class="card">
                      <div class="card-body">
                      <h5> We will develop a <span class="text-success" style="font-size:26px;">New</span> WordPress and WooCommerce <span class="text-success" style="font-size:26px;">plugin</span> and customize or modify  the <span class="text-success" style="font-size:26px;">existing</span> plugin, if yourequire any <span class="text-success" style="font-size:26px;"> customization</span>  in WordPress and WooCommerce then please <span class="text-success" style="font-size:26px;">contact us</span> at: <a href="mailto:support@naziinfotech.com">support@naziinfotech.com</a>.</h5>
                      </div>
                    </div>
                </div>
            </div>
          
          <div class="card">
              <div class="card-header bg-rgba-indigo-strong">
                <?php esc_html_e('Sales Analytics','niwoopr'); ?>
              </div>
              <div class="card-body">
                <div class="row">
                	<div class="col-sm-4 col-md-3 col-lg-2">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                         <h6> <?php esc_html_e(' Total Sales','niwoopr'); ?> </h6>
                         	<div class="float-right">
                             	<br />
                            	<h3 class="text-primary"><?php  _e(wc_price(  $this->get_total_sales("ALL"))); ?></h3>		
                            </div>
                            <div  class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                         <h6> <?php esc_html_e('This Year Sales','niwoopr'); ?> </h6>
                         	<div class="float-right">
                            	<br />
                            	<h3 class="text-secondary"><?php  _e(wc_price(  $this->get_total_sales("YEAR"))); ?></h3>		
                            </div>
                            <div  class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                         <h6> <?php esc_html_e(' This Month Sales','niwoopr'); ?> </h6>
                         	<div class="float-right">
                            	<br />
                            	<h3 class="text-success"><?php  _e(wc_price(  $this->get_total_sales("MONTH"))); ?></h3>		
                            </div>
                              <div  class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                         <h6> <?php esc_html_e(' This Week Sales','niwoopr'); ?> </h6>
                         	<div class="float-right">
                            	<br />
                            	<h3 class="text-danger"><?php  _e(wc_price(  $this->get_total_sales("WEEK"))); ?></h3>		
                            </div>
                               <div  class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                         <h6> <?php esc_html_e('Yesterday Sales','niwoopr'); ?> </h6>
                         	<div class="float-right">
                            	<br />
                            	<h3 class="text-info"><?php  _e(wc_price(  $this->get_total_sales("YESTERDAY"))); ?></h3>		
                            </div>
                               <div  class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-2">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                         <h6> <?php esc_html_e('Today Sales','niwoopr'); ?> </h6>
                         	<div class="float-right">
                            	<br />
                            	<h3 class="text-warning"><?php  _e(wc_price(  $this->get_total_sales("DAY"))); ?></h3>		
                            </div>
                               <div  class="clearfix"></div>
                        </div>
                    </div>
                 </div>   
                <div class="row">   
                	<?php $i= 0;  ?>
                    <?php foreach($status as $key=>$value): ?> 
                    	<div class="col-sm-4 col-md-3 col-lg-2">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                         <h6> <?php esc_html_e('Today '. $value.' Order','niwoopr'); ?> </h6>
                         	<div class="float-right">
                            	<br />
                            	<h3 class="<?php _e($color[$i]); ?>"><?php  _e(wc_price(   $key)); ?></h3>		
                            </div>
                               <div  class="clearfix"></div>
                        </div>
                    </div>
                    <?php $i++;  ?>
                    <?php endforeach; ?> 
                </div>
              </div>
            </div>
          
          
          	
          </div>
         <?php
		 }
		 function get_order_status_total($type="DEFAULT"){
		 	global $wpdb;
			$today_date = date_i18n("Y-m-d");	
			$new_data = array();
			$query = "
				SELECT 
				
				posts.post_status as order_status
				,SUM(postmeta.meta_value) as 'order_total'
				FROM {$wpdb->prefix}posts as posts	";		
				
				$query .=
				"	LEFT JOIN  {$wpdb->prefix}postmeta as postmeta ON postmeta.post_id=posts.ID ";
				
				$query .= " WHERE 1=1 ";
				$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') = '{$today_date}' "; 
				$query .= " AND postmeta.meta_key ='_order_total' ";
				$query .= " AND posts.post_type ='shop_order' ";
				$query .= " GROUP BY posts.post_status ";
				
				
				
			$rows = $wpdb->get_results($query);
			foreach($rows as $key=>$value){
				$new_data[$value->order_total] =ucfirst( str_replace("wc-","", $value->order_status)) ; 
			}
			return $new_data;				
		 }
		 function get_total_sales($period="CUSTOM",$start_date=NULL,$end_date=NULL){
			global $wpdb;
			$today_date = date_i18n("Y-m-d");	
			$query = "SELECT
					SUM(order_total.meta_value)as 'total_sales'
					FROM {$wpdb->prefix}posts as posts			
					LEFT JOIN  {$wpdb->prefix}postmeta as order_total ON order_total.post_id=posts.ID 
					
					WHERE 1=1
					AND posts.post_type ='shop_order' 
					AND order_total.meta_key='_order_total' ";
					
			$query .= " AND posts.post_status IN ('wc-pending','wc-processing','wc-on-hold', 'wc-completed')
						
						";
			if ($period =="YESTERDAY"){
					$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') = DATE_SUB('$today_date', INTERVAL 1 DAY) "; 
			}
			if ($period =="DAY"){		
				$query .= " AND   date_format( posts.post_date, '%Y-%m-%d') = '{$today_date}' "; 
				$query .= " GROUP BY  date_format( posts.post_date, '%Y-%m-%d') ";
			
			
			}
			if ($period =="WEEK"){		
				
				$query .= "  AND  YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE()) AND 
      WEEK(date_format( posts.post_date, '%Y-%m-%d')) = WEEK(CURRENT_DATE()) ";
			}
			if ($period =="MONTH"){		
				
				$query .= "  AND  YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(CURRENT_DATE()) AND 
      MONTH(date_format( posts.post_date, '%Y-%m-%d')) = MONTH(CURRENT_DATE()) ";
			}
			if ($period =="YEAR"){		
			
				$query .= " AND YEAR(date_format( posts.post_date, '%Y-%m-%d')) = YEAR(date_format(NOW(), '%Y-%m-%d')) "; 
			}
			$query .= " AND  posts.post_status NOT IN ('trash')";
			
			
					
			$rows = $wpdb->get_var($query);
			$rows = isset($rows) ? $rows : "0";
			return $rows;
		}
		function get_text_color(){
			$color = array('text-info','text-warning','text-warning','text-danger','text-success','text-secondary','text-primary','text-info','text-warning','text-warning','text-danger','text-success','text-secondary','text-primary','text-info','text-warning','text-warning','text-danger','text-success','text-secondary','text-primary');
			return $color;
		}
	}
}