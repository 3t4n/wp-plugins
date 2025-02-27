<?php
/**
 * Developer : MahdiY
 * Web Site  : MahdiY.IR
 * E-Mail    : M@hdiY.IR
 */

defined( 'ABSPATH' ) || exit;

class PD_Admin {

	public function __construct() {
		add_action( 'admin_menu', [ $this, 'menu' ] );
	}

	public function menu() {
		add_options_page( 'تاریخ شمسی', 'تاریخ شمسی', 'manage_options', 'pd-option', [
			$this,
			'page'
		] );
	}

	public function page() {
		?>
        <div class="wrap">
            <div class="icon32" id="icon-tools"><br/></div>
            <h2>تاریخ شمسی</h2>
            <form method="post" action="options.php">
				<?php wp_nonce_field( 'update-options' ) ?>
                <table class="form-table" role="presentation">
                    <tbody>

                    <tr>
                        <th scope="row">سایت</th>
                        <td>
                            <fieldset>
                                <label for="site_enable">
                                    <input name="pd_options['site_enable']" type="checkbox"
                                           id="site_enable" value="1"
										<?php checked( PD::get_option( 'site_enable' ), 1 ); ?>>
                                    فعالسازی تاریخ شمسی.</label>
                            </fieldset>
                            <fieldset>
                                <label for="site_persian_digits">
                                    <input name="pd_options['site_persian_digits']" type="checkbox"
                                           id="site_persian_digits" value="1"
										<?php checked( PD::get_option( 'site_persian_digits' ), 1 ); ?>>
                                    اعداد تاریخ و زمان فارسی شوند.</label>
                            </fieldset>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">مدیریت</th>
                        <td>
                            <fieldset>
                                <label for="admin_enable">
                                    <input name="pd_options['admin_enable']" type="checkbox"
                                           id="admin_enable" value="1"
										<?php checked( PD::get_option( 'admin_enable' ), 1 ); ?>>
                                    فعالسازی تاریخ شمسی.</label>
                            </fieldset>
                            <fieldset>
                                <label for="admin_persian_digits">
                                    <input name="pd_options['admin_persian_digits']" type="checkbox"
                                           id="admin_persian_digits" value="1"
										<?php checked( PD::get_option( 'admin_persian_digits' ), 1 ); ?>>
                                    اعداد تاریخ و زمان فارسی شوند.</label>
                            </fieldset>
                        </td>
                    </tr>

                    </tbody>
                </table>
				<?php submit_button( 'ذخیره تغییرات' ); ?>
                <input type="hidden" name="action" value="update"/>
                <input type="hidden" name="page_options" value="pd_options"/>
            </form>
        </div>
		<?php
	}

}

if ( is_admin() ) {
	new PD_Admin();
}