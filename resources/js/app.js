(function ($) {

  'use strict';
  $(".nav a").each(function () {
    var pageUrl = window.location.href.split(/[?#]/)[0];
    if (this.href == pageUrl) {
      $(this).addClass("active");
      $(this).parent().addClass("active");
      $(this).parent().parent().addClass("active");
      $(this).parent().parent().parent().addClass("active");
      $(this).parent().parent().parent().parent().addClass("active");
      $(this).parent().parent().parent().parent().parent().addClass("active");
      $(this).parent().parent().parent().parent().parent().parent().addClass("active");
    }
  });
})(jQuery)
