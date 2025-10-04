$('#filter').change(function() {
    $.post($("#formFilter").attr("action"),
        $("#formFilter :input").serializeArray(),
        function(filter) {
            //alert (filter);
            $("#tablebody").empty();
            $("#tablebody").html(filter);
        });
    $("#formFilter").change(function() {
        return false;
    });
});

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
  