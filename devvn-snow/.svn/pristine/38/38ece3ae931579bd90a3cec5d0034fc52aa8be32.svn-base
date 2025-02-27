<?php
/*
 * Plugin Name: DevVN - Snow
 * Plugin URI: https://levantoan.com/san-pham/
 * Version: 1.0.5
 * Description: Christmas decorations for your website such as snowfall, Christmas bell scene, Christmas tree...
 * Author: Lê Văn Toản
 * Author URI: https://levantoan.com
 * Text Domain: devvn-snow
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( !defined( 'DEVVN_SNOW_BASENAME' ) )
    define( 'DEVVN_SNOW_BASENAME', plugin_basename( __FILE__ ) );

if ( !defined( 'DEVVN_SNOW_URL' ) )
    define( 'DEVVN_SNOW_URL', plugin_dir_url(__FILE__) );

add_action('wp_footer', 'devvn_snow_top_left');
function devvn_snow_top_left(){
    $enable_top_left = devvn_snow_get_options('enable_top_left');
    if($enable_top_left != 1) return false;
    ?>
    <style>
        #e_itexpress_left {
            display: none;
            position: fixed;
            z-index: <?php echo intval(devvn_snow_get_options('zindex'));?>;
            top: 0;
            left: 0;
            width: 144px;
            height: 150px;
        }

        #e_itexpress_right {
            display: none;
            position: fixed;
            z-index: <?php echo intval(devvn_snow_get_options('zindex'));?>;
            top: 0;
            right: 0;

            width: 150px;
            height: 143px;
        }
        @media (min-width: 992px) {
            #e_itexpress_left, #e_itexpress_right {
                display: block;
                pointer-events: none;
            }
        }
    </style>
    <img id="e_itexpress_left" src="<?php echo plugins_url('/images/topleft.png', __FILE__);?>"/>
    <img id="e_itexpress_right" src="<?php echo plugins_url('/images/topright.png', __FILE__);?>"/>
    <?php
}

add_action('wp_footer', 'devvn_snow_footer');
function devvn_snow_footer(){
    $enable_bottom = devvn_snow_get_options('enable_bottom');
    if($enable_bottom != 1) return false;
    ?>
    <style>
        body {
            padding-bottom: 20px
        }

        #e_itexpress_footer {
            display: none;
            position: fixed;
            z-index: <?php echo intval(devvn_snow_get_options('zindex'));?>;
            bottom: -50px;
            left: 0;
            width: 100%;
            height: 104px;
            background: url(<?php echo plugins_url('/images/ft.png', __FILE__);?>) repeat-x bottom left
        }

        #e_itexpress_bottom_left {
            display: none;
            position: fixed;
            z-index: <?php echo intval(devvn_snow_get_options('zindex'));?>;
            bottom: 20px;
            left: <?php echo intval(devvn_snow_get_options('tree_left'));?>px;

            width: 174px;
            height: 180px;
        }

        @media (min-width: 992px) {
            #e_itexpress_footer, #e_itexpress_bottom_left {
                display: block;
                pointer-events: none;
            }
        }
    </style>
    <div id="e_itexpress_footer"></div>
    <img id="e_itexpress_bottom_left" src="<?php echo plugins_url('/images/bottomleft.png', __FILE__);?>"/>
    <?php
}

add_action('wp_footer', 'devvn_snow_type_1');
function devvn_snow_type_1(){

    $type = devvn_snow_get_options('type');
    if($type != 1) return false;
    ?>
    <script type="text/javascript">
        var no = <?php echo intval(devvn_snow_get_options('number_snow_pc'));?>;
        if (matchMedia('only screen and (max-width: 767px)').matches) {
            no = <?php echo intval(devvn_snow_get_options('number_snow_mobile'));?>
        }
        var hidesnowtime = 0;
        var color_snow  = '<?php echo esc_attr(devvn_snow_get_options('color'));?>';
        var snowdistance = 'windowheight'; // windowheight or pageheight;
        var ie4up = (document.all) ? 1 : 0;
        var ns6up = (document.getElementById && !document.all) ? 1 : 0;

        function iecompattest() {
            return (document.compatMode && document.compatMode != 'BackCompat') ? document.documentElement : document.body
        }

        var dx, xp, yp;
        var am, stx, sty;
        var i, doc_width = 800, doc_height = 600;
        if (ns6up) {
            doc_width = self.innerWidth;
            doc_height = self.innerHeight
        } else if (ie4up) {
            doc_width = iecompattest().clientWidth;
            doc_height = iecompattest().clientHeight
        }
        dx = new Array();
        xp = new Array();
        yp = new Array();
        am = new Array();
        stx = new Array();
        sty = new Array();
        for (i = 0; i < no; ++i) {
            dx[i] = 0;
            xp[i] = Math.random() * (doc_width - 50);
            yp[i] = Math.random() * doc_height;
            am[i] = Math.random() * 20;
            stx[i] = 0.02 + Math.random() / 10;
            sty[i] = 0.7 + Math.random();
            if (ie4up || ns6up) {
                document.write('<div id = "dot'+i+'" style="POSITION:fixed;Z-INDEX:'+(<?php echo intval(devvn_snow_get_options('zindex'));?>+i)+';VISIBILITY:visible;TOP:15px;LEFT:15px;pointer-events: none" ><span style="font-size:18px;color:'+color_snow+'">*</span></div>');
            }
        }

        function snowIE_NS6() {
            doc_width = ns6up ? window.innerWidth - 10 : iecompattest().clientWidth - 10;
            doc_height = (window.innerHeight && snowdistance == 'windowheight') ? window.innerHeight : (ie4up && snowdistance == 'windowheight') ? iecompattest().clientHeight : (ie4up && !window.opera && snowdistance == 'pageheight') ? iecompattest().scrollHeight : iecompattest().offsetHeight;
            for (i = 0; i < no; ++i) {
                yp[i] += sty[i];
                if (yp[i] > doc_height - 50) {
                    xp[i] = Math.random() * (doc_width - am[i] - 30);
                    yp[i] = 0;
                    stx[i] = 0.02 + Math.random() / 10;
                    sty[i] = 0.7 + Math.random()
                }
                dx[i] += stx[i];
                document.getElementById('dot' + i).style.top = yp[i] + 'px';
                document.getElementById('dot' + i).style.left = xp[i] + am[i] * Math.sin(dx[i]) + 'px'
            }
            snowtimer = setTimeout('snowIE_NS6()', 10)
        }

        function hidesnow() {
            if (window.snowtimer) {
                clearTimeout(snowtimer)
            }
            for (i = 0; i < no; i++) document.getElementById('dot' + i).style.visibility = 'hidden'
        }

        if (ie4up || ns6up) {
            snowIE_NS6();
            if (hidesnowtime > 0) setTimeout('hidesnow()', hidesnowtime * 1000)
        }
    </script>
    <?php
}

add_action('wp_footer', 'devvn_snow_type_2');
function devvn_snow_type_2(){

    $type = devvn_snow_get_options('type');
    if($type != 2) return false;

    ?>
    <style>
        .snow-canvas {
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            pointer-events: none;
            z-index: <?php echo intval(devvn_snow_get_options('zindex'));?>;
        }
    </style>
    <canvas class="snow-canvas" speed="1" interaction="false" size="2" count="80" opacity="0.00001" start-color="rgba(253,252,251,1)" end-color="rgba(251,252,253,0.3)" wind-power="0" image="false" width="1366" height="218"></canvas>
    <canvas class="snow-canvas" speed="3" interaction="true" size="6" count="30" start-color="rgba(253,252,251,1)" end-color="rgba(251,252,253,0.3)" opacity="0.00001" wind-power="2" image="false" width="1366" height="218"></canvas>
    <canvas class="snow-canvas" speed="3" interaction="true" size="12" count="20" wind-power="-5" image="<?php echo DEVVN_SNOW_URL;?>/images/snow-style.png" width="1366" height="218"></canvas>
    <script>
        (function($) {
            //for html5 canvas;
            var $window = window,
                $timeout = setTimeout;

            var supportCanvas = function() {
                var eCan = document.createElement("canvas");
                return (typeof eCan.getContext) == "function";
            };
            window.Snow = function(element, settings) {
                (function() {
                    var lastTime = 0;
                    var vendors = ['webkit', 'moz'];
                    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
                        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
                        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || // name has changed in Webkit
                            window[vendors[x] + 'CancelRequestAnimationFrame'];
                    }

                    if (!window.requestAnimationFrame) {
                        window.requestAnimationFrame = function(callback, element) {
                            /*
                            var currTime = new Date().getTime();
                            var timeToCall = Math.max(0, 16.7 - (currTime - lastTime));
                            var id = window.setTimeout(function () {
                                callback(currTime + timeToCall);
                            }, timeToCall);
                            lastTime = currTime + timeToCall;
                             */
                            var timeToCall = 14; //freezes in safari for windows ,and mac to , so i change time to call with 14;
                            var id = window.setTimeout(function() {
                                callback(timeToCall);
                            }, timeToCall);

                            return id;
                        };
                    }
                    if (!window.cancelAnimationFrame) {
                        window.cancelAnimationFrame = function(id) {
                            clearTimeout(id);
                        };
                    }
                }());
                this.settings = settings,
                    this.flakes = [],
                    this.flakeCount = settings.count,
                    this.mx = -100,
                    this.my = -100,
                    this.init(element)
            };
            Snow.prototype.init = function(element) {
                this.canvas = element.get(0), this.ctx = this.canvas.getContext("2d"), this.canvas.width = $window.innerWidth, this.canvas.height = $window.innerHeight, this.flakes = [];
                for (var i = 0; i < this.flakeCount; i++) {
                    var x = Math.floor(Math.random() * this.canvas.width),
                        y = Math.floor(Math.random() * this.canvas.height),
                        size = Math.floor(100 * Math.random()) % this.settings.size + 2,
                        speed = Math.floor(100 * Math.random()) % this.settings.speed + Math.random() * size / 10 + .5,
                        opacity = .5 * Math.random() + this.settings.opacity;
                    this.flakes.push({
                        speed: speed,
                        velY: speed,
                        velX: 0,
                        x: x,
                        y: y,
                        size: size,
                        stepSize: Math.random() / 30,
                        step: 0,
                        angle: 180,
                        opacity: opacity
                    })
                }
                1 == this.settings.interaction && this.canvas.addEventListener("mousemove", function(e) {
                    this.mx = e.clientX, this.my = e.client
                });
                var thiz = this;
                $($window).resize(function() {
                    thiz.ctx.clearRect(0, 0, thiz.canvas.width, thiz.canvas.height), thiz.canvas.width = $window.innerWidth, thiz.canvas.height = $window.innerHeight
                });
                if (typeof this.settings.image === "string") {
                    this.image = $("<img src='" + this.settings.image + "' style='display: none'>");
                };

                this.snow();
            }, Snow.prototype.snow = function() {
                var thiz = this,
                    render = function() {
                        thiz.ctx.clearRect(0, 0, thiz.canvas.width, thiz.canvas.height);
                        for (var i = 0; i < thiz.flakeCount; i++) {
                            var flake = thiz.flakes[i],
                                x = thiz.mx,
                                y = thiz.my,
                                minDist = 100,
                                x2 = flake.x,
                                y2 = flake.y,
                                dist = Math.sqrt((x2 - x) * (x2 - x) + (y2 - y) * (y2 - y));
                            if (minDist > dist) {
                                var force = minDist / (dist * dist),
                                    xcomp = (x - x2) / dist,
                                    ycomp = (y - y2) / dist,
                                    deltaV = force / 2;
                                flake.velX -= deltaV * xcomp, flake.velY -= deltaV * ycomp
                            } else switch (flake.velX *= .98, flake.velY <= flake.speed && (flake.velY = flake.speed), thiz.settings.windPower) {
                                case !1:
                                    flake.velX += Math.cos(flake.step += .05) * flake.stepSize;
                                    break;
                                case 0:
                                    flake.velX += Math.cos(flake.step += .05) * flake.stepSize;
                                    break;
                                default:
                                    flake.velX += .01 + thiz.settings.windPower / 100
                            }
                            if (flake.y += flake.velY, flake.x += flake.velX, (flake.y >= thiz.canvas.height || flake.y <= 0) && thiz.resetFlake(flake), (flake.x >= thiz.canvas.width || flake.x <= 0) && thiz.resetFlake(flake), 0 == thiz.settings.image) {
                                var grd = thiz.ctx.createRadialGradient(flake.x, flake.y, 0, flake.x, flake.y, flake.size - 1);
                                grd.addColorStop(0, thiz.settings.startColor), grd.addColorStop(1, thiz.settings.endColor), thiz.ctx.fillStyle = grd, thiz.ctx.beginPath(), thiz.ctx.arc(flake.x, flake.y, flake.size, 0, 2 * Math.PI), thiz.ctx.fill()
                            } else thiz.ctx.drawImage(thiz.image.get(0), flake.x, flake.y, 2 * flake.size, 2 * flake.size)
                        }
                        $window.cancelAnimationFrame(render), $window.requestAnimationFrame(render)
                    };
                render()
            }, Snow.prototype.resetFlake = function(flake) {
                if (0 == this.settings.windPower || 0 == this.settings.windPower) flake.x = Math.floor(Math.random() * this.canvas.width), flake.y = 0;
                else if (this.settings.windPower > 0) {
                    var xarray = Array(Math.floor(Math.random() * this.canvas.width), 0),
                        yarray = Array(0, Math.floor(Math.random() * this.canvas.height)),
                        allarray = Array(xarray, yarray),
                        selected_array = allarray[Math.floor(Math.random() * allarray.length)];
                    flake.x = selected_array[0], flake.y = selected_array[1]
                } else {
                    var xarray = Array(Math.floor(Math.random() * this.canvas.width), 0),
                        yarray = Array(this.canvas.width, Math.floor(Math.random() * this.canvas.height)),
                        allarray = Array(xarray, yarray),
                        selected_array = allarray[Math.floor(Math.random() * allarray.length)];
                    flake.x = selected_array[0], flake.y = selected_array[1]
                }
                flake.size = Math.floor(100 * Math.random()) % this.settings.size + 2, flake.speed = Math.floor(100 * Math.random()) % this.settings.speed + Math.random() * flake.size / 10 + .5, flake.velY = flake.speed, flake.velX = 0, flake.opacity = .5 * Math.random() + this.settings.opacity
            };

            $.fn.snow = function() {
                var userCanvas = supportCanvas();
                userCanvas && $(this).each(function(i, e) {
                    var scope = {};
                    $.each(e.attributes, function(index, key) {
                        scope[$.camelCase(key.name)] = Number(Number(key.value)) ? Number(key.value) : key.value
                    });
                    if (typeof scope.image === "string" && scope.image === "false") {
                        scope.image = false
                    };

                    new Snow($(e), {
                        speed: 1 || 0,
                        interaction: scope.interaction || !0,
                        size: scope.size || 2,
                        count: scope.count || 200,
                        opacity: scope.opacity || 1,
                        startColor: scope.startColor || "rgba(255,255,255,1)",
                        endColor: scope.endColor || "rgba(255,255,255,0)",
                        windPower: scope.windPower || 0,
                        image: scope.image || !1
                    });
                });
                if (!userCanvas) {
                    var setting = {};
                    $(this).each(function(i, e) {
                        setting["image"] = $(e).attr("image") || "<?php echo DEVVN_SNOW_URL;?>/images/snow-style.png";
                        $(this).remove();
                        createSnow("", 40);
                    });
                };
            };

            //for ie678
            /**
             * method createSnow("", 40);
             * method removeSnow();
             */
            function k(a, b, c) {
                if (a.addEventListener) a.addEventListener(b, c, false);
                else a.attachEvent && a.attachEvent("on" + b, c)
            }

            function g(a) {
                if (typeof window.onload != "function") window.onload = a;
                else {
                    var b = window.onload;
                    window.onload = function() {
                        b();
                        a()
                    }
                }
            }

            function h() {
                var a = {};
                for (type in {
                    Top: "",
                    Left: ""
                }) {
                    var b = type == "Top" ? "Y" : "X";
                    if (typeof window["page" + b + "Offset"] != "undefined") a[type.toLowerCase()] = window["page" + b + "Offset"];
                    else {
                        b = document.documentElement.clientHeight ? document.documentElement : document.body;
                        a[type.toLowerCase()] = b["scroll" + type]
                    }
                }
                return a
            }

            function l() {
                var a = document.body,
                    b;
                if (window.innerHeight) b = window.innerHeight;
                else if (a.parentElement.clientHeight) b = a.parentElement.clientHeight;
                else if (a && a.clientHeight) b = a.clientHeight;
                return b
            };
            var j = true;
            var f = true;
            var m = null;
            var c = [];
            var createSnow = function(a, b) {
                clearInterval(m);
                c = [];
                m = setInterval(function() {
                    f && b > c.length && Math.random() < b * 0.0025 && c.push(new i(a));
                    !f && !c.length && clearInterval(m);
                    for (var e = h().top, n = l(), d = c.length - 1; d >= 0; d--)
                        if (c[d]) if (c[d].top < e || c[d].top + c[d].size + 1 > e + n) {
                            c[d].remove();
                            c[d] = null;
                            c.splice(d, 1)
                        } else {
                            c[d].move();
                            c[d].draw()
                        }
                }, 40);
                k(window, "scroll",

                    function() {
                        for (var e = c.length - 1; e >= 0; e--) c[e].draw()
                    })
            };
            var removeSnow = function() {
                clearInterval(m);
                do {
                    c.pop().remove();
                } while (c.length);
            };

            function i(a) {
                this.parent = document.body;
                this.createEl(this.parent, a);
                this.size = Math.random() * 5 + 5;
                this.el.style.width = Math.round(this.size) + "px";
                this.el.style.height = Math.round(this.size) + "px";
                this.maxLeft = document.body.offsetWidth - this.size;
                this.maxTop = document.body.offsetHeight - this.size;
                this.left = Math.random() * this.maxLeft;
                this.top = h().top + 1;
                this.angle = 1.4 + 0.2 * Math.random();
                this.minAngle = 1.4;
                this.maxAngle = 1.6;
                this.angleDelta = 0.01 * Math.random();
                this.speed = 2 + Math.random()
            }

            i.prototype = {
                createEl: function(a, b) {
                    this.el = document.createElement("img");
                    this.el.classname = "nicesnowclass";
                    this.el.setAttribute("src", b || "{{'snow.png' | asset_url}}");
                    this.el.style.position = "absolute";
                    this.el.style.display = "block";
                    this.el.style.zIndex = "99999";
                    this.parent.appendChild(this.el)
                },
                move: function() {
                    if (this.angle < this.minAngle || this.angle > this.maxAngle) this.angleDelta = -this.angleDelta;
                    this.angle += this.angleDelta;
                    this.left += this.speed * Math.cos(this.angle * Math.PI);
                    this.top -= this.speed * Math.sin(this.angle * Math.PI);
                    if (this.left < 0) this.left = this.maxLeft;
                    else if (this.left > this.maxLeft) this.left = 0
                },
                draw: function() {
                    this.el.style.top = Math.round(this.top) + "px";
                    this.el.style.left = Math.round(this.left) + "px"
                },
                remove: function() {
                    this.parent.removeChild(this.el);
                    this.parent = this.el = null
                }
            };
        })(jQuery);
        jQuery(".snow-canvas").snow();
    </script>
    <?php
}

