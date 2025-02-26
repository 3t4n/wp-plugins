<div class="wrap">

    <h2>Adknowledge Engage&trade; Appearance Settings</h2>
    
    <?php if (isset($_GET['saved'])): ?>
    <div class="updated settings-error"><p>Settings updated!</p></div>
    <?php endif; ?>
    
    <div id="poststuff" class="metabox-holder has-right-sidebar">

        <div id="side-info-column" class="inner-sidebar">

            <div class="postbox">
                <?php
                if (ini_get('allow_url_fopen')) {
                    echo file_get_contents(ADENG_SIDEBAR_URL);
                } elseif (function_exists('curl_init')) {
                    $ch = curl_init(ADENG_SIDEBAR_URL);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    @curl_exec($ch);
                    curl_close($ch);
                }
                ?>
            </div>

        </div>

        <div id="post-body">
            
            <div id="post-body-content">
                <form action="admin-post.php" method="post">
                <?php if ( $type == 'text' ): ?>
                <div class="postbox">
                    <input type="hidden" name="action" value="adeng_update_advanced_settings" />
                    
                    <h3>Display Settings</h3>
                    <ul class="inside" style="float:left; width: 30%;">
                        <li>
                            <?php $settings = get_option('adeng_text_css'); ?>
                            <h4>Related Content</h4>
                            <?php if ($cols == 'one_column'): ?>
                            <p>
                                Width
                                <input type="text" name="rec_width" class="width_control" data-class="adkengage_recommendations" id="related_width" value="<?php echo esc_attr($settings['related_width']); ?>" size="3" />
                                <span class="description">pixels</span>
                            </p>
                            <?php endif; ?>
                            <p>
                                Header Font
                                <select name="rec_header[font]" id="rec_header_font">
                                    <option <?php if ($settings['related_header_font'] == "'Arial Black', Gadget, sans-serif") echo 'selected'; ?> value="'Arial Black', Gadget, sans-serif">Arial</option>
                                    <option <?php if ($settings['related_header_font'] == "Century Gothic, sans-serif") echo 'selected'; ?> value="Century Gothic, sans-serif">Century Gothic</option>
                                    <option <?php if ($settings['related_header_font'] == "Georgia, Serif") echo 'selected'; ?> value="Georgia, Serif">Georgia</option>
                                    <option <?php if ($settings['related_header_font'] == "Impact, Charcoal, sans-serif") echo 'selected'; ?> value="Impact, Charcoal, sans-serif">Impact</option>
                                    <option <?php if ($settings['related_header_font'] == "'Lucida Sans Unicode', 'Lucida Grande', sans-serif") echo 'selected'; ?> value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida</option>
                                    <option <?php if ($settings['related_header_font'] == "'Palatino Linotype', 'Book Antiqua', Palatino, serif") echo 'selected'; ?> value="'Palatino Linotype', 'Book Antiqua', Palatino, serif">Palatino Linotype</option>
                                    <option <?php if ($settings['related_header_font'] == "Tahoma, Geneva, sans-serif") echo 'selected'; ?> value="Tahoma, Geneva, sans-serif">Tahoma</option>
                                    <option <?php if ($settings['related_header_font'] == "'Times New Roman', Times, serif") echo 'selected'; ?> value="'Times New Roman', Times, serif">Times New Roman</option>
                                    <option <?php if ($settings['related_header_font'] == "Verdana, Geneva, sans-serif") echo 'selected'; ?> value="Verdana, Geneva, sans-serif">Verdana</option>
                                </select>
                            </p>
                            <p>
                                Link Font
                                <select name="rec_link[font]" id="rec_link_font">
                                    <option <?php if ($settings['related_link_font'] == "'Arial Black', Gadget, sans-serif") echo 'selected'; ?> value="'Arial Black', Gadget, sans-serif">Arial</option>
                                    <option <?php if ($settings['related_link_font'] == "Century Gothic, sans-serif") echo 'selected'; ?> value="Century Gothic, sans-serif">Century Gothic</option>
                                    <option <?php if ($settings['related_link_font'] == "Georgia, Serif") echo 'selected'; ?> value="Georgia, Serif">Georgia</option>
                                    <option <?php if ($settings['related_link_font'] == "Impact, Charcoal, sans-serif") echo 'selected'; ?> value="Impact, Charcoal, sans-serif">Impact</option>
                                    <option <?php if ($settings['related_link_font'] == "'Lucida Sans Unicode', 'Lucida Grande', sans-serif") echo 'selected'; ?> value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida</option>
                                    <option <?php if ($settings['related_link_font'] == "'Palatino Linotype', 'Book Antiqua', Palatino, serif") echo 'selected'; ?> value="'Palatino Linotype', 'Book Antiqua', Palatino, serif">Palatino Linotype</option>
                                    <option <?php if ($settings['related_link_font'] == "Tahoma, Geneva, sans-serif") echo 'selected'; ?> value="Tahoma, Geneva, sans-serif">Tahoma</option>
                                    <option <?php if ($settings['related_link_font'] == "'Times New Roman', Times, serif") echo 'selected'; ?> value="'Times New Roman', Times, serif">Times New Roman</option>
                                    <option <?php if ($settings['related_link_font'] == "Verdana, Geneva, sans-serif") echo 'selected'; ?> value="Verdana, Geneva, sans-serif">Verdana</option>
                                </select>
                            </p>
                            <p>
                                Header
                                <select name="rec_header[size]" id="rec_header_size">
                                <?php 
                                $selected = intval($settings['related_header_size']);
                                for ($x = 9; $x <= 50; $x++): 
                                    $sel = ($selected == $x) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $x; ?>px" <?php echo $sel; ?>><?php echo $x; ?>px</option>
                                <?php endfor; ?>
                                </select>
                                <input type="text" size="5" name="rec_header[color]" id="rec_header" value="<?php echo $settings['related_header_color']; ?>" />
                            </p>
                            <p>
                                Links
                                <select name="rec_link[size]" id="rec_link_size">
                                <?php 
                                $selected = intval($settings['related_link_size']);
                                for ($x = 9; $x <= 50; $x++):
                                    $sel = ($selected == $x) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $x; ?>px" <?php echo $sel; ?>><?php echo $x; ?>px</option>
                                <?php endfor; ?>
                                </select>
                                <input type="text" size="5" name="rec_link[color]" id="rec_link" value="<?php echo $settings['related_link_color']; ?>" />
                            </p>
                            
                            <h4>Advertisements</h4>
                            <?php if ($cols == 'two_column'): ?>
                            <p>
                                Width
                                <input type="text" name="paid_width" class="width_control" data-class="adkengage_paidlistings" id="paid_width" value="<?php echo esc_attr($settings['paid_width']); ?>" size="3" />
                                <span class="description">pixels</span>
                            </p>
                            <?php endif; ?>
                            <p>
                                Header Font
                                <select name="paid_header[font]" id="paid_header_font">
                                    <option <?php if ($settings['paid_header_font'] == "'Arial Black', Gadget, sans-serif") echo 'selected'; ?> value="'Arial Black', Gadget, sans-serif">Arial</option>
                                    <option <?php if ($settings['paid_header_font'] == "Century Gothic, sans-serif") echo 'selected'; ?> value="Century Gothic, sans-serif">Century Gothic</option>
                                    <option <?php if ($settings['paid_header_font'] == "Georgia, Serif") echo 'selected'; ?> value="Georgia, Serif">Georgia</option>
                                    <option <?php if ($settings['paid_header_font'] == "Impact, Charcoal, sans-serif") echo 'selected'; ?> value="Impact, Charcoal, sans-serif">Impact</option>
                                    <option <?php if ($settings['paid_header_font'] == "'Lucida Sans Unicode', 'Lucida Grande', sans-serif") echo 'selected'; ?> value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida</option>
                                    <option <?php if ($settings['paid_header_font'] == "'Palatino Linotype', 'Book Antiqua', Palatino, serif") echo 'selected'; ?> value="'Palatino Linotype', 'Book Antiqua', Palatino, serif">Palatino Linotype</option>
                                    <option <?php if ($settings['paid_header_font'] == "Tahoma, Geneva, sans-serif") echo 'selected'; ?> value="Tahoma, Geneva, sans-serif">Tahoma</option>
                                    <option <?php if ($settings['paid_header_font'] == "'Times New Roman', Times, serif") echo 'selected'; ?> value="'Times New Roman', Times, serif">Times New Roman</option>
                                    <option <?php if ($settings['paid_header_font'] == "Verdana, Geneva, sans-serif") echo 'selected'; ?> value="Verdana, Geneva, sans-serif">Verdana</option>
                                </select>
                            </p>
                            <p>
                                Link Font
                                <select name="paid_link[font]" id="paid_link_font">
                                    <option <?php if ($settings['paid_link_font'] == "'Arial Black', Gadget, sans-serif") echo 'selected'; ?> value="'Arial Black', Gadget, sans-serif">Arial</option>
                                    <option <?php if ($settings['paid_link_font'] == "Century Gothic, sans-serif") echo 'selected'; ?> value="Century Gothic, sans-serif">Century Gothic</option>
                                    <option <?php if ($settings['paid_link_font'] == "Georgia, Serif") echo 'selected'; ?> value="Georgia, Serif">Georgia</option>
                                    <option <?php if ($settings['paid_link_font'] == "Impact, Charcoal, sans-serif") echo 'selected'; ?> value="Impact, Charcoal, sans-serif">Impact</option>
                                    <option <?php if ($settings['paid_link_font'] == "'Lucida Sans Unicode', 'Lucida Grande', sans-serif") echo 'selected'; ?> value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida</option>
                                    <option <?php if ($settings['paid_link_font'] == "'Palatino Linotype', 'Book Antiqua', Palatino, serif") echo 'selected'; ?> value="'Palatino Linotype', 'Book Antiqua', Palatino, serif">Palatino Linotype</option>
                                    <option <?php if ($settings['paid_link_font'] == "Tahoma, Geneva, sans-serif") echo 'selected'; ?> value="Tahoma, Geneva, sans-serif">Tahoma</option>
                                    <option <?php if ($settings['paid_link_font'] == "'Times New Roman', Times, serif") echo 'selected'; ?> value="'Times New Roman', Times, serif">Times New Roman</option>
                                    <option <?php if ($settings['paid_link_font'] == "Verdana, Geneva, sans-serif") echo 'selected'; ?> value="Verdana, Geneva, sans-serif">Verdana</option>
                                </select>
                            </p>
                            <p>
                                Header
                                <select name="paid_header[size]" id="paid_header_size">
                                <?php 
                                $selected = intval($settings['paid_header_size']);
                                for ($x = 9; $x <= 50; $x++): 
                                    $sel = ($selected == $x) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $x; ?>px" <?php echo $sel; ?>><?php echo $x; ?>px</option>
                                <?php endfor; ?>
                                </select>
                                <input type="text" size="5" name="paid_header[color]" id="paid_header" value="<?php echo $settings['paid_header_color']; ?>" />
                            </p>
                            <p>
                                Links
                                <select name="paid_link[size]" id="paid_link_size">
                                <?php 
                                $selected = intval($settings['paid_link_size']);
                                for ($x = 9; $x <= 50; $x++): 
                                    $sel = ($selected == $x) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $x; ?>px" <?php echo $sel; ?>><?php echo $x; ?>px</option>
                                <?php endfor; ?>
                                </select>
                                <input type="text" size="5" name="paid_link[color]" id="paid_link" value="<?php echo $settings['paid_link_color']; ?>" />
                            </p>
                            <p>
                                URL
                                <select name="paid_url[size]" id="paid_url_size">
                                <?php 
                                $selected = intval($settings['paid_url_size']);
                                for ($x = 9; $x <= 50; $x++): 
                                    $sel = ($selected == $x) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $x; ?>px" <?php echo $sel; ?>><?php echo $x; ?>px</option>
                                <?php endfor; ?>
                                </select>
                                <input type="text" size="5" name="paid_url[color]" id="paid_url" value="<?php echo $settings['paid_url_color']; ?>" />
                            </p>
                            
                            <h4>List Bullet Style</h4>
                            <p>
                                Bullet Type
                                <select name="list_style" id="list_style">
                                    <option <?php if ($settings['list_style'] == 'none') echo 'selected'; ?> value="none">None</option>
                                    <option <?php if ($settings['list_style'] == 'circle') echo 'selected'; ?> value="circle">Circle</option>
                                    <option <?php if ($settings['list_style'] == 'decimal') echo 'selected'; ?> value="decimal">Decimal</option>
                                    <option <?php if ($settings['list_style'] == 'disc') echo 'selected'; ?> value="disc">Disc</option>
                                    <option <?php if ($settings['list_style'] == 'lower-alpha') echo 'selected'; ?> value="lower-alpha">Lower-Alpha</option>
                                    <option <?php if ($settings['list_style'] == 'lower-roman') echo 'selected'; ?> value="lower-roman">Lower-Roman</option>
                                    <option <?php if ($settings['list_style'] == 'square') echo 'selected'; ?> value="square">Square</option>
                                    <option <?php if ($settings['list_style'] == 'upper-alpha') echo 'selected'; ?> value="upper-alpha">Upper-Alpha</option>
                                    <option <?php if ($settings['list_style'] == 'upper-roman') echo 'selected'; ?> value="upper-roman">Upper-Roman</option>
                                </select>
                            </p>
                            <p>
                                Or the URL of a bullet image
                                <input type="text" name="list_style_image" id="list_style_image" value="<?php echo $settings['list_style_image']; ?>" placeholder="http://domain.com/bullet.png" size="28" />
                            </p>
                        </li>
                        <!--<li>
                            <a href="#" class="button toggleCss">Click to edit CSS</a><br /><br />
                            <textarea name="css" id="cre_css" rows="15" cols="50" style="width: 90%; display: none;"><?php echo get_option('adeng_inline_css'); ?></textarea>
                        </li>-->
                    </ul>
                    <div style="float:left;max-width:65%;">
                        <fieldset class="preview">
                            <legend>Preview</legend>
                            <div id="divCRERecom">
                                <div id="div_adkengage_recommendations">
                                    <?php if ($cols == 'one_column'): ?>
                                    <div class="adkengage_recommendations">
                                        <div class="adkengage_rec_header">More from Health</div>
                                        <ul>
                                            <li class="adkengage_recom_display"><a href="#">September | 2011 | Health</a>&nbsp; </li>
                                            <li class="adkengage_ad_display">
                                                <a href="#">Miranda Kerr Looks Fabulous</a>
                                                <div class="adkengage_ad_url_display">(diyfashion.com)</div> 
                                            </li>
                                            <li class="adkengage_recom_display"><a href="#">flu | Health</a>&nbsp; </li>
                                            <li class="adkengage_recom_display"><a href="#">Uncategorized | Health</a>&nbsp; </li>
                                            <li class="adkengage_recom_display"><a href="#">WebMD Health | Health</a>&nbsp; </li>
                                            <li class="adkengage_ad_display">
                                                <a href="#">Brooklyn Decker Happy With Male Cast On Battleship</a>
                                                <div class="adkengage_ad_url_display">(movieroomreviews.com)</div> 
                                            </li>
                                            <li class="adkengage_recom_display"><a href="#">WSJ Staff | Health</a>&nbsp; </li>
                                        </ul>
                                    </div>
                                    <?php elseif ($cols == 'two_column'): ?>
                                    <div class="adkengage_recommendations" <?php if ($cols == 'one_column') echo 'style="width:100%;"'; ?>>
                                        <div class="adkengage_rec_header">More from Health</div>
                                        <ul>
                                            <li class="adkengage_recom_display"><a href="#">September | 2011 | Health</a>&nbsp; </li>
                                            <li class="adkengage_recom_display"><a href="#">flu | Health</a>&nbsp; </li>
                                            <li class="adkengage_recom_display"><a href="#">Uncategorized | Health</a>&nbsp; </li>
                                            <li class="adkengage_recom_display"><a href="#">WebMD Health | Health</a>&nbsp; </li>
                                            <li class="adkengage_recom_display"><a href="#">WSJ Staff | Health</a>&nbsp; </li>
                                        </ul>
                                    </div>
                                    <div class="adkengage_paidlistings">
                                        <div class="adkengage_ad_header">From Around the Web</div>
                                        <ul>
                                            <li class="adkengage_ad_display">
                                                <a href="#">Lauren Conrad Goes Topless</a>
                                                <div class="adkengage_ad_url_display">(gossipcenter.com)</div>
                                            </li>
                                            <li class="adkengage_ad_display">
                                                <a href="#">Miranda Kerr Looks Fabulous</a>
                                                <div class="adkengage_ad_url_display">(diyfashion.com)</div> 
                                            </li>
                                            <li class="adkengage_ad_display">
                                                <a href="#">Bar Refaeli Gets Sexy</a>
                                                <div class="adkengage_ad_url_display">(gossipcenter.com)</div> 
                                            </li>
                                            <li class="adkengage_ad_display">
                                                <a href="#">Brooklyn Decker Happy With Male Cast On Battleship</a>
                                                <div class="adkengage_ad_url_display">(movieroomreviews.com)</div> 
                                            </li>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    <div class="adkengage_clear"></div>
                                    <div class="adkengage_clear"></div>
                                    <div id="adkengage_divpopup" style="display:none;"></div> 
                                    <div class="adkengage_about" onclick="engage_Show_ADKMsg('divCRERecom',event);">[about these]</div>
                                </div>
                                <div class="adkengage_clear"></div>
                            </div>
                        </fieldset>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <?php 
                elseif ($type == 'image'): 
                    $settings = get_option('adeng_image_css');
                ?>
                <div class="postbox">
                    <input type="hidden" name="action" value="adeng_update_advanced_settings" />
                    
                    <h3>Display Settings</h3>
                    <ul class="inside" style="float:left; width: 30%;">
                        <li>
                            <p>
                                Header Font
                                <select name="rec_header[font]" id="rec_header_font">
                                    <option <?php if ($settings['related_header_font'] == "'Arial Black', Gadget, sans-serif") echo 'selected'; ?> value="'Arial Black', Gadget, sans-serif">Arial</option>
                                    <option <?php if ($settings['related_header_font'] == "Century Gothic, sans-serif") echo 'selected'; ?> value="Century Gothic, sans-serif">Century Gothic</option>
                                    <option <?php if ($settings['related_header_font'] == "Georgia, Serif") echo 'selected'; ?> value="Georgia, Serif">Georgia</option>
                                    <option <?php if ($settings['related_header_font'] == "Impact, Charcoal, sans-serif") echo 'selected'; ?> value="Impact, Charcoal, sans-serif">Impact</option>
                                    <option <?php if ($settings['related_header_font'] == "'Lucida Sans Unicode', 'Lucida Grande', sans-serif") echo 'selected'; ?> value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida</option>
                                    <option <?php if ($settings['related_header_font'] == "'Palatino Linotype', 'Book Antiqua', Palatino, serif") echo 'selected'; ?> value="'Palatino Linotype', 'Book Antiqua', Palatino, serif">Palatino Linotype</option>
                                    <option <?php if ($settings['related_header_font'] == "Tahoma, Geneva, sans-serif") echo 'selected'; ?> value="Tahoma, Geneva, sans-serif">Tahoma</option>
                                    <option <?php if ($settings['related_header_font'] == "'Times New Roman', Times, serif") echo 'selected'; ?> value="'Times New Roman', Times, serif">Times New Roman</option>
                                    <option <?php if ($settings['related_header_font'] == "Verdana, Geneva, sans-serif") echo 'selected'; ?> value="Verdana, Geneva, sans-serif">Verdana</option>
                                </select>
                            </p>
                            <p>
                                Link Font
                                <select name="rec_link[font]" id="rec_link_font">
                                    <option <?php if ($settings['related_link_font'] == "'Arial Black', Gadget, sans-serif") echo 'selected'; ?> value="'Arial Black', Gadget, sans-serif">Arial</option>
                                    <option <?php if ($settings['related_link_font'] == "Century Gothic, sans-serif") echo 'selected'; ?> value="Century Gothic, sans-serif">Century Gothic</option>
                                    <option <?php if ($settings['related_link_font'] == "Georgia, Serif") echo 'selected'; ?> value="Georgia, Serif">Georgia</option>
                                    <option <?php if ($settings['related_link_font'] == "Impact, Charcoal, sans-serif") echo 'selected'; ?> value="Impact, Charcoal, sans-serif">Impact</option>
                                    <option <?php if ($settings['related_link_font'] == "'Lucida Sans Unicode', 'Lucida Grande', sans-serif") echo 'selected'; ?> value="'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Lucida</option>
                                    <option <?php if ($settings['related_link_font'] == "'Palatino Linotype', 'Book Antiqua', Palatino, serif") echo 'selected'; ?> value="'Palatino Linotype', 'Book Antiqua', Palatino, serif">Palatino Linotype</option>
                                    <option <?php if ($settings['related_link_font'] == "Tahoma, Geneva, sans-serif") echo 'selected'; ?> value="Tahoma, Geneva, sans-serif">Tahoma</option>
                                    <option <?php if ($settings['related_link_font'] == "'Times New Roman', Times, serif") echo 'selected'; ?> value="'Times New Roman', Times, serif">Times New Roman</option>
                                    <option <?php if ($settings['related_link_font'] == "Verdana, Geneva, sans-serif") echo 'selected'; ?> value="Verdana, Geneva, sans-serif">Verdana</option>
                                </select>
                            </p>
                            <p>
                                Header
                                <select name="rec_header[size]" id="rec_header_size">
                                <?php 
                                $selected = intval($settings['related_header_size']);
                                for ($x = 9; $x <= 50; $x++): 
                                    $sel = ($selected == $x) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $x; ?>px" <?php echo $sel; ?>><?php echo $x; ?>px</option>
                                <?php endfor; ?>
                                </select>
                                <input type="text" size="5" name="rec_header[color]" id="rec_header" value="<?php echo $settings['related_header_color']; ?>" />
                            </p>
                            <p>
                                Links
                                <select name="rec_link[size]" id="rec_link_size">
                                <?php 
                                $selected = intval($settings['related_link_size']);
                                for ($x = 9; $x <= 50; $x++):
                                    $sel = ($selected == $x) ? 'selected' : '';
                                ?>
                                    <option value="<?php echo $x; ?>px" <?php echo $sel; ?>><?php echo $x; ?>px</option>
                                <?php endfor; ?>
                                </select>
                                <input type="text" size="5" name="rec_link[color]" id="rec_link" value="<?php echo $settings['related_link_color']; ?>" />
                            </p>
                            
                            <p>
                                Border Style
                                <select name="list_style" id="list_style">
                                    <option <?php if ($settings['list_style'] == 'none') echo 'selected'; ?> value="none" data-style="">Default</option>
                                    <option <?php if ($settings['list_style'] == 'simple') echo 'selected'; ?> value="simple" data-style="border:1px solid #999;padding:5px;background-color:#ECECEC;width:93%;height:93%;">Simple</option>
                                    <option <?php if ($settings['list_style'] == 'gallery') echo 'selected'; ?> value="gallery" data-style="border:1px solid #999;border-style:double;padding:10px;background-color:#ECECEC;width:86%;height:86%;">Gallery</option>
                                    <option <?php if ($settings['list_style'] == 'updown') echo 'selected'; ?> value="updown" data-style="border-top-width:4px;border-bottom-width:4px;border-top-style: double;border-bottom-style: double;border-top-color:#E1A60A;border-bottom-color:#E1A60A;padding: 8px 0px;width:88%;height:88%;margin-left:7px;">Above &amp; Below</option>
                                    <option <?php if ($settings['list_style'] == 'dots') echo 'selected'; ?> value="dots" data-style="border: 3px dotted #29C3FF;margin: 0;padding: 0; width:98%;height:98%;">Dots</option>
                                    <option <?php if ($settings['list_style'] == 'dash') echo 'selected'; ?> value="dash" data-style="border: 3px dashed #29C3FF;margin: 0;padding: 0; width:98%;height:98%;">Dashed</option>
                                    <option <?php if ($settings['list_style'] == 'shadow') echo 'selected'; ?> value="shadow" data-style="box-shadow: 0px 5px 10px #888;">Shadow</option>
                                    <option <?php if ($settings['list_style'] == 'rounded') echo 'selected'; ?> value="rounded" data-style="border-width:1px;border-style:solid;padding:5px;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;width:90%;height:90%;">Rounded</option>
                                </select>
                                <input type="hidden" name="border_style" id="border_style" value="" />
                            </p>
                            <p>
                                Border Color
                                <input type="text" size="5" name="border_color" id="border_color" value="<?php echo $settings['border_color']; ?>" />
                            </p>
                        </li>
                    </ul>
                    <div style="float:left;max-width:65%;">
                        <fieldset class="preview">
                            <legend>Preview</legend>
                            <div id="divCRERecom">
                                <div id="div_adkengage_recommendations_img">
                                    <div class="adkengage_recommendations_img">
                                        <div class="adkengage_rec_header">We Recommend</div>
                                        <div class="adkengage_display_img">
                                            <div class="adkengage_img_item_border">
                                                <a href="#">
                                                    <div class="adkengage_imgwrapper">
                                                        <div class="adkeng_noimg">Blog | Win a FREE Trip to SOUT...</div>
                                                        <img class="adkengage_image" style="padding:0px;margin:0px;border:0px;max-height:100%;max-width:100%;" alt="images" src="http://engageappimages.s3-website-us-east-1.amazonaws.com/images/4.jpg">
                                                    </div>
                                                    <div class="adkengage_imgcontwrapper">Blog | Win a FREE Trip to SOUTH FLORIDA for A...</div>
                                                </a>
                                            </div> 
                                        </div>
                                        <div class="adkengage_display_img">
                                            <div class="adkengage_img_item_border">
                                                <a href="#">
                                                    <div class="adkengage_imgwrapper">
                                                        <div class="adkeng_noimg">Blog | Ridiculous Winches Part...</div>
                                                        <img class="adkengage_image" style="padding:0px;margin:0px;border:0px;max-height:100%;max-width:100%;" alt="images" src="http://engageappimages.s3-website-us-east-1.amazonaws.com/images/1.jpg">
                                                    </div>
                                                    <div class="adkengage_imgcontwrapper">Blog | Ridiculous Winches Partners With Board...</div>
                                                </a>
                                            </div> 
                                        </div>
                                        <div class="adkengage_display_img">
                                            <div class="adkengage_img_item_border">
                                                <a href="#">
                                                    <div class="adkengage_imgwrapper">
                                                        <div class="adkeng_noimg">Blog | Steel Lafferty to Ride ...</div>
                                                        <img class="adkengage_image" style="padding:0px;margin:0px;border:0px;max-height:100%;max-width:100%;" alt="images" src="http://engageappimages.s3-website-us-east-1.amazonaws.com/images/3.jpg">
                                                    </div>
                                                    <div class="adkengage_imgcontwrapper">Blog | Steel Lafferty to Ride at Board Up 201...</div>
                                                </a>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="adkengage_clear"></div>
                                </div>
                            <div class="adkengage_clear"></div>
                        </div>
                        </fieldset>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <?php endif; ?>
                <div class="submit">
                    <input type="hidden" name="cols" value="<?php echo $cols; ?>" />
                    <input type="hidden" name="type" value="<?php echo $type; ?>" />
                    <input type="submit" class="button-primary" id="submit" value="Save Changes" name="Submit" />
                </div>
                </form>
            </div>

        </div>

    </div>

