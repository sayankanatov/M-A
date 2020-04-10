$(".city_blok_title").click(function(){
    $(".city_blok").toggleClass("city_active");
    $(".city_blok .city_list").slideToggle("slow");
});


$(".burger_menu").click(function(){
    $("header").toggleClass("mobile_active");
});
$(".offcanvas__link_perents").click(function(){
    $(this).parents(".offcanvas__links").children(".offcanvas__link-list").slideToggle("slow");
});

$(".form_reg_list-radio").click(function(){
    var physical = $(this).children(".physical-linck").data("face");
    console.log(physical);
    $(".form_reg_list-display").removeClass("form_reg_list-active");
    $(".form_reg_list-"+physical).addClass("form_reg_list-active");
    
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
/*
    $(".question-item-text").slideUp();
    $(this).parents(".question-item").children(".question-item-text").slideDown();
*/
});