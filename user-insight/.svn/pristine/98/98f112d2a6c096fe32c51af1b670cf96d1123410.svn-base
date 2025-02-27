<style>
  .hr {
    width: 98%;
    margin-left:1%;
    height: 1px;
    border-bottom: solid 1px #cccccc;
  }
  .mt-1 {
    margin-top: 15px;
  }
</style>
<div class="container-fluid mt-1">
  <div class="row">
    <?php if (isset($message)) { ?>
      <div class="alert <?php echo $message[0] ?>" role="alert"><?php echo $message[1]; ?></div>
    <?php } ?>
  </div>
  <div class="row mt-1">
    <a href="https://www.userlocal.jp" target="_blank"><img src="<?php echo plugins_url('../img/logo.png', __FILE__); ?>" /></a>
  </div>
  <div class="row mt-1">
    <div class="col-sm-3">
      <a class="btn btn-info" href="https://secure.userlocal.jp/ux/admin" target="_blank">解析結果を開く</a>
    </div>
  </div>
  <div class="row mt-1">
    <p>
      UserInsightの解析IDを入力して、登録ボタンを押してください。
      その後、UserInsightを確認いただくと解析結果をご覧になれます。
    </p>
    <p>
      ※ 解析結果の反映には時間がかかる場合がございます。
    </p>
  </div>
  <div class="row mt-1">
    <div class="col-sm-8">
      <!-- panel start -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">解析ID登録</h3>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="admin.php?page=<?php echo $plugin_path; ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label" for="analyticsId">解析ID</label>
              <div class="col-sm-8">
                <input id="analyticsId" class="form-control input-sm" type="text" name="analyticsId" value="<?php echo $analytics_id; ?>">
                <p class="help-block">※ 誤ったIDを設定すると計測が行われませんのでご注意ください。</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-offset-2 col-sm-10">
                <h5>- 解析IDの確認方法 -</h5>
                <ul>
                  <li>・<a href="https://secure.userlocal.jp/ux/admin" target="_blank">https://secure.userlocal.jp/ux/admin</a>にアクセスします。</li>
                  <li>・ログイン後の解析画面で右上に解析IDが表示されます。</li>
                </ul>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">登録</button>
              </div>
            </div>
            <?php wp_nonce_field('update_ui_id', 'update_ui_id_nonce'); ?>
          </form>
        </div>
      </div>
      <!-- panel end -->
    </div>
  </div>

  <div class="row mt-1">
    <div class="col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">解析タグへの自由記述</h3>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="admin.php?page=<?php echo $plugin_path; ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label" for="analyticsId">解析タグへの自由記述</label>
              <div class="col-sm-8">
                <textarea id="additionalTag" class="form-control input-sm" type="text" name="additionalTag"><?php echo $additionalTag; ?></textarea>
                <p class="help-block">※ 誤った記述を行うとサイトが表示できなくなる等の問題が発生する可能性があります。ヘルプ等をご覧の上、実際に必要な場合のみご利用ください。</p>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">登録</button>
              </div>
            </div>
            <?php wp_nonce_field('update_ui_add_tag', 'update_ui_add_tag_nonce'); ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-1">
    <div class="col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">解析ID登録解除</h3>
        </div>
        <div class="panel-body">
          <p>下記リンクから本プラグインを停止または削除してください。</p>
          <p><a href="<?php echo admin_url() . 'plugins.php'; ?>">プラグイン管理画面へ移動</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
