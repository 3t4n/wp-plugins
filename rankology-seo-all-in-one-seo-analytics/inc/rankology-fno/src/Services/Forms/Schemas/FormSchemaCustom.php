<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;

class FormSchemaCustom extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_custom':
                return 'textarea';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_custom':
                return __('Custom schema', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_custom':
                return __('e.g. <script type="application/ld+json">{
                    "@context": "https://schema.org/",
                    "@type": "Review",
                    "itemReviewed": {
                    "@type": "Restaurant",
                    "image": "http://www.example.com/seafood-restaurant.jpg",
                    "name": "Legal Seafood",
                    "servesCuisine": "Seafood",
                    "telephone": "1234567",
                    "address" :{
                        "@type": "PostalAddress",
                        "streetAddress": "123 William St",
                        "addressLocality": "New York",
                        "addressRegion": "NY",
                        "postalCode": "10038",
                        "addressCountry": "US"
                    }
                    },
                    "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "4"
                    },
                    "name": "A good seafood place.",
                    "author": {
                    "@type": "Person",
                    "name": "Bob Smith"
                    },
                    "reviewBody": "The seafood is great.",
                    "publisher": {
                    "@type": "Organization",
                    "name": "Washington Times"
                    }
                }</script>', 'wp-rankology');
        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_custom':
        }
    }

    protected function getDetails($postId = null) {
        return [
            [
                'key' => '_rankology_fno_rich_snippets_custom',
                'class' => 'rankology-textarea-high-size'
            ],
        ];
    }
}
