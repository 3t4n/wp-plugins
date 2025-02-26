<?php

namespace Awesomesauce\Blocks\JsTextEffects\Coordinate;

use Awesomesauce\Admin\BlockSettings;

if (!defined('ABSPATH')) {
    exit;
}

class Js extends BlockSettings {

    private $end_visibility;
    private $coordinate_font;

    public function init() {
        $this->coordinate_font = $this->common_setting('font', array(
            'desktop'          => array(
                '10',
                'px'
            ),
            'only_unit'        => 'px',
            'desktop_only'     => 'true',
            'font-family'      => 'Montserrat',
            'color'            => '#FFFFFF',
            'solid_color_only' => true,
            'letter-spacing'   => false,
            'font-weight'      => '400'
        ), false, array(), array(
            'Coordinate text font size',
            'This is a base font size, which is affected by the size scaling.',
            'Coordinate color and'
        ), 'coordinate_font');

        $this->admin_preview_manager('js_variable_input', 'coordinate_font_desktop');
        $this->admin_preview_manager('js_variable_input', 'coordinate_font_font_family');
        $this->admin_preview_manager('js_variable_input', 'coordinate_font_font_weight');
        $this->admin_preview_manager('js_variable_input', 'coordinate_font_color');

        $this->end_visibility = $this->script_setting('end_visibility', 'Coordinate end visibility', 'percentage_input', '10', array('After animation end, this transparency base value will be used for coordinate elements.'));
        $this->admin_preview_manager('js_variable_input', 'end_visibility');
    }

