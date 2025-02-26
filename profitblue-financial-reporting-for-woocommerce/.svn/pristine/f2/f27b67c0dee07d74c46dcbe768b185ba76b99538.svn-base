<?php

namespace ProfitBlue\Emails;

use ProfitBlue\Models\ShopSettingCostsModel;
use ProfitBlue\Controllers\OverviewController;
use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Controllers\OverviewCcaiData;
use ProfitBlue\Helpers\Helper;
use ProfitBlue\Enums\FixedCostTypes;
use ProfitBlue\Enums\VariableCostTypes;
use ProfitBlue\Enums\IncomeCostTypes;

/**
 * EmailNotification
 */
class EmailNotification {
	
	/**
	 * wpdb 
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var object
	 */
	private $wpdb;
    
    /**
     * period
	 * 
	 * @since  1.0.0
	 * @access public
     *
     * @var string
     */
    public $period;
    
    /**
     * date
	 * 
	 * @since  1.0.0
	 * @access public
     *
     * @var string
     */
    public $date;	
	/**
	 * start_date
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public $start_date;	
	/**
	 * end_date
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public $end_date;
	
	/**
	 * type
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var string
	 */
	public $type = 'daily';
	
	/**
	 * ordersController
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var object
	 */
	public $ordersController;
	
	/**
	 * overview
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var object
	 */
	public $overview;
	
	/**
	 * orders_count
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var int
	 */
	public $orders_count;
	
	/**
	 * ccai_data
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @var object
	 */
	public $ccai_data;
	
	/**
	 * __construct
	 *
	 * @since  1.0.0
	 * @access public
	 * 
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return void
	 */
	public function __construct( $start_date = null, $end_date = null ) {

		$this->set_dates( $start_date, $end_date );

		global $wpdb;
		$this->wpdb = $wpdb;
		$this->ordersController = new OrdersController();
		$this->overview = new OverviewController( $this->start_date, $this->end_date );
		$this->orders_count = $this->overview->get_orders_count();

		$ccai = new OverviewCcaiData( $this->start_date, $this->end_date );
		$this->ccai_data = $ccai->get_data();
		
	}
    
    /**
     * set_period
	 * 
	 * @since  1.0.0
	 * @access public
     *
     * @param  mixed $period
     * @return void
     */
    public function set_period( $period ) {
        $this->period = $period;
    }
    
    /**
     * set_date
	 * 
	 * @since  1.0.0
	 * @access public
     *
     * @param  string $date
     * @return void
     */
    public function set_date( $date ) {
        $this->date = $date;
    }
	
	/**
	 * set_dates
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @param  string $start_date
	 * @param  string $end_date
	 * @return void
	 */
	public function set_dates( $start_date, $end_date ) {
        $this->start_date = $start_date;
		$this->end_date = $end_date;
    }
	
	/**
	 * set_type
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @param  string $type
	 * @return void
	 */
	public function set_type( $type ) {
        $this->type = $type;
    }
    
    /**
     * show_date - function returns date in d/m/Y format
	 * 
	 * @since  1.0.0
	 * @access public
     *
     * @return string
     */
    public function show_date() {
        return gmdate( 'd/m/Y', strtotime( $this->date ) );
    }
	
