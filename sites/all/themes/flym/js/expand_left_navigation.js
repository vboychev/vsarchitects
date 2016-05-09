jQuery(window).load(function() {
  jQuery(".hamburger").trigger('mouseenter');
  setInterval(function() {
    jQuery(".hamburger").trigger('mouseleave');
  }, 3000);
});
