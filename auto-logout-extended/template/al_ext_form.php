<?php if ( isset( $al_ext_type, $expire_date, $force_logout, $force_logout_url, $default_logout_url ) ): ?>
    <div class="wrap">
    <h2>ログアウト拡張</h2>
    <p>「ログイン状態を保存する」がチェック時のログアウト機能を拡張します。</p>
    <form action="" method="post">
		<?php wp_nonce_field( 'al_ext_options', '_al_ext_nonce' ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><label for="inputtext">ログアウトタイプ</label></th>
                <td>
                    <div class="logout-type">
                        <label>
                            <input type="radio" class="logout-type_radio" name="_al_ext[type]"
                                   value="1" <?php checked( $al_ext_type, 1 ); ?>>標準ログアウト
                        </label>
                        <div class="logout-exp">
                            <p>&#9679;<strong>「自動ログアウト時間」内にログアウトせずブラウザ終了した場合</strong>
                                <br>&#8658;ログイン状態は「ログイン状態の保存期間」に応じた日数で保存します
                            </p>
                        </div>
                    </div>
                    <div class="logout-type">
                        <label>
                            <input type="radio" class="logout-type_radio" name="_al_ext[type]"
                                   value="2" <?php checked( $al_ext_type, 2 ); ?>>自動ログアウト
                        </label>
                        <div class="logout-exp">
                            <p>&#9679;<strong>ログイン後の無操作時間が「自動ログアウト時間」を超えた場合</strong><br>&#8658;自動ログアウトします</p>
                        </div>
                    </div>
                    <div class="logout-type">
                        <label>
                            <input type="radio" class="logout-type_radio" name="_al_ext[type]"
                                   value="3" <?php checked( $al_ext_type, 3 ); ?>>拡張ログアウト
                        </label>
                        <div class="logout-exp">
                            <p>&#9679;<strong>ログイン後の無操作時間が「自動ログアウト時間」を超えた場合</strong><br>&#8658;自動ログアウトします</p>
                            <p>&#9679;<strong>「自動ログアウト時間」内にログアウトせずブラウザ終了した場合</strong>
                                <br>&#8658;ログイン状態は「ログイン状態の保存期間」に応じた日数で保存します
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">ログイン状態の保存期間</th>
                <td>
                    <input type="number" class="expire-date" name="_al_ext[expire_date]"
                           value="<?php echo esc_attr( $expire_date ); ?>" min="1" max="500"> 日（1〜500日）
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">自動ログアウト時間</th>
                <td>
                    <input type="number" class="force-logout" name="_al_ext[force_logout]"
                           value="<?php echo esc_attr( $force_logout ); ?>" min="1" max="120"> 分（1〜120分）
                    <div id="logout-exclude-users">
                        自動ログアウト除外ユーザ
						<?php include_once al_ext_config::AL_EXT_TEMPLATE_DIR . 'al_ext_user.php'; ?>
                    </div>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">ログアウトのリダイレクトURL</th>
                <td>
                    <input type="url" class="logout-redirect-url" name="_al_ext[force_logout_url]"
                           value="<?php echo esc_attr( $force_logout_url ); ?>"
                           placeholder="<?php echo esc_attr( $default_logout_url ); ?>">
                </td>
            </tr>
        </table>
        <p class="submit"><input type="submit" name="Submit" class="button-primary" value="変更を保存"/></p>
    </form>
<?php endif; ?>