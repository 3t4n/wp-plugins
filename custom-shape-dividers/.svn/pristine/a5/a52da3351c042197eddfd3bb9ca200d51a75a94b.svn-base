<?php
	global $wpdb;

    $csdmetacheck = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}customshapebuild WHERE id='1'", OBJECT );
    if(empty(!$csdmetacheck)){

      $iwantit = $csdmetacheck[0]->iwantit;

      if($iwantit==1){

  
            add_action('admin_init',function(){
                add_meta_box('_mycustomshapedividermetabox','Custom Shape Dividers','csdiv_metabox',['post','page']);
            });

            function csdiv_metabox($post){
                ?>

                <div id="customshapedivdr">
                    <div class="download-popup-modal">
                        <div class="v--modal-background-click">
                            <div class="v--modal-box">
                                <div class="crossmodal"><svg data-v-6da3ec0c="" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" class="svg-inline--fa fa-times fa-w-11"><path data-v-6da3ec0c="" fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" class=""></path></svg></div>
                                <h2>Get Code</h2>
                                <p>Please put this html directly in your section wrapper element where you want to show shape divider. Note: That section wrapper element "position" property value must be set to "relative".</p>
                                <button id="copySVG" class="button">Copy to Clipboard</button>
                <br>
                <br>
                
                                <div id="svg-content">&lt;svg id="mymainsvgelm" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="" style="width: calc(100% + 1.3px); height: 150px;"&gt;
                                    &lt;path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" style="fill: rgb(255, 255, 255);"&gt;&lt;/path&gt;
                                &lt;/svg&gt;</div>
                            </div>
                        </div>
                    </div>
                    <div class="container mx-auto mb-1 z-40" id="middleshapebuilder">
                        <div class="options-box options-box-pages">
                            <div class="col-five">
                                <label for="">Shape</label>
                                <span>Select your style</span>
                                <select name="" id="myshapeselect">
                                    <option value="Waves">Waves</option>
                                    <option value="Waves2">Waves Opacity</option>
                                    <option value="Curve">Curve</option>
                                    <option value="Curve2">Curve Asymmetrical</option>
                                    <option value="Triangle">Triangle</option>
                                    <option value="Triangle2">Triangle Asymmetrical</option>
                                    <option value="Tilt">Tilt</option>
                                    <option value="Arrow">Arrow</option>
                                    <option value="Split">Split</option>
                                    <option value="Book">Book</option>
                                </select>
                            </div>

                            <div class="col-five">
                                <label for="">Colour</label>
                                <span>Pick any colour</span>
                                <div class="makebothcolor"><input type="color" name="" id="mycustomvalhax" value="#ffffff">
                                    <input type="range" name="" min="0" max="1" step="0.01" value="1" id="mycustomvalopacity"></div>

                                    <input type="text" id="hexInput" placeholder="#ffffff">
<button id="applyHex" class="button">Apply</button>
                            </div>
                            <div class="col-five">
                                <label for="">Flip</label>
                                <span>Flip Horizontally</span>
                                <p class="onoff"><input type="checkbox" value="1" id="checkboxID"><label for="checkboxID"></label></p>
                            </div>
                            <div class="col-five">
                                <label for="">Invert</label>
                                <span>Invert</span>
                                <p class="onoff"><input type="checkbox" value="1" id="checkboxID2"><label for="checkboxID2"></label></p>
                            </div>
                            <div class="col-five">
                                <label for="">Top/bottom</label>
                                <span>Top or bottom divider?</span>
                                <p class="onoff onoff2"><input type="checkbox" value="1" id="checkboxID3"><label for="checkboxID3"></label></p>
                            </div>
                            <div class="col-fifty">
                                <label for="">Height</label>
                                <div class="range">
                                    <div class="sliderValue">
                                    <span id="showmyrangeval">100</span>
                                    </div>
                                    <div class="field">
                                    <div class="value left">
                                        0px</div>
                                    <input type="range" min="0" max="500" value="150" steps="1" id="makemyrange">
                                    <div class="value right">
                                        500px</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-fifty">
                                <label for="">Width</label>

                                <div class="range">
                                    <div class="sliderValue">
                                    <span id="showmyrangeval2">100</span>
                                    </div>
                                    <div class="field">
                                    <div class="value left">
                                        100%</div>
                                    <input type="range" min="100" max="300" value="100" steps="1" id="makemyrange2">
                                    <div class="value right">
                                        300%</div>
                                    </div>
                                </div>
                                
                            </div>

                            <a title="Get Code" class="download-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" class=""><path d="M50.976,20.694c-0.528-9-7.947-16.194-16.892-16.194c-5.43,0-10.688,2.663-13.945,7.008 c-0.075-0.039-0.154-0.066-0.23-0.102c-0.198-0.096-0.399-0.187-0.604-0.269c-0.114-0.045-0.228-0.086-0.343-0.126 c-0.203-0.071-0.409-0.134-0.619-0.191c-0.115-0.031-0.229-0.063-0.345-0.089c-0.225-0.051-0.455-0.09-0.687-0.125 c-0.101-0.015-0.2-0.035-0.302-0.046C16.677,10.523,16.341,10.5,16,10.5c-4.963,0-9,4.037-9,9c0,0.129,0.008,0.255,0.017,0.381 C2.857,22.148,0,26.899,0,31.654C0,38.737,5.762,44.5,12.845,44.5H18c0.553,0,1-0.447,1-1s-0.447-1-1-1h-5.155 C6.865,42.5,2,37.635,2,31.654c0-4.154,2.705-8.466,6.433-10.253L9,21.13V20.5c0-0.12,0.008-0.242,0.015-0.365l0.011-0.185 l-0.013-0.194C9.007,19.671,9,19.586,9,19.5c0-3.859,3.141-7,7-7c0.309,0,0.614,0.027,0.917,0.067 c0.078,0.01,0.156,0.023,0.233,0.036c0.267,0.044,0.53,0.102,0.789,0.177c0.035,0.01,0.071,0.017,0.106,0.027 c0.285,0.087,0.563,0.197,0.835,0.321c0.071,0.032,0.14,0.067,0.21,0.101c0.24,0.119,0.475,0.249,0.702,0.396 C21.719,14.873,23,17.038,23,19.5c0,0.553,0.447,1,1,1s1-0.447,1-1c0-2.754-1.246-5.219-3.2-6.871 C24.667,8.879,29.388,6.5,34.084,6.5c7.745,0,14.178,6.135,14.849,13.888c-1.021-0.072-2.552-0.109-4.083,0.124 c-0.546,0.083-0.921,0.593-0.838,1.139c0.075,0.495,0.501,0.85,0.987,0.85c0.05,0,0.101-0.004,0.151-0.012 c2.227-0.337,4.548-0.021,4.684-0.002C54.49,23.372,58,27.661,58,32.472C58,38.001,53.501,42.5,47.972,42.5H44 c-0.553,0-1,0.447-1,1s0.447,1,1,1h3.972C54.604,44.5,60,39.104,60,32.472C60,26.983,56.173,22.06,50.976,20.694z"></path><path d="M38.293,45.793L32,52.086V31.5c0-0.553-0.447-1-1-1s-1,0.447-1,1v20.586l-6.293-6.293c-0.391-0.391-1.023-0.391-1.414,0 s-0.391,1.023,0,1.414l7.999,7.999c0.092,0.093,0.203,0.166,0.326,0.217C30.74,55.474,30.87,55.5,31,55.5s0.26-0.026,0.382-0.077 c0.123-0.051,0.234-0.124,0.326-0.217l7.999-7.999c0.391-0.391,0.391-1.023,0-1.414S38.684,45.402,38.293,45.793z"></path></svg></a>

                        </div>
                    </div>

                    <div class="container preview-container">
                    <img src="<?php echo CUSTOMSHAPEDIVIDERS_PLUGIN_URL; ?>/assets/images/header.png" alt="" class="img-fluid">
                    <div class="w-full relative" id="mymainshapecont">
                        <img src="<?php echo CUSTOMSHAPEDIVIDERS_PLUGIN_URL; ?>/assets/images/bk-main2.jpg" alt="" class="img-fluid" id="changesvgbk">
                        <div class="custom-shape-divider" style="top: 0px;"><svg id="mymainsvgelm" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="" style="width: calc(100% + 1.3px); height: 150px;">
                                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" style="fill: rgb(255, 255, 255);"></path>
                            </svg></div>
                    </div>
                </div>
                </div>

                <?php
            }



    }
    // checkiwantit

}
?>