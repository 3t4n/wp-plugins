<?php
defined( 'ABSPATH' ) || exit;

class FDP_Custom_Urls_Page extends Eos_Fdp_Matrix_Page {
  public $urls;
  public $home_url;
  public $section_id;

  public function before_section( $page_slug ){
    $this->section_id = 'eos-dp-by-url-section';
    $this->urls = eos_dp_get_option( 'eos_dp_by_url' );
    if( !$this->urls || '' === $this->urls ){
  		$this->urls = array( array( 'url' => '','plugins' => '' ) );
  	}
  	else{
  		$this->urls[] = array( 'url' => '','plugins' => '' );
  	}
  	$this->home_url = get_home_url();
    ?>
    <h2><?php _e( 'Uncheck the plugins you want to disable depending on the URL','eos-dp' ); ?></h2>
		<h2><span class="dashicons dashicons-warning"></span><?php _e( 'It will work only for the FRONTEND','eos-dp' ); ?></h2>
		<div class="eos-dp-explanation" style="margin-bottom:48px">
			<p><?php _e( 'Use the star "*" as replacement of groups of characters.','eos-dp' ); ?></p>
			<p><?php printf( __( 'E.g. %s*example/ will match URLs as %s/an-example/, %s/another-example/...','eos-dp' ),$this->home_url,$this->home_url,$this->home_url ); ?></p>
			<p><?php printf( __( 'You can use these options to disable plugins by URL query arguments. E.g. *?example-paramameter=true* will match URLS as %s?example-paramameter=true, %s/page-example/?example-paramameter=true...','eos-dp' ),$this->home_url,$this->home_url ); ?></p>
		</div>
    <?php
  }

  public function tableBody( $page_slug ){
    $row = 0;
    $urlsN = count( $this->urls );
    foreach( $this->urls as $urlA ){
    ?>
      <tr class="eos-dp-url eos-dp-post-row<?php echo $row + 1 === $urlsN ? ' eos-hidden' : '';echo isset( $urlA['needs_url'] ) && absint( $urlA['needs_url'] ) > 0 ? ' eos-dp-need-from-singe' : ''; ?>">
        <td class="eos-dp-post-name-wrp">
          <span class="eos-dp-not-active-wrp"><input title="<?php _e( 'Activate/deactivate all plugins for this URL','eos-dp' ); ?>" class="eos-dp-global-chk-row" type="checkbox" /></span>
          <span class="dashicons dashicons-move" title="<?php _e( 'Move it up to assign higher priority','eos-dp' ); ?>"></span>
          <input type="text" class="eos-dp-url-input" title="<?php echo isset( $urlA['url'] ) ? esc_attr( $urlA['url'] ) : ''; ?>" placeholder="<?php printf( __( 'Write here the URL','eos-dp' ),$this->home_url ); ?>" value="<?php echo isset( $urlA['url'] ) ? esc_attr( $urlA['url'] ) : ''; ?>" />
          <?php if( isset( $urlA['needs_url'] ) && absint( $urlA['needs_url'] ) > 0 ){ ?>
          <span class="eos-dp-ncu-wrn dashicons dashicons-warning" title="<?php printf( __( "This URL covers the post ID %s. It was not possibe to manage it with the Singles settings.","eos-dp" ),esc_html( $urlA['needs_url'] ) ); ?>"></span>
          <?php } ?>
          <span class="eos-dp-delete-url dashicons dashicons-trash hover" title="<?php _e( 'Delete','eos-dp' ); ?>"></span>
          &nbsp;&nbsp;<a class="eos-dp-copy" href="#"><span class="dashicons dashicons-admin-page" style="font-size:30px"></span></a>
          &nbsp;&nbsp;<a class="eos-dp-paste" href="#"><span class="dashicons dashicons-category" style="font-size:30px"></span></a>
          <span class="eos-dp-x-space"></span>
        </td>
      <?php
      $k = 0;
      foreach( $this->active_plugins as $plugin ){
        if( in_array( $plugin,array_keys( $this->plugins_by_dirs ) ) ){
          if( !isset( $urlA['plugins'] ) ){
            $active = true;
          }
          else{
            $active = !in_array( $plugin,explode( ',',$urlA['plugins'] ) ) ? true : false;
          }
          ?>
          <td class="center<?php echo $active ? ' eos-dp-active' : ''; ?>" data-path="<?php echo esc_attr( $plugin ); ?>">
            <div class="eos-dp-td-chk-wrp eos-dp-td-url-chk-wrp">
              <input class="eos-dp-row-<?php echo $row; ?> eos-dp-col-<?php echo $k + 1; ?>" type="checkbox"<?php echo $active ? ' checked' : ''; ?> />
            </div>
          </td>
        <?php
        ++$k;
        }
      } ?>
      </tr>
      <?php
      ++$row;
    }
    ?>
    <tr>
      <td colspan="<?php echo count( $this->active_plugins ) + 2; ?>" id="eos-dp-url-actions" style="border:none;padding:0">
        <button id="eos-dp-add-url" style="margin-top:16px"><?php _e( 'Add URL','eos-dp' ); ?></button>
      </td>
    </tr>
    <?php
  }
}
