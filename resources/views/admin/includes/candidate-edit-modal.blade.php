<script>
    $(document).ready(function () {
    $(document).on('click', '.editbtn', function()
    {
     var pid = $(this).val();
     $('#editmodal').modal('show');
     // alert(pid);
     $.ajax({
         type: "GET",
         url: "/edit-candidate/"+pid,
         success: function (response) {
            $('#edit-candidate-id').val(pid)
            $('#edit_position').val(response.candidates.position_id)
            $('#edit_partylist').val(response.candidates.partylist_id)
            $('#edit_department').val(response.candidates.department_id)
            $('#edit_college').val(response.candidates.college_id)
         }
     });
    });
});
 
</script>





