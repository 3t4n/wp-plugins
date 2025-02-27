<?php

/**
 * Class DashboardWidget
 * @package DaReactions\Widgets
 *
 * Generates widgets for blogs and network dashboards
 *
 * @since 1.0.0
 */
namespace DaReactions\Widgets;

use DaReactions\Common;
use DaReactions\Data;
use DaReactions\FileSystem;
use DaReactions\Options;
use DaReactions\Utils;
/**
 * Class DashboardWidget
 * @package DaReactions\Widgets
 *
 * Generates widgets for blogs and network dashboards
 *
 * @since 1.0.0
 */
class DashboardWidget {
    /**
     * DashboardWidget constructor.
     */
    public function __construct() {
    }

    /**
     * Adds widget to blog dashboard
     * Attached to wp_dashboard_setup hook
     *
     * @since 1.0.0
     */
    public function addDashboardWidgets() {
        // Total reactions widget
        wp_add_dashboard_widget( 'da-reactions_dashboard_widget_total_reactions', _x( 'Total reactions', 'Dashboard widget title', 'da-reactions' ), array($this, 'renderDashboardWidgetTotalReactions') );
        // Reactions by content type widget
        wp_add_dashboard_widget( 'da-reactions_dashboard_widget_reactions_by_content_type', _x( 'Reactions by content type', 'Dashboard widget title', 'da-reactions' ), array($this, 'renderDashboardWidgetReactionsByContentType') );
    }

    /**
     * Renders the widget “Reactions by Content Type
     *
     * @since 1.0.0
     */
    public function renderDashboardWidgetReactionsByContentType() {
        $general_options = Options::getInstance( 'general' );
        $registered_post_types = get_post_types( array(
            'public' => true,
        ), 'objects' );
        $chart_data = array(
            'labels'   => array(),
            'datasets' => array(array(
                'data'            => array(),
                'backgroundColor' => array(),
            )),
        );
        $count_comments = false;
        foreach ( $registered_post_types as $label => $registered_post_type ) {
            if ( $general_options->getOption( "post_type_{$label}" ) === 'on' ) {
                $chart_data['labels'][] = $label;
                $chart_data['datasets'][0]['data'][] = Data::getTotalReactionsForContentType( $registered_post_type->name );
                $chart_data['datasets'][0]['backgroundColor'][] = Utils::generateColorFromString( $label );
            }
            if ( $general_options->getOption( "post_type_{$label}_comments" ) === 'on' ) {
                $count_comments = true;
            }
        }
        if ( $count_comments ) {
            $chart_data['labels'][] = __( 'Comments', 'da-reactions' );
            $chart_data['datasets'][0]['data'][] = Data::getTotalReactionsForContentType( 'comment' );
            $chart_data['datasets'][0]['backgroundColor'][] = Utils::generateColorFromString( 'comment' );
        }
        // Rendering chart using WordPress' escaping functions for security
        echo '<canvas class="graph-canvas" id="da_reactions_widget_reactions_by_content_type" width="400" height="400" data-chart_data="' . esc_attr( wp_json_encode( $chart_data ) ) . '">Your browser does not support canvas.</canvas>';
    }

    /**
     * Renders the “Total Reactions Widget”
     *
     * @throws JsonException
     * @since 1.0.0
     */
    public function renderDashboardWidgetTotalReactions() {
        $data = Data::getAllContentReactions();
        $chart_data = Common::convertDataForChart( $data );
        echo '<canvas class="graph-canvas" id="da_reactions_widget_total_reactions" width="400" height="400" data-chart_data="' . esc_attr( wp_json_encode( $chart_data ) ) . '">Your browser does not support canvas.</canvas>';
    }

    /**
     * Renders widget for network dashboard
     *
     * @since 1.0.0
     */
    public function renderNetworkDashboardWidget() {
        $blogs = get_sites();
        echo '<table class="widefat">
            <caption>' . esc_html_x( 'Network Reactions', 'Network Dashboard Widget caption', 'da-reactions' ) . '</caption>
            <thead>
            <tr>
                    <th scope="col">' . esc_html__( 'Blog', 'da-reactions' ) . '</th>
                    <th scope="col">' . esc_html__( 'Reactions', 'da-reactions' ) . '</th>
                    <th scope="col">' . esc_html__( 'Statistics', 'da-reactions' ) . '</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                    <th scope="col">' . esc_html__( 'Blog', 'da-reactions' ) . '</th>
                    <th scope="col">' . esc_html__( 'Reactions', 'da-reactions' ) . '</th>
                    <th scope="col">' . esc_html__( 'Statistics', 'da-reactions' ) . '</th>
            </tr>
            </tfoot>
            <tbody>';
        foreach ( $blogs as $blog ) {
            switch_to_blog( $blog->blog_id );
            $general_options = Options::getInstance( 'general' );
            $color_generator = $general_options->getOption( 'chart_colors' );
            $reactions = Data::getAllReactions();
            $statistics = Data::getAllContentReactions();
            $chart_data = array();
            $total = 0;
            foreach ( $statistics as $i => $iValue ) {
                switch ( $color_generator ) {
                    case 'random':
                        $chart_data_color = Utils::generateColorFromString( $iValue->label );
                        break;
                    case 'default':
                        $chart_data_color = Utils::getDefaultColorByIndex( $i );
                        break;
                    default:
                        $chart_data_color = $iValue->color;
                        break;
                }
                $chart_data[] = array(
                    'label' => $iValue->label,
                    'total' => $iValue->total,
                    'color' => $chart_data_color,
                );
                $total += $iValue->total;
            }
            echo '<tr>
                    <td>' . esc_html( get_bloginfo( 'name' ) ) . '</td>
                    <td>';
            foreach ( $reactions as $reaction ) {
                $image_file_path = FileSystem::getImageUrl( $reaction->file_name );
                echo '<img src="' . esc_url( $image_file_path ) . '" width="14" alt="' . esc_attr( $reaction->label ) . '" title="' . esc_attr( $reaction->label ) . '"/>';
            }
            echo '</td>
                    <td>
                        <div class="chart network_blog_reactions_percent_chart">';
            if ( $total > 0 ) {
                foreach ( $chart_data as $data ) {
                    echo '<div style="background-color: ' . esc_attr( $data['color'] ) . '; width: ' . esc_attr( $data['total'] / $total * 100 ) . '%;" title="' . esc_attr( $data['label'] ) . '" class="percent_div_with_tooltip"></div>';
                }
            } else {
                esc_html_e( 'No data to display.', 'da-reactions' );
            }
            echo '</div>
                    </td>
                </tr>';
            restore_current_blog();
        }
        echo '</tbody>
            </table>';
    }

}
