//
// Product script
//

//show liste categories
$(".show-ctg").click(function (e) {
    $(".add-ctg").toggle();
});
$(".show-att").click(function (e) {
    $(".add-att").toggle();
});
$(".listContainer .list").click(function (e) {
    $(this)
        .find("input")
        .attr("checked", function (i, v) {
            return !v;
        });
    $(this).toggleClass("hover");
    // console.log($(this).children("input").prop("checked"));

    // console.log($(this).children("input").data("attr-cheched", false));
});
// serche cartegory
$(".serch_list").keyup(function (e) {
    val = this.value.toLocaleUpperCase();
    $(this).siblings().show();
    $(this).siblings().find(".list").hide();
    $(this)
        .siblings()
        .find(".list")
        .each(function (indexInArray, valueOfElement) {
            if (valueOfElement.textContent.toLocaleUpperCase().includes(val)) {
                $(this).show();
            }
        });
});
//uplode files (photos)
$(".svelte-817dg2 .form-control").focus(function (e) {
    e.preventDefault();
    $(this).parent().css("borderColor", " #2196f3");
    console.log("gfdsq");
});
$(".svelte-817dg2 .form-control").blur(function (e) {
    $(this).parent().css("borderColor", " #eeeeee");
});
// checked photo
$(".checked_photo").click(function (e) {
    e.preventDefault();
    $(this).siblings().removeClass("active");
    $(this).addClass("active");
    console.log($(this).find("img").attr("src"));
    $(".tab-pane .photo").attr("src", $(this).find("img").attr("src"));
});

// Add Attributs inputs
$("#add-att").click(function (e) {
    e.preventDefault();
    $(this).parent().siblings(".row").find("input");

    $.each(
        $(this).parent().siblings(".row").find("input"),
        function (indexInArray, valueOfElement) {
            if (
                valueOfElement.checked == true &&
                $(this).data("attr-cheched") != true
            ) {
                $(valueOfElement).data("attr-cheched", true);
                $att_input = $("<div class='mb-3 mb-3'> ").append(
                    $("<label class='form-label'>").text($(this).data("name")),
                    $("<div class='mb-3 mb-3 input-group ' >").append(
                        $(
                            "<input class='form-control form-control' type='text'  name='attributs[" +
                                $(this).val() +
                                "]' placeholder='" +
                                $(this).data("name") +
                                "'>"
                        ),
                        $("<button  class='btn btn-danger'>").append(
                            "<i class='fad fa-trash-alt'>"
                        )
                    )
                );
                $att_input.find("button").click(function () {
                    $(valueOfElement).data("attr-cheched", false);
                    console.log($(valueOfElement));
                    $(this).parent().parent().remove();
                });
                if (indexInArray % 2 != 0) {
                    $(".form_input").children().first().append($att_input);
                } else {
                    $(".form_input").children().last().append($att_input);
                }
                $(this).attr("data-attr-cheched", true);
            }
        }
    );
});
// add promotion
$("#add_prm").on("click", function () {
    console.log("sdfgh");
    $div = $("<div class='mb-3 mb-3 '>").append(
        $("<div class='mb-3 mb-3' >").append(
            $("<label class='form-label' for='valuePrm'>").html(
                "Promotion value " +
                    "<i class='fal fa-badge-percent font-size-15'></i>"
            ),
            $(
                "<input class='form-control' type='number' id='valuePrm' name='promotionValue'>"
            )
        ),
        $("<div class='mb-3 mb-3 '>").append(
            $("<label class='form-label' for='expiryPrm'>").text(
                " Expiry date "
            ),
            $(
                "<input class='form-control' type='date' id='expiryPrm' name='expiryPromotion'>"
            )
        )
    );
    $(this).parent().prepend($div);
    console.log($div.children());
    if ($(this).hasClass("btn-danger")) {
        $(this).text("Add Promotion");
        $(this).siblings().remove();
        $(this).removeClass("btn-danger");
    } else {
        $(this).addClass("btn-danger");
        $(this).text("Remove");
    }
});

// restrat the form to create (cancel)

$("#cancel").click(function (e) {
    e.preventDefault();
    $(this).parent().parent().parent().siblings().find("input").val("");
    $(".list input").removeAttr("checked");
    $(".list ").removeClass("hover");
    console.log($(".list"));
});
