// 常规设置---禁止复制 √
function websitebox_forbidCopy() {
  $(document).on("contextmenu", function (e) {
    return false;
  });

  // 禁止选取文本
  $(document).on("selectstart", function (e) {
    return false;
  });
}
//常规设置---禁止查看源码 √
function websitebox_lookCode() {
  $(document).on("keydown", function (e) {
    if (e.keyCode === 123) {
      return false;
    }
    // 屏蔽Ctrl+Shift+I
    if (e.ctrlKey && e.shiftKey && e.keyCode === 73) {
      return false;
    }
    // 屏蔽Shift+F10
    if (e.shiftKey && e.keyCode === 121) {
      return false;
    }
    // 屏蔽Ctrl+S
    if (e.ctrlKey && e.keyCode === 83) {
      return false;
    }
  });

  // 屏蔽右键单击
  $(document).on("contextmenu", function () {
    return false;
  });
}
//常规设置---弹幕 √
function websitebox_popupRoll() {
  if(window.innerWidth < 750) return ;
  $.fn.barrage = function (opt) {
    var _self = $(this);

    var opts = {
      //默认参数
      data: [], //数据列表
      row: 5, //显示行数
      time: 2000, //间隔时间
      gap: 20, //每一个的间隙
      position: "fixed", //绝对定位
      direction: "bottom right", //方向
      ismoseoverclose: true, //悬浮是否停止
      height: 30,
    };

    var settings = $.extend({}, opts, opt); //合并参数
    var M = {},
      Obj = {};
    Obj.data = settings.data;
    M.vertical = settings.direction.split(/\s+/)[0]; //纵向
    M.horizontal = settings.direction.split(/\s+/)[1]; //横向
    M.bgColors = [
      "#edbccc",
      "#edbce7",
      "#c092e4",
      "#9b92e4",
      "#92bae4",
      "#92d9e4",
      "#92e4bc",
      "#a9e492",
      "#d9e492",
      "#e4c892",
    ]; //随机背景色数组
    Obj.arrEle = []; //预计存储dom集合数组
    M.barrageBox = $(
      '<div id="barrage" style="z-index:1;max-width: 420px;max-height: 500px;position:' +
        settings.position +
        ";" +
        M.vertical +
        ":0;" +
        M.horizontal +
        ':0;"></div>'
    ); //存所有弹幕的盒子
    M.timer = null;
    var createView = function () {
      var randomIndex = Math.floor(Math.random() * M.bgColors.length);
      var ele = $(
        '<a class="wztkej_text" style="height:0;opacity:0;text-align:' +
          settings.direction.split(/\s+/)[1] +
          ";float:" +
          settings.direction.split(/\s+/)[1] +
          ";background-color:" +
          M.bgColors[randomIndex] +
          '"; href="' +
          (Obj.data[0].href ? Obj.data[0].href : "javascript:;") +
          '">' +
          Obj.data[0].text +
          "</a>"
      );
      var str = Obj.data.shift();
      if (M.vertical == "top") {
        ele.animate(
          {
            opacity: 1,
            "margin-top": settings.gap,
            height: settings.height,
            "line-height": settings.height + "px",
          },
          1000
        );
        M.barrageBox.prepend(ele);
      } else {
        ele.animate(
          {
            opacity: 1,
            "margin-bottom": settings.gap,
            height: settings.height,
            "line-height": settings.height + "px",
          },
          1000
        );
        M.barrageBox.append(ele);
      }
      Obj.data.push(str);

      if (M.barrageBox.children().length > settings.row) {
        M.barrageBox
          .children()
          .eq(0)
          .animate(
            {
              opacity: 0,
            },
            300,
            function () {
              $(this)
                .css({
                  margin: 0,
                })
                .remove();
            }
          );
      }
    };
    M.mouseClose = function () {
      settings.ismoseoverclose &&
        (function () {
          M.barrageBox
            .mouseover(function () {
              clearInterval(M.timer);
              M.timer = null;
            })
            .mouseout(function () {
              M.timer = setInterval(function () {
                //循环
                createView();
              }, settings.time);
            });
        })();
    };
    Obj.close = function () {
      M.barrageBox.remove();
      clearInterval(M.timer);
      M.timer = null;
    };
    Obj.start = function () {
      if (M.timer) return;
      _self.append(M.barrageBox); //把弹幕盒子放到页面中
      createView(); //创建试图并开始动画
      M.timer = setInterval(function () {
        //循环
        createView();
      }, settings.time);
      M.mouseClose();
    };

    return Obj;
  };
}

