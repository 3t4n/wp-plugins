<?php /*
Plugin Name: SiteCatalyst for WordPress
Plugin URI: http://plugins.svn.wordpress.org/omniture-sitecatalyst-tracking/
Version: 1.0
Author: Steph Powell
*/
    function omniture_tag() {
    ?>
<script type="text/javascript">
<!-- var s_account = 'omniture_account_id'; -->
</script>
<script type="text/javascript" src="/path/to/s_code.js"></script>
<script type="text/javascript"><!--
<?php
if(is_home()) { //Wordpress functionality to check if page is home page
$pageName = $channel = $pageType = $prop1 = 'Blog Home';
} elseif (is_page()) {
$pageName = $channel = the_title('', '', false);
$pageType = $prop1 = 'Static Page';
} elseif (is_single()) { //Wordpress functionality to check if page is article
$categories = get_the_category();
$pageName = $prop2 = the_title('', '', false);
        $channel = $categories[0]->name;
        $pageType = $prop1 = 'Article';
} elseif (is_category()) { //Wordpress functionality to check if page is category page
        $pageName = $channel = single_cat_title('', false);
        $pageName = 'Category: ' . $pageName;
$pageType = $prop1 = 'Category';
} elseif (is_tag()) { //Wordpress functionality to check if page is tag page
$pageName = $channel = single_tag_title('', false);
$pageType = $prop1 = 'Tag';
} elseif (is_month()) { //Wordpress functionality to check if page is month page
        list($month, $year) = split(' ', the_date('F Y', '', '', false));
$pageName = 'Month Archive: ' . $month . ' ' . $year;
$channel = $pageType = $prop1 = 'Month Archive';
$prop2 = $year;
$prop3 = $month;
}
echo "s.pageName = '$pageName' //page name\n";
echo "s.channel = '$channel' //channel\n";
echo "s.pageType = '$pageType' //page type\n";
echo "s.prop1 = '$prop1' //traffic variable 1\n";
echo "s.prop2 = '$prop2' //traffic variable 2\n";
echo "s.prop3 = '$prop3' //traffic variable 3\n";
?>
s.prop4= '' //traffic variable 4
s.prop5= '' //traffic variable 5
s.campaign= '' //campaign variable
s.state= '' //user state
s.zip= '' //user zip
s.events= '' //user events
s.products= '' //user products
s.purchaseID= '' //purchase ID
s.eVar1= '' //conversion variable 1
s.eVar2= '' //conversion variable 2
s.eVar3= '' //conversion variable 3
s.eVar4= '' //conversion variable 4
s.eVar5= '' //conversion variable 5
/************* DO NOT ALTER ANYTHING BELOW THIS LINE ! **************/
var s_code=s.t();if(s_code)document.write(s_code) //omniture variable
-->
</script>
<?php
    }
    add_action('wp_footer', 'omniture_tag');
?>
