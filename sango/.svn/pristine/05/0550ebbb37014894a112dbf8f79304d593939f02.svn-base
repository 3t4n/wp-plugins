// JavaScript Document
// toc
$(function(){
  var countId = 1
  $(".entry-content h2,.entry-content h3").each(function(){
    var ttl = $(this).text();
    var lv = this.nodeName.toLowerCase();
    this.id = 'ttl-' + countId;
    countId ++;
    $("#index").append('<dd class="lv_'+lv+'"><a href="#'+this.id+'" class="js-modal-close">'+ttl+'</a></dd>');
  });
});

$(function(){
$('a[href^="#"]').click(function() {
    let speed = 400; // ミリ秒で記述
    let href= $(this).attr("href");
     let target = $(href == "#" || href == "" ? 'html' : href);
     let position = target.offset().top;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
   });
 });

// modal
$(function(){
    $('.js-modal-open').on('click',function(){
        $('.js-modal').fadeIn();
        return false;
    });
    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});

//スクロールしたら目次
jQuery(function() {
    var pagetop = $('.modaltoc');   
    pagetop.hide();
    $(window).scroll(function () {
        if ($(this).scrollTop() > 700) {  //700pxスクロールしたら表示
            pagetop.fadeIn();
        } else {
            pagetop.fadeOut();
        }
    });
    pagetop.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 100); //0.1秒かけてトップへ移動
        return false;
    });
});