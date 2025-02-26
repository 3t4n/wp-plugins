<?php
class RWITPF_Helper {
    public function getSettingData () {
        $opts = [
            'phone_id'          => 'cpnf-phno',
            'phone_name'        => esc_attr(get_option('cpnf_name')),
            'is_required'       => esc_attr(get_option('cpnf_required')),
            'invalid_msg'       => esc_attr(get_option('cpnf_invalid_message')),
            'required_msg'      => esc_attr(get_option('cpnf_required_message')),
            'default_country'   => esc_attr(get_option('cpnf_country')),
            'phone_placeholder' => esc_attr(get_option('cpnf_placeholder')),
        ];
        return $opts;
    }
}