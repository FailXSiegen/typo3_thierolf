/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************************************!*\
  !*** ../../Public/Vendor/jquery-stickit/build/jquery.stickit.min.js ***!
  \**********************************************************************/
/**
 * [jQuery-stickit]{@link https://github.com/emn178/jquery-stickit}
 *
 * @version 0.2.6
 * @author Chen, Yi-Cyuan [emn178@gmail.com]
 * @copyright Chen, Yi-Cyuan 2014-2016
 * @license MIT
 */
(function(d,g,h){function u(a){var b=0,e;return function(){var c=this,d=arguments,f=function(){b=new Date;a.apply(c,d)};e&&(clearTimeout(e),e=null);var g=new Date-b;10<g?f():e=setTimeout(f,10-g)}}function c(a,b){this.element=d(a);d.isArray(b)||(b=[b||{}]);b.length||b.push({});this.optionList=b;var e=this.element.css("transform")||"";this.defaultZIndex=this.element.css("z-index")||100;"auto"==this.defaultZIndex?this.defaultZIndex=100:"0"==this.defaultZIndex&&"none"!=e&&(this.defaultZIndex=100);this.updateOptions();
this.lastY=this.offsetY=0;this.stick=f.None;this.spacer=d("<div />");this.spacer[0].id=a.id;this.spacer[0].className=a.className;this.spacer[0].style.cssText=a.style.cssText;this.spacer.addClass("jquery-stickit-spacer");this.spacer[0].style.cssText+=";visibility: hidden !important;display: none !important";this.spacer.insertAfter(this.element);"static"==this.element.parent().css("position")&&this.element.parent().css("position","relative");"auto"==this.element.css("will-change")&&this.element.css("will-change",
"transform");"none"==e?this.element.css("transform","translateZ(0)"):-1==e.indexOf("matrix3d")&&this.element.css("transform",this.element.css("transform")+" translateZ(0)");this.bound();this.precalculate();this.store()}function n(){p=g.innerHeight||h.documentElement.clientHeight;k=g.innerWidth||h.documentElement.clientWidth;d(":jquery-stickit").each(function(){d(this).data("jquery-stickit").resize()})}var q=-1!=navigator.userAgent.indexOf("MSIE 7.0"),r=q?-2:0,v=void 0!==g.MutationObserver,l=g.StickScope=
{Parent:0,Document:1},f={None:0,Fixed:1,Absolute:2},t=!1;d.expr[":"]["jquery-stickit"]=function(a){return!!d(a).data("jquery-stickit")};c.prototype.trigger=function(a){var b="on"+a.charAt(0).toUpperCase()+a.slice(1);this.options[b]&&this.options[b].call(this.element);this.element.trigger("stickit:"+a)};c.prototype.isActive=function(a){return(void 0===a.screenMinWidth||k>=a.screenMinWidth)&&(void 0===a.screenMaxWidth||k<=a.screenMaxWidth)};c.prototype.updateCss=function(a){this.element.hasClass(this.options.className)&&
a.className!=this.options.className&&this.element.removeClass(this.options.className).addClass(a.className);var b={};this.stick==f.Absolute?this.options.extraHeight!=a.extraHeight&&(b.bottom=-this.options.extraHeight+"px"):this.options.top!=a.top&&(b.top=a.top+this.offsetY+"px");this.options.zIndex!=a.zIndex&&(b.zIndex=this.getZIndex(a));this.element.css(b)};c.prototype.updateOptions=function(){var a=this.getActiveOptionsKey();if(this.activeKey!=a){this.activeKey=a;var b=this.getActiveOptions();this.options&&
(a?this.stick!=f.None&&(b.scope==this.options.scope?this.updateCss(b):(this.reset(),setTimeout(this.locate.bind(this)))):this.reset());this.options=b;this.zIndex=this.getZIndex(b)}};c.prototype.getZIndex=function(a){return void 0===a.zIndex?this.defaultZIndex:a.zIndex};c.prototype.getActiveOptionsKey=function(){for(var a=[],b=0;b<this.optionList.length;++b)this.isActive(this.optionList[b])&&a.push(b);return a.join("_")};c.prototype.getActiveOptions=function(){for(var a={},b=0;b<this.optionList.length;++b){var e=
this.optionList[b];this.isActive(e)&&d.extend(a,e)}a.scope=a.scope||l.Parent;a.className=a.className||"stick";a.top=a.top||0;a.extraHeight=a.extraHeight||0;void 0===a.overflowScrolling&&(a.overflowScrolling=!0);return a};c.prototype.store=function(){var a=this.element[0];this.origStyle={width:a.style.width,position:a.style.position,left:a.style.left,top:a.style.top,bottom:a.style.bottom,zIndex:a.style.zIndex}};c.prototype.restore=function(){this.element.css(this.origStyle)};c.prototype.bound=function(){var a=
this.element;if(q||"border-box"!=a.css("box-sizing"))this.extraWidth=0;else{var b=parseInt(a.css("border-left-width"))||0,e=parseInt(a.css("border-right-width"))||0,c=parseInt(a.css("padding-left"))||0,d=parseInt(a.css("padding-right"))||0;this.extraWidth=b+e+c+d}this.margin={top:parseInt(a.css("margin-top"))||0,bottom:parseInt(a.css("margin-bottom"))||0,left:parseInt(a.css("margin-left"))||0,right:parseInt(a.css("margin-right"))||0};this.parent={border:{bottom:parseInt(a.parent().css("border-bottom-width"))||
0}}};c.prototype.precalculate=function(){this.baseTop=this.margin.top+this.options.top;this.basePadding=this.baseTop+this.margin.bottom;this.baseParentOffset=this.options.extraHeight-this.parent.border.bottom;this.offsetHeight=Math.max(this.element.height()-p,0)};c.prototype.reset=function(){this.stick==f.Absolute?(this.trigger("unend"),this.trigger("unstick")):this.stick==f.Fixed&&this.trigger("unstick");this.stick=f.None;this.spacer.css("width","");this.spacer[0].style.cssText+=";display: none !important";
this.restore();this.element.removeClass(this.options.className)};c.prototype.setAbsolute=function(a){this.stick==f.None&&(this.element.addClass(this.options.className),this.trigger("stick"));this.trigger("end");this.stick=f.Absolute;this.element.css({width:this.element.width()+this.extraWidth+"px",position:"absolute",top:this.origStyle.top,left:a+"px",bottom:-this.options.extraHeight+"px","z-index":this.zIndex})};c.prototype.setFixed=function(a,b,e){this.stick==f.None?(this.element.addClass(this.options.className),
this.trigger("stick")):this.trigger("unend");this.stick=f.Fixed;this.lastY=b;this.offsetY=e;this.element.css({width:this.element.width()+this.extraWidth+"px",position:"fixed",top:this.options.top+e+"px",left:a+"px",bottom:this.origStyle.bottom,"z-index":this.zIndex})};c.prototype.updateScroll=function(a){0!=this.offsetHeight&&this.options.overflowScrolling&&(this.offsetY=Math.max(this.offsetY+a-this.lastY,-(this.options.top+this.offsetHeight)),this.offsetY=Math.min(this.offsetY,0),this.lastY=a,this.element.css("top",
this.options.top+this.offsetY+"px"))};c.prototype.locate=function(){if(this.activeKey){var a,b,e,c=this.element,d=this.spacer;switch(this.stick){case f.Fixed:a=d[0].getBoundingClientRect();b=a.top-this.baseTop;0<=b?this.reset():this.options.scope==l.Parent?(a=c.parent()[0].getBoundingClientRect(),a.bottom+this.baseParentOffset+this.offsetHeight<=c.outerHeight(!1)+this.basePadding?this.setAbsolute(this.spacer.position().left):this.updateScroll(a.bottom)):this.updateScroll(a.bottom);break;case f.Absolute:a=
d[0].getBoundingClientRect();b=a.top-this.baseTop;e=a.left-this.margin.left;0<=b?this.reset():(a=c.parent()[0].getBoundingClientRect(),a.bottom+this.baseParentOffset+this.offsetHeight>c.outerHeight(!1)+this.basePadding&&this.setFixed(e+r,a.bottom,-this.offsetHeight));break;default:a=c[0].getBoundingClientRect(),b=a.top-this.baseTop,0<=b||(b=c.parent()[0].getBoundingClientRect(),d.height(c.height()),d.show(),e=a.left-this.margin.left,this.options.scope==l.Document?this.setFixed(e,a.bottom,0):b.bottom+
this.baseParentOffset<=c.outerHeight(!1)+this.basePadding?this.setAbsolute(this.element.position().left):this.setFixed(e+r,a.bottom,0),d.width()||d.width(c.width()))}}};c.prototype.resize=function(){this.updateOptions();this.bound();this.precalculate();if(this.stick!=f.None){var a=this.element,b=this.spacer;a.width(b.width());b.height(a.height());this.stick==f.Fixed&&(b=this.spacer[0].getBoundingClientRect().left-this.margin.left,a.css("left",b+"px"))}this.locate()};c.prototype.destroy=function(){this.reset();
this.spacer.remove();this.element.removeData("jquery-stickit")};var p,k,m=function(){d(":jquery-stickit").each(function(){d(this).data("jquery-stickit").locate()})},w=["destroy"];d.fn.stickit=function(a,b){"string"==typeof a?-1!=d.inArray(a,w)&&this.each(function(){var c=d(this).data("jquery-stickit");c&&c[a].apply(c,b)}):(t||(t=!0,n(),d(h).ready(function(){d(g).bind("resize",n).bind("scroll",m);d(h.body).on("animationend webkitAnimationEnd oAnimationEnd transitionend webkitTransitionEnd oTransitionEnd",
m)}),v&&(new MutationObserver(u(m))).observe(h,{attributes:!0,childList:!0,characterData:!0,subtree:!0})),b=d.isArray(a)?a:Array.prototype.slice.call(arguments,0),this.each(function(){var a=new c(this,b);d(this).data("jquery-stickit",a);a.locate()}));return this}})(jQuery,window,document);

/******/ })()
;