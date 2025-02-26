<?php

namespace Rankology\Services\ContentAnalysis;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

class RenderContentAnalysis {
    public function render($analyzes, $analysis_data) {
        ?>
        <div id="rankology-analysis-tabs">
            <div id="rankology-analysis-tabs-1">
                <div class="analysis-score">
                    <?php
                    $impact = array_unique(array_values(wp_list_pluck($analyzes, 'impact')));
                    $impact_all_vals = array_values(wp_list_pluck($analyzes, 'impact'));
                    if (!empty($impact_all_vals)) {
                        $total_impacts = count($impact_all_vals);
                        $high_counts = $medium_counts = $low_counts = $good_counts = 0;
                        foreach ($impact_all_vals as $impact_val) {
                            if ($impact_val == 'good') {
                                $good_counts++;
                            } else if ($impact_val == 'low') {
                                $low_counts++;
                            } else if ($impact_val == 'medium') {
                                $medium_counts++;
                            } else {
                                $high_counts++;
                            }
                        }

                        $avg_ovrall_score = 2;
                        if ($good_counts > 0 && $total_impacts > 0 && $total_impacts > $good_counts) {
                            $avg_ovrall_score = ceil(($good_counts/$total_impacts) * 100);
                        }

                        add_action('admin_footer', function() use ($avg_ovrall_score) {
                            $score_txt = absint($avg_ovrall_score) . ' / 100';
                            if ($avg_ovrall_score > 80) {
                                $score_color = '#58bb58';
                                $score_bgcolor = '#e9f6e9';
                            } else if ($avg_ovrall_score > 70 && $avg_ovrall_score <= 80) {
                                $score_color = '#bf890d';
                                $score_bgcolor = '#fdf0c4';
                            } else if ($avg_ovrall_score >= 50 && $avg_ovrall_score <= 70) {
                                $score_color = '#282745';
                                $score_bgcolor = '#595A92';
                            } else {
                                $score_color = '#e93f30';
                                $score_bgcolor = '#fdeae8';
                            }
                            ?>
                            <script>
                                var sidebar_scroe_html = '\
                                <div class="misc-pub-section rkns-sidebar-seoscore" style="background-color:<?php echo ($score_bgcolor) ?>;">\
                                    <strong style="color:<?php echo ($score_color) ?>;"><?php printf(esc_html__('SEO Score: %s', 'wp-rankology'), $score_txt) ?></strong>\
                                </div>';
                                document.getElementById('misc-publishing-actions').innerHTML += sidebar_scroe_html;

                                //
                                var titlemeta_scroe_html = '\
                                <div class="rkns-metatitle-scorecon" style="background-color:<?php echo ($score_bgcolor) ?>;">\
                                    <strong style="color:<?php echo ($score_color) ?>;"><?php printf(esc_html__('Overall SEO Score: %s', 'wp-rankology'), $score_txt) ?></strong>\
                                </div>';
                                document.getElementById('rkns-postmeta-seoscore').innerHTML += titlemeta_scroe_html;
                            </script>
                            <?php
                        }, 90);
                    }
                    
        $tooltip = rankology_tooltip(__('Content overview', 'wp-rankology'), __('<strong>Overall score is better, Could Be Enhanced:</strong> red or orange bars <br> <strong>Good:</strong> yellow or green bars', 'wp-rankology'), '');

        if ( ! empty($impact)) {
            if (in_array('medium', $impact) || in_array('high', $impact)) {
                $score = false; ?><p class="avgscore"><span><?php echo __('Overall score is better, Could Be Enhanced', 'wp-rankology') . $tooltip; ?></span></p>
                        <?php
            } else {
                $score = true; ?><p class="goodscore"><span><?php echo __('Good', 'wp-rankology') . $tooltip; ?></span></p>
                        <?php
            }
        } else {
            $score = false;
        }

        if ( ! empty($analysis_data) && is_array($analysis_data)) {
            $analysis_data['score'] = $score;
            update_post_meta(get_the_ID(), '_rankology_analysis_data', $analysis_data);
            delete_post_meta(get_the_ID(), '_rankology_content_analysis_api');
        } ?>
                </div><!-- .analysis-score -->
                <?php
                if ( ! empty($analyzes)) {
                    $order = [
                        '1' => 'high',
                        '2' => 'medium',
                        '3' => 'low',
                        '4' => 'good',
                    ];

                    usort($analyzes, function ($a, $b) use ($order) {
                        $pos_a = array_search($a['impact'], $order);
                        $pos_b = array_search($b['impact'], $order);

                        return $pos_a - $pos_b;
                    });

                    foreach ($analyzes as $key => $value) {
                        ?>
                        <div class="gr-analysis">
                            <?php if (isset($value['title'])) { ?>
                                <div class="gr-analysis-title">
                                    <h3>
                                        <button type="button" aria-expanded="false" class="btn-toggle rkns-togl-<?php echo $value['impact']; ?>">
                                            <span class="rankology-arrow" aria-hidden="true"></span>
                                            <?php echo $value['title']; ?>
                                            <?php if (isset($value['impact'])) { ?>
                                                <span class="screen-reader-text"><?php printf(__('Degree of severity: %s','wp-rankology'), $value['impact']); ?></span>
                                            <?php } ?>
                                        </button>
                                    </h3>
                                </div>
                            <?php } ?>
                            <?php if (isset($value['desc'])) { ?>
                                <div class="gr-analysis-content" aria-hidden="true"><?php echo $value['desc']; ?></div>
                            <?php } ?>
                        </div><!-- .gr-analysis -->
                    <?php
                    }
                } ?>
                </div><!-- #rankology-analysis-tabs-1 -->
            </div><!-- #rankology-analysis-tabs -->
        <?php
    }
}
