<?php

namespace RankologyFno\Actions\Front\Schemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooksFrontend;
use Rankology\Helpers\RichSnippetType;

class PrintLocalBusiness implements ExecuteHooksFrontend {
    public function hooks() {
        add_action('wp_head', [$this, 'render'], 2);
    }

    public function render() {
        $data     = rankology_fno_get_service('OptionPro')->getLocalBusinessOpeningHours();
        $fallback = true;
        if (isset($data[0]) && isset($data[0]['am'], $data[0]['pm'])) {
            $fallback = false;
        }

        if (apply_filters('rankology_fallback_local_business_schema_renderer', $fallback)) {
            return;
        }

        $render = false;
        $page   = rankology_fno_get_service('OptionPro')->getLocalBusinessPage();
        if ( ! empty($page) && (is_single($page) || is_page($page))) {
            $render =true;
        } elseif (empty($page) && (is_home() || is_front_page())) {
            $render = true;
        }

        if ( ! $render) {
            return;
        }

        $toggle = rankology_get_service('ToggleOption')->getToggleLocalBusiness();
        if ('1' !== $toggle) {
            return;
        }

        if ('localbusiness' === get_post_meta(get_the_ID(), '_rankology_fno_rich_snippets_type', true)) {
            return;
        }

        $jsons = rankology_get_service('JsonSchemaGenerator')->getJsonsEncoded([
            'local-business',
        ], ['type' => RichSnippetType::OPTION_LOCAL_BUSINESS]);
        ?><script type="application/ld+json"><?php echo apply_filters('rankology_schemas_local_business_html', $jsons[0]); ?></script>
<?php
    }
}