//常规设置---网站预加载 √
function websitebox_hoverAtag() {
  var timeoutId; // 用于存储定时器ID
  $("a").hover(
    function () {
      // 鼠标移入时的事件
      var that = this; // 保存当前链接的上下文
      clearTimeout(timeoutId);
      timeoutId = setTimeout(function () {
        // 检查鼠标是否仍然悬浮在同一个链接上
        if ($(that).is(":hover")) {
          console.log($(that).attr("href"));
          // 使用Fetch API预加载资源
          fetch($(that).attr("href"), {
            method: "GET",
            mode: "cors", // 跨域请求
            credentials: "omit", // 不发送任何凭证信息（cookies等）
            keepalive: true, // 保持连接活动，即使页面被卸载
          })
            .then((response) => {
              if (response.ok) {
                return response.text(); // 获取页面内容
              }
              throw new Error("Network response was not ok.");
            })
            .catch((error) =>
              console.error("Error preloading resource:", error)
            );
        }
      }, 650); // 1000毫秒后执行
    },
    function () {
      // 鼠标移出时的事件
      clearTimeout(timeoutId); // 清除定时器
    }
  );
}
// 手机客服---侧边客服 √
function websitebox_phoneKf(kefu) {
  kefu = JSON.parse(kefu);
  if (kefu.location == 2) {
    var location = "wztkj_cebian_box_right";
  } else {
    var location = "wztkj_cebian_box_left";
  }
  // 样式两中wztkj_cebian_box_left  wztkj_cebian_box_right
  var $newElement =
    $(`<div class="wztkj_cebian_box ${location}"><a href="tel:${kefu.phone}"><img src=" ${kefu.kefuicon} " alt=""></a> </div>`);

  $("body").append($newElement);
}

