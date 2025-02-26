<?php
/*
  Plugin Name: addfreespace
  Plugin URI: http://accountingse.net/2013/02/638/
  Description: 記事上下に自由な記述ができるフリースペースを加えることができます。You can add freespace.
  Version: 0.1.3
  Author: kazunii_ac
  Author URI: https://twitter.com/kazunii_ac
  License: GPL2
 */

/*  Copyright 2012 kazunii_ac (email : moskov@mcn.ne.jp)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

include_once ('addfreespace_functions.php');

define('ADDFREESPACE_DEBUG', false);

// 管理メニューのアクションフック
add_action('admin_menu', 'admin_menu_addfreespace');

// アクションフックのコールバッック関数
function admin_menu_addfreespace() {
    // 設定メニュー下にサブメニューを追加:
    add_options_page('addfreespace', 'addfreespace', 'manage_options', __FILE__, 'addfreespace');
}

function addfreespace() {
    global $SpritRowStr;
    global $SpritColStr;

    if (!empty($_POST['submit'])) {
        save_values_not_widget();
    }
    $Arr = get_option('addfreespace_not_widget');
    $Arr = addfreespace_creanup_slashes($Arr);
    ?>

    <div id="addfreespace_wrap">
        <h1 id="disp_mytitle">addfreespace</h1>
        <span class="explain_addfreespace"></span>
        <form action="<?php echo home_url() ?>/wp-admin/options-general.php?page=addfreespace/addfreespace.php" method="post">
            <div id="addfreespace_simple_wrap" style="padding-bottom:12px;border-bottom:solid 3px #000000;">
                <h2>simple setting</h2>
                <div style="margin:5px;">
                    <a class="button LangJaBtn">日本語</a>
                    <a class="button LangEnBtn">English</a>
                </div>
                <div class="explain_priority"></div>
                <table style="font-size: 12px !important;border:1px #AAAAAA solid;margin-bottom: 6px;">
                    <thead>
                        <tr>
                            <td id="table_head_0"></td>
                            <td id="table_head_1"></td>
                            <td id="table_head_2" style="display:none;"></td>
                            <td id="table_head_3"></td>
                            <td id="table_head_4"></td>
                            <td id="table_head_5"></td>
                            <td id="table_head_6"></td>
                        </tr>
                    </thead>
                    <tbody id="addfreespace_simple_tablebody">
                        <?php
                        if (!empty($Arr['simple'])) {
                            echo ret_row_simple($Arr['simple']);
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" name="submit" class="btn_submit button button-primary" value="">
                <a class="button" id="btn_addrow_simple"></a>
            </div><!--/addfreespace_simple_wrap-->
            <div id="addfreespace_ab_wrap">
                <h2>A/B test setting</h2>
                <div style="margin:5px;">
                    <a class="button LangJaBtn">日本語</a>
                    <a class="button LangEnBtn">English</a>
                </div>
                <div id="explain_ab_test" style="margin-bottom:8px;"></div>
                <div class="explain_priority"></div>
                <table style="font-size: 12px !important;border:1px #AAAAAA solid !important;margin-bottom: 6px;">
                    <thead>
                        <tr>
                            <td id="table_head_ab_0"></td>
                            <td id="table_head_ab_1"></td>
                            <td id="table_head_ab_2" style="display:none;"></td>
                            <td id="table_head_ab_3"></td>
                            <td id="table_head_ab_4"></td>
                            <td id="table_head_ab_5"></td>
                            <td id="table_head_ab_6"></td>
                        </tr>
                    </thead>
                    <tbody id="addfreespace_ab_tablebody">
                        <?php
                        if (!empty($Arr['ab'])) {
                            echo ret_row_ab($Arr['ab']);
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" name="submit" class="btn_submit button button-primary" value="">
                <a class="button" id="btn_addrow_ab"></a>
            </div><!--/addfreespace_ab_wrap-->
        </form>
    </div>
    <div id="consts"<?php echo (ADDFREESPACE_DEBUG ? '' : ' style="display:none;"' ) ?>>
        <div id="Lang"><?php echo get_locale() ?></div>
    </div>
    <div id="addfreespace_footer">
        <div id="urikomi">
        </div>
        <div id="addfreespace_createdby">
            created by 
            <a href="https://twitter.com/kazunii_ac" target="_blank">
                @kazunii_ac
            </a>
        </div>
    </div>
    <?php
}

if (is_admin()) {
    wp_enqueue_script('jquery');
    wp_enqueue_script('addfreespace_func1', plugins_url() . '/addfreespace/addfreespace_functions.js');
    wp_enqueue_script('addfreespace_func2', plugins_url() . '/addfreespace/addfreespace_const.js');
    wp_enqueue_script('addfreespace_func3', plugins_url() . '/addfreespace/jquery.numeric.js');
    wp_enqueue_style('addfreespace_css', plugins_url() . '/addfreespace/addfreespace.css');
} else {
    add_filter('the_content', 'ret_strings_10', 10);
    add_filter('the_content', 'ret_strings_11', 11);
    add_filter('the_content', 'ret_strings_12', 12);
    add_filter('the_content', 'ret_strings_13', 13);
    add_filter('the_content', 'ret_strings_14', 14);
    add_filter('the_content', 'ret_strings_15', 15);
    add_filter('the_content', 'ret_strings_16', 16);
    add_filter('the_content', 'ret_strings_17', 17);
    add_filter('the_content', 'ret_strings_18', 18);
    add_filter('the_content', 'ret_strings_19', 19);
    add_filter('the_content', 'ret_strings_20', 20);
    add_filter('the_content', 'ret_strings_100', 100);
    add_filter('the_content', 'ret_strings_200', 200);
    add_filter('the_content', 'ret_strings_300', 300);
    add_filter('the_content', 'ret_strings_400', 400);
    add_filter('the_content', 'ret_strings_500', 500);
    add_filter('the_content', 'ret_strings_1000', 1000);
    add_filter('the_content', 'ret_strings_10000', 10000);
    add_filter('the_content', 'ret_strings_100000', 100000);
}

function ret_strings_10($Honbun) {
    return(ret_strings($Honbun, 10));
}

function ret_strings_11($Honbun) {
    return(ret_strings($Honbun, 11));
}

function ret_strings_12($Honbun) {
    return(ret_strings($Honbun, 12));
}

function ret_strings_13($Honbun) {
    return(ret_strings($Honbun, 13));
}

function ret_strings_14($Honbun) {
    return(ret_strings($Honbun, 14));
}

function ret_strings_15($Honbun) {
    return(ret_strings($Honbun, 15));
}

function ret_strings_16($Honbun) {
    return(ret_strings($Honbun, 16));
}

function ret_strings_17($Honbun) {
    return(ret_strings($Honbun, 17));
}

function ret_strings_18($Honbun) {
    return(ret_strings($Honbun, 18));
}

function ret_strings_19($Honbun) {
    return(ret_strings($Honbun, 19));
}

function ret_strings_20($Honbun) {
    return(ret_strings($Honbun, 20));
}

function ret_strings_100($Honbun) {
    return(ret_strings($Honbun, 100));
}

function ret_strings_200($Honbun) {
    return(ret_strings($Honbun, 200));
}

function ret_strings_300($Honbun) {
    return(ret_strings($Honbun, 300));
}

function ret_strings_400($Honbun) {
    return(ret_strings($Honbun, 400));
}

function ret_strings_500($Honbun) {
    return(ret_strings($Honbun, 500));
}

function ret_strings_1000($Honbun) {
    return(ret_strings($Honbun, 1000));
}

function ret_strings_10000($Honbun) {
    return(ret_strings($Honbun, 10000));
}

function ret_strings_100000($Honbun) {
    return(ret_strings($Honbun, 100000));
}

function addfreespace_creanup_slashes($Arr) {
    $RetArr = array();
    if (!empty($Arr['simple'])) {
        foreach ($Arr['simple'] as $Row) {
            $Row['html'] = stripslashes($Row['html']);
            $RetArr['simple'][] = $Row;
        }
    }
    if (!empty($Arr['ab'])) {
        foreach ($Arr['ab'] as $Row) {
            $Row['html_a'] = stripslashes($Row['html_a']);
            $Row['html_b'] = stripslashes($Row['html_b']);
            $RetArr['ab'][] = $Row;
        }
    }
    return($RetArr);
}

function ret_row_simple($Arr) {  //['simple']を全部受け取る
    $i = 1;
    $RetHtml = '';
    foreach ($Arr as $Row) {
        $RetHtml .= '<tr class="row' . $i . '">';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <SELECT name="row' . $i . '_is_mobile_simple">';
        $RetHtml .= '            <OPTION value="all" class="select_is_mobile_all"' . ( $Row['is_mobile'] == 'all' ? ' selected="selected"' : '' ) . '>all</OPTION>';
        $RetHtml .= '            <OPTION value="pc" class="select_is_mobile_pc"' . ( $Row['is_mobile'] == 'pc' ? ' selected="selected"' : '' ) . '>PC</OPTION>';
        $RetHtml .= '            <OPTION value="mobile" class="select_is_mobile_mobile"' . ( $Row['is_mobile'] == 'mobile' ? ' selected="selected"' : '' ) . '>mobile</OPTION>';
        $RetHtml .= '        </SELECT>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <input type="checkbox" name="row' . $i . '_disp_post_simple" value="1" id="row' . $i . '_post_simple"' . ( $Row['displaypage']['post'] == '1' ? ' checked="checked"' : '' ) . '>';
        $RetHtml .= '        <label for="row' . $i . '_post_simple" class="label_of_post">単一投稿</label><br />';
        $RetHtml .= '        <input type="checkbox" name="row' . $i . '_disp_page_simple" value="1" id="row' . $i . '_page_simple"' . ( $Row['displaypage']['page'] == '1' ? ' checked="checked"' : '' ) . '>';
        $RetHtml .= '        <label for="row' . $i . '_page_simple" class="label_of_page">単一ページ</label><br />';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td style="display:none;">';    //本文のみ
        $RetHtml .= '        <SELECT name="row' . $i . '_title_content_simple">';
        $RetHtml .= '            <OPTION value="title" class="select_tc_title">title</OPTION>';
        $RetHtml .= '            <OPTION value="content" class="select_tc_content" selected="selected">content</OPTION>';
        $RetHtml .= '        </SELECT>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <SELECT name="row' . $i . '_top_more_bottom_simple">';
        $RetHtml .= '            <OPTION value="top" class="select_tbm_upper"' . ( $Row['top_more_bottom'] == 'top' ? ' selected="selected"' : '' ) . '>top</OPTION>';
        $RetHtml .= '            <OPTION value="more" class="select_tbm_more"' . ( $Row['top_more_bottom'] == 'more' ? ' selected="selected"' : '' ) . '>&lt;!-- more --&gt;</OPTION>';
        $RetHtml .= '            <OPTION value="bottom" class="select_tbm_lower"' . ( $Row['top_more_bottom'] == 'bottom' ? ' selected="selected"' : '' ) . '>bottom</OPTION>';
        $RetHtml .= '        </SELECT>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <SELECT name="row' . $i . '_priority_simple">';
        $RetHtml .= '            <OPTION value="10"' . ( $Row['priority'] == 10 ? ' selected="selected"' : '' ) . '>10</OPTION>';
        $RetHtml .= '            <OPTION value="11"' . ( $Row['priority'] == 11 ? ' selected="selected"' : '' ) . '>11</OPTION>';
        $RetHtml .= '            <OPTION value="12"' . ( $Row['priority'] == 12 ? ' selected="selected"' : '' ) . '>12</OPTION>';
        $RetHtml .= '            <OPTION value="13"' . ( $Row['priority'] == 13 ? ' selected="selected"' : '' ) . '>13</OPTION>';
        $RetHtml .= '            <OPTION value="14"' . ( $Row['priority'] == 14 ? ' selected="selected"' : '' ) . '>14</OPTION>';
        $RetHtml .= '            <OPTION value="15"' . ( $Row['priority'] == 15 ? ' selected="selected"' : '' ) . '>15</OPTION>';
        $RetHtml .= '            <OPTION value="16"' . ( $Row['priority'] == 16 ? ' selected="selected"' : '' ) . '>16</OPTION>';
        $RetHtml .= '            <OPTION value="17"' . ( $Row['priority'] == 17 ? ' selected="selected"' : '' ) . '>17</OPTION>';
        $RetHtml .= '            <OPTION value="18"' . ( $Row['priority'] == 18 ? ' selected="selected"' : '' ) . '>18</OPTION>';
        $RetHtml .= '            <OPTION value="19"' . ( $Row['priority'] == 19 ? ' selected="selected"' : '' ) . '>19</OPTION>';
        $RetHtml .= '            <OPTION value="20"' . ( $Row['priority'] == 20 ? ' selected="selected"' : '' ) . '>20</OPTION>';
        $RetHtml .= '            <OPTION value="100"' . ( $Row['priority'] == 100 ? ' selected="selected"' : '' ) . '>100</OPTION>';
        $RetHtml .= '            <OPTION value="200"' . ( $Row['priority'] == 200 ? ' selected="selected"' : '' ) . '>200</OPTION>';
        $RetHtml .= '            <OPTION value="300"' . ( $Row['priority'] == 300 ? ' selected="selected"' : '' ) . '>300</OPTION>';
        $RetHtml .= '            <OPTION value="400"' . ( $Row['priority'] == 400 ? ' selected="selected"' : '' ) . '>400</OPTION>';
        $RetHtml .= '            <OPTION value="500"' . ( $Row['priority'] == 500 ? ' selected="selected"' : '' ) . '>500</OPTION>';
        $RetHtml .= '            <OPTION value="1000"' . ( $Row['priority'] == 1000 ? ' selected="selected"' : '' ) . '>1000</OPTION>';
        $RetHtml .= '            <OPTION value="10000"' . ( $Row['priority'] == 10000 ? ' selected="selected"' : '' ) . '>10000</OPTION>';
        $RetHtml .= '            <OPTION value="100000"' . ( $Row['priority'] == 100000 ? ' selected="selected"' : '' ) . '>100000</OPTION>';
        $RetHtml .= '        </SELECT>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <textarea type="textarea" cols="60" rows="10" name="row' . $i . '_html_simple">' . $Row['html'] . '</textarea>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <input type="checkbox" name="row' . $i . '_delete_simple" id="row' . $i . '_delete_simple" value="1">';
        $RetHtml .= '        <label for="row' . $i . '_delete_simple" class="del_label">削除</label><br />';
        $RetHtml .= '    </td>';
        $RetHtml .= '</tr>';
        $i++;
    }
    return($RetHtml);
}

function ret_row_ab($Arr) {  //['simple']を全部受け取る
    $i = 1;
    $RetHtml = '';
    foreach ($Arr as $Row) {
        $RetHtml .= '<tr class="row' . $i . '">';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <SELECT name="row' . $i . '_is_mobile_ab">';
        $RetHtml .= '            <OPTION value="all" class="select_is_mobile_all"' . ( $Row['is_mobile'] == 'all' ? ' selected="selected"' : '' ) . '>all</OPTION>';
        $RetHtml .= '            <OPTION value="pc" class="select_is_mobile_pc"' . ( $Row['is_mobile'] == 'pc' ? ' selected="selected"' : '' ) . '>PC</OPTION>';
        $RetHtml .= '            <OPTION value="mobile" class="select_is_mobile_mobile"' . ( $Row['is_mobile'] == 'mobile' ? ' selected="selected"' : '' ) . '>mobile</OPTION>';
        $RetHtml .= '        </SELECT>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <input type="checkbox" name="row' . $i . '_disp_post_ab" value="1" id="row' . $i . '_post_ab"' . ( $Row['displaypage']['post'] == '1' ? ' checked="checked"' : '' ) . '>';
        $RetHtml .= '        <label for="row' . $i . '_post_ab" class="label_of_post">単一投稿</label><br />';
        $RetHtml .= '        <input type="checkbox" name="row' . $i . '_disp_page_ab" value="1" id="row' . $i . '_page_ab"' . ( $Row['displaypage']['page'] == '1' ? ' checked="checked"' : '' ) . '>';
        $RetHtml .= '        <label for="row' . $i . '_page_ab" class="label_of_page">単一ページ</label><br />';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td style="display:none;">';    //本文のみ
        $RetHtml .= '        <SELECT name="row' . $i . '_title_content_ab">';
        $RetHtml .= '            <OPTION value="title" class="select_tc_title">title</OPTION>';
        $RetHtml .= '            <OPTION value="content" class="select_tc_content" selected="selected">content</OPTION>';
        $RetHtml .= '        </SELECT>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <SELECT name="row' . $i . '_top_more_bottom_ab">';
        $RetHtml .= '            <OPTION value="top" class="select_tbm_upper"' . ( $Row['top_more_bottom'] == 'top' ? ' selected="selected"' : '' ) . '>top</OPTION>';
        $RetHtml .= '            <OPTION value="more" class="select_tbm_more"' . ( $Row['top_more_bottom'] == 'more' ? ' selected="selected"' : '' ) . '>&lt;!-- more --&gt;</OPTION>';
        $RetHtml .= '            <OPTION value="bottom" class="select_tbm_lower"' . ( $Row['top_more_bottom'] == 'bottom' ? ' selected="selected"' : '' ) . '>bottom</OPTION>';
        $RetHtml .= '        </SELECT>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <SELECT name="row' . $i . '_priority_ab">';
        $RetHtml .= '            <OPTION value="10"' . ( $Row['priority'] == 10 ? ' selected="selected"' : '' ) . '>10</OPTION>';
        $RetHtml .= '            <OPTION value="11"' . ( $Row['priority'] == 11 ? ' selected="selected"' : '' ) . '>11</OPTION>';
        $RetHtml .= '            <OPTION value="12"' . ( $Row['priority'] == 12 ? ' selected="selected"' : '' ) . '>12</OPTION>';
        $RetHtml .= '            <OPTION value="13"' . ( $Row['priority'] == 13 ? ' selected="selected"' : '' ) . '>13</OPTION>';
        $RetHtml .= '            <OPTION value="14"' . ( $Row['priority'] == 14 ? ' selected="selected"' : '' ) . '>14</OPTION>';
        $RetHtml .= '            <OPTION value="15"' . ( $Row['priority'] == 15 ? ' selected="selected"' : '' ) . '>15</OPTION>';
        $RetHtml .= '            <OPTION value="16"' . ( $Row['priority'] == 16 ? ' selected="selected"' : '' ) . '>16</OPTION>';
        $RetHtml .= '            <OPTION value="17"' . ( $Row['priority'] == 17 ? ' selected="selected"' : '' ) . '>17</OPTION>';
        $RetHtml .= '            <OPTION value="18"' . ( $Row['priority'] == 18 ? ' selected="selected"' : '' ) . '>18</OPTION>';
        $RetHtml .= '            <OPTION value="19"' . ( $Row['priority'] == 19 ? ' selected="selected"' : '' ) . '>19</OPTION>';
        $RetHtml .= '            <OPTION value="20"' . ( $Row['priority'] == 20 ? ' selected="selected"' : '' ) . '>20</OPTION>';
        $RetHtml .= '            <OPTION value="100"' . ( $Row['priority'] == 100 ? ' selected="selected"' : '' ) . '>100</OPTION>';
        $RetHtml .= '            <OPTION value="200"' . ( $Row['priority'] == 200 ? ' selected="selected"' : '' ) . '>200</OPTION>';
        $RetHtml .= '            <OPTION value="300"' . ( $Row['priority'] == 300 ? ' selected="selected"' : '' ) . '>300</OPTION>';
        $RetHtml .= '            <OPTION value="400"' . ( $Row['priority'] == 400 ? ' selected="selected"' : '' ) . '>400</OPTION>';
        $RetHtml .= '            <OPTION value="500"' . ( $Row['priority'] == 500 ? ' selected="selected"' : '' ) . '>500</OPTION>';
        $RetHtml .= '            <OPTION value="1000"' . ( $Row['priority'] == 1000 ? ' selected="selected"' : '' ) . '>1000</OPTION>';
        $RetHtml .= '            <OPTION value="10000"' . ( $Row['priority'] == 10000 ? ' selected="selected"' : '' ) . '>10000</OPTION>';
        $RetHtml .= '            <OPTION value="100000"' . ( $Row['priority'] == 100000 ? ' selected="selected"' : '' ) . '>100000</OPTION>';
        $RetHtml .= '        </SELECT>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <div style="float:left">';
        $RetHtml .= '            Pattern A<br />';
        $RetHtml .= '            <textarea type="textarea" cols="30" rows="10" name="row' . $i . '_html_ab_a">' . $Row['html_a'] . '</textarea><br />';
        $RetHtml .= '            <span class="ratio"></span>：<input class="positive-integer" type="text" size="5" name="row' . $i . '_ratio_ab_a" value="' . $Row['ratio_a'] . '">';
        $RetHtml .= '        </div>';
        $RetHtml .= '        <div style="float:left">';
        $RetHtml .= '            Pattern B<br />';
        $RetHtml .= '            <textarea type="textarea" cols="30" rows="10" name="row' . $i . '_html_ab_b">' . $Row['html_b'] . '</textarea><br />';
        $RetHtml .= '            <span class="ratio"></span>：<input class="positive-integer" type="text" size="5" name="row' . $i . '_ratio_ab_b" value="' . $Row['ratio_b'] . '">';
        $RetHtml .= '        </div>';
        $RetHtml .= '        <div style="clear:both;"></div>';
        $RetHtml .= '    </td>';
        $RetHtml .= '    <td>';
        $RetHtml .= '        <input type="checkbox" name="row' . $i . '_delete_ab" id="row' . $i . '_delete_ab" value="1">';
        $RetHtml .= '        <label for="row' . $i . '_delete_ab" class="del_label">削除</label><br />';
        $RetHtml .= '    </td>';
        $RetHtml .= '</tr>';
        $i++;
    }
    return($RetHtml);
}
?>