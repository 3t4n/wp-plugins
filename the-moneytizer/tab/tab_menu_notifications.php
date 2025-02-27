<button type="button" class="btn btn-primary themoneytizer_badge" onClick="jQuery_money('#notifModal').modal('toggle')">
    Notifications <span style="color: #db0436; background: #fff!important" class="badge bg-secondary"><?= json_decode(get_option('themoneytizer_user_notifications')) ? count(json_decode(get_option('themoneytizer_user_notifications'))) : 0 ?></span>
</button>
<div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="notifModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="text-align: left;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5><?php _e('Mes notifications','themoneytizer');?><br/></h5>
        <button type="button" class="close btn-close-m" data-dismiss="modal" aria-label="Close" onClick="jQuery_money('#notifModal').modal('toggle')"></button>
      </div>
      <div class="modal-body">
        <?php $list_notifications = json_decode(get_option('themoneytizer_user_notifications'));
        if(count($list_notifications)<1){
            echo"<p class=\"mid-size\">"; _e("Vous n'avez pas de notification",'themoneytizer'); echo"</p>";
        } else {
            foreach($list_notifications as $notification) { ?>
            <div class="notif-container-themoney">
                <div class="notif-head-themoney">
                    <div class="notif-title-themoney">
                        <h4><?= $notification->swn_title?></h4>
                    </div>
                <p><?= $notification->swn_message?></p>
                </div>
            </div>
            <?php }
        } ?>
      </div>
    </div>
  </div>
</div>