<style>
#icon-ap-ikon {
	background: transparent url('<?php echo plugins_url('/gambar/ap-32.png', __FILE__); ?>') no-repeat;
}
</style>		
<?php
if (function_exists('screen_icon')) {
		screen_icon( 'ap-ikon' );
	}
?>
<style>
table#kronlis {
    background-color:#FFFFFF;    
    width: 100%;
 }
 table#kronlis td {
    padding: 5px;
 }
 .toprow {
    font-style: italic;
    text-align: center;
    background-color: #FFFFCC;
}
 .senter {
 text-align: center;
 }
</style>					
<div class="wrap">	
	<h2><?php _e( 'Campaign - '.AP_NAME );?></h2>

	<div id="poststuff" class="metabox-holder has-right-sidebar">
				<div id="info" class="postbox">
					<h3 class="handle"><?php _e( 'Saved Campaign' );?></h3>
						<div class="inside">
						<?php 
global $wpdb;
$tabeljadwal = $wpdb->prefix . "jadwal_acara";

$dbumum = get_option('ap_dbumum');
$dboraumum = get_option('ap_dboraumum');
$dbasstag = get_option('ap_dbasstag');
$dbwilayah = get_option('ap_dbwilayah');
$dbjudul = '^title^';
$dbtempletpos = get_option('ap_dbtempletpos');
$dbbacalagi = get_option('ap_dbbacalagi');
update_option('ap_tmb', 'Save'); // buka pertama <----------------------
if($_POST['simpenpos'])
{
	if ($_POST['simpenpos'] == 'Save' && !empty($_POST['ap_dbnama']) && !empty($_POST['ap_dbsindex']) && !empty($_POST['ap_dbnodeid']) && 
		!empty($_POST['ap_dbkategori']) && !empty($_POST['ap_dbjudul']) && !empty($_POST['ap_dbtempletpos']))
	{
		$dbwilayah = get_option('ap_dbwilayah');
		$dbnama = sanitize_text_field($_POST['ap_dbnama']);
		$dbsindex = $_POST['ap_dbsindex'];
		$dbnodeid = $_POST['ap_dbnodeid'];
		$dbkategori = $_POST['ap_dbkategori'];
		$dbjudul = sanitize_text_field($_POST['ap_dbjudul']);
		$dbtempletpos = wp_rel_nofollow( $_POST['ap_dbtempletpos'] );
		$dbbacalagi = $_POST['ap_dbbacalagi'];
		//$dbtags = $_POST['ap_dbtags'];
		$dbpin = uniqid (mt_rand(), true);			
		$pecahkategori = preg_split('/(\r?\n)+/', $dbkategori);
		foreach ($pecahkategori as $lanang => $wadon) {
			if (strpos($wadon, '][') === false){
			$katid = wp_create_category($wadon);
			//$katidkumpul = array($katid);
			}else{
			$subkat = explode('][', $wadon);
			wp_create_category($subkat[0]);
			$katid = wp_create_category($subkat[1], get_cat_ID($subkat[0]));
			}
			$katide[] .= $katid;
			$katids = implode('-', $katide);
		}
		$kunci = array(nama, indekcari, nodeid, kategori, judul, templetpos, bacalagi, katids, pin);
		$gembok = array($dbnama, $dbsindex, $dbnodeid, $dbkategori, $dbjudul, $dbtempletpos, $dbbacalagi, $katids, $dbpin);
		$gabung = array_combine($kunci, $gembok);
		$wpdb->insert( $tabeljadwal, $gabung, array( '%s' ) );
		$id = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM " . $tabeljadwal . " WHERE pin = %s", $dbpin) );
		update_option('ap_id', $id);
		update_option('ap_tmb', 'Update');
		echo '<div class="updated"><p><strong>' . stripslashes($dbnama) . __('</strong> successfully saved.') . '</p></div>';
	}elseif ($_POST['simpenpos'] == 'Save') {
		$dbwilayah = get_option('ap_dbwilayah');
		$dbnama = sanitize_text_field($_POST['ap_dbnama']);
		$dbsindex = $_POST['ap_dbsindex'];
		$dbnodeid = $_POST['ap_dbnodeid'];
		$dbkategori = $_POST['ap_dbkategori'];
		$dbjudul = sanitize_text_field($_POST['ap_dbjudul']);
		$dbtempletpos = wp_rel_nofollow( $_POST['ap_dbtempletpos'] );
		$dbbacalagi = $_POST['ap_dbbacalagi'];
		//$dbtags = $_POST['ap_dbtags'];
		echo '<div class="error"><p>' . __('All fields are requeried!') . '</p></div>';
		update_option('ap_tmb', 'Save');
	}
	if ($_POST['simpenpos'] == 'Update' && !empty($_POST['ap_dbnama']) && !empty($_POST['ap_dbsindex']) && !empty($_POST['ap_dbnodeid']) && 
		!empty($_POST['ap_dbkategori']) && !empty($_POST['ap_dbjudul']) && !empty($_POST['ap_dbtempletpos']))
	{
		$id = get_option('ap_id');
		$dbwilayah = get_option('ap_dbwilayah');
		$dbnama = sanitize_text_field($_POST['ap_dbnama']);
		$dbsindex = $_POST['ap_dbsindex'];
		$dbnodeid = $_POST['ap_dbnodeid'];
		$dbkategori = $_POST['ap_dbkategori'];
		$dbjudul = sanitize_text_field($_POST['ap_dbjudul']);
		$dbtempletpos = wp_rel_nofollow( $_POST['ap_dbtempletpos'] );
		$dbbacalagi = $_POST['ap_dbbacalagi'];
		//$dbtags = $_POST['ap_dbtags'];			
		$pecahkategori = preg_split('/(\r?\n)+/', $dbkategori);
		foreach ($pecahkategori as $lanang => $wadon) {
			if (strpos($wadon, '][') === false){
			$katid = wp_create_category($wadon);
			}else{
			$subkat = explode('][', $wadon);
			wp_create_category($subkat[0]);
			$katid = wp_create_category($subkat[1], get_cat_ID($subkat[0]));
			}
			$katide[] .= $katid;
			$katids = implode('-', $katide);
		}
		$kunci = array(nama, indekcari, nodeid, kategori, judul, templetpos, bacalagi, katids);
		$gembok = array($dbnama, $dbsindex, $dbnodeid, $dbkategori, $dbjudul, $dbtempletpos, $dbbacalagi, $katids);
		$gabung = array_combine($kunci, $gembok);
		$wpdb->update( $tabeljadwal, $gabung, array ( 'id' => $id ), array( '%s' ), array( '%d' ) );
		echo '<div class="updated"><p><strong>' . stripslashes($dbnama) . __('</strong> successfully updated.') . '</p></div>';
		update_option('ap_tmb', 'Update');
	}elseif ($_POST['simpenpos'] == 'Update') {
		$dbwilayah = get_option('ap_dbwilayah');
		$dbnama = sanitize_text_field($_POST['ap_dbnama']);
		$dbsindex = $_POST['ap_dbsindex'];
		$dbnodeid = $_POST['ap_dbnodeid'];
		$dbkategori = $_POST['ap_dbkategori'];
		$dbjudul = sanitize_text_field($_POST['ap_dbjudul']);
		$dbtempletpos = wp_rel_nofollow( $_POST['ap_dbtempletpos'] );
		$dbbacalagi = $_POST['ap_dbbacalagi'];
		//$dbtags = $_POST['ap_dbtags'];
		echo '<div class="error"><p>' . __('Sorry, nothing saved.') . '</p></div>';
		update_option('ap_tmb', 'Update');
	}
}elseif($_POST['resetpos']) {
	$dbwilayah = get_option('ap_dbwilayah');
	$dbnama = '';
	$dbsindex = '';
	$dbnodeid = '';
	$dbkategori = '';
	$dbjudul = '^title^';
	$dbtempletpos = get_option('ap_dbtempletpos');
	$dbbacalagi = get_option('ap_dbbacalagi');
	echo '<div class="updated"><p>' . __('Ready to create a new campaign.') . '</p></div>';
	update_option('ap_tmb', 'Save');
}elseif($_POST['editpos'] || $_POST['kopipos']) {
	$dbwilayah = get_option('ap_dbwilayah');
	$id = $_POST['editpos_hidden'];
	update_option('ap_id', $id);
	$jupri = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . $tabeljadwal . " WHERE id = %d", $id) );
	foreach($jupri as $joe) {
		$id = $joe->id;
		$dbnama = $joe->nama;
		$dbsindex = $joe->indekcari;
		$dbnodeid = $joe->nodeid;
		$dbkategori = $joe->kategori;
		$dbjudul = $joe->judul;
		$dbtempletpos = $joe->templetpos;
		$dbbacalagi = $joe->bacalagi;
		//$dbtags = $joe->tags;
	}
	if ($_POST['editpos']){update_option('ap_tmb', 'Update');
		echo '<div class="updated"><p>' . __('Ready to editing <strong>') . stripslashes($dbnama) . '</strong>.</p></div>';
	}elseif ($_POST['kopipos']){update_option('ap_tmb', 'Save');
		echo '<div class="updated"><p>' . __('Ready to copy <strong>') . stripslashes($dbnama) . '</strong>.</p></div>';
		$dbnama = 'Copy of ' . stripslashes($dbnama);}
}elseif($_POST['deletpos']) {
	$dbwilayah = get_option('ap_dbwilayah');
	$id = $_POST['editpos_hidden'];
	$nama = $wpdb->get_var( $wpdb->prepare( "SELECT nama FROM " . $tabeljadwal . " WHERE id = %d", $id) );
	$wpdb->query( $wpdb->prepare("DELETE FROM " . $tabeljadwal . " WHERE ID = %d", $id) );
	$dbnama = '';
	$dbsindex = '';
	$dbnodeid = '';
	$dbkategori = '';
	$dbjudul = '^title^';
	$dbtempletpos = get_option('ap_dbtempletpos');
	$dbbacalagi = get_option('ap_dbbacalagi');
	echo '<div class="updated"><p><strong>' . stripslashes($nama) . __('</strong> was successfully deleted.') . '</p></div>';
	update_option('ap_tmb', 'Save');
}			
		$jadwal = $wpdb->get_results( "SELECT * FROM " . $tabeljadwal );
		if (empty($jadwal)){
		_e( '<p align="center"><strong>You don\'t have any campaign yet, fill the form below to create campaign.</strong></p>
					<p align="center"><script type="text/javascript"><!--
						google_ad_client = "ca-pub-8063998966056079";
						/* carpaits 728x90, created 3/17/11 */
						google_ad_slot = "4383680730";
						google_ad_width = 728;
						google_ad_height = 90;
						//-->
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
					</script></p>
					<p align="center"><dfn>If you have question, feedback, something you concern about, or maybe just say hello..:) please feel free to contact me.</dfn></p>' );
			}else{
			?>
						<table id="kronlis">
		<tr class="toprow"><th>Name</th><th>Cron Url</th><th>Search Index</th><th>Post Title</th><th>Read More</th><th colspan="3">Operations</th><th colspan="2">Status</th></tr>
<?php	
		foreach($jadwal as $hasil) {
?>
		<tr><td><?php echo stripslashes($hasil->nama); ?></td><td><?php echo '<a title="Click to execute directly in your a new browser window" href="' . plugins_url( 'ap_bukan.php', __FILE__  ) . '?nomertogel=' . get_option('ap_dbtogel') . '&pin=' . $hasil->pin . '" target="_blank">Save this link and add to your cron job..</a>'; ?></td><td>
		<?php echo $hasil->indekcari; ?></td><td><?php echo stripslashes($hasil->judul); ?></td><td><?php echo $hasil->bacalagi . ' words'; ?></td>
		<td class="senter"><form name="ap_edit" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>"><input type="hidden" name="editpos_hidden" value="<?php echo $hasil->id; ?>"><input type="submit" name="editpos" value="<?php _e('Edit');?>" /></td><td class="senter"><input type="submit" name="kopipos" value="<?php _e('Copy');?>" /></td><td class="senter"><input type="submit" name="deletpos" value="<?php _e('Delete');?>" /></form></td>
		<td class="senter"><?php echo '<font color="green">' . $hasil->sukses . ' posted</font>'; ?></td><td class="senter"><?php echo '<font color="red">' . $hasil->gagal . ' failed</font>'; ?></td></tr>
<?php
}
echo '<input type="hidden" name="savedpos_hidden" value="' . $id . '">';

			?>
	</table><?php } ?>
					</div>
				</div>
		<div id="side-info-column" class="inner-sidebar">
			<div id="side-sortables" class="meta-box-sortables ui-sortable">
				<div class="postbox inside">
					<h3 class="handle"><?php _e( 'Tips' );?></h3>
					<div class="inside">
						<!--<p>If after searching for 3 times got nothing, then it will be counts as <dfn>failed</dfn></p>-->
						<p>For every 1 template is for 1 Search Index. For every Node-IDs are only belong to 1 search Index. That's mean if you want to make 2 Search Index, you have to make 2 Templates..</p><p>	Node-IDs on the left side are coressponds to the Categories on the right side on the same line. If you have 5 nodeids on the left side, 
						then you must be have 5 categories on the right side too. 1st line on the left side are coressponds to the 1st line on the right side, and so on. 
						Please insert only one per line.</p>
					</div> 
				</div>
				<div class="postbox inside">
					<h3 class="handle"><?php _e( 'Shortcode for Categories' );?></h3>
					<div class="inside">
						<p><code>][</code> = Separator between Parent and Child Categories.</p>
						<p><dfn>* 1 deep level only.</dfn>
					</div> 
				</div>
				<div class="postbox inside">
					<h3 class="handle"><?php _e( 'Shortcodes for Post Title' );?></h3>
					<div class="inside">
						<ul>
							<li><code>^asin^</code> = ASIN code</li>
							<li><code>^title^</code> = Product title</li>
						</ul>
					</div> 
				</div>
				<div class="postbox">
					<h3 class="handle"><?php _e( 'Shortcodes for Post Content' );?></h3>
					<div class="inside">
						<ul>
							<li><code>^asin^</code> = ASIN code</li>
							<li><code>^title^</code> = Product title</li>
							<li><code>^url^</code> = Url product page</li>
							<li><code>^brand^</code> = Product brand</li>
							<li><code>^price^</code> = Product price</li>
							<li><code>^simgurl^</code> = Small product image URL</li>
							<li><code>^mimgurl^</code> = Medium product image URL</li>
							<li><code>^limgurl^</code> = Large product image URL</li>
							<li><code>^simage^</code> = Small product image</li>
							<li><code>^mimage^</code> = Medium product image</li>
							<li><code>^limage^</code> = Large product image</li>
							<li><code>^simagel^</code> = Small image with link</li>
							<li><code>^mimagel^</code> = Medium image with link</li>
							<li><code>^limagel^</code> = Large image with link</li>
							<li><code>^lowprice^</code> = Low price offer</li>
							<li><code>^offerprice^</code> = Offer price</li>
							<li><code>^ybuys^</code> = Yellow small buy button</li>
							<li><code>^ybuym^</code> = Yellow medium buy button</li>
							<li><code>^ybuyl^</code> = Yellow large buy button</li>
							<li><code>^wbuys^</code> = White small buy button</li>
							<li><code>^wbuym^</code> = White medium buy button</li>
							<li><code>^wbuyl^</code> = White large buy button</li>
							<li><code>^features^</code> = Product features</li>
							<li><code>^description^</code> = Product description</li>
							<li><code>^iframereview^</code> = Product reviews on iframe</li>
							<li><code>^fbcomments^</code> = Facebook Comments Box</li>
						</ul>
					</div> 
				</div>
					<?php require_once( dirname(__FILE__) . '/azonpost-about.php' );?>
			</div>
		</div>
	<div id="post-body">
		<div id="post-body-content">
			<div id="normal-sortables" class="meta-box-sortables ui-sortable">
				<div id="ap-sampen" class="postbox">
					<form name="ap_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
					<h3 class="hndle"><span><?php _e('Create Campaign' ); ?></span></h3>
					<div class="inside">
							<table><tr><td width="17%">
								<?php _e("<strong>Name: </strong>" ); ?>
								</td><td>
								<input type="text" name="ap_dbnama" value="<?php echo stripslashes($dbnama); ?>" size="37"><?php _e("&nbsp;<dfn> Name of your campaign</dfn>" ); ?>
								</td></tr>
							</table><br />
					</div>
					<div id="sampen" class="postbox inside">
						<div class="inside">
							<table><tr><td width="40%">
								<?php _e("<strong>Search Index: </strong>" ); ?>
								</td><td>
								<select name="ap_dbsindex">
									<!--<option <?php if($dbsindex == "All") {echo "selected";}?> value="All">All</option>-->
									<?php 
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Apparel') {echo'selected';} echo ' value="Apparel">Apparel</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "jp") {echo '<option '; if ($dbsindex == 'Appliances') {echo'selected';} echo ' value="Appliances">Appliances</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'ArtsAndCrafts') {echo'selected';} echo ' value="ArtsAndCrafts">Arts And Crafts</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Automotive') {echo'selected';} echo ' value="Automotive">Automotive</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Baby') {echo'selected';} echo ' value="Baby">Baby</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Beauty') {echo'selected';} echo ' value="Beauty">Beauty</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Books') {echo'selected';} echo ' value="Books">Books</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Classical') {echo'selected';} echo ' value="Classical">Classical</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'Collectibles') {echo'selected';} echo ' value="Collectibles">Collectibles</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'DigitalMusic') {echo'selected';} echo ' value="DigitalMusic">Digital Music</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "de" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'DVD') {echo'selected';} echo ' value="DVD">DVD</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Electronics') {echo'selected';} echo ' value="Electronics">Electronics</option>'; }
									if($dbwilayah == "ca" || $dbwilayah == "de" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp") {echo '<option '; if ($dbsindex == 'ForeignBooks') {echo'selected';} echo ' value="ForeignBooks">Foreign Books</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Grocery') {echo'selected';} echo ' value="Grocery">Grocery</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'HealthPersonalCare') {echo'selected';} echo ' value="HealthPersonalCare">Health Personal Care</option>'; }
									if($dbwilayah == "jp") {echo '<option '; if ($dbsindex == 'Hobbies') {echo'selected';} echo ' value="Hobbies">Hobbies</option>'; }
									if($dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "it" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'HomeGarden') {echo'selected';} echo ' value="HomeGarden">Home Garden</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'HomeImprovement') {echo'selected';} echo ' value="HomeImprovement">Home Improvement</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'Industrial') {echo'selected';} echo ' value="Industrial">Industrial</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Jewelry') {echo'selected';} echo ' value="Jewelry">Jewelry</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'KindleStore') {echo'selected';} echo ' value="KindleStore">Kindle Store</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Kitchen') {echo'selected';} echo ' value="Kitchen">Kitchen</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'LawnAndGarden') {echo'selected';} echo ' value="LawnAndGarden">Lawn And Garden</option>'; }
									if($dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Lighting') {echo'selected';} echo ' value="Lighting">Lighting</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'Magazines') {echo'selected';} echo ' value="Magazines">Magazines</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "de" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Marketplace') {echo'selected';} echo ' value="Marketplace">Marketplace</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'Merchants') {echo'selected';} echo ' value="Merchants">Merchants</option>'; }
									if($dbwilayah == "cn") {echo '<option '; if ($dbsindex == 'Misc') {echo'selected';} echo ' value="Misc">Misc</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'Miscellaneous') {echo'selected';} echo ' value="Miscellaneous">Miscellaneous</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'MobileApps') {echo'selected';} echo ' value="MobileApps">Mobile Apps</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'MP3Downloads') {echo'selected';} echo ' value="MP3Downloads">MP3 Downloads</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Music') {echo'selected';} echo ' value="Music">Music</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'MusicalInstruments') {echo'selected';} echo ' value="MusicalInstruments">Musical Instruments</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'MusicTracks') {echo'selected';} echo ' value="MusicTracks">Music Tracks</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'OfficeProducts') {echo'selected';} echo ' value="OfficeProducts">Office Products</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "de" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'OutdoorLiving') {echo'selected';} echo ' value="OutdoorLiving">Outdoor Living</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'PCHardware') {echo'selected';} echo ' value="PCHardware">PC Hardware</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'PetSupplies') {echo'selected';} echo ' value="PetSupplies">Pet Supplies</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de") {echo '<option '; if ($dbsindex == 'Photo') {echo'selected';} echo ' value="Photo">Photo</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Shoes') {echo'selected';} echo ' value="Shoes">Shoes</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Software') {echo'selected';} echo ' value="Software">Software</option>'; }
									if($dbwilayah == "ca" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'SoftwareVideoGames') {echo'selected';} echo ' value="SoftwareVideoGames">Software Video Games</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp") {echo '<option '; if ($dbsindex == 'SportingGoods') {echo'selected';} echo ' value="SportingGoods">Sporting Goods</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "de") {echo '<option '; if ($dbsindex == 'Tools') {echo'selected';} echo ' value="Tools">Tools</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "es" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Toys') {echo'selected';} echo ' value="Toys">Toys</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'UnboxVideo') {echo'selected';} echo ' value="UnboxVideo">Unbox Video</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'VHS') {echo'selected';} echo ' value="VHS">VHS</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "fr" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Video') {echo'selected';} echo ' value="Video">Video</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "ca" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'VideoGames') {echo'selected';} echo ' value="VideoGames">Video Games</option>'; }
									if($dbwilayah == "com" || $dbwilayah == "cn" || $dbwilayah == "de" || $dbwilayah == "es" || $dbwilayah == "fr" || $dbwilayah == "it" || $dbwilayah == "jp" || $dbwilayah == "uk") {echo '<option '; if ($dbsindex == 'Watches') {echo'selected';} echo ' value="Watches">Watches</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'Wireless') {echo'selected';} echo ' value="Wireless">Wireless</option>'; }
									if($dbwilayah == "com") {echo '<option '; if ($dbsindex == 'WirelessAccessories') {echo'selected';} echo ' value="WirelessAccessories">Wireless Accessories</option>'; }
									?>
								</select>  
								</td></tr>
							</table>
							<br />
							<table><tr><td>
								<strong>&nbsp;<?php _e(" Amazon's Node IDs:" ); ?></strong></td><td>&nbsp;</td><td>&nbsp;<?php _e("<strong> Blog Categories:</strong> <dfn>(Auto create if not exists)</dfn>" ); ?></td></tr><tr><td>
								<textarea name="ap_dbnodeid" rows="15" cols="17"><?php echo $dbnodeid; ?></textarea><br /></td><td>&nbsp;</td><td>
								<textarea name="ap_dbkategori" rows="15" cols="50"><?php echo stripslashes($dbkategori); ?></textarea></td></tr>
							</table>
								<br /><br />
						</div>
					</div>
					<div id="templet" class="postbox inside">
						<div class="inside">
						<br />
						<table><tr><td>
							<?php _e("<strong>Post Title: </strong>" ); ?></td><td><input type="text" name="ap_dbjudul" value="<?php echo $dbjudul; ?>" size="36"><?php _e("<dfn> Use shortcode, ex: ^title^ Reviews</dfn>" ); ?></td></tr>
							<tr><td><?php _e("<strong>Post Content: </strong><br /><dfn>(HTML)</dfn>" ); ?></td><td><textarea name="ap_dbtempletpos" rows="17" cols="65"><?php echo stripslashes($dbtempletpos);?></textarea>
							</td></tr>
						</table>	
							<br /><br />
						</div>
					</div>
					<div id="bclg" class="postbox inside">
						<div class="inside">
							<p><?php _e("Auto insert <strong>Read More</strong> link after the first " ); ?><select name="ap_dbbacalagi">
							<option <?php if($dbbacalagi == "0") {echo "selected";}?> value="0">0</option>		
							<?php for ($i = 20; $i <= 80; $i++){?>
							<option <?php if($dbbacalagi == $i) {echo "selected";}?> value="<?php echo $i;?>"><?php echo $i;}?></option>
							</select> <?php _e(" words of the post's content. &nbsp;<dfn> Pick 0 (Zero) to disable</dfn>" ); ?></p>	
							<p>If post content couldn't reach the minimum threshold of <?php echo $dbbacalagi;?> words count, then it will try to search again.. max. 3 times. </p>
							<br />
						</div>
					</div>
					<br />
						<div class="inside">
							<table><tr><td>
								<p class="submit" style="margin-left:35px;"><input type="submit" class="button-primary" name="simpenpos" value="<?php _e(get_option('ap_tmb')); ?>" /></p></td><td>&nbsp;</td><td>
								<input type="hidden" name="ap_id" value="<?php echo $_POST['editpos_hidden'];?>"><p class="submit"><input type="submit" name="resetpos" value="<?php _e('Reset'); ?>" /></p>
								</td></tr>
							</table>	
						</div>					
				</div>
				<div id="ads" class="postbox">
					<div class="inside">					
							<p align="center">
								<script type="text/javascript"><!--
									google_ad_client = "ca-pub-8063998966056079";
									/* bk 468x60 */
									google_ad_slot = "2647439066";
									google_ad_width = 468;
									google_ad_height = 60;
									//-->
									</script>
									<script type="text/javascript"
									src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
								</script>
							</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>