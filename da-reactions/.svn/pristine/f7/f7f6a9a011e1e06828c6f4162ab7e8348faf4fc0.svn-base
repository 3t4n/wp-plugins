<?php
namespace DaReactions;
/**
 *
 */
class Shortcodes {
    public function init() {
        add_shortcode('reactions', array($this, 'reactionShortcode'));
    }
    /**
     * @param $attributes
     *
     * @return string
     */
    public function reactionShortcode($attributes = []) {
        // Attributes
        $attributes = shortcode_atts(
            array(
                'type' => 'post',
                'id' => '1'
            ),
            $attributes,
            'reactions'
        );
        return Frontend::getButtonsPlaceholder($attributes['type'], $attributes['id']);
    }
}
