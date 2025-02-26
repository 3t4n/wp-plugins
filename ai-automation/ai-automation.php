<?php
/*
Plugin Name: AI-Automation-記事生成
Plugin URI: https://ytechnologies.info/ai-automation-article-generator/
Description: ChatGPTを利用してSEOに最適化された記事を自動生成するWordPressプラグイン
Version: 1.0
Author: Y Technologies Co., Ltd.
Author URI: https://ytechnologies.info
License: GPL2
*/

// セキュリティ対策：直接アクセスを防ぐ
if (!defined('ABSPATH')) {
    exit;
}

// エラーハンドリングクラス
class AI_Article_Generator_Error extends WP_Error {
    public function __construct($code = '', $message = '', $data = '') {
        parent::__construct($code, $message, $data);
    }

    public function log() {
        error_log('AI Article Generator Error: ' . $this->get_error_message());
    }
}

// プラグインのメインクラス
class AI_Article_Generator {
    public function __construct() {
        // アクションとフィルターのセットアップ
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('wp_ajax_generate_article', array($this, 'generate_article'));
    }

    // エラーハンドリング
    private function handle_error($error) {
        if ($error instanceof AI_Article_Generator_Error) {
            $error->log();
            wp_die(esc_html($error->get_error_message()), 'AI Article Generator Error', array('response' => 500));
        }
    }

    // 管理メニューの追加
    public function add_admin_menu() {
        $hook_suffix = add_menu_page(
            'AI記事生成',
            'AI記事生成',
            'manage_options',
            'ai-article-generator',
            array($this, 'display_admin_page'),
            'dashicons-edit',
            6
        );
        add_action("admin_print_scripts-{$hook_suffix}", array($this, 'enqueue_admin_scripts'));
    }

