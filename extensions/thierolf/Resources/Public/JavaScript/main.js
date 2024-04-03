/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./src/javascript/main.js ***!
  \********************************/
(function ($) {
  var MqL = 1240;
  var autoshowTheme = {
    // Main init function
    init: function init() {
      this.initConfig();
      this.events();
    },
    // Define vars for caching
    initConfig: function initConfig() {
      this.config = {
        $window: $(window),
        $document: $(document)
      };
      $.extend(true, $.magnificPopup.defaults, {
        tClose: 'Schließen (Esc)',
        // Alt text on close button
        tLoading: 'Laden...',
        // Text that is displayed during loading. Can contain %curr% and %total% keys
        gallery: {
          tPrev: 'Vorherige (Linke Pfeiltaste)',
          // Alt text on left arrow
          tNext: 'Nächste (Rechte Pfeiltaste)',
          // Alt text on right arrow
          tCounter: '%curr% von %total%' // Markup for "1 of 7" counter
        },
        image: {
          tError: '<a href="%url%">Das Bild</a> konnte nicht geladen werden.' // Error message when image could not be loaded
        },
        ajax: {
          tError: '<a href="%url%">The content</a> could not be loaded.' // Error message when ajax request failed
        }
      });
    },
    // Events
    events: function events() {
      var self = this;
      // Run on document ready
      self.config.$document.ready(function () {
        // PreLoader
        self.preLoader();

        // Wow
        self.wowSet();

        // Search Icon
        self.searchIcon();

        // CTA Menu
        self.cta();

        // Counters
        self.counters();

        // Car Interest
        self.carInterest();

        //softScroll
        self.softScroll();

        //bottomStick
        self.bottomStick();

        //magnificPopup
        self.magnificPopup();
      });
      self.config.$window.resize(function () {
        self.cta();
      });
    },
    // Magnific Popup
    magnificPopup: function magnificPopup() {
      $(function () {
        $('.magnific-popup').magnificPopup({
          type: 'image'
        });
      });
    },
    // Sticky Header
    bottomStick: function bottomStick() {
      $(window).on('scroll load resize', function () {
        var navbarBottom = $(".navbar_bottom");
        var siteFooterPosition = $(".site-footer").offset().top;
        var scrollPosition = $(window).scrollTop() + $(window).height() - navbarBottom.outerHeight();
        if (siteFooterPosition <= scrollPosition) {
          navbarBottom.removeClass('bottom_stick');
        } else {
          navbarBottom.addClass('bottom_stick');
        }
      });
    },
    // Sticky Header
    sticky: function sticky() {
      var transparentLogo = $('#header .main-logo img').attr('data-transparent-logo');
      var stickyLogo = $('#header .main-logo img').attr('data-sticky-logo');
      $(window).on('scroll load resize', function () {
        // CSS adjustment
        $("#header").css({
          position: 'fixed'
        });
        var headerOffset = $("#header").height();
        if ($(window).scrollTop() >= headerOffset) {
          $("#header").addClass('sticky');
          $(".wrapper-with-transparent-header #header").addClass('sticky').removeClass("transparent-header unsticky");
        } else {
          $("#header").removeClass("sticky");
          $(".wrapper-with-transparent-header #header").addClass('transparent-header unsticky').removeClass("sticky");
        }
        if ($('.transparent-header #header').hasClass('sticky')) {
          $("#header.sticky .main-logo img").attr("src", stickyLogo);
        } else {
          $("#header .main-logo img").attr("src", transparentLogo);
        }
        $(window).on('load resize', function () {
          var headerOffset = $("#header-container").height();
          $("#wrapper").css({
            'padding-top': headerOffset
          });
        });
      });
      $("#header").on('mouseenter', function () {
        var headerOffset = $("#header").height();
        if ($(window).scrollTop() <= headerOffset) {
          // CSS adjustment
          $("#header").css({
            position: 'fixed'
          });
          $(".transparent-header #header").addClass('sticky');
          $("#header.sticky .main-logo img").attr("src", stickyLogo);
        }
      });
      $("#header").on('mouseleave', function () {
        var headerOffset = $("#header").height();
        if ($(window).scrollTop() <= headerOffset) {
          $(".transparent-header #header").removeClass("sticky");
          $("#header .main-logo img").attr("src", transparentLogo);
        }
      });
    },
    // PreLoader
    preLoader: function preLoader() {
      if ($().animsition) {
        $('.animsition').animsition({
          inClass: 'fade-in',
          outClass: 'fade-out',
          inDuration: 1500,
          outDuration: 800,
          loading: true,
          loadingParentElement: 'body',
          loadingClass: 'animsition-loading',
          timeout: false,
          timeoutCountdown: 5000,
          onLoadEvent: true,
          browser: ['-webkit-animation-duration', '-moz-animation-duration', 'animation-duration'],
          overlay: false,
          overlayClass: 'animsition-overlay-slide',
          overlayParentElement: 'body',
          transition: function transition(url) {
            window.location.href = url;
          }
        });
      }
    },
    // Wow
    wowSet: function wowSet() {
      new WOW().init();
    },
    closeNav: function closeNav() {},
    toggleSearch: function toggleSearch(type) {
      if (type == "close") {
        //close serach 
        $('.search').removeClass('is-visible');
        $('.search-trigger').removeClass('search-is-visible');
        $('.overlay').removeClass('search-is-visible');
      } else {
        //toggle search visibility
        $('.search').toggleClass('is-visible');
        $('.search-trigger').toggleClass('search-is-visible');
        $('.overlay').toggleClass('search-is-visible');
        if ($(window).width() > MqL && $('.search').hasClass('is-visible')) $('.search').find('input[type="search"]').focus();
        $('.search').hasClass('is-visible') ? $('.overlay').addClass('is-visible') : $('.overlay').removeClass('is-visible');
      }
    },
    checkWindowWidth: function checkWindowWidth() {
      //check window width (scrollbar included)
      var e = window,
        a = 'inner';
      if (!('innerWidth' in window)) {
        a = 'client';
        e = document.documentElement || document.body;
      }
      if (e[a + 'Width'] >= MqL) {
        return true;
      } else {
        return false;
      }
    },
    moveNavigation: function moveNavigation() {
      var navigation = $('.nav:not(.nav-tabs)');
      var desktop = autoshowTheme.checkWindowWidth();
      if (desktop) {
        navigation.detach();
        navigation.insertAfter('.header-buttons');
      } else {
        navigation.detach();
        navigation.insertAfter('.site-wrapper');
      }
    },
    // Menu Navigation
    menuNav: function menuNav() {},
    // Search Icon
    searchIcon: function searchIcon() {
      //open search form
      $('.search-trigger').on('click', function (event) {
        event.preventDefault();
        autoshowTheme.toggleSearch();
      });
    },
    // CTA Menu
    cta: function cta() {
      $('.back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
          scrollTop: 0
        }, 700);
      });
    },
    // Counters
    counters: function counters() {
      //Counter activation
      if ($().countTo) {
        $('.counters').appear(function () {
          $(this).find('.accent').each(function () {
            var to = $(this).data('to'),
              speed = $(this).data('speed');
            $(this).countTo({
              to: to,
              speed: speed
            });
          });
        });
      }
    },
    //Sliding Button Icon
    slidingButton: function slidingButton() {
      $(window).on('load', function () {
        $(".button.button-sliding-icon").each(function () {
          var buttonWidth = $(this).outerWidth() + 30;
          $(this).css('width', buttonWidth);
        });
      });
    },
    //Gallery Mosaic
    gallery: function gallery() {
      var $container;
      $(window).on('load', function () {
        if ($(".gallery").length) {
          $container = $('.mosaic').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: '.grid-sizer'
          });
        }
      });
      $('.nav li').click(function () {
        if ($(this).find("a").attr("data-action") == 'gallery') {
          window.setTimeout(function () {
            $container.masonry('layout');
          }, 200);
        }
      });
      $('.gallery').magnificPopup({
        type: 'image',
        delegate: '.image-link',
        gallery: {
          enabled: true
        }
      });
    },
    // Car Interest
    carInterest: function carInterest() {
      if ($(".car-interest").length > 0) {
        //open interest point description
        $('.interest-point').children('a').on('click', function () {
          var selectedPoint = $(this).parent('li');
          if (selectedPoint.hasClass('is-open')) {
            selectedPoint.removeClass('is-open');
          } else {
            selectedPoint.addClass('is-open').siblings('.interest-point.is-open').removeClass('is-open');
          }
        });
        //close interest point description
        $('.interest-close-info').on('click', function (event) {
          event.preventDefault();
          $(this).parents('.interest-point').eq(0).removeClass('is-open');
        });
      }
    },
    softScroll: function softScroll() {
      $('html, body').on('click', 'a[href*="#"]', function (event) {
        var target = $(this).attr('href');
        if ($(target).length > 0) {
          event.preventDefault();
          event.stopImmediatePropagation();
          var headerHeight = $('#header').outerHeight();
          $('html, body').animate({
            scrollTop: $(target).offset().top - headerHeight
          }, 1000);
        }
      });
    }
  };

  // Start
  autoshowTheme.init();
})(jQuery);
/******/ })()
;