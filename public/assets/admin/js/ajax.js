// $(document).ready(function () {
//     product = [];
//     $("#more_product li").click(function (e) {
//         e.preventDefault();
//         // get local product
//         if (product[parseInt($(this).find("a").text()) - 1] != undefined) {
//             $("#prd tr").remove();
//             console.log("local");
//             console.log(product);
//             $.each(
//                 product[parseInt($(this).find("a").text()) - 1],
//                 function (i, item) {
//                     var photo = item.photo.split("&&")[0];
//                     var $tr = $("<tr>").append(
//                         $("<td>").text(i),
//                         $("<td>").text(item.id),
//                         $("<td>").text(item.name),
//                         $("<td>").text(item.price),
//                         $("<td>").html("<img src='/" + photo + "'>"),
//                         $("<td>").html(
//                             "<a href='/" +
//                                 "admin/ecommerce/products/item/" +
//                                 item.id +
//                                 "' class='btn btn-primary btn-sm btn-rounded waves-effect waves-light'> View</a>"
//                         ),
//                         $("<td>").html(
//                             "<a href='/" +
//                                 "admin/ecommerce/products/edit/" +
//                                 item.id +
//                                 "' class='btn btn-success btn-sm btn-rounded waves-effect waves-light'> Edit</a>"
//                         ),
//                         $("<td>").html(
//                             "<a href='/" +
//                                 "admin/ecommerce/products/destroy/" +
//                                 item.id +
//                                 "' class='btn btn-danger  btn-sm btn-rounded waves-effect waves-light'> Delelet</a>"
//                         )
//                     ); //.appendTo('#records_table');
//                     $("#prd").append($tr);
//                 }
//             );
//         } else {
//             index = parseInt($(this).find("a").text()) - 1;
//             $.ajax({
//                 url: "/api/apiproduct?page' + $(this).find("a").text(),
//                 type: "GET",
//                 dataType: "json",
//                 success: function (data) {
//                     $("#prd tr").remove();

//                     // register the data product in array
//                     product[index] = data.data;

//                     $.each(data.data, function (i, item) {
//                         // explote the link of photos and get first
//                         var photo = item.photo.split("&&")[0];
//                         var $tr = $("<tr>").append(
//                             $("<td>").text(i),
//                             $("<td>").text(item.id),
//                             $("<td>").text(item.name),
//                             $("<td>").text(item.price),
//                             $("<td>").html("<img src='/" + photo + "'>"),
//                             $("<td>").html(
//                                 "<a href='/" +
//                                     "admin/ecommerce/products/item/" +
//                                     item.id +
//                                     "' class='btn btn-primary btn-sm btn-rounded waves-effect waves-light'> View</a>"
//                             ),
//                             $("<td>").html(
//                                 "<a href='/" +
//                                     "admin/ecommerce/products/edit/" +
//                                     item.id +
//                                     "' class='btn btn-success btn-sm btn-rounded waves-effect waves-light'> Edit</a>"
//                             ),
//                             $("<td>").html(
//                                 "<a href='/" +
//                                     "admin/ecommerce/products/destroy/" +
//                                     item.id +
//                                     "' class='btn btn-danger  btn-sm btn-rounded waves-effect waves-light'> Delelet</a>"
//                             )
//                         ); //.appendTo('#records_table');
//                         $("#prd").append($tr);
//                     });
//                 },
//             });
//         }

//         $(this).siblings().removeClass("active");
//         $(this).addClass("active");
//     });
// });
// // $.ajax({
// //     type: "DELETE",
// //     url: "http://127.0.0.1:8000/api/product/1",
// //     data: "id=" + 1,
// //     success: function () {
// //         $("tr.selector").remove();
// //         $("div.success").fadeIn();
// //     },
// // });
// $("#cc").click(function (e) {
//     e.preventDefault();
//     console.log($(this).val());
// });
$.ajax({
    url: "http://127.0.0.1:8000/admin",
    cache: false,
    dataType: "html",
    type: "GET",
    success: function (data) {
        // $("#result").empty();
        // $("#result").html(data);
        // window.location.hash = page;
        // $(window).scrollTop(0);
    },
});
