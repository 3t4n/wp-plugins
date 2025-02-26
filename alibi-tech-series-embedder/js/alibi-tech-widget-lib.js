import { WidgetLib } from '../node_modules/@alibi-tech/widget-lib/build/module/widget-lib.js';

const DEBUG = false;

let size;
const post = alibi_tech_widget_lib_ajax_object.post;
const content = post.post_content.split(" ");

const findHost = (content) => {
  const hostFilter = content.filter(data => /host/.test(data));
  if (hostFilter.length != 0) {
    const host = hostFilter[0].replace("host=", "").replace(/\"/g, "");
    const hostUrl = new URL(host);
    return hostUrl.origin;
  }
  else return "";
}

const findSeriesId = (content) => {
  const seriesFilter = content.filter(data => /series_id/.test(data));
  if (seriesFilter.length != 0) {
    const seriesId = seriesFilter[0].match(/(\d)+/g)[0];
    return seriesId;
  }
  else return "";
}

const host = findHost(content);
DEBUG && console.log('host', host);

const seriesId = findSeriesId(content);
DEBUG && console.log('seriesId', seriesId);

const series = `${host}/series-embed/${seriesId}/`;
DEBUG && console.log('series', series);

(function ($) {
  'use strict';

  const handler = (event) => {
    DEBUG && console.log('event', event);
    const widgetMessage = WidgetLib.widgetMessage(host, event);
    DEBUG && console.log('widgetMessage', widgetMessage);

    if (widgetMessage) {
      switch (widgetMessage.messageType) {
        case 'resize':
          if (widgetMessage.newSize) {
            DEBUG && console.log('size', widgetMessage.newSize);
            size = widgetMessage.newSize;
          } else {
            console.error(`Expected event to have newSize`, { event, widgetMessage });
          }
          break;
      }
      DEBUG && console.log('Data : ', { widgetMessage, event, series });
    }

    if (size === 'filmStripAndPlayer') {
      $(`#${alibi_tech_widget_lib_ajax_object.id}`).addClass('alibiTechWidgetFilmStripAndPlayer').removeClass('alibiTechWidgetFilmStrip');

    }
    else {
      $(`#${alibi_tech_widget_lib_ajax_object.id}`).addClass('alibiTechWidgetFilmStrip').removeClass('alibiTechWidgetFilmStripAndPlayer');
    }
  }
  window.addEventListener('message', handler);
})(jQuery);


