<p>
  <?php Echo $this->t('Title:') ?>
  <input type="text" name="<?php Echo $this->get_field_name('title') ?>" value="<?php Echo HTMLSpecialChars($this->get_option('title')) ?>" />
</p>

<p>
  <?php Echo $this->t('Number of posts:') ?>
  <input type="text" name="<?php Echo $this->get_field_name('limit') ?>" value="<?php Echo $this->get_option('limit') ?>" size="4" />
</p>

<p>
  <?php Echo $this->t('Exclude:') ?>
  <input type="text" name="<?php Echo $this->get_field_name('exclude') ?>" value="<?php Echo HTMLSpecialChars($this->get_option('exclude')) ?>" /><br />
  <small><?php Echo $this->t('Post IDs, separated by commas.') ?></small>
</p>

<h3><?php Echo $this->t('Display') ?></h3>
<p>
  <input type="checkbox" name="<?php Echo $this->get_field_name('show_title') ?>" value="yes" <?php Checked($this->get_option('show_title'), 'yes') ?> />
  <?php Echo $this->t('Display the post title.') ?>
</p>

<p>
  <input type="checkbox" name="<?php Echo $this->get_field_name('show_date') ?>" value="yes" <?php Checked($this->get_option('show_date'), 'yes') ?> />
  <?php Echo $this->t('Display the post date.') ?>
</p>

<p>
  <input type="checkbox" name="<?php Echo $this->get_field_name('show_author') ?>" value="yes" <?php Checked($this->get_option('show_author'), 'yes') ?> />
  <?php Echo $this->t('Display the post author.') ?>
</p>

<p>
  <input type="radio" name="<?php Echo $this->get_field_name('show_content') ?>" value="full_content" <?php Checked($this->get_option('show_content'), 'full_content') ?> />
  <?php Echo $this->t('Display the full post content.') ?>
</p>

<p>
  <input type="radio" name="<?php Echo $this->get_field_name('show_content') ?>" value="excerpt" <?php Checked($this->get_option('show_content'), 'excerpt') ?> />
  <?php Echo $this->t('Display the excerpt.') ?>
</p>

<p>
  <input type="checkbox" name="<?php Echo $this->get_field_name('show_thumbnail') ?>" value="yes" <?php Checked($this->get_option('show_thumbnail'), 'yes') ?> />
  <?php Echo $this->t('Display a thumbnail image.') ?>
</p>

<p>
<?php Echo $this->t('Thumbnail adjustment:') ?>
<select name="<?php Echo $this->get_field_name('thumb_adjustment') ?>">
  <option value="none" <?php Selected($this->get_option('thumb_adjustment'), 'none') ?>><?php Echo $this->t('None') ?></option>
  <option value="left" <?php Selected($this->get_option('thumb_adjustment'), 'left') ?>><?php Echo $this->t('Left') ?></option>
  <option value="right" <?php Selected($this->get_option('thumb_adjustment'), 'right') ?>><?php Echo $this->t('Right') ?></option>
</select>
</p>

<p>
  <input type="radio" name="<?php Echo $this->get_field_name('show_content') ?>" value="none" <?php Checked($this->get_option('show_content'), 'none') ?> />
  <?php Echo $this->t('Do not display any content.') ?>
</p>

<p>
  <input type="checkbox" name="<?php Echo $this->get_field_name('show_more_link') ?>" value="yes" <?php Checked($this->get_option('show_more_link'), 'yes') ?> />
  <?php Echo $this->t('Display a link to the post.') ?>
</p>