	/**
	 * order_count_info - function returns number of orders in defined period
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function order_count_info() {
		if ( $this->orders_count < 1 ) {
			if ( 'daily' == $this->type ) {
				return esc_html__( 'You don\'t have any order yesterday', 'profitblue-financial-reporting-for-woocommerce' );
			} elseif ( 'monthly' == $this->type ) {
				return esc_html__( 'You don\'t have any order last month', 'profitblue-financial-reporting-for-woocommerce' );
			} elseif ( 'yearly' == $this->type ) {
				return esc_html__( 'You don\'t have any order last year', 'profitblue-financial-reporting-for-woocommerce' );
			} 
		} elseif ( 1 == $this->orders_count ) {
			if ( 'daily' == $this->type ) {
				return esc_html__( 'You have 1 order yesterday', 'profitblue-financial-reporting-for-woocommerce' );
			} elseif ( 'monthly' == $this->type ) {
				return esc_html__( 'You have 1 order last month', 'profitblue-financial-reporting-for-woocommerce' );
			} elseif ( 'yearly' == $this->type ) {
				return esc_html__( 'You have 1 order last year', 'profitblue-financial-reporting-for-woocommerce' );
			} 
		} else {
			if ( 'daily' == $this->type ) {
				// translators: %s is numer of orders.
				return sprintf( esc_html__( 'Your customer placed %d orders yesterday', 'profitblue-financial-reporting-for-woocommerce' ), $this->orders_count );				
			} elseif ( 'monthly' == $this->type ) {
				// translators: %s is numer of orders.
				return sprintf( esc_html__( 'Your customer placed %d orders last month', 'profitblue-financial-reporting-for-woocommerce' ), $this->orders_count );
			} elseif ( 'yearly' == $this->type ) {
				// translators: %s is numer of orders.
				return sprintf( esc_html__( 'Your customer placed %d orders last year', 'profitblue-financial-reporting-for-woocommerce' ), $this->orders_count );
			}
		}
	}
	
	/**
	 * email_title
	 * Define email title by report type
	 * 
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function email_title() {
		$site_name = get_bloginfo( 'name' );
		if ( 'daily' == $this->type ) {
			$title = $site_name . ' - ' . esc_html__( 'Daily profit recort', 'profitblue-financial-reporting-for-woocommerce' );
		} elseif ( 'monthly' == $this->type ) {
			$title = $site_name . ' - ' . esc_html__( 'Monthly profit recort', 'profitblue-financial-reporting-for-woocommerce' );
		} elseif ( 'yearly' == $this->type ) {
			$title = $site_name . ' - ' . esc_html__( 'Yearly profit recort', 'profitblue-financial-reporting-for-woocommerce' );
		} 
        return $title;
    }
    
    /**
     * render
	 * 
	 * @since  1.0.0
	 * @access public
     *
     * @return void
     */
    public function render() {

		$fixed_types = FixedCostTypes::get();
		$variable_types = VariableCostTypes::get();		
		$income_types = IncomeCostTypes::get();
		
		ob_start();

        ?>
        <div style="width:100%;font-family:Arial;">
            <div style="max-width:750px;margin:auto;">
                <div style="width:100%;padding:30px 0;background-color:#9aebff;border-bottom:solid 5px #02cbff;text-align:center;box-sizing:border-box;"><?php esc_html_e( 'profitblue-financial-reporting-for-woocommerce', 'profitblue-financial-reporting-for-woocommerce' ); ?></div>
                <div style="width:100%;padding:30px 0px;text-align:center;box-sizing:border-box;">
                    <h1 style="color:#02cbff;width:100%;text-align:center;margin:0;font-size:20px;font-family:Arial;"><?php echo esc_html( $this->email_title() ); ?></h1>
                    <p style="width:100%;text-align:center;margin:10px 0 20px 0;"><?php echo esc_html( $show_date ); ?></p>
                    <div style="width:100%;border-top:solid 2px #ededed;border-bottom:solid 2px #ededed;padding:10px 0;">
                        <p style="width:100%;text-align:center;margin:0;"><?php echo esc_html( $this->order_count_info() ); ?></p>
                    </div>
                    <div style="width:100%;display:block;box-sizing:border-box;padding:20px 0;float:left;">
                        <div style="width:30%;float:left;box-sizing:border-box;margin-right:4%;">
                            <div style="width:100%;border:solid 1px #ededed;padding:20px 0px;box-sizing:border-box;">
                                <p style="font-size:18px;font-weight:bold;margin:0;width:100%;text-align:center;"><?php esc_html_e( 'Revenue:', 'profitblue-financial-reporting-for-woocommerce' ); ?></p>
                                <p style="font-size:16px;margin:0;width:100%;text-align:center;"><?php echo esc_html( Helper::formated_price( $this->overview->get_revenue() ) ); ?></p> 
                            </div>
                        </div>
                        <div style="width:30%;float:left;box-sizing:border-box;margin-right:4%;">
                            <div style="width:100%;border:solid 1px #ededed;padding:20px 0px;box-sizing:border-box;">
                                <p style="font-size:18px;font-weight:bold;margin:0;width:100%;text-align:center;"><?php esc_html_e( 'NO. of orders:', 'profitblue-financial-reporting-for-woocommerce' ); ?></p>
                                <p style="font-size:16px;margin:0;width:100%;text-align:center;"><?php echo esc_html( $this->orders_count ); ?></p>
                            </div>
                        </div>
                        <div style="width:30%;float:left;box-sizing:border-box;">
                            <div style="width:100%;border:solid 1px #ededed;padding:20px 0px;box-sizing:border-box;">
                                <p style="font-size:18px;font-weight:bold;margin:0;width:100%;text-align:center;"><?php esc_html_e( 'COGS:', 'profitblue-financial-reporting-for-woocommerce' ); ?></p>
                                <p style="font-size:16px;margin:0;width:100%;text-align:center;"><?php echo esc_html( Helper::formated_price( $this->overview->get_cogs() ) ); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div style="width:100%;display:block;box-sizing:border-box;padding:20px 0;float:left;">
						<div style="width:30%;float:left;box-sizing:border-box;margin-right:4%;">
                            <div style="width:100%;border:solid 1px #ededed;padding:20px 0px;box-sizing:border-box;">
                                <p style="font-size:18px;font-weight:bold;margin:0;"><?php esc_html_e( 'Gross margin:', 'profitblue-financial-reporting-for-woocommerce' ); ?></p>
                                <p style="font-size:16px;margin:0;"><?php echo esc_html( Helper::formated_price( $this->overview->get_margin() ) ); ?></p>
                            </div>
                        </div>
						<?php
						if ( empty( $this->overview->margin ) ) {
							$gross_ammount = '0';
						} else {
							$gross_ammount = round( ( $this->overview->margin / ( $this->overview->get_revenue() / 100 ) ), wc_get_price_decimals() );
						}
						?>
                        <div style="width:30%;float:left;box-sizing:border-box;margin-right:4%;">
                            <div style="width:100%;border:solid 1px #ededed;padding:20px 0px;box-sizing:border-box;">
                                <p style="font-size:18px;font-weight:bold;margin:0;"><?php esc_html_e( 'Gross margin (%):', 'profitblue-financial-reporting-for-woocommerce' ); ?></p>
                                <p style="font-size:16px;margin:0;"><?php echo esc_html( Helper::formated_price( $gross_ammount ) ); ?></p>
                            </div>
                        </div>
                        <div style="width:30%;float:left;box-sizing:border-box;">
                            <div style="width:100%;border:solid 1px #ededed;padding:20px 0px;box-sizing:border-box;">
                                <p style="font-size:18px;font-weight:bold;margin:0;"><?php esc_html_e( 'Net profit:', 'profitblue-financial-reporting-for-woocommerce' ); ?></p>
                                <p style="font-size:16px;margin:0;"><?php echo esc_html( Helper::formated_price( $this->overview->get_net_profit() ) ); ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div style="width:100%;float:left;display:block;">
                    <div style="width:90%;padding:40px 5% 10px 5%;box-sizing:border-box;">
                        <strong><?php esc_html_e( 'Custom cost and income:', 'profitblue-financial-reporting-for-woocommerce' ); ?></strong>
                    </div>

					<?php
					if ( !empty( $this->ccai_data['variable'] ) ) {
						$variable_total = 0;
						$html = '';
						foreach( $this->ccai_data['variable'] as $label => $value ) {
							$variable_total += $value;
							$html .= '<div style="width:90%;padding:10px 5%;background-color:#9aebff;border-bottom:2px solid #ffffff;box-sizing:border-box;float:left;">';
								$html .= '<div style="width:49%;float:left;color:#000000;">' . esc_html( $variable_types[$label] ) . '</div>';
								$html .= '<div style="width:49%;float:right;color:#000000;text-align:right;">-' . esc_html( Helper::formated_price( $value ) ) . ' Kč</div>';
                    		$html .= '</div>';
						}										
					?>
                    
                    <div style="width:90%;padding:10px 5%;background-color:#02cbff;border-bottom:2px solid #ffffff;box-sizing:border-box;display:block;float:left;">
                        <div style="width:49%;float:left;color:#ffffff;"><?php esc_html_e( 'Variable cost total', 'profitblue-financial-reporting-for-woocommerce' ); ?></div>
                        <div style="width:49%;float:right;color:#ffffff;text-align:right;">-<?php echo esc_html( Helper::formated_price( $variable_total ) ); ?> Kč</div>
                    </div>
					<?php echo $html; 
					}
										
					if ( !empty( $this->ccai_data['fixed'] ) ) {
						$fixed_total = 0;
						$html = '';
						foreach( $this->ccai_data['fixed'] as $label => $value ) {
							$fixed_total += $value;
							$html .= '<div style="width:90%;padding:10px 5%;background-color:#9aebff;border-bottom:2px solid #ffffff;box-sizing:border-box;float:left;">';
								$html .= '<div style="width:49%;float:left;color:#000000;">' . esc_html( $fixed_types[$label] ) . '</div>';
								$html .= '<div style="width:49%;float:right;color:#000000;text-align:right;">-' . esc_html( Helper::formated_price( $value ) ) . ' Kč</div>';
                    		$html .= '</div>';
					}										
					?>
                    
                    <div style="width:90%;padding:10px 5%;background-color:#02cbff;border-bottom:2px solid #ffffff;box-sizing:border-box;display:block;float:left;">
                        <div style="width:49%;float:left;color:#ffffff;"><?php esc_html_e( 'Fixed cost total', 'profitblue-financial-reporting-for-woocommerce' ); ?></div>
                        <div style="width:49%;float:right;color:#ffffff;text-align:right;">-<?php echo esc_html( Helper::formated_price( $fixed_total ) ); ?> Kč</div>
                    </div>
					<?php echo $html; 
					}

					if ( !empty( $this->ccai_data['income'] ) ) {
						$income_total = 0;
						$html = '';
						foreach( $this->ccai_data['income'] as $label => $value ) {
							$income_total += $value;
							$html .= '<div style="width:90%;padding:10px 5%;background-color:#9aebff;border-bottom:2px solid #ffffff;box-sizing:border-box;float:left;">';
								$html .= '<div style="width:49%;float:left;color:#000000;">' . esc_html( $income_types[$label] ) . '</div>';
								$html .= '<div style="width:49%;float:right;color:#000000;text-align:right;">-' . esc_html( Helper::formated_price( $value ) ) . ' Kč</div>';
                    		$html .= '</div>';
						}										
					?>
                    
                    <div style="width:90%;padding:10px 5%;background-color:#02cbff;border-bottom:2px solid #ffffff;box-sizing:border-box;display:block;float:left;">
                        <div style="width:49%;float:left;color:#ffffff;"><?php esc_html_e( 'Income', 'profitblue-financial-reporting-for-woocommerce' ); ?></div>
                        <div style="width:49%;float:right;color:#ffffff;text-align:right;">-<?php echo esc_html( Helper::formated_price( $income ) ); ?> Kč</div>
                    </div>
					<?php echo $html; 
					}
					?>
                                        
                </div>
                <div style="width:90%;padding:30px 5%;float:left;"></div>
                
            </div>
        </div>
        <?php

        $html = ob_get_clean();

        return $html;

    }

}