    // 管理画面用スクリプトのエンキュー
    public function enqueue_admin_scripts() {
        wp_enqueue_script('ai-article-generator-admin', plugins_url('admin.js', __FILE__), array('jquery'), '1.0', true);
        wp_localize_script('ai-article-generator-admin', 'aiArticleGenerator', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('ai_article_generator_nonce')
        ));
    }

    // 設定の登録
    public function register_settings() {
        register_setting('ai_article_generator_options', 'ai_article_api_key', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('ai_article_generator_options', 'ai_article_theme', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('ai_article_generator_options', 'ai_article_prompt', array(
            'sanitize_callback' => 'sanitize_textarea_field'
        ));
        register_setting('ai_article_generator_options', 'ai_article_tone', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        register_setting('ai_article_generator_options', 'ai_article_publish_option', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
    }

    // 管理画面の表示
    public function display_admin_page() {
        if (isset($_GET['error'])) {
            $error_message = sanitize_text_field($_GET['error']);
            echo '<div class="error"><p>' . esc_html($error_message) . '</p></div>';
        }
        ?>
        <div class="wrap">
            <h1>AI記事生成</h1>
            <form method="post" action="options.php">
                <?php settings_fields('ai_article_generator_options'); ?>
                <?php do_settings_sections('ai_article_generator_options'); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">APIキー</th>
                        <td><input type="password" name="ai_article_api_key" value="<?php echo esc_attr(get_option('ai_article_api_key')); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">テーマ</th>
                        <td><input type="text" name="ai_article_theme" value="<?php echo esc_attr(get_option('ai_article_theme')); ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">プロンプト（追加指示）</th>
                        <td>
                            <textarea name="ai_article_prompt" rows="5" cols="50" placeholder="記事に含めたい特定の情報や、強調したいポイントがあれば入力してください。"><?php echo esc_textarea(get_option('ai_article_prompt')); ?></textarea>
                            <p class="description">テーマ、トーン、構造以外の追加指示を入力してください。例：「最新の統計データを含める」「特定の製品やサービスについて言及する」など</p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">記事のトーン</th>
                        <td>
                            <select name="ai_article_tone">
                                <option value="formal" <?php selected(get_option('ai_article_tone'), 'formal'); ?>>フォーマル</option>
                                <option value="casual" <?php selected(get_option('ai_article_tone'), 'casual'); ?>>カジュアル</option>
                                <option value="professional" <?php selected(get_option('ai_article_tone'), 'professional'); ?>>専門的</option>
                                <option value="friendly" <?php selected(get_option('ai_article_tone'), 'friendly'); ?>>親しみやすい</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">公開設定</th>
                        <td>
                            <input type="radio" name="ai_article_publish_option" value="draft" <?php checked(get_option('ai_article_publish_option'), 'draft'); ?>> 下書き保存
                            <input type="radio" name="ai_article_publish_option" value="publish" <?php checked(get_option('ai_article_publish_option'), 'publish'); ?>> 自動公開
                        </td>
                    </tr>
                </table>
                <?php submit_button('設定を保存'); ?>
            </form>
            <button id="generate-article" class="button button-primary">記事を生成</button>
            <div id="loading" style="display: none;">
                <p>記事を生成中です。しばらくお待ちください...</p>
                <div class="spinner is-active" style="float: none;"></div>
            </div>
            <div id="result" style="display: none; margin-top: 20px;"></div>
        </div>
        <?php
    }

    // 記事生成機能
    public function generate_article() {
        check_ajax_referer('ai_article_generator_nonce', 'nonce');

        try {
            $api_key = get_option('ai_article_api_key');
            if (empty($api_key)) {
                throw new AI_Article_Generator_Error('api_key_missing', 'APIキーが設定されていません。');
            }

            $theme = get_option('ai_article_theme');
            $prompt = get_option('ai_article_prompt');
            $tone = get_option('ai_article_tone');

            if (empty($theme) || empty($prompt) || empty($tone)) {
                throw new AI_Article_Generator_Error('missing_parameters', '必要なパラメータが不足しています。');
            }

            $system_message = "あなたはSEOに強い記事を作成するAIです。以下の要件を厳密に守ってください：
1. テーマは「{$theme}」です。このキーワードを記事中に最低5回使用してください。
2. 記事のトーンは「{$tone}」です。
3. 最低3つの見出し（H2またはH3）を使用してください。
4. 各段落は2-3文で構成し、読みやすさを重視してください。
5. メタディスクリプション用の記事概要（120文字以内）を最後に追加してください。";

            $user_message = "以下の構造で、「{$theme}」についての記事を書いてください：

1. 導入部：テーマの概要と記事の目的
2. 本文（最低3つのセクション）：
   - 各セクションは見出しで始まること
   - テーマに関連する重要なポイントを説明
   - 具体例や統計データを含める
3. まとめ：主要ポイントの要約と読者へのアクション喚起
4. メタディスクリプション

追加の指示：{$prompt}";

            $response = wp_remote_post('https://api.openai.com/v1/chat/completions', array(
                'headers' => array(
                    'Authorization' => 'Bearer ' . $api_key,
                    'Content-Type' => 'application/json',
                ),
                'body' => json_encode(array(
                    'model' => 'gpt-4',
                    'messages' => array(
                        array('role' => 'system', 'content' => $system_message),
                        array('role' => 'user', 'content' => $user_message),
                    ),
                    'temperature' => 0.7,
                    'max_tokens' => 2000,
                )),
                'timeout' => 60, // タイムアウトを60秒に設定
            ));

            if (is_wp_error($response)) {
                throw new AI_Article_Generator_Error('api_request_failed', 'APIリクエストエラー: ' . $response->get_error_message());
            }

            $body = json_decode(wp_remote_retrieve_body($response), true);
            
            if (isset($body['error'])) {
                throw new AI_Article_Generator_Error('api_error', 'API エラー: ' . $body['error']['message']);
            }

            if (!isset($body['choices'][0]['message']['content'])) {
                throw new AI_Article_Generator_Error('invalid_response', 'APIからの無効なレスポンス');
            }

            $generated_content = $body['choices'][0]['message']['content'];

            // 重複チェック
            if ($this->check_duplicate_content($generated_content)) {
                throw new AI_Article_Generator_Error('duplicate_content', '類似の記事が既に存在します。手動で調整してください。');
            }

            // 記事を投稿
            $post_id = wp_insert_post(array(
                'post_title' => $theme,
                'post_content' => $generated_content,
                'post_status' => get_option('ai_article_publish_option'),
            ));

            if (!$post_id) {
                throw new AI_Article_Generator_Error('post_creation_failed', '記事の作成に失敗しました。');
            }

            $post_url = get_permalink($post_id);
            $status = get_option('ai_article_publish_option') === 'publish' ? '公開' : '下書き保存';
            $message = "記事が正常に生成され、{$status}されました。<a href='{$post_url}' target='_blank'>記事を確認する</a>";

            wp_send_json_success($message);

        } catch (AI_Article_Generator_Error $e) {
            wp_send_json_error($e->get_error_message());
        } catch (Exception $e) {
            wp_send_json_error('予期せぬエラーが発生しました: ' . $e->getMessage());
        }
    }

    // 記事の重複チェック
    public function check_duplicate_content($content) {
        try {
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );

            $posts = get_posts($args);

            if (is_wp_error($posts)) {
                throw new AI_Article_Generator_Error('post_retrieval_failed', '既存の投稿の取得に失敗しました。');
            }

            foreach ($posts as $post) {
                $similarity = $this->calculate_similarity($content, $post->post_content);
                if ($similarity > 0.7) {  // 70%以上の類似度を重複とみなす
                    return true;
                }
            }

            return false;
        } catch (Exception $e) {
            $this->handle_error(new AI_Article_Generator_Error('duplicate_check_failed', '重複チェック中にエラーが発生しました: ' . $e->getMessage()));
        }
    }

    private function calculate_similarity($str1, $str2) {
        $str1 = strtolower($str1);
        $str2 = strtolower($str2);
        
        $distance = levenshtein($str1, $str2);
        $maxLength = max(strlen($str1), strlen($str2));
        
        return 1 - ($distance / $maxLength);
    }
}

// プラグインのインスタンス化
$ai_article_generator = new AI_Article_Generator();