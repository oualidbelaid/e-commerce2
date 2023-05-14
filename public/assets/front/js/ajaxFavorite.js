// favorite scripte

// add product in favorite

$(document).ready(function () {
    $(".add_favorite").click(function (e) {
        console.log("fvcv");
        ele = $(this);
        if (ele.attr("href") == "") {
            e.preventDefault();
        }
        data = parseInt($(this).data("productid"));
        if ($(this).hasClass("btn-danger")) {
            $.ajax({
                type: "GET",
                url: "/favorite/favoriteline/destroy/" + data,
                success: function (response) {
                    if (response.success == true) {
                        if (ele.hasClass("remove_favorite")) {
                            ele.parent().parent().parent().parent().remove();
                        } else {
                            ele.addClass("btn-outline-danger");
                            ele.removeClass("btn-danger");
                        }
                    }
                },
            });
        } else {
            $.ajax({
                url: "/favorite/favoriteline/store",
                type: "GET",
                dataType: "json",
                data: { product_id: data },
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        ele.removeClass("btn-outline-danger");
                        ele.addClass("btn-danger");
                    }
                },
            });
        }
    });
});
