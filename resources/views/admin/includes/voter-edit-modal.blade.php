<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-voter/"+pid,
         success: function (response) {
            $('#editid').val(pid)
            $('#ismis_id').val(response.voters.ismis_id)
            $('#Firstname').val(response.voters.fname)
            $('#Lastname').val(response.voters.lname)
            $('#course_section').val(response.voters.course_section) 
            $('#edit_department').val(response.voters.department)  
            $('#edit_college').val(response.voters.college)  
            $('#edit_statuses').val(response.voters.status)  
            $('#edit_email').val(response.voters.email)
         }
     });
    });
});
 
</script>