</div>

<?php if ( $type == 'text' ): ?>
<script type="text/javascript">
jQuery('.adkengage_recommendations').css({'width': '<?php echo $settings['related_width']; ?>px'});
jQuery('.adkengage_paidlistings').css({'width': '<?php echo $settings['paid_width']; ?>px'});

jQuery('.adkengage_recom_display,.adkengage_ad_display').css({
    <?php if ( !empty($settings['list_style_image']) ): ?>
    'list-style-image': 'url(<?php echo $settings['list_style_image']; ?>)',
    'margin-left': '20px'
    <?php else: ?>
    'list-style': '<?php echo $settings['list_style']; ?>'
    <?php endif; ?>
});

jQuery('.adkengage_rec_header').css({
    'color': '<?php echo $settings['related_header_color']; ?>',
    'font-size': '<?php echo $settings['related_header_size']; ?>',
    'font-family': '<?php echo addslashes($settins['related_header_font']); ?>'
});

jQuery('.adkengage_recom_display a').css({
    'color': '<?php echo $settings['related_link_color']; ?>',
    'font-size': '<?php echo $settings['related_link_size']; ?>',
    'font-family': '<?php echo addslashes($settings['related_link_font']); ?>'
});

jQuery('.adkengage_ad_header').css({
    'color': '<?php echo $settings['paid_header_color']; ?>',
    'font-size': '<?php echo $settings['paid_header_size']; ?>',
    'font-family': '<?php echo addslashes($settings['paid_header_font']); ?>'
});

