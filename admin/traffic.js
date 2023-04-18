$(document).ready(function () {
    $('#dt-vertical-scroll').dataTable({
      "paging": false,
      "fnInitComplete": function () {
        var myCustomScrollbar = document.querySelector('#dt-vertical-scroll_wrapper .dataTables_scrollBody');
        var ps = new PerfectScrollbar(myCustomScrollbar);
      },
      "scrollY": 450,
    });
  });