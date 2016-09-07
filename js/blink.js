$(window).load(function(){
var timer;
jQuery(function($) {
    timer = setTimeout(blnk, 0);
});


function blnk() {
    $(".blink").css({opacity: 0}).
        animate({opacity: 1}, 1000, "linear").
        animate({opacity: .4}, 1000, "linear", 
        function() {
            timer = setTimeout(blnk, 0);
        });
}


});//]]>  