jQuery('.adkengage_ad_display a').css({
    'color': '<?php echo $settings['paid_link_color']; ?>',
    'font-size': '<?php echo $settings['paid_link_size']; ?>',
    'font-family': '<?php echo addslashes($settings['paid_link_font']); ?>'
});

jQuery('.adkengage_ad_url_display').css({
    'color': '<?php echo $settings['paid_url_color']; ?>',
    'font-size': '<?php echo $settings['paid_url_size']; ?>'
});

jQuery(".width_control").blur(function() {
    var el      = jQuery(this).data("class");
    var width   = jQuery(this).val();
    
    jQuery("."+ el).css({"width": width +"px"});
});

jQuery("#rec_header_font").change(function() {
    jQuery(".adkengage_rec_header").css("font-family", jQuery(this).val());
});

jQuery("#rec_link_font").change(function() {
    jQuery(".adkengage_recom_display a").css("font-family", jQuery(this).val());
});

jQuery("#rec_header").miniColors({
    change: function(hex,rgb) {
        jQuery(".adkengage_rec_header").css("color", hex);
    }
});

jQuery("#rec_header_size").change(function() {
    jQuery(".adkengage_rec_header").css("font-size", jQuery(this).val());
});

jQuery("#rec_link").miniColors({
    change: function(hex,rgb) {
        jQuery(".adkengage_recom_display a").css("color", hex);
    }
});

