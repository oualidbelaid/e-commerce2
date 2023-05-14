/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Property list filter init js
*/

$(document).ready(function () {
    $("#pricerange").ionRangeSlider({
        skin: "square",
        type: "double",
        grid: true,
        min: 0,
        max: 2000,
        from: 400,
        to: 1000,
        prefix: "",
    });
});
