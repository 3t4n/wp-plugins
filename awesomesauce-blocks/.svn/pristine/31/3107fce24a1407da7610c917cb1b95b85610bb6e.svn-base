<?php

namespace Awesomesauce\Admin\Pages;

use Awesomesauce\Awesomesauce;
use Awesomesauce\Functions;
use Awesomesauce\Sanitization;
use AwesomesauceUpdate;

if (!defined('ABSPATH')) {
    exit;
}

class AwesomesauceAddNew {

    private $has_extra = false;
    private $has_custom_extra = false;
    private $update;

    public function __construct() {
        Functions::call_in_file('Sanitization.php');

        if (file_exists(Awesomesauce::$plugin_extra_dir)) {
            $this->has_custom_extra = true;
        }

        if (file_exists(Awesomesauce::$plugin_extra_dir . '/update.php')) {
            require_once(Awesomesauce::$plugin_extra_dir . '/update.php');

            $this->has_extra = true;
            $this->update    = new AwesomesauceUpdate();

            //This is not a form being processed
            if (isset($_GET['awesomesauce_update'])) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended
                if (current_user_can('update_plugins')) {
                    $this->update->update();
                } else {
                    $this->admin_notice('Current user doesn\'t have permission to do plugin updates! The update_plugins capability is required.');
                }
            }
        }

        echo '<h1 class="awesomesauce_title">Select an Ѧwesoməsauce Bløck!
                <span class="awesomesauce_small_logo">' . (boolval($this->has_extra) ? (boolval($this->update->updates_available()) ? '<a class="awesomesauce_update_text" href="' . esc_url(admin_url('admin.php?page=awesomesauce_add_new&awesomesauce_update')) . '">Update Pro blocks</a>' : '<a class="awesomesauce_update_text" href="' . esc_url(admin_url('admin.php?page=awesomesauce_add_new&force_update_check=1')) . '">Check for Pro block updates</a>') : '') . '<div class="awesomesauce_overlay"></div>
                <img src="' . esc_url(Awesomesauce::$plugin_url) . '/Awesomesauce/Admin/Pages/small_logo.jpg" alt="Logo" class="awesomesauce_small_logo_img">
                </span>
            </h1>';

        $this->display_blocks();
    }

    public function title($title) {
        $characters = array(
            'e' => 'ə',
            'o' => 'ø',
            'A' => 'Ѧ',
            'E' => 'Ę'
        );

        $title = $this->add_spaces($title);

        foreach ($characters as $from => $to) {
            $title = $this->replace_first($title, $from, $to);
        }

        return $title;
    }

    private function replace_first($string, $from, $to) {
        $pos = strpos($string, $from);
        if ($pos !== false) {
            return substr_replace($string, $to, $pos, strlen($from));
        } else {
            return $string;
        }
    }

    private function add_spaces($string) {
        return substr(implode(' ', preg_split('/(?=[A-Z])/', $string)), 1);
    }

    public function awesomesauce_scandir($folder) {
        return array_filter(scandir($folder), function ($folder) {
            return $folder !== '.' && $folder !== '..' && $folder !== 'version.txt' && $folder !== 'versions.txt' && $folder !== 'update.php';
        });
    }

    public function admin_notice($message, $error = true) {
        echo '<div class="notice is-dismissible ' . ($error ? 'notice-error' : 'notice-success') . ' awesomesauce_admin_notice" style="order:0;"><p>' . wp_kses($message, Sanitization::allowed_html()) . '</p></div>';
    }

    private function display_blocks() {
        $common_folders = array();
        $extra_folders  = array();

        $free_dir     = Awesomesauce::$inner_plugin_dir . '/Blocks';
        $free_folders = $this->awesomesauce_scandir($free_dir);

        $plugin_extra_dir = Awesomesauce::$plugin_extra_dir;
        if ($this->has_extra || $this->has_custom_extra) {
            $extra_folders  = $this->awesomesauce_scandir($plugin_extra_dir);
            $common_folders = array_intersect($free_folders, $extra_folders);
            $extra_folders  = array_diff($extra_folders, $common_folders);
            $free_folders   = array_diff($free_folders, $common_folders);
        }

        $this->list_blocks($extra_folders, array($plugin_extra_dir => Awesomesauce::$plugin_extra_url), 1);
        $this->list_blocks($common_folders, array(
            array($plugin_extra_dir => Awesomesauce::$plugin_extra_url),
            array($free_dir => Awesomesauce::$plugin_url . '/Awesomesauce/Blocks')
        ), 100, true);
        $this->list_blocks($free_folders, array($free_dir => Awesomesauce::$plugin_url . '/Awesomesauce/Blocks'), 200);

        //This is not a form being processed
        if (isset($_GET['force_update_check'])) { //phpcs:ignore WordPress.Security.NonceVerification.Recommended
            if ($this->update->updates_available()) {
                $this->admin_notice('Some Pro blocks have new versions! <a href="' . esc_url(admin_url('admin.php?page=awesomesauce_add_new&awesomesauce_update')) . '">Update now.</a>', false);
            } else {
                $this->admin_notice('All Pro blocks are updated!', false);
            }
        }
    }

    private function list_blocks($sub_folders, $main, $default_order, $multi = false) {
        if (!$multi) {
            $main = array($main);
        }
        foreach ($sub_folders as $category) {
            echo '<div class="awesomesauce_category" style="order:' . intval($this->get_order($category, $default_order)) . '"><h2 class="awesomesauce_title">' . wp_kses($this->title($category), Sanitization::allowed_html()) . '</h2><div class="awesomesauce_add_new_section">';
            foreach ($main as $parts) {
                foreach ($parts as $folder => $url) {
                    $inner_folders = $this->awesomesauce_scandir($folder . '/' . $category);
                    foreach ($inner_folders as $type) {
                        ?>
                        <div class="awesomesauce_add_new_block">
                            <div class="awesomesauce_add_new_block_container">
                                <a class="awesomesauce_add_new_block_inner"
                                   href="<?php echo esc_url(admin_url('post-new.php?post_type=awesomesauce_blocks&category=' . $category . '&type=' . $type)); ?>"
                                   style="background-image:url('<?php echo esc_url($url . '/' . $category . '/' . $type . '/screenshot.jpg'); ?>');">
                                </a>
                                <h3 class="awesomesauce_sub_title"><?php echo esc_html($this->add_spaces($type)); ?></h3>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
            echo '</div></div>';
        }
    }

    private function get_order($category, $default_order) {
        $order = array(
            'CssTextEffects',
            'JsTextEffects',
            'Particles',
            'Data',
            'Clocks'
        );

        $index = array_search($category, $order);

        if ($index === false) {
            return $default_order;
        }

        return $default_order + ($index + 1);
    }
}

new AwesomesauceAddNew();

?>