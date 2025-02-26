<?php
namespace ProfitBlue\Blocks;

use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Models\NotificationsModel;

/**
 * NotificationsSettingsBlock
 */
class NotificationsSettingsBlock {
	
	/**
	 * get_settings_block
	 *
	 * @param  array $data
	 * @return string
	 */
	public static function get_settings_block( $data = null ) {

        $notifications_settings = new NotificationsModel();
        $data = $notifications_settings->get_data();
        if ( !empty( $data['email'] ) ) {
            $email = $data['email'];
        } else {
            $email = '';
        }
        if ( !empty( $data['daily'] ) && 'yes' == $data['daily'] ) {
            $daily = 'checked="checked"';
            $daily_class = 'active';
        } else {
            $daily = '';
            $daily_class = '';
        }
        if ( !empty( $data['weekly'] ) && 'yes' == $data['weekly'] ) {
            $weekly = 'checked="checked"';
            $weekly_class = 'active';
        } else {
            $weekly = '';
            $weekly_class = '';
        }
        if ( !empty( $data['monthly'] ) && 'yes' == $data['monthly'] ) {
            $monthly = 'checked="checked"';
            $monthly_class = 'active';
        } else {
            $monthly = '';
            $monthly_class = '';
        }
        if ( !empty( $data['yearly'] ) && 'yes' == $data['yearly'] ) {
            $yearly = 'checked="checked"';
            $yearly_class = 'active';
        } else {
            $yearly = '';
            $yearly_class = '';
        }
        
        ob_start();

		echo '<div id="payment-cost" class="payment-cost">';
			echo '<div class="form-section">';
				echo '<div class="form-section-inner">';
					
					echo '<div class="form-section-line notifications-top-line">';						
						echo '<div class="notifications-email-label section-line-label">';
							echo esc_html__( 'Enter e-mail address', 'profitblue-financial-reporting-for-woocommerce' );
						echo '</div>';
						echo '<div class="notifications-email-input">';
                        echo '<input type="email" name="notifications-email" id="notifications-email" value="' . esc_html( $email ) . '" />';
                        echo '</div>';												
					echo '</div>';

                    echo '<div class="form-section-line notifications-report-line daily-report-line">';						
						echo '<div class="daily-report-label section-line-label">';
							echo esc_html__( 'Daily e-mail report', 'profitblue-financial-reporting-for-woocommerce' );
						echo '</div>';
						echo '<div class="notifications-report-input">';
                            echo '<input type="checkbox" name="notifications-daily" id="notifications-daily" value="yes" ' . esc_html( $daily ) . ' />';
                            echo '<span class="checkbox-switcher ' . esc_html( $daily_class ) . '" data-id="daily"></span>';
                        echo '</div>';												
					echo '</div>';

                    echo '<div class="form-section-line notifications-report-line weekly-report-line">';						
						echo '<div class="weekly-report-label section-line-label">';
							echo esc_html__( 'Weekly e-mail report', 'profitblue-financial-reporting-for-woocommerce' );
						echo '</div>';
						echo '<div class="notifications-report-input">';
                            echo '<input type="checkbox" name="notifications-weekly" id="notifications-weekly" value="yes" ' . esc_html( $daily ) . ' />';
                            echo '<span class="checkbox-switcher ' . esc_html( $weekly_class ) . '" data-id="weekly"></span>';
                        echo '</div>';												
					echo '</div>';

                    echo '<div class="form-section-line notifications-report-line monthly-report-line">';						
						echo '<div class="daily-report-label section-line-label">';
							echo esc_html__( 'Monthly e-mail report', 'profitblue-financial-reporting-for-woocommerce' );
						echo '</div>';
						echo '<div class="notifications-report-input">';
                            echo '<input type="checkbox" name="notifications-monthly" id="notifications-monthly" value="yes" ' . esc_html( $daily ) . ' />';
                            echo '<span class="checkbox-switcher ' . esc_html( $monthly_class ) . '" data-id="monthly"></span>';
                        echo '</div>';												
					echo '</div>';

                    echo '<div class="form-section-line notifications-report-line yearly-report-line">';						
						echo '<div class="yearly-report-label section-line-label">';
							echo esc_html__( 'Yearly e-mail report', 'profitblue-financial-reporting-for-woocommerce' );
						echo '</div>';
						echo '<div class="notifications-report-input">';
                            echo '<input type="checkbox" name="notifications-yearly" id="notifications-yearly" value="yes" ' . esc_html( $daily ) . ' />';
                            echo '<span class="checkbox-switcher ' . esc_html( $yearly_class ) . '" data-id="yearly"></span>';
                        echo '</div>';												
					echo '</div>';

					
				echo '</div>';
			echo '</div>';
		echo '</div>';			

		return ob_get_clean();

	}

}
