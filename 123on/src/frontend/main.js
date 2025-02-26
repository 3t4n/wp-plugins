import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

Vue.config.productionTip = false

/* eslint-disable no-new */
// new Vue({
//   el: '#vue-frontend-app',
//   router,
//   render: h => h(App, {
//     props:{
//       id: parseInt(document.querySelector("#vue-frontend-app").dataset.video)
//     }
//   })
// })
jQuery(document).ready(function($) {
    const videos = [...document.querySelectorAll('.video')]
    let allHotspots = [];

    videos.forEach((video) => {
      axios.get('/wp-json/v2/video_123on/video_meta/' + video.dataset.video)
        .then(response => {
          allHotspots[video.dataset.video] = JSON.parse(JSON.parse(response.data));
          video.allowFullscreen = false;
          let overlays = [];
          let hotspotHyperlinks = [];
          let hotspotImages = [];
          let hotspots = allHotspots[video.dataset.video];
          let node = video.parentNode.firstChild;
          while ( node ) {
              if ( node !== video && node.nodeType === Node.ELEMENT_NODE )
              if($(node).hasClass('overlay'))
              { 
                  overlays.push( node );
              }
              node = node.nextElementSibling || node.nextSibling;
          }

          overlays.forEach(function(item) {
              hotspotHyperlinks.push($(item).children("a"));
          });

          hotspotHyperlinks.forEach(function(item) {
              hotspotImages.push($(item).children("img"));
          });
          
    
          for (let i=0; i< hotspots.length; i++) {
            if(hotspots[i].btn_option == '1')
            {
              hotspotHyperlinks[i].addClass('white-hotspot');
              hotspotHyperlinks[i].removeClass('overlay__hyperlink');
              hotspotImages[i].remove();
            }
            if(hotspots[i].btn_option == '2')
            {
              hotspotImages[i].attr('src', video.dataset.hotspot2);
              $(overlays[i]).addClass('overlay-transparent');
              hotspotHyperlinks[i].addClass('hyperlink-transparent');
            }
            if(hotspots[i].btn_option == '3')
            {
              hotspotImages[i].attr('src', video.dataset.hotspot3);
            }
            hotspotHyperlinks[i].attr('href', hotspots[i].value);
            $(overlays[i]).css('top',  hotspots[i].position_y + '%');
            $(overlays[i]).css('left', hotspots[i].position_x + '%');
            if(hotspots[i].option == 'product')
            {
                let popup = $(overlays[i]).nextAll(".product__popup:first").css('display', 'flex');
                $(popup).find(".product__button").attr("href", hotspots[i].value);
            }
            if(hotspots[i].option == 'custom-product')
            {
                let popup = $(overlays[i]).nextAll(".product__popup:first").css('display', 'flex');
                $(popup).find(".product__name").text(hotspots[i].custom_product.name);
                $(popup).find(".product__price").text(hotspots[i].custom_product.price);
                if (!/^https?:\/\//i.test(hotspots[i].custom_product.link)) {
                    hotspots[i].custom_product.link = 'http://' + hotspots[i].custom_product.link;
                }
                $(popup).find(".product__button").attr("href", hotspots[i].custom_product.link);
                $(popup).find(".product__thumbnail").attr("src", hotspots[i].custom_product.image_url);
                hotspotHyperlinks[i].attr('href', hotspots[i].custom_product.link);
            }
          }
        })    
    });

    videos.filter(video => video.addEventListener('timeupdate', e => {
      let overlays = [];
      let hotspots = allHotspots[video.dataset.video];
      let node = video.parentNode.firstChild;
      while ( node ) {
          if ( node !== video && node.nodeType === Node.ELEMENT_NODE )
          if($(node).hasClass('overlay'))
          { 
              overlays.push( node );
          }
          node = node.nextElementSibling || node.nextSibling;
      }
      let vidCurrentTime = e.target.currentTime;
      try { 
        for (let i=0; i< hotspots.length; i++) {
          if (format(vidCurrentTime) >= hotspots[i].startTime && format(vidCurrentTime) < hotspots[i].stopTime) {
            $(overlays[i]).css('display', 'flex');
            if(hotspots[i].option == 'product')
            {
                $(overlays[i]).nextAll(".product__popup:first").css('display', 'flex');
            }
            if(hotspots[i].option == 'custom-product')
            {
                $(overlays[i]).nextAll(".product__popup:first").css('display', 'flex');

            }
          }
          
          else {
            $(overlays[i]).hide();
            $(overlays[i]).nextAll(".product__popup:first").hide();
          }
        }
      }
      catch (e) {}
    }));

    function format(s) {
      let m = Math.floor(s / 60);
      m = (m >= 10) ? m : '0' + m;
      s = Math.floor(s % 60);
      s = (s >= 10) ? s : '0' + s;
      return m + ':' + s;
  }

    $(".product__info-container").on("click", function (e) {
        if($(this).hasClass("product__info-container--minimized"))
        {
            $(this).parent().removeClass("product__popup--minimized");
            $(this).removeClass("product__info-container--minimized");
            $(this).children(".product-data__container").removeClass("product-data__container--minimized");
            $(this).children(".product-data__container").find(".product__thumbnail").removeClass("product__thumbnail--minimized");
            $(this).children(".minimize__popup-btn").children(".minimize__popup-arrow-left").removeClass("minimize__popup-arrow-left--minimized");
            $(this).children(".minimize__popup-btn").children(".minimize__popup-arrow-right").removeClass("minimize__popup-arrow-right--minimized");
        }
        else
        {
            $(this).parent().addClass("product__popup--minimized");
            $(this).addClass("product__info-container--minimized");
            $(this).children(".product-data__container").addClass("product-data__container--minimized");
            $(this).children("div").find(".product__thumbnail").addClass("product__thumbnail--minimized");
            $(this).children(".minimize__popup-btn").children(".minimize__popup-arrow-left").addClass("minimize__popup-arrow-left--minimized");
            $(this).children(".minimize__popup-btn").children(".minimize__popup-arrow-right").addClass("minimize__popup-arrow-right--minimized");
        }
    });

    
})
