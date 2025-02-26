<div class="wrap">
    <h2><?php _e("Find Ideas", PIG_PLUGIN_SLUG__);?></h2>

<?php
    global $active_tab, $name;
    $active_tab = isset( $_REQUEST[ 'tab' ] ) ? $_REQUEST[ 'tab' ] : "search";
    $class      = "";
    $name       = "Save";

    $current_page = isset($current_page) ? $current_page : 1;
?>
    <h2 class="nav-tab-wrapper">
        <a href="?page=<?php echo PIG_PLUGIN_SLUG__;?>&tab=search" class="nav-tab <?php echo $active_tab == 'search' ? 'nav-tab-active' : ''; ?>"><?php echo $PIG_MESSAGES['menu_search'];?></a>
        <a href="?page=<?php echo PIG_PLUGIN_SLUG__;?>&tab=email" class="nav-tab <?php echo $active_tab == 'email' ? 'nav-tab-active' : ''; ?>"><?php echo $PIG_MESSAGES['menu_email'];?></a>
    </h2>

    <?php if ($this->notice) { ?>
    <div class="updated"><p><?php echo $this->notice;?></p></div>
    <?php } ?>

    <?php if ($this->error) { ?>
    <div class="error"><p><?php echo $this->error;?></p></div>
    <?php } ?>

    <form class="form-wrapper" method="post" action="" name="pig-search-form" id="pig-search-form">
        <table class="form-table">
