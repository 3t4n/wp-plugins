<li class="menu-item-page menu-item-edit-inactive pending">
    <dl class="menu-item-bar">
        <dt class="menu-item-handle">
            <span class="item-title">
                <span class="menu-item-title"><?php echo $name; ?></span>
                <span class="is-submenu" style="display: none;">sub item</span>
            </span>
            <span class="item-controls">
                <span class="item-type">Page</span>
                <span class="item-order hide-if-js">
                    <a href="#" class="item-move-up"><abbr title="Move up">↑</abbr></a>
                    |
                    <a href="#" class="item-move-down"><abbr title="Move down">↓</abbr></a>
                </span>
                <a class="item-edit" title="<?php echo $name; ?>" href="#"><?php echo $name; ?></a>
            </span>
        </dt>
    </dl>
    <div class="menu-item-settings menu-item-settings-wide">
        <div class="menu-item-actions description-wide submitbox">
            <p class="link-to-original">Original: <a href="<?php echo $this -> sanitize_link($link, 'page'); ?>"><?php echo $orig; ?></a></p>
            <input type="hidden" name="<?php echo $this -> pre; ?>menu[<?php echo $index; ?>][link]" value="<?php echo $link; ?>" />
            <input type="hidden" name="<?php echo $this -> pre; ?>menu[<?php echo $index; ?>][orig]" value="<?php echo $orig; ?>" />
            <input type="hidden" name="<?php echo $this -> pre; ?>menu[<?php echo $index; ?>][index]" value="<?php echo $index; ?>" />
            <input type="hidden" name="<?php echo $this -> pre; ?>menu[<?php echo $index; ?>][type]" value="page" />
            <a class="item-delete submitdelete deletion" href="#">Remove</a> <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js" href="#">Cancel</a>
        </div>
    </div>
    <div class="menu-item-settings">
        <p class="description description-wide">
            <label for="edit-menu-item-title-<?php echo $index; ?>">Label<br>
                <input type="text" id="edit-menu-item-title-<?php echo $index; ?>" class="widefat edit-menu-item-title" name="<?php echo $this -> pre; ?>menu[<?php echo $index; ?>][name]" value="<?php echo $name; ?>">
            </label>
        </p>
        <p class="field-move hide-if-no-js description description-wide" style="display: none;">
            <label>
                <span>Move</span>
                <a href="#" class="menus-move menus-move-up" data-dir="up" style="display: none;">Up one</a>
                <a href="#" class="menus-move menus-move-down" data-dir="down" style="display: none;">Down one</a>
                <a href="#" class="menus-move menus-move-top" data-dir="top" style="display: none;">To the top</a>
            </label>
        </p>
    </div>
    <div class="menu-item-settings">
        <p class="description description-wide">
            <label for="edit-menu-item-allow-<?php echo $index; ?>">
                <input id="edit-menu-item-allow-<?php echo $index; ?>" class="menu-item-allow" type="checkbox" name="<?php echo $this->pre; ?>menu[<?php echo $index; ?>][allow]" <?php if(! empty($allow)): ?>checked<?php endif; ?> />
                <span><strong>SHOW BELOW ROLE LIMIT</strong></span>
            </label>
        </p>
        <hr />
        <p class="description description-wide">
            <textarea name="<?php echo $this->pre; ?>menu[<?php echo $index; ?>][instructions]" placeholder="INSTRUCTIONS FOR USER..." maxlength="200"><?php echo $instructions; ?></textarea>
        </p>
        <p>Limited to 140 characters. Links visibility for lower roles maybe restricted.</p>
    </div>
</li>