$(document).ready(function() {
	// navigation toggle
  $('#menu').click(function(){
    $('.nav__bottom ul').toggleClass('showing');
    $('.header__addition ul').toggleClass('showing__addition');
    $(this).toggleClass('open');
  });

  var windowsize = $(window).width();
  $(window).resize(function() {
    var windowsize = $(window).width();
  });
  if (windowsize <= 840) {
    $('.nav__bottom ul li a').click(function() {
      $(this).parent().find('.submenu').toggleClass('submenu__active');
    });
    $('.header__addition ul li a').click(function() {
      $(this).parent().find('.submenu').toggleClass('submenu__active');
    });
  }

  // modal window
  var elements = $('.modal-overlay, .modal');

  $('.open-modal').click(function(e) {
    e.preventDefault();
    elements.addClass('active-modal');
    $('body').css('overflow', 'hidden');
  });

  $('.close-modal').click(function() {
    elements.removeClass('active-modal');
    $('body').css('overflow', 'unset');
    $('form input').val('');
    // $('.modal-content').hide();
  });

  // slick tab slider
  $('.facts').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    arrows: false,
    pauseOnFocus: false,
    pauseOnHover: false
  });

  // send mail
  // $("#formElement").submit(function() {
  //   var str = $(this).serialize();

  //   $.ajax({
  //     type: "POST",
  //     url: "https://togus.kz/send.php",
  //     data: str,
  //     success: function(msg) {
  //       $('#formElement input, #formElement textarea').val('');
  //       $('.success-msg').show();
  //     }
  //   });
  //   return false;
  // });

});