// 网站背景 √
const bgEffectIndexMap = {
  starLine: 0, // 0.几何星空连线背景
  blueBlock: 1, // 1.蓝色方块会动
  coloredRibbon: -1, // 2.彩带 -------- 删了
  codeRain: 2, // 3.代码雨
  rotatingStarrySky: 3, // 4.宇宙转动
  pinkHeart: 4, // 5.心特效
}
function websitebox_webBackClass(bg) {
  bg = JSON.parse(bg);
  // 修改背景颜色
  if (bg.type == 1) {
    // $("body").append(`<div style="width: 100vw;height: 100; background:${bg.bg}">1111111111111111111111</div>`)
    $("body").css("background", bg.bg);
  } else if (bg.type == 2) {
    // 修改背景图片
    $("body").css({
      "background-image": `url("${bg.back}")`,
      "background-size": "100%",
    });
  } else if (bg.type == 3) {
    // 修改风格
    // 0.几何星空连线背景
    // 1.蓝色方块会动
    // 2.彩带
    // 3.代码雨
    // 4.宇宙转动
    // 5.心特效
    var index = bg.texiao;
    if (index == bgEffectIndexMap.starLine) {
      // var BACKGROUND_COLOR = "rgba(0,43,54,1)"; // 背景颜色
      // var BACKGROUND_COLOR = "rgba(190,210,200,.8)"; // 背景颜色
      var BACKGROUND_COLOR = "rgba(255,255,255,.8)"; // 背景颜色
      var POINT_NUM = 100; // 星星数目
      // var POINT_COLOR = "rgba(255,255,255,.8)"; // 点的颜色
      var POINT_COLOR = "rgba(212,22,255,1)"; // 点的颜色
      // var POINT_COLOR = "rgba(12,160,200,.8)"; // 点的颜色
      // var POINT_COLOR = "rgba(0,43,54,1)"; // 点的颜色
      // var POINT_COLOR = "rgba(5,39,175,.8)"; // 点的颜色
      var LINE_LENGTH = 10000; // 点之间连线长度(的平方)

      // 创建背景画布
      var cvs = document.createElement("canvas");
      cvs.width = window.innerWidth;
      cvs.height = window.innerHeight;
      cvs.style.cssText =
        "\
                              position:fixed;\
                              top:0px;\
                              left:0px;\
                              z-index:-1;\
                              opacity:1.0;\
                              ";
      document.body.appendChild(cvs);

      var ctx = cvs.getContext("2d");

      var startTime = new Date().getTime();

      //随机数函数
      function randomInt(min, max) {
        return Math.floor((max - min + 1) * Math.random() + min);
      }

      function randomFloat(min, max) {
        return (max - min) * Math.random() + min;
      }

      //构造点类
      function Point() {
        this.x = randomFloat(0, cvs.width);
        this.y = randomFloat(0, cvs.height);

        var speed = randomFloat(0.3, 1.4);
        var angle = randomFloat(0, 2 * Math.PI);

        this.dx = Math.sin(angle) * speed;
        this.dy = Math.cos(angle) * speed;

        this.r = 1.2;

        this.color = POINT_COLOR;
      }

      Point.prototype.move = function () {
        this.x += this.dx;
        if (this.x < 0) {
          this.x = 0;
          this.dx = -this.dx;
        } else if (this.x > cvs.width) {
          this.x = cvs.width;
          this.dx = -this.dx;
        }
        this.y += this.dy;
        if (this.y < 0) {
          this.y = 0;
          this.dy = -this.dy;
        } else if (this.y > cvs.height) {
          this.y = cvs.height;
          this.dy = -this.dy;
        }
      };

      Point.prototype.draw = function () {
        ctx.fillStyle = this.color;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2);
        ctx.closePath();
        ctx.fill();
      };

      var points = [];

      function initPoints(num) {
        for (var i = 0; i < num; ++i) {
          points.push(new Point());
        }
      }

      var p0 = new Point(); //鼠标
      p0.dx = p0.dy = 0;
      var degree = 2.5;
      document.onmousemove = function (ev) {
        p0.x = ev.clientX;
        p0.y = ev.clientY;
      };
      document.onmousedown = function (ev) {
        degree = 5.0;
        p0.x = ev.clientX;
        p0.y = ev.clientY;
      };
      document.onmouseup = function (ev) {
        degree = 2.5;
        p0.x = ev.clientX;
        p0.y = ev.clientY;
      };
      window.onmouseout = function () {
        p0.x = null;
        p0.y = null;
      };

      function drawLine(p1, p2, deg) {
        var dx = p1.x - p2.x;
        var dy = p1.y - p2.y;
        var dis2 = dx * dx + dy * dy;
        if (dis2 < 2 * LINE_LENGTH) {
          if (dis2 > LINE_LENGTH) {
            if (p1 === p0) {
              p2.x += dx * 0.03;
              p2.y += dy * 0.03;
            } else return;
          }
          var t = (1.05 - dis2 / LINE_LENGTH) * 0.2 * deg;
          // ctx.strokeStyle = "rgba(255,255,255," + t + ")";
          // "rgba(212,22,255," + t + ")";
          // rgba(12,160,200,.8)
          ctx.strokeStyle = "rgba(212,22,255," + t + ")";
          ctx.beginPath();
          ctx.lineWidth = 1.5;
          ctx.moveTo(p1.x, p1.y);
          ctx.lineTo(p2.x, p2.y);
          ctx.closePath();
          ctx.stroke();
        }
        return;
      }

      //绘制每一帧
      function drawFrame() {
        cvs.width = window.innerWidth;
        cvs.height = window.innerHeight;
        ctx.fillStyle = BACKGROUND_COLOR;
        ctx.fillRect(0, 0, cvs.width, cvs.height);

        var arr = p0.x == null ? points : [p0].concat(points);
        for (var i = 0; i < arr.length; ++i) {
          for (var j = i + 1; j < arr.length; ++j) {
            drawLine(arr[i], arr[j], 1.0);
          }
          arr[i].draw();
          arr[i].move();
        }

        window.requestAnimationFrame(drawFrame);
      }

      initPoints(POINT_NUM);
      drawFrame();
    } else if (index == bgEffectIndexMap.blueBlock) {
      $("body").append(`
                      <div id="wztkj_back_two_container">
                      <div id="wztkj_back_two_output">
                      </div>
                      </div>
                      `);
      wztkj_back_two_container();
    } else if (index == bgEffectIndexMap.coloredRibbon) {
      $("body")
        .append(` <canvas id="wztkj_texiao_three_one" width="100%" height="auto"></canvas>
                      `);
      $("body").css({
        "background-color": "#222222",
      });
      wztkj_texiao_three_one();
      console.log("执行了");
    } else if (index == bgEffectIndexMap.codeRain) {
      $("body").append(`
                      <canvas id="wztkj_back_four_container"></canvas>
                      `);
      var canvas = $("#wztkj_back_four_container")[0];
      var context = canvas.getContext("2d");
      // 浏览器宽高
      var W = $(window).width();
      var H = $(window).height();
      canvas.width = W;
      canvas.height = H;
      var fontSize = 15;
      var columns = Math.floor(W / fontSize);
      // 坐标
      var coordinate = [];
      for (var i = 0; i < columns; i++) {
        coordinate.push(0);
      }
      var str = "javascript html5 canvas";

      function draw() {
        // 背景色
        context.fillStyle = "rgba(0,0,0,0.05)";
        context.fillRect(0, 0, W, H);
        context.font = "800 " + fontSize + "px  宋体";
        // 字体颜色
        context.fillStyle = "#01fef5";
        for (var i = 0; i < columns; i++) {
          var index = Math.floor(Math.random() * str.length);
          var x = i * fontSize;
          var y = coordinate[i] * fontSize;
          context.fillText(str[index], x, y);
          if (y >= canvas.height && Math.random() > 0.88) {
            coordinate[i] = 0;
          }
          coordinate[i]++;
        }
      }

      function randColor() {
        var r = Math.floor(Math.random() * 256);
        var g = Math.floor(Math.random() * 256);
        var b = Math.floor(Math.random() * 256);
        return "rgb(" + r + "," + g + "," + b + ")";
      }

      draw();
      setInterval(draw, 30);
    } else if (index == bgEffectIndexMap.rotatingStarrySky) {
      $("body").append(`<canvas id="wztkj_texiao_five_ccanvas"></canvas> 
                      `);
      var canvas = $("#wztkj_texiao_five_ccanvas")[0],
        ctx = canvas.getContext("2d"),
        w = (canvas.width = $(window).width()),
        h = (canvas.height = $(window).height()),
        hue = 217,
        stars = [],
        count = 0,
        maxStars = 1300; //星星数量

      var canvas2 = $("<canvas></canvas>")[0],
        ctx2 = canvas2.getContext("2d");
      canvas2.width = 100;
      canvas2.height = 100;
      var half = canvas2.width / 2,
        gradient2 = ctx2.createRadialGradient(half, half, 0, half, half, half);
      gradient2.addColorStop(0.025, "#CCC");
      gradient2.addColorStop(0.1, "hsl(" + hue + ", 61%, 33%)");
      gradient2.addColorStop(0.25, "hsl(" + hue + ", 64%, 6%)");
      gradient2.addColorStop(1, "transparent");

      ctx2.fillStyle = gradient2;
      ctx2.beginPath();
      ctx2.arc(half, half, half, 0, Math.PI * 2);
      ctx2.fill();

      // End cache

      function random(min, max) {
        if (arguments.length < 2) {
          max = min;
          min = 0;
        }

        if (min > max) {
          var hold = max;
          max = min;
          min = hold;
        }

        return Math.floor(Math.random() * (max - min + 1)) + min;
      }

      function maxOrbit(x, y) {
        var max = Math.max(x, y),
          diameter = Math.round(Math.sqrt(max * max + max * max));
        return diameter / 2;
        //星星移动范围，值越大范围越小，
      }

      var Star = function () {
        this.orbitRadius = random(maxOrbit(w, h));
        this.radius = random(60, this.orbitRadius) / 8; //星星大小
        this.orbitX = w / 2;
        this.orbitY = h / 2;
        this.timePassed = random(0, maxStars);
        this.speed = random(this.orbitRadius) / 50000; //星星移动速度
        this.alpha = random(2, 10) / 10;

        count++;
        stars[count] = this;
      };

      Star.prototype.draw = function () {
        var x = Math.sin(this.timePassed) * this.orbitRadius + this.orbitX,
          y = Math.cos(this.timePassed) * this.orbitRadius + this.orbitY,
          twinkle = random(10);

        if (twinkle === 1 && this.alpha > 0) {
          this.alpha -= 0.05;
        } else if (twinkle === 2 && this.alpha < 1) {
          this.alpha += 0.05;
        }

        ctx.globalAlpha = this.alpha;
        ctx.drawImage(
          canvas2,
          x - this.radius / 2,
          y - this.radius / 2,
          this.radius,
          this.radius
        );
        this.timePassed += this.speed;
      };

      for (var i = 0; i < maxStars; i++) {
        new Star();
      }

      function animation() {
        ctx.globalCompositeOperation = "source-over";
        ctx.globalAlpha = 0.5; //尾巴
        ctx.fillStyle = "hsla(" + hue + ", 64%, 6%, 2)";
        ctx.fillRect(0, 0, w, h);

        ctx.globalCompositeOperation = "lighter";
        for (var i = 1, l = stars.length; i < l; i++) {
          stars[i].draw();
        }

        window.requestAnimationFrame(animation);
      }

      animation();
    } else if (index == bgEffectIndexMap.pinkHeart) {
      $("body").append(
        `<canvas id="wztkj_texiao_sxi_canvas"  width="1212" height="100%"></canvas> `
      );
      console.log($("#wztkj_texiao_sxi_canvas"));
      wztkj_texiao_sxi_canvas();
    }
  }
}

