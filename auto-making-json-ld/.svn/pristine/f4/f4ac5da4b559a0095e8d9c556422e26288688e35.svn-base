<?php

if (!defined('ABSPATH')) exit;

if(!function_exists('amJL_FAQ')){
    function amJL_FAQ(){
        global $post;
        $faq_check = (int)get_option('faq_check');

        $number = get_post_meta($post->ID, 'faq_number', true);
        for((int)$i=1; $i<=$number; $i++){
            ${"question".$i} = get_post_meta($post->ID, 'question_'.$i, true);
            ${"answer".$i} = get_post_meta($post->ID, 'answer_'.$i, true);
        }

        if($number > 0){
            $status = 0;

            $amjl_faq = array(
                "@context" => "https://schema.org",
                "@type" => "FAQPage"
            );

            for((int)$i=1; $i<=$number; $i++){
                if(${"question".$i} && ${"answer".$i}){
                    $amjl_faq["mainEntity"][] = array(
                        "@type" => "Question",
                        "name" => ${"question".$i},
                        "acceptedAnswer" => array(
                            "@type" => "Answer",
                            "text" => ${"answer".$i}
                        )
                    );
                }
                $status ++;
            }

            if($status > 0 && $faq_check === 1){
                echo "<!-- よくある質問 -->\n";
                echo '<script type="application/ld+json">'."\n";
                echo wp_json_encode($amjl_faq)."\n";
                echo '</script>'."\n";
            }
        }
    }
}

add_action('wp_head', 'amJL_FAQ', 1);