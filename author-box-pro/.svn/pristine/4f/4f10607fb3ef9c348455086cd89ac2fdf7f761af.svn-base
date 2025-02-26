<?php

require_once 'class.MelibuAuthorAbstract.php';

/**
 * class.MelibuAuthor.php 
 * 
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        https://www.tnado.com/author/prod3v3loper/
 * @package     Melabu
 * @subpackage  Author Box Pro
 * @since       1.0
 */
if (!class_exists('MB_AUTHOR_BOX')) {

    class MB_AUTHOR_BOX extends MB_AUTHOR_BOX_ABSTRACT {

        /**
         * 
         * @param type $user_id
         */
        public function profile($echo = false) {

            global $post, $MB_AUTHOR_BOX_HELPER, $MELIBU_PLUGIN_SHARE;
            $mbPluginABoptions = $MB_AUTHOR_BOX_HELPER->options();

            $userID = '';
            if (get_the_author_meta('ID')) {
                $userID = get_the_author_meta('ID');
            } else {
                $userID = get_current_user_id();
            }

            /**
             * AUTHOR meta
             * @see https://developer.wordpress.org/reference/functions/get_the_author_meta/
             */
            $authorDisplayName = get_the_author_meta('display_name', $userID);
            $authorEmail = get_the_author_meta('user_email', $userID);
            $authorDescription = get_the_author_meta('user_description', $userID);
            $authorUrl = get_the_author_meta('user_url', $userID);
            $authorMemberSince = get_the_author_meta('user_registered', $userID);
            $authorAdminColorSheme = get_the_author_meta('admin_color', $userID);
            $phonenumber = get_the_author_meta('phonenumber', $userID);

            /**
             * USER meta
             * @see https://codex.wordpress.org/Function_Reference/get_user_meta
             */
            $userPic = get_user_meta($userID, 'user_thumb', true);
            $userFirstName = get_user_meta($userID, 'first_name', true);
            $userLastName = get_user_meta($userID, 'last_name', true);
            $userNickName = get_user_meta($userID, 'nickname', true);
            $userDescription = get_user_meta($userID, 'description', true);
            $userAdminColor = get_user_meta($userID, 'admin_color', true);
            $userClosedpostboxesPage = get_user_meta($userID, 'closedpostboxes_page', true);
            $userPrimaryBlog = get_user_meta($userID, 'primary_blog', true);
            $userRichEditing = get_user_meta($userID, 'rich_editing', true);
            $userSourceDomain = get_user_meta($userID, 'source_domain', true);

            /**
             * USER plugin extra
             * @see https://codex.wordpress.org/Function_Reference/get_user_meta
             */
            $userMainDescription = get_user_meta($userID, 'user_main_description', true);
            $isAuthorBoxActivated = false;
            if ($post) {
                $isAuthorBoxActivated = get_post_meta($post->ID, 'mb-author-box-pro-meta-activate', true);
            }

            /**
             * USER data (Frontend)
             * @see https://codex.wordpress.org/Function_Reference/get_userdata
             */
            $userInfo = get_userdata($userID);

            /**
             * USER query
             */
            $user = new WP_User($userID);
            $userRoles = '';
            foreach ($user->roles as $role) {
                $role = get_role($role);
                if ($role != null) {
                    $userRoles .= $role->name . ' '; // String all user roles
                }
            }

            // AUTHOR posts
            $userPostsCount = number_format_i18n(get_the_author_posts());

            // USER avatar
            if (isset($userPic) && !empty($userPic)) {
                $image = wp_get_attachment_image_src($userPic, 'thumbnail'); // Get MB Author Box Avatar
            } else {
                $image = get_avatar_url(get_the_author_meta('ID'), 87); // Get avatar
            }

            // OPTIONS
            $avatarImageUrl = !empty($userPic) ? 'style="background-image: url(' . $image[0] . ');"' : 'style="background-image: url(' . $image . ');"';
            $avatarImageBorder = isset($mbPluginABoptions['avatar-border']) && !empty($mbPluginABoptions['avatar-border']) ? $mbPluginABoptions['avatar-border'] : 'no';
            $avatarImageStyle = isset($mbPluginABoptions['avatar-style']) && !empty($mbPluginABoptions['avatar-style']) ? $mbPluginABoptions['avatar-style'] : 'square';
            $avatarImageShadow = isset($mbPluginABoptions['avatar-shadow']) && !empty($mbPluginABoptions['avatar-shadow']) ? $mbPluginABoptions['avatar-shadow'] : '';
            $mailSubject = isset($mbPluginABoptions['mail-subject']) && !empty($mbPluginABoptions['mail-subject']) ? $mbPluginABoptions['mail-subject'] : '';
            $latestpostsNumber = isset($mbPluginABoptions['latestposts-number']) && !empty($mbPluginABoptions['latestposts-number']) ? $mbPluginABoptions['latestposts-number'] : '5';
            $boxShadow = isset($mbPluginABoptions['box-shadow']) && $mbPluginABoptions['box-shadow'] == 'on' ? 'shadow' : '';
            $boxRadius = isset($mbPluginABoptions['box-radius']) && !empty($mbPluginABoptions['box-radius']) ? $mbPluginABoptions['box-radius'] : '';
            $tabChange = isset($mbPluginABoptions['tab-change']) && !empty($mbPluginABoptions['tab-change']) ? $mbPluginABoptions['tab-change'] : '';
            $latestpostsDate = isset($mbPluginABoptions['latestposts-date']) && !empty($mbPluginABoptions['latestposts-date']) ? $mbPluginABoptions['latestposts-date'] : '';
            $latestpostsTime = isset($mbPluginABoptions['latestposts-time']) && !empty($mbPluginABoptions['latestposts-time']) ? $mbPluginABoptions['latestposts-time'] : '';
            $latestpostsComments = isset($mbPluginABoptions['latestposts-comments']) && !empty($mbPluginABoptions['latestposts-comments']) ? $mbPluginABoptions['latestposts-comments'] : '';

            if ($isAuthorBoxActivated == 'on' || is_admin()) {

                $backturn = '';

                // ADMIN color preview
                if (is_admin()) {
                    $colors = get_option('mb-author-admin-colors'); // Get admin colors from backend
                    $backturn .= '<table class="color-palette">';
                    $backturn .= '<tr>';
                    $backturn .= '<td style="background-color:' . $colors[0] . ';"></td>';
                    $backturn .= '<td style="background-color:' . $colors[1] . ';"></td>';
                    $backturn .= '<td style="background-color:' . $colors[2] . ';"></td>';
                    $backturn .= '<td style="background-color:' . $colors[3] . ';"></td>';
                    $backturn .= '</tr>';
                    $backturn .= '</table>';
                }

                // Tabs start
                $backturn .= '<div class="mb-author--tabs ' . $boxShadow . ' ' . $boxRadius . '">';

                // ABOUT
                if (isset($mbPluginABoptions['about']) && $mbPluginABoptions['about'] == 'on') {
                    $backturn .= '<div class="mb-author--tabs-tab">';
                    $backturn .= '<input type="radio" name="slideshow" id="slide1" checked="checked">';
                    // ABOUT Label
                    $backturn .= '<label class="mb-author--tabs-tab-label" for="slide1">' . (isset($mbPluginABoptions['about-label']) && !empty($mbPluginABoptions['about-label']) ? $mbPluginABoptions['about-label'] : __('About', 'author-box-pro')) . '</label>';
                    $backturn .= '<div class="mb-author--tabs-tab-content ' . $tabChange . '">';
                    // ABOUT Heading
                    $backturn .= '<h3 class="mb-author--tabs-tab-content-header">' . (isset($mbPluginABoptions['about-title']) && !empty($mbPluginABoptions['about-title']) ? $mbPluginABoptions['about-title'] : __('About', 'author-box-pro')) . '</h3>';
                    // ABOUT Avatar
                    if (isset($mbPluginABoptions['avatar']) && $mbPluginABoptions['avatar'] == 'on') {
                        $backturn .= '<div class="mb-st-grid-3">';
                        $backturn .= '<div class="mb-author--tabs-tab-content-img ' . $avatarImageBorder . ' ' . $avatarImageStyle . ' ' . $avatarImageShadow . '" ' . $avatarImageUrl . '></div>';
                        $backturn .= '</div>';
                        $backturn .= '<div class="mb-st-grid-9">';
                    } else {
                        $backturn .= '<div class="mb-st-grid-12">';
                    }
                    // ABOUT Description
                    $backturn .= $authorDisplayName . '<br>';
//            $backturn .= $userInfo->description;
                    if (!empty($userMainDescription)) {
                        $backturn .= nl2br(html_entity_decode($userMainDescription, ENT_QUOTES, 'UTF-8'));
                    } else {
                        $backturn .= '<p class="mb-author--tabs-tab-content-description">';
                        $backturn .= html_entity_decode($userDescription, ENT_QUOTES, 'UTF-8');
                        $backturn .= '</p>';
                    }
                    $backturn .= '</div>';

                    $backturn .= '<div class="st-clear"></div>';

                    // OPTIONS
                    $checkArray = array(
                        isset($mbPluginABoptions['facebook']) ? $mbPluginABoptions['facebook'] : '',
                        isset($mbPluginABoptions['googleplus']) ? $mbPluginABoptions['googleplus'] : '',
                        isset($mbPluginABoptions['twitter']) ? $mbPluginABoptions['twitter'] : '',
                        isset($mbPluginABoptions['flickr']) ? $mbPluginABoptions['flickr'] : '',
                        isset($mbPluginABoptions['pinterest']) ? $mbPluginABoptions['pinterest'] : '',
                        isset($mbPluginABoptions['youtube']) ? $mbPluginABoptions['youtube'] : '',
                        isset($mbPluginABoptions['github']) ? $mbPluginABoptions['github'] : '',
                        isset($mbPluginABoptions['tumblr']) ? $mbPluginABoptions['tumblr'] : '',
                        isset($mbPluginABoptions['soundcloud']) ? $mbPluginABoptions['soundcloud'] : '',
                        isset($mbPluginABoptions['skype']) ? $mbPluginABoptions['skype'] : '',
                        isset($mbPluginABoptions['xing']) ? $mbPluginABoptions['xing'] : '',
                        isset($mbPluginABoptions['instagram']) ? $mbPluginABoptions['instagram'] : '',
                        isset($mbPluginABoptions['whatsapp']) ? $mbPluginABoptions['whatsapp'] : '',
                        isset($mbPluginABoptions['jsfiddle']) ? $mbPluginABoptions['jsfiddle'] : '',
                        isset($mbPluginABoptions['snapchat']) ? $mbPluginABoptions['snapchat'] : '',
                        isset($mbPluginABoptions['linkedin']) ? $mbPluginABoptions['linkedin'] : ''
                    );

                    $backturn .= '</div>';
                    $backturn .= '</div>';
                }

                // CONTACT
                if (isset($mbPluginABoptions['contact']) && $mbPluginABoptions['contact'] == 'on') {
                    $backturn .= '<div class="mb-author--tabs-tab">';
                    $backturn .= '<input type="radio" name="slideshow" id="slide2">';
                    // CONTACT Label
                    $backturn .= '<label class="mb-author--tabs-tab-label" for="slide2">' . (isset($mbPluginABoptions['contact-label']) && !empty($mbPluginABoptions['contact-label']) ? $mbPluginABoptions['contact-label'] : __('Contact', 'author-box-pro')) . '</label>';
                    $backturn .= '<div class="mb-author--tabs-tab-content ' . $tabChange . '">';
                    $backturn .= '<h3 class="mb-author--tabs-tab-content-header">' . (isset($mbPluginABoptions['contact-title']) && !empty($mbPluginABoptions['contact-title']) ? $mbPluginABoptions['contact-title'] : __('Contact', 'author-box-pro')) . '</h3>';
//            $backturn .= 'Author ID: ' . $userInfo->ID . "<br>";
//            $backturn .= 'Authorname: ' . $userInfo->user_login . "<br>";
                    $backturn .= $authorDisplayName . "<br>";
//                $backturn .= $userFirstName . ' ' . $userLastName . '<br>';
//                $backturn .= '(<small>' . $userRoles . '</small>)<br>';
//            $backturn .= 'Author Nickname: ' . $userInfo->nickname . "<br>";
//            $backturn .= $userInfo->display_name . " (<small>" . implode(', ', $userInfo->roles) . "</small>)<br>";
                    // EMAIL
                    if (isset($mbPluginABoptions['mail']) && $mbPluginABoptions['mail'] == 'on') {
                        $backturn .= '<div class="mb-author--tabs-tab-content-description mb-st-grid-4">';
                        $backturn .= '<span class="dashicons dashicons-email"></span> ';
                        // Email mailto open
                        if ($authorEmail && (isset($mbPluginABoptions['mail-to']) && $mbPluginABoptions['mail-to'] == 'on')) {
                            $backturn .= '<a href="mailto:' . $authorEmail . '?Subject=' . $mailSubject . '" target="_top" title="Send me">';
                        }
                        if ($authorEmail) {
                            $backturn .= $authorEmail;
                        } else {
                            $backturn .= __('not specified', 'author-box-pro');
                        }
                        // Email mailto close
                        if ($authorEmail && (isset($mbPluginABoptions['mail-to']) && $mbPluginABoptions['mail-to'] == 'on')) {
                            $backturn .= '</a>';
                        }
                        if ($authorEmail) {
                            $backturn .= '<br>';
                        }
                        $backturn .= '</div>';
                    }

                    // PHONENUMBER
                    if (isset($mbPluginABoptions['phonenumber']) && $mbPluginABoptions['phonenumber'] == 'on') {
                        $backturn .= '<div class="mb-author--tabs-tab-content-description mb-st-grid-4">';
                        $backturn .= '<span class="dashicons dashicons-phone"></span> ';
                        // Phonenumber callto open
                        if ($phonenumber && (isset($mbPluginABoptions['phonenumber-call']) && $mbPluginABoptions['phonenumber-call'] == 'on')) {
                            $backturn .= '<a href="callto:' . $phonenumber . '" target="_top" title="Call me">';
                        }
                        if ($phonenumber) {
                            $backturn .= $phonenumber;
                        } else {
                            $backturn .= __('not specified', 'author-box-pro');
                        }
                        // Phonenumber callto close
                        if ($phonenumber && (isset($mbPluginABoptions['phonenumber-call']) && $mbPluginABoptions['phonenumber-call'] == 'on')) {
                            $backturn .= '</a>';
                        }
                        if ($phonenumber) {
                            $backturn .= '<br>';
                        }
                        $backturn .= '</div>';
                    }

                    // WEBSITE
                    if (isset($mbPluginABoptions['website']) && $mbPluginABoptions['website'] == 'on') {
                        $backturn .= '<div class="mb-author--tabs-tab-content-description mb-st-grid-4">';
                        $backturn .= '<span class="dashicons dashicons-admin-site"></span> ';
                        // Website link open
                        if ($authorUrl && (isset($mbPluginABoptions['website-link']) && $mbPluginABoptions['website-link'] == 'on')) {
                            $websiteBlank = '';
                            if (isset($mbPluginABoptions['website-blank']) && $mbPluginABoptions['website-blank'] == 'on') {
                                $websiteBlank = 'target="_blank"';
                            }
                            $backturn .= '<a href="' . $authorUrl . '" ' . $websiteBlank . ' title="Follow me">';
                        }
                        if ($authorUrl) {
                            $backturn .= $authorUrl;
                        } else {
                            $backturn .= __('not specified', 'author-box-pro');
                        }
                        // Website link close
                        if ($authorUrl && (isset($mbPluginABoptions['website-link']) && $mbPluginABoptions['website-link'] == 'on')) {
                            $backturn .= '</a>';
                        }
                        if ($authorUrl) {
                            $backturn .= '<br>';
                        }
                        $backturn .= '</div>';
                    }

                    $backturn .= '<div class="st-clear"></div>';

//                $backturn .= $authorMemberSince . '<br>';

                    $plugininfo = $MB_AUTHOR_BOX_HELPER->check_plugin('sharing-social-safe/sharing-social-safe.php');
                    if ($plugininfo['plugin-active'] == true) {
                        if (!empty($checkArray) && is_array($checkArray)) {
                            $atts = array('follow' => '');
                            foreach ($checkArray as $check) {
                                $atts['follow'] .= $check . ',';
                            }
                            if (isset($mbPluginABoptions['social']) && $mbPluginABoptions['social'] == 'on') {
                                $backturn .= $MELIBU_PLUGIN_SHARE->social($atts);
                            }
                        }
                    }
                    $backturn .= '</div>';
                    $backturn .= '</div>';
                }

                // LATESTPOSTS
                if (isset($mbPluginABoptions['latestposts']) && $mbPluginABoptions['latestposts'] == 'on') {
                    $backturn .= '<div class="mb-author--tabs-tab">';
                    $backturn .= '<input type="radio" name="slideshow" id="slide3">';
                    $backturn .= '<label class="mb-author--tabs-tab-label" for="slide3">' . (isset($mbPluginABoptions['latestposts-label']) && !empty($mbPluginABoptions['latestposts-label']) ? $mbPluginABoptions['latestposts-label'] : __('Posts', 'author-box-pro')) . '</label>';
                    $backturn .= '<div class="mb-author--tabs-tab-content ' . $tabChange . '">';
                    $backturn .= '<h3 class="mb-author--tabs-tab-content-header">' . (isset($mbPluginABoptions['latestposts-title']) && !empty($mbPluginABoptions['latestposts-title']) ? $mbPluginABoptions['latestposts-title'] : __('Posts', 'author-box-pro')) . '</h3>';
                    $backturn .= '<p class="mb-author--tabs-tab-content-description">';
                    $backturn .= __('Blogged:', 'author-box-pro');
                    $backturn .= ' <strong>' . $userPostsCount . '</strong> ' . __('Posts', 'author-box-pro') . '<br>';
                    $backturn .= '</p>';
                    $backturn .= '<ul>';
                    // LATESTPOSTS
                    $args = array(
                        'post_type' => 'post',
                        'numberposts' => $latestpostsNumber,
                        'author' => $userID
                    );
                    $recent_posts = wp_get_recent_posts($args);
                    foreach ($recent_posts as $recent) {
                        $imageurl = get_the_post_thumbnail_url($recent["ID"]);
                        $backturn .= '<li>';
                        if ($imageurl) {
                            $backturn .= '<div class="mb-st-grid--4"><img src="' . $imageurl . '" alt="" width="100" height=""></div>';
                        }
                        $backturn .= '<div class="mb-st-grid--8">';
                        $backturn .= '<a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a> <small>(' . __('Latest post', 'author-box-pro') . ')</small><br>';
                        $backturn .= '<small>';
                        if ($latestpostsDate == 'on') {
                            $backturn .= '<span class="dashicons dashicons-calendar-alt"></span> ' . date('d.m.Y', strtotime($recent['post_date']));
                        }
                        if ($latestpostsTime == 'on') {
                            $backturn .= ' | <span class="dashicons dashicons-clock"></span> ' . date('H:i:s', strtotime($recent['post_date']));
                        }
                        if ($latestpostsComments == 'on') {
                            $backturn .= ' | <span class="dashicons dashicons-admin-comments"></span> Comments: ' . get_comments_number($recent['ID']);
                        }
                        $backturn .= '</small>';
                        $backturn .= '</div> ';
                        $backturn .= '<div class="st-clear"></div>';
                        $backturn .= '</li> ';
                    }
                    wp_reset_query();
                    $backturn .= '</ul>';
                    $backturn .= '</div>';
                    $backturn .= '</div>';
                }

                // OTHER
                if (isset($mbPluginABoptions['other']) && $mbPluginABoptions['other'] == 'on') {
                    $backturn .= '<div class="mb-author--tabs-tab">';
                    $backturn .= '<input type="radio" name="slideshow" id="slide4">';
                    $backturn .= '<label class="mb-author--tabs-tab-label" for="slide4">' . (isset($mbPluginABoptions['other-label']) && !empty($mbPluginABoptions['other-label']) ? $mbPluginABoptions['other-label'] : __('Other', 'author-box-pro')) . '</label>';
                    $backturn .= '<div class="mb-author--tabs-tab-content ' . $tabChange . '">';
                    $backturn .= '<h3 class="mb-author--tabs-tab-content-header">' . (isset($mbPluginABoptions['other-title']) && !empty($mbPluginABoptions['other-title']) ? $mbPluginABoptions['other-title'] : __('Other', 'author-box-pro')) . '</h3>';
                    $backturn .= '<div class="mb-st-grid-12">';
                    if (isset($mbPluginABoptions['other-text']) && !empty($mbPluginABoptions['other-text'])) {
                        $backturn .= html_entity_decode($mbPluginABoptions['other-text'], ENT_QUOTES, 'UTF-8');
                    }
                    $backturn .= '</div>';
                    $backturn .= '</div>';
                    $backturn .= '</div>';
                }

                $backturn .= '</div>'; // Tabs end

                if ($echo === true) {
                    echo $backturn;
                } else {
                    return $backturn;
                }
            }
        }

        /**
         * 
         */
        public function author_short($echo = false) {

            global $MB_AUTHOR_BOX_HELPER;
            $mbPluginABoptions = $MB_AUTHOR_BOX_HELPER->options();

            // AUTHOR 
            if (get_the_author_meta('ID')) {
                $userID = get_the_author_meta('ID');
            } else {
                $userID = get_current_user_id();
            }
            $authorDisplayName = get_the_author_meta('display_name', $userID);

            // USER 
            $userUserUrl = get_user_meta($userID, 'user_url', true);
            $userDescription = get_user_meta($userID, 'description', true);

            $userMainDescription = get_user_meta($userID, 'user_main_description', true);

            // USER avatar
            $userPic = get_user_meta($userID, 'user_thumb', true);
            if (!empty($userPic)) {
                $image = wp_get_attachment_image_src($userPic, 'thumbnail'); // Get MB Author Box Avatar
            } else {
                $image = get_avatar_url(get_the_author_meta('ID'), 87); // Get avatar
            }
            $output = '<div class="mb-author--widget mb-author--clear-after">';
            // ABOUT Avatar
            if (isset($mbPluginABoptions['avatar']) && $mbPluginABoptions['avatar'] == 'on') {
                // OPTIONS
                $avatarImageUrl = !empty($userPic) ? 'style="background-image:url(' . $image[0] . ');"' : 'style="background-image:url(' . $image . ');"';
                $avatarImageBorder = isset($mbPluginABoptions['avatar-border']) && !empty($mbPluginABoptions['avatar-border']) ? $mbPluginABoptions['avatar-border'] : 'no';
                $avatarImageStyle = isset($mbPluginABoptions['avatar-style']) && !empty($mbPluginABoptions['avatar-style']) ? $mbPluginABoptions['avatar-style'] : 'square';
                $avatarImageShadow = isset($mbPluginABoptions['avatar-shadow']) && !empty($mbPluginABoptions['avatar-shadow']) ? $mbPluginABoptions['avatar-shadow'] : '';
                // OUTPUT
                $output .= '<div class="mb-st-grid-6">';
                $output .= '<div class="mb-author--widget-img ' . $avatarImageBorder . ' ' . $avatarImageStyle . ' ' . $avatarImageShadow . '" ' . $avatarImageUrl . '></div>';
                $output .= '</div>';
            }
            $output .= '<div class="mb-st-grid-6">';
            $output .= '<a href="' . get_author_posts_url($userID) . '" class="author-link">';
            $output .= '<h4 class="author-name">';
            $output .= $authorDisplayName;
            $output .= '</h4>';
            $output .= '</a>';
            if (!empty($userMainDescription)) {
                $output .= substr(nl2br($userMainDescription), 0, 90);
                if (strlen($userMainDescription) > 90) {
                    $output .= '...';
                }
            } else {
                $output .= '<p class="mb-author--tabs-tab-content-description">';
                $output .= substr($userDescription, 0, 90);
                if (strlen($userDescription) > 90) {
                    $output .= '...';
                }
                $output .= '</p>';
            }
            $output .= '</div>';
            $output .= '<div class="st-clear"></div>';

            $output .= '</div>';

            if ($echo === true) {
                echo $output;
            } else {
                return $output;
            }
        }

    }

    global $MB_AUTHOR_BOX;
    $MB_AUTHOR_BOX = new MB_AUTHOR_BOX();

    add_action('show_user_profile', array('MB_AUTHOR_BOX', 'show_user_profile'));
    add_action('edit_user_profile', array('MB_AUTHOR_BOX', 'show_user_profile'));
    add_action('user_new_form', array('MB_AUTHOR_BOX', 'show_user_profile'));

    add_action('user_register', array('MB_AUTHOR_BOX', 'profile_update'));
    add_action('profile_update', array('MB_AUTHOR_BOX', 'profile_update'));
}