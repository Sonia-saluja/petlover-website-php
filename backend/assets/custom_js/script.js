
// data table script of staff view page 
$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
// script of delete staff
$(document).ready(function(){
  $('.deletebtn').click(function(e){
    e.preventDefault();
    var user_id = $(this).val();
    
    console.log("herer");
     $('.delete_user_id').val(user_id);
    //  create modele pop for confirmation 
    $('#deleteModal').modal('show');
   });
});

// tooltip js staff page 
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


// $('#filter').change(function() {
//     $.post($("#formFilter").attr("action"),
//         $("#formFilter :input").serializeArray(),
//         function(filter) {
//             //alert (filter);
//             $("#tablebody").empty();
//             $("#tablebody").html(filter);
//         });
//     $("#formFilter").change(function() {
//         return false;
//     });
// });