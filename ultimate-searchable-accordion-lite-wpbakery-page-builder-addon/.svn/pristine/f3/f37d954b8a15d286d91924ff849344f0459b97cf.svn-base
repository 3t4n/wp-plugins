<?php


class UsaVcLiteAdminNotice
{

  public function __construct()
  {

    add_action('admin_notices', [$this, 'displayUsaVcLiteAdminNotice']);
  }

  public function getAdminNoticeLists()
  {

    // Key MUST BE Unique. to be unique.
    // is-dismissible = display a close icon.
    // Classes: notice-success, notice-error, notice-warning. notice-info
    // display: 0, 1 [default: 1]

    return [];

    $noticeLists = [

      [
        'noticeClass' => 'notice-success is-dismissible',
        'msg' => '<strong style="color:green;">Sale ends soon: 50% off Premium.</strong> Upgrade <a href="' . USA_VC_PRO . '" class="bwl_activation_link"> Ultimate Searchable Accordion  - WPBakery Page Builder Addon</a> to pro version and <strong>unlock</strong> premium options, automatic update, official support, and many more.',
        'key' => 'usa_vc_upgrade_status',
        'display' => 1
      ]

    ];

    return $noticeLists;
  }

  public function displayUsaVcLiteAdminNotice()
  {

    foreach ($this->getAdminNoticeLists() as $notice) {

      $noticeDisplay = $notice['display'] ?? 1;

      if ($noticeDisplay == 1) {
        echo '<div class="notice ' . trim($notice['noticeClass']) . ' bwl_dn">
                <p>' . trim($notice['msg']) . '</p>
                <button utton type="button" class="notice-dismiss usa_vc_lite_remove_notice" data-key="' . $notice['key'] . '">
                <span class="screen-reader-text">Dismiss this notice.</span>
                </button>
              </div>';
      }
    }
  }
}

new UsaVcLiteAdminNotice();