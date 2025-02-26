<?php
/**
 * Handle the plugin backend.
 *
 * @author  Johan Steen <artstorm at gmail dot com>
 * @link    http://johansteen.se/
 */
class Ajungo_Admin
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'menu'));
    }

    /**
     * Register the Menu.
     */
    public function menu()
    {
        $page = add_options_page(
            'Ajungo '.__('Options', Ajungo::TEXT_DOMAIN),
            'Ajungo',
            'administrator',
            plugin_basename(Ajungo::FILE),
            array($this, 'renderpage')
        );
    }

    public function renderpage()
    {
        if (isset($_POST['submit']) &&
            isset($_POST['ajungo_nonce']) &&
            wp_verify_nonce($_POST['ajungo_nonce'], 'ajungo')
        ) {
            $this->update();
        }

        $data = array('options' => get_option(Ajungo::OPTION_KEY));

        echo Ajungo_View::render('admin', $data);
    }

    private function update()
    {
        $options = array(
            'ajungo_code'   => trim(stripslashes($_POST['ajungo_code'])),
        );

        update_option(Ajungo::OPTION_KEY, $options);
        $this->updateFlash();
    }

    /**
     * Display Flashing Message.
     */
    private function updateFlash()
    {
        printf(
            "<div class='updated'><p><strong>%s</strong></p></div>",
            __('Plugin settings updated.', Ajungo::TEXT_DOMAIN)
        );
    }
}
