$(document).ready(function () {
    /* start navbar */
    $("body").attr("data-sidebar", localStorage.getItem("theme"));
    $("body").attr("data-topbar", localStorage.getItem("theme"));
    $("#dark-mode").click(function (e) {
        e.preventDefault();
        if ($("body").attr("data-topbar") == "dark") {
            localStorage.setItem("theme", "light");
            $("body").attr("data-sidebar", "light");
            $("body").attr("data-topbar", "light");
            $(this).html("<i class='fal fa-moon'></i>");
        } else {
            localStorage.setItem("theme", "dark");
            $("body").attr("data-sidebar", "dark");
            $("body").attr("data-topbar", "dark");
            $(this).html("<i class='fal fa-sun'></i>");
        }
    });
    /* end navbar */
});
