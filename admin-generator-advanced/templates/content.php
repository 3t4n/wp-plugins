<div class="col-sm-9 agaBodyContent">
  <!-- settings container START -->
  <div class="agaSettingsContainer">
  <?php require_once(plugin_dir_path( __FILE__ ) .'../templates/settings.php'); ?>

  </div>
  <!-- settings container END -->
  <div class="row">
    <div class="col-sm-12">
      <?php require_once(plugin_dir_path( __FILE__ ) .'../templates/metaBoxes.php'); ?>

      {{content}}
    </div>
  </div>
</div>
