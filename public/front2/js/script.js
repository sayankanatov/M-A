$(".city_top").click(function(){
    $(".city_block").toggleClass("city_active");
    $(".city_block .city_list").slideToggle("slow");
});
$(".burger_menu").click(function(){
    $("header").toggleClass("mobile_active");
    $("html").toggleClass("mobile-opened");
});
$(".content-top_input").click(function(){
    $(".content-top_select").toggleClass("sort_active");
    $(".content-top_select .content-top_dropdown").slideToggle("slow");
});
$(".text_linck").click(function(){
    $(".text_full").slideToggle("slow");
});


var ofpos = $("header");
var oftop = ofpos.offset().top;

$(window).scroll(function() {
    if ($(window).scrollTop() > 0){
        ofpos.addClass("fixedpos");         
    } else {
        
        ofpos.removeClass("fixedpos");    
    }
});


$(".question-item-title").click(function(){
    if ($(this).parents(".question-item").hasClass('question-item-open')) {
        $(this).parents(".question-item").removeClass('question-item-open');
        $(this).parents(".question-item").children(".question-item-text").slideUp('slow');
    }else {
        $(".question-item").removeClass('question-item-open');
        $(".question-item-text").slideUp();
        $(this).parents(".question-item").addClass('question-item-open');
        $(this).parents(".question-item").children(".question-item-text").slideDown();
    }
});

var swiper = new Swiper('.similar_slider-container', {
    slidesPerView: 2,
    spaceBetween: 30,
    slidesPerGroup: 2,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: '.similar_slider-pagination',
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20,
        slidesPerGroup: 1,
      },
      992: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
      1024: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
    }
});

$(".form_reg_list-radio").click(function(){
    var physical = $(this).children(".physical-linck").data("face");
    $(".form_reg_list-display").removeClass("form_reg_list-active");
    $(".form_reg_list-"+physical).addClass("form_reg_list-active");
    
});

$.fn.textToggle = function(cls, str) {
    return this.each(function(i) {
        $(this).click(function() {
            var c = 0, el = $(cls).eq(i), arr = [str,el.text()];
            return function() {
            el.text(arr[c++ % arr.length]);
        }}());
    })
};
$(function(){
    $('.sh_nmr').textToggle(".sh_nmr","").click();
    $('.sh_nmr').textToggle(".num_hide","8 7XX XX XX XX").click();
});
$(".num_hide").click(function(){
    if($(this).text() != "8 7XX XX XX XX"){
        $(this).parents('.content_item-phone').attr('href', 'tel:'+$(this).text());
    }
});

$(".rating__item").click(function(e){
    e.preventDefault(); 
});

$('.js-example-basic-single').select2({
    placeholder: "Юрист, фирма и услуга",
    tags: true,
    tokenSeparators: [',', ' ']
});
