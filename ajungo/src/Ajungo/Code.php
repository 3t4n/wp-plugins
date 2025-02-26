<?php
/**
 * Output the Ajungo Code.
 */
class Ajungo_Code
{
    public function __construct()
    {
        add_action('wp_footer', array(&$this, 'footer'));
    }

    public function footer()
    {
        $options = get_option(Ajungo::OPTION_KEY);
        $data = array('ajungo_code' => $options['ajungo_code']);
        echo Ajungo_View::render('code', $data);
    }
}
