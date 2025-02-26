<?php
class waruk_adminDashboard {
				function __construct() {
	add_action( 'admin_menu', array($this, 'add_menu_page'));
add_action( 'admin_init', array($this, 'admin_init'));
add_action( 'admin_notices', array($this, 'waruk_demo_notice') );
}
public function add_menu_page () {
	add_options_page("Árukereső beállításai", "Árukereső", "manage_options", "arukereso", array($this, "settings_frontend"));
		}
		public function settings_frontend () {
		?>
		<div class ="wrap">
		<h2>Árukereső és Árgép beállításai</h2>
		<p>ahhoz, hogy megjelenjünk az Árukereső listájában, regisztrálni kell cégünket oldalukon. <a target ="_blank" href ="http://www.arukereso.hu/admin/">Bővebb információk a regisztráció menetéről</a>
		<p>Árgéphez történő regisztrációhoz bővebb információk itt olvashatóak: <a target ="_blank" href ="http://www.argep.hu/content_reszvetel.html">Árgép vásárlói tájékoztató</a>
			<p>Olcsobbathoz történő regisztrációhoz bővebb információk itt olvashatóak: <a target ="_blank" href ="https://partnerportal.olcsobbat.hu/static/erdeklodoknek">Olcsobbat vásárlói tájékoztató</a>
<p>Sikeres regisztráció után meg kell adnunk azt az url-t, ahol a termékeink elérhetőek. Ez az alábbi cím: 
<p>Árukereső: 
		<?php
		echo get_feed_link("arukereso");
				?>
				<p>Árgép: 
				<?php
		echo get_feed_link("argep");
								?>
								<p>Olcsobbat: 
				<?php
		echo get_feed_link("olcsobbat");
								?>
						<form method="post" action="admin-post.php">
		<input type="hidden" name="action" value="save_waruk_options" />
<?php wp_nonce_field( 'Waruk' ); ?>

		<table class="form-table">
			<tr valign="top">
		<th scope="row"><label for ="waruk_hide_default">Összes termék alapértelmezett kizárása az Árukereső xml feed-ből</label></th>
		<td><input type="checkbox" name="waruk_hide_default" id ="waruk_hide_default" value="1" <?php print ( get_option('waruk_hide_default') ==1 ? "checked" : "");?> /></td>
	</tr>
		<tr valign="top">
		<th scope="row"><label for ="waruk_shipping_cost">Alapértelmezett szállítási költség</label></th>
		<td><input type="text" name="waruk_shipping_cost" id ="waruk_shipping_cost" value="<?php echo esc_attr( get_option('waruk_shipping_cost') );?>" /></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for ="waruk_shipping_time">Alapértelmezett szállítási idő (napokban megadva)</label></th>
		<td><input type="text" name="waruk_shipping_time" id ="waruk_shipping_time" value="<?php echo esc_attr( get_option('waruk_shipping_time') );?>" /></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for ="waruk_shipping_max_free">Összeghatár fölötti kiszállítás ingyenes</label></th>
		<td><input type="text" name="waruk_shipping_max_free" id ="waruk_shipping_max_free" value="<?php echo esc_attr( get_option('waruk_shipping_max_free') );?>" /></td>
	</tr>
	<tr valign="top">
		<th scope="row"><label for ="waruk_webapikey"><?php _e("Árukereső Web API kulcs (megbízható bolt program használata esetén)", "woo-arukereso");?></label></th>
		<td><input type="text" name="waruk_webapikey" id ="waruk_webapikey" value="<?php echo esc_attr( get_option('waruk_webapikey') );?>" /></td>
	</tr>
	</table>
	<?php submit_button();?>
	</form>
		<?php
print "</div>";
				}
						public function admin_init() {
	add_action( 'admin_post_save_waruk_options', array($this, 'process_waruk_options'));
}
public function process_waruk_options (){
	if ( !current_user_can( 'manage_options' ) ) {
wp_die( 'Not allowed' );
	}
check_admin_referer( 'Waruk' );
update_option("waruk_hide_default", (isset($_POST["waruk_hide_default"]) ? sanitize_text_field($_POST["waruk_hide_default"]) :""));
	update_option("waruk_shipping_cost", sanitize_text_field($_POST["waruk_shipping_cost"]));
update_option("waruk_shipping_time", sanitize_text_field($_POST["waruk_shipping_time"]));
update_option("waruk_shipping_max_free", sanitize_text_field($_POST["waruk_shipping_max_free"]));
update_option('waruk_webapikey', $_POST["waruk_webapikey"]);
		wp_redirect( add_query_arg( 'page', 'arukereso', admin_url( 'options-general.php' ) ) );
}
			public function waruk_demo_notice() {
						print '    <div class="error notice">Jelenleg az Árukereső for WooCommerce ingyenes verzióját használjuk, ami csak az első 50 egyszerű típusú terméket adja át az Árukeresőnek. Amennyiben többet szeretnénk, nézzük meg a <a target ="_blank" href ="https://bitron.hu/arukereso-for-woocommerce/">Prémium verzió lehetőségeit!</a></div>';
						}
}
new waruk_adminDashboard();