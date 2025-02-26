<?php

use Awesomesauce\Awesomesauce;

if (!defined('ABSPATH')) {
    exit;
}

//This initiates a code, not processes it, so we don't need nonce verification
if (isset($_GET['page']) && $_GET['page'] == 'awesomesauce_install_category') { //phpcs:ignore WordPress.Security.NonceVerification.Recommended
    ?>

    <h1 class="awesomesauce_title">Install New Category<span class="awesomesauce_small_logo"><div class="awesomesauce_overlay"></div><img src="<?php echo esc_url(Awesomesauce::$plugin_url); ?>/Awesomesauce/Admin/Pages/small_logo.jpg" alt="Logo" class="awesomesauce_small_logo_img"></span></h1>

    <div id="awesomesauce_install_page">
    <?php
}

class AwesomesauceInstall {

    public function __construct() {
        if (isset($_POST['awesomesauce_install'])) {
            if (isset($_POST['awesomesauce_category_install_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['awesomesauce_category_install_nonce'])), 'awesomesauce_category_install')) {
                if (current_user_can('install_plugins') && Awesomesauce::$is_admin) {
                    if (isset($_FILES['awesomesauce_zip']['tmp_name'])) {
                        $this->install(wp_strip_all_tags($_FILES['awesomesauce_zip']['tmp_name']), false, sanitize_text_field(wp_unslash($_POST['awesomesauce_category_install_nonce'])));
                    } else {
                        $this->awesomesauce_admin_notice('Something went wrong with the zip file uploading.');
                    }
                } else {
                    $this->awesomesauce_admin_notice('Current user doesn\'t have permission to install plugins! The install_plugins capability is required.');
                }
            } else {
                $this->awesomesauce_admin_notice('Nonce verification failed!');
            }
        }

        if (isset($_GET['page']) && $_GET['page'] == 'awesomesauce_install_category') {
            $this->display_form();
        }
    }

    public function install($zip_file, $update = false, $nonce = '') {
        if (!empty($nonce) && wp_verify_nonce($nonce, 'awesomesauce_category_install')) {

            if (!empty($zip_file)) {

                $tmp_dir = Awesomesauce::$plugin_extra_dir . '/tmp';
                $this->delete_directory_or_file($tmp_dir); //in case of previous server caused problem

                global $wp_filesystem;

                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . 'wp-admin/includes/file.php');
                    WP_Filesystem();
                }

                if (!file_exists(Awesomesauce::$plugin_extra_dir)) {
                    if (!$wp_filesystem->mkdir(Awesomesauce::$plugin_extra_dir, 0755, true)) {
                        $this->awesomesauce_admin_notice('Error! Extra folder (' . Awesomesauce::$plugin_extra_dir . ') cannot be created due to some wrong server folder/file permission configuration!');

                        return;
                    }
                }

                if (!file_exists($tmp_dir)) {
                    if (!$wp_filesystem->mkdir($tmp_dir, 0755, true)) {
                        $this->awesomesauce_admin_notice('Error! Temporary folder (' . $tmp_dir . ') cannot be created due to some wrong server folder/file permission configuration!');

                        return;
                    }
                }

                $unzipped_installer = unzip_file($zip_file, $tmp_dir);

                if (is_wp_error($unzipped_installer)) {
                    $this->awesomesauce_admin_notice('Error unzipping file: ' . $zip_file . $unzipped_installer->get_error_message());
                    $this->delete_directory_or_file($tmp_dir);

                    return;
                }

                foreach ($this->awesomesauce_scandir($tmp_dir) as $folder_or_file) {
                    if (is_dir($tmp_dir . '/' . $folder_or_file)) {
                        if (!$this->validate_type_structure($tmp_dir . '/' . $folder_or_file)) {
                            $this->awesomesauce_admin_notice('Wrong file found in the ' . $folder_or_file . ' folder! Installation aborted.');
                            $this->delete_directory_or_file($tmp_dir);

                            return;
                        } else {
                            if (!$this->upload_file_or_folder($tmp_dir, $folder_or_file)) {
                                return;
                            }
                        }

                    } else if ($folder_or_file == 'update.php') {
                        if (!$this->upload_file_or_folder($tmp_dir, $folder_or_file)) {
                            return;
                        }

                    } else {
                        $this->awesomesauce_admin_notice('Wrong file found: ' . $folder_or_file . ' Installation aborted.');
                        $this->delete_directory_or_file($tmp_dir);

                        return;
                    }
                }

                $this->delete_directory_or_file($tmp_dir);
                $this->awesomesauce_admin_notice('Successful ' . ($update ? 'update' : 'installation') . ': ' . $folder_or_file, false);

            } else {
                $this->awesomesauce_admin_notice('ZIP file could\'t get uploaded!');
            }

        } else {
            $this->awesomesauce_admin_notice('Nonce verification failed!');
        }
    }

