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