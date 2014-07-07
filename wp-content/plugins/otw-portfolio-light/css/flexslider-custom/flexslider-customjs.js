// Portfolio Single Item Gallery
jQuery(document).ready(function(){
  jQuery('#portfolio-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#portfolio-gallery'
  });

  jQuery('#portfolio-gallery').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#portfolio-carousel"
  });
});