<?php
    switch ($active_tab) {
        case "search":
            $class      = "pig-search";
            $name       = "";
            global $pro;
            $pro        = apply_filters("pig_pro_activated", false);
            $show_images    = self::getOption("show-images");
            if ( strlen( $show_images ) == 0) {
                $show_images    = 1;
            }
            $show_images    = $show_images == 1;
?>
            <tr valign="top">
                <th scope="row" colspan="20"><?php echo PIG_PLUGIN_NAME__;?> <?php echo $PIG_MESSAGES['search_desc'];?></th>
            </tr>
            <tr valign="top">
                <th scope="row" class="search-q">
                    <input type="text" name="search-q" id="search-q" value="<?php echo @$_REQUEST["search-q"];?>" class="regular-text" placeholder="<?php echo $PIG_MESSAGES['placeholder_search'];?>">
                    <input type="hidden" id="search-page" name="search-page" value="<?php echo $current_page;?>">
                </th>
                <th scope="row"><?php submit_button($PIG_MESSAGES['button_search'], "primary pig-submit", "pig-submit", false);?></th>
                <th scope="row" class="limits-description"><div id="limits-description">&nbsp;<span id="limit-symbol">i</span><span id="pig-pointer">&nbsp;</span></div></th>
            </tr>
            <tr valign="top">
                <table class="form-table">
                    <tr>
<?php
            if ( isset( $_REQUEST["search-q"] ) ) {
                global $_search_type;
                $_search_type       = "advanced";
                include PIG_DIR__ . "resources/admin/includes/search.php";
            }
?>
                    </tr>
                </table>
            </tr>
            <tr valign="top">
                <td colspan="20">
                    <img src="<?php echo PIG_IMAGES__?>/loading.png" class="loading" style="display: none">
                    <div class="pig-posts">
<?php
            if (isset($results) && !is_wp_error($results) && count($results) > 0) {
                if (!$pro) {
?>
                    <a href="?page=<?php echo PIG_PLUGIN_SLUG__;?>1">
                    <div class="pig-post pig-no-results">
                        <div>
                            <h2><?php echo $PIG_MESSAGES['free_upgrade_heading'];?></h2>
                            <h5 class="pig-post-body">
                                <div class="li">
                                    <div class="li-index">-</div>
                                    <label><?php echo $PIG_MESSAGES['free_upgrade_message1'];?></label>
                                </div>
                                <div class="li">
                                    <div class="li-index">-</div>
                                    <label><?php echo $PIG_MESSAGES['free_upgrade_message2'];?></label>
                                </div>
                                <div class="li">
                                    <div class="li-index">-</div>
                                    <label><?php echo $PIG_MESSAGES['free_upgrade_message3'];?></label>
                                </div>
                            </h5>
                        </div>
                    </div>
                    </a>
<?php
                }

                $index      = 0;
                foreach ($results as $result) {
                    $class  = isset($result["pig-class"]) ? $result["pig-class"] : "";
                    if ($class) continue;
                    $shares = $result["popularity"]["total"];
                    $title  = self::getTitle($result, 65);
                    if (empty($title)) continue;

                    $src    = self::getTrimmed(self::getSource($result), 25);
                    $img    = isset($result["image"]) ? $result["image"] : "";
                    $desc   = self::getDescription($result, false);
                    $image_default  = false;
                    if ( ! $img ) {
                        $img    = PIG_IMAGES__ . "/blank.png";
                        $image_default = true;
                    }
?>
                    <div class="pig-post <?php echo $class;?>" data-epic="<?php esc_attr_e(json_encode($result));?>">
                        <div class="pig-upper">
                            <div class="pig-inner-doing" style="display: none">
                                <h3 class="pig-post-title bookmark" style="display: none"><?php _e("Creating Bookmark", PIG_PLUGIN_SLUG__);?>...</h3>
                                <h3 class="pig-post-title draft" style="display: none"><?php _e("Creating Draft", PIG_PLUGIN_SLUG__);?>...</h3>
                            </div>
                            <div class="pig-inner-done" style="display: none">
                                <h3 class="pig-post-title bookmark" style="display: none"><?php _e("Created Bookmark", PIG_PLUGIN_SLUG__);?></h3>
                                <h3 class="pig-post-title draft" style="display: none"><?php _e("Created Draft", PIG_PLUGIN_SLUG__);?>...</h3>
                            </div>
                            <div class="pig-inner">
                                <div class="pig-post-title">
                                    <h2><a href="<?php echo $result["url"];?>" target="_new"><?php echo $title;?></a></h2>
                                </div>
                                <div class="pig-actions-container">
                                    <div class="pig-actions">
                                        <div class="pig-post-draft" title="<?php _e("Create Draft", PIG_PLUGIN_SLUG__);?>"></div>
                                        <div class="pig-post-remove" title="<?php _e("Remove", PIG_PLUGIN_SLUG__);?>"></div>
                                        <div class="pig-post-bookmark" title="<?php _e("Add Bookmark", PIG_PLUGIN_SLUG__);?>"></div>
                                    </div>
                                </div>
                                <div class="pig-post-body <?php echo $show_images && $img ? "pig-post-image" : "pig-post-noimage" ?> <?php echo $image_default ? "pig-post-image-blank" : ""?>" style="<?php echo $show_images && $img ? "background-image: url('" . $img . "')": ""?>">
<?php
                    if ( $show_images && $img ) {
?>
                                    <!--<img src="<?php echo $img;?>">-->
<?php
                    } elseif ( $desc ) {
?>
                                    <h3><?php echo $desc;?></h3>
<?php
                    }
?>
                                </div>
                            </div>
                            <div class="pig-metrics">
                                <div class="pig-metric pig-metric-total"><div><?php echo self::roundIt($shares["shares"]);?></div></div>
                                <div class="pig-metric pig-metric-fb">
                                    <div class="pig-social"></div>
                                    <div><?php echo isset($shares["facebook"]) ? self::roundIt($shares["facebook"]) : 0;?></div>
                                </div>
                                <div class="pig-metric pig-metric-in">
                                    <div class="pig-social"></div>
                                    <div><?php echo isset($shares["linkedin"]) ? self::roundIt($shares["linkedin"]) : 0;?></div>
                                </div>
                                <div class="pig-metric pig-metric-t">
                                    <div class="pig-social"></div>
                                    <div><?php echo isset($shares["twitter"]) ? self::roundIt($shares["twitter"]) : 0;?></div>
                                </div>
                                <div class="pig-metric pig-metric-p">
                                    <div class="pig-social"></div>
                                    <div><?php echo isset($shares["pinterest"]) ? self::roundIt($shares["pinterest"]) : 0;?></div>
                                </div>
                                <div class="pig-metric pig-metric-g">
                                    <div class="pig-social"></div>
                                    <div><?php echo isset($shares["googleplus"]) ? self::roundIt($shares["googleplus"]) : 0;?></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="pig-lower">
                            <div class="pig-post-src">
                                <img class="pig-fav" src="https://www.google.com/s2/favicons?domain_url=<?php echo $result["url"];?>"/>
                                <h5><?php echo $src;?></h5>
                            </div>
                            <div class="pig-post-type <?php echo isset($result["type"]) ? str_replace(" ", "", strtolower($result["type"])) : "article";?>">
                                <h5><?php echo isset($result["type"]) ? ucwords($result["type"]) : "";?></h5>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
<?php
                }
                if ($pages && count( $pages ) > 1 ) {
?>
                    <div id="pig-paging">
<?php
                    foreach ($pages as $page) {
                        $class      = ($page == $current_page) ? "active" : "";
                        if ($page > 0) {
?>
                        <span class="pig-page <?php echo $class;?>"><a href="#" data-page="<?php echo $page;?>"><?php echo $page?></a></span>
<?php
                        } else {
?>
                        <span class="pig-page">..</span>
<?php
                        }
                    }
?>
                    </div>
<?php
                }
            } else if (isset($_POST["pig-submit"]) && self::getSearchesLeft(null) > 0) {
?>
                    <div class="pig-post pig-no-results">
                        <div>
                            <h2><?php echo sprintf($PIG_MESSAGES['no_results'], @$_REQUEST["search-q"]);?></h2>
                        </div>
                    </div>
<?php
            }
?>
                    </div>
                    <div class="clear"></div>
                </td>
            </tr>
<?php
            break;
        case "email":
            global $pig_email_alert;
            $pig_email_alert  = null;
            if (isset($_GET["id"])) {
                $pig_email_alert  = get_post($_GET["id"]);
            }
            include_once PIG_DIR__ . "resources/admin/includes/email.php";
            break;
    }
?>
        </table>
    
        <input type="hidden" name="tab" value="<?php echo $active_tab;?>">
        <?php wp_nonce_field($active_tab, "nonce");?>
<?php
    if ($name) {
        submit_button(__($name, PIG_PLUGIN_SLUG__), "primary", "pig-submit");
    }
?>
    </form>