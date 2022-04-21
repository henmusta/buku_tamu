$(function() {
  'use strict'

  // ______________ PAGE LOADING
  $("#global-loader").fadeOut("slow");

  // ______________ Card
  const DIV_CARD = 'div.card';

  // ______________ Function for remove card
  $(document).on('click', '[data-bs-toggle="card-remove"]', function(e) {
    let $card = $(this).closest(DIV_CARD);
    $card.remove();
    e.preventDefault();
    return false;
  });

  // ______________ Functions for collapsed card
  $(document).on('click', '[data-bs-toggle="card-collapse"]', function(e) {
    let $card = $(this).closest(DIV_CARD);
    $card.toggleClass('card-collapsed');
    e.preventDefault();
    return false;
  });

  // ______________ Card full screen
  $(document).on('click', '[data-bs-toggle="card-fullscreen"]', function(e) {
    let $card = $(this).closest(DIV_CARD);
    $card.toggleClass('card-fullscreen').removeClass('card-collapsed');
    e.preventDefault();
    return false;
  });

  // ______________Main-navbar
  if (window.matchMedia('(min-width: 992px)').matches) {
    $('.main-navbar .active').removeClass('show');
    $('.main-header-menu .active').removeClass('show');
  }
  $('.main-header .dropdown > a').on('click', function(e) {
    e.preventDefault();
    $(this).parent().toggleClass('show');
    $(this).parent().siblings().removeClass('show');
  });
  $('.mobile-main-header .dropdown > a').on('click', function(e) {
    e.preventDefault();
    $(this).parent().toggleClass('show');
    $(this).parent().siblings().removeClass('show');
  });
  $('.main-navbar .with-sub').on('click', function(e) {
    e.preventDefault();
    $(this).parent().toggleClass('show');
    $(this).parent().siblings().removeClass('show');
  });
  $('.dropdown-menu .main-header-arrow').on('click', function(e) {
    e.preventDefault();
    $(this).closest('.dropdown').removeClass('show');
  });
  $('#mainNavShow').on('click', function(e) {
    e.preventDefault();
    $('body').toggleClass('main-navbar-show');
  });
  $('#mainContentLeftShow').on('click touch', function(e) {
    e.preventDefault();
    $('body').addClass('main-content-left-show');
  });
  $('#mainContentLeftHide').on('click touch', function(e) {
    e.preventDefault();
    $('body').removeClass('main-content-left-show');
  });
  $('#mainContentBodyHide').on('click touch', function(e) {
    e.preventDefault();
    $('body').removeClass('main-content-body-show');
  })
  $('body').append('<div class="main-navbar-backdrop"></div>');
  $('.main-navbar-backdrop').on('click touchstart', function() {
    $('body').removeClass('main-navbar-show');
  });


  // ______________Dropdown menu
  $(document).on('click touchstart', function(e) {
    e.stopPropagation();
    var dropTarg = $(e.target).closest('.main-header .dropdown').length;
    if (!dropTarg) {
      $('.main-header .dropdown').removeClass('show');
    }
    if (window.matchMedia('(min-width: 992px)').matches) {
      var navTarg = $(e.target).closest('.main-navbar .nav-item').length;
      if (!navTarg) {
        $('.main-navbar .show').removeClass('show');
      }
      var menuTarg = $(e.target).closest('.main-header-menu .nav-item').length;
      if (!menuTarg) {
        $('.main-header-menu .show').removeClass('show');
      }
      if ($(e.target).hasClass('main-menu-sub-mega')) {
        $('.main-header-menu .show').removeClass('show');
      }
    } else {
      if (!$(e.target).closest('#mainMenuShow').length) {
        var hm = $(e.target).closest('.main-header-menu').length;
        if (!hm) {
          $('body').removeClass('main-header-menu-show');
        }
      }
    }
  });

  // ______________MainMenuShow
  $('#mainMenuShow').on('click', function(e) {
    e.preventDefault();
    $('body').toggleClass('main-header-menu-show');
  })
  $('.main-header-menu .with-sub').on('click', function(e) {
    e.preventDefault();
    $(this).parent().toggleClass('show');
    $(this).parent().siblings().removeClass('show');
  })
  $('.main-header-menu-header .close').on('click', function(e) {
    e.preventDefault();
    $('body').removeClass('main-header-menu-show');
  })



  // ______________Popover
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  })

  // ______________Tooltip
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })


  // ______________Toast
  $(".toast").toast();

  // ______________Back-top-button
  $(window).on("scroll", function(e) {
    if ($(this).scrollTop() > 0) {
      $('#back-to-top').fadeIn('slow');
    } else {
      $('#back-to-top').fadeOut('slow');
    }
  });
  $(document).on("click", "#back-to-top", function(e) {
    $("html, body").animate({
      scrollTop: 0
    }, 0);
    return false;
  });

  // ______________Full screen
  $(document).on("click", ".fullscreen-button", function toggleFullScreen() {
    $('html').addClass('fullscreen');
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
      if (document.documentElement.requestFullScreen) {
        document.documentElement.requestFullScreen();
      } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
      } else if (document.documentElement.webkitRequestFullScreen) {
        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
      }
    } else {
      $('html').removeClass('fullscreen');
      if (document.cancelFullScreen) {
        document.cancelFullScreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitCancelFullScreen) {
        document.webkitCancelFullScreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
    }
  })

  // ______________Cover Image
  $(".cover-image").each(function() {
    var attr = $(this).attr('data-image-src');
    if (typeof attr !== typeof undefined && attr !== false) {
      $(this).css('background', 'url(' + attr + ') center center');
    }
  });


  // ______________Horizontal-menu Active Class
  function addActiveClass(element) {
    if (current === "") {
      if (element.attr('href').indexOf("#") !== -1) {
        element.parents('.main-navbar .nav-item').last().removeClass('active');
        if (element.parents('.main-navbar .nav-sub').length) {
          element.parents('.main-navbar .nav-sub-item').last().removeClass('active');
        }
      }
    } else {
      if (element.attr('href').indexOf(current) !== -1) {
        element.parents('.main-navbar .nav-item').last().addClass('active');
        if (element.parents('.main-navbar .nav-sub').length) {
          element.parents('.main-navbar .nav-sub-item').last().addClass('active');
        }
      }
    }
  }
  var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
  $('.main-navbar .nav li a').each(function() {
    var $this = $(this);
    addActiveClass($this);
  })


  // ______________ SWITCHER-toggle ______________//

  $(document).on("click", '#myonoffswitch51', function () {
    if (this.checked) {
      $("#global-loader").fadeOut("slow");
      $('body').addClass('icon-style');
      $('body').removeClass('light-leftmenu');
      $('body').removeClass('dark-leftmenu');
      $('body').removeClass('color-leftmenu');
      $('body').removeClass('light-header');
      $('body').removeClass('color-header');
      $('body').removeClass('header-dark');
      localStorage.setItem("icon-style", "True");
    }
    else {
      $('body').removeClass('icon-style');
      localStorage.setItem("icon-style", "false");
    }
  });

  $(document).on("click", '#myonoffswitch52', function () {
    if (this.checked) {
      $("#global-loader").fadeOut("slow");
      $('body').addClass('theme-style');;
      $('body').removeClass('light-leftmenu');
      $('body').removeClass('dark-leftmenu');
      $('body').removeClass('color-leftmenu');
      $('body').removeClass('light-header');
      $('body').removeClass('color-header');
      $('body').removeClass('header-dark');
    }
    else {
      $('body').removeClass('theme-style');
      localStorage.setItem("theme-style", "false");
    }
  });



  $('#background1').on('click', function() {
    $('body').addClass('color-leftmenu');
    $('body').removeClass('light-leftmenu');
    $('body').removeClass('dark-leftmenu');
    $('body').removeClass('light-header');
    $('body').removeClass('color-header');
    $('body').removeClass('header-dark');
    return false;
  });

  $('#background2').on('click', function() {
    $('body').addClass('light-leftmenu');
    $('body').removeClass('color-leftmenu');
    $('body').removeClass('dark-leftmenu');
    $('body').removeClass('light-header');
    $('body').removeClass('color-header');
    $('body').removeClass('header-dark');
    return false;
  });


  $('#background3').on('click', function() {
    $('body').addClass('header-dark');
    $('body').removeClass('light-horizontal');
    $('body').removeClass('color-leftmenu');
    $('body').removeClass('light-leftmenu');
    $('body').removeClass('color-horizontal');
    $('body').removeClass('color-header');
    return false;
  });

  $('#background4').on('click', function() {
    $('body').addClass('color-header');
    $('body').removeClass('light-horizontal');
    $('body').removeClass('color-leftmenu');
    $('body').removeClass('light-leftmenu');
    $('body').removeClass('color-horizontal');
    $('body').removeClass('header-dark');
    return false;
  });

  $('#background5').on('click', function() {
    $('body').addClass('dark-theme');
    $('body').removeClass('light-theme');
    $('body').removeClass('light-leftmenu');
    $('body').removeClass('light-horizontal');
    $('body').removeClass('color-header');
    $('body').removeClass('header-dark');
    $('body').removeClass('color-leftmenu');
    return false;
  });

  $('#background6').on('click', function() {
    $('body').addClass('light-theme');
    $('body').removeClass('light-leftmenu');
    $('body').removeClass('light-horizontal');
    $('body').removeClass('color-header');
    $('body').removeClass('header-dark');
    $('body').removeClass('color-leftmenu');
    $('body').removeClass('dark-theme');
    return false;
  });

  $('#background7').on('click', function() {
    $('body').addClass('color-horizontal');
    $('body').removeClass('light-horizontal');
    $('body').removeClass('header-dark');
    $('body').removeClass('color-header');
    return false;
  });

  $('#background8').on('click', function() {
    $('body').addClass('light-horizontal');
    $('body').removeClass('color-horizontal');
    $('body').removeClass('header-dark');
    $('body').removeClass('color-header');
    return false;
  });


  $("a[data-theme]").click(function() {
    $("head link#theme").attr("href", $(this).data("theme"));
    $(this).toggleClass('active').siblings().removeClass('active');
  });

  /*-- LTR Horizontal Versions --*/
  $('#myonoffswitch20').click(function() {
    if (this.checked) {
      $("#global-loader").fadeOut("slow");
      $('body').addClass('default-horizontal');
      $('body').removeClass('centerlogo-horizontal');
      localStorage.setItem("default-horizontal", "True");
    } else {
      $('body').removeClass('default-horizontal');
      localStorage.setItem("default-horizontal", "false");
    }
  });
  $('#myonoffswitch21').click(function() {
    if (this.checked) {
      $('body').addClass('centerlogo-horizontal');
      $('body').removeClass('default-horizontal');
      localStorage.setItem("centerlogo-horizontal", "True");
    } else {
      $('body').removeClass('centerlogo-horizontal');
      localStorage.setItem("centerlogo-horizontal", "false");
    }
  });
  /*-- width styles ---*/
  $('#myonoffswitch18').click(function() {
    if (this.checked) {
      $('body').addClass('default');
      $('body').removeClass('boxed');
      localStorage.setItem("default", "True");
    } else {
      $('body').removeClass('default');
      localStorage.setItem("default", "false");
    }
  });
  $('#myonoffswitch19').click(function() {
    if (this.checked) {
      $('body').addClass('boxed');
      $('body').removeClass('default');
      localStorage.setItem("boxed", "True");
    } else {
      $('body').removeClass('boxed');
      localStorage.setItem("boxed", "false");
    }
  });

  $('#myonoffswitch55').click(function() {
    if (this.checked) {
      $("#global-loader").fadeOut("slow");
      $('body').addClass('rtl');
      $('body').removeClass('ltr');
      localStorage.setItem("rtl", "True");
      $("head link#style").attr("href", $(this));
      (document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));
      var carousel = $('.owl-carousel');
      $.each(carousel ,function( index, element)  {
        // element == this
        var carouselData = $(element).data('owl.carousel');
        carouselData.settings.rtl = true; //don't know if both are necessary
        carouselData.options.rtl = true;
        $(element).trigger('refresh.owl.carousel');
      });
    } else {
      $('body').removeClass('rtl');
      $('body').addClass('ltr');
      localStorage.setItem("rtl", "false");
      $("head link#style").attr("href", $(this));
      (document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.min.css"));
    }
  });

  $('#myonoffswitch54').click(function() {
    if (this.checked) {
      $("#global-loader").fadeOut("slow");
      $('body').addClass('ltr');
      $('body').removeClass('rtl');
      localStorage.setItem("ltr", "True");
      $("head link#style").attr("href", $(this));
      (document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.min.css"));
      var carousel = $('.owl-carousel');
      $.each(carousel ,function( index, element)  {
        // element == this
        var carouselData = $(element).data('owl.carousel');
        carouselData.settings.rtl = false; //don't know if both are necessary
        carouselData.options.rtl = false;
        $(element).trigger('refresh.owl.carousel');
      });
    } else {
      $('body').removeClass('ltr');
      $('body').addClass('rtl');
      localStorage.setItem("ltr", "false");
      $("head link#style").attr("href", $(this));
      (document.getElementById("style")?.setAttribute("href", "../../assets/plugins/bootstrap/css/bootstrap.rtl.min.css"));
    }
  });


  /*********************Default-menu open********************/
  $('#myonoffswitch22').click(function() {
    if (this.checked) {
      $("#global-loader").fadeOut("slow");
      $('body').addClass('default-sidemenu');
      $('body').removeClass('main-sidebar-hide');
      $('body').removeClass('closed');
      $('body').removeClass('hover-submenu1');
      $('body').removeClass('default-sidebar');
      $('body').removeClass('hover-submenu');
      $('body').removeClass('icon-overlay');
      $('body').removeClass('icon-text');
    } else {
      $('body').removeClass('default-sidemenu');
    }
  });

  /*********************Default-menu closed********************/

  /*********************closed-menu open********************/

  $('#myonoffswitch23').click(function() {
    if (this.checked) {
      $("#global-loader").fadeOut("slow");
      $('body').addClass('closed');
      $('body').addClass('main-sidebar-hide');
      $('body').removeClass('default-sidemenu');
      $('body').removeClass('hover-submenu1');
      $('body').removeClass('default-sidebar');
      $('body').removeClass('hover-submenu');
      $('body').removeClass('icon-overlay');
      $('body').removeClass('icon-text');
    } else {
      $('body').removeClass('closed');
      $('body').removeClass('main-sidebar-hide');
      $('body').addClass('default-sidemenu');
    }
  });

  /*********************closed-menu closed********************/

  /*********************hover-menu open********************/

  $('#myonoffswitch24').click(function() {
    if (this.checked) {
      $("#global-loader").fadeOut("slow");
      $('body').addClass('hover-submenu');
      $('body').addClass('main-sidebar-hide');
      $('body').removeClass('default-sidemenu');
      $('body').removeClass('hover-submenu1');
      $('body').removeClass('default-sidebar');
      $('body').removeClass('closed');
      $('body').removeClass('icon-overlay');
      $('body').removeClass('icon-text');
    } else {
      $('body').removeClass('hover-submenu');
      $('body').removeClass('main-sidebar-hide');
      $('body').addClass('default-sidemenu');
    }
  });

  /*********************hover-menu closed********************/

  /*********************hover-menu1 open********************/

  $('#myonoffswitch30').click(function() {
    if (this.checked) {
      $("#global-loader").fadeOut("slow");
      $('body').addClass('hover-submenu1');
      $('body').addClass('main-sidebar-hide');
      $('body').removeClass('default-sidemenu');
      $('body').removeClass('hover-submenu');
      $('body').removeClass('default-sidebar');
      $('body').removeClass('closed');
      $('body').removeClass('icon-overlay');
      $('body').removeClass('icon-text');
    } else {
      $('body').removeClass('hover-submenu1');
      $('body').removeClass('main-sidebar-hide');
      $('body').addClass('default-sidemenu');
    }
  });

  /*********************hover-menu1 closed********************/


  /*********************icon-overlay open********************/
  $('#myonoffswitch25').click(function() {
    if (this.checked) {
      $('body').addClass('icon-overlay');
      $('body').addClass('main-sidebar-hide');
      // $('body').addClass('default-sidebar');
      $('body').removeClass('hover-submenu1');
      $('body').removeClass('default-sidemenu');
      $('body').removeClass('closed');
      $('body').removeClass('hover-submenu');
      $('body').removeClass('icon-text');
    } else {
      $('body').removeClass('icon-overlay');
      $('body').removeClass('main-sidebar-hide');
      $('body').addClass('default-sidemenu');
    }
  });

  /*********************icon-overlay closed********************/

  /*********************icon-text open********************/

  $('#myonoffswitch29').click(function() {
    if (this.checked) {
      $('body').addClass('icon-text');
      $('body').addClass('main-sidebar-hide');
      $('body').removeClass('closed');
    } else {
      $('body').removeClass('icon-text');
      $('body').removeClass('main-sidebar-hide');
      $('body').addClass('closed');
    }
  });



  /*********************icon-text closed********************/
});