function devvn_snow_action_links( $links, $file ) {
    if ( strpos( $file, 'devvn-snow.php' ) !== false ) {
        $settings_link = '<a href="' . admin_url( 'options-general.php?page=setting-snow' ) . '" title="'.__('View Settings','devvn-snow').'">' . __( 'Settings', 'devvn-snow' ) . '</a>';
        array_unshift( $links, $settings_link );
    }
    return $links;
}
add_filter( 'plugin_action_links_' . DEVVN_SNOW_BASENAME, 'devvn_snow_action_links', 10, 2 );


add_action( 'admin_init', 'devvn_snow_register_mysettings' );
function devvn_snow_register_mysettings() {
    register_setting( 'snow-options-group','snow_options' );
}

add_action( 'admin_menu', 'devvn_snow_admin_menu' );
function devvn_snow_admin_menu() {
    add_options_page(
        __('Snow Settings','devvn-snow'),
        __('Snow Setting','devvn-snow'),
        'manage_options',
        'setting-snow',
        'devvn_snow_settings_page'
    );
}

function devvn_snow_settings_page(){
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
    $type = devvn_snow_get_options('type');
    $enable_top_left = devvn_snow_get_options('enable_top_left');
    $enable_bottom = devvn_snow_get_options('enable_bottom');

    ?>
    <style>
        td.snow_label input {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }
        td.snow_label label img {
            height: 135px;
            width: auto;
            margin-right: 20px;
        }
        td.snow_label label input:checked + img {
            box-shadow: 0 0 0 3px red;
        }
        [class^="for_type_"]:not(.active) {
            display: none;
        }
    </style>
    <div class="wrap">
        <h1><?php _e('Snow Settings', 'devvn-snow');?></h1>
        <form method="post" action="options.php" novalidate="novalidate">
            <?php settings_fields( 'snow-options-group' );?>
            <h2><?php _e('Image top right + left', 'devvn-snow')?></h2>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label><?php _e('Enable', 'devvn-snow')?></label></th>
                        <td>
                            <label style="margin-right: 20px;"><input type="radio" value="1" name="snow_options[enable_top_left]" <?php checked($enable_top_left, '1');?>/> <?php _e('Yes')?></label>
                            <label><input type="radio" value="2" name="snow_options[enable_top_left]" <?php checked($enable_top_left, '2');?>/> <?php _e('No')?></label>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2><?php _e('Image Bottom', 'devvn-snow')?></h2>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label><?php _e('Enable', 'devvn-snow')?></label></th>
                        <td>
                            <label style="margin-right: 20px;"><input type="radio" value="1" name="snow_options[enable_bottom]" <?php checked($enable_bottom, '1');?>/> <?php _e('Yes')?></label>
                            <label><input type="radio" value="2" name="snow_options[enable_bottom]" <?php checked($enable_bottom, '2');?>/> <?php _e('No')?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Margin Left of tree', 'devvn-snow')?></label></th>
                        <td>
                            <input type="number" value="<?php echo intval(devvn_snow_get_options('tree_left'));?>" name="snow_options[tree_left]" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2><?php _e('Snow', 'devvn-snow')?></h2>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label><?php _e('Type snow')?></label></th>
                        <td class="snow_label">
                            <label>
                                <input type="radio" name="snow_options[type]" value="1" <?php checked($type, '1');?>>
                                <img src="<?php echo DEVVN_SNOW_URL;?>images/snow-1.png"/>
                            </label>
                            <label>
                                <input type="radio" name="snow_options[type]" value="2" <?php checked($type, '2');?>>
                                <img src="<?php echo DEVVN_SNOW_URL;?>images/snow-2.png"/>
                            </label>
                        </td>
                    </tr>
                    <tr class="for_type_1 <?php echo ($type == 1) ? 'active': '';?>">
                        <th scope="row"><label><?php _e('Color')?></label></th>
                        <td>
                            <input type="text" value="<?php echo esc_attr(devvn_snow_get_options('color'))?>" name="snow_options[color]" class="snow_color" data-default-color="#fff" />
                        </td>
                    </tr>
                    <tr class="for_type_1 <?php echo ($type == 1) ? 'active': '';?>">
                        <th scope="row"><label><?php _e('Number snow on Mobile', 'devvn-snow')?></label></th>
                        <td>
                            <input type="number" min="1" value="<?php echo intval(devvn_snow_get_options('number_snow_mobile'));?>" name="snow_options[number_snow_mobile]" />
                        </td>
                    </tr>
                    <tr class="for_type_1 <?php echo ($type == 1) ? 'active': '';?>">
                        <th scope="row"><label><?php _e('Number snow on PC', 'devvn-snow')?></label></th>
                        <td>
                            <input type="number" min="1" value="<?php echo intval(devvn_snow_get_options('number_snow_pc'));?>" name="snow_options[number_snow_pc]" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label><?php _e('Z-index', 'devvn-snow')?></label></th>
                        <td>
                            <input type="number" min="1" value="<?php echo intval(devvn_snow_get_options('zindex'));?>" name="snow_options[zindex]" />
                        </td>
                    </tr>
                    <?php do_settings_fields('snow-options-group', 'snow'); ?>
                </tbody>
            </table>
            <?php do_settings_sections('snow-options-group'); ?>
            <p>
                <strong style="color: red;">Happy New Year and Merry Christmas</strong>
            </p>
            <?php submit_button();?>
        </form>
    </div>
    <script type="text/javascript">
        (function ($){
            $(document).ready(function (){
                $('.snow_color').wpColorPicker();
                $('[name="snow_options[type]"]').on('change', function (){
                    let thisVal = $('[name="snow_options[type]"]:checked').val();
                    $('[class^="for_type_"]').removeClass('active');
                    $('[class^="for_type_'+thisVal+'"]').addClass('active');
                })
            });
        })(jQuery);
    </script>
    <?php
}

function devvn_snow_get_options($name = ''){
    $options = wp_parse_args(get_option('snow_options'),array(
        'enable_top_left' => '1',
        'enable_bottom' => '1',
        'type' => '1',
        'color' => '#fff',
        'number_snow_mobile' => 50,
        'number_snow_pc' => 100,
        'zindex' => 9999,
        'tree_left' => 20
    ));
    if($name){
        return isset($options[$name]) ? $options[$name] : '';
    }
    return $options;
}