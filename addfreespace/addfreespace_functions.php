<?php

function is_localhost() {
    if (strpos($_SERVER["HTTP_HOST"], 'localhost') === FALSE) {
        return(FALSE);
    } else {
        return(TRUE);
    }
}

function save_values_not_widget() {
    $Arr = array();
    $count = 0;
    for ($i = 1; $i <= 999; $i++) {
        $RowArr = array();
        if (!empty($_POST['row' . $i . '_html_simple'])) {
            //simpleで何か入ってる
            if ($_POST['row' . $i . '_delete_simple'] !== '1') {
                //削除にチェックが入っていない
                $count++;
                $RowArr = array(
                    'is_mobile' => $_POST['row' . $i . '_is_mobile_simple']
                    , 'displaypage' => array(
                        'post' => ($_POST['row' . $i . '_disp_post_simple'] === '1' ? 1 : 0)
                        , 'page' => ($_POST['row' . $i . '_disp_page_simple'] === '1' ? 1 : 0)
                    )
                    , 'title_content' => $_POST['row' . $i . '_title_content_simple']
                    , 'top_more_bottom' => $_POST['row' . $i . '_top_more_bottom_simple']
                    , 'priority' => $_POST['row' . $i . '_priority_simple']
                    , 'html' => ($_POST['row' . $i . '_html_simple'])   //ダブルクオーテーション等がPOSTにより自動的にエスケープされている
                        //, 'html' => $_POST['row' . $i . '_html_simple']
                );
                $Arr['simple'][] = $RowArr;
            }
        }
        if (!empty($_POST['row' . $i . '_html_ab_a']) || !empty($_POST['row' . $i . '_html_ab_b'])) {
            //abで何か入ってる
            if ($_POST['row' . $i . '_delete_ab'] !== '1') {
                //削除にチェックが入っていない
                $count++;
                $RowArr = array(
                    'is_mobile' => $_POST['row' . $i . '_is_mobile_ab']
                    , 'displaypage' => array(
                        'post' => ($_POST['row' . $i . '_disp_post_ab'] === '1' ? 1 : 0)
                        , 'page' => ($_POST['row' . $i . '_disp_page_ab'] === '1' ? 1 : 0)
                    )
                    , 'title_content' => $_POST['row' . $i . '_title_content_ab']
                    , 'top_more_bottom' => $_POST['row' . $i . '_top_more_bottom_ab']
                    , 'priority' => $_POST['row' . $i . '_priority_ab']
                    , 'html_a' => ($_POST['row' . $i . '_html_ab_a'])   //ダブルクオーテーション等がPOSTにより自動的にエスケープされている
                    , 'html_b' => ($_POST['row' . $i . '_html_ab_b'])   //ダブルクオーテーション等がPOSTにより自動的にエスケープされている
                    , 'ratio_a' => $_POST['row' . $i . '_ratio_ab_a']
                    , 'ratio_b' => $_POST['row' . $i . '_ratio_ab_b']
                );
                $Arr['ab'][] = $RowArr;
            }
        }
    }
    update_option('addfreespace_not_widget', $Arr);
}

function ret_strings($Honbun, $Priority) {
    $Arr = get_option('addfreespace_not_widget');
    $RetHtml = $Honbun;
    if (!empty($Arr['simple'])) {
        foreach ($Arr['simple'] as $Row) {
            if ($Row['priority'] === (string) $Priority) {
                if (
                //PC/mobileチェック
                        (wp_is_mobile() && $Row['is_mobile'] === 'mobile')
                        || (!wp_is_mobile() && $Row['is_mobile'] === 'pc')
                        || $Row['is_mobile'] === 'all'
                ) {
                    if (
                    //単一記事等チェック
                            (is_single() && $Row['displaypage']['post'] === 1)
                            || (is_page() && $Row['displaypage']['page'] === 1)
                            || (is_home() && $Row['displaypage']['home'] === 1)
                            || (is_archive() && $Row['displaypage']['archive'] === 1)
                            || (is_search() && $Row['displaypage']['search'] === 1)
                    ) {
                        if ($Row['top_more_bottom'] === 'top') {
                            $RetHtml = stripslashes($Row['html']) . $RetHtml;
                        } elseif ($Row['top_more_bottom'] === 'more') {
                            $RetHtml = replace_more($RetHtml, stripslashes($Row['html']));
                        } elseif ($Row['top_more_bottom'] === 'bottom') {
                            $RetHtml = $RetHtml . stripslashes($Row['html']);
                        } else {
                            $RetHtml = $RetHtml . '<br />addfreespaceで何か変なことが起こっています！ addfreespace broken!';
                        }
                    }
                }
            }
        }
    }
    if (!empty($Arr['ab'])) {
        foreach ($Arr['ab'] as $Row) {
            if ($Row['priority'] === (string) $Priority) {
                if (
                //PC/mobileチェック
                        (wp_is_mobile() && $Row['is_mobile'] === 'mobile')
                        || (!wp_is_mobile() && $Row['is_mobile'] === 'pc')
                        || $Row['is_mobile'] === 'all'
                ) {
                    if (
                    //単一記事等チェック
                            (is_single() && $Row['displaypage']['post'] === 1)
                            || (is_page() && $Row['displaypage']['page'] === 1)
                            || (is_home() && $Row['displaypage']['home'] === 1)
                            || (is_archive() && $Row['displaypage']['archive'] === 1)
                            || (is_search() && $Row['displaypage']['search'] === 1)
                    ) {
                        //出力html判定（A/B判定）
                        $RatioA = (integer) $Row['ratio_a'];
                        $RatioB = (integer) $Row['ratio_b'];
                        $RatioSum = $RatioA + $RatioB;
                        //比率合計を上限とした乱数を発生させて、
                        //小さいほうより小さかったらその小さいほうのratioのhtmlを出力。
                        $Rand = mt_rand(1, $RatioSum);
                        $DispHtmlAB = '';
                        if ($RatioA < $RatioB) {
                            if ($Rand <= $RatioA) {
                                //Aを選択
                                $DispHtmlAB = stripslashes($Row['html_a']);
                            } else {
                                //Bを選択
                                $DispHtmlAB = stripslashes($Row['html_b']);
                            }
                        } else {
                            if ($Rand <= $RatioB) {
                                //Bを選択
                                $DispHtmlAB = stripslashes($Row['html_b']);
                            } else {
                                //Aを選択
                                $DispHtmlAB = stripslashes($Row['html_a']);
                            }
                        }
                        //debug
                        //$DispHtmlAB = 'rand:' . $Rand . '  ' . $DispHtmlAB;
                        //debug
                        if ($Row['top_more_bottom'] === 'top') {
                            $RetHtml = $DispHtmlAB . $RetHtml;
                        } elseif ($Row['top_more_bottom'] === 'more') {
                            $RetHtml = replace_more($RetHtml, $DispHtmlAB);
                        } elseif ($Row['top_more_bottom'] === 'bottom') {
                            $RetHtml = $RetHtml . $DispHtmlAB;
                        } else {
                            $RetHtml = $RetHtml . '<br />addfreespaceで何か変なことが起こっています！ addfreespace brokennnn!';
                        }
                    }
                }
            }
        }
    }
    return($RetHtml);
}

function replace_more($Honbun, $AdHtml) {
    $a = preg_replace(
            '/([.\n]*)(<span id="more-[0-9]+".*><\/span>)([.\n]*)/'
            , '${1}${2}' . $AdHtml . '${3}'
            , $Honbun
    );
    return($a);
}

?>
