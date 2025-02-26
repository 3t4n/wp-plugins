<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php $setupped = ( (float) get_option('amazingaffiliates_setup_status') >= 0.75 ); ?>

<?php
$pages = array(
    array( 'slug' => 'home',    'setup' => 1, 'icon' => '☰', 'label' => 'Dashboard',   'url' => 'menu',       'order' => 10 ),
    array( 'slug' => 'setup',   'setup' => 0, 'icon' => '✓', 'label' => 'Setup',       'url' => 'setup',      'order' => 10 ),
    array( 'slug' => 'insert',  'setup' => 1, 'icon' => '✚', 'label' => 'Insert',      'url' => 'workshop',   'order' => 20 ),
    array( 'slug' => 'edit',    'setup' => 1, 'icon' => '✎', 'label' => 'Edit',        'url' => 'warehouse',  'order' => 30 ),
    array( 'slug'=>'settings',  'setup' => 1, 'icon' => '#',  'label' => 'Settings',    'url' => 'settings',   'order' => 50 )
);
?>

<?php foreach($pages as $page): ?>
    
    <?php if( $page['setup'] == $setupped ): ?>
        
        <?php if( $amazingaffiliates_page == $page['slug'] ): ?>
            
            <span   class="navbar_menu_current_item <?php echo esc_attr( $page['slug'] ); ?>"
                    style="order:<?php echo esc_attr( $page['order'] ); ?>"
                    ><?php echo esc_html( $page['icon'] ); ?> <span class="nav_label"><?php echo esc_html( $page['label'] ); ?></span></span>
            
        <?php else: ?>
            
            <a  class="navbar_menu_item <?php echo esc_attr( $page['slug'] ); ?>"
                href="<?php echo esc_url( get_admin_url() . 'admin.php?page=amazingaffiliates_' . $page['url'] ); ?>"
                style="order:<?php echo esc_attr( $page['order'] ); ?>"
                ><?php echo esc_html( $page['icon'] ); ?> <span class="nav_label"><?php echo esc_html( $page['label'] ); ?></span></a>
                
        <?php endif; ?>
        
    <?php endif; ?>

<?php endforeach; ?>


<?php if( $amazingaffiliates_page == 'learn' ): ?>

	<span   class="navbar_menu_current_item learn"
		  style="order:40"
		  ><?php echo esc_html( '?' ); ?> <span class="nav_label"><?php echo 'Info'; ?></span>
	</span>

<?php else: ?>

	<a  class="navbar_menu_item learn"
	   href="<?php echo esc_url( get_admin_url() . 'admin.php?page=amazingaffiliates_handbook' ); ?>"
	   style="order:40"
	   ><?php echo esc_html( '?' ); ?> <span class="nav_label"><?php echo 'Info'; ?></span>
	</a>

<?php endif; ?>

<?php if( $amazingaffiliates_page == 'setup' ): ?>

	<span   class="navbar_menu_current_item setup"
		  style="order:41"
		  ><?php echo esc_html( '✓' ); ?> <span class="nav_label"><?php echo 'Setup'; ?></span>
	</span>

<?php endif; ?>