<?php
/**
 * A pretty version of "print_r" function
 *
 * @param Array|stdClass $obj
 * @param string $title Optional.
 * @param bool $collapse Optional.
 * @return string Type returned.
 */

if( !function_exists('print_are') ) {

  function print_are($obj, $title = false, $collapse = false) {

    $template = '
<style>
.print_are,
.print_are * {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  min-height: 0;
  height: auto;
  font-family: monospace;
  line-height: normal;
}
.print_are {
  display: block;
  position: relative;
  width: 100%;
  padding: 10px;
}
.print_are .pre-wrap {
  background-color: white;
  color: black;
  border: 1px solid #333;
  border-radius: 2px;
  box-shadow: 0 0 5px #aaa;
  font-size: 14px;
  line-height: 16px;
  position: relative;
  text-align: left;
  overflow: auto;
  display: block;
}
.print_are .pre-header {
  padding: 10px 10px 9px;
  border-bottom: 1px solid #333;
}
.print_are .pre-obj-type,
.print_are .pre-actions a {
  font-size: 16px;
  font-weight: bold;
}
.print_are .pre-actions a {
  text-decoration: none;
  font-weight: normal;
  font-size: 14px;
}
.print_are .pre-actions a:hover {
  text-decoration: underline;
}
.print_are .pre-actions {
  float: right;
}
.print_are .pre-content {
  padding: 0;
  margin: 0;
  overflow: auto;
  background: #fff;
  border: none;
  border-radius: 0;
  box-shadow: none;
}
.print_are .pre-line,
.print_are .pre-lines,
.print_are .pre-content {
  font-size: 12px;
  line-height: normal;
}
.print_are .pre-lines {
  min-height: 20px;
}
.print_are .pre-lines[data-lines-count="1"] > li:empty::after {
  content: "(Empty)";
  color: #aaa;
  letter-spacing: 1px;
}
.print_are .pre-toggle-wrap .unwrap > span {
  display: none;
}
.print_are .wrap-lines .pre-toggle-wrap .unwrap > span {
  display: inline;
}
.print_are .wrap-lines .pre-content .pre-line {
  white-space: pre-wrap;
}
.print_are .pre-lines {
  display: block;
  background: #f2f2f2;
  border-left: 1px solid #333;
  padding: 2px 0;
}
.print_are .pre-line {
  padding: 2px 0 2px 4px;
}
.print_are .pre-line .key {
  cursor: pointer;
}
.print_are .pre-line.selected,
.print_are .pre-line:hover {
  background: #eec;
  font-weight: bold;
}
.print_are .pre-line.selected {
  box-shadow: 0 0 0 1px #ccc inset;
  margin: 1px;
}
</style>
<div class="print_are">
  <div class="pre-wrap">
    <div class="pre-header">
      <span class="pre-obj-type">{obj_type}</span>
      <div class="pre-actions">
        <a href="#" class="pre-toggle-wrap" onclick="Print_Are.TW(this, event);" title="Wrap/Unwrap Long Lines"><span class="unwrap"><span>UN-</span>WRAP</span></a>
        /
        <a href="#" class="pre-toggle-display" onclick="Print_Are.TD(this, event);" title="Show/Hide {obj_type}">{toggle_display_text}</a>
        <div style="clear:both"></div>
      </div>
    </div>
    <div style="clear:both"></div>
    <pre class="pre-content" style="padding-left: {padding_left}px; display: {obj_hide};"><ol class="pre-lines" data-lines-count="{lines_count}"><li class="pre-line" onclick="Print_Are.TB(this)">{obj_content}</li></ol></pre>
  </div>
</div>
<script>
if (typeof Print_Are !== "object") {
  var Print_Are = new Object;
  // Toggle Display
  Print_Are.TD = function(el, event) {
    event.preventDefault();
    var e = el.parentElement.parentElement.parentElement;
    var p = e.querySelector(".pre-content");
    if (p !== null) {
      if (p.style.display === "none") {
        el.innerHTML = "CLOSE";
        p.style.display = "block";
      } else {
        el.innerHTML = "OPEN";
        p.style.display = "none";
      }
    }
  }
  // Toggle Wrap
  Print_Are.TW = function(el, event) {
    event.preventDefault();
    var e = el.parentElement.parentElement.parentElement;
    if (e !== null) {
      var c = e.classList.contains("wrap-lines");
      if (c) {
        e.classList.remove("wrap-lines");
      } else {
        e.classList.add("wrap-lines");
      }
    }
  }
  // Toggle Bookmark
  Print_Are.TB = function(el) {
    el.classList.toggle("selected");
  }
  // Select Text
  Print_Are.ST = function(el) {
    el.parentElement.classList.add("selected");
    var range = document.createRange();
    var selection = window.getSelection();
    selection.removeAllRanges();
    range.selectNodeContents(el);
    selection.addRange(range);
  }
}
</script>';

    $obj_type = is_object($obj) ? 'Object (' . get_class($obj) . ')' : 'Array';
    $obj_type = $title ? "$obj_type - $title" : $obj_type;

    $obj_str = print_r($obj, true);
    // $obj_str = str_replace("    ", "  ", $obj_str); // tabsize = 2
    
    preg_match_all("/\[[^\]]*\]/", $obj_str, $matches);

    if( count($matches[0]) > 0 ) {

      $vars = array();

      foreach ($matches[0] as $match) {

        $val = str_replace(array('[',']'), '', $match);
        $vars["$match"] = "[<span class='key' title='Click to select text.' onclick='Print_Are.ST(this)'>$val</span>]";

      }

      $search = array_keys($vars);
      $replace = array_values($vars);

      $obj_str = str_replace($search, $replace, $obj_str);

    }

    $obj_arr = explode(PHP_EOL, $obj_str);
    $lines_count = count($obj_arr);
    $obj_content = implode("</li><li class='pre-line' onclick='Print_Are.TB(this)'>", $obj_arr);
    $obj_hide = $collapse ? 'none' : 'block';
    $toggle_display_text = $collapse ? 'OPEN' : 'CLOSE';
    $default_padding_left = 15;
    $padding_offset = 10;
    $line_count = (string) count($obj_arr);
    $count_length = (int) strlen($line_count);
    $padding_left = $default_padding_left + ($count_length * $padding_offset);

    $vars = array(
      '{lines_count}' => $lines_count,
      '{obj_hide}' => $obj_hide,
      '{obj_type}' => $obj_type,
      '{obj_content}' => $obj_content,
      '{padding_left}' => $padding_left,
      '{toggle_display_text}' => $toggle_display_text,
    );

    $search = array_keys($vars);
    $replace = array_values($vars);

    $output = str_replace($search, $replace, $template);

    echo $output;

  }

}

