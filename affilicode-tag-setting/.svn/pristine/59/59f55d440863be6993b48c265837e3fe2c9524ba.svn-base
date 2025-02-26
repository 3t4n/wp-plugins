<?php

function affilicode_save_h($post_id)
{
  if(!wp_verify_nonce($_POST["affilicode_tag_noncename_h"], "password_h")) return $post_id;
  if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) return $post_id;
  $affilicode_tag_h = esc_html($_POST["affilicode_tag_h"]);
  update_post_meta($post_id, "affilicode_tag_h", $affilicode_tag_h);
}

function affilicode_save_b($post_id)
{
  if(!wp_verify_nonce($_POST["affilicode_tag_noncename_b"], "password_b")) return $post_id;
  if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE) return $post_id;
  $affilicode_tag_b = esc_html($_POST["affilicode_tag_b"]);
  update_post_meta($post_id, "affilicode_tag_b", $affilicode_tag_b);
}