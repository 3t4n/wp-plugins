<?php

namespace RankologyFno\Actions\Front\Schemas;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooksFrontend;
use Rankology\Helpers\RichSnippetType;

class PrintRichSnippets implements ExecuteHooksFrontend {
    public function hooks() {
        add_action('wp_head', [$this, 'render'], 2);
    }

    public function render() {
        $render = false;
        if (is_singular()) {
            $render = true;
        }

        if ( ! $render) {
            return;
        }

        $enable = rankology_fno_get_service('OptionPro')->getRichSnippetEnable();

        if ('1' !== $enable) {
            return;
        }

        $schemas = get_post_meta(get_the_ID(), '_rankology_fno_schemas_manual', true);
        if (empty($schemas) || ! is_array($schemas)) {
            return;
        }

        $jsonsNeedToCreate = [];
        $jsonsCustom = [];

        foreach ($schemas as $schema) {
            if ( ! isset($schema['_rankology_fno_rich_snippets_type'])) {
                continue;
            }
            if ('custom' === $schema['_rankology_fno_rich_snippets_type'] && isset($schema['_rankology_fno_rich_snippets_custom'])) {
                $jsonsCustom[] = $schema['_rankology_fno_rich_snippets_custom'];
            }

            $jsonsNeedToCreate[] = $schema['_rankology_fno_rich_snippets_type'];
        }

        $context = rankology_get_service('ContextPage')->getContext();
        $context['type'] = RichSnippetType::MANUAL;

        $jsons = rankology_get_service('JsonSchemaGenerator')->getJsonsEncoded($jsonsNeedToCreate, $context);

        foreach ($jsons as $key => $json) {
            if (null === $json) {
                continue;
            } ?><script type="application/ld+json"><?php echo apply_filters('rankology_rich_snippets_' . $jsonsNeedToCreate[$key] . '_html', $json, $context); ?></script><?php
                echo "\n";
        }

        $jsonsCustom = rankology_get_service('TagsToString')->replaceDataToString($jsonsCustom, $context);

        foreach ($jsonsCustom as $key => $json) {
            echo apply_filters('rankology_rich_snippets_custom_' . $key . '_html', $json, $context);
            echo "\n";
        } ?>
<?php
    }
}
