<?php

class Mo_Headless_Site_Available_APIs {

	public static function available_apis() {
		self::default_wp_apis();
	}

	public static function default_wp_apis() {
		?>
        <style>
            #protectedrestapi_container ul li {
                padding-left: 20px;
            }

            #protectedrestapi_container em {
                font-size: 0.8em;
            }
        </style>

        <div class="mo_table_layout">
            <h1 id="wp_d" class="mo_wp_default_apis">WordPress Default APIs</h1>
            <div id="protectedrestapi_container" style="display: none"><?php self::ProtectedRestAPI_display_route_checkboxes();?></div>
            <hr>
            <h1 id="wp_c" class="mo_wp_default_apis">Custom APIs</h1>
            <div id="mo_custom_api_list" style="display: none"><?php Mo_Headless_Site_Create_Custom_API::custom_api_wp_list_api(); ?></div>
        </div>
		<?php
	}

    public static function ProtectedRestAPI_display_route_checkboxes() {
        $wp_rest_server     = rest_get_server();
        $all_namespaces     = $wp_rest_server->get_namespaces();
        $all_routes         = array_keys( $wp_rest_server->get_routes() );
        $loopCounter       = 0;
        $current_namespace = '';

        foreach ( $all_routes as $route ) {
            $is_route_namespace = in_array( ltrim( $route, "/" ), $all_namespaces );

            if ( $is_route_namespace || "/" == $route ) {
                $current_namespace = $route;
                if ( 0 != $loopCounter ) {
                    echo "</ul>";
                }

                $route_for_display = ( "/" == $route ) ? "/ <em>" . esc_html__( "REST API ROOT", "disable-json-api" ) . "</em>" : esc_html( $route );

                echo "<h2><label>$route_for_display</label></h2><ul>";

                if ( "/" == $route ) {
                    echo "<li>" . sprintf( esc_html__( "On this website, the REST API root is %s", "disable-json-api" ), "<strong>" . rest_url() . "</strong>" ) . "</li>";
                }

            } else {
                echo "<li><label>" . esc_html( $route ) . "</label></li>";
            }

            $loopCounter ++;
        }
        echo "</ul>";
    }
}