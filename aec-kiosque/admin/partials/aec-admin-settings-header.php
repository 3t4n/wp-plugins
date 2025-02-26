<?php

/**
 * Admin settings header template
 *
 * This file is used to display a header on admin setting pages.
 *
 * @link       https://atl-software.net/
 * @since      1.0.1
 *
 * @package    Aec
 * @subpackage Aec/admin/partials
 */

?>

<!-- Nicely display annoying notices-->
<h2 class="aec-notices-attractor"></h2>
<!-- End of Nicely display annoying notices-->

<div class="aec-admin-header aec-admin-header--aec">
	<img class="aec-admin-header__brand" src="<?php echo AEC_URL . '/admin/img/logo-aec-transparent.svg' ?>" alt="">
	<span class="aec-admin-header__title"><?php echo $title ?></span>
	<span class="aec-admin-header__version"><?php echo AEC()->t( 'aec_text_by' ) ?> ATL Software V. <?php echo AEC_VERSION ?></span>
</div>

