<?php
class websitebox_head
{
    function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'websitebox_enqueue']);
        add_action('wp_head', [$this, 'websitebox_headpage']);
    }
    public function websitebox_enqueue()
    {
        wp_enqueue_script("jquery");
        // 技术js
        wp_enqueue_script('wztkej_texiao_headerJs', plugin_dir_url(WEBSITEBOX_FILE) .
            'inc/backtexiao/js/header.js', array('jquery'), '', false);

        $websitebox_base = get_option('websitebox_base');
        //网页宠物
        if (isset($websitebox_base['zoo']) && ($websitebox_base['zoo'] == 1)) {
            wp_enqueue_style('font-awesome.min.css',  plugin_dir_url(WEBSITEBOX_FILE) . 'inc/css/font-awesome.min.css', false, '', 'all');

            wp_enqueue_script('autoload.js', plugin_dir_url(WEBSITEBOX_FILE) . 'kbn/autoload.js', array('jquery'), '', false);
            wp_localize_script('autoload.js', 'php_vars', ['message_Path' => plugin_dir_url(WEBSITEBOX_FILE) . 'kbn/', 'home_Path' => trim(get_option('siteurl'), '/') . '/', 'json' => plugin_dir_url(WEBSITEBOX_FILE) . 'kbn/model/pio/']);
        }

        wp_enqueue_script('wztkej_texiao_two_index', plugin_dir_url(WEBSITEBOX_FILE) .
            'inc/backtexiao/two/index.js', array('jquery'), '', false);
        wp_enqueue_script('wztkej_texiao_three_index', plugin_dir_url(WEBSITEBOX_FILE) .
            'inc/backtexiao/three/index.js', array('jquery'), '', false);
        wp_enqueue_script('wztkej_texiao_six_index', plugin_dir_url(WEBSITEBOX_FILE) .
            'inc/backtexiao/six/index.js', array('jquery'), '', false);

        wp_enqueue_script('wztkej_ewm', plugin_dir_url(WEBSITEBOX_FILE) .
            'threeAndone/ewm.js', array('jquery'), '', false);
        wp_enqueue_script('wztkej_jieping', plugin_dir_url(WEBSITEBOX_FILE) .
            'threeAndone/jieping.js', array('jquery'), '', false);
        wp_enqueue_script('wztkej_dom-to-image', plugin_dir_url(WEBSITEBOX_FILE) .
            'threeAndone/dom-to-image.js', array('jquery'), '', false);
        wp_enqueue_script('wztkej_dist_social', plugin_dir_url(WEBSITEBOX_FILE) .
            'threeAndone/dist/js/social-share.min.js', array('jquery'), '', false);

        wp_enqueue_style('wztkej_header_css', plugin_dir_url(WEBSITEBOX_FILE) . 'inc/css/header.css', false, '', 'all');
        wp_enqueue_style('wztkej_share_min', plugin_dir_url(WEBSITEBOX_FILE) . 'threeAndone/dist/css/share.min.css', false, '', 'all');
    }
    public function  websitebox_sanheyi($content)
    {
        $websitebox_sanheyi = get_option('websitebox_sanheyi');
        $str = '';

        $str .= '<div class="wztkj_footer_shy_con">';
        if (isset($websitebox_sanheyi['open']) && $websitebox_sanheyi['open']) {
            $str .= '<button class="wztkj_f_s_btn" id="wztkj_f_s_c_hb">海报</button>';
        }
        if ((isset($websitebox_sanheyi['wx']) && $websitebox_sanheyi['wx']) || (isset($websitebox_sanheyi['ali']) && $websitebox_sanheyi['ali'])) {
            $str .= '<button class="wztkj_f_s_btn" id="wztkj_f_s_c_ds">打赏</button>';
        }
        if (isset($websitebox_sanheyi['share']) && $websitebox_sanheyi['share']) {
            $str .= '<button class="wztkj_f_s_btn" id="wztkj_f_s_c_fx">分享</button>';
        }
        $str .= '</div>';
        return $content . $str;
    }
    public  function websitebox_headpage()
    {
        $websitebox_base = get_option('websitebox_base');
        $websitebox_kefu = get_option('websitebox_kefu');
        $websitebox_shoujikefu = get_option('websitebox_shoujikefu');
        $websitebox_liuyan = get_option('websitebox_liuyan');
        $websitebox_sitebg = get_option('websitebox_sitebg');
        $websitebox_alert = get_option('websitebox_alert');
        $websitebox_scroll = get_option('websitebox_scroll');
        $websitebox_guanggao = get_option('websitebox_guanggao');
        $websitebox_picload = get_option('websitebox_picload');
        $websitebox_sanheyi = get_option('websitebox_sanheyi');
        
        $nonce = wp_create_nonce('websitebox');
        $url = esc_url(admin_url('admin-ajax.php'));
        if (is_single()) {

            add_action('the_content', [$this, 'websitebox_sanheyi']);
        }




        if (isset($websitebox_base['grey']) && $websitebox_base['grey']) {
            echo '<style>
    			 body *{
        			-webkit-filter: grayscale(100%); 
        			-moz-filter: grayscale(100%); 
        			-ms-filter: grayscale(100%); 
        			-o-filter: grayscale(100%); 
        			filter: grayscale(100%);
        			filter:progid:DXImageTransform.Microsoft.BasicImage(grayscale=1); 
        			filter:gray; 
    			} 
    		</style>';
        }
?>

        <script>
            $(function(){  

            //防止广告还没加载出来，倒计时已经结束了(这里会影响原先的loading效果，将load移到单独的广告身上)
            // window.addEventListener("load",function(){
            //======公共变量
            const wztkj_ScreenWidth = $(window).width()  //当前屏幕的宽度
            let footerAdvertisingFun //底部广告倒计时开启函数

            //======公共函数
            //=======================滚动相关
            function preventScroll(event) {
                event.preventDefault();
            }
            //禁用滚动
            function stopRoll(){
                // 在打开模态框时禁用滚动
                document.addEventListener('wheel', preventScroll, { passive: false });
                document.addEventListener('touchmove', preventScroll, { passive: false });
            }
            //开启滚动
            function openRoll(){
                document.removeEventListener('wheel', preventScroll);
                document.removeEventListener('touchmove', preventScroll);
            }
      

            // 滚动条 √
            function websitebox_rollBar(scro) {
                if (scro != '') {
                    scro = JSON.parse(scro.replace(/[\x00-\x1F\x7F]/g, ''));
                }
                console.log(scro);
                // if (width > 375) {
                $("body").prepend(`
                    <div class="websitebox_demo" style="background:${scro.bg};position: fixed;top: ${scro.top}px;z-index: 999999; width:100%;">
                    <div>
                        <div class="websitebox_demo-cont" style="top: ${scro.top}px;">
                        <div class="websitebox_txt-scroll websitebox_txt-scroll-curs">
                            <div class="websitebox_scrollbox">
                            <div class="websitebox_txt" style="color:${scro.word};">
                                ${scro.content}
                            </div>
                            <div class="websitebox_txt" style="color:${scro.word}">
                                ${scro.content}
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    `)

                function loading() {
                    if ($("#header").length !== 0) {
                        $("#header").addClass("websitebox_header_top");
                    } else if (
                        $("header").attr("id") ||
                        $("header").hasClass("wp-block-template-part") ||
                        $("header").hasClass("header-b")
                    ) {
                        return;
                    } else if ($("div.site-header").length !== 0) {
                        $("div.site-header").addClass("websitebox_header_top");
                    } else {
                        $($("header")[0]).addClass("websitebox_header_top");
                    }
                }
                loading();

                // Scroll effect function
                $.fn.txtscroll = function(options) {
                    var settings = $.extend({
                            speed: 10, // Default scroll speed
                        },
                        options
                    );

                    return this.each(function() {
                        var $this = $(this);
                        var scrollbox = $(".websitebox_scrollbox", $this);
                        var txt_begin = $(".websitebox_txt", $this);
                        var txt_end = $("<div class='websitebox_txt-clone'></div>");
                        var scrollValue = 0;

                        function marquee() {
                            if (txt_end.width() - scrollbox.scrollLeft() <= 0) {
                                scrollValue = scrollbox.scrollLeft() - txt_begin.width();
                                scrollbox.scrollLeft(scrollValue);
                            } else {
                                scrollValue = scrollValue + 1;
                                scrollbox.scrollLeft(scrollValue);
                            }
                        }

                        function begin_scroll() {
                            if (txt_begin.width() > scrollbox.width()) {
                                txt_end.html(txt_begin.html());
                                txt_end.css("color", txt_begin.css("color"));
                                scrollbox.append(txt_end);
                                var setmarquee = setInterval(marquee, settings.speed);

                                $this.on("mouseover", function() {
                                    clearInterval(setmarquee);
                                });

                                $this.on("mouseout", function() {
                                    setmarquee = setInterval(marquee, settings.speed);
                                });
                            } else {
                                txt_begin.append("&nbsp;");
                                begin_scroll();
                            }
                        }

                        begin_scroll();
                    });
                };

                $(".websitebox_txt-scroll-curs").txtscroll({
                    speed: scro.speed, // You can adjust the speed here
                });
                $('.websitebox_txt-scroll').css({
                    'background-image': 'url(<?php echo esc_url(plugins_url('../img/ico-notice.png', __FILE__)); ?>)'
                });

            }
            // 留言板--创建 √
            // 去掉了取消按钮 
            // <button class="wztkj_liuyankuang_f_off wztkj_liuyan_close" >取消</button>
            function websitebox_lvyan_new(ly, nonce, url) {

                ly = JSON.parse(ly)
                var $newdiv = $(`<div class="wztkj_liuyankuang">
                  <div class="wztkj_liuyankuang_title" id="wztkj_liuyankuang_title" style="background:${ly.color} ">
                      <span>${ly.title}</span>
                      <img src="<?php echo esc_url(plugins_url('../img/icon_close_bai.png', __FILE__)); ?>" alt="" class="wztkj_liuyan_close" />
                  </div>
                  <div class="wztkj_liuyankuang_content">
                      <textarea placeholder="请输入内容" maxlength="300"></textarea>
                  </div>
                  <div class="wztkj_liuyankuang_footer">
                      
                      <button class="wztkj_liuyankuang_f_confirm" style="background: ${ly.color};border-color:${ly.color}">确认</button>
                  </div>
                  </div>`)
                $('body').append($newdiv);
                var num = 1;
                $("#wztkj_liuyankuang_title").click(function() {
                    console.log("点击了图片X");
                    num++;
                    if (num % 2 == 0) {
                        $(".wztkj_liuyankuang_content").css({
                            display: "none",
                        });
                        $(".wztkj_liuyankuang_footer").css({
                            display: "none",
                        });
                        $(".wztkj_liuyan_close").remove();
                        $("#wztkj_liuyankuang_title").removeClass('wztkj_liuyankuang_title')
                        $("#wztkj_liuyankuang_title").addClass('wztkj_liuyankuang_two')

                    } else {
                        $(".wztkj_liuyankuang_content").css({
                            display: "block",
                        });
                        $(".wztkj_liuyankuang_footer").css({
                            display: "flex",
                        });
                        $('#wztkj_liuyankuang_title').append('<img class="wztkj_liuyan_close" src="<?php echo esc_url(plugins_url('../img/icon_close_bai.png', __FILE__)); ?>" alt="">');

                        $("#wztkj_liuyankuang_title").removeClass('wztkj_liuyankuang_two')
                        $("#wztkj_liuyankuang_title").addClass('wztkj_liuyankuang_title')


                    }
                    // 切换图片
                });

                $('.wztkj_liuyankuang_f_off').click(function() {
                    console.log('点击了取消');
                    $('.wztkj_liuyankuang_content').css({
                        'display': 'none',
                    })
                    $('.wztkj_liuyankuang_footer').css({
                        'display': 'none',
                    })
                    // 切换图片
                    $(".wztkj_liuyan_close").remove();
                    $("#wztkj_liuyankuang_title").removeClass('wztkj_liuyankuang_title')
                    $("#wztkj_liuyankuang_title").addClass('wztkj_liuyankuang_two')
                })
                $('.wztkj_liuyankuang_f_confirm').click(function() {
                    if ($('.wztkj_liuyankuang_content >textarea').val() != '' && $('.wztkj_liuyankuang_content >textarea').val().trim() != '') {
                        $.ajax({
                            url: url, // API 地址
                            type: 'POST', // 请求类型
                            data: {
                                nonce: nonce,
                                action: 'websitebox_insert_liuyan',
                                content: $('.wztkj_liuyankuang_content textarea').val(),
                            },
                            success: function(data, textStatus, jqXHR) {
                                console.log('请求成功:', data);
                                alert('发送成功')
                                $('.wztkj_liuyankuang_content >textarea').val(" ")
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error('请求失败:', textStatus, errorThrown);
                                alert('请求失败')
                            }
                        });
                    } else {
                        alert("输入不能为空");
                    }

                })
            }
            // 广告 √
            function vdvertise(ad) {
                ad = JSON.parse(ad);
                console.log('广告内容--->', ad);
                //左侧广告(PC显示)
                if (ad.left == 1 && ad.leftad && ad.leftad.length > 0 && wztkj_ScreenWidth > 750) {
                    $("body").append(`
                    <!-- 左侧内容 -->
                    <div class="wztkj_guanggao_left-side">
                    </div>
                    `)
                    var adstr = ''
                    ad.leftad.filter((item) => {
                        if (item.pic != '') {
                            adstr += `
                            <div class="wztkj_guanggao_a wztkj_advertisement_mark">
                        <a class="wztkj_guanggao_a" href="${item.link}">
                        <img src="${item.pic}" alt="左侧图片1" />
                     </a>
                     <img class="wztkj_posi_Closeicon" src="<?php echo esc_url(plugins_url('../img/close_iocn.png', __FILE__)); ?>" alt="关闭" title="关闭广告" />
                     </div>
                        `
                        }
                    })
                    $(".wztkj_guanggao_left-side").append(adstr)
                }
                //右侧广告(PC显示)
                if (ad.right == 1 && ad.rightad && ad.rightad.length > 0 && wztkj_ScreenWidth > 750) {
                    let adstr = ''
                    $("body").append(`
                    <!-- 右侧内容 -->
                    <div class="wztkj_guanggao_right-side">
                    </div>
                    `);
                    ad.rightad.filter(item => {
                        adstr += ` <div class="wztkj_guanggao_a wztkj_advertisement_mark"> <a class="wztkj_guanggao_a" href="${item.link}">
                        <img class="wztkj_posi_img" src="${item.pic}" alt="右侧图片1" />
                    </a> 
                    <img src="<?php echo esc_url(plugins_url('../img/close_iocn.png', __FILE__)); ?>" alt="关闭" class="wztkj_posi_Closeicon" title="关闭广告"/> 
                    </div>`
                    })
                    $(".wztkj_guanggao_right-side").append(adstr)

                }
                //关闭广告(左右两侧的关闭icon和a标签是同级，不存在冒泡和默认事件)
                $(".wztkj_posi_Closeicon").click(function() {
                    event.stopPropagation(); //???????
                    $(this).parent().hide();
                });
                //?????????
                $('.wztkj_posi_img').click(function() {
                    event.stopPropagation();
                });

                // 底部广告，手机端独有(底部广告应该加上开屏广告展示的时间)
                if(ad.bottom == 1 && ad.bottad.pic !== "" && wztkj_ScreenWidth <= 750){ 
                    $("body").append(`
                        <div class="wztkj_guanggao_footer_box">
                            <a href="${ad.bottad.link}" class="f_b_img wztkj_advertisement_mark">
                            <img class="f_b_imgBack" src="${ad.bottad.pic}" alt="">
                            <div class="f_b_i_close">
                                <span ><span id="wztkj_close_title">${ad.bottad.time}</span> 秒后关闭广告</span>
                                <img class="f_b_i_close_img" src="<?php echo esc_url(plugins_url('../img/close_iocn.png', __FILE__)); ?>" alt="">
                            </div>
                            </a>
                        </div>
                    `)

                  footerAdvertisingFun = ()=>{
                    const footerAdElement = $('#wztkj_close_title');
                    //这里调整底部广告的时间
                    let footerAdElementTime = ad.bottad.time
                    const footerAdElementTimer = setInterval(() => {
                        footerAdElementTime--;
                        footerAdElement.text(footerAdElementTime);
                        if (footerAdElementTime == 0) {
                            $('.wztkj_guanggao_footer_box').hide()
                            clearInterval(footerAdElementTimer);
                        }
                    }, 1000);
                    $('.f_b_i_close_img').click(function(event) {
                        event.preventDefault()
                        $('.wztkj_guanggao_footer_box').hide()
                        clearInterval(footerAdElementTimer);
                    }) 
                 }
                 //底部广告在用户开启了开屏广告时，会在开屏广告结束时调用，如果用户没有开启开屏广告，则初次调用
                 if(ad.mobile !== 1){
                    $(".f_b_imgBack").on("load",function(){
                     footerAdvertisingFun()
                    })
                 }
                }
     
                // 手机版弹窗广告(开屏广告)
                //为什么需要这个遮罩呢？<div class="wztkj_guanggao_mobile_shade"></div>
                if(ad.mobile == 1 && ad.mobtad.pic !== "" && wztkj_ScreenWidth <= 750){
                    $("body").append(`
                        <div class="wztkj_guanggao_mobile_box">
                            <div class="wztkj_guanggao_mobile_shade"></div>
                            <div class="wztkj_guanggao_mobile_con">
                            <a href="${ad.mobtad.link}">
                            <img class="w_g_m_back" src="${ad.mobtad.pic}" alt="">
                        
                            <div class="w_g_m_top" style="display:none">
                                <span><span id="wztkj_guanggao_mobile_time">${ad.mobtad.time}</span>秒后关闭广告</span>
                                <img class="w_g_close" src="<?php echo esc_url(plugins_url('../img/close_iocn.png', __FILE__)); ?>" alt="关闭">
                            </div>
                            </a>
                            </div>
                        </div>
                    `)
                 
                    $(".w_g_m_back").on("load",function(){

                        stopRoll()  //显示开屏广告的同时禁用滚动条

                        $(".w_g_m_top").css("display","flex")

                        // 显示时间
                        let mobileAdElementTime = ad.mobtad.time;
                        const mobileAdElement = $('#wztkj_guanggao_mobile_time');
                        let mobileAdElementTimer = setInterval(() => {
                            mobileAdElementTime--;
                            mobileAdElement.text(mobileAdElementTime);

                            if (mobileAdElementTime == 0) {
                                $('.wztkj_guanggao_mobile_box').hide();
                                clearInterval(mobileAdElementTimer);
                                openRoll() //恢复滚动
                                if(ad.bottom == 1){
                                  footerAdvertisingFun()  //结束后调用底部广告
                                }    
                            }
                        }, 1000);
                        $('.wztkj_guanggao_mobile_box .w_g_close').click(function(event) {
                            event.preventDefault();
                            $('.wztkj_guanggao_mobile_box').hide()
                            clearInterval(mobileAdElementTimer);
                            openRoll() //恢复滚动
                            if(ad.bottom == 1){
                               footerAdvertisingFun()  //结束后调用底部广告
                            }  
                        })
                    })
                }
            }
            // 侧边客服 √
            function websitebox_broadSide(kefu) {
                kefu = JSON.parse(kefu);
                console.log(kefu);

                // 控制样式
                let asidebottom = kefu.bottom?`--bbx-side_bottom:${kefu.bottom};`:'';
                let asideright = kefu.right?`--bbx-side_right:${kefu.right};`:'';
                let asideBg = kefu.bg?`--bbx-side_bg:${kefu.bg};`:'';
                let asideColor = kefu.icon?`--bbx-side_color:${kefu.icon};`:'';
                let asideStyle = `style="${asidebottom + asideright + asideBg + asideColor}"`;
                // 控制显示
                let telClass = kefu.phone?'':'wztkj-bbxf-aside_hidden';
                let qqClass = kefu.qq?'':'wztkj-bbxf-aside_hidden';
                let qrcodeClass = kefu.qrcode?'':'wztkj-bbxf-aside_hidden';
                let mailClass = kefu.mail?'':'wztkj-bbxf-aside_hidden';
                let linkClass = kefu.wb?'':'wztkj-bbxf-aside_hidden';
                let qqgroupClass = kefu.qqqun?'':'wztkj-bbxf-aside_hidden';
                let topClass = ''; // 回到顶部是固定显示

                $("body").append(`
<aside class="wztkj-bbxf-aside" ${asideStyle}>
    <!-- 电话 -->
    <div class="wztkj-bbxf-aside_item ${telClass}">
        <img src="${kefu.phone_cls}" alt="">
        <div class="wztkj-bbxf-aside_hover">${kefu.phone}</div>
    </div>
    <!-- qq -->
    <div class="wztkj-bbxf-aside_item wztkj-bbxf-item_qq ${qqClass}">
        <img src="${kefu.qq_cls}" alt="">
        <div class="wztkj-bbxf-aside_hover">${kefu.qq}</div>
    </div>
    <!-- qrcode -->
    <div class="wztkj-bbxf-aside_item ${qrcodeClass}">
        <img src="${kefu.qrcode_cls}" alt="">
        <div class="wztkj-bbxf-aside_hover">
            <img src="${kefu.qrcode}" alt=""></img>
            <div style="display:none">${''}</div>
        </div>
    </div>
    <!-- 邮箱 -->
    <div class="wztkj-bbxf-aside_item wztkj-bbxf-item_mail ${mailClass}">
        <img src="${kefu.mail_cls}" alt="">
        <div class="wztkj-bbxf-aside_hover">${kefu.mail}</div>
    </div>
    <!-- 链接 -->
    <div class="wztkj-bbxf-aside_item wztkj-bbxf-item_link ${linkClass}">
        <img src="${kefu.wb_cls}" alt="">
        <div class="wztkj-bbxf-aside_hover">${kefu.wb}</div>
    </div>
    <!-- qq群 -->
    <div class="wztkj-bbxf-aside_item ${qqgroupClass}">
        <img src="${kefu.qqqun_cls}" alt="">
        <div class="wztkj-bbxf-aside_hover">${kefu.qqqun}</div>
    </div>
    <!-- 回到顶部 -->
    <div class="wztkj-bbxf-aside_item wztkj-bbxf-item_top ${topClass}">
        <img src="<?php echo esc_url(plugins_url('../img/back_top_fff.png', __FILE__)); ?>" alt="">
    </div>
</aside>`);     
                // 回到顶部
                $(".wztkj-bbxf-aside .wztkj-bbxf-item_top").click(function() {
                    console.log('item_top')
                    window.scrollTo(0, 0); 
                });
                // 链接
                $(".wztkj-bbxf-aside .wztkj-bbxf-item_link").click(function() {
                    console.log('item_link')
                    window.open(kefu.wb)
                });
            }
            // 三合一
            function websitebox_threeAndOne(wx, zfb,share,open) {
                // 1. 打赏
                let is_wx = 0;
                if (wx) {
                    is_wx = 1
                }
                let is_zfb = 0;
                if (zfb) {
                    is_zfb = 1
                }

                // 2. 分享
                // 3. 海报


                $("body")
                    .append(`
                   <div class="wztkj_modal_overlay_ds" id="wztkj_modal_overlay_ds" style="display: none">
                    <div class="wztkj_d_modal">
                        <div class="modal_title">
                        <p>请选择打赏方式</p>
                        <img src="<?php echo esc_url(plugins_url('../img/close_iocn.png', __FILE__)); ?>" alt="" class="wztkj_close_ds" />
                        </div>
                        <div class="modal_content">
                        <img src="${wx?wx:zfb}" alt="" />
                        </div>
                        <div class="modal_footer">
                        <button class="wztkj_f_s_btn wztkj_zfb" id="wztkj_wx" style="display:${is_wx == 1 ?"block":"none"}">微信</button>
                        <button class="wztkj_f_s_btn " id="wztkj_zfb" style="display:${is_zfb == 1 ?"block":"none"}">支付宝</button>
                        </div>
                    </div>
                    </div>
                            `)
                // 打赏 --微信
                $("#wztkj_wx").click(function() {
                    console.log($('.modal_footer').children().length);
                    if ($('.modal_footer').children().length > 1) {

                        $(".modal_content").html(
                            `<img src="${wx}" alt="" />`
                        );
                        $("#wztkj_wx").addClass("wztkj_zfb");
                        $("#wztkj_zfb").removeClass("wztkj_zfb");
                    }

                });
                // 打赏 --支付宝
                $("#wztkj_zfb").click(function() {
                    if ($('.modal_footer').children().length > 1) {
                        $(".modal_content").html(
                            `<img src="${zfb}" alt="" />`
                        );
                        $("#wztkj_wx").removeClass("wztkj_zfb");
                        $("#wztkj_zfb").addClass("wztkj_zfb");
                    }
                });
                if(share){
                    $("body")
                        .append(`
                        <div class="wztkj_modal_overlay_ds" id="modal_overlay_fx" style="display: none">
                        <div class="wztkj_d_modal">
                            <div class="modal_title">
                            <p>分享到.....</p>
                            <img src="<?php echo esc_url(plugins_url('../img/close_iocn.png', __FILE__)); ?>" alt="" class="wztkj_close_ds" />
                            </div>
                            <div class="social-share"></div>
                        </div>
                        </div>
                    `);
                }
                
                const now_time = new Date();
                const year = now_time.getFullYear();
                const month = ('0' + (now_time.getMonth() + 1)).slice(-2);
                const day = ('0' + now_time.getDate()).slice(-2);
                const hours = ('0' + now_time.getHours()).slice(-2);
                const minutes = ('0' + now_time.getMinutes()).slice(-2);
                const seconds = ('0' + now_time.getSeconds()).slice(-2);

                const post_time = `${year}/${month}/${day} ${hours}:${minutes}`;
                // <div class="">${window.location.href}</div>
                
                if(open){
                   
                    var website_title = '<?php echo esc_attr(get_the_title());?>';
                    var website_desc =`<?php $excerpt = get_post($id)->post_excerpt;
                                if($excerpt){
                                    echo $excerpt;
                                }else{
                                    $desc = mb_strimwidth(wp_strip_all_tags(strip_shortcodes(get_post($id)->post_content)),0,240,'...');
                                    $filtered_content = preg_replace('/\[.*?\]/', '', $desc);
                                    echo $filtered_content;
                                }?>`
                    var website_pic =`<?php  $thumb_id = get_post_thumbnail_id($id);
                        if($thumb_id){
                            $thumb_url = wp_get_attachment_image_src($thumb_id,"thumbnail-size", true);
                            echo $thumb_url[0];
                        }else{
                            preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post($id)->post_content, $matches);
                                 if(isset($matches[1][0]) && $matches[1][0]){
                                    echo $matches[1][0];
                                   
                                }else{
                                    echo plugin_dir_url( WEBSITEBOX_FILE).'img/haibao.jpg';
                                }
                            //echo isset($content['img'])?$content['img']:get_template_directory_uri().'/assets/images/content_default.jpg';
                        }?>`
                $("body")
                    .append(`
                        <div class="wztkj_modal_overlay_ds" id="modal_overlay_hb" style="display: none">
                        <div class="wztkj_d_modal">
                            <div id="wztkj_d_mod_one" style="width: 300px;box-sizing: content-box; border: 1px solid #333;">
                                <div class="modal_ti_img">
                                    <img src="${website_pic}" alt="" />
                                    <div class="modal_ti_c_title">
                                        <div class="overflow_text">
                                            ${website_title}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_ti_con">
                                    <div class="modal_ti_c_time">
                                         <!--div class="a_wzt_post_cate">这是分类</div-->
                                        <div class="a_wzt_post_time">${post_time}</div>
                                    </div>
                                    <div class="modal_ti_c_des">${website_desc}</div>
                                    <div class="modal_ti_c_box">
                                        <div class="modal_ti_c_b_left" id="wztkj_qrcode"></div>
                                        <div class="modal_ti_c_b_right">
                                            <div class="">长按或扫一扫</div>
                                            <div class="" style="color:#4a824a;">立即预览</div>
                                        </div>
                                        <div class="modal_ti_c_b_zhiwen">
                                            <img src="<?php echo plugin_dir_url( WEBSITEBOX_FILE);?>assets/zhiwen.png " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal_ti_footer">
                                <button class="modal_ti_c_r_btn modal_ti_c_r_b_one" style="font-size:15px;">点击下载</button>
                            </div>
                        </div>
                        </div>
                            `)
                }
                // link  当前链接地址
                var link = window.location.href;
                if(share){
                    // 创建二维码
                    var wztkj_qrcode = new QRCode(document.getElementById("wztkj_qrcode"), {
                        text: link,
                        width: 80,
                        height: 80,
                        colorDark: "#000000",
                        colorLight: "#ffffff",
                        correctLevel: QRCode.CorrectLevel.H,
                    });
                }

                // 点击事件
                // 打赏
                $("#wztkj_f_s_c_ds").click(function() {
                    $("#wztkj_modal_overlay_ds").show();
                });
                // 分享
                $("#wztkj_f_s_c_fx").click(function() {
                    $("#modal_overlay_fx").show();
                });
                let jiping = "";
                const screenWidth = window.innerWidth;
                const screenHeight = window.innerHeight;

                // 截屏 -- 海报
                $("#wztkj_f_s_c_hb").click(function() {
                    // 2025.1.22  这里将main改成了body，原因在于有些网站可能没有main标签，会报错。
                    // html2canvas(document.querySelector("body"), {
                    //     useCORS: true,
                    //     logging: false,
                    //     width: screenWidth,
                    //     height: screenHeight,
                    // }).then((canvas) => {
                    //     // 将Canvas转换为图片
                    //     jiping = canvas.toDataURL("image/png");
                    //     // 显示图片
                    //     $(".modal_ti_img").html(`<img src="${jiping}" alt="Screenshot" />`);
                    // });
                    $("#modal_overlay_hb").show();
                });

                // 点击遮罩
                $(".wztkj_modal_overlay_ds").click(function() {
                    $(".wztkj_modal_overlay_ds").hide();
                });
                // x icon 关闭
                $(".wztkj_close_ds").click(function() {
                    $(".wztkj_modal_overlay_ds").hide();
                });
                // 弹出层不会
                $(".wztkj_d_modal").click(function() {
                    event.stopPropagation();
                });
                let wztkj_i = 0;
                // 海报点击下载
                $(".modal_ti_c_r_b_one").click(function() {
                    wztkj_i++;
                    html2canvas(document.getElementById("wztkj_d_mod_one")).then((canvas) => {
                        var link = document.createElement("a");
                        link.href = canvas
                            .toDataURL("image/png")
                            .replace("image/png", "image/octet-stream");
                        link.download = `分享${wztkj_i}.png`;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    });
                });
                // 分享设置的软件
                socialShare(".social-share", {
                    sites: ["qzone", "qq", "weibo", "wechat"],
                });
            }
  
            
            $(document).ready(function() {

                <?php if (is_single()) { ?>
                    //常规设置---弹幕 √
                    websitebox_popupRoll()
                <?php } ?>

                <?php if (isset($websitebox_base['copy']) && $websitebox_base['copy']) { ?>
                    websitebox_forbidCopy()
                <?php } ?>

                <?php if (isset($websitebox_base['look']) && $websitebox_base['look']) { ?>
                    websitebox_lookCode()
                <?php } ?>




                <?php if (is_single()) {
                    if (isset($websitebox_base['barrage']) && $websitebox_base['barrage']) {

                        global $post;
                        $content = get_comments('status=approve&type=comment&post_id=' . (int)$post->ID);
                        $comment_content = [];
                        foreach ($content as $key => $val) {
                            $comment_content[$key]['text'] = esc_attr($val->comment_content);
                            $comment_content[$key]['href']  = '';
                        }
                        if (!empty($comment_content)) {
                ?>
                            // 弹窗滚动
                            {
                                websitebox_popupRoll()
                                var data = <?php echo wp_json_encode($comment_content); ?>;

                                var Obj = $('body').barrage({
                                    data: data, //数据列表
                                    row: 5, //显示行数
                                    time: 2500, //间隔时间
                                    gap: 20, //每一个的间隙
                                    position: 'fixed', //绝对定位
                                    direction: 'bottom right', //方向
                                    ismoseoverclose: true, //悬浮是否停止
                                    height: 30, //设置单个div的高度
                                })
                                Obj.start()
                            }

                <?php }
                    }
                } ?>
                <?php if (isset($websitebox_base['pre']) && $websitebox_base['pre']) { ?>
                    // 网站预加载
                    websitebox_hoverAtag()
                <?php } ?>
                <?php if ((isset($websitebox_guanggao['left']) && $websitebox_guanggao['left']) || (isset($websitebox_guanggao['right']) && $websitebox_guanggao['right']) || (isset($websitebox_guanggao['bottom']) && $websitebox_guanggao['bottom']) || (isset($websitebox_guanggao['mobile']) && $websitebox_guanggao['mobile'])) { ?>
                    // 广告
                    vdvertise('<?php echo wp_json_encode($websitebox_guanggao); ?>')
                <?php } ?>

                <?php if (isset($websitebox_shoujikefu['auto']) && $websitebox_shoujikefu['auto'] &&  wp_is_mobile()) { ?>
                    // 手机客服---侧边客服 
                    websitebox_phoneKf('<?php echo wp_json_encode($websitebox_shoujikefu); ?>')
                <?php } ?>
                <?php if ((isset($websitebox_liuyan['auto']) && $websitebox_liuyan['auto'] && !wp_is_mobile()) || (isset($websitebox_liuyan['mobile_auto']) && $websitebox_liuyan['mobile_auto'] && wp_is_mobile())) { ?>
                    // 留言板
                    websitebox_lvyan_new('<?php echo wp_json_encode($websitebox_liuyan); ?>', '<?php echo $nonce; ?>', '<?php echo $url; ?>')
                <?php }  ?>
                <?php if ((isset($websitebox_sitebg['auto']) && $websitebox_sitebg['auto'] && !wp_is_mobile()) || (isset($websitebox_sitebg['mobile_auto']) && $websitebox_sitebg['mobile_auto'] && wp_is_mobile())) { ?>

                    websitebox_webBackClass('<?php echo wp_json_encode($websitebox_sitebg); ?>')
                <?php } ?>

                <?php if ((isset($websitebox_alert['auto']) && $websitebox_alert['auto'] && !wp_is_mobile()) || (isset($websitebox_alert['mobile_auto']) && $websitebox_alert['mobile_auto'] && wp_is_mobile())) { ?>

                    // 提示框
                    websitebox_notification('<?php echo wp_json_encode($websitebox_alert); ?>')
                <?php } ?>


                <?php if ((isset($websitebox_scroll['auto']) && $websitebox_scroll['auto'] && !wp_is_mobile()) || (isset($websitebox_scroll['mobile_auto']) && $websitebox_scroll['mobile_auto'] && wp_is_mobile())) {

                ?>
                    // 滚动条
                    websitebox_rollBar('<?php echo wp_json_encode($websitebox_scroll); ?>')
                <?php } ?>

                <?php if (isset($websitebox_kefu['kefu']) && $websitebox_kefu['kefu']  &&  !wp_is_mobile()) { ?>
                    // 侧边导航条
                    websitebox_broadSide('<?php echo wp_json_encode($websitebox_kefu); ?>')
                <?php } ?>
                <?php if (isset($websitebox_picload['auto']) && $websitebox_picload['auto']) { ?>
                    // 图片loading效果
                    websitebox_imgLoading('<?php echo  (int)$websitebox_picload['type']; ?>')
                <?php } ?>
               <?php if (is_single()) {?>
                // 三合一
                websitebox_threeAndOne('<?php if (isset($websitebox_sanheyi['wx']) && $websitebox_sanheyi['wx']) {
                                            echo esc_url($websitebox_sanheyi['wx']);
                                        }; ?>', '<?php if (isset($websitebox_sanheyi['ali']) && $websitebox_sanheyi['ali']) {
                                                        echo esc_url($websitebox_sanheyi['ali']);
                                                    } ?>','<?php if (isset($websitebox_sanheyi['share']) && $websitebox_sanheyi['share']) {
                                                        echo esc_url($websitebox_sanheyi['share']);
                                                    } ?>','<?php if (isset($websitebox_sanheyi['open']) && $websitebox_sanheyi['open']) {
                                                        echo esc_url($websitebox_sanheyi['open']);
                                                    } ?>')
                <?php }?>



            })
        // })
        })
        </script>


        <script>
            $(function() {
                console.log("当前屏幕宽度为：", $(window).width())

         
            //     window.addEventListener("load",function(){
            //     if ($(window).width() > 750) {
            //         //PC端，隐藏底部浮动广告
            //         $("body .wztkj_guanggao_footer_box").hide()
            //         //PC端，隐藏开屏广告
            //         $("body .wztkj_guanggao_mobile_box").hide()
            //         //PC端，显示左右两侧广告
            //         //左侧
            //         $("body .wztkj_guanggao_left-side").show()
            //         //右侧
            //         $("body .wztkj_guanggao_right-side").show()

            //     } else {
            //         //移动端，显示底部浮动广告
            //         $("body .wztkj_guanggao_footer_box").show()
            //         //移动端，显示开屏广告
            //         $("body .wztkj_guanggao_mobile_box").show()
            //         //移动端，隐藏左右两侧广告
            //         //左侧
            //         $("body .wztkj_guanggao_left-side").hide()
            //         //右侧
            //         $("body .wztkj_guanggao_right-side").hide()
            //     }
            //   })
            })
        </script>
<?php
    }
}
