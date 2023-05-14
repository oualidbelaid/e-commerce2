//
// Category script
//
// update data
$(".category .update_categry").dblclick(function () {
    $(this)
        .parent()
        .parent()
        .siblings()
        .children()
        .find("input")
        .addClass("d-none");
    $(this)
        .parent()
        .parent()
        .siblings()
        .children()
        .find("span")
        .removeClass("d-none");
    $(this)
        .parent()
        .parent()
        .siblings()
        .children()
        .find("button")
        .addClass("disabled");

    $(this).siblings("input").removeClass("d-none");
    $(this).addClass("d-none");
    $(this).parent().siblings().find("button").removeClass("disabled");
});
$(".category ").hover(function () {
    $(this).find("tr .update_categry").removeClass("d-none");
    $(this).find("tr .update_categry").siblings("input").addClass("d-none");
    $(this).find("tr .update").addClass("disabled");
});

//
