<?php $style = get_option('h2cweb_style');
$txt = ''; $stl = '';

if($style['font'] && $style['font'] != '') {$stl .= 'font-family:'.$style['font'].';';}
if($style['color'] && $style['color'] != '') {$stl .= 'color:#'.$style['color'].';';}
if($style['size'] && $style['size'] != '') {$stl .= 'font-size:'.$style['size'].'px;';}
if($style['bgcolor'] && $style['bgcolor'] != '') {$stl .= 'background-color:#'.$style['bgcolor'].';';}
if($style['bgpic'] && $style['bgpic'] != '') {$stl .= 'background-image:url('.$style['bgpic'].');';}
$txt .= '.ep-wrap{'.$stl.'}'; $stl = '';
if($style['title']['bgcolor'] && $style['title']['bgcolor'] != '') {$stl .= 'background-color:#'.$style['title']['bgcolor'].';';}
if($style['title']['bgpic'] && $style['title']['bgpic'] != '') {$stl .= 'background-image:url('.$style['title']['bgpic'].');';}
$txt .= '#ep-title-wrap{'.$stl.'}'; $stl = '';
if($style['title']['font'] && $style['title']['font'] != '') {$stl .= 'font-family:'.$style['title']['font'].';';}
if($style['title']['color'] && $style['title']['color'] != '') {$stl .= 'color:#'.$style['title']['color'].';';}
if($style['title']['size'] && $style['title']['size'] != '') {$stl .= 'font-size:'.$style['title']['size'].'px;';}
$txt .= 'h2.ep-title{'.$stl.'}'; $stl = '';
if($style['date']['font'] && $style['date']['font'] != '') {$stl .= 'font-family:'.$style['date']['font'].';';}
if($style['date']['color'] && $style['date']['color'] != '') {$stl .= 'color:#'.$style['date']['color'].';';}
if($style['date']['size'] && $style['date']['size'] != '') {$stl .= 'font-size:'.$style['date']['size'].'px;';}
$txt .= '#ep-title-wrap p{'.$stl.'}'; $stl = '';
if($style['tap']['bgpic'] && $style['tap']['bgpic'] != '') {$stl .= 'background-image:url('.$style['tap']['bgpic'].');';}
$txt .= '#ep-thumb-wrap .ep-tap{'.$stl.'}'; $stl = '';
if($style['desc']['font'] && $style['desc']['font'] != '') {$stl .= 'font-family:'.$style['desc']['font'].';';}
if($style['desc']['color'] && $style['desc']['color'] != '') {$stl .= 'color:#'.$style['desc']['color'].';';}
if($style['desc']['size'] && $style['desc']['size'] != '') {$stl .= 'font-size:'.$style['desc']['size'].'px;';}
if($style['desc']['bgcolor'] && $style['desc']['bgcolor'] != '') {$stl .= 'background-color:#'.$style['desc']['bgcolor'].';';}
if($style['desc']['bgpic'] && $style['desc']['bgpic'] != '') {$stl .= 'background-image:url('.$style['desc']['bgpic'].');';}
$txt .= '.ep-content-hold{'.$stl.'}'; $stl = '';
if($style['credit']['font'] && $style['credit']['font'] != '') {$stl .= 'font-family:'.$style['credit']['font'].';';}
if($style['credit']['color'] && $style['credit']['color'] != '') {$stl .= 'color:#'.$style['credit']['color'].';';}
if($style['credit']['size'] && $style['credit']['size'] != '') {$stl .= 'font-size:'.$style['credit']['size'].'px;';}
if($style['credit']['bgcolor'] && $style['credit']['bgcolor'] != '') {$stl .= 'background-color:#'.$style['credit']['bgcolor'].';';}
if($style['credit']['bgpic'] && $style['credit']['bgpic'] != '') {$stl .= 'background-image:url('.$style['credit']['bgpic'].');';}
$txt .= '.ep-crewcast-hold{'.$stl.'}'; $stl = '';
if($style['credita']['font'] && $style['credita']['font'] != '') {$stl .= 'font-family:'.$style['credita']['font'].';';}
if($style['credita']['color'] && $style['credita']['color'] != '') {$stl .= 'color:#'.$style['credita']['color'].';';}
$txt .= '.ep-crew a{'.$stl.'}'; $stl = '';
if($style['cmnt']['font'] && $style['cmnt']['font'] != '') {$stl .= 'font-family:'.$style['cmnt']['font'].';';}
if($style['cmnt']['color'] && $style['cmnt']['color'] != '') {$stl .= 'color:#'.$style['cmnt']['color'].';';}
if($style['cmnt']['size'] && $style['cmnt']['size'] != '') {$stl .= 'font-size:'.$style['cmnt']['size'].'px;';}
if($style['cmnt']['bgcolor'] && $style['cmnt']['bgcolor'] != '') {$stl .= 'background-color:#'.$style['cmnt']['bgcolor'].';';}
if($style['cmnt']['bgpic'] && $style['cmnt']['bgpic'] != '') {$stl .= 'background-image:url('.$style['cmnt']['bgpic'].');';}
$txt .= '.ep-cmnt-hold{'.$stl.'}'; $stl = '';
if($style['cmnta']['color'] && $style['cmnta']['color'] != '') {$stl .= 'color:#'.$style['cmnta']['color'].';';}
$txt .= '.ep-cmnt-hold p span{'.$stl.'}'; $stl = '';
if($style['cmntf']['font'] && $style['cmntf']['font'] != '') {$stl .= 'font-family:'.$style['cmntf']['font'].';';}
if($style['cmntf']['color'] && $style['cmntf']['color'] != '') {$stl .= 'color:#'.$style['cmntf']['color'].';';}
if($style['cmntf']['size'] && $style['cmntf']['size'] != '') {$stl .= 'font-size:'.$style['cmntf']['size'].'px;';}
if($style['cmntf']['bgcolor'] && $style['cmntf']['bgcolor'] != '') {$stl .= 'background-color:#'.$style['cmntf']['bgcolor'].';';}
if($style['cmntf']['bgpic'] && $style['cmntf']['bgpic'] != '') {$stl .= 'background-image:url('.$style['cmntf']['bgpic'].');';}
$txt .= '.ep-cmnt-form-hold{'.$stl.'}'; $stl = '';
if($style['cmntfb']['font'] && $style['cmntfb']['font'] != '') {$stl .= 'font-family:'.$style['cmntfb']['font'].' !important;';}
if($style['cmntfb']['color'] && $style['cmntfb']['color'] != '') {$stl .= 'color:#'.$style['cmntfb']['color'].' !important;';}
if($style['cmntfb']['size'] && $style['cmntfb']['size'] != '') {$stl .= 'font-size:'.$style['cmntfb']['size'].'px !important;';}
if($style['cmntfb']['bgcolor'] && $style['cmntfb']['bgcolor'] != '') {$stl .= 'background-color:#'.$style['cmntfb']['bgcolor'].' !important;';}
if($style['cmntfb']['border'] && $style['cmntfb']['border'] != '') {$stl .= 'border-color:#'.$style['cmntfb']['border'].' !important;';}
$txt .= '.txt, .btn{'.$stl.'}'; $stl = '';
if($style['more']['font'] && $style['more']['font'] != '') {$stl .= 'font-family:'.$style['more']['font'].';';}
if($style['more']['color'] && $style['more']['color'] != '') {$stl .= 'color:#'.$style['more']['color'].';';}
if($style['more']['size'] && $style['more']['size'] != '') {$stl .= 'font-size:'.$style['more']['size'].'px;';}
if($style['more']['bgcolor'] && $style['more']['bgcolor'] != '') {$stl .= 'background-color:#'.$style['more']['bgcolor'].';';}
if($style['more']['bgpic'] && $style['more']['bgpic'] != '') {$stl .= 'background-image:url('.$style['more']['bgpic'].');';}
$txt .= '.ep-box-hold{'.$stl.'}'; $stl = '';
if($style['subhd']['font'] && $style['subhd']['font'] != '') {$stl .= 'font-family:'.$style['subhd']['font'].';';}
if($style['subhd']['color'] && $style['subhd']['color'] != '') {$stl .= 'color:#'.$style['subhd']['color'].';';}
if($style['subhd']['size'] && $style['subhd']['size'] != '') {$stl .= 'font-size:'.$style['subhd']['size'].'px;';}
$txt .= 'h3.ep-subtitle{'.$stl.'}'; $stl = '';
$txt = '<style>'.$txt.'</style>';
echo $txt;
?>