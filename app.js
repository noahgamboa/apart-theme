'use srict'
$(".wp-caption").removeAttr('style');


/* function for opening menu in mobile */
function openMenu() {
    if (!$.easing.easeInOutSine) {
        $.extend($.easing, {
            easeInOutSine: function (x, t, b, c, d) {
            return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;
            }
        });
    }
    $(".nav").animate({height: "toggle"}, 350, "easeInOutSine",function(){
    })
}

/* will animate elements when in view */
var $animation_elements = $('.wp-caption-text');
var $window = $(window);
$window.on('scroll', check_if_in_view);
$window.on('scroll resize', check_if_in_view);
$window.trigger('scroll');
function check_if_in_view() {
  var window_height = $window.height();
  var window_top_position = $window.scrollTop();
  if (window_top_position < 10) return; // scroll a ~little~ bit before transitioning
  var window_bottom_position = (window_top_position + window_height);

  $.each($animation_elements, function() {
    var $element = $(this);
    var element_height = $element.outerHeight();
    var element_top_position = $element.offset().top;
    var element_bottom_position = (element_top_position + element_height);

    //check to see if this current container is within viewport
    console.log(element_bottom_position, element_top_position, window_top_position, window_bottom_position)
    if ((element_bottom_position >= window_top_position) &&
        (element_top_position <= window_bottom_position)) {
      $element.addClass('caption-in-view');
    } else {
      $element.removeClass('caption-in-view');
    }
  });
}

$(document).ready(function () {

$.validator.addMethod('customphone', function (value, element) {
    return this.optional(element) || /[0-9\-\(\)\s]+/.test(value);
}, "Please enter a valid phone number");
$.validator.addMethod('hiddenRecaptcha', function(){
    if (grecaptcha.getResponse() == '') {
        return true;
    } else return false;
});
/* validation of Contact Form */
$("#contactForm").validate({
  rules: {
    phone: 'customphone'
  }
});

});
