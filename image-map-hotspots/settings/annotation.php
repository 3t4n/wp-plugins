<div class="imh-6310">
  <div class="imh-6310-sm">
    <?php
    include imh_6310_plugin_url . 'settings/save.php';
    include imh_6310_plugin_url . "settings/form.php";
    ?>
    <div class="imh-6310-preview-box">
      <div class="imh-6310-preview">
      
        <button class="imh-6310-btn-success imh-6310-upload-image">Upload Image</button>
        <button class="imh-6310-btn-success imh-6310-add-point">Add Point</button>
        <span class='imh-6310-pro'>You can add maximum 6 pointer on free version.</span>
        <?php
        if(isset($_GET['styleid'])) {
            echo '<div class="shortcode">Shortcode <input type="text" class="imh-6310-6330-shortcode" onclick="this.setSelectionRange(0, this.value.length)" value="[imh_6310_image_map id=&quot;'.esc_attr($_GET['styleid']).'&quot;]"></div>';
          }
        ?>
        <hr />
      </div>
      <div class="imh-6310-annotation-box">
        <img src="<?php echo isset($cssData['main_image']) ? $cssData['main_image'] : '' ?>" class="imh-6310-main-image" />
        <?php
        if ($jsonData) {
          $counter = 1;
          foreach ($jsonData as $js) {
            $jsonCode = json_encode($js);        
            if($js->iconType == 1){
              if(!$js->fontAwesomeIcon && !$js->fontAwesomeHoverIcon){
                return;
              }
              if(!$js->fontAwesomeIcon){
                $fontAwesomeIcon = $js->fontAwesomeHoverIcon;
                $fontAwesomeHoverIcon = $js->fontAwesomeHoverIcon;
              }
              else if(!$js->fontAwesomeHoverIcon){
                $fontAwesomeIcon = $js->fontAwesomeIcon;
                $fontAwesomeHoverIcon = $js->fontAwesomeIcon;
              } else {
                $fontAwesomeIcon = $js->fontAwesomeIcon;
                $fontAwesomeHoverIcon = $js->fontAwesomeHoverIcon;
             }
              $points= "                          
                <i class='{$fontAwesomeIcon} imh-6310-pin-main-img imh-6310-blinking-{$counter}'></i>
                <i class='{$fontAwesomeHoverIcon} imh-6310-pin-hover-img imh-6310-blinking-hover-{$counter}'></i>              
              ";
            }else if ($js->iconType == 2){
              if(!$js->customFirstImg && !$js->customSecondImg){
                return;
              }
              else if(!$js->customFirstImg){
                $customFirstImg = $js->customSecondImg;
                $customSecondImg = $js->customSecondImg;
              }
              else if(!$js->customSecondImg){
                $customFirstImg = $js->customFirstImg;
                $customSecondImg = $js->customFirstImg; 
              }
              else {
                $customFirstImg = $js->customFirstImg;
                $customSecondImg = $js->customSecondImg;
             }
              $points = "                          
                <img src='{$customFirstImg}' class='imh-6310-pin-main-img imh-6310-blinking-{$counter}' />
                <img src='{$customSecondImg}' class='imh-6310-pin-hover-img imh-6310-blinking-hover-{$counter}' />             
              ";
            }else {
              if(!$js->customText && !$js->customText){
                return;
              }else{
                $customText = $js->customText;
              }
              $points = "                          
              <div class='imh-6310-customtext imh-6310-blinking-{$counter}'>".esc_attr($customText)."</div>           
            ";
          }
          
            echo "
              <div data-id='".esc_attr($counter)."' data-json='".esc_attr($jsonCode)."' class='imh-6310-drag imh-6310-point-{$counter} ui-widget-content ui-draggable ui-draggable-handle' style='bottom: {$js->yPos}%' data-position='{$js->xPos}-{$js->yPos}-{$js->tWidth}-{$js->iconWidth}'>
              <div class='imh-6310-point-editor'>
                <div class='imh-6310-point-edit'><i class='far fa-edit'></i></div>
                <div class= 'imh-6310-point-remove'><i class='fas fa-trash-alt'></i></div>
              </div>
              <div class='imh-6310-point-icons imh-6310-point-icons-".esc_attr($counter)."'>
                {$points}
              </div>  
            </div>";
            $pointCssCode = "
            .imh-6310-point-{$counter} .imh-6310-tooltip{
              background: #FFF;
              color: #000;
              font-size: 16px;
            }
          ";
            if ($js->iconType == 1) {
              $pointCssCode .= "
              .imh-6310-point-{$counter} .imh-6310-pin-main-img {
                color: ".esc_attr($js->fontAwesomeIconColor)." !important;
                font-size:".esc_attr($js->fontAwesomIconSize)."px !important;
              }
              .imh-6310-point-{$counter} .imh-6310-pin-hover-img {
                color: ".esc_attr($js->fontAwesomeIconHoverColor)." !important;
                font-size:".esc_attr($js->fontAwesomIconSize)."px !important;
              }
            ";
            if(isset($js->blinkTooltip) && $js->blinkTooltip == 1){
              $pointCssCode .= "
                i.imh-6310-blinking-{$counter}, 
                i.imh-6310-blinking-hover-{$counter} {
                  position: relative;
                  display: block;
                }
                
                i.imh-6310-blinking-{$counter}::after, 
                i.imh-6310-blinking-hover-{$counter}::after {
                  content: '';
                  position: absolute;
                  width: ".esc_attr($js->fontAwesomIconSize + 10)."px;
                  height: ".esc_attr($js->fontAwesomIconSize + 10)."px;
                  box-shadow: 0 0 1px 3px white;
                  animation: pulse-animation-{$counter} 2s infinite;
                  display: block;
                  border-radius: 50%;
                  transform: translate(-50%, -50%);
                  top: 50%;
                  left: 50%;
                  border-radius: 50%;
                  pointer-events: none;
                }
                
                @keyframes pulse-animation-{$counter} {
                  0% {
                    box-shadow: 0 0 0 0px {$js->glowColor};
                  }
                  100% {
                    box-shadow: 0 0 0 8px rgba(0, 0, 0, 0);
                  }
                }
              ";
            }
            }else if ($js->iconType == 2) {
              $pointCssCode .= "
              .imh-6310-point-{$counter} .imh-6310-pin-main-img {
               width:".esc_attr($js->imgOrIconSize)."px !important;
               height: auto !important;  
               border-radius: 50%;         
              }
              .imh-6310-point-{$counter} .imh-6310-pin-hover-img {
               width:".esc_attr($js->imgOrIconSize)."px !important;
               height: auto !important; 
               border-radius: 50%;
              }
            ";
            if(isset($js->blinkTooltip) && $js->blinkTooltip == 1){
              $pointCssCode .= "
              .imh-6310-point-icons-".esc_attr($counter)."::after {
                content: '';
                position: absolute;
                width: ".esc_attr($js->imgOrIconSize + 10)."px;
                height: ".esc_attr($js->imgOrIconSize + 10)."px;
                box-shadow: 0 0 1px 3px white;
                animation: pulse-animation-{$counter} 2s infinite;
                display: block;  
                border-radius: 50%;                
                transform: translate(-50%, -50%);
                top: 50%;
                left: 50%;                
                pointer-events: none;
              }
              
              @keyframes pulse-animation-{$counter} {
                0% {
                  box-shadow: 0 0 0 0px {$js->glowColor};
                }
                100% {
                  box-shadow: 0 0 0 8px rgba(0, 0, 0, 0);
                }
              }
              ";
            }
            }else if ($js->iconType == 3) {
              $pointCssCode .= "
              .imh-6310-point-{$counter} span {
                font-size:".esc_attr($js->customTextSize)."px !important;
                color: ".esc_attr($js->customTextColor)." !important;
                background-color:".esc_attr($js->customTextBgColor)." !important;
                padding: 5px 10px;
              }             
            ";
            if(isset($js->blinkTooltip) && $js->blinkTooltip == 1){
              $pointCssCode .=".imh-6310-blinking-{$counter} {
                animation: pulse-animation-{$counter} 2s infinite;
              }
              
              @keyframes pulse-animation-{$counter} {
                0% {
                  box-shadow: 0 0 0 0px {$js->glowColor};
                }
                100% {
                  box-shadow: 0 0 0 8px rgba(0, 0, 0, 0);
                }
              }";
            }
            }           

            wp_register_style( "imh-6310-template-".esc_attr($counter)."-css", "" );
            wp_enqueue_style( "imh-6310-template-".esc_attr($counter)."-css" );
            wp_add_inline_style( "imh-6310-template-".esc_attr($counter)."-css", $pointCssCode );
            $counter++;
          }
          
        }

        
        ?>
      </div>
    </div>
  </div>