<div class="Header" style="display:none">
  <div class="Navbar clearfix">
    <div class="pull-left">
      <ul class="list-inline">
        <li>
          <a href="<?php echo admin_url('admin.php?page=anyguide-manage');?>">
            <img src="<?php echo plugins_url('assets/images/anyguide_logo.png', dirname(__FILE__)) ?>" class="img-responsive" style="height: 40px;">
          </a>
        </li>
      </ul>
    </div>

    <div class="pull-right">
      <ul class="list-inline">
        <li class="navbtn">
          <a href="<?php echo admin_url('admin.php?page=anyguide-settings');?>">Settings</a>
        </li>

        <li class="navbtn">
          <a href="<?php echo admin_url('admin.php?page=anyguide-help');?>">
            <i class="fa fa-question"></i> Help
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>


<section class="anyroad-navbar">
  <a href="<?php echo admin_url('admin.php?page=anyguide-manage');?>">
    <img src="<?php echo plugins_url('assets/images/anyguide_logo.png', dirname(__FILE__)) ?>">
  </a>

  <p>
    <a href="<?php echo admin_url('admin.php?page=anyguide-settings');?>" style="margin-right: 5px;">
      Settings
    </a>

    <a href="<?php echo admin_url('admin.php?page=anyguide-help');?>">
      Help
    </a>
  </p>
</section>