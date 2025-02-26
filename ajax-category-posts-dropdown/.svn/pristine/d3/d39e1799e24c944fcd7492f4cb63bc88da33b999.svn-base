<? 
define( "WP_INSTALLING", true );
require ('../../../wp-blog-header.php');


if(isset($_GET['mainCats'])){
	
$postslist = get_posts('numberposts='.get_option(acpd_post_count).'&order=ASC&orderby=title&category='.$_GET['mainCats'].'');

echo "obj.options[obj.options.length] = new Option('Select a post','');\n";

	foreach ($postslist as $post) { 
	setup_postdata($post);
		
		if ( get_option('permalink_structure') != '' ) { //permalinks enabled' 
		echo "obj.options[obj.options.length] = new Option('".get_the_title()."','".get_permalink(get_the_ID())."');\n";
		}else{
		echo "obj.options[obj.options.length] = new Option('".get_the_title()."','index.php?p=".get_the_ID()."');\n";
		}
	}
}

?> 