$(document).ready(function() {
    $('#registrations').DataTable({
        "ordering": true,
        columnDefs: [{
          orderable: false,
          targets: "no-sort"
      }]
  });
});