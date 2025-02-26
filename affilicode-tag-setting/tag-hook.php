<?php

function affilicode_tag_hook()
{
  add_meta_box("affilicode_tag", "アフィリコード・システムで発行したトラッキングタグを貼り付けてください。", "affilicode_tag_input", "post", "normal", "high");
  add_meta_box("affilicode_tag", "アフィリコード・システムで発行したトラッキングタグを貼り付けてください。", "affilicode_tag_input", "page", "normal", "high");
}