function logMessage(message) {
    console.log(message);
}
var js_var_nothing = 'js_var_nadda';
(function() {
    window.addEventListener('load', function() {
        logMessage('code-wp-1.js : window onload event triggered');
        // Add adblock overlay styles
        const js_var_const_style = document.createElement('style');
        js_var_const_style.innerHTML = `
			body.admin-bar #css-id-ad-block-overlay {
			    margin-top: 32px;
			}

			@media screen and (max-width: 782px) {
			    body.admin-bar #css-id-ad-block-overlay {
			        margin-top: 46px;
			    }
			}
            #css-id-ad-block-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                text-align:center;
                background-color: {{json_data_bgcolor}};
                z-index: 9999;
                color: {{json_data_textcolor}};
                padding-top: {{theme_overlay_main_pad_top}};
                box-shadow: 0 2px 4px rgba(255, 255, 255, 0.2), 0 4px 8px rgba(0, 0, 0, 0.3);
            }
            #css-id-ad-block-overlay-content {
            	padding:0 15px 15px 15px;
            	border-radius:8px;
                display: inline-block;
                background-color: {{json_data_fgcolor}};
                position: relative;
                text-align: initial;
                min-width: {{theme_overlay_inner_min_width}};
                max-width: {{theme_overlay_inner_max_width}};
                box-shadow: 0 2px 4px rgba(255, 255, 255, 0.2), 0 4px 8px rgba(0, 0, 0, 0.3);
            }
            .css-class-ad-block-overlay-content-inner {
            	padding:12px;
            	border-radius:4px;
            	text-align: initial;
                background-color: {{json_data_windowcolor}};
                color: {{json_data_messagecolor}};
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2), 0 4px 8px rgba(0, 0, 0, 0.3);
            }
            .css-class-ad-block-overlay-content-inner div {
                font-size:{{theme_overlay_font_size}};
            }

            #css-id-ad-block-overlay i.css-class-close-button {
			    position: absolute;
			    top: 0px;
			    right: 20px;
                cursor: pointer;
                font-style:italic;
            }

            .css-id-ad-block-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
                margin-top:1rem;
            }

            .css-id-ad-block-button {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0.5rem 1rem;
                font-size: 1rem;
                font-weight: 600;
                color: #ffffff;
                text-align: center;
                text-decoration: none;
                border-radius: 0.25rem;
                transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
                cursor: pointer;
                flex: 1;
                min-width: 150px;
                max-width: 250px;
            }

            .css-id-ad-block-button:hover {
                opacity: 0.9;
                box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.4);
            }

            .css-id-ad-block-button:active {
                transform: scale(0.9);
                box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.8);
            }

            .css-class-close-button span i {
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            }

            .css-class-close-button span i:hover {
                opacity: 0.9;
                text-decoration: underline;
            }

            .css-class-close-button span i:active {
                transform: scale(0.98);
            }

            #css-id-ad-block-overlay a {
                margin: 4px 0;
            }

            .css-class-body-no-scroll {
			    overflow: hidden;
			    height: 100vh;
			}
        `;
        document.head.appendChild(js_var_const_style);

        let js_var_wuadblockguard_method_1        = {{json_data_method_one}};
        let js_var_wuadblockguard_method_2        = {{json_data_method_two}};
        let js_var_wuadblockguard_method_3        = {{json_data_method_three}};
        let js_var_wuadblockguard_show_notice     = {{json_data_show_notice}};
        let js_var_wuadblockguard_demo            = {{json_data_is_demo}};
        let js_var_wuadblockguard_detected        = false;
        let js_var_wuadblockguard_overlay_shown   = false;
        let js_var_checks_completed         	= 0;
        const js_var_total_checks           	= 3;

        function js_func_show_wuadblockguard_overlay() {
            if (!js_var_wuadblockguard_overlay_shown) {
                logMessage('SHOW ADBLOCK OVERLAY CALLED');
                const js_const_overlay = document.createElement('div');
                js_const_overlay.id = 'css-id-ad-block-overlay';

                js_const_overlay.innerHTML = `
                    <div id="css-id-ad-block-overlay-content">
                        <i class="css-class-close-button"><span style="{{theme_overlay_close_but_size}}">{{json_data_close_fa_icon}}</span></i>
                        <div style="{{theme_overlay_title_font_size}};{{json_data_main_title}}">{{json_data_title}}</div>
                        <div class="css-class-ad-block-overlay-content-inner">
                            <div>
                                {{json_data_description}}
                                <div style="text-align:center;">
                                    {{json_data_buttons}}
                                </div>
                            <div>
                        </div>
                    </div>
                `;

                if (!{{json_data_allow_close_link}} && !{{json_data_is_demo}}) {
                    // Find all elements with the class 'css-class-close-button'
                    const js_var_css_element_removal = js_const_overlay.querySelectorAll('.css-class-close-button');
                    js_var_css_element_removal.forEach(js_var_element => js_var_element.remove());
                }

                document.body.appendChild(js_const_overlay);
                js_const_overlay.style.display = 'block';

                // Prevent scrolling
                if (!{{json_data_allow_scroll}}) {
                	document.body.classList.add('css-class-body-no-scroll');
                }
        		

                document.querySelectorAll('#css-id-ad-block-overlay-content .css-class-close-button').forEach(function(js_var_element) {
                    js_var_element.addEventListener('click', function() {
                        document.getElementById('css-id-ad-block-overlay').style.display = 'none';
                        // Restore scrolling
                        if (!{{json_data_allow_scroll}}) {
                			document.body.classList.remove('css-class-body-no-scroll');
                		}
                    });
                });

                js_var_wuadblockguard_overlay_shown = true;
            }
        }

        function js_func_detect_ad_block() {
            return new Promise((resolve, reject) => {
                logMessage('detect ADBLOCK called');

                // Check if in demo mode and show overlay or notice immediately
                if (js_var_wuadblockguard_demo) {
                    logMessage('detect DEMO MODE called');
                    js_var_wuadblockguard_detected = true;
                    resolve();
                }

                function js_func_wuadblockguard_detected(method) {
                    if (!js_var_wuadblockguard_overlay_shown) {
                        logMessage('ADBLOCK DETECTED CALLED FROM METHOD: ' + method.toUpperCase());
                        js_var_wuadblockguard_detected = true;
                        resolve();
                    }
                }

                function js_func_wuadblockguard_not_detected(method) {
                    logMessage('adblock not detected called from method: ' + method.toUpperCase());
                    js_var_checks_completed++;
                    logMessage('checks completed: ' + js_var_checks_completed);
                    if (js_var_checks_completed === js_var_total_checks && !js_var_wuadblockguard_detected) {
                        logMessage('all checks completed and no adblock detected');
                        reject();
                    }
                }

                let checks = [];

                // Method 1: Bait Elements Detection
                if (js_var_wuadblockguard_method_1) {
                    checks.push(new Promise((resolveMethod, rejectMethod) => {
                        const js_var_bait = document.createElement('div');
                        js_var_bait.className = 'pub_300x250 pub_300x250m text-ad textAd text_ad adBanner ad-banner ad_box adbox';
                        js_var_bait.style = 'width: 1px; height: 1px; position: absolute; left: -10000px; top: -1000px;';
                        document.body.appendChild(js_var_bait);
                        setTimeout(function() {
                            logMessage('method 1: bait elements - checking');
                            if (js_var_bait.offsetHeight === 0) {
                                logMessage('ADBLOCK DETECTED: BAIT ELEMENT HEIGHT 0');
                                js_func_wuadblockguard_detected('1');
                                resolveMethod();
                            } else {
                                logMessage('no adblock detected: bait element height > 0');
                                js_func_wuadblockguard_not_detected('1');
                                rejectMethod();
                            }
                            document.body.removeChild(js_var_bait);
                        }, 100); // Adjust timeout as necessary
                    }));
                }

                // Method 2: Script Loading Detection
                if (js_var_wuadblockguard_method_2) {
                    checks.push(new Promise((resolveMethod, rejectMethod) => {
                        if (!document.querySelector('script[src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"]')) {
                            const script = document.createElement('script');
                            script.async = true;
                            script.type = 'text/javascript';
                            script.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js';
                            script.onerror = function() {
                                logMessage('method 2: script loading detection - error');
                                js_func_wuadblockguard_detected('2');
                                resolveMethod();
                            };
                            script.onload = function() {
                                logMessage('method 2: script loading detection - loaded');
                                js_func_wuadblockguard_not_detected('2');
                                rejectMethod();
                            };
                            document.body.appendChild(script);
                            logMessage('method 2: script loading detection added');
                        } else {
                            logMessage('method 2: script already present');
                            js_func_wuadblockguard_not_detected('2');
                            rejectMethod();
                        }
                    }));
                }

                // Method 3: Network Requests Detection
                if (js_var_wuadblockguard_method_3) {
                    checks.push(new Promise((resolveMethod, rejectMethod) => {
                        const xhr = new XMLHttpRequest();
                        xhr.open('GET', 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js', true);
                        xhr.onreadystatechange = function() {
                            logMessage('method 3: network requests - checking');
                            if (xhr.readyState === 4) {
                                if (xhr.status === 0 || xhr.responseText.toLowerCase().indexOf("ublock") > -1 || xhr.responseText.toLowerCase().indexOf("height:1px") > -1) {
                                    logMessage('ADBLOCK DETECTED: NETWORK REQUEST FAILED OR BLOCKED CONTENT');
                                    js_func_wuadblockguard_detected('3');
                                    resolveMethod();
                                } else {
                                    logMessage('no adblock detected: xhr.status is ' + xhr.status);
                                    js_func_wuadblockguard_not_detected('3');
                                    rejectMethod();
                                }
                                js_var_checks_completed++;
                                logMessage('checks completed: ' + js_var_checks_completed);
                                if (js_var_checks_completed === js_var_total_checks && !js_var_wuadblockguard_detected) {
                                    logMessage('all checks completed and no adblock detected');
                                    reject();
                                }
                            }
                        };
                        xhr.send();
                        logMessage('method 3: network requests added');
                    }));
                }

                Promise.allSettled(checks).then(() => {
                    if (!js_var_wuadblockguard_detected) {
                        reject();
                    } else {
                        resolve();
                    }
                });
            });
        }

        setTimeout(() => {
            js_func_detect_ad_block().then(() => {
                // Do stuff if adblock is detected
                if (js_var_wuadblockguard_show_notice) {

                    // Add adblock overlay styles
                    const js_const_notice_style_element = document.createElement('style');

                    // Notice HTML as a string
                    const js_const_notice_html = `
                        <div id="css-id-ad-block-notice">
                            <i class="{{json_data_close_fa_icon}} css-class-close-button"><span>X</span></i>
                            <div style="{{json_data_notice_main_title}}">{{json_data_title}}</div>
                            <div class="css-class-ad-block-notice-content-inner">
                                <div>
                                    {{json_data_description_notice}}
                                    <div>
                                    </div>
                                <div>
                            </div>
                        </div>
                    `;


                    js_const_notice_style_element.innerHTML = `
                        #css-id-ad-block-notice {
                            {{js_data_wuadblockguard_cssstyle_notice_block}}
                            margin:10px 0;
                        }
                        .css-class-ad-block-notice-content-inner {
                            {{js_data_wuadblockguard_cssstyle_notice_block_inner}}
                        }
                        #css-id-ad-block-notice i.css-class-close-button {
                            float: right;
                            cursor: pointer;
                            font-size: 20px;
                        }
                        #css-id-ad-block-notice a {
                            margin: 4px 0;
                        }
                    `;

                    // Add styles
                    document.head.appendChild(js_const_notice_style_element);

                    // Find the element with class 'p-body-header' (or whatever the user set)
                    const js_const_notice_header_element = document.querySelector('{{js_data_notice_css_location}}');

                    // Add the notice HTML to the DOM
                    js_const_notice_header_element.insertAdjacentHTML('beforebegin', js_const_notice_html);


                    // Ensure notice HTML is now part of the DOM
                    const js_var_wuadblockguard_notice_element = document.querySelector('#css-id-ad-block-notice');

                    // Remove close buttons if not allowed
                    if (!{{json_data_allow_close_link}}) {
                        // Find all elements with the class 'css-class-close-button' in the DOM, not in the string
                        const js_var_css_element_removal = document.querySelectorAll('#css-id-ad-block-notice .css-class-close-button');
                        js_var_css_element_removal.forEach(js_var_element => js_var_element.remove());
                    }

                    // Attach event listeners after elements are part of the DOM
                    document.querySelectorAll('#css-id-ad-block-notice .css-class-close-button').forEach(function(js_var_element) {
                        js_var_element.addEventListener('click', function() {
                            document.getElementById('css-id-ad-block-notice').style.display = 'none';
                        });
                    });

                } else {
                    // show overlay
                    js_func_show_wuadblockguard_overlay();
                }
            }).catch(() => {
                // Do stuff if adblock is not detected
            });
        }, {{json_data_overlay_timeout}});
    });
})();