<?php

function affilicode_tag_input()
{
  global $post;
  echo "<p>▼head内出力タグ</p>";
  echo "<input type='hidden' name='affilicode_tag_noncename_h' id='affilicode_tag_noncename_h' value=".wp_create_nonce('password_h').">";
  echo "<textarea name='affilicode_tag_h' id='affilicode_tag_h' rows='6' cols='30' style='width:100%;' placeholder='コンテナタグを入力してください。'>".get_post_meta($post->ID,'affilicode_tag_h',true)."</textarea>";
  echo "<p>※コンテナタグを使用する場合、body内出力タグへの入力は不要です。</p>";
  echo "<br>";
  echo "<p>▼body内出力タグ</p>";
  echo "<input type='hidden' name='affilicode_tag_noncename_b' id='affilicode_tag_noncename_b' value=".wp_create_nonce('password_b').">";
  echo "<textarea name='affilicode_tag_b' id='affilicode_tag_b' rows='6' cols='30' style='width:100%;' placeholder='トラッキングタグを入力してください。'>".get_post_meta($post->ID,'affilicode_tag_b',true)."</textarea>";
}