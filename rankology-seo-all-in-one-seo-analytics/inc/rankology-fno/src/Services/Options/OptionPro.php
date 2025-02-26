<?php

namespace RankologyFno\Services\Options;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

use RankologyFno\Services\Options\Schemas\LocalBusinessOptions;
use RankologyFno\Services\Options\Schemas\PublisherOptions;

class OptionPro {
    use LocalBusinessOptions;
    use PublisherOptions;

    /**
     * 
     *
     * @return array
     */
    public function getOption($is_multisite) {
        if ($is_multisite === true) {
            return get_option('rankology_fno_mu_option_name');
        } else {
            return get_option('rankology_fno_option_name');
        }
    }

    /**
     * 
     *
     * @return string|null
     *
     * @param string $key
     */
    protected function searchOptionByKey($key, $is_multisite = false) {

        $data = $this->getOption($is_multisite);

        if (empty($data)) {
            return null;
        }

        if ( ! isset($data[$key])) {
            return null;
        }

        return $data[$key];
    }

    /**
     * 
     *
     * @return string
     */
    public function getRichSnippetEnable() {
        return $this->searchOptionByKey('rankology_rich_snippets_enable');
    }

    /**
     * 
     *
     * @return string
     */
    public function getRichSnippetsSiteNavigation() {
        return $this->searchOptionByKey('rankology_rich_snippets_site_nav');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsEnable() {
        return $this->searchOptionByKey('rankology_breadcrumbs_enable');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsJsonEnable() {
        return $this->searchOptionByKey('rankology_breadcrumbs_json_enable');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsSeparator() {
        return $this->searchOptionByKey('rankology_breadcrumbs_separator');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsI18nHere() {
        return $this->searchOptionByKey('rankology_breadcrumbs_i18n_here');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsI18nHome() {
        return $this->searchOptionByKey('rankology_breadcrumbs_i18n_home');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsI18nAuthor() {
        return $this->searchOptionByKey('rankology_breadcrumbs_i18n_author');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsI18n404() {
        return $this->searchOptionByKey('rankology_breadcrumbs_i18n_404');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsI18nSearch() {
        return $this->searchOptionByKey('rankology_breadcrumbs_i18n_search');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsI18nNoResults() {
        return $this->searchOptionByKey('rankology_breadcrumbs_i18n_no_results');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsI18nAttachments() {
        return $this->searchOptionByKey('rankology_breadcrumbs_i18n_attachments');
    }

    /**
     * 
     *
     * @return string
     */
    public function getBreadcrumbsI18nPaged() {
        return $this->searchOptionByKey('rankology_breadcrumbs_i18n_paged');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getBreadcrumbsRemoveBlogPage() {
        return $this->searchOptionByKey('rankology_breadcrumbs_remove_blog_page');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getBreadcrumbsRemoveShopPage() {
        return $this->searchOptionByKey('rankology_breadcrumbs_remove_shop_page');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getBreadcrumbsDisableSeparator() {
        return $this->searchOptionByKey('rankology_breadcrumbs_separator_disable');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getBreadcrumbsStorefront() {
        return $this->searchOptionByKey('rankology_breadcrumbs_storefront');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function get404Enable() {
        return $this->searchOptionByKey('rankology_404_enable');
    }

    /**
     * 
     *
     * @return string
     */
    public function get404RedirectHome() {
        return $this->searchOptionByKey('rankology_404_redirect_home');
    }

    /**
     * 
     *
     * @return string
     */
    public function get404RedirectUrl() {
        return $this->searchOptionByKey('rankology_404_redirect_custom_url');
    }

    /**
     * 
     *
     * @return string
     */
    public function get404RedirectStatusCode() {
        return $this->searchOptionByKey('rankology_404_redirect_status_code');
    }

    /**
     * 
     *
     * @return string
     */
    public function get404RedirectEnableMails() {
        return $this->searchOptionByKey('rankology_404_enable_mails');
    }

    /**
     * 
     *
     * @return string
     */
    public function get404RedirectEnableMailsFrom() {
        return $this->searchOptionByKey('rankology_404_enable_mails_from');
    }

    /**
     * 
     *
     * @return string
     */
    public function get404RedirectIpLogging() {
        return $this->searchOptionByKey('rankology_404_ip_logging');
    }

    /**
     * 
     *
     * @return string
     */
    public function get404Cleaning() {
        return $this->searchOptionByKey('rankology_404_cleaning');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function get404DisableAutomaticRedirects() {
        return $this->searchOptionByKey('rankology_404_disable_automatic_redirects');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function get404DisableGuessAutomaticRedirects() {
        return $this->searchOptionByKey('rankology_404_disable_guess_automatic_redirects_404');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getRSSDisableCommentsFeed() {
        return $this->searchOptionByKey('rankology_rss_disable_comments_feed');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getRSSDisablePostsFeed() {
        return $this->searchOptionByKey('rankology_rss_disable_posts_feed');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getRSSDisableExtraFeed() {
        return $this->searchOptionByKey('rankology_rss_disable_extra_feed');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getRSSDisableAllFeeds() {
        return $this->searchOptionByKey('rankology_rss_disable_all_feeds');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getRSSBeforeHTML() {
        return $this->searchOptionByKey('rankology_rss_before_html');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getRSSAfterHTML() {
        return $this->searchOptionByKey('rankology_rss_after_html');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getRSSPostThumbnail() {
        return $this->searchOptionByKey('rankology_rss_post_thumbnail');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getGoogleNewsEnable() {
        return $this->searchOptionByKey('rankology_news_enable');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWCCartPageNoindexEnable() {
        return $this->searchOptionByKey('rankology_woocommerce_cart_page_no_index');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWCCheckoutPageNoindexEnable() {
        return $this->searchOptionByKey('rankology_woocommerce_checkout_page_no_index');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWCCustomerAccountPageNoindexEnable() {
        return $this->searchOptionByKey('rankology_woocommerce_customer_account_page_no_index');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWCOGPriceEnable() {
        return $this->searchOptionByKey('rankology_woocommerce_product_og_price');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWCOGCurrencyEnable() {
        return $this->searchOptionByKey('rankology_woocommerce_product_og_currency');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWCDisableSchemaOutput() {
        return $this->searchOptionByKey('rankology_woocommerce_schema_output');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWCDisableSchemaBreadcrumbsOutput() {
        return $this->searchOptionByKey('rankology_woocommerce_schema_breadcrumbs_output');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWCDisableMetaGenerator() {
        return $this->searchOptionByKey('rankology_woocommerce_meta_generator');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getDublinCoreEnable() {
        return $this->searchOptionByKey('rankology_dublin_core_enable');
    }

    /**
     * 
     *
     * @return string
     */
    public function getRewriteSearch() {
        return $this->searchOptionByKey('rankology_rewrite_search');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getEddOgPrice() {
        return $this->searchOptionByKey('rankology_edd_product_og_price');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getEddOgCurrency() {
        return $this->searchOptionByKey('rankology_edd_product_og_currency');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getEddMetaGenerator() {
        return $this->searchOptionByKey('rankology_edd_meta_generator');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getRobotsTxtEnable() {
        if (is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_robots_enable', true);
        }

        return $this->searchOptionByKey('rankology_robots_enable');
    }

    /**
     * 
     *
     * @return string
     */
    public function getRobotsTxtFile() {
        if (is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_robots_file', true);
        }

        return $this->searchOptionByKey('rankology_robots_file');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWhiteLabelAdminHeader() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_admin_header', true);
        }

        return $this->searchOptionByKey('rankology_white_label_admin_header');
    }

    /**
     * 
     *
     * @return string
     */
    public function getWhiteLabelAdminMenu() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_admin_menu', true);
        }

        return $this->searchOptionByKey('rankology_white_label_admin_menu');
    }

    /**
     * 
     *
     * @return string
     */
    public function getWhiteLabelAdminBarIcon() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_admin_bar_icon', true);
        }

        return $this->searchOptionByKey('rankology_white_label_admin_bar_icon');
    }

    /**
     * 
     *
     * @return string
     */
    public function getWhiteLabelAdminTitle() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_admin_title', true);
        }

        return $this->searchOptionByKey('rankology_white_label_admin_title');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWhiteLabelHelpLinks() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_help_links', true);
        }

        return $this->searchOptionByKey('rankology_white_label_help_links');
    }

    /**
     * 
     *
     * @return string
     */
    public function getWhiteLabelListTitle() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_plugin_list_title', true);
        }

        return $this->searchOptionByKey('rankology_white_label_plugin_list_title');
    }

    /**
     * 
     *
     * @return string
     */
    public function getWhiteLabelListTitlePro() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_plugin_list_title_pro', true);
        }

        return $this->searchOptionByKey('rankology_white_label_plugin_list_title_pro');
    }

    /**
     * 
     *
     * @return string
     */
    public function getWhiteLabelListDesc() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_plugin_list_desc', true);
        }

        return $this->searchOptionByKey('rankology_white_label_plugin_list_desc');
    }

    /**
     * 
     *
     * @return string
     */
    public function getWhiteLabelListDescPro() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_plugin_list_desc_pro', true);
        }

        return $this->searchOptionByKey('rankology_white_label_plugin_list_desc_pro');
    }

    /**
     * 
     *
     * @return string
     */
    public function getWhiteLabelListAuthor() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_plugin_list_author', true);
        }

        return $this->searchOptionByKey('rankology_white_label_plugin_list_author');
    }

    /**
     * 
     *
     * @return string
     */
    public function getWhiteLabelListWebsite() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_plugin_list_website', true);
        }

        return $this->searchOptionByKey('rankology_white_label_plugin_list_website');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWhiteLabelListViewDetails() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_plugin_list_view_details', true);
        }

        return $this->searchOptionByKey('rankology_white_label_plugin_list_view_details');
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getWhiteLabelMenuPages() {
        if (is_network_admin() || is_multisite()) {
            return $this->searchOptionByKey('rankology_mu_white_label_menu_pages', true);
        }

        return;
    }

    /**
     * 
     *
     * @return boolean
     */
    public function getGSCDomainProperty() {
        return $this->searchOptionByKey('rankology_gsc_domain_property');
    }

    /**
     * 
     *
     * @return string
     */
    public function getGSCDateRange() {
        return $this->searchOptionByKey('rankology_gsc_date_range');
    }
}
