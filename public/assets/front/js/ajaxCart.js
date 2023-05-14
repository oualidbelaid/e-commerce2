$(document).ready(function () {
    var grandTotal = parseInt(
        $(".order tbody").children().first().children().last().text()
    );
    quantity = 0;
    shippingCharge = 0;
    estimatedTax = 0;
    discount = -0;
    function deleteCart(id, price, $cart, grandTotal, $cartNotification) {
        console.log($cart);
        console.log($cartNotification);
        console.log("ffff");

        $.ajax({
            type: "GET",
            url: "cart/cartline/destroy/" + id,
            success: function (response) {
                if (response.success == true) {
                    $(".dropdown .rounded-pill").text(
                        parseInt($(".dropdown .rounded-pill").text()) - 1
                    );
                    if (parseInt($(".dropdown .rounded-pill").text()) == 0) {
                        $(".dropdown .rounded-pill")
                            .siblings("i")
                            .removeClass("bx-tada");
                    }

                    grandTotal = parseInt(
                        $(".order tbody")
                            .children()
                            .first()
                            .children()
                            .last()
                            .text()
                    );
                    grandTotal -= parseInt($cart.find(".total").text());
                    $(".order tbody")
                        .children()
                        .first()
                        .children()
                        .last()
                        .text(grandTotal + " DA");

                    $(".order tbody")
                        .children()
                        .last()
                        .children()
                        .last()
                        .text(
                            grandTotal +
                                shippingCharge +
                                estimatedTax +
                                discount +
                                " DA"
                        );
                    $cartNotification.remove();
                    $cart.remove();
                }
            },
        });
    }

    // update cart
    var timeIdUpdateCart = 0; //id de update quantity every 0.2s
    function updateCart(ele, price, cartLineId, value, action) {
        x = action == "+" ? 1 : -1;
        console.log(ele.find("input"));
        console.log(ele.find(".total"));
        grandTotal = parseInt(
            $(".order tbody").children().first().children().last().text()
        );
        grandTotal -= parseInt(ele.find(".total").text());

        ele.find("input").val(parseInt(ele.find("input").val()) + x);
        ele.find(".total").text(price * (value + x));
        grandTotal += parseInt(ele.find(".total").text());
        $(".order tbody")
            .children()
            .first()
            .children()
            .last()
            .text(grandTotal + " DA");

        $(".order tbody")
            .children()
            .last()
            .children()
            .last()
            .text(
                grandTotal + shippingCharge + estimatedTax + discount + " DA"
            );
        window.clearTimeout(timeIdUpdateCart); //delete the clearTimeout if exist
        timeIdUpdateCart = window.setTimeout(function () {
            $.ajax({
                type: "get",
                url: "/cart/cartline/update/" + cartLineId,
                data: {
                    quantity: parseInt(value) + x,
                },
                success: function (response) {
                    console.log(response);
                    if (response.success != true) {
                        ele.find("input").val(
                            parseInt(ele.find("input").val()) + x * -1
                        );
                    }
                },
            });
        }, 200);
    }

    // global

    function getCartList() {
        $.each($(".cart tbody tr"), function (i, item) {
            console.log(item.id);
            var $price = parseInt($(item).find(".product_price").text());
            var $cartNotification = $(
                ".cartNotification tbody tr[id~='" + parseInt(item.id) + "']"
            );
            console.log($cartNotification);
            $(item)
                .find("button")
                .on("click", function () {
                    switch ($(this).text()) {
                        case "+":
                            if (
                                parseInt($(this).siblings("input").val()) < 15
                            ) {
                                updateCart(
                                    $(item),
                                    $price,
                                    parseInt(item.id),
                                    parseInt($(this).siblings("input").val()),
                                    "+"
                                );
                            }

                            break;
                        case "-":
                            if (parseInt($(this).siblings("input").val()) > 1) {
                                updateCart(
                                    $(item),
                                    $price,
                                    parseInt(item.id),
                                    parseInt($(this).siblings("input").val()),
                                    "-"
                                );
                            }
                            break;
                        default:
                            deleteCart(
                                parseInt(item.id),
                                $price,
                                $(item),
                                grandTotal,
                                $cartNotification
                            );
                            break;
                    }
                });
            $cartNotification.find("button").click(function name() {
                deleteCart(item, $(item), grandTotal, $cartNotification);
            });
            $(".dropdown  .simplebar-content table tbody").append(
                $cartNotification
            );
        });
    }

    getCartList();

    // add product in cart
    $(".add_cart").click(function (e) {
        ele = $(this);
        e.preventDefault();
        data = parseInt($(this).data("productid"));
        if (ele.hasClass("btn-outline-success")) {
            ele.removeClass("btn-outline-success");
            ele.addClass("btn-success");
        }
        $.ajax({
            url: "/cart/cartline/store",
            type: "GET",
            dataType: "json",
            data: { product_id: data },
            success: function (response) {
                console.log(response);
                if (response.success && !response.exist) {
                    $("#add_cart i").removeClass("fa-cart-plus");
                    $("#add_cart i").addClass(" far fa-badge-check");
                    $photo = response.product.photo.split("&&")[0];
                    var $cart = $("<tr id='" + data + "' >").append(
                        $("<td>").append(
                            $(`<img src='/${$photo}' class='avatar-md'> `)
                        ),
                        $("<td>").append(
                            $(
                                "<h6 class='font-size-12 text-truncate' style='max-width: 68px;'>"
                            ).text(response.product.name)
                        ),
                        $("<td>").text(response.product.price),
                        // $("<td>").append(
                        //     $(
                        //         "<button class='btn action-icon text-danger'>"
                        //     ).append(
                        //         "<i class='fad fa-trash-alt font-size-13'>"
                        //     )
                        // )
                    );

                    item = { id: data, price: response.product.price };
                    var $cartNotification = $(
                        ".cartNotification tbody tr[id~='" + item.id + "']"
                    );
                    $cart.find("button").click(function name() {
                        deleteCart(
                            item,
                            $cart,
                            (grandTotal = 0),
                            $cartNotification
                        );
                        ele.find("i").addClass("fa-cart-plus");
                        ele.find("i").removeClass(" far fa-badge-check");
                    });
                    $(".dropdown  .simplebar-content table tbody").append(
                        $cart
                    );
                    $(".dropdown .rounded-pill").text(
                        parseInt($(".dropdown .rounded-pill").text()) + 1
                    );
                    $(".dropdown .rounded-pill")
                        .siblings("i")
                        .addClass("bx-tada");
                }
            },
        });
    });
});
