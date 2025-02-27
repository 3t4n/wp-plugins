<div class="wrap">
  <h2><?php echo get_admin_page_title(); ?></h2>
  <form action="" method="post">
  <?php
    $GLOBALS['Blocklist_Entries_List_Table']->display();
  ?>
  </form>
</div>