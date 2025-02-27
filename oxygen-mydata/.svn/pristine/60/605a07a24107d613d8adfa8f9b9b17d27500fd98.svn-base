/**
 * Plugin Name: Oxygen MyData
 * Plugin URI: https://wordpress.org/plugins/oxygen-mydata/
 * Description: A WordPress plugin to connect WooCommerce with Oxygen Pelatologio and MyData
 * Author: Oxygen
 * Author URI: https://pelatologio.gr/
 * Text Domain: oxygen
 * Domain Path: /languages/
 * Version: 1.0.56
 * Requires at least: 5.5
 * Tested up to: 6.7.2
 * WC requires at least: 4.7
 * WC tested up to: 9.6.2
 * License: GPL2
 *
 * Oxygen MyData for WooCommerce is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Oxygen myData for WooCommerce. If not, see  https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package Oxygen
 * @version 1.0.56
 * @since  1.0.0
 */

jQuery( document ).ready(
    function ( $ ) {

        $(".woocommerce-input-toggle").on('click', function (e) {

            const gatewayId = $(this).closest('tr').data('gateway_id'); // Get the gateway ID

            setTimeout(() => {
                const isEnabled = !$(this).hasClass('woocommerce-input-toggle--disabled') ? 'yes' : 'no';

                console.log(isEnabled);

                if(gatewayId === 'oxygen_payment' && isEnabled === 'yes') {
                    // Send the toggle action to the server
                    $.ajax({
                        type: 'POST',
                        url: oxygenPayments.ajax_url,
                        data: {
                            action: 'check_gateway_status_on_toggle_action',
                            status: isEnabled,
                        },
                        success: function (response) {
                            var data = response['data'];
                            var action = response['action'];

                            if(action === 'enable'){
                                $(this).removeClass('woocommerce-input-toggle--disabled');
                                $(this).addClass('woocommerce-input-toggle--enabled');
                            }else{
                                $(this).removeClass('woocommerce-input-toggle--enabled');
                                $(this).addClass('woocommerce-input-toggle--disabled');
                            }

                            if (data !== undefined && data['message'] !== '' ) {
                                displayAdminNotice(data['message']);
                            }
                        },
                        error: function (xhr) {
                            displayAdminNotice('An error occurred while changing option.', 'error');
                        },
                    });
                }else{
                    displayAdminNotice('The gateway has been disabled successfully.');
                }
            }, 3500);

        });

        function displayAdminNotice(message, type = 'success') {

            let currentUrl = window.location.href;

            let noticeClass = (type === 'error') ? 'notice-error' : 'notice-success';

            let notice = $(`
                <div class="notice ${noticeClass} is-dismissible pdf_downloaded">
                    <p>${message}</p>
                    <button type="button" class="notice-dismiss"></button>
                </div>
            `);


            if (currentUrl.includes('action=edit')) {

                $('.wrap form#order').before(notice);

            } else {
                $('.wrap ul:first').before(notice);
            }

            notice.on('click', '.notice-dismiss', function() {
                notice.remove();
            });
        }

    }
);