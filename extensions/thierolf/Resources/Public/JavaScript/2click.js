/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./src/javascript/2click.js ***!
  \**********************************/
document.ready = function (callback) {
  if (document.readyState != 'loading') {
    callback();
  } else {
    document.addEventListener('DOMContentLoaded', callback);
  }
};
var iFrame2C = {};
iFrame2C.rescale = function (iframe, format) {
  var formatWidth = parseInt(format.split(':')[0]);
  var formatHeight = parseInt(format.split(':')[1]);
  var formatRatio = formatHeight / formatWidth;
  var iframeBounds = iframe.getBoundingClientRect();
  var currentWidth = iframeBounds.width;
  var newHeight = formatRatio * currentWidth;
  iframe.style.height = Math.round(newHeight) + "px";
};
function iframeResize() {
  var iframes = document.querySelectorAll('iframe[data-scaling="true"]');
  if (!!iframes.length) {
    for (var i = 0; i < iframes.length; i++) {
      var iframe = iframes[i];
      var videoFormat = '16:9';
      var is_data_format_existing = typeof iframe.getAttribute('data-format') !== "undefined";
      if (is_data_format_existing) {
        var is_data_format_valid = iframe.getAttribute('data-format').includes(':');
        if (is_data_format_valid) {
          videoFormat = iframe.getAttribute('data-format');
        }
      }
      iFrame2C.rescale(iframe, videoFormat);
    }
  }
}
document.ready(function () {
  window.addEventListener("resize", function () {
    iframeResize();
  });
  iframeResize();
});
function get_source_url(data_type) {
  switch (data_type) {
    case "youtube":
      return "https://www.youtube-nocookie.com/embed/{SOURCE}?rel=0&controls=1&showinfo=0&autoplay=1&mute=1";
    case "google-maps":
      return "https://www.google.com/maps/embed?pb={SOURCE}";
    default:
      break;
  }
}
document.ready(function () {
  var video_wrapper = document.querySelectorAll('.video_wrapper');
  if (!!video_wrapper.length) {
    var _loop = function _loop() {
        var _wrapper = video_wrapper[i];
        video_triggers = _wrapper.querySelectorAll('.video_trigger');
        if (!!video_triggers.length) {
          for (l = 0; l < video_triggers.length; l++) {
            video_trigger = video_triggers[l];
            accept_buttons = video_trigger.querySelectorAll('input[type="button"]');
            if (!!accept_buttons.length) {
              for (j = 0; j < accept_buttons.length; j++) {
                accept_button = accept_buttons[j];
                accept_button.addEventListener("click", function () {
                  var _trigger = this.parentElement.parentElement.parentElement;
                  var data_type = _trigger.getAttribute("data-type");
                  var source = "";
                  _trigger.style.display = "none";
                  source = get_source_url(data_type);
                  var data_source = _trigger.getAttribute('data-source');
                  source = source.replace("{SOURCE}", data_source);
                  var video_layers = _trigger.parentElement.querySelectorAll(".video_layer");
                  if (!!video_layers.length) {
                    for (var k = 0; k < video_layers.length; k++) {
                      var video_layer = video_layers[k];
                      video_layer.style.display = "block";
                      video_layer.querySelector("iframe").setAttribute("src", source);
                    }
                  }
                  _wrapper.style.backgroundImage = "";
                  // _wrapper.style.height = "auto";

                  var timeout = 100;
                  setTimeout(function () {
                    iframeResize();
                  }, timeout);
                });
              }
            }
          }
        }
      },
      video_triggers,
      l,
      video_trigger,
      accept_buttons,
      j,
      accept_button;
    for (var i = 0; i < video_wrapper.length; i++) {
      _loop();
    }
    ;
  }
});
/******/ })()
;