<?php
/**
 * Admin menu
*/
if (!class_exists("ABCFAL_Admin_Menu")) {

    class ABCFAL_Admin_Menu {

    function __construct() {
        add_action( 'admin_menu', array (&$this, 'add_menu') );
    }

    function add_menu() {
        //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );dashicons-format-gallery
        add_menu_page('Andora Lightbox', 'Andora Lightbox', 'edit_pages', ABCFAL_MENU_SLUG, '', 'dashicons-search');

        //add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
        add_submenu_page(ABCFAL_MENU_SLUG, abcfal_txtbldr(1), abcfal_txtbldr(1), 'edit_pages', ABCFAL_MENU_SLUG, array(&$this, 'submenu_page'));
    }

//Add submenu page
function submenu_page() {
?>
<div class="wrap">
    <h2>
        Andora Lightbox - <?php echo(abcfal_txtbldr(1)) ?>
    </h2>
    <div class="ggclDocs"><?php echo(abcfal_txtbldr(1)) ?></a>
        <p><a href="http://abcfolio.com/help/andora-lightbox/">http://abcfolio.com/help/andora-lightbox/</a><p>
    </div>
</div>
<?php
        }
    }
}

$abcfggclpm = new ABCFAL_Admin_Menu();