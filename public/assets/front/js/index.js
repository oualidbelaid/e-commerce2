$(document).ready(function () {
    //menu
    $(".vertical-menu .metismenu li a").click(function (e) {
        $(this).parent().siblings().removeClass("mm-active");
        $(this).parent().siblings().find(".sub-menu").removeClass("mm-show");
        $(this).parent().toggleClass("mm-active");
        $(this).siblings(".sub-menu").toggleClass("mm-show");
    });

    // price filter

    $(".rangeHandle ").mousedown(function (e) {
        e.preventDefault();
        $(this).addClass("press");
        x = $(".press").offset().left;
        $(".rangeSlider").mousemove(function (e) {
            if ($(".rangeHandle").hasClass("press")) {
                if (e.clientX >= 304.1 && e.clientX <= 460) {
                    $(".press").hover(null, function () {
                        $(this).removeClass("press");
                    });
                    $(".press").offset({
                        left: e.clientX - 5,
                    });
                    $(".press .rangeFloat").text(
                        ($(".press").position().left + 7) * 10 + "DA"
                    );
                    $(".rangeSlider .rangeBar").css(
                        "left",
                        $(".press").position().left
                    );
                }
            }
        });
    });
    $(".rangeHandle ").mouseup(function (e) {
        e.preventDefault();
        $(this).removeClass("press");
    });
});
