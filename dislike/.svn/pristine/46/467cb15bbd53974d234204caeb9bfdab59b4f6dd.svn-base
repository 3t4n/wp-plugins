<div class="wrap">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
           
  <form method="post" action="">                   
    <?php wp_nonce_field( 'edit-dislike-options', 'rockit-dislike_nonce' ); ?>                 
    
    <h3><?php _e( 'Popup-Fenster', 'rockit-dislike' ) ?></h3>                   
    <table class="form-table">                    
      <tbody>                          
        <tr valign="top">                                
          <th scope="row"><?php _e( 'Breite in px', 'rockit-dislike' ) ?></th>
          <td>                                      
            <input class="small-text" type="text" name="dislike_window_width" value="<?php esc_attr_e( $all_dislike_options['dislike_window_width'] ); ?>" />
          </td>                          
        </tr>                          
        <tr valign="top">                                
          <th scope="row"><?php _e( 'Höhe in px', 'rockit-dislike' ) ?></th>
          <td>                                      
            <input class="small-text" type="text" name="dislike_window_height" value="<?php esc_attr_e( $all_dislike_options['dislike_window_height'] ); ?>" />
          </td>                          
        </tr>                    
      </tbody>              
    </table>
    
    <h3><?php _e( 'Inhalt', 'rockit-dislike' ) ?></h3>                   
    <table class="form-table">                    
      <tbody>                                
        <tr valign="top">                                
          <th scope="row">                         
            <input type="radio" name="dislike_content" id='dl_url' value="url" <?php checked( $all_dislike_options['dislike_content'], 'url' ); ?> />                                    
            <label for="dl_url"><?php _e( 'Webseite anzeigen', 'rockit-dislike' ) ?></label>                                
          </th>
          <td>                                    
            <input class="large-text" type="text" name="dislike_url" value="<?php esc_attr_e( $all_dislike_options['dislike_url'] ); ?>"  />
          </td>                          
        </tr>                          
        <tr valign="top">                                
          <th scope="row">                         
            <input type="radio" name="dislike_content" id='dl_text' value="text" <?php checked( $all_dislike_options['dislike_content'], 'text' ); ?> style="vertical-align:top;" />                                    
            <label for="dl_text"><?php _e( 'Text / HTML anzeigen', 'rockit-dislike' ) ?></label>                                
          </th>
          <td>            
            <textarea cols="80" rows="10" name="dislike_text"><?php echo esc_textarea( $all_dislike_options['dislike_text'] ); ?></textarea>
          </td>                          
        </tr>                    
      </tbody>              
    </table>              
    
    <h3><?php _e( 'Button', 'rockit-dislike' ) ?></h3>                   
    <table class="form-table">                    
      <tbody>                          
        <tr valign="top">                                
          <th scope="row"><?php _e( 'Auf Beiträgen/Seiten anzeigen', 'rockit-dislike' ) ?></th>
          <td>                                      
            <input type="radio" name="dislike_show" id='dl_none' value="none" <?php checked( $all_dislike_options['dislike_show'], 'none' ); ?> />                                      
            <label for="dl_none"><?php _e( 'nicht anzeigen', 'rockit-dislike' ) ?></label>                                      
            <br>                                      
            <input type="radio" name="dislike_show" id='dl_posts' value="posts" <?php checked( $all_dislike_options['dislike_show'], 'posts' ); ?> />                                      
            <label for="dl_posts"><?php _e( 'Beiträge', 'rockit-dislike' ) ?></label>                                      
            <br>                                      
            <input type="radio" name="dislike_show" id='dl_pages' value="pages" <?php checked( $all_dislike_options['dislike_show'], 'pages' ); ?> />                                      
            <label for="dl_pages"><?php _e( 'Seiten', 'rockit-dislike' ) ?></label>                                      
            <br>                                      
            <input type="radio" name="dislike_show" id='dl_all' value="all" <?php checked( $all_dislike_options['dislike_show'], 'all' ); ?> />                                      
            <label for="dl_all"><?php _e( 'Seiten & Beiträge', 'rockit-dislike' ) ?></label>
          </td>                          
        </tr>                    
      </tbody>              
    </table>               
    <table class="form-table">                    
      <tbody>                 
        <tr valign="top">                                  
          <th scope="row"><?php _e( 'Auf Blog/Beitragsübersicht anzeigen', 'rockit-dislike' ) ?></th>
          <td>                                      
            <input type="radio" name="dislike_archive" id="dl_archive_in" value="include" <?php checked( $all_dislike_options['dislike_archive'], 'include' ); ?>/>
            <label for="dl_archive_in"><?php _e( 'Ja', 'rockit-dislike' ) ?></label>
            <br>
            <input type="radio" name="dislike_archive" id="dl_archive_ex" value="exclude" <?php checked( $all_dislike_options['dislike_archive'], 'exclude' ); ?>/>
            <label for="dl_archive_ex"><?php _e( 'Nein', 'rockit-dislike' ) ?></label>                    
            <br>                 
          </td>                              
        </tr>                           
        <tr valign="top">                                
          <th scope="row"><?php _e( 'Auf Beiträgen/Seiten ausschließen', 'rockit-dislike' ) ?></th>
          <td>                                      
            <input class="medium-text" type="text" name="dislike_exclude" id="dl_exclude" value="<?php esc_attr_e( $all_dislike_options['dislike_exclude'] ); ?>"/>
            <label for="dl_exclude"><?php _e( '(Einzelne IDs getrennt mit Komma)', 'rockit-dislike' ) ?></label>                                      
            <br>                 
          </td>                              
        </tr>            
      </tbody>         
    </table>              
    <input type="submit" class="button-primary" name="Submit" value="<?php echo __('Save Changes'); ?>" />           
  </form>
</div>