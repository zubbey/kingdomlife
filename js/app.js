$(document).ready(() => {
    $("#menuicon").on('click', () => {
        $("#menuicon").toggleClass('rotateicon');
    });
});

$(window).bind("load resize scroll",function(e) {
    var y = $(window).scrollTop();

    $(".ftco-section-3").filter(function() {
        return $(this).offset().top < (y + $(window).height()) &&
            $(this).offset().top + $(this).height() > y;
    }).css('background-position', '0px ' + parseInt(+y / 6) + 'px');
});