jQuery("#rec_link_size").change(function() {
    jQuery(".adkengage_recom_display a").css("font-size", jQuery(this).val());
});

jQuery("#paid_header_font").change(function() {
    jQuery(".adkengage_ad_header").css("font-family", jQuery(this).val());
});

jQuery("#paid_link_font").change(function() {
    jQuery(".adkengage_ad_display a").css("font-family", jQuery(this).val());
});

jQuery("#paid_header").miniColors({
    change: function(hex,rgb) {
        jQuery(".adkengage_ad_header").css("color", hex);
    }
});

jQuery("#paid_header_size").change(function() {
    jQuery(".adkengage_ad_header").css("font-size", jQuery(this).val());
});

jQuery("#paid_link").miniColors({
    change: function(hex,rgb) {
        jQuery(".adkengage_ad_display a").css("color", hex);
    }
});

jQuery("#paid_link_size").change(function() {
    jQuery(".adkengage_ad_display a").css("font-size", jQuery(this).val());
});

jQuery("#paid_url").miniColors({
    change: function(hex,rgb) {
        jQuery(".adkengage_ad_url_display").css("color", hex);
    }
});

jQuery("#paid_url_size").change(function() {
    jQuery(".adkengage_ad_url_display").css("font-size", jQuery(this).val());
});

