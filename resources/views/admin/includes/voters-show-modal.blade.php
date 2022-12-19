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
         	console.log(response.candidates);
            $('#edit-candidate-id').val(pid)
            $('#fullname').html(response.candidates.fname +' '+ response.candidates.lname)
            $('#position').html(response.candidates.position)
            $('#partylists').html(response.candidates.partylists)
            $('#course_sections').html(response.candidates.course_section)
            $('#departments').html(response.candidates.department)
            $('#colleges').html(response.candidates.college)

            // $('#position_id').val(response.candidates[0].position_id)
            // $('#partylist_id').val(response.candidates[0].partylist_id)
            // $('#coursesection_id').val(response.candidates[0].coursesection_id)
            // $('#department_id').val(response.candidates[0].department_id)
            // $('#college_id').val(response.candidates[0].college_id)
            $('#candidate-picture').attr('src', '../uploads/image3/'+response.candidates.picture)
         }
     });
    });
});
 
</script>