// 提示框 √
function websitebox_notification(tan) {
  console.log('websitebox_notification')
  console.log(tan)
  tan = JSON.parse(tan.replace(/\n/g,'\\n'));
  // true 表示文字   false 表示图片
  if (tan.type == 1) {
    // 内容提示

    $("body").append(` <!-- 弹出层 -->
              <div id="wztkj_notifi_box" class="wztkj_notifi_box">
              <div class="wztkj_notifi_box-content">
                  <div class="titlt" style="background-color: ${tan.bg}; color: ${tan.word};">${tan.title}</div>
                  <p style=" color: ${tan.content_color};">${tan.content}</p>
              </div>
              </div>

              <!-- 蒙版 -->
              <div id="wztkj_notifi_mask" class="wztkj_notifi_mask"></div>`);
  } else {
    // 图文提示
    $("body").append(` <!-- 弹出层 -->
              <div id="wztkj_notifi_box" class="wztkj_notifi_box">
              <div  class="wztkj_notifi_box_one">
              <img src="${tan.pic}" alt="">
              </div>
              </div>

              <!-- 蒙版 -->
              <div id="wztkj_notifi_mask" class="wztkj_notifi_mask"></div>`);
  }

  // 使用jQuery显示弹出层和蒙版
  function showwztkj_notifi_box() {
    $("#wztkj_notifi_box").show();
    $("#wztkj_notifi_mask").show();
  }
  // 使用jQuery为蒙版添加点击事件，关闭弹出层
  $("#wztkj_notifi_mask").click(function () {
    console.log(12233333);
    $("#wztkj_notifi_box").hide();
    $("#wztkj_notifi_mask").hide();
  });
}

