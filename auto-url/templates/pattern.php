<?php include('common/header.php'); ?>
<fieldset id="tokensWrapper">
    <div id="tokens">
        <div class="staticToken"><input type="text" value="Static Token" size="9" /></div>
        <div>%id%</div>
        <div>%name%</div>
        <div>%namepath%</div>
        <div>%category%</div>
        <div>%categories%</div>
        <div>%categorypath%</div>
        <div>%blogname%</div>
        <div>%tag%</div>
        <div>%tags%</div>
        <div>%author%</div>
        <div>%year%</div>
        <div>%monthnum%</div>
        <div>%day%</div>
        <div>%hour%</div>
        <div>%minute%</div>
        <div>%second%</div>
    </div>
</fieldset>
<fieldset>
    <legend>Instruction</legend>
    You can generate permalink/url for each post and page by defining patterns here. 
    Order matters. Tag has a higher precedence over category, if both tag pattern and category
    pattern is defined, a post will use tag url pattern, if it has tags. <b>You have to turn on permalink(Settings >> Permalinks) to use this plugin.</b>
</fieldset>
<fieldset>
    <legend>Post URL Patterns by Tag</legend>
    <div class="formRow">
        <?php foreach ($tags as $t) { ?>
            <div class="formRow patternRow">
                <label><?php echo $t->name; ?></label>
                <input type="text" name="p[tag][<?php echo $t->term_id; ?>]" value="<?php echo isset($patterns['tag'][$t->term_id]) ? $patterns['tag'][$t->term_id] : ''; ?>" />
            </div>
        <?php } ?>
    </div>
</fieldset>
<fieldset>
    <legend>Post URL Patterns by Category</legend>
    <?php echo auto_url_walk_category_tree($categories, $patterns); ?>
</fieldset>
<fieldset>
    <legend>Post/Page URL Patterns by Post Type</legend>
    <?php foreach ($types as $type => $o) { ?>
        <div class="formRow patternRow">
            <label><?php echo $o->label;?>:</label>
            <input type="text" name="p[type][<?php echo $type;?>]" value="<?php echo isset($patterns['type'][$type]) ? $patterns['type'][$type] : ''; ?>" />
        </div>
    <?php } ?>
</fieldset>
<fieldset>
    <div class="formRow">
        <input type="submit" class="button" name="action" value="Save" />
        <input type="submit" class="button" name="action" value="Bulk Generate URL" />
        <input type="submit" class="button delete" name="action" value="Remove All Generated URL" />
    </div>
</fieldset>
<fieldset>
    <legend>Pattern Tokens</legend>
    <strong>These tokens can be used within url pattern to generate dynamic urls.</strong>
    <div id="tokens">
        <div class="staticToken"><input type="text" value="Static Token" size="9" /></div>
        <div>%id%</div>
        <div>%name%</div>
        <div>%category%</div>
        <div>%categories%</div>
        <div>%categorypath%</div>
        <div>%blogname%</div>
        <div>%tag%</div>
        <div>%tags%</div>
        <div>%author%</div>
        <div>%year%</div>
        <div>%monthnum%</div>
        <div>%day%</div>
        <div>%hour%</div>
        <div>%minute%</div>
        <div>%second%</div>
    </div>
    <div class="formRow">
        <b>%id%</b>
        The unique ID # of the post, for example 423 
    </div>
    <div class="formRow">
        <b>%name%</b>
        A sanitized version of the title of the post.
    </div>
    <div class="formRow">
        <b>%namepath%</b>
        A sanitized version of the full title path of a page. Similar to %name% but shows the it's
        title path which includes title of it's parent. Only available to pages.
    </div>
    <div class="formRow">
        <b>%category%</b>
        A sanitized version of the category name. Uses only the first category.
    </div>
    <div class="formRow">
        <b>%categories%</b>
        A sanitized version of the all the category names.
    </div>
    <div class="formRow">
        <b>%categorypath%</b>
        A sanitized version of the category path name.
    </div>
    <div class="formRow">
        <b>%blogname%</b>
        A sanitized version of the blog name.
    </div>
    <div class="formRow">
        <b>%tag%</b>
        A sanitized version of the tag name. Uses only the first tag
    </div>
    <div class="formRow">
        <b>%tags%</b>
        A sanitized version of all the tag names.
    </div>
    <div class="formRow">
        <b>%author%</b>
        A sanitized version of the author name.
    </div>
    <div class="formRow">
        <b>%year%</b>
        The year of the post, four digits, for example 2004 
    </div>
    <div class="formRow">
        <b>%monthnum%</b>
        Month of the year, for example 05 
    </div>
    <div class="formRow">
        <b>%day%</b>
        Day of the month, for example 28 
    </div>
    <div class="formRow">
        <b>%hour%</b>
        Hour of the day, for example 15 
    </div>
    <div class="formRow">
        <b>%minute%</b>
        Minute of the hour, for example 43 
    </div>
    <div class="formRow">
        <b>%second%</b>
        Second of the minute, for example 33 
    </div>

</fieldset>
<?php include('common/footer.php'); ?>