<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/show-candidate/"+pid,
         success: function (response) {
         	console.log(response.candidates[0]);
            // $('#edit-candidate-id').val(pid)
            $('#fullname').html(response.candidates[0].fname +' '+ response.candidates[0].lname)
            $('#position').html(response.candidates[0].position)
            $('#partylists').html(response.candidates[0].partylist)
            $('#course_sections').html(response.candidates[0].course_section)
            $('#departments').html(response.candidates[0].department)
            $('#colleges').html(response.candidates[0].college)
            $('#candidate-picture').attr('src', '../uploads/image3/'+response.candidates[0].picture)
         }
     });
    });
});
 
</script>
