<?php

namespace Ambikly\Settings;

use Ambikly\Admin\UIComponents;
use Ambikly\Controllers\SettingsController;

abstract class BaseSettings
{
    public $id;

    public $label;

    protected $settings = [];

    protected $data = [];

    public function __construct()
    {
        /**
         * @var $setting SettingsController
         */
        $setting = ambikly()->getClass('Controllers.SettingsController');

        $this->data = $setting->getAllSettings();
    }

    // Each settings tab will define its own settings
    abstract public function getSettings();


    public function output()
    {

        $current_tab = $this->get_current_tab();

        $current_sub_tab = $this->get_current_subtab();

        $breadcrumbs = [
            ['title' => esc_html__('Settings', 'ambikly'), 'url' => admin_url('admin.php?page=ambikly&sub=settings')],
            ['title' => ucwords(str_replace('_', ' ', $current_tab))],

        ];
        UIComponents::breadcrumb($breadcrumbs);
        $all_settings = $this->getSettings();

        ?>

        <div class="wrap ambikly-settings-page page-<?php echo esc_attr($this->id) ?>">
            <form method="post" action="" class="ambikly-form">

                <?php
                ambikly_nonce_field('save_settings');
                ambikly_action_field('save_settings');
                ambikly_hidden_field('current_tab', $current_tab);
                ambikly_hidden_field('current_sub_tab', $current_sub_tab);
                ?>

                <div class="ambikly-product-container">

                    <!-- Left Sidebar Tabs -->
                    <div class="ambikly-sidebar">
                        <?php
                        UIComponents::metabox(function () use ($current_tab, $current_sub_tab) {
                            ?>
                            <ul class="menu">
                                <?php foreach (ambikly_get_settings() as $tab_key => $tab): ?>
                                    <li class="menu-item open <?php echo ($tab_key === $current_tab) ? ' active' : ''; ?>">
                                        <?php
                                        if (isset($tab['subtabs'])) {

                                            $first_key = array_key_first($tab['subtabs']);

                                            $parent_url = admin_url('admin.php?page=ambikly&sub=settings&tab=' . $tab_key . '&subtab=' . $first_key);
                                        } else {

                                            $parent_url = admin_url('admin.php?page=ambikly&sub=settings&tab=' . $tab_key);
                                        }
                                        ?>
                                        <a href="<?php echo esc_url($parent_url); ?>">
                                            <span class="menu-icon"><?php echo esc_html($tab['icon']); ?></span>
                                            <!-- Icon for the tab -->
                                            <span class="menu-title"><?php echo esc_html($tab['title']); ?></span>
                                            <?php if (!empty($tab['subtabs'])): ?>
                                                <span class="toggle-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                                     stroke-linejoin="round">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg>
                                                </span>
                                            <?php endif; ?>
                                        </a>
                                        <?php if (!empty($tab['subtabs'])): ?>
                                            <ul class="sub-menu">
                                                <?php foreach ($tab['subtabs'] as $subtab_key => $subtab): ?>
                                                    <li class="<?php echo ($tab_key === $current_tab && $subtab_key === $current_sub_tab) ? 'active' : ''; ?>">
                                                        <a href="<?php echo esc_url(admin_url('admin.php?page=ambikly&sub=settings&tab=' . $tab_key . '&subtab=' . $subtab_key)) ?>"><?php echo esc_html($subtab['title']); ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php
                        }, '', '');
                        ?>
                    </div>

                    <div class="ambikly-content">
                        <?php
                        UIComponents::metabox(function () {
                            echo '<h2>' . esc_html($this->label) . '</h2>';
                        });
                        ?>

                        <?php foreach ($all_settings as $section_id => $setting) {

                            $this->Render($setting);

                        } ?>
                    </div>


                </div>
                <?php
                ambikly_submit_button();
                ?>
            </form>
        </div>
        <?php

    }

    private function Render($settings)
    {
        $data =$this->data;

        UIComponents::metabox(function () use ($settings, $data) {

            foreach ($settings as $setting) {

                $setting_name = $setting['name'] ?? '';

                if (isset($data[$setting_name])) {

                    UIComponents::field($setting, $data[$setting_name]);

                } else {

                    UIComponents::field($setting);
                }
            }
        }, '', '', '');


    }


    // Get current tab
    protected function get_current_tab()
    {
        return isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : '';
    }

    protected function get_current_subtab()
    {
        return isset($_GET['subtab']) ? sanitize_text_field($_GET['subtab']) : '';
    }
}