jQuery("#list_style").change(function() {
    if (jQuery("#list_style_image").val() == "") {
        jQuery(".adkengage_recom_display,.adkengage_ad_display").css({
            "list-style": jQuery(this).val(),
            "margin-left": "20px",
            "color": jQuery("#rec_link").val()
        });
    }
});

jQuery("#list_style_image").blur(function() {
    if (jQuery(this).val() != "") {
        jQuery(".adkengage_recom_display,.adkengage_ad_display").css({
            "list-style-image": "url("+ jQuery(this).val() +")",
            "margin-left": "20px"
        });
    }
});
</script>
<?php else: ?>
<script type="text/javascript">
jQuery('.adkengage_rec_header').css({
    'color': '<?php echo $settings['related_header_color']; ?>',
    'font-size': '<?php echo $settings['related_header_size']; ?>',
    'font-family': '<?php echo addslashes($settins['related_header_font']); ?>'
});

jQuery('.adkengage_imgcontwrapper').css({
    'color': '<?php echo $settings['related_link_color']; ?>',
    'font-size': '<?php echo $settings['related_link_size']; ?>',
    'font-family': '<?php echo addslashes($settings['related_link_font']); ?>'
});

<?php if ($settings['list_style'] != 'none'): ?>
var style = jQuery("#list_style option:selected").data("style");
jQuery("#border_style").val(style);
jQuery(".adkengage_imgwrapper").css({
    'border': 'none'
});
jQuery(".adkengage_image").attr("style", style);
<?php endif; ?>

