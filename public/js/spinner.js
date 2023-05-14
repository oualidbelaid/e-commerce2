var sp=$(".load").css({
    position: "fixed",
    zIndex: "10000",
    width: "100%",
    height: "100%",
    backgroundColor: "rgb(255, 255, 255)",
    display: "flex",
    justifyContent: "center",
    alignItems: "center",

})
$(sp).append($("<div>").css({
    width: "70px",
    height: "70px",
    border: "6px solid rgba(221, 220, 220, 0.618)",
    borderTopColor: "#556ee6",
    borderBottomColor: "#556ee6",
    borderRadius: "100%",
    animationName: "spenner",
    animationDuration: "1s",
    animationIterationCount: "infinite",
}))
$("body").append($(sp))
$(window).on("load", function () {
    $(".load").fadeOut(10);
    $("body").css("overflow","auto");
});
