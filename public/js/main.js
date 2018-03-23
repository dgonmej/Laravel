$(function(){
    $('.nav-link').click(function(){
        $('.nav-item').removeClass("active");
        $(this).parent().addClass("active");
    });
 });