    private function upload_file_or_folder($tmp_dir, $folder_or_file) {
        global $wp_filesystem;

        if (empty($wp_filesystem)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
        }

        $source_folder_or_file = $tmp_dir . '/' . $folder_or_file;
        $target_folder_or_file = Awesomesauce::$plugin_extra_dir . '/' . $folder_or_file;

        if (file_exists($target_folder_or_file)) { //update
            if (!$wp_filesystem->move($target_folder_or_file, Awesomesauce::$plugin_extra_dir . '/old_' . $folder_or_file)) {
                $this->awesomesauce_admin_notice('Error in renaming the old version: ' . $target_folder_or_file . ' Something is wrong with folder/file permissions on the server. Installation aborted.');
                $this->delete_directory_or_file($tmp_dir);

                return false;
            } else {
                if (!$wp_filesystem->move($source_folder_or_file, $target_folder_or_file)) {
                    $this->awesomesauce_admin_notice('Couldn\'t move ' . $folder_or_file . ' to target location! Something is wrong with folder/file permissions on the server. Trying to restore old version. Installation aborted.');
                    $wp_filesystem->move(Awesomesauce::$plugin_extra_dir . '/old_' . $folder_or_file, $target_folder_or_file);
                    $this->delete_directory_or_file($tmp_dir);

                    return false;
                } else {
                    //success
                    $this->delete_directory_or_file(Awesomesauce::$plugin_extra_dir . '/old_' . $folder_or_file);
                }
            }
        } else { //install
            if (!$wp_filesystem->move($source_folder_or_file, $target_folder_or_file)) {
                $this->awesomesauce_admin_notice('Couldn\'t move ' . $folder_or_file . ' to target location! Something is wrong with folder/file permissions on the server. Installation aborted.');
                $this->delete_directory_or_file($tmp_dir);

                return false;
            } //else success
        }

        return true;
    }

    private function awesomesauce_scandir($folder) {
        return array_filter(scandir($folder), function ($folder) {
            return $folder !== '.' && $folder !== '..';
        });
    }

    private function validate_type_structure($dir) {
        $allowed_type_files = array(
            'Css.php',
            'Js.php',
            'Html.php',
            'screenshot.jpg'
        );

        foreach ($this->awesomesauce_scandir($dir) as $type_folder) {
            if (is_dir($dir . '/' . $type_folder)) {
                $files = $this->awesomesauce_scandir($dir . '/' . $type_folder);
                if (!empty(array_diff($files, $allowed_type_files))) {
                    return false;
                }
            } else if ($type_folder != 'version.txt') {
                return false;
            }
        }

        return true;
    }

    private function delete_directory_or_file($dir) {
        if (!file_exists($dir)) {
            return;
        }

        if (!is_dir($dir)) {
            wp_delete_file($dir);

            return;
        }

        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            $path = $dir . '/' . $item;
            if (is_dir($path)) {
                $this->delete_directory_or_file($path);
            } else {
                wp_delete_file($path);
            }
        }

        global $wp_filesystem;

        if (empty($wp_filesystem)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
        }

        $wp_filesystem->rmdir($dir);
    }

    private function display_form() {
        ?>
        <form class="awesomesauce_form" method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('awesomesauce_category_install', 'awesomesauce_category_install_nonce'); ?>
            <label for="awesomesauce_zip">Select ZIP file:</label>
            <input type="file" name="awesomesauce_zip" id="awesomesauce_zip" accept=".zip">
            <button class="awesomesauce_button" type="submit" name="awesomesauce_install">Install</button>
        </form>
        <?php
    }

    private function awesomesauce_admin_notice($message, $error = true) {
        echo '<div class="notice is-dismissible ' . ($error ? 'notice-error' : 'notice-success') . ' awesomesauce_admin_notice"><p>' . esc_html($message) . '</p></div>';
    }
}

//This initiates a code, not processes it, so we don't need nonce verification
if (isset($_GET['page']) && $_GET['page'] == 'awesomesauce_install_category') { //phpcs:ignore WordPress.Security.NonceVerification.Recommended
    new AwesomesauceInstall();
    ?>

    </div>
    <?php
}

global $awesomesauce_docs_link;
$awesomesauce_docs_link = "http://awesomesauce.great-site.net/docs/awesomesauce-blocks-documentation/configuration/install-category/#content";
?>