jQuery("#rec_header_font").change(function() {
    jQuery(".adkengage_rec_header").css("font-family", jQuery(this).val());
});

jQuery("#rec_link_font").change(function() {
    jQuery(".adkengage_imgcontwrapper").css("font-family", jQuery(this).val());
});

jQuery("#rec_header").miniColors({
    change: function(hex,rgb) {
        jQuery(".adkengage_rec_header").css("color", hex);
    }
});

jQuery("#rec_header_size").change(function() {
    jQuery(".adkengage_rec_header").css("font-size", jQuery(this).val());
});

jQuery("#rec_link").miniColors({
    change: function(hex,rgb) {
        jQuery(".adkengage_imgcontwrapper").css("color", hex);
    }
});

jQuery("#border_color").miniColors({
    change: function(hex,rgb) {
        jQuery(".adkengage_image").css("border-color", hex);
    }
});

jQuery("#rec_link_size").change(function() {
    jQuery(".adkengage_imgcontwrapper").css("font-size", jQuery(this).val());
});

jQuery("#list_style").change(function() {
    if (jQuery(this).val() == "none") {
        jQuery(".adkengage_image").attr("style", "padding:0px;margin:0px;border:0px;max-height:100%;max-width:100%;");
        jQuery("#border_style").val("");
    } else {
        var style = jQuery("#list_style option:selected").data("style");
        jQuery("#border_style").val(style);
        jQuery(".adkengage_imgwrapper").css({
            'border': 'none'
        });
        jQuery(".adkengage_image").attr("style", style);
    }
});
</script>
<?php endif; ?>