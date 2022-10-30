"use strict";
$(document).ready(function () {
  $("#excel-cust-bolder").DataTable({
    dom: "Bfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        customize: function (xlsx) {
          var sheet = xlsx.xl.worksheets["sheet1.xml"];

          // jQuery selector to add a border
          $('row c[r*="10"]', sheet).attr("s", "25");
        },
      },
    ],
  });
  $("#responsive").DataTable({
    responsive: true,
  });
});
