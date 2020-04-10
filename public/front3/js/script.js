


jQuery.noConflict();
jQuery(document).ready(function ($) {

	/*
		Load more content with jQuery - May 21, 2013
		(c) 2013 @ElmahdiMahmoud
	*/

	$(function () {
		$(".lawyer").slice(0, 5).show();
		$("#loadMore").on('click', function (e) {
			e.preventDefault();
			$(".lawyer:hidden").slice(0, 5).slideDown();
			if ($(".lawyer:hidden").length == 0) {
				$("#load").fadeOut('slow');
			}
			// $('html,body').animate({
			// 	// scrollTop: $(this).offset().top
			// }, 15000);
		});
	});

	// $('a[href=#top]').click(function () {
	// 	$('body,html').animate({
	// 		scrollTop: 0
	// 	}, 600);
	// 	return false;
	// });

	// $(window).scroll(function () {
	// 	if ($(this).scrollTop() > 50) {
	// 		$('.totop a').fadeIn();
	// 	} else {
	// 		$('.totop a').fadeOut();
	// 	}
	// });



	$('#my-select-city, #my-select-spec').on('change', function () {
		const selected = $(this).val();
		if (selected !== '') {
			console.log('The value you picked is: ' + selected);
		}
	});
	

/*Новая модалка .mo*/
	$("#show-modal, .modal-bg,  .modal-close").click(function (e) {
		if (e.target != this) return;
		$(".modal-bg").toggleClass("show");

		$body = $("body");

		$body.toggleClass("no-scroll");

	});
	$("#show-modal2, .modal-bg2, .modal-close2").click(function (e) {
		if (e.target != this) return;
		$(".modal-bg2").toggleClass("show2");

		$body = $("body");

		$body.toggleClass("no-scroll");

	});
	
/* Конец новой модалки*/

	$.fn.textToggle = function (d, b, e) {
		return this.each(function (f, a) {
			a = $(a);
			var c = $(d).eq(f),
				g = [b, c.text()],
				h = [a.text(), e];
			c.text(b).show();
			$(a).click(function (b) {
				b.preventDefault();
				c.text(g.reverse()[0]);
				a.text(h.reverse()[0])
			})
		})
	};
	$(function () {
		$('.click-tel').textToggle(".hide-tail", "8 7XX XX XX", "Скрыть")
	});
	$(function () {
		$('.click-telMobile').textToggle(".hide-tailMobile", "8 7 ", "Скрыть")
	});

// 
	$(function () {
		$('ul.tabs li:first').addClass('active');
		$('.block article').hide();
		$('.block article:first').show();
		$('ul.tabs li').on('click', function () {
			$('ul.tabs li').removeClass('active');
			$(this).addClass('active')
			$('.block article').hide();
			var activeTab = $(this).find('a').attr('href');
			$(activeTab).show();
			return false;
		});
	})

	
	/*Dropdown Menu Города*/
	$('.dropdown').click(function () {
		$(this).attr('tabindex', 1).focus();
		$(this).toggleClass('active');
		$(this).find('.dropdown-menu').slideToggle(300);
	});
	$('.dropdown').focusout(function () {
		$(this).removeClass('active');
		$(this).find('.dropdown-menu').slideUp(300);
	});
	$('.dropdown .dropdown-menu li').click(function () {
		$(this).parents('.dropdown').find('span').text($(this).text());
		$(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
	});
	// Поиск спец
	$(function () {
		var list = $('.js-dropdown-list');
		var link = $('.js-link');
		link.click(function (e) {
			e.preventDefault();
			list.slideToggle(200);
		});
		list.find('li').click(function () {
			var text = $(this).html();
			var icon = '<i class="fa fa-chevron-down"></i>';
			link.html(text + icon);
			list.slideToggle(200);
			if (text === '* Reset') {
				link.html('Select one option' + icon);
			}
		});
	});

	var d = jQuery(document);
	var $navBar = jQuery(".boo-navbar");
	var $navBarToggle = jQuery(".boo-nav-toggle");
	var $navBarCollapse = jQuery(".boo-nav-collapse");
	var $Btn = jQuery(".nav_btn");
	var $Main = jQuery(".main");

	$navBarToggle.click(function () {
		$navBarCollapse.slideToggle("fast");
	});
	$Btn.click(function () {
		if ($(document).width() < 770) {
			$navBarCollapse.slideToggle("fast");
		}
	});

	filterTogglePos = 0;
	d.scroll(function () {
		if (d.scrollTop() > $navBar.offset().top && !$navBar.hasClass("fixed")) {
			filterTogglePos = $navBar.offset().top;

			$navBar.addClass("fixed");
		} else {
			if (d.scrollTop() < 1 && $navBar.hasClass("fixed")) {
				$navBar.removeClass("fixed");
			}
		}
	});

	// jQuery("a").click(function () {
	// 	d.animate(
	// 		{
	// 			scrollTop: jQuery(jQuery.attr(this, "href")).offset().top
	// 		},
	// 		500
	// 	);
	// 	return false;
	// });

	// hamburger
	$(".hamburger").click(function () {
		$(".hamburger").toggleClass("active");
	});


	if ($(document).width() < 770) {
		$(".nav_btn").click(function () {
			$(".hamburger").toggleClass("active");
		});
	}

// Spoiler
	$(".spoiler").click(function () {
		$(".spoilerpanel").slideToggle("normal");
	});
	$(".all").click(function () {
		$(".db").css({ "display": "block" });
		$(".all").css({ "display": "none" });
		
	});

	// Model link
	$('.model_link').click(function () {
		
		$('#mask').fadeIn(300);
		$('.model').delay(10).animate({
			top: ($(window).height() +20% - $('.model').outerHeight()) / 4
		}, 400);
	});
	// Popup
	$('#mask, .close ').click(function () {
		$('.model').animate({ top: -($('.model').outerHeight()) - 50 });
		$('#mask').fadeOut(200);
	});
	$(window).resize(function () {
		$('.model').css({
			left: ($(window).width() - $('.model').outerWidth()) / 2
		});
	});
	$(window).resize();

	$('.model_link2').click(function () {

		$('#mask').fadeIn(300);
		$('.model2').delay(10).animate({
			top: ($(window).height() + 20 % - $('.model2').outerHeight()) / 4
		}, 400);
	});
	// Popup
	$('#mask, .close ').click(function () {
		$('.model2').animate({ top: -($('.model2').outerHeight()) - 50 });
		$('#mask').fadeOut(200);
	});
	$(window).resize(function () {
		$('.model2').css({
			left: ($(window).width() - $('.model2').outerWidth()) / 2
		});
	});
	$(window).resize();




	$('.similar_slider').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 2,
					prevArrow: '<button class="prev arrow"></button>',
					nextArrow: '<button class="next arrow"></button>',
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					prevArrow: '<button class="prev arrow"></button>',
					nextArrow: '<button class="next arrow"></button>',
					slidesToScroll: 1
				}
			}
		]
	});

//  add elem


});



  // var $elFather = $navBar.parent();
  // var docWidth = jQuery(document).width();
  // if ($elFather.width() >= 960) {
  //   if ( docWidth > 1200) {
  //     var leftWalk = ((($elFather.width() - 1200) / 2) + $elFather.scrollLeft());
  //     $elFather.css({
  //       'width': '100%',
  //       'margin-left': leftWalk + "px"
  //     });
  //   }
  // }






