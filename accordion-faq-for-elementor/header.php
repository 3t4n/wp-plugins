<div class="afaq-6310-header">
  <ul class="afaq-6310-nav">
    <li class="has-dropdown">
      <a href="<?php echo admin_url("admin.php?page=afaq-6310-faq-for-elementor"); ?>" class="<?php if(isset($_GET['page']) && ($_GET['page'] == 'afaq-6310-faq-for-elementor' || $_GET['page'] == 'afaq-6310-faq-01-10' || $_GET['page'] == 'afaq-6310-faq-11-20')) echo "afaq-6310-active" ?>">ShortCode & Templates</a>
      <ul class="dropdown-menu">
        <li>
          <a href="<?php echo admin_url("admin.php?page=afaq-6310-faq-for-elementor"); ?>" class="<?php if(isset($_GET['page']) && $_GET['page'] == 'afaq-6310-faq-for-elementor') echo "afaq-6310-active" ?>">All ShortCode</a>
        </li>
        <li>
          <a href="<?php echo admin_url("admin.php?page=afaq-6310-faq-01-10"); ?>" class="<?php if(isset($_GET['page']) && $_GET['page'] == 'afaq-6310-faq-01-10') echo "afaq-6310-active" ?>">FAQ Template 01-10</a>
        </li>
        <li>
          <a href="<?php echo admin_url("admin.php?page=afaq-6310-faq-11-20"); ?>" class="<?php if(isset($_GET['page']) && $_GET['page'] == 'afaq-6310-faq-11-20') echo "afaq-6310-active" ?>">FAQ Template 11-20</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=afaq-6310-manage-faq"); ?>" class="<?php if(isset($_GET['page']) && $_GET['page'] == 'afaq-6310-manage-faq') echo "afaq-6310-active" ?>">Manage FAQ</a>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=afaq-6310-manage-category"); ?>" class="<?php if(isset($_GET['page']) && $_GET['page'] == 'afaq-6310-manage-category') echo "afaq-6310-active" ?>">Manage Category</a>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=afaq-6310-faq-for-elementor-license"); ?>" class="<?php if(isset($_GET['page']) && $_GET['page'] == 'afaq-6310-faq-for-elementor-license') echo "afaq-6310-active" ?>">License</a>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=afaq-6310-faq-for-elementor-use"); ?>" class="<?php if(isset($_GET['page']) && $_GET['page'] == 'afaq-6310-faq-for-elementor-use') echo "afaq-6310-active" ?>">Help</a>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=afaq-6310-wpmart-plugins"); ?>" class="<?php if(isset($_GET['page']) && $_GET['page'] == 'afaq-6310-wpmart-plugins') echo "afaq-6310-active" ?> afaq-6310-plugin-menu">WpMart Plugins</a>
    </li>
    <li>
      <a href="https://www.wpmart.org/downloads/accordion-faq-with-category/" target="_blank" class="afaq-6310-free">Upgrade To Pro<i class="fas fa-star"></i></a>
    </li>
  </ul>

  <h3>
    <span class="dashicons dashicons-flag"></span>
    Notifications <small style='color: red'>(You are using free version)</small>
  </h3>
  <p>Thank you for using the "Accordion FAQ with Category" free version. I Just wanted to see if you have any questions or concerns about my plugins. If you do, please do not hesitate to <a href="https://wordpress.org/support/plugin/accordion-faq-for-elementor/" target="_blank">file a bug report</a>.</p>
  <p>By the way, did you know we also have a <a href="https://www.wpmart.org/downloads/accordion-faq-with-category/" target="_blank">Premium Version</a>? It offers 20+ templates with exclusive CSS3 effects. It also comes with 16/7 personal support.</p>
  <p>Thank you Again!</p>
  <p></p>
</div>

<?php afaq_6310_faq_faq_install(); ?>