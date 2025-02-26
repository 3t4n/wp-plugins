<?php

// Code highlinting Class
class aimatch_apcCode
{

    function printCode($code, $high_light = 0, $lines_number = 0)
    {
        if (!is_array($code)) $code = explode("\n", $code);

        $count_lines = count($code);

        foreach ($code as $line => $code_line) {

            if ($lines_number) $r1 = "<span class=\"lines_number\">".($line + 1)." </span>";

            if ($high_light) {
                if (ereg("<\?(php)?[^[:graph:]]", $code_line)) {
                    $r2 = highlight_string($code_line, 1)."<br />";
                } else {

                    $r2 = ereg_replace("(&lt;\?php&nbsp;)+", "", highlight_string("<?php ".$code_line, 1))."<br />";

                }
            } else {
                $r2 = (!$line) ? "<pre>" : "";
                $r2 .= htmlentities($code_line);
                $r2 .= ($line == ($count_lines - 1)) ? "<br /></pre>" : ""; 
            } 

            $r .= $r1.$r2;

        }

        echo "<div class=\"code\">".$r."</div>";
    }
}

function aimatch_apcPluginMenu() {

	$parent_slug = 'plugins.php';
	$page_title = 'aiMatch Platform Connection Plugin Options';
	$menu_title = 'aiMatch Platform Connection';
	$capability = 'manage_options';
	$menu_slug = 'aimatch-apc-adcall-plugin';
	$function = 'aimatch_apcPluginOptions';

	add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
}

function aimatch_apcPluginOptions() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}

	// Create aimatch_apcCode object
	$codeHighLight = new aimatch_apcCode();

	?>
	<div class="wrap">
	<h3>aiMatch Platform Connection Usage Info</h3>
	<p>Adding an aiMatch ad call to your wordpress site is pretty simple.</p>
	<h4>Usage</h4>
	<p>There are a couple of different ways to use the aiMatch Platform Connection plugin.</p>
	<p><strong>1. Basic function call method</strong></p>
	<p>Just add the following code to wherever on your site you would like the ad call to display.</p>
	<ul>
		<li><strong>adServer:</strong> http://youradserver.com (no trailing slashes)</li>
		<li><strong>shortName:</strong> aimatch shortname (no proceding or trailing slashes)</li>
		<li><strong>adCallType:</strong> hserver or jserver</li>
		<li><strong>targeting:</strong> site=yoursite/area=homepage (no proceding or traling slashes)</li>
		<li><strong>adSize:</strong> 300x250 (Optional unless using hserver adCallType)</li>
	</ul>

	<?php echo $codeHighLight->printCode('<?php aimatch_apc(\'adServer\', \'shortName\', \'adCallType\', \'targeting\', \'adSize\'); ?>',1,0); ?>

	<a href="./widgets.php"><p><strong>2. aiMatch Custom Widget</strong></p></a>
	<p>The aiMatch Platform Connection widget takes the same parameters as the basic function call, but without having to place the code on your page manually.</p>
	</div>
<?php }
?>
