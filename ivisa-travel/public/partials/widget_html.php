<?php

$countries = '';
foreach($ivisa_countries as $code => $name){
  $countries .= '<option value="'.$code.'" data-country="">'.__($name,'ivisa').' ('.$code.')</option>';
}

if(!isset($args['size']) || !in_array($args['size'], array('wide','tall') ))
  $args['size'] = 'wide';
  
$plugin_options = get_option('ivisa');
if(!is_array($plugin_options))
  $plugin_options = array();

$affiliate_code = isset($plugin_options['affiliate_code'])? $plugin_options['affiliate_code']:'';

$optional_powered_by = '
      <div style="padding-top:10px">
        '.__('Powered by','ivisa').' <a target="_blank" href="https://www.ivisa.com/'.(strlen($affiliate_code)? '?utm_source='.$affiliate_code.'&utm_medium=wp_plugin':'').'">iVisa.com</a>
      </div>';

$ivisa_widget_html_var = '

<div class="ivisa-widget ivisa-widget-size-'.$args['size'].'">
      <span data-ivisa-affiliate="'.$affiliate_code.'" style="display:none"></span>
      <div>
        <h3 class="ivisa-themed-text" style="font-weight:normal; margin-bottom:3px;"><img class="ivisa-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkY1NjhBQ0Y0NzM2ODExRTdCODg3RDYyOTFCQ0JDNjM4IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkY1NjhBQ0Y1NzM2ODExRTdCODg3RDYyOTFCQ0JDNjM4Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RjU2OEFDRjI3MzY4MTFFN0I4ODdENjI5MUJDQkM2MzgiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RjU2OEFDRjM3MzY4MTFFN0I4ODdENjI5MUJDQkM2MzgiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5+lzuHAAAF9klEQVR42oxW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" /> '.
        __('Where am I From?','ivisa').'</h3>
        <div style="padding-left:30px; margin-bottom:5px">('.__('Nationality on Passport','ivisa').')</div>
      </div>

      
   <select name="from_country" class="ivisa-select" onchange="ivisa_select_changed(this)">
      <option value="">'.__('Choose Country', 'ivisa').'</option>
      ' . $countries .'
      
   </select>
   
   
      <div style="margin-top:5px">
        <h3 class="ivisa-themed-text" style="font-weight:normal; margin-bottom:3px"><img class="ivisa-icon" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTM4IDc5LjE1OTgyNCwgMjAxNi8wOS8xNC0wMTowOTowMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjNGRTczM0Y4NzM2OTExRTdCQjMxODlFMjI4MTBFNzgyIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjNGRTczM0Y5NzM2OTExRTdCQjMxODlFMjI4MTBFNzgyIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6M0ZFNzMzRjY3MzY5MTFFN0JCMzE4OUUyMjgxMEU3ODIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6M0ZFNzMzRjc3MzY5MTFFN0JCMzE4OUUyMjgxMEU3ODIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5iz1KZAAAFZklEQVR42rRVa2wUZRQ989xHd7vdR99YHmlpgWJ5aFIkKoqNP7BEEkVE+CHywwQBiSaGSFsp0ZiQECHBGJRUjQaJIuIPmmCpTShSEAgl0gBNC6UvutntvndnZ2ZnvLO70qp0/7HJ3ZnZ79t75p5z7v0YXY8j94cB4uF9h0/d37OvLxZiraKjsbb41tplpSvWlHMBmXboOf7NQiGAmSKVoC2JTZ+fGNvzzvkIYmbBEU0qOHL2TvWlodAFWiwW6UvIEXyw596M6DwLcDrcR0cUwCXCquvQBQ4RQcWJa97qrU+5NmjAQTVHBXwipM28yGSumkA3El2R4YPlWAMY49l9OQE4gZlxkWPSCkB82Botiln+mZwaPOLPIwfgU4kUwTCZYlMUWgoMqctaiAASNV1/Dg7+a1GOgjIakmUA7JU2IEk/MZTFLIARzVAjCqSxADQS08wZWjAZsAdJ9XTpeRRRZMRns+9hJDdTFGXBeVu1AwgnARNlshEYXJD9UXCxMGx1TkgTSlW8229YZ4pXAkxqOnwxHXV5DPyEYNz3+2VcHIpgno3DtuXOrAYpwpQpYrRLIb+DQtNgKxIN/zXt7opvuy4zcPJTNDisPPrHg2j+YWCPrmBHGb0+XREnuu8TiDek5BKZ7JfHQY+kmjd/62/97FYC+Xlsuisf8EyamalJOvonPJt+GjwYBppL8pm0llbi1CxOVcv/Sy4mreji8Hjk93XtMXdnlIOzgAOvZ5vsn530LJIRXHkCfrk8ivthee9XG2u4YpvQktL0h9jU+E2gW95Ue693uHPF0QF3Z5yD1ZRCWNKg6EzGaNM0UFUNk1EVJocZPbe9eK3tr2Z/Qm0ttIlkRn0agIFodLNTqO7t8Xas+H7U08dQYSkZgskq7apz+haZUwhO0YoQcT27xIb9q1woMfQTTbgxHETLqZtNEUlt8liEaQBWevN8rqrrt8DF50/6i8fImqCJ+WyVG0c21OzdVc5+YCWC5GkcJVUVLG/Bew2zv2xfaTrU4DJszGLQF8d3PUOtQVn5lbZVZ8c1dnWei115oT3smKQmKzTz2N4wN7B5ZcWi54T4p/ZgwBo02mc6RfSgkfuusJZrZY+7d555q6xt/5MFsFGjRmIyWs/cafzxdvQYbV3OXu6cXL/7j6g9JSlYVunE2/WzWl9d6HKPhJU+DIwZ1XAM93+zMWRllczldZHf8+1b3l9TWH9unWd4qVNE4m4EH3aMLv15Qm5ixyeTnGRm0biqQm/fsqDFYuZbBhO6vpYPwEwHjr04D6Ih2jRzaPTAUxXlRuda7IgTXXoscXHJksJlF172HHpzuQ2CosEnpYr58iLT4a1OR11VTekhSdLvjkZUNNbIqJ1vdKIFQ72hl4b9cRKcJx2MIWH0AEvuknC6P26y0Hi5aRJRn2BQwid9jEfc+cX60stt3XJdhY4/matne3FedqBoXhEWe0ToWgwLPZmG8w14O9Ydm1zdLekQmRQdahySSQ0BsqmF1eAxW/DGysqGx0psHWZaf8UdQ77kh6Tx+PqSgjlLSzN9oBEFQYnFLJtEyeXM+JLibTuO+1d3e5NgdBW1ZQXRb1+ff/zqxpIbq2j+GCfhsDeE62P+kzz0WbfDOg7cEjAiUyfzWnowU/uAJ63Ss9FjlWHhAtl5KNDAk4qujyRRUpWP+uK8s/VzXDsqnaa+Oe4C+xlW3/7NzfjH73b5cGkwZBPtQVsiIeNunKVcFuytiKX7NnMmqwyhsXh6rkznp/rggBRd/OmNzxS+6K4p/YhhUgeu3EvEI0kTTTQ1EhaZT7Y2lnfVubmDF/SCJxZUOzSFesfwAUs2n4gpdGbH0nn+FmAAFiRO2p+faI0AAAAASUVORK5CYII=" /> '.
        __('Where am I Going?','ivisa').'</h3>
        <div style="padding-left:30px; margin-bottom:5px">('.__('Travelling To','ivisa').')</div>
      </div>
      
      
     <select name="to_country" class="ivisa-select" onchange="ivisa_select_changed(this)">
      <option value="">'.__('Choose Country', 'ivisa').'</option>
      '.$countries.'
      
      </select>
      <br />
      '. ( (isset($plugin_options['show_powered_by']) && $plugin_options['show_powered_by'])? $optional_powered_by:'').'
      <div class="ivisa-overlay">
        <span class="ivisa-cancel" onclick="ivisa_close_modal(this)"></span>
        <div class="ivisa-popup">
          <span class="ivisa-close" onclick="ivisa_close_modal(this)">&times;</span>
          <div class="ivisa-widget-results">
           
          </div>
        </div>
      </div>
</div>
  

';


