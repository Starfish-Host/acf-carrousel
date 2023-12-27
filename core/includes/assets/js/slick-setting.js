(function ($) {
  "use strict";

  $(window).load(function () {
    $(".slick-carousel").slick({
      dots: false,
      draggable: false,
      infinite: false,
      speed: 300,
      slidesToShow: 8,
      slidesToScroll: 8,
      centerMode: true,
      adaptiveHeight: true,
      responsive: [
        {
          breakpoint: 1600,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  });
})(jQuery);
