<?php
/**
 * Class ButtonsSettings
 *
 * Generates setting page to create, edit, sort Reactions
 *
 * @package DaReactions\Pages
 *
 * @since 1.0.0
 */
namespace DaReactions\Pages;
use DaReactions\Cache;
use DaReactions\Data;
use DaReactions\Entities\Reaction;
use DaReactions\FileSystem;
/**
 * Class ButtonsSettings
 *
 * Generates setting page to create, edit, sort Reactions
 *
 * @package DaReactions\Pages
 *
 * @since 1.0.0
 */
class ButtonsSettings extends SettingsPage
{
    /**
     * Register settings fields for this page
     *
     * @since 1.0.0
     */
    public function initSettings()
    {
        register_setting(
            $this->options_group,
            $this->options_group,
            array(
                'sanitize_callback' => array($this, 'sanitizeData')
            )
        );
        $main_section = 'button_section';
        add_settings_section(
            $main_section,
            __('Reactions', 'da-reactions'),
            array($this, 'renderButtons'),
            $this->options_page
        );
    }
    /**
     * Renders buttons fields
     *
     * @since 1.0.0
     */
    public function renderButtons()
    {
        wp_enqueue_media();
        $reactions = array_map(function(Reaction $reaction) {
            return [
                'image_file_url' => FileSystem::getImageUrl($reaction->file_name),
                'sort_field_name' => $this->options->getFieldName('[' . $reaction->ID . '][sort_order]'),
                'image_field_name' => $this->options->getFieldName('[' . $reaction->ID . '][image]'),
                'color_field_name' => $this->options->getFieldName('[' . $reaction->ID . '][color]'),
                'label_field_name' => $this->options->getFieldName('[' . $reaction->ID . '][label]'),
                'sort_order' => $reaction->sort_order,
                'ID' => $reaction->ID,
                'label' => $reaction->label,
                'color' => $reaction->color
            ];
        }, Data::getAllReactions() );
		$setting_name = $this->options->getFieldName();
	    echo wp_kses( sprintf( '<input type="hidden" name="da-reactions_setting_name" value="%s"/>', $setting_name ), 'da-r-forms' );
        include_once(DA_REACTIONS_PATH . 'templates/admin/buttons-settings-table.php');
        $files = FileSystem::getFiles();
        include_once(DA_REACTIONS_PATH . 'templates/admin/buttons-settings-icons.php');
    }
    /**
     * Sanitizes Data and saves reactions to their own table
     *
     * @param null $data
     *
     * @return null|void
     *
     * @since 1.0.0
     */
    public function sanitizeData($data = null)
    {
        if (!$data) {
            return;
        }
        Data::disableAllReactions();
        foreach ($data as $ID => $reaction) {
            $reaction_id = Data::updateOrCreateReaction($ID, $reaction);
            if (!empty($reaction['image'])) {
                libxml_use_internal_errors(true);
                $sxe = simplexml_load_string($reaction['image']);
                /**
                 * File name could not contain label, it had buggy behaviours with cyrillic alphabet
                 */
                $file_name_without_extension = 'reaction-image-' . $reaction_id;
                if ($sxe) {
                    $reaction['file_name'] = FileSystem::saveSvgImage($reaction['image'], $file_name_without_extension);
                } else {
                    $reaction['file_name'] = FileSystem::saveMediaImage($reaction['image'], $file_name_without_extension);
                }
                Data::updateOrCreateReaction($reaction_id, $reaction);
                Cache::deleteAll();
            }
        }
        Data::clearDisabledReactions();
    }
}
