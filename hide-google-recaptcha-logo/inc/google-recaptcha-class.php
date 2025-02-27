<?php
class GOOGLERECAPTCHACLASS
{
    public function init()
    {
        //add to wp head
        add_action('wp_head', array($this, 'add_recaptcha_script'));
    }

    public function add_recaptcha_script()
    {
        ?>
<style>
.grecaptcha-badge {
    visibility: hidden;
}

iframe[title='reCAPTCHA'] {
    visibility: hidden;
    border: none;
    box-shadow: none;
}
</style>
<?php
    }
}