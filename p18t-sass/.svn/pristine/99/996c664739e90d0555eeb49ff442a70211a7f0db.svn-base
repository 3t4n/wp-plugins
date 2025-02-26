<div class="wrap">
<h2>P18T Sass</h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'p18t_sass_option_group' ); ?>
        <?php do_settings_fields('P18T Sass', 'p18t_sass_option_group');?>
        <table class="form-table">
            <tr>
                <th>
                    <label for="p18t_sass_scss_file">Scss / Sass Filename</label>
                </th>
                <td>
                    <input type="text" id="p18t_sass_scss_file" name="p18t_sass_scss_file" value="<?php echo get_option('p18t_sass_scss_file'); ?>" />
                    <p class="description">
                        Filename of your source file relative to current theme directory e.g.: <code>my-style.scss</code>
                    </p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="p18t_sass_css_file">CSS Filename</label>
                </th>
                <td>
                    <input type="text" id="p18t_sass_css_file" name="p18t_sass_css_file" value="<?php echo get_option('p18t_sass_css_file'); ?>" />
                    <p class="description">
                        Target File where PHamlP writes css content to; e.g.: <code>my-style.css</code>
                    </p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="p18t_sass_style">Style</label>
                </th>
                <td>
                    <select id="p18t_sass_style" name="p18t_sass_style">
                    <?php foreach ($styles as $style) { ?>
                        <option value="<?php echo $style; ?>"<?php selected( get_option('p18t_sass_style'), $style ); ?>><?php echo ucfirst($style);?></option>
                    <?php } ?>
                    </select>
                    <p class="description"> Use <code>Compressed</code> for minimal css file size</p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="p18t_sass_syntax">Syntax</label>
                </th>
                <td>
                    <select id="p18t_sass_syntax" name="p18t_sass_syntax">
                    <?php foreach ($syntaxes as $syntax) { ?>
                        <option value="<?php echo $syntax; ?>"<?php selected( get_option('p18t_sass_syntax'), $syntax ); ?>><?php echo ucfirst($syntax);?></option>
                    <?php } ?>
                    </select>
                    <p class="description">
                        Examples: <a target="_new" href="http://code.google.com/p/phamlp/#Sass">Sass</a>,
                                  <a target="_new" href="http://code.google.com/p/phamlp/#SCSS">Scss</a>
                    </p>
                </td>
            </tr>
            <tr>
                <th>
                    <label for="p18t_sass_depends">Depends On</label>
                </th>
                <td>
                    <input type="text" size="80" id="p18t_sass_depends" name="p18t_sass_depends" value="<?php echo get_option('p18t_sass_depends'); ?>" />
                    <p class="description">
                        Comma-separated list of stylesheets handles. Stylesheets that must be loaded before this stylesheet.<br />
                        See <a href="http://codex.wordpress.org/Function_Reference/wp_enqueue_style#Parameters">wp_enqueue_style</a>
                    </p>
                </td>
            </tr>
        </table>
        <?php submit_button();?>
    </form>
</div>