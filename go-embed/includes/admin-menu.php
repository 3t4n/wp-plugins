<?php
/**
 *
 * @since      1.0.0
 * @package    go-embed
 * @subpackage go-embed/includes
 * @author    DelightinCode(delightincode.com)
 */

class Dlic_GoEmbed_Admin_Menu{
    public function init() {
        add_action('admin_menu', array($this,'dlic_go_embed_add_menu'));
	}
    public function dlic_go_embed_add_menu(){
        $menupage = esc_html__('GoEmbed', 'dlic-go-embed');
        add_menu_page($menupage, $menupage, 'manage_options', 'go-embed', array($this,'dlic_go_embed_page_content'), DLIC_GO_EMBED_LOGO);
    }
    public function dlic_go_embed_page_content(){ ?>
        <div class="dlic-jsapp__menupage">
            <div class="dlic-header-page">
                <img alt='jsapp-embed' class="dlic-logo-img" src="<?php echo esc_html(DLIC_GO_EMBED_LOGO); ?>">Go Embed
            </div>
            <div class="dlic-jsapp__container">
                <div class="content">
                    <h2 class="mui--text-headline"><?php echo __('Get started', 'dlic-go-embed'); ?></h2>
                    <p class="mui--text-body2"><?php echo __('You can use your own React Appplication or our example in', 'dlic-go-embed'); ?> <code>wp-content/plugins/go-embed/apps/my-app</code> 
                    </p>
                    <p class="mui--text-body2">
                        <?php echo __('We use', 'dlic-go-embed'); ?> <code>npx create-react-app</code> <?php echo __('to create', 'dlic-go-embed'); ?> <code>my-app</code>, <?php echo __('so you could do the same', 'dlic-go-embed'); ?>.
                    </p>
                    <p class="mui--text-body2"><?php echo __('In order to have your app integrated into WordPress, there are a few steps you need to follow:', 'dlic-go-embed'); ?></p>
                    <p class="mui--text-body2">
                        <h4><?php echo __('1. Place your existing or create a new ReactJS app in', 'dlic-go-embed'); ?></h4>
                        <ul>
                            <li class="mui--text-body1"><code>wp-content/plugins/go-embed/apps/</code></li>
                        </ul>
                    </p>
                    <p class="mui--text-body2">
                        <h4><?php echo __('2. Setup the app', 'dlic-go-embed'); ?></h4>
                        <p class="mui--text-body2"><?php echo __('You need a Module Bundler to build your app, in this case, you can use webpack, install it by running the command:', 'dlic-go-embed'); ?></p>
                        <ul>
                            <li>
                                <p class="mui--text-body2"><code>npm install webpack</code></p>
                            </li>
                            <li>
                                <p class="mui--text-body2">
                                    <?php echo __('Copy 2 files from our example app', 'dlic-go-embed'); ?> (<code>my-app</code>) <?php echo __('to your app:', 'dlic-go-embed'); ?>
                                </p>
                                <ul>
                                    <li class="mui--text-body1"><code>webpack.config.js</code>: <?php echo __('config webpack to build umd target', 'dlic-go-embed'); ?></li>
                                    <li><code>wpComponent.js</code>: <?php echo __('declare a global function to render React App', 'dlic-go-embed'); ?></li>
                                </ul>
                            </li>
                            <li>
                                <p class="mui--text-body2">
                                    <?php echo __('Edit package.json and add more script to build', 'dlic-go-embed'); ?>
                                </p>
                                <ul>
                                    <li><code>"buildwp": "webpack --config webpack.config.js",</code></li>
                                </ul>    
                            </li>
                        </ul>
                    </p>
                    <h2 class="mui--text-headline"><?php echo __('Develop JS Appplication', 'dlic-go-embed'); ?></h2>
                    <p class="mui--text-body2">
                        <?php echo __('Like other JS Application, you can do this:', 'dlic-go-embed'); ?>
                        <ul>
                            <li>
                                <code>npm install</code> <?php echo __('to install node modules', 'dlic-go-embed'); ?>
                            </li>
                            <li>
                                <code>npm run start</code> <?php echo __('to start and develop the app', 'dlic-go-embed'); ?>
                            </li>
                        </ul>
                    </p>

                    <p class="mui--text-body2">
                        <?php echo __('And then, use this script to build', 'dlic-go-embed'); ?>
                        <ul>
                            <li>
                                <code>npm run buildwp</code>
                            </li>
                        </ul>
                    </p>

                    <h2 class="mui--text-headline"><?php echo __('Usage', 'dlic-go-embed'); ?></h2>
                    <p class="mui--text-body2">
                    <?php echo __('We use the folder name is the unique id of each application.', 'dlic-go-embed'); ?>
                        <br>
                        <?php echo __('To embed the application into WordPress page, copy this shortcode', 'dlic-go-embed'); ?> <br>
                        <h5><code class="mui--bg-primary-light">[go-embed id='my-app']</code></h5>
                        <?php echo __('and embed to any WordPress content.', 'dlic-go-embed'); ?>
                        <br>
                        <?php echo __('Let replace', 'dlic-go-embed'); ?> <code>my-app</code> <?php echo __('by your application id.', 'dlic-go-embed'); ?>
                        <br>
                        <br>
                        <em><?php echo __('Notes', 'dlic-go-embed'); ?>:</em>
                        <br>
                        <em><?php echo __('- You will need to build the React App in order to see your changes.', 'dlic-go-embed'); ?></em>
                        <br>
                        <em><?php echo __('- Every time you re-build the React App, let refresh the WordPress page to see the updates', 'dlic-go-embed'); ?></em>
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
}

?>
