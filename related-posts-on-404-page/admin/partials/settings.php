<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the 
 * admin-facing settings page for the plugin.
 *
 * PHP Version 7.4.9
 * 
 * @category   WordPress_Plugin
 * @package    Related_Posts_404
 * @subpackage Related_Posts_404/admin/partials
 * @author     Ahmad Karim <ahmu83@gmail.com>
 * @license    https://opensource.org/licenses/GPL-2.0 GPL-2.0+
 * @link       https://ahmadkarim.com/
 * @since      1.0.0
 */

?>

<div class="wrap related-posts-404">
  <div class="form-container">
    <form method="post" action="<?php echo $action ?>" novalidate="novalidate">
      <h2>Post types (builtin & registered)</h2>
      <p>Selected post types will be used to show related posts from on the 404 page</p>

      <?php if (count($errors) > 0) : ?>
        <div class="notice notice-error is-dismissible">
          <?php foreach ($errors as $error) : ?>
            <p><strong>Error</strong>: <?php echo $error ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if (count($success) > 0) : ?>
        <div class="notice notice-success is-dismissible">
          <?php foreach ($success as $msg) : ?>
            <p><strong>Success</strong>: <?php echo $msg ?></p>
          <?php endforeach; ?>
          <button type="button" class="notice-dismiss">
            <span class="screen-reader-text">Dismiss this notice.</span>
          </button>
        </div>
      <?php endif; ?>

      <table class="form-table" role="presentation">
        <tbody>
          <tr>
            <th scope="row">
              <label for="post_types">Post types</label>
            </th>
            <td>

              <select id="post_types" name="post_types[]" multiple>
                <?php foreach ($post_types as $k => $v): ?>
                  <option value="<?php echo $k ?>"<?php echo in_array($k, $rpp_post_types) ? ' selected="selected"' : '' ?>><?php echo $v ?></option>
                <?php endforeach ?>
              </select>

              <br><br>

              <a href="#" class="select-all">Select all</a> <small>(CMD/CTRL + Click to select multiple)</small>

              <br>
              <br>

              <p>Select at least one post type from the list to show related posts.</p>

              <?php if (count($rpp_post_types) > 0): ?>
                <br>
                <p><strong><em>Related posts on your 404 page will be displayed from these selected post types: </em></strong></p>
                <ol class="registered-post-types">
                  <?php foreach ($rpp_post_types as $p): ?>
                    <li>
                      <a href="<?php echo admin_url('edit.php?post_type=' . $p) ?>" target="_blank"><?php echo $post_types[$p] ?></a>
                    </li>
                  <?php endforeach ?>
                </ol>
              <?php else: ?>
                <br>
                <p><strong><em>No related posts will be displayed on your 404 page</em></strong></p>
              <?php endif; ?>
            </td>
          </tr>
        </tbody>
      </table>

      <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
      </p>

      <input type="hidden" name="nonce" value="<?php echo $nonce ?>">

    </form>
  </div>

  <div class="sidebar-container">
    <?php require_once 'sidebar.php' ?>
  </div>

</div>

<style type="text/css"><?php require_once 'styles.css' ?></style>
<script type="text/javascript" charset="utf-8"><?php require_once 'scripts.js' ?></script>
