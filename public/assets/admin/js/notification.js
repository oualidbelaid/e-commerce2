/* ------------------------------------------------------- */
//
//                  Get Notification Dropdown
//
/* ------------------------------------------------------ */
$notification = [];
function getNotificationDropdown(sync = 0) {
    $.ajax({
        url: "/admin/api/notifications",
        type: "GET",
        dataType: "json",
        success: function (data) {
            if (data.data != null) {
                $.each(data.data, function (i, item) {
                    // if notification d'not exist in list notification
                    if (!$notification.includes(item.id) && i < 7) {
                        // insert id notification id d'not exist in table notification
                        $notification.push(item.id);
                        var $not = $(
                            `<a href='/admin/notifications/${item.id}' class ='text-reset notification-item d-block' >`
                        ).append(
                            $("<div class='d-flex'>").append(
                                $("<div class='flex-1'>").append(
                                    $("<h6 class='mt-0 mb-1'>").text(
                                        item.data.user.name
                                    ),
                                    $(
                                        "<div class='font-size-13 text-muted'>"
                                    ).append(
                                        $("<p class='mb-1' >").text(
                                            item.data.action +
                                                " : " +
                                                item.data.product.name
                                        ),
                                        $(
                                            "<p class='mb-0 font-size-12'>"
                                        ).append(
                                            $(
                                                "<i class='far fa-clock font-size-11'>"
                                            ),
                                            $("<span >").text(item.data.time)
                                        )
                                    )
                                )
                            )
                        );

                        // checked the notification no read
                        if (item.read_at == null) {
                            $(".dropdown .rounded-pill").text(
                                parseInt($(".dropdown .rounded-pill").text()) +
                                    1
                            );
                            $not.addClass("active");
                        }
                        // active animation to icon notification withe new notification
                        if (
                            parseInt($(".dropdown .rounded-pill").text()) == 0
                        ) {
                            $(".dropdown .fa-bell").removeClass("bx-tada");
                        } else {
                            $(".dropdown .fa-bell").addClass("bx-tada");
                        }
                        // if first exicut
                        if (sync) {
                            $(".dropdown .simplebar-content").append($not);
                        } else {
                            $(".dropdown .simplebar-content").prepend($not); //add in first
                            if (data.length >= 7) {
                                $(".dropdown .simplebar-content")
                                    .children()
                                    .last()
                                    .remove();
                            }
                        }
                    }
                });
            } else {
            }
        },
    });
}
// get all notification first loding
getNotificationDropdown(1);
// get new notification 2s
window.setInterval(getNotificationDropdown, 2000);

/* ------------------------------------------------------- */
//
//                  Get Notification Inbox
//
/* ------------------------------------------------------ */
var nbr_not = 0;
var $notificationBox = [];
function getNotificationInbox(min_not, max_not) {
    $.ajax({
        url: "/admin/api/notifications",
        type: "GET",
        dataType: "json",
        success: function (data) {
            if (data.data != null) {
                nbr_not = data.data.length;
                $("#nbr_not").text(
                    "Showing " + min_not + " - " + max_not + " of " + nbr_not
                );
                $.each(data.data, function (i, item) {
                    // if notification d'not exist in list notification
                    if (i >= min_not && i < max_not) {
                        // insert id notification id d'not exist in table notification
                        $notificationBox.push(item.data.id);
                        var $nt = $(`<li  class='mb-1'>`).append(
                            $("<div class='col-mail col-mail-1'>").append(
                                $(
                                    "<div class='checkbox-wrapper-mail shadow-none'>"
                                ).append(
                                    $(
                                        "<input class='form-check-input' id='" +
                                            item.id +
                                            "' type='checkbox'>"
                                    )
                                ),
                                $(
                                    ` <a href='/admin/notifications/${item.id}' class='title'  >`
                                ).text(item.data.user.name)
                            ),
                            $("<div class='col-mail col-mail-2'>").append(
                                $(
                                    "<a href='/admin/notifications/" +
                                        item.id +
                                        "' class='subject'>"
                                ).append(
                                    $("<span class='teaser'>").text(
                                        item.data.action
                                    )
                                ),
                                $("<div class='date'>").text(item.data.time)
                            )
                        );
                        $nt.click(function name() {
                            $(this).removeClass("unread");
                        });
                        // checked the notification no read
                        if (item.read_at == null) {
                            $nt.addClass("unread");
                        }

                        $(".email-rightbar .message-list").append($nt);
                    }
                });
            } else {
            }
        },
    });
}
min_not = 0;
max_not = 10;
// appel function
getNotificationInbox(min_not, max_not);

$(".email-rightbar button").click(function (e) {
    e.preventDefault();
    // show outher notification
    if ($(this).hasClass("right") && max_not < nbr_not) {
        min_not += 10;
        max_not += 10;
        $(".email-rightbar .message-list").children().remove();
        getNotificationInbox(min_not, max_not);
        $("#nbr_not").text(
            "Showing " + min_not + " - " + max_not + " of " + nbr_not
        );
    }
    if ($(this).hasClass("left") && min_not >= 10) {
        min_not -= 10;
        max_not -= 10;
        $(".email-rightbar .message-list").children().remove();
        getNotificationInbox(min_not, max_not);
        $("#nbr_not").text(
            "Showing " + min_not + " - " + max_not + " of " + nbr_not
        );
    }
});
// delete notification
$("#delet_not").click(function (e) {
    e.preventDefault();
    $.each($(".checkbox-wrapper-mail input"), function (i, item) {
        if (item.checked) {
            $.ajax({
                type: "get",
                url: "/admin/api/notifications/destroy/" + item.id,
                success: function () {},
            });
            item.parentElement.parentElement.parentElement.remove();
        }
    });
});

/* --------------------------------------------------------------------- */
//
//                     THE END
//
/* --------------------------------------------------------------------- */
// rgvgf
