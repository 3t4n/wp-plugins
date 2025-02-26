<?php
/**
 * Licence:
 * AJ & MBEC Ltd Gobi Photo Montage Animator Wordpress Plugin
 * Copyright (C) 2016  AJ & MEBC Ltd
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * Gnomovision version 69, Copyright (C) 2016 AJ & MEBC Ltd
 * Gnomovision comes with ABSOLUTELY NO WARRANTY;
 * This is free software, and you are welcome to redistribute it
 * under certain conditions;
 */
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://www.ajmebc.co.uk/wordpress/gobi.html
 * @since      1.1.0
 *
 * @package    ajmebc_gam
 * @subpackage ajmebc_gam/public/partials
 * @author     Andrew James <andrew.james@ajmebc.co.uk>
 */

 $post_id = get_the_ID();

 /* Desktop */
 $ajmebc_gam_rows = get_post_meta($post_id, 'ajmebc_gam_post_rows', true);
 $ajmebc_gam_columns = get_post_meta($post_id, 'ajmebc_gam_post_columns', true);
 $ajmebc_gam_height = get_post_meta($post_id, 'ajmebc_gam_post_height', true);
 $ajmebc_gam_width = get_post_meta($post_id, 'ajmebc_gam_post_width', true);
 $ajmebc_gam_style_margin = get_post_meta($post_id, "ajmebc_gam_post_style_margin", true);

 /* Tablet */
 $ajmebc_gam_tablet_rows = get_post_meta($post_id, 'ajmebc_gam_tablet_post_rows', true);
 $ajmebc_gam_tablet_columns = get_post_meta($post_id, 'ajmebc_gam_tablet_post_columns', true);
 $ajmebc_gam_tablet_height = get_post_meta($post_id, 'ajmebc_gam_tablet_post_height', true);
 $ajmebc_gam_tablet_width = get_post_meta($post_id, 'ajmebc_gam_tablet_post_width', true);
 $ajmebc_gam_tablet_style_margin = get_post_meta($post_id, "ajmebc_gam_tablet_post_style_margin", true);



 /* Mobile */
 $ajmebc_gam_mobile_rows = get_post_meta($post_id, 'ajmebc_gam_mobile_post_rows', true);
 $ajmebc_gam_mobile_columns = get_post_meta($post_id, 'ajmebc_gam_mobile_post_columns', true);
 $ajmebc_gam_mobile_height = get_post_meta($post_id, 'ajmebc_gam_mobile_post_height', true);
 $ajmebc_gam_mobile_width = get_post_meta($post_id, 'ajmebc_gam_mobile_post_width', true);
 $ajmebc_gam_mobile_style_margin = get_post_meta($post_id, "ajmebc_gam_mobile_post_style_margin", true);




 $ajmebc_gam_loading = get_post_meta($post_id, 'ajmebc_gam_post_loading', true);
 $ajmebc_gam_timer = get_post_meta($post_id, 'ajmebc_gam_post_timer', true);
 $ajmebc_gam_animation = get_post_meta($post_id, 'ajmebc_gam_post_animation', true);
 $ajmebc_gam_anim_timer = get_post_meta($post_id, "ajmebc_gam_post_anim_timer", true);
 $ajmebc_gam_appData = get_post_meta($post_id, "ajmebc_gam_post_imgsrc_data", true);
?>

<div style="display: block; width: 100%;">
  <div id="ajmebcShiftingTilesApp" class="app" style="display: block; margin-left: auto; margin-right: auto;"></div>
</div>

<script type="text/javascript">
  var ajmebc_gobi_pma_data = {"pictures": <?= $ajmebc_gam_appData ?>,
    "post_id" : <?= $post_id ?>
  }
  var ajmebc = ajmebc || {};
  ajmebc.ShiftingTiles = {
    data: ajmebc_gobi_pma_data,
    style: {
      mobile_portrait: {
        query: '(max-width: 766px) and (orientation: portrait)',
        height: '<?= $ajmebc_gam_mobile_height ?>px',
        width: '<?= $ajmebc_gam_mobile_width ?>px',
        rows: <?= $ajmebc_gam_mobile_rows ?>,
        columns: <?= $ajmebc_gam_mobile_columns ?>,
        frameStyle: {
          'margin': '<?= $ajmebc_gam_mobile_style_margin ?>px',
        },
        fullscreen: {
          margin: {
            'margin-vertical': '30',
            'margin-horizontal': '30'
          }
        }
      },
      mobile_landscape: {
        query: '(max-width: 766px) and (orientation: landscape)',
        height: '<?= $ajmebc_gam_mobile_height ?>px',
        width: '<?= $ajmebc_gam_mobile_width ?>px',
        rows: <?= $ajmebc_gam_mobile_rows ?>,
        columns: <?= $ajmebc_gam_mobile_columns ?>,
        frameStyle: {
          'margin': '<?= $ajmebc_gam_mobile_style_margin ?>px',
        },
        fullscreen: {
          margin: {
            'margin-vertical': '30',
            'margin-horizontal': '30'
          }
        }
      },
      tablet_portrait: {
        query: '(min-width: 767px) and (max-width: 1024px) and (orientation: portrait)',
        height: '<?= $ajmebc_gam_tablet_height ?>px',
        width: '<?= $ajmebc_gam_tablet_width ?>px',
        rows: <?= $ajmebc_gam_tablet_rows ?>,
        columns: <?= $ajmebc_gam_tablet_columns ?>,
        frameStyle: {
          'margin': '<?= $ajmebc_gam_tablet_style_margin ?>px',
        },
        fullscreen: {
          margin: {
            'margin-vertical': '60',
            'margin-horizontal': '60'
          }
        }
      },
      tablet_landscape: {
        query: '(min-width: 767px) and (max-width: 1024px) and (orientation: landscape)',
        height: '<?= $ajmebc_gam_tablet_height ?>px',
        width: '<?= $ajmebc_gam_tablet_width ?>px',
        rows: <?= $ajmebc_gam_tablet_rows ?>,
        columns: <?= $ajmebc_gam_tablet_columns ?>,
        frameStyle: {
          'margin': '<?= $ajmebc_gam_tablet_style_margin ?>px',
        },
        fullscreen: {
          margin: {
            'margin-vertical': '60',
            'margin-horizontal': '60'
          }
        }
      },
      desktop: {
        query: '(min-width: 1025px)',
        height: '<?= $ajmebc_gam_height ?>px',
        width: '<?= $ajmebc_gam_width ?>px',
        rows: <?= $ajmebc_gam_rows ?>,
        columns: <?= $ajmebc_gam_columns ?>,
        frameStyle: {
          'margin': '<?= $ajmebc_gam_style_margin ?>px',
        },
        fullscreen: {
          margin: {
            'margin-vertical': '100',
            'margin-horizontal': '60'
          }
        }
      }
    },
    loading: '<?= $ajmebc_gam_loading ?>',
    timer: <?= $ajmebc_gam_timer ?>000,
    animation: {
      name: '<?= $ajmebc_gam_animation ?>',
      timer: <?= $ajmebc_gam_anim_timer ?>000
    }
  };
</script>
