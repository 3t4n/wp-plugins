<?php
/*
Plugin Name: Admin filter posts by year
Description: In your admin area, this plugin offers the avaibility of filter your posts by <strong>YEARS</strong> and not only by <strong>months of years</strong>.
Version: 2.4
Author: Gilles Dumas
Author URI: https://gillesdumas.com
*/

// require_once('debug.php');

$i_want_to_add_years_in_list_filter = true;
if ($i_want_to_add_years_in_list_filter == true) {
    add_filter('months_dropdown_results', 'admin_filter_posts_by_years_months_dropdown_results', 10, 2);
    add_action('admin_init', 'admin_filter_posts_by_years_init', 10);
}


/**
 * Modifier la liste de filtre par date, en ajoutant les ann�es en plus des mois par ann�es.
 * Par exemple on a $months = array() avec pour chaque entr�e un stdObject avec deux propri�t�s
 * year
 * month
 * et ici on va rajouter des entr�es avec
 * year  = yyyy
 * month = 00
 * 
 * @author Gilles Dumas <circusmind@gmail.com>
 * @since  20140501
 * @url    http://wphooks.info/filters/months_dropdown_results/
 */
function admin_filter_posts_by_years_months_dropdown_results($months, $post_type){

    $my_date_filter = array();
    foreach ($months as $obj_month) {
        if (!isset($my_date_filter[$obj_month->year])) {
            $my_date = new stdClass();
            $my_date->year  = $obj_month->year;
            $my_date->month = null;
            $my_date_filter[$obj_month->year] = $my_date;
            unset($my_date);
        }
    }
    ksort($my_date_filter); 
    foreach ($my_date_filter as $my_date_filter_item) {
        array_unshift($months, $my_date_filter_item);
    }
    return $months;
}


 
/**
 * Modifier la liste de filtre par date, en ajoutant les ann�es en plus des mois par ann�es.
 * par exemple on a $months = array() avec pour chaque entr�e un stdObject avec deux propri�t�s
 * year
 * month
 * et ici on va rajouter des entr�es avec
 * year  = yyyy
 * month = 00
 * 
 * @author Gilles Dumas <circusmind@gmail.com>
 * @since  20140501
 */
function admin_filter_posts_by_years_init($months){
    // // Ceci car si $_GET['m'] vaux 201400, on veut qu'il vaille : 2014
    // // (c'est yyyymm pour le filtre de date)
    if (isset($_GET['m'])) {
        $m = $_GET['m'];
        $fin = substr($m, strlen($m)-2, 2);
        if ($fin == '00') {
            $_GET['m'] = substr($m, 0, strlen($m)-2);
        }
    }
}


/**
 * javascript
 * @author Gilles Dumas <circusmind@gmail.com>
 * @since  20140501
 */
function gwp_admin_filter_posts_by_years_admin_head() {
    if (isset($_GET['m'])) {
        $m = $_GET['m'];
        if (strlen($m) == 4) {
            $m2 = $m . '00';
            ?>
            <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('body.edit-php select[name=m] option[value=<?php echo $m2; ?>]').prop('selected',true);
            });
            </script>
            <?php
        }
    }
}
add_action('admin_head', 'gwp_admin_filter_posts_by_years_admin_head', 10);




