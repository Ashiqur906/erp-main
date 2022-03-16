jQuery(document).ready(function ($) {
  jQuery(".stellarnav").stellarNav({
    theme: "dark",
    breakpoint: 960,
    position: "right",
    phoneBtn: "18009997788",
    locationBtn: "https://www.google.com/maps",
  });

  jQuery(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
});
