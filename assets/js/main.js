/************* Main Js File ************************
    Template Name: Taso - Personal Portfolio Template
    Author: Tanmoy Dhar
    Version: 1.0
    Copyright 2018
****************************************/


/*==================================

        Table of Content

        1. Window Load Function
            a. Preloader Setup
            b. Portfolio Isotope Setup
        2. Document Ready Function
            a. ScrollIt Setup
            b. Navbar Scrolling Background
            c. Stats Counter Setup
            d. Navbar Close On Click Mobile Responsive
            e. Stellar Setup
            f. Magnific Popup Setup
            g. Blog OwlCarousel Setup
            h. Testimonial OwlCarousel Setup
            i. Contact Form Setup

==================================*/

/*========Window Load Function========*/
$(window).on("load", function() {

    /*========Portfolio Isotope Setup========*/
    if ($(".portfolio-section").length) {
        var $elements = $(".portfolio-section");
        $elements.isotope();
        $(".port-filter ul li").on("click", function() {
            $(".port-filter ul li").removeClass("filter-item");
            $(this).addClass("filter-item");
            var selector = $(this).attr("data-filter");
            $(".portfolio-section").isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: "linear",
                    queue: false,
                },
            });
        });
    }

});

/*========Document Ready Function========*/
$(function() {

    "use strict";
    var wind = $(window);

    /*========ScrollIt Setup========*/
    $.scrollIt({
        upKey: 38, // key code to navigate to the next section
        downKey: 40, // key code to navigate to the previous section
        easing: 'swing', // the easing function for animation
        scrollTime: 600, // how long (in ms) the animation takes
        activeClass: 'active', // class given to the active nav element
        onPageChange: null, // function(pageIndex) that is called when page is changed
        topOffset: -15 // offste (in px) for fixed top navigation
    });

    /*========Navbar Scrolling Background========*/
    wind.on("scroll", function() {
        var bodyScroll = wind.scrollTop(),
            navbar = $(".navbar")
        if (bodyScroll > 300) {
            navbar.addClass("fixed-top");
        } else {
            navbar.removeClass("fixed-top");
        }
    });

    /*========Stats Counter Setup========*/
    (function(){
        if($("section.counter-area").length > 0) {
            var a = 0;
            $(window).on('scroll', function() {
                var oTop = $('section.counter-area').offset().top - window.innerHeight;
                if (a == 0 && $(window).scrollTop() > oTop) {
                    $('section.counter-area .counter-item .counter').each(function() {
                        var $this = $(this),
                            countTo = $this.attr('data-count');
                        $({
                            countNum: $this.text()
                        }).animate({
                            countNum: countTo
                        }, {
                            duration: 2000,
                            easing: 'swing',
                            step: function() {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function() {
                                $this.text(this.countNum);
                            }
                        });
                    });
                    a = 1;
                }
            });
        }

    })();

    /*========Navbar Close On Click Mobile Responsive========*/
    $(".nav-item .nav-link").on('click', function () {
        $(".navbar-collapse").removeClass("show");
    });



     /*========Magnific Popup Setup========*/
     $('.portfolio .port-link').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    /*========Blog OwlCarousel Setup========*/
    $(".blogs .owl-carousel").owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        smartSpeed: 500,
        responsiveClass: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            700: {
                items: 2,
            },
            1000: {
                items: 3,
            },
        },
    });

      $("#testimonial-slider").owlCarousel({
      navigation: false,
      pagination: true,
      slideSpeed: 800,
      paginationSpeed: 800,
      smartSpeed: 500,
      autoplay: true,
      singleItem: true,
      dots: true,
      loop: true,
      responsive:{
        0:{
          items:1
        },
        767:{
          items:1
        },
        1000:{
          items:1
        }
      }
    });
      
  /* Slider background
  -------------------------------------------------------*/
  $("#owl-demo").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      items:1,
      nav:false,
      loop:true,
      dots:true,
      autoplay:true
 
  });
 

    var wind = $(window);
  wind.on('scroll', function () {
      $(".bar span").each(function () {
          var bottom_of_object =
          $(this).offset().top + $(this).outerHeight();
          var bottom_of_window =
          $(window).scrollTop() + $(window).height();
          var myVal = $(this).attr('data-width');
          if(bottom_of_window > bottom_of_object) {
            $(this).css({
              width : myVal
            });
          }
      });
  });
});
  jQuery(window).on('load',function(){


          $('.preloader').fadeOut(200);

      
  });

