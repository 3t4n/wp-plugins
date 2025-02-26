<?php

	global $wpdb;
	// Load the options

	if($_POST) {

	$_POST = anyguide_trim_deep($_POST);
	$_POST = stripslashes_deep($_POST);

	$anyguide_limit = abs(intval($_POST['anyguide_limit']));
	update_option('anyguide_limit',$anyguide_limit);
	?>

	<div class="AnyNotification clearfix" id="system_notice_area">
		<div class="pull-left Message">
			<i class="fa fa-info-circle"></i> Settings updated successfully.
		</div>
		<div class="pull-right Close">
			<span id="system_notice_area_dismiss">
				<i class="fa fa-times-circle"></i> Close
			</span>
		</div>
	</div>
<?php } ?>

<div class="AnyguideWrapper">
  <div class="AnySection">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

        	<br>

        	<form class="form-horizontal" method="post">
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">Pagination Limit</label>
					    <div class="col-sm-10">
					    <input  class="form-control" name="anyguide_limit" type="text" id="anyguide_limit" value="<?php if(isset($_POST['anyguide_limit']) ){echo abs(intval($_POST['anyguide_limit']));}else{print(get_option('anyguide_limit'));} ?>" />
					      <span id="helpBlock" class="help-block">
					      	Define how many snippets you want to be shown before paginating them.
					      </span>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="ar-button" id="trackChangeSettings"><i class="fa fa-check-circle"></i> Update Settings</button>
					    </div>
					  </div>
					</form>

        </div>
      </div>
    </div>
  </div>
</div>