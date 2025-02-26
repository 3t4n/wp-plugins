<?php $token = get_option('sola_t_token');

    /**
     * Generate a new token
    */
    $sola_t_token = get_option('sola_t_token');
    if(isset($_GET['s_testimonial_action']) && $_GET['s_testimonial_action'] === "generate_new_token"){
    function sola_t_get_new_token() {
        $sola_t_token = get_option('sola_t_token');
    
        $sola_t_new_token = md5( time()."sola_t_token" );
            
        update_option( 'sola_t_token', $sola_t_new_token );
    return $sola_t_new_token;
    }
    add_action("init","sola_t_get_new_token");
    }

?>
<table class="form-table wp-list-table widefat striped pages">
    <tbody>
        <tr>
            <td width="200">Secret Token:</td>
            <td width="300px"><input type="text" width="300px" id="sola_testimonial_token" disabled='true' value="<?php if(function_exists("sola_t_get_new_token")){ echo esc_attr(sola_t_get_new_token()); }else{ echo esc_attr($token);} ?>" readonly>
                <td>
                    <a class="button button-secondary"  href="?post_type=testimonials&page=sola_t_settings&tab=rest&s_testimonial_action=generate_new_token">Generate New </a>
                </td>
            </td>
        </tr>

        <tr>
	        <td width="200">Supported API Calls:</td>
	        <td><code>/wp-json/sola_t/v1/get_all_testimonials</code> 
	            <code>GET, POST</code> 
	        </td>
	    </tr>

        <?php do_action( 'sola_t_endpoints', false ); ?>

        <tr>
            <td width="200">API Response Codes:</td>
            <td><code>200</code> 
                <code>Success</code> 
            </td>
        </tr>
        <tr>
            <td width="200"></td>
            <td><code>400</code> 
                <code>Bad Request</code> 
            </td>
        </tr>
        <tr>
            <td width="200"></td>
            <td><code>401</code> 
                <code>Unauthorized</code> 
            </td>
        </tr>
        <tr>
            <td width="200"></td>
            <td><code>403</code> 
                <code>Forbidden</code> 
            </td>
        </tr>
        <tr>
            <td width="200"></td>
            <td><code>404</code>
                <code>Content Not Found</code> 
            </td>
        </tr>
    </tbody>
</table>