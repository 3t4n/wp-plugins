<?php

namespace RankologyFno\Services\Admin\Settings\LocalBusiness;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use RankologyFno\Helpers\Settings\LocalBusinessHelper;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldAddressCountry;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldAddressLocality;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldAddressRegion;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldCuisine;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldLatitude;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldLongitude;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldOpeningHours;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldPage;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldPhone;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldPlaceId;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldPostalCode;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldPriceRange;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldStreetAddress;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldType;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldUrl;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldMenu;
use RankologyFno\Services\Admin\Settings\LocalBusiness\Fields\FieldAcceptsReservations;

class SettingsSectionLocalBusiness {
    use FieldPage;
    use FieldType;
    use FieldStreetAddress;
    use FieldLatitude;
    use FieldLongitude;
    use FieldAddressCountry;
    use FieldAddressLocality;
    use FieldAddressRegion;
    use FieldPostalCode;
    use FieldUrl;
    use FieldPlaceId;
    use FieldPhone;
    use FieldPriceRange;
    use FieldCuisine;
    use FieldOpeningHours;
    use FieldMenu;
    use FieldAcceptsReservations;

    public function __call($name, $params) {
        do_action('rankology_fno_render_field_local_business', $name);
    }

    /**
     * 
     *
     * @return void
     */
    public function renderSettings() {
        $settings = LocalBusinessHelper::getSettingsSection($this);

        if ( ! isset($settings['section']) ||
            ! isset($settings['section']['id'],  $settings['section']['title'],  $settings['section']['callback'],  $settings['section']['page'])) {
            return;
        }

        add_settings_section(
            $settings['section']['id'],
            $settings['section']['title'],
            $settings['section']['callback'],
            $settings['section']['page']
        );

        if ( ! isset($settings['fields']) || empty($settings['fields'])) {
            return;
        }

        foreach ($settings['fields'] as $key => $field) {
            if ( ! isset($field['id'], $field['title'], $field['callback'], $field['page'], $field['section'])) {
                continue;
            }

            add_settings_field(
                $field['id'],
                $field['title'],
                $field['callback'],
                $field['page'],
                $field['section']
            );
        }
    }

    /**
     * 
     *
     * @return void
     */
    public function renderSection() {
        rankology_fno_get_service('RenderSectionPro')->render('local-business');
        $imgOption = rankology_get_service('SocialOption')->getSocialKnowledgeImage();

        if (empty($imgOption)) {
            ?>
<div class="rankology-notice is-error">
    <p>
        <?php esc_html_e('You have to set an image in Knowledge Graph settings, otherwise, your Google Local Business data will not be valid.', 'wp-rankology'); ?>
        <a href="<?php echo admin_url('admin.php?page=rankology-social'); ?>"
            class="btn btnPrimary">
            <?php esc_html_e('Fix this!', 'wp-rankology'); ?>
        </a>
    </p>
</div>
<?php
        } ?>
<a
    href="<?php echo admin_url('admin.php?page=rankology-social#tab=tab_rankology_social_knowledge'); ?>">
    <?php esc_html_e('To edit your business name, visit this page.', 'wp-rankology'); ?>
</a>
<?php
    }
}