    public function getJs() {

        $common = '
            class AwesomesauceJsTextEffectsCoordinate {
                constructor(block_id) {
                    this.block_id = block_id;
                    this.block_element = "#awesomesauce_block_" + this.block_id;
                    
                    document.querySelector(this.block_element).addEventListener("in_view", () => {
                        this.reset();
                    });
                }
                
                reset(){
                    document.querySelector(this.block_element + " .awesomesauce_text").classList.add("hidden_text");
                    
                    this.tools = {
                            drawPath(ctx, fn) {
                                ctx.save();
                                ctx.beginPath();
                                fn();
                                ctx.closePath();
                                ctx.restore();
                            },
                            random(min, max, int) {
                                let result = min + Math.random() * (max + (int ? 1 : 0) - min);
                                return int ? parseInt(result) : result;
                            },
                            getVectorLength(p1, p2) {
                                return Math.sqrt(Math.pow(p1[0] - p2[0], 2) + Math.pow(p1[1] - p2[1], 2));
                            },
                            easing(t, b, c, d, s) {
                                return c * ((t = t / d - 1) * t * t + 1) + b;
                            },
                            cellEasing(t, b, c, d, s) {
                                return c * (t /= d) * t * t * t + b;
                            }
                        };
                        
                        this.doc = {
                            height: 0,
                            width: 0
                        };
                        
                        this.plane = {
                            xCell: 0,
                            yCell: 0,
                            cells: []
                        };
                        
                        this.context = {
                            plane: null,
                            main: null
                        };
                        
                        this.cfg = {
                            cell: 35,
                            sectionWidth: 8,
                            sectionHeight: 1,
                            numberOffset: 5,
                            shadowBlur: true,
                            bgColor: "#181818"
                        };
                        
                        this.ui = {
                            plane: this.block_element + " .plane-canvas",
                            main: this.block_element + " .main-canvas",
                        };
                        
                        this.state = {
                            area: 0,
                            time: Date.now(),
                            lt: 0,
                            planeProgress: 0,
                            dotsProgress: 0,
                            fadeInProgress: 0,
                            stepOffset: 0,
                            markupOffset: 0,
                            tabIsActive: true,
                            planeIsDrawn: false,
                            textPixelData: [],
                            text: {},
                            delta: 0,
                            dlt: performance.now()
                        };
                
                        this.bindNodes();
                        this.getDimensions();
                        this.start();
                }
            
                start() {
                    this.initEvents();
                    this.canvasInit();
                    this.resizeHandler();
                    this.loop();
                    this.initCheckingInterval();
                }
            
                getDimensions() {
                    this.doc.height = document.querySelector(this.block_element).offsetHeight;
                    this.doc.width = document.querySelector(this.block_element).offsetWidth;
                }
            
                updatePlane() {
                    const {width: w, height: h} = this.doc;
                    const cell = Math.round(w / this.cfg.cell);
            
                    const xPreSize = w / cell;
                    this.plane.xCell = w / xPreSize % 2 !== 0 ? w / (w / xPreSize + 1) : xPreSize;
            
                    const yPreSize = h / Math.round(cell * (h / w));
                    this.plane.yCell = h / yPreSize % 2 !== 0 ? h / (h / yPreSize + 1) : yPreSize;
            
                    this.plane.cells = [Math.round(w / this.plane.xCell), Math.round(h / this.plane.yCell)];
                    this.plane.xCenter = Math.round(this.plane.cells[1] / 2);
                    this.plane.yCenter = Math.round(this.plane.cells[0] / 2);
                    this.plane.centerCoords = [this.plane.yCenter * this.plane.xCell, this.plane.xCenter * this.plane.yCell];
            
                }
            
                bindNodes() {
                    for (const selector in this.ui) {
                        this.ui[selector] = document.querySelector(this.ui[selector]);
                    }
                }
            
                canvasInit() {
                    this.font = window.awesomesauce_settings[this.block_id]. coordinate_font_font_weight + " " + window.awesomesauce_settings[this.block_id]. coordinate_font_desktop + "px " + window.awesomesauce_settings[this.block_id]. coordinate_font_font_family;
                    this.color = window.awesomesauce_settings[this.block_id]. coordinate_font_color;
                    this.end_visibility = parseInt(window.awesomesauce_settings[this.block_id].end_visibility) / 100;
            
                    this.context.plane = this.ui.plane.getContext("2d");
                    this.context.main = this.ui.main.getContext("2d");
                }
            
                initEvents() {
                    document.addEventListener("this.contextmenu", e => {
                        e.preventDefault();
                    });
                    this.resizeHandler();
            
                }
            
                resizeHandler(e) {
                    this.state.area = this.doc.width * this.doc.height / 1000000;
                    this.ui.main.height = this.doc.height;
                    this.ui.main.width = this.doc.width;
                    this.ui.plane.height = this.doc.height;
                    this.ui.plane.width = this.doc.width;
                    this.updatePlane();
                }
            
                initCheckingInterval() {
                    setInterval(() => {
                        this.state.tabIsActive = this.state.time <= this.state.lt ? false : true;
                        this.state.lt = this.state.time;
                    }, 100);
                }
            
                loop() {
                    const loop = () => {
                        const ctx = this.context.main;
                        this.state.time = Date.now();
                        ctx.clearRect(0, 0, this.doc.width, this.doc.height);
                        this.updateState();
                        this.draw();
                        if(!this.state.planeIsDrawn && this.state.dotsProgress < 1){
                            this.raf = requestAnimationFrame(loop);
                        }
                    };
                    loop();
                }
            
                updateState() {
                    const now = performance.now();
                    this.state.delta = now - this.state.dlt;
                    this.state.dlt = now;
            
                    const dt = this.state.delta;
                    const mp = this.tools.cellEasing(0, 0, 1, 1);
            
                    if (this.state.planeProgress >= 0.2) {
                        this.state.dotsProgress += 0.00035 * dt;
                        if (this.state.dotsProgress >= 1) this.state.dotsProgress = 1;
                    }
            
                    this.state.planeProgress += 0.00035 * dt;
                    if (this.state.planeProgress >= 1) this.state.planeProgress = 1;
                }
            
                draw() {
                    const ctx = this.context.main;
                    const {
                        xCell,
                        yCell,
                        xCenter,
                        yCenter,
                        cells
                    } =
                        this.plane;
                    const cp = this.state.planeProgress;
                    
                    if(this.state.planeProgress >= 0.7){
                        document.querySelector(this.block_element + " .awesomesauce_text").classList.remove("hidden_text");
                    }
                    
                    if (this.state.planeProgress >= 1 && !this.state.planeIsDrawn) {
                        this.state.planeIsDrawn = true;
                    }
            
                    if (!this.state.planeIsDrawn || this.state.dotsProgress < 1) {
                        this.drawPlane();
                    }
            
                    for (let i = 0; i < cells[0]; i++) {
                        for (let i2 = 0; i2 < cells[1]; i2++) {
            
                            const x = i * xCell;
                            const y = i2 * yCell;
            
                        }
                    }
                }
            
                drawPlaneDotsAnimation(props) {
                    const ctx = this.context.plane;
                    const {dp, i, i2, x, y} = props;
                    const {
                        xCenter,
                        yCenter
                    } =
                        this.plane;
                    const position = [Math.abs(i2 - xCenter), Math.abs(i - yCenter)];
                    const index = position[0] * position[1];
                    const maxIndex = xCenter * yCenter;
                    const percent = 1 / maxIndex;
                    const point = percent * index;
                    let f = dp * (dp / point);
                    if (f >= 1) f = 1;
                    const mf = f >= 0.5 ? (1 - f) / 0.5 : f / 0.5;
                    const size = 3;
                    if (!mf) return;
                    this.tools.drawPath(ctx, () => {
                        ctx.fillStyle = awesomesauce_color_to_rgba(this.color, mf * 0.15);
                        ctx.fillRect(x - 1, y - 1, size, size);
                    });
                }
            
                drawPlaneCenterLines(props) {
                    const {p} = props;
                    const ctx = this.context.plane;
                    const {
                        centerCoords
                    } =
                        this.plane;
                    this.tools.drawPath(ctx, () => {
                        ctx.fillStyle = awesomesauce_color_to_rgba(this.color, this.end_visibility * 2 + (1 - p));                 
                        ctx.fillRect(centerCoords[0], 0 + this.doc.height / 2 * (1 - p), 1, this.doc.height * p);
                        ctx.fillRect(0 + this.doc.width / 2 * (1 - p), centerCoords[1], this.doc.width * p, 1);
                    });
                }
            
                drawYLines(props) {
                    const {i, cp, p, x} = props;
                    const ctx = this.context.plane;
                    const {
                        yCenter
                    } =
                        this.plane;
                    const percent = 1 / yCenter;
                    const pos = Math.abs(i - yCenter);
                    const point = percent * pos;
                    let f = cp * (cp / point);
                    if (f >= 1) f = 1;
                    const ef = this.tools.cellEasing(f, 0, 1, 1);
                    if (i) {
                        this.tools.drawPath(ctx, () => {
                            ctx.fillStyle = awesomesauce_color_to_rgba(this.color, this.end_visibility / 2 + (1 - p) * 0.35);
                            ctx.fillRect(x, 0 + this.doc.height / 2 * (1 - ef), 1, this.doc.height * ef);
                        });
                    }
                }
            
                drawYMarkup(props) {
                    const ctx = this.context.plane;
                    ctx.font = this.font;
                    let {i, p, cp, x, y} = props;
                    const {
                        yCenter
                    } =
                        this.plane;
                    const percent = 1 / yCenter;
                    const pos = Math.abs(i - yCenter);
                    const point = percent * pos;
                    const conds = [p >= point, p <= point + percent];
                    let f = cp * (cp / point);
                    if (f >= 1) f = 1;
                    const f2 = conds[0] && conds[1] ? (p - point) / percent : conds[0] ? 1 : 0;
            
                    const text = i - yCenter + "";
                    ctx.fillStyle = awesomesauce_color_to_rgba(this.color, this.end_visibility + (1 - f) * 0.75);
                    const textCoords = [x - ctx.measureText(text).width / 2, y + this.cfg.sectionWidth / 2 + this.cfg.numberOffset];
                    this.tools.drawPath(ctx, () => {
                        const o = (1 - f2) * 50;
                        ctx.globalAlpha = f2;
                        ctx.fillRect(x, y - this.cfg.sectionWidth / 2 + o, this.cfg.sectionHeight, this.cfg.sectionWidth);
                    });
                    this.tools.drawPath(ctx, () => {
                        ctx.globalAlpha = f2;
                        ctx.textBaseline = "top";
                        ctx.fillText(
                            text,
                            textCoords[0],
                            textCoords[1] + (1 - f2) * -20);
            
                    });
                }
            
                drawXLines(props) {
                    const ctx = this.context.plane;
                    const {i2, cp, p, y} = props;
                    const {
                        xCenter
                    } =
                        this.plane;
                    const percent = 1 / xCenter;
                    const pos = Math.abs(i2 - xCenter);
                    const point = percent * pos;
                    let f = cp * (cp / point);
                    if (f >= 1) f = 1;
                    const ef = this.tools.cellEasing(f, 0, 1, 1);
                    if (i2) {
                        this.tools.drawPath(ctx, () => {
                            ctx.fillStyle = awesomesauce_color_to_rgba(this.color, this.end_visibility / 2 + (1 - p) * 0.35);
                            ctx.fillRect(0 + this.doc.width / 2 * (1 - ef), y, this.doc.width * ef, 1);
                        });
                    }
                }
            
                drawXMarkup(props) {
                    const ctx = this.context.plane;
                    ctx.font = this.font;
                    let {i2, p, cp, x, y} = props;
                    const {
                        xCenter
                    } =
                        this.plane;
            
                    const percent = 1 / xCenter;
                    const pos = Math.abs(i2 - xCenter);
                    const point = percent * pos;
                    const conds = [p >= point, p <= point + percent];
                    let f = cp * (cp / point);
                    if (f >= 1) f = 1;
                    let f2 = conds[0] && conds[1] ? (p - point) / percent : conds[0] ? 1 : 0;
            
                    ctx.fillStyle = awesomesauce_color_to_rgba(this.color, this.end_visibility + (1 - f) * 0.75);
                    this.tools.drawPath(ctx, () => {
                        const o = (1 - f2) * 50;
                        ctx.globalAlpha = f2;
                        ctx.fillRect(x - this.cfg.sectionWidth / 2 + o, y, this.cfg.sectionWidth, this.cfg.sectionHeight);
                    });
                    this.tools.drawPath(ctx, () => {
                        ctx.globalAlpha = f2;
                        ctx.textBaseline = "middle";
                        const textCoords = [x + this.cfg.sectionWidth / 2 + this.cfg.numberOffset, y + this.cfg.sectionHeight / 2];
                        ctx.fillText(
                            xCenter - i2 + "",
                            textCoords[0] + (1 - f2) * -20,
                            textCoords[1]);
            
                    });
                }
            
                drawPlane() {
                    const ctx = this.context.plane;
            
                    ctx.clearRect(0, 0, this.doc.width, this.doc.height);
            
                    const {
                        xCell,
                        yCell,
                        xCenter,
                        yCenter,
                        cells
                    } =
                        this.plane;
            
                    const p = this.tools.easing(this.state.planeProgress, 0, 1, 1);
                    const cp = this.state.planeProgress;
                    const dp = this.state.dotsProgress;
            
                    this.drawPlaneCenterLines({p});
                    for (let i = 0; i < cells[0]; i++) {
                        for (let i2 = 0; i2 < cells[1]; i2++) {
            
                            const x = i * xCell;
                            const y = i2 * yCell;
            
                            if (i !== yCenter && i2 !== xCenter) {
                                this.drawPlaneDotsAnimation({dp, i, i2, x, y});
                            }
                            if (i2 === xCenter && i !== yCenter) {
                                this.drawYLines({i, i2, p, cp, x, y});
                                this.drawYMarkup({i, p, cp, x, y});
                            }
                            if (i2 !== xCenter && i === yCenter) {
                                this.drawXLines({i, i2, p, cp, x, y});
                                this.drawXMarkup({i2, p, cp, x, y});
                            }
                        }
                    }
                }
            }
        ';

        $this->coordinate_font['font-family'] = str_replace(array(
            "'",
            '"'
        ), '', $this->coordinate_font['font-family']);

        $unique = 'window.awesomesauce_settings[' . self::$post_id . '] = {
            coordinate_font_desktop: ' . intval($this->coordinate_font['desktop_value']) . ',
            coordinate_font_font_family: "' . esc_attr($this->coordinate_font['font-family']) . '",
            coordinate_font_font_weight: ' . intval($this->coordinate_font['font-weight']) . ',
            coordinate_font_color: "' . esc_attr($this->coordinate_font['color']) . '",
            end_visibility: ' . intval($this->end_visibility) . '
        };';

        return array(
            'common' => $common,
            'unique' => $unique,
            'reset'  => 1
        );
    }
}