// 图片加载loading效果 √
function websitebox_imgLoading(index) {
  // index = 2;
  // 1. 方块效果
  // 2. 滚东效果
  // 3. 点点效果 1
  // 4. 方块雨效果 1
  // 5. 溶解效果 1
  // 6. 转圈加载
  if (index == 1) {
    var images = $("img"); // 使用 jQuery 的选择器获取所有的 img 元素

    images.each(function () {
      var imgWidth = $(this).width();
      var imgHeight = $(this).height();

      if (imgHeight > 55 || imgWidth > 55) {
        var $image = $(this); // 当前 img 元素的 jQuery 对象
        var $parent = $image.parent(); // 当前 img 元素的父元素的 jQuery 对象

        // 确保父元素设置了 position: relative;
        if (!$parent.hasClass("wztkj_loading_parent_relative")) {
          $parent.addClass("wztkj_loading_parent_relative");
        }

        // 创建遮盖层并插入到 img 元素之前
        var $overlay = $(`<div class="wztkj_loading_box02">
            <div class="wztkj_loading_spinner"></div>
          </div>`).insertBefore($image);

        // 监听 load 事件，隐藏遮盖层
        $image.on("load", function () {
          setTimeout(() => {
            $('.wztkj_loading_box02').hide();
          }, 1000);
        });
        // 监听 error 事件，打印错误信息
        $image.on("error", function () {
          console.log("Image failed to load:", this.src);
        });
      }
    });
  } else if (index == 2) {
    var images = $("img"); // 使用 jQuery 的选择器获取所有的 img 元素

    images.each(function () {
      var imgWidth = $(this).width();
      var imgHeight = $(this).height();
      var $image = $(this); // 当前 img 元素的 jQuery 对象
      var $parent = $image.parent(); // 当前 img 元素的父元素的 jQuery 对象
      if (imgHeight > 55 || imgWidth > 55) {
        // 确保父元素设置了 position: relative;
        if (!$parent.hasClass("wztkj_loading_parent_relative")) {
          $parent.addClass("wztkj_loading_parent_relative");
        }

        // 创建遮盖层并插入到 img 元素之前
        var $overlay = $(`<div class="wztkj_loading_box02">
                <div class="wztkj_loading_loading-wave02">
                    <div class="wztkj_loading_loading-bar02"></div>
                    <div class="wztkj_loading_loading-bar02"></div>
                    <div class="wztkj_loading_loading-bar02"></div>
                    <div class="wztkj_loading_loading-bar02"></div>
                </div>
                </div>`).insertBefore($image);

        // 监听 load 事件，隐藏遮盖层
        $image.on("load", function () {
          setTimeout(() => {
            $('.wztkj_loading_box02').hide();
          }, 1000);
        });

        // 监听 error 事件，打印错误信息
        $image.on("error", function () {
          console.log("Image failed to load:", this.src);
        });
      }
    });
  } else if (index == 3) {
    var images = $("img"); // 使用 jQuery 的选择器获取所有的 img 元素

    images.each(function () {
      var imgWidth = $(this).width();
      var imgHeight = $(this).height();

      if (imgWidth > 55 || imgHeight > 55) {
        var $image = $(this); // 当前 img 元素的 jQuery 对象
        var $parent = $image.parent(); // 当前 img 元素的父元素的 jQuery 对象

        // 确保父元素设置了 position: relative;
        if (!$parent.hasClass("wztkj_loading_parent_relative")) {
          $parent.addClass("wztkj_loading_parent_relative");
        }

        // 创建遮盖层并插入到 img 元素之前
        var $overlay = $(`<div class="wztkj_loading_box02">
                <section class="wztkj_loading_loading_wztkj_loading_loading_dot03s-container03">
                <div class="wztkj_loading_loading_dot03"></div>
                <div class="wztkj_loading_loading_dot03"></div>
                <div class="wztkj_loading_loading_dot03"></div>
                <div class="wztkj_loading_loading_dot03"></div>
                <div class="wztkj_loading_loading_dot03"></div>
                </section></div>`).insertBefore($image);

        // 监听 load 事件，隐藏遮盖层
        $image.on("load", function () {
          setTimeout(() => {
            $('.wztkj_loading_box02').hide();
          }, 1000);
        });

        // 监听 error 事件，打印错误信息
        $image.on("error", function () {
          console.log("Image failed to load:", this.src);
        });
      }
    });
  } else if (index == 4) {
    var images = $("img"); // 使用 jQuery 的选择器获取所有的 img 元素

    images.each(function () {
      var imgWidth = $(this).width();
      var imgHeight = $(this).height();

      if (imgHeight > 55 || imgWidth > 55) {
        var $image = $(this); // 当前 img 元素的 jQuery 对象
        var $parent = $image.parent(); // 当前 img 元素的父元素的 jQuery 对象

        // 确保父元素设置了 position: relative;
        if (!$parent.hasClass("wztkj_loading_parent_relative")) {
          $parent.addClass("wztkj_loading_parent_relative");
        }

        // 创建遮盖层并插入到 img 元素之前
        var $overlay = $(`<div class="wztkj_loading_box02"><div class="wztkj_loading_loader04"></div></div>`).insertBefore($image);
        
        // 监听 load 事件，隐藏遮盖层
        // $('.wztkj_loading_box02').hide();
        $image.on("load", function () {
          setTimeout(() => {
            $('.wztkj_loading_box02').hide();
          }, 1000);
        });

        // 监听 error 事件，打印错误信息
        $image.on("error", function () {
          console.log("Image failed to load:", this.src);
        });
      }
    });
  } else if (index == 5) {
    var images = $("img"); // 使用 jQuery 的选择器获取所有的 img 元素

    images.each(function () {
      var imgWidth = $(this).width();
      var imgHeight = $(this).height();

      if (imgHeight > 55 || imgWidth > 55) {
        var $image = $(this); // 当前 img 元素的 jQuery 对象
        var $parent = $image.parent(); // 当前 img 元素的父元素的 jQuery 对象

        // 确保父元素设置了 position: relative;
        if (!$parent.hasClass("wztkj_loading_parent_relative")) {
          $parent.addClass("wztkj_loading_parent_relative");
        }

        // 创建遮盖层并插入到 img 元素之前
        if(!this.complete){
          var overlay = $(`<div class="wztkj_loading_box02">
              <span class="wztkj_loading_loader05"></span>
            </div>`).insertBefore($image);
          // 监听 load 事件，隐藏遮盖层
          $image.on("load",function () {
            overlay.hide()
          });

          // 监听 error 事件，打印错误信息
          $image.on("error", function () {
            overlay.hide()
            console.log("Image failed to load:", this.src);
          });
        }
      }
    });
  } else if (index == 6) {
    var images = $("img"); // 使用 jQuery 的选择器获取所有的 img 元素

    images.each(function () {
      var $image = $(this); // 当前 img 元素的 jQuery 对象
      var $parent = $image.parent(); // 当前 img 元素的父元素的 jQuery 对象
      var imgWidth = $(this).width();
      var imgHeight = $(this).height();

      if (imgHeight > 55 || imgWidth > 55) {
        // 确保父元素设置了 position: relative;
        if (!$parent.hasClass("wztkj_loading_parent_relative")) {
          $parent.addClass("wztkj_loading_parent_relative");
        }

        // 创建遮盖层并插入到 img 元素之前
        var $overlay = $(`<div class="wztkj_loading_box03"><div class="wztkj_loading_loader06"></div></div>`).insertBefore($image);

        // 监听 load 事件，隐藏遮盖层
        $image.on("load", function () {
          setTimeout(() => {
            $('.wztkj_loading_box03').hide();
          }, 1000);
        });

        // 监听 error 事件，打印错误信息
        $image.on("error", function () {
          console.log("Image failed to load:", this.src);
        });
      }
    });
  }
}
