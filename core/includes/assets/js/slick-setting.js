(function ($) {
  "use strict";

  $(document).ready(function () {
    $(".slick-carousel").slick({
      dots: false,
      draggable: false,
      infinite: true,
      speed: 300,
      slidesToShow: 8,
      slidesToScroll: 1,
      centerMode: true,
      autoplay: true,
      autoplaySpeed: 2000,
      adaptiveHeight: false,
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
