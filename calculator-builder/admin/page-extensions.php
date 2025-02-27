<?php
/**
 * Extensions Page
 *
 * @package     CalcHub
 * @subpackage  Admin/Support
 * @author      Dmytro Lobov <hey@wow-company.com>
 * @copyright   Copyright (c) 2022, CalcHub.xyz
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version     0.4
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>
<h2>These add functionality to your Calculator Builder.</h2>

<div class="page-extensions">

    <div class="tabs__content is-active">

        <div class="calchub-cards">

            <div class="calchub-card-wrapper">
                <div class="calchub-card">
                    <div class="calchub-card-img">
                        <img src="<?php
						echo esc_url( CALCHUB_PLUGIN_URL ); ?>assets/img/calchub-logo.png">
                    </div>
                    <div class="calchub-card-content">
                        <h4 class="calchub-card-title">CalcHub Addon</h4>
                        <p class="calchub-card-text">
                            Add extra functions for Calculator builder.
                        </p>
                    </div>
                    <div class="calchub-card-footer">
						<?php
						if ( ! class_exists( 'CalcHub_Plus' ) ) : ?>
                            <a href="https://calchub.xyz/downloads/calculator-builder-add-on/" target="_blank"
                               class="button is-link">Learn more</a>
						<?php
						else : ?><?php
							do_action( 'calchub_addon_activation_license' ); ?><?php
						endif; ?>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
