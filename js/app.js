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


$(document).ready(function() {
    // $("#myCarousel").on("slide.bs.carousel", function(e) {
    //     var $e = $(e.relatedTarget);
    //     var idx = $e.index();
    //     var itemsPerSlide = 3;
    //     var totalItems = $(".carousel-item").length;
    //
    //     if (idx >= totalItems - (itemsPerSlide - 1)) {
    //         var it = itemsPerSlide - (totalItems - idx);
    //         for (var i = 0; i < it; i++) {
    //             // append slides to end
    //             if (e.direction == "right") {
    //                 $(".carousel-item")
    //                     .eq(i)
    //                     .appendTo(".carousel-inner");
    //             } else {
    //                 $(".carousel-item")
    //                     .eq(0)
    //                     .appendTo($(this).find(".carousel-inner"));
    //             }
    //         }
    //     }
    // });

    // added active to the first carousel object
    $('.carousel-inner .carousel-item:first-child').addClass('active').ready(() => {
        $('.carousel').carousel();
        $('.carousel').carousel({
            interval: 2000
        